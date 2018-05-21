<?php
error_reporting(E_ALL | E_STRICT);
session_start();

require_once "php/pool.php";

switch (isAllowedPage($_GET['page']??'')) {
    case '':
        require('pages/index.php');
        break;

    case 'form':
        require('pages/form.php');
        break;

    case 'submit':
        require('php/scripts/process.php');
        break;

    case 'login':
        require('pages/login.php');
        break;
    case 'logout':
        require('php/scripts/logout.php');
        break;

    case 'processLogin':
        require('php/scripts/processLogin.php');
        break;

    default:
        require('pages/index.php');
}