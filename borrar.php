<?php
require_once 'lib/security.php';
require_once 'lib/utils.php';

if (session_id() == "")
  session_start();

if (isAllowed()) {
    $nombre = $_GET['nombre'];

    unlink("posts/$nombre");

    setInfoMessage('Post Borrado');
} else {
    setErrorMessage('Acción no permitida');
}

header("Location: index.php");
