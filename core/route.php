<?php

require 'controller/login_controller.php';

$URL = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

echo $URL;

$login = new login_controller();

switch($URL)
{
    case '/MVC-SIGNUP/index.php/login':
            
        /*$fetch_post = new fetch_post_controller();

        var_dump($fetch_post->FetchAll_PostController());*/

        $login->login();

        break;

    case '/MVC-SIGNUP/index.php/auth':

        $login->auth();

        break;

    /*case '/post/index.php/add':

        $fetch_post = new fetch_post_controller();

        $fetch_post->add_Post();

        break;
    
    case '/post/index.php/view':

        $fetch_post = new fetch_post_controller();
    
        $fetch_post->view_Post();
    
        break;
        
    case '/post/index.php/login':

        $fetch_post = new fetch_post_controller();

        $fetch_post->save_Post();

        break;*/

}