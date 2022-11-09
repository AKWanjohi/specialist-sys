<?php

class Database
{
    public $conn;

    public function __construct($dsn)
    {
        $this->conn = new PDO($dsn);
    }

    public function getLogin($username)
    {
        $statement = $this->conn->prepare(
            "SELECT * FROM login WHERE username=:username"
        );
        $statement->bindValue(":username", $username);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
