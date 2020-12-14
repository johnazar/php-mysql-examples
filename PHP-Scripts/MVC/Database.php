<?php


namespace app;

use app\models\Player;
use PDO;
define('DB_HOST', '31.31.196.204');
define('DB_USER', 'u0365877_footbal');
define('DB_PASS', '7Q0z7X4v');
define('DB_NAME', 'u0365877_football');


class Database
{

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    public $pdo = null;
    public static ?Database $db = null;

    public function __construct()
    {
        //set DSN
        $dsn ='mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8';
        //set Option
        $option = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES=> false // to use limit
        );

        $this->pdo = new PDO($dsn,$this->user,$this->pass,$option);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$db = $this;
        //var_dump($this);
    }
    public function getPlayers($keyword = '')
    {
        if ($keyword) {
            $statement = $this->pdo->prepare('SELECT * FROM players WHERE firstname like :keyword ORDER BY created_at DESC');
            $statement->bindValue(":keyword", "%$keyword%");
        } else {
            $statement = $this->pdo->prepare('SELECT * FROM players ORDER BY created_at DESC');
            //var_dump($statement);
        }
        
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
