<?php
require_once 'lib/security.php';

function getListPosts()
{
    $directorio = 'posts';
    $ficheros = array_diff(scandir($directorio), array('..', '.'));

    $resultado = "<ul>\n";

    foreach ($ficheros as $fichero) {
        $resultado .= "<li>";
        $resultado .= '<a href="ver.php?nombre=' . urlencode($fichero) . '">' . $fichero . '</a>';
        if (isAllowed()) {
            $resultado .= '<a href="borrar.php?nombre=' . urlencode($fichero) . '"> Borrar</a>';
            $resultado .= '<a href="editar.php?nombre=' . urlencode($fichero) . '"> Editar</a>';
        }
        $resultado .= "</li>\n";
    }

    $resultado .= "</ul>\n";

    return $resultado;
}

function getPostHTML()
{
    $fichero = $_GET['nombre'];
    $ruta = "posts/$fichero";

    $contenido = file_get_contents($ruta);

    return $contenido;
}

function getPostContent($fichero)
{
    $ruta = "posts/$fichero";

    $contenido = file_get_contents($ruta);

    return $contenido;
}

function getRecentPosts()
{
    $listado = `ls -t posts`;
    $elementos = explode("\n", $listado);

    $resultado = "<div>\n";
    $resultado .= substr(getPostContent($elementos[0]), 0, 9);
    $resultado .= "</div>\n";
    $resultado .= "<div>\n";
    $resultado .= substr(getPostContent($elementos[1]), 0, 9);
    $resultado .= "</div>\n";

    return $resultado;
}

function getMainActions()
{
    $resultado = '';

    if (isAllowed()) {
        $resultado .= '<p><a href="nuevo.php">Nuevo</a></p>';
    }

    return $resultado;
}

function getInfoMessage()
{
    session_start();
    $resultado = '';

    if (isset($_SESSION['info'])) {
        $resultado .= '<div class="alert alert-primary" role="alert">';
        $resultado .= $_SESSION['info'];
        $resultado .= "</div>";
        unset($_SESSION['info']);
    }

    return $resultado;
}

function getErrorMessage()
{
    session_start();
    $resultado = '';

    if (isset($_SESSION['error'])) {
        $resultado .= '<div class="alert alert-danger" role="alert">';
        $resultado .= $_SESSION['error'];
        $resultado .= "</div>";
        unset($_SESSION['error']);
    }

    return $resultado;
}

function setInfoMessage($message){
    
    session_start();
    $_SESSION['info'] = $message;
}

function setErrorMessage($message){
    
    session_start();
    $_SESSION['error'] = $message;
}
