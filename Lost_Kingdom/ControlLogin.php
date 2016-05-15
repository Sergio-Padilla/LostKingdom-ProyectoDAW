<?php
require_once 'Datos.php';
session_start();

$datos = new Datos();

$usuario = $_REQUEST["usuario"];
$pass = $_REQUEST["pass"];
$pagina= "index.php";

if($datos->comprobarLogin($usuario, $pass)){
    
    $pagina="juegos.php";
    $_SESSION["usuario"]=$usuario;
    
}else{
    
    $pagina= "index.php";
}
 $_SESSION["datos"]=$datos;
header("Location:$pagina");
 echo $usuario;
 echo $pass;
 
 echo $pagina;
