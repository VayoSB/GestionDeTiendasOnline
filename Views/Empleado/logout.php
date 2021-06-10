<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    } 
    unset($_SESSION["id"]);
    unset($_SESSION["nombre"]);
    require_once('Views/Empleado/login.php');
?>