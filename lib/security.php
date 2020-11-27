<?php
session_start();
function isAllowed(){
    if (isset($_SESSION['autenticado']) && $_SESSION['autenticado']){
        return true;
    }
    else{
        return false;
    }
}

if (!isAllowed()){
    header("Location: index.php");
}