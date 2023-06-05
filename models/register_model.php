<?php

class register_model
{

    private $db;

    private $connection;

    public function __construct()
    {
        include 'core\connection.php';

        $this->db = new DB();

        $this->connection = $this->db->DataBase_Connection();
    }


    // that function check strength of password

    function strength_check($password)
    {
        $uppercase = preg_match('@[A-Z]@', $password);

        $lowercase = preg_match('@[a-z]@', $password);

        $number    = preg_match('@[0-9]@', $password);

        $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {

            return 0;
        } else {
            return 1;
        }
    }

    
    // that function check validation of email

    function mail_Validation($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return 1;
        }else 
        {
            return 0;
        }
    }
}
