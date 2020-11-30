<?php
session_start();

if (isset($_REQUEST['entrar'])) {

    if ($_REQUEST['usuario'] == 'admin' && $_REQUEST['password'] == 'admin123') {

        $_SESSION['autenticado'] = true;
        $_SESSION['info'] = 'Sesión iniciada';
        unset($_SESSION['error']);
    } else {
        $_SESSION['autenticado'] = false;
        $_SESSION['error'] = 'Usuario o contraseña incorrecta';
        unset($_SESSION['info']);
    }
} else if (isset($_REQUEST['salir'])) {
    $_SESSION = array();
    session_destroy();
    session_start();
    $_SESSION['autenticado'] = false;
    $_SESSION['info'] = 'Sesión terminada';
}

header("Location: index.php");
