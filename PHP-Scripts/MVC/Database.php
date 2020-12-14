<?php


namespace app;

use app\models\Player;
use PDO;
class Database
{
    public $pdo = null;
    public static ?Database $db = null;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=31.31.196.204;port=3306;dbname=u0365877_football','u0365877_footbal','7Q0z7X4v');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$db = $this;
    }

    public function getPlayers($keyword = '')
    {
        if ($keyword) {
            $statement = $this->pdo->prepare('SELECT * FROM players WHERE firstname like :keyword ORDER BY created_at DESC');
            $statement->bindValue(":keyword", "%$keyword%");
        } else {
            $statement = $this->pdo->prepare('SELECT * FROM players ORDER BY created_at DESC');
        }
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPlayerById($id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM players WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function deletePlayer($id)
    {
        $statement = $this->pdo->prepare('DELETE FROM players WHERE id = :id');
        $statement->bindValue(':id', $id);

        return $statement->execute();
    }

    public function updatePlayer(Player $player)
    {
        $statement = $this->pdo->prepare("UPDATE players SET firstname = :firstname, 
                                        lastname = :lastname,
                                        img = :img, 
                                        pos = :pos, 
                                        num = :num WHERE id = :id");
        $statement->bindValue(':firstname', $player->firstname);
        $statement->bindValue(':img', $player->imagePath);
        $statement->bindValue(':lastname', $player->lastname);
        $statement->bindValue(':pos', $player->pos);
        $statement->bindValue(':num', $player->num);
        $statement->bindValue(':id', $player->id);

        $statement->execute();
    }

    public function createPlayer (Player $player)
    {
        $statement = $this->pdo->prepare("INSERT INTO players (firstname, lastname, img, pos, num, stat_id,team_id)
                VALUES (:firstname,:lastname, :img, :pos, :num,1,1)");
        $statement->bindValue(':firstname', $player->firstname);
        $statement->bindValue(':lastname', $player->lastname);
        $statement->bindValue(':img', $player->imagePath);
        $statement->bindValue(':pos', $player->pos);
        $statement->bindValue(':num', $player->num);
        /* $statement->bindValue(':date', date('Y-m-d H:i:s')); */

        $statement->execute();
    }
}