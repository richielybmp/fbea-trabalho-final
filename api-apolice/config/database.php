<?php

class Database {
    private $host = "localhost";
    private $db_name = "api_apolice";
    private $username = "root";
    private $password = "";
    public $conn;
 
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Erro: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}

?>