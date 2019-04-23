<?php

class pdoConnection{
    private $driver;
    private $hostname, $username, $password, $db_name;

    public function __construct() {
        $database = require_once 'config.php';
        $this->driver= $database['driver'];
        $this->hostname = $database['host'];
        $this->username = $database['user'];
        $this->password = $database['pass'];
        $this->db_name = $database['name'];
    }

    public function connect() {
        try {
            $conn = new PDO("mysql:host = $this->hostname; dbname=$this->db_name", $this->username, $this->password);
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected Successfully";
        } catch (PDOException $e) {
            echo "Connection not successful";
        }
    }

}

?>
