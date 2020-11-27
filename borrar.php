<?php
session_start();

if (isset($_SESSION['autenticado']) && $_SESSION['autenticado']) {
    $nombre = $_GET['nombre'];

    unlink("posts/$nombre");
    $_SESSION['info'] = 'Post Borrado';
    unset($_SESSION['error']);
}else{
    $_SESSION['info'] = 'Acción no permitida';
    unset($_SESSION['error']);
}

header("Location: index.php");
