<?php

include 'models\logIn_Model.php';

class logIn_Controller
{
    private $login_model;

    public function __construct()
    {
        $this->login_model = new logIn_Model();
    }
    

    public function login()
    {
        require 'views\view_login.php';

        exit;
    }

    public function auth()
    {
        $password = $_POST['password'];
        
        $email_uname = $_POST['uname'];

        $server_response = $this->login_model->auth($password, $email_uname);
        
        if($server_response)
        {
            foreach($server_response as $row)
            {
                $_SESSION['mail'] = $row['Email'];
        
                $_SESSION['first_name'] = $row['First_Name'];
        
                $_SESSION['last_name'] = $row['Last_Name'];
        
                $_SESSION['id'] = $row['ID'];

                var_dump($_SESSION['id'], $_SESSION['mail'], $_SESSION['first_name'], $_SESSION['last_name']);
        
                //header("location: home.php");
            }
        }
        else
        {
            echo "Wrong username or password";
        }
    }

    /*public function logOut()
        {
            include 'models\logIn_Model.php';
    
            $logIn_Model = new logIn_Model();
    
            $logIn_Model->logOut_Model();
        }
    
        public function logIn_View()
        {
            include 'views\logIn_View.php';
        }
    
        public function logOut_View()
        {
            include 'views\logOut_View.php';
        }*/
}
