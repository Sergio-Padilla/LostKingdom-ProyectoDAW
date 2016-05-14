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
    
    function __construct() {
        $this->error = "";
    }
    function getError() {
        return $this->error;
    }

    function setError($error) {
        $this->error = $error;
    }

    
    function abrirConexion(){
        $con = mysqli_connect("localhost", "root", "", "");
        return $con;
    }
    
    function cerrarConexion(){
          mysqli_close($con);
    }
    
    function comprobarLogin($usuario, $pass){
        
        $con = $this->abrirConexion();
        
        if(isset($usuario) && isset($pass) && $usuario!="" && $pass!=""){
            $sql="select USUARIO, CONTRASEÑA from TABLA where USUARIO= \"$usuario\" and CONTRASEÑA = \"$pass\";";
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
 
}
