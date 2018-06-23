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
        $errors = new CollectErrors();
        set_error_handler(array($errors, 'errorHandler'), -1);
        set_exception_handler(array($errors, 'exceptionHandler'));
        register_shutdown_function(array($errors, 'shutDown'));
    }

    public function controller(){
        $errors = new CollectErrors();
        switch ($errors->isAllowedPage($_GET['page']??'')) {
            case 'form':
                $collectErrors = new CollectErrors();
                require('view/form.php');
                break;
            case 'submit':
                $user = new ContentManaging();
                require('src/process.php');
                break;
            case 'login':
                $collectErrors = new CollectErrors();
                require('view/login.php');
                break;
            case 'logout':
                $user = new User();
                require('src/logout.php');
                break;
            case 'processLogin':
                $user = new User();
                require('src/processLogin.php');
                break;
            case 'register':
                $collectErrors = new CollectErrors();
                require('view/register.php');
                break;
            case 'processRegister':
                $user = new User();
                require('src/processRegister.php');
                break;
            case 'removeImage':
                $user = new ContentManaging();
                require('src/removeImage.php');
                break;
            default:
                $collectErrors = new CollectErrors();
                $getCollection = new Collection();
                $pagination = new Pagination();
                require('view/index.php');
        }
    }



}