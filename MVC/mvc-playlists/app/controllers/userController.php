<?php

require_once("models/User.php");
require_once("models/UserRepository.php");


if (isset($_POST['login'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $hashedPassword = md5($_POST['password']);
        $user = UserRepository::login($_POST['username'], $hashedPassword);

        if ($user) {
            $_SESSION['user'] = $user;
            header('Location: index.php');
            exit();
        } else {
            $info = "Error en el login";
        }
    }
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = "normal";
    $user = UserRepository::register($username, $password, $role);

    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: index.php?c=login');
        exit();
    } else {
        $info = "Error en el registro";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php?c=login');
    exit();
}

if (isset($_GET['register'])) {
    require_once("views/registerView.phtml");
} else {
    require_once("views/loginView.phtml");
}
