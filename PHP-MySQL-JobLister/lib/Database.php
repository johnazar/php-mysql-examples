<?php 
class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh; // database handler
    private $error;
    private $stmt;

    public function __construct(){
        //set DSN
        $dsn ='mysql:hos='.$this->host.';dbname='.$this->dbname;

        //set Option
        $option = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_Exception
        );

        //PDO instance
    }



}