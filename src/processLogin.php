<?php

$user = new User();
$post = $_POST;


if ($user->validateLogin($post) && $user->authUser($post['login'], $post['pass'])) {
    header('Location: /');
} else {
    header('Location: /login');
}

