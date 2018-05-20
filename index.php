<?php
require_once "php/pool.php";

switch ($_GET['page']??'') {
    case '':
        require('pages/index.php');
        break;
    case 'form':
        require('pages/form.php');
        break;
}