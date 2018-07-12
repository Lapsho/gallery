<?php

$post = $_POST;

if ($user->validateRegistration($post) && $user->createUser($post['login'], $post['pass'], $connectDB)) {
    header('Location: /');
} else {
    header('Location: /register');
}
