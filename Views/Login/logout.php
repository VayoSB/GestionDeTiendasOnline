<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    } 
    unset($_SESSION["id_usuario"]);
    unset($_SESSION["nombre"]);
    require_once('Views/Login/login.php');
?>