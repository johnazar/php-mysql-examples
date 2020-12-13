<?php


namespace app;

use app\models\Player;
use PDO;
define('DB_HOST', 'localhost');
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
    }

    public function getProducts($keyword = '')
    {
        if ($keyword) {
            $statement = $this->pdo->prepare('SELECT players.* , teams.name AS tname FROM players INNER JOIN teams ON players.team_id = teams.id LIKE :keyword ORDER BY created_at DESC');
            $statement->bindValue(":keyword", "%$keyword%");
        } else {
            $statement = $this->pdo->prepare('SELECT players.* , teams.name AS tname FROM players INNER JOIN teams ON players.team_id = teams.id ORDER BY created_at DESC ');
        }
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM products WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteProduct($id)
    {
        $statement = $this->pdo->prepare('DELETE FROM products WHERE id = :id');
        $statement->bindValue(':id', $id);

        return $statement->execute();
    }

    public function updateProduct(Product $product)
    {
        $statement = $this->pdo->prepare("UPDATE products SET title = :title, 
                                        image = :image, 
                                        description = :description, 
                                        price = :price WHERE id = :id");
        $statement->bindValue(':title', $product->title);
        $statement->bindValue(':image', $product->imagePath);
        $statement->bindValue(':description', $product->description);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':id', $product->id);

        $statement->execute();
    }

    public function createProduct(Product $product)
    {
        $statement = $this->pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
                VALUES (:title, :image, :description, :price, :date)");
        $statement->bindValue(':title', $product->title);
        $statement->bindValue(':image', $product->imagePath);
        $statement->bindValue(':description', $product->description);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':date', date('Y-m-d H:i:s'));

        $statement->execute();
    }
}