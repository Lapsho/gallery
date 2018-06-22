<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 21.06.2018
 * Time: 18:46
 */



class App
{
    public function __construct()
    {
        $errors = new collectErrors();
        set_error_handler(array($errors, 'errorHandler'), -1);
        set_exception_handler(array($errors, 'exceptionHandler'));
        register_shutdown_function(array($errors, 'shutDown'));
    }

    public function controller(){
        $errors = new collectErrors();
        switch ($errors->isAllowedPage($_GET['page']??'')) {
            case 'form':
                require('view/form.php');
                break;
            case 'submit':
                require('src/process.php');
                break;
            case 'login':
                require('view/login.php');
                break;
            case 'logout':
                require('src/logout.php');
                break;
            case 'processLogin':
                require('src/processLogin.php');
                break;
            case 'register':
                require('view/register.php');
                break;
            case 'processRegister':
                require('src/processRegister.php');
                break;
            case 'removeImage':
                require('src/removeImage.php');
                break;
            default:
                require('view/index.php');
        }
    }



}