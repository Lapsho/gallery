<?php

error_reporting(E_ALL | E_STRICT);
session_start();

spl_autoload_register(function ($classname) {
    require_once('backend/dandelion_gallery/classes/' . $classname . '.php');
});

//require_once 'lib/vendor/autoload.php';
//Twig_Autoloader::register();


$app = new App();
$app->controller();

