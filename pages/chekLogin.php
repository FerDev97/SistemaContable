<?php

	if(isset($_POST["enviar"])) {
			$loginNombre = $_POST["usuario"];
			$loginPassword =$_POST["pass"];
      $correcto=false;
    include "../config/conexion.php";
      $result = $conexion->query("select * from usuarios where usuario= '$loginNombre' AND pass='$loginPassword'");
      echo "<script>function hola(){
        alert('".$loginNombre."');
      }</script>";
if ($result) {
    while ($fila = $result->fetch_object()) {
        $passR = $fila->pass;
        if($passR==$loginPassword){
          $correcto=true;
        }
    }
}
			if(isset($loginNombre) && isset($loginPassword)) {

				if($correcto==true) {

					session_start();
					$_SESSION["logueado"] = TRUE;
					header("Location: main.php");

				}
				else {
					Header("Location: ../index.php?error=login");
				}

			}

		} else {
			header("Location: ../index.php");
		}
 ?>
