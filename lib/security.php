<?php
function isAllowed(){
    session_start();
    if (isset($_SESSION['autenticado']) && $_SESSION['autenticado']){
        return true;
    }
    else{
        return false;
    }
}