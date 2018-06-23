<?php

$id = $_REQUEST['id'];

$user->deleteImage($id);
header('Location: /');
