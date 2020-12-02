<?php
require_once 'lib/security.php';
require_once 'lib/utils.php';

if (isAllowed()) {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['descripcion'];
    $ruta = 'posts/'.$titulo;

    if (!file_exists($ruta)) {

        $resultado = file_put_contents($ruta, $contenido);

        if ($resultado == true) {
            setInfoMessage('Post creado con éxito');
            header("Location: index.php");
        } else {
            setErrorMessage('Error al crear el post');
            header("Location: nuevo.php");
        }
    } else {
        setErrorMessage('Ya existe un post con el mismo nombre');
        header("Location: nuevo.php");
    }
} else {
    setErrorMessage('Acción no permitida');
    header("Location: index.php");
}
