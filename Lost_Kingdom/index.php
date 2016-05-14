
<!DOCTYPE html>
<?php
require_once 'Datos.php';
session_start();

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login-Lost Kingdom</title>
    </head>
    <body>
        <header><h1>LOGIN</h1></header>
        <nav><!-- NAVEGACION -->
            <ul>
                <li>SITIO 1</li>
                <li>SITIO 2</li>
                <li>SITIO 3</li>
                <li>SITIO 4</li>
            </ul>
        </nav>
        <form name="Login" method="post" action="../Controladores/ControlLogin.php">
            <hr>
            <div><!--ERRORES -->
                <?php
                  $datos = new Datos();
                  if(isset($_SESSION["datos"]) && !empty($_SESSION["datos"]->getError())) { ?>
                    <p><?= $_SESSION["datos"]->getError()?></p>
                <?php } ?>
            </div>
            <br>
            <div> <!--LOGIN -->  
                Usuario:<br>
                <input type="text" name="usuario"><br><br>
                Contraseña:<br>
                <input type="password" name="pass"><br><br>
                <input type="submit" name="Enviar" value="Iniciar Sesion"><a href="registro.php" style="float: left; width: 90px; text-decoration: none"><input type="button" value="Registrarse"></a>
            </div>    
        </form>
        <footer></footer><!-- FOOTER-->
    </body>
</html>
