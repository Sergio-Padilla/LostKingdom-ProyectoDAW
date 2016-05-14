<?php
require_once '../Logica/Datos.php';
session_start();

$datos = new Datos();

$usuario = $_REQUEST["usuario"];
$pass = $_REQUEST["pass"];
$pagina= "../Vistas/index.php";

if($datos->comprobarLogin($usuario, $pass)){
    
    $pagina="../Vistas/GALERIA_JUEGOS.php";
    $_SESSION["usuario"]=$usuario;
    
}else{
    
    $pagina= "../Vistas/index.php";
}
 $_SESSION["datos"]=$datos;
header("Location:$pagina");
