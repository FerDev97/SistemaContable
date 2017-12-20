

<?php
session_start();
include "../config/conexion.php";
if (isset($_POST['login'])) {
  $usuario=$_POST['usuario'];
  $pass=$_POST['pass'];
  $log=mysql_query("SELECT * FROM usuarios WHERE usuario='$usuario' AND pass='$pass'");
  if(mysql_num_rows($log)>0){
    $row=mysql_fetch_array($log);
    $_SESSION['usuario']=$row['usuario'];
    echo 'Bienvenido a Pacholi 2018',$_SESSION['usuario'],'<p>';
    echo '<script>window.location="main.php";<script>';
  }else{
    echo '<script>alert("usuario o caontraseña incorrectos");<script>';
    echo '<script>window.location="../index.php";script>';
  }
}

 ?>
