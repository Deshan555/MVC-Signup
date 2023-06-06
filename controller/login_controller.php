<?php

include 'models\logIn_Model.php';
class logIn_Controller
{
    private $login_model;

    // that function basically loads the login model
    public function __construct()
    {
        $this->login_model = new logIn_Model();
    }
    
    // that function basically loads the login page
    public function login()
    {
        $status_data = "Please LogIn to continue";

        require 'views\view_login.php';

        exit;
    }

    // that function basically authenticates the user

    public function auth()
    {
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        
        $email_uname = isset($_POST['uname']) ? $_POST['uname'] : '';
        
        if($password == '' || $email_uname == '') 
        {
            $status_data = "Please fill all the fields";
        
            require 'views/view_login.php';
        
            exit;
        }else{
            $server_response = $this->login_model->auth($password, $email_uname);
        
            if($server_response) 
            {
                foreach ($server_response as $row) {
                    $_SESSION['mail'] = $row['Email'];
            
                    $_SESSION['first_name'] = $row['First_Name'];
            
                    $_SESSION['last_name'] = $row['Last_Name'];
            
                    $_SESSION['id'] = $row['ID'];
    
                    var_dump($_SESSION['id'], $_SESSION['mail'], $_SESSION['first_name'], $_SESSION['last_name']);
            
                    require 'views/home.php';
            
                    exit;
                }
            }else 
            {
                $status_data = "Wrong username or password";
            
                require 'views/view_login.php';
            
                exit;
            }
        }
    }
}










    
   

