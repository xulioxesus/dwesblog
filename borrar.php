<?php
    $nombre = $_GET['nombre'];
    
    unlink("posts/$nombre");
    
    header("Location: index.php");
        
?>