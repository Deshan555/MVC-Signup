<?php

class register_model
{
    private $database;

    private $conn;

    public function __construct()
    {
        require_once 'core/connection.php';

        $this->database = new DB();

        $this->conn = $this->database->DataBase_Connection();
    }

    function db_write($firstName, $lastName, $mail, $hashPass)
    {
        $pass = md5($hashPass);

        $stmt = $this->conn->prepare("INSERT INTO users (pwd, First_Name, Last_Name, Email) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $pass);
        $stmt->bindParam(2, $firstName);
        $stmt->bindParam(3, $lastName);
        $stmt->bindParam(4, $mail);

        if ($stmt->execute()) {
            return 1;
        } else {
            return "Error: " . $stmt->errorInfo()[2];
        }

        $stmt->closeCursor();
    }
}
