<?php
require_once 'lib/security.php';

session_start();

if (isAllowed()) {
    $nombre = $_GET['nombre'];

    unlink("posts/$nombre");
    $_SESSION['info'] = 'Post Borrado';
    unset($_SESSION['error']);
}else{
    $_SESSION['error'] = 'Acción no permitida';
    unset($_SESSION['info']);
}

header("Location: index.php");
