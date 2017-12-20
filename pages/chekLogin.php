

<?php
session_start();
include "../config/conexion.php";
if (isset($_POST['login'])) {
  $usuario=$_POST['usuario'];
  $pass=$_POST['pass'];
  $result = $conexion->query("select * from usuarios where usuario=" .$usuario);
  if(($result->num_rows)>0){
    $row=mysql_fetch_array($result);
    $_SESSION['usuario']=$row['usuario'];
    echo 'Bienvenido a Pacholi 2018',$_SESSION['usuario'],'<p>';
    echo '<script>window.location="main.php";<script>';
  }else{
    echo '<script>alert("usuario o caontraseña incorrectos");<script>';
    echo '<script>window.location="../index.php";script>';
  }
}

 ?>
