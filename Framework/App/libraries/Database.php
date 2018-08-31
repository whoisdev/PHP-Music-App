<?php
/*
    - Connections, SQL query 
    - getting data
*/
class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $database = DB_NAME;
    private $dbh;
    private $stmt;
    /*
        - This is the contructor which will create the connection with
        - the database all the database data is taken from 
        - config files
    */
    public function __construct(){
        //Set DSN;
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database;
        $options = [
            // Will check if the connection is already established
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->password);
        } catch(PDOException $e){
            echo $e->getMessage();
            echo 'Error Occured while Connecting to the DataBase';
        }
    }
    /*
        - This function will prepare the query 
        - using the PDO prepare method.
    */
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }
    /*
        - This function will bind all the values to the stmt
        - which is also a prepared in the query function.
    */
    public function bind($params, $value, $type = null){
        switch(true){
            case is_int($type):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($type):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($type):
                $type = PDO::PARAM_NULL;
                break;
            default:
            $type = PDO::PARAM_STR;
        }
        $this->stmt->bindValues($params,$value,$type);
    } 
    /*
        - This function will execute what every the query is 
        - in the statement stmt variable.
    */
    public function execute(){
        return $this->stmt->execute();
    }
    /*
        - This function will return the set of all the 
        - results in the sql query
    */
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    /*
        - This function will return just one 
        - value of the statment 
    */
    public function result(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    /*
        - This function will return the number 
        - of rows in the stmt query
    */
    public function rowCount(){
        return $this->stmt->rowCount();
    }
}
?>