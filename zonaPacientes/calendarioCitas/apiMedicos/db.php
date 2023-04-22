<?php

//Creamos la clase de la conexión a la base de datos en pdo con su respectiva funcion
class DB {
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct() {
        $this->host = "localhost";
        $this->db = "centromedico";
        $this->user = "root";
        $this->password = "";
        $this->charset = "utf8mb4";
    }

    function connect() {
        try {
            
            $connection = "mysql:host=".$this->host.";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];            
            $pdo = new PDO($connection,$this->user,$this->password);
        
            return $pdo;

        } catch(PDOException $e) {
            print_r('Error connection: ' . $e->getMessage());
        }  
    }
}

?>