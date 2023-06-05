<?php

require 'config.php';

session_start();

if(isset($_SESSION['id']))
{
    header("location: home.php");
}

if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $password = $_POST['psw'];

    $hashPass = md5($password);

    $email = $_POST['email'];

    $sql = "SELECT * FROM users WHERE EMAIL = '$email' AND pwd = '$hashPass' LIMIT 1;";

    $stmt = $conn->prepare($sql);
    
    $stmt->execute();

    $server_response = $stmt->get_result();

    foreach($server_response as $row)
    {
        $_SESSION['mail'] = $row['Email'];

        $_SESSION['first_name'] = $row['First_Name'];

        $_SESSION['last_name'] = $row['Last_Name'];

        $_SESSION['id'] = $row['ID'];

        header("location: home.php");
    }
}












?>