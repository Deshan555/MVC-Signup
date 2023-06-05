<?php

if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $password = $_POST['psw'];

    $first_name = $_POST['fname'];

    $last_name = $_POST['lname'];

    $email = $_POST['email'];

    if (strcmp($password, $_POST['psw-repeat']) == 0)
    {
        echo 'Password Matched';

        if(strength_check($password) == 0)
        {
            header("location: index.php?error_message=Password Too Weak, Please Use Another Password [More Info: https://www.strongpasswordgenerator.org/]");
        }
        else{

            // encryption password
            $password = $_POST['psw'];

            if(((mail_Validation($email) AND string_Validation($first_name) AND string_Validation($last_name))) == 1)
            {
                db_write($first_name, $last_name, $email, $password);

                header("location: index.php?message=Register Successful, Data Store in Server");
            }
        }

    }else
    {
        header("location: index.php?error_message=Error Occurred, Password Mismatch");
    }

}else {
    header("location: index.php");
}
    // that php function help to check strong password for user

    function strength_check($password): int
    {
        $uppercase = preg_match('@[A-Z]@', $password);

        $lowercase = preg_match('@[a-z]@', $password);

        $number    = preg_match('@[0-9]@', $password);

        $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {

            return 0;
        }else{
            return 1;
        }
    }

    // that function write on database

    function db_write($firstName, $lastName, $mail, $hashPass): void
    {
        require_once 'config.php';

        $pass = md5($hashPass);
                
        $SQL = "INSERT INTO users (pwd, First_Name, Last_Name, Email) VALUES ('$pass', '$firstName', '$lastName', '$mail');";
    
        if ($conn->query($SQL) === TRUE)
        {
            header("location: index.php?message=Register Successful, Data Store in Server");
        }
        else
        {
            header("location: index.php?error_message=Error Occurred, Data Can't Be Store in Server (Database Error)");
        }
        
        $conn->close();
    }

    // that function validation strings

    function string_Validation($string_data): int
    {
        if (!preg_match("/^[a-zA-Z ]*$/",$string_data))
        {
            header("location: index.php?error_message=Some Strings Can't Be Accepted (A-Z, a-z accepted)");
            return 0;
        }else{
            return 1;
        }
    }

    // that function helps validation e-mails

    function mail_Validation($mail_address): int
    {
        if (!filter_var($mail_address, FILTER_VALIDATE_EMAIL))
        {
            header("location: index.php?error_message=Wrong E-Mail Format");

            return 0;
        }else{
            return 1;
        }
    }

    // that function helps validate mobile numbers

    function mobile_numberValidation($number): int
    {
        if (!preg_match("/^[0-9]*$/", $number))
        {
            header("location: index.php?error_message=Wrong With Mobile Number");

            return 0;
        }else
        {
            if(strlen ($number) != 10)
            {
                header("location: index.php?error_message=Mobile no must contain 10 digits");

                return 0;
            }else{
                return 1;
            }
        }
    }
