<?php session_start();
if (!isset($_REQUEST['bandera'])) {
  unset($_SESSION["acumulador"]);
  unset($_SESSION["matriz"]);
}
include "../config/conexion.php";
$result = $conexion->query("select * from partida");
$numeroPartida=($result->num_row)+1;

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pacholi2018</title>
  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">


  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/datatables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/animate.min.css"/>
  <link href="../asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="../asset/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script type="text/javascript">
      //funcion para llenar los datos desde el modalForm
      function llenarDatos(codigo,nombre)
      {

        document.getElementById("codigoCuenta").value=codigo;

      var str=  nombre.replace(".", " ");
        document.getElementById("nombreCuenta").value=str;

      }

      function verificar(){
          if(document.getElementById('nivelcuenta').value=="" || document.getElementById('codigocuenta').value=="" || document.getElementById('nombrecuenta').value=="" || document.getElementById('tipocuenta').value=="SELECCIONE" || document.getElementById('saldocuenta').value=="SELECCIONE"){
            alert("Complete los campos");
          }else{
            if (document.getElementById("aux").value=="modificar") {
            comprobarR(document.getElementById('codigocuenta').value);
            document.getElementById('bandera').value="modificar";
            document.turismo.submit();
            }else
            {
              comprobarR(document.getElementById('codigocuenta').value);
            document.getElementById('bandera').value="add";
           document.turismo.submit();
            }
            }
        }
        function modify(id)
        {
         document.location.href='cuenta.php?id='+id;
        }
         function confirmar(id)
        {
          if (confirm("!!Advertencia!! Desea Eliminar Este Registro?")) {
            document.getElementById('bandera').value='desaparecer';
            document.getElementById('baccion').value=id;
            alert(id);
            document.turismo.submit();
          }else
          {
            alert("Error al borrar.");
          }
        }
        //funcionPara llenar la tabla con las partidas
        function aggPartida(str){
          alert(str);
          if (str==""){
            document.getElementById("tablaPartida").innerHTML="";
            return;
          }
          if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        }else  {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
          if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("tablaPartida").innerHTML=xmlhttp.responseText;
          }
        }
          if (str=="agg") {
            var codigoCuenta=document.getElementById("codigoCuenta").value;
            var nombreCuenta=document.getElementById("nombreCuenta").value;
            var montoPartida=document.getElementById("montoPartida").value;
            var montoPartida=document.getElementById("montoPartida").value;
            var opciones=document.getElementsByName("optradio");
            var accion="";
            for (var i = 0; i < opciones.length; i++) {
              if (opciones[i].checked==true) {
                accion=opciones[i].value;
              }
            }
            alert(accion);
            if (codigoCuenta==" " || nombreCuenta==" "|| montoPartida==" ") {
              alert("Por Favor Llene los datos antes de ingresar la partida.");
            }else {
              xmlhttp.open("GET","AddCuenta.php?codigo="+codigoCuenta+"&concepto="+nombreCuenta+"&monto="+montoPartida+"&accion="+accion,true);
              xmlhttp.send();
              document.getElementById("codigoCuenta").value=" ";
              document.getElementById("nombreCuenta").value=" ";
              document.getElementById("montoPartida").value=" ";
              document.getElementById("montoPartida").value=" ";
            }
          }



        }

      </script>
</head>

<body id="mimin" class="dashboard">
      <?php include "header.php"?>

      <div class="container-fluid mimin-wrapper">

