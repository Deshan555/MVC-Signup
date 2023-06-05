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
        $status_data = "";

        require 'views\view_login.php';

        $this->auth();

        exit;
    }

    // that function basically authenticates the user
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
        
                require 'views\home.php';

                exit;
            }
        }
        else
        {
            $status_data =  "Wrong username or password";
        
            require 'views\view_login.php';

            exit;
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
