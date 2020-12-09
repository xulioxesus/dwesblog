<?php
function isAllowed()
{
    if (session_id() == "")
        session_start();
        
    if (isset($_SESSION['autenticado']) && $_SESSION['autenticado']) {
        return true;
    } else {
        return false;
    }
}
