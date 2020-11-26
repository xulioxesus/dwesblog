<?php
    // Leer titulo y descripción
    $titulo = $_POST['titulo'];
    $contenido = $_POST['descripcion'];

    
    // Crear un fichero en el directorio posts.
    // Si el proceso ok
        // Saltar al índice
    // Sino
        // Saltar a nuevo.php

    $resultado = file_put_contents("posts/$titulo",$contenido);

    if ($resultado == true){
        header("Location: index.php");
    }
    else{
        header("Location: nuevo.php");
    }

    
?>