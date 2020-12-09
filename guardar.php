<?php
require_once 'lib/security.php';
require_once 'lib/utils.php';

function handleNuevo($titulo, $contenido, $ruta){
    if (!file_exists($ruta)) {

        $resultado = file_put_contents($ruta, $contenido);

        if ($resultado == true) {
            setInfoMessage('Post creado con éxito.');
            header("Location: index.php");
        } else {
            setErrorMessage('Error al crear el post');
            setPost($titulo, $contenido);
            header("Location: nuevo.php");
        }
    } else {
        setErrorMessage('Ya existe un post con el mismo nombre');
        setPost($titulo, $contenido);
        header("Location: nuevo.php");
    }
}

function handleEditar($titulo, $contenido, $ruta){
    if (!file_exists($ruta)) {

        $resultado = file_put_contents($ruta, $contenido);

        if ($resultado == true) {
            setInfoMessage('Post editado con éxito.Deberá borrar manualmente el post antiguo');
            header("Location: index.php");

        } else {
            setErrorMessage('Error al crear el post');
            setPost($titulo, $contenido);
            header("Location: editar.php");
        }
    } else {
        $resultado = file_put_contents($ruta, $contenido);

        if ($resultado == true) {
            setInfoMessage('Post editado con éxito');
            header("Location: index.php");
        } else {
            setErrorMessage('Error al editar el post');
            setPost($titulo, $contenido);
            header("Location: editar.php");
        }
    }
}

if (isAllowed()) {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['descripcion'];
    $ruta = 'posts/'.$titulo;

    if (isset($_POST['nuevo'])){
        handleNuevo($titulo, $contenido, $ruta);
    }
    else if (isset($_POST['editar'])){
        handleEditar($titulo, $contenido, $ruta);
    }
} else {
    setErrorMessage('Acción no permitida');
    header("Location: index.php");
}
