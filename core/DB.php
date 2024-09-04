<?php

class DB {
    private $dsn;
    private $user;
    private $password;
    private $connection;

    public function __construct($dsn, $user, $password) {
        $this->dsn = $dsn;
        $this->user = $user;
        $this->password = $password;
    }
    public function is_connected() {
        return $this->connection != null;
    }
    public function connect() {
        try {
            $this->connection = new PDO($this->dsn, $this->user, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }

    public function query($sql, $params = []) {
        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute($params);
            return $statement->fetchAll(PDO::FETCH_ASSOC) ?? true;
        } catch (PDOException $e) {
            echo "Query execution failed: " . $e->getMessage();
            return false;
        }
    }

    public function disconnect() {
        $this->connection = null;
    }
}
