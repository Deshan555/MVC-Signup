<?php

include 'models/register_model.php';

class register_controller{


    private $register_model;
    
    public function __construct()
    {
        $this->register_model = new register_model();    
    }

    public function register()
    {
        $status_data = "Please LogIn to continue";

        require 'views\view_signup.php';

        exit;
    }

    public function register_process()
    {
        $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';

        $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';

        $email = isset($_POST['email']) ? $_POST['email'] : '';

        $password = isset($_POST['password']) ? $_POST['password'] : '';
        
        $retype_password = isset($_POST['retype_pwd']) ? $_POST['retype_pwd'] : '';
        
        
        if($password == '' || $first_name == ''|| $last_name == '' || $email == '' || $retype_password == ''){
            
            $status_data = "Please fill all the fields";
        
            require 'views/register.php';
        
            exit;
        }else{
            var_dump($password, $retype_password, $first_name, $last_name, $email);

            $server_response = $this->register_model->db_write($first_name, $last_name, $email, $password);

            if($server_response == 1){
                
                $status_data = "You have successfully registered";

                require 'views/view_login.php';

                exit;
            }else
            {
              $status_data = "Error: " . $server_response;  

              exit;
            }
        }
    }

}