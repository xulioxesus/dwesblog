<?php
require_once 'lib/security.php';

if (isAllowed()) {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['descripcion'];

    $resultado = file_put_contents("posts/$titulo", $contenido);

    if ($resultado == true) {
        header("Location: index.php");
    } else {
        header("Location: nuevo.php");
    }
} else {
    $_SESSION['error'] = 'Acción no permitida';
    unset($_SESSION['info']);
    header("Location: index.php");
}
