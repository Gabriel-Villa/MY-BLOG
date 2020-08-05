<?php

include(ROOT_PATH . "/app/db/db.php");
include(ADMIN_PATH . "/app/helpers/middlewares.php");

$errores = '';
$enviado = '';

function loginUser($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'Ahora estas logeado';
    $_SESSION['type'] = 'success';
    if ($_SESSION['admin']) {
        header('location: ' . BASE_URL . '/admin/dashboard.php');
    } else {
        header('location: ' . BASE_URL . '/index.php');
    }

    exit();
}


if (isset($_POST['registr-btn'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    if (empty($username)) {
        $errores .= 'Por favor ingresa un usuario.<br />';
    }

    if (empty($email)) {
        $errores .= 'Por favor ingresa un correo.<br />';
    }

    $users = selectOne('users', ['email' => $email]);
    if ($users) {
        $errores .= 'El email ya existe. <br />';
    }

    if (empty($password)) {
        $errores .= 'Por favor ingresa la contraseña.<br />';
    }


    if (!$errores) {
        $enviado = 'true';
        unset($_POST['repeat-password-register'], $_POST['registr-btn']);
        $_POST['admin'] = 0;
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_id = create('users', $_POST);
        $user = selectOne('users', ['id' => $user_id]);
        loginUser($user);
    }
}



if (isset($_POST['login-btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        $errores .= 'Por favor ingresa un usuario.<br />';
    }

    if (empty($password)) {
        $errores .= 'Por favor ingresa la contraseña.<br />';
    }

    if (!$errores) {
        $user = selectOne('users', ['username' => $username]);
        loginUser($user);
    } else {
        $errores .= "Credenciales erroneas.<br />";
    }
}
