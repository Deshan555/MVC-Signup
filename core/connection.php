<?php

class DB{
    
    public function DataBase_Connection()
    {
        include 'config.php';

        try 
        {
            $conn = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $username, $password);
         
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
         
        }catch(PDOException $e){
            
            echo "Connection failed: " . $e->getMessage();
        }
    }
}