<?php include "menu.php";?>
            <div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Libro Diario</h3>
                        <p class="animated fadeInDown">
                          Tabla <span class="fa-angle-right fa"></span> Partida
                        </p>
                    </div>
                  </div>
              </div>
              <form id="turismo" name="turismo" action="" method="post">
              <input type="hidden" name="bandera" id="bandera">
              <input type="hidden" name="baccion" id="baccion" value="<?php echo $idcatalogoR; ?>" >
              <input type="hidden" name="aux" id="aux" value="<?php echo $aux; ?>">
              <input type="hidden" name="r" id="r" value="">
              <div class="col-md-12 top-20 padding-0">
               <div class="col-md-5">
                            <div class="form-group form-animate-text" style="margin-top:0px !important;">
                              <input type="text" class="form-text" id="conceptoPartida" name="conceptoPartida" >
                              <span class="bar"></span>
                              <label>Concepto</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:30px !important;">
                              <input type="date" class="form-text" id="fechaPartida" name="fechaPartida" >
                              <span class="bar"></span>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:30px !important;">
                              <input type="text" class="form-text" id="codigoCuenta" name="codigoCuenta" >
                              <span class="bar"></span>
                              <label>Codigo</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:30px !important;">
                              <input type="text" class="form-text" id="nombreCuenta" name="nombreCuenta"  >
                              <span class="bar"></span>
                              <label>Cuenta</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:30px !important;">
                              <input type="text" class="form-text" id="montoPartida" name="montoPartida"  >
                              <span class="bar"></span>
                              <label>Monto $</label>
                            </div>
                            <div class="radio">
                            <label class="radio-inline" style="font-size:20px;padding:10px 20px;"><input type="radio" id="accion" name="optradio" style="width:20px;height:20px"checked="checked" value="cargo"> Cargo</label>

                            <label class="radio-inline" style="font-size:20px;padding:10px 100px;"><input type="radio" id="accion2" name="optradio" style="width:20px;height:20px" value="abono"> Abono</label>
                          </div>
                        </br>

                          <div class="col-md-3">
                              <button type="button" class="btn-flip btn btn-gradient btn-primary" onclick="aggTabla()">
                                <div class="flip">
                                  <div class="side">
                                    Procesar <span class="fa fa-edit"></span>
                                  </div>
                                  <div class="side back">
                                    Continuar?
                                  </div>
                                </div>
                                <span class="icon"></span>
                              </button>
                          </div>
                            <div class="col-md-1">


                            </div>
                          <div class="col-md-3">
                            <button type="button" class="btn-flip btn btn-gradient btn-success" onclick="aggPartida('agg')">
                              <div class="flip">
                                <div class="side">
                                  Agregar <span class="fa fa-edit"></span>
                                </div>
                                <div class="side back">
                                  Partida
                                </div>
                              </div>
                              <span class="icon"></span>
                            </button>
                        </div>
                        <div class="col-md-1">


                        </div>
                          <!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Seleccione la cuenta para agregar a la partida actual.</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                  <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Tipo</th>
                      <th>Saldo</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      include "tablaCuenta.php";
                     ?>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

                          <div class="col-md-3">
                            <button type="button" class="btn-flip btn btn-gradient btn-warning" onclick="verificar()" data-toggle="modal" data-target="#modalForm">
                              <div class="flip">
                                <div class="side">
                                  Cuentas <span class="fa fa-edit"></span>
                                </div>
                                <div class="side back">
                                  Mostrar
                                </div>
                              </div>
                              <span class="icon"></span>
                            </button>
                        </div>

                </div>

                <div class="col-md-7">
                  <div class="col-md-12">
                  <div class="panel" >
                    <div class="panel-heading"><h3>Partida # <?php echo $numeroPartida; ?></h3></div>
                    <div class="panel-body" id="tablaPartida">
                    </div>
                </div>
              </div>
              </div>
              </div>
              </form>
            </div>
          <!-- end: content -->
          <!-- end: right menu -->
      </div>

      <!-- start: Mobile -->
      <div id="mimin-mobile" class="reverse">
        <?php include "menuMobil.php" ?>
      </div>
      <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
      </button>
       <!-- end: Mobile -->

<!-- start: Javascript -->
<script src="../asset/js/jquery.min.js"></script>
<script src="../asset/js/jquery.ui.min.js"></script>
<script src="../asset/js/bootstrap.min.js"></script>



<!-- plugins -->
<script src="../asset/js/plugins/moment.min.js"></script>
<script src="../asset/js/plugins/jquery.datatables.min.js"></script>
<script src="../asset/js/plugins/datatables.bootstrap.min.js"></script>
<script src="../asset/js/plugins/jquery.nicescroll.js"></script>


<!-- custom -->
<script src="../asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
</script>
<!-- end: Javascript -->
</body>
</html>
<?php

include "../config/conexion.php";

$bandera      = $_REQUEST["bandera"];
$baccion      = $_REQUEST["baccion"];
$nivelcuenta  = $_REQUEST["nivelcuenta"];
$nombrecuenta = $_REQUEST["nombrecuenta"];
$codigocuenta = $_REQUEST["codigocuenta"];
$tipocuenta   = $_REQUEST["tipocuenta"];
$saldocuenta  = $_REQUEST["saldocuenta"];
$saldocuenta  = $_REQUEST["saldocuenta"];
$r            = $_REQUEST["r"];
if ($bandera == "add") {
    $consulta  = "INSERT INTO catalogo VALUES('null','" . $codigocuenta . "','" . $nombrecuenta . "','" . $tipocuenta . "','" . $saldocuenta . "','" . $r . "','" . $nivelcuenta . "')";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("Exito");
    } else {
        msg("No Exito");
    }
}
if ($bandera == "desaparecer") {
    $consulta  = "DELETE FROM catalogo where idcatalogo='" . $baccion . "'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("Exito");
    } else {
        msg("No Exito");
    }
}
if ($bandera == "modificar") {
    $consulta  = "UPDATE catalogo set codigocuenta='" . $codigocuenta . "',nombrecuenta='" . $nombrecuenta . "',tipocuenta='" . $tipocuenta . "',saldocuenta='" . $saldocuenta . "',r='" . $r . "',nivelcuenta='" . $nivelcuenta . "' where idcatalogo='" . $baccion . "'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("En Hora Buena");
    } else {
        msg("No Exito");
    }
}
if ($bandera == 'enviar') {
    echo "<script type='text/javascript'>";
    echo "document.location.href='editcliente.php?id=" . $baccion . "';";
    echo "</script>";
    # code...
}
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "document.location.href='cuenta.php';";
    echo "</script>";
}
?>
