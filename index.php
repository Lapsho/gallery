<?php
require_once "php/image.php";

switch ($_GET['page']??'') {
    case '':
        require('pages/index.php');
        break;
    case 'form':
        require('pages/form.php');
        break;
}