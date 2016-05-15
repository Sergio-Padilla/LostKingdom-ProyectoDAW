<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Datos
 *
 * @author Marta
 */
class Datos {
    private $error;
    public $con; //Elemento de conexión
    private $urlConexion; //URL de conexxión
    private $base; //Base de datos asociada
    private $username; //Usuario de la base de datos
    private $pass;   //Contraseña de la base de datos
    
   
    function getError() {
        return $this->error;
    }

    function setError($error) {
        $this->error = $error;
    }

    function __construct() {
        $this->base="lostkingdom";
        $this->urlConexion="localhost";
        $this->username="root";
        $this->pass="";
        $this->error="";
    }

    function abrirConexion(){
        $this->con=null;
        $con = mysqli_connect("localhost","root","rutherford","lostkingdom");
        $this->con=$con;
        
        return $this->con;
    }
    
    function cerrarConexion(){
          mysqli_close($this->con);
    }
    
    function comprobarLogin($usuario, $pass){
        
        $con = $this->abrirConexion();
        
        if(isset($usuario) && isset($pass) && $usuario!="" && $pass!=""){
            $sql="select usu_nick, usu_pass from usuarios where usu_nick= \"$usuario\" and usu_pass = \"$pass\";";
            $result =  mysqli_query($con, $sql);
            $array = mysqli_fetch_assoc($result);
         
            if(isset($array)){ 
                
                 return TRUE;
            }else{
                $this->error = "Datos mal introducidos<br>";
                 return FALSE;
            }
        }else{
            return FALSE;
            $this->error = "Rellena los campos<br>";
        }
        
    }
    
    function getCon() {
        return $this->con;
    }

    function getUrlConexion() {
        return $this->urlConexion;
    }

    function getBase() {
        return $this->base;
    }

    function getUsername() {
        return $this->username;
    }

    function getPass() {
        return $this->pass;
    }

    function setCon($con) {
        $this->con = $con;
    }

    function setUrlConexion($urlConexion) {
        $this->urlConexion = $urlConexion;
    }

    function setBase($base) {
        $this->base = $base;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }


 
}
