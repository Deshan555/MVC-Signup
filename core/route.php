<?php

session_start();

require 'controller/login_controller.php';

require 'controller/register_controller.php';

$URL = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

echo $URL;

$login = new login_controller();

$register = new register_controller();

switch($URL)
{
    case '/MVC-SIGNUP/index.php/login':
            
        $login->login();

        break;

    case '/MVC-SIGNUP/index.php/auth':

        $login->auth();

        break;

    case '/MVC-SIGNUP/index.php/signup':

        $register->register();

        break;
    
    case '/MVC-SIGNUP/index.php/register':
        
        $register->register_process();

        break;
        
    /*case '/post/index.php/login':

        $fetch_post = new fetch_post_controller();

        $fetch_post->save_Post();

        break;*/


    default:
    
        $login->home();
    
        break;

}