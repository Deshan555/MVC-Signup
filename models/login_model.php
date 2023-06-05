<?php

class LogIn_model{

    private $db;

    private $connection;

    public function __construct()
    {
        include 'core\connection.php';

        $this->db = new DB();

        $this->connection = $this->db->DataBase_Connection();
    }
    

    public function auth($password, $email_uname)
    {
        $hashPass = md5($password);
        
        $sql = "SELECT * FROM users WHERE EMAIL = '$email_uname' AND pwd = '$hashPass' LIMIT 1;";
        
        $query = $this->connection->prepare($sql);
        
        $query->execute();
          
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    
        /*foreach($server_response as $row)
        {
            $_SESSION['mail'] = $row['Email'];
    
            $_SESSION['first_name'] = $row['First_Name'];
    
            $_SESSION['last_name'] = $row['Last_Name'];
    
            $_SESSION['id'] = $row['ID'];
    
            header("location: home.php");
        }*/
    }
}