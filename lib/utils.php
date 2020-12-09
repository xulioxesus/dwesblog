<?php
require_once 'lib/security.php';

function getListPosts()
{
    $directorio = 'posts';
    $ficheros = array_diff(scandir($directorio), array('..', '.'));

    $resultado = "<ul class=\"list-group\">\n";

    foreach ($ficheros as $fichero) {
        $resultado .= '<li class="list-group-item">';
        $resultado .= '<a href="ver.php?nombre=' . urlencode($fichero) . '">' . $fichero . '</a> ';
        if (isAllowed()) {
            $resultado .= '<a class="btn btn-danger" href="borrar.php?nombre=' . urlencode($fichero) . '">Borrar</a> ';
            $resultado .= '<a class="btn btn-warning" href="editar.php?nombre=' . urlencode($fichero) . '">Editar</a>';
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
        $resultado .= '<p><a class="btn btn-primary" href="nuevo.php">Nuevo</a></p>';
    }

    return $resultado;
}

function getInfoMessage()
{
    if (session_id() == "")
        session_start();
        
    $resultado = '';

    if (isset($_SESSION['info'])) {
        $resultado .= '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
        $resultado .= $_SESSION['info'];
        $resultado .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>';
        $resultado .= "</div>";
        unset($_SESSION['info']);
    }

    return $resultado;
}

function getErrorMessage()
{
    if (session_id() == "")
        session_start();

    $resultado = '';

    if (isset($_SESSION['error'])) {
        $resultado .= '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        $resultado .= $_SESSION['error'];
        $resultado .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>';
        $resultado .= "</div>";
        unset($_SESSION['error']);
    }

    return $resultado;
}

function setInfoMessage($message){
    
    if (session_id() == "")
        session_start();

    $_SESSION['info'] = $message;
}

function setErrorMessage($message){
    
    if (session_id() == "")
        session_start();
    $_SESSION['error'] = $message;
}

function setPost($titulo, $contenido){
    if (session_id() == "")
        session_start();
    $_SESSION['descripcion'] = $contenido;
    $_SESSION['titulo'] = $titulo;
}

function getPost(&$titulo, &$contenido){
    if (session_id() == "")
        session_start();
    $titulo = $_SESSION['titulo'];
    $contenido = $_SESSION['descripcion'];
    unset($_SESSION['titulo']);
    unset($_SESSION['descripcion']);
}
