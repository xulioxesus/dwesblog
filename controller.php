<?php
require_once 'lib/utils.php';
session_start();

if (isset($_REQUEST['entrar'])) {

    if ($_REQUEST['usuario'] == 'admin' && $_REQUEST['password'] == 'admin123') {

        $_SESSION['autenticado'] = true;
        setInfoMessage('Sesión iniciada');
    } else {
        $_SESSION['autenticado'] = false;
        setErrorMessage('Usuario o contraseña incorrecta');
    }
} else if (isset($_REQUEST['salir'])) {
    
    $_SESSION = array();
    session_destroy();

    session_start();
    $_SESSION['autenticado'] = false;
    setInfoMessage('Sesión terminada');
}

header("Location: index.php");
