<?php
session_start();
include "../config/conexion.php";
if (isset($_POST['login'])) {
  $usuario=$_POST['usuario'];
  $pass=$_POST['pass'];
  $result = $conexion->query("select * from usuarios where usuario=" .$usuario);
  if($result){
    while ($fila = $result->fetch_object()) {
      echo '<script>prueba();<script>';
    }
    //$row=mysql_fetch_array($result);
  //  $_SESSION['usuario']=$row['usuario'];
    //echo 'Bienvenido a Pacholi 2018',$_SESSION['usuario'],'<p>';
  }else{
    echo '<script>alert("usuario o caontraseña incorrectos");<script>';
    echo '<script>window.location="../index.php";script>';
  }
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script type="text/javascript">
      function prueba()
      {
        alert("funciona validacion d eusaurio");
      }
    </script>
  </head>
  <body>

  </body>
</html>
