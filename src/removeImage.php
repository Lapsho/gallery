<?php

$id = $_REQUEST['id'];
$user = new contentManaging();

$user->deleteImage($id);

header('Location: /');