<?php

$post = $_POST;

if ($user->validateLogin($post) && $user->authUser($post['login'], $post['pass'], $connectDB)) {
    header('Location: /');
} else {
    header('Location: /login');
}
