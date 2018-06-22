<?php
error_reporting(E_ALL | E_STRICT);
session_start();

spl_autoload_register(function ($classname) {
    require_once('src/class/' . $classname . '.php');
});

$app = new App();
$app->controller();