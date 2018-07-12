<?php

$id = $_REQUEST['id'];

$user->deleteImage($id, $connectDB);
header('Location: /');
