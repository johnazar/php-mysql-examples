<?php 
class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh; // database handler mysqli
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
        try{
            $this->dbh = new PDO($dsn,$this-user,$this->pass,$option);

        }catch(PDOEXception $e){
            $this->error = $e->getMessage();

        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param,$value, $type =null)
    {
        if(is_null($type)){
            switch (true){
                case is_int ( $value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool ( $value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null ( $value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param,$value,$type);
    }



}