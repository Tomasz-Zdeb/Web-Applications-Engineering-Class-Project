<?php

class Database {
    private $host = 'db';
    private $port = '5432';
    private $dbname = 'devdb';
    private $user = 'developer';
    private $password = 'developer';

    private $conn;

    public function __construct() {
        $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->dbname}";

        try {
            $this->conn = new PDO($dsn, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected to the database successfully!";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function getAllMessages() {
        $query = "SELECT * FROM msgs";
        $stmt = $this->conn->query($query);
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $messages;
    }
    
}

?>