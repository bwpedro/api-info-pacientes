<?php
class Database {
    private $teste = ["host" => "localhost",
                    "dbname" => "info_pacientes",
                    "username" => "root",
                    "password" => ''
    ];


    public function connect($banco = "null") {
        if ($banco == "teste") {
            $host     = $this->teste["host"];
            $dbname   = $this->teste["dbname"];
            $username = $this->teste["username"];
            $password = $this->teste["password"];
        }
        
        try {
            $pdo = new PDO("mysql:host={$host};dbname={$dbname};", $username, $password,
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            return $pdo;
            
        } catch (PDOException $e) {
            die($e->getMessage());      
        }
    }
}
?>