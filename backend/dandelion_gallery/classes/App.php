<?php
/**
 * Created by PhpStorm.
 * User: Andry
 * Date: 21.06.2018
 * Time: 18:46
 */


/** Controller
 *
 * Class App
 */
class App
{
    /** Automated detection and registration of errors
     *
     * App constructor.
     */
    public function __construct()
    {
        $errors = new CollectErrors();
        set_error_handler(array($errors, 'errorHandler'), -1);
        set_exception_handler(array($errors, 'exceptionHandler'));
        register_shutdown_function(array($errors, 'shutDown'));
    }


    /** Controller
     *
     */
    public function controller()
    {
        $errors = new CollectErrors();
        switch ($errors->isAllowedPage($_GET['page'] ?? '')) {
            case 'form':
                $collectErrors = new CollectErrors();
                require('pages/form.php');
                break;
            case 'submit':
                $user = new ContentManaging();
                $connectDB = new ConnectDB();
                require('backend/dandelion_gallery/helpers/process.php');
                break;
            case 'login':
                $collectErrors = new CollectErrors();
                require('pages/login.php');
                break;
            case 'logout':
                $user = new User();
                require('backend/dandelion_gallery/helpers/logout.php');
                break;
            case 'processLogin':
                $connectDB = new ConnectDB();
                $user = new User();
                require('backend/dandelion_gallery/helpers/processLogin.php');
                break;
            case 'register':
                $collectErrors = new CollectErrors();
                require('pages/register.php');
                break;
            case 'processRegister':
                $connectDB = new ConnectDB();
                $user = new User();
                require('backend/dandelion_gallery/helpers/processRegister.php');
                break;
            case 'removeImage':
                $user = new ContentManaging();
                $connectDB = new ConnectDB();
                require('backend/dandelion_gallery/helpers/removeImage.php');
                break;
            case 'switchCollections':
                require('backend/dandelion_gallery/helpers/switchCollections.php');
                break;
            default:
                $connectDB = new ConnectDB();
                $collectErrors = new CollectErrors();
                $getCollection = new Collection();
                $pagination = new Pagination();
                require('pages/index.php');
        }
    }

}