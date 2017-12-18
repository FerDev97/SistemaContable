<<<<<<< HEAD
<?php
$id  = $_REQUEST["id"];
$aux = " ";
$tipocuentaR="Ninguno";
$saldocuentaR="Ninguno";
include "../config/conexion.php";
$result = $conexion->query("select * from catalogo where idcatalogo=" . $id);
if ($result) {
    while ($fila = $result->fetch_object()) {
        $idcatalogoR   = $fila->idcatalogo;
        $codigocuentaR = $fila->codigocuenta;
        $nombrecuentaR = $fila->nombrecuenta;
        $tipocuentaR   = $fila->tipocuenta;
        $saldocuentaR  = $fila->saldo;
        $rR            = $fila->r;
        $nivelR        = $fila->nivel;
    }
    $aux = "modificar";
}
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
      function comprobarR(cadena)
      {
        if (cadena.indexOf('r')!=-1 || cadena.indexOf('R')!=-1) {
          document.getElementById('r').value="R";
          alert("LLeva R");
        }else
        {
           document.getElementById('r').value="";
        }
      }
      function generarNivel()
      {
        if (document.getElementById('codigocuenta').value.length==1) {
          document.getElementById('nivelcuenta').value=1;
        }
        if (document.getElementById('codigocuenta').value.length==2) {
          document.getElementById('nivelcuenta').value=2;
        }
        if (document.getElementById('codigocuenta').value.length==3) {
          document.getElementById('nivelcuenta').value=3;
        }
        if (document.getElementById('codigocuenta').value.length>3 && document.getElementById('codigocuenta').value.length<6) {
          document.getElementById('nivelcuenta').value=4;
        }
        if (document.getElementById('codigocuenta').value.length>5 && document.getElementById('codigocuenta').value.length<8) {
          document.getElementById('nivelcuenta').value=5;
        }
      }
      function verificar(){
          if(document.getElementById('nivelcuenta').value=="" || document.getElementById('codigocuenta').value=="" || document.getElementById('nombrecuenta').value=="" || document.getElementById('tipocuenta').value=="SELECCIONE" || document.getElementById('saldocuenta').value=="SELECCIONE"){
            alert("Complete los campos");
          }else{
            if (document.getElementById("aux").value=="modificar") {
              alert('Va a modificar.');
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
          document.getElementById('nivelcuenta').value="";
          document.getElementById('codigocuenta').value="";
          document.getElementById('nombrecuenta').value="";
          document.getElementById('tipocuenta').value="SELECCIONE";
          document.getElementById('saldocuenta').value="SELECCIONE";

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
                        <h3 class="animated fadeInLeft">CATALOGO</h3>
                        <p class="animated fadeInDown">
                          Tabla <span class="fa-angle-right fa"></span> Cuentas
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
               <div class="col-md-3">
                            <div class="form-group form-animate-text" style="margin-top:30px !important; width: 100px;">
                              <input type="text" class="form-text" id="nivelcuenta" name="nivelcuenta" style="width: 100px;" value="<?php echo $nivelR; ?>">
                              <span class="bar" style="width: 100px<"></span>
                              <label>Nivel</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:30px !important;">
                              <input type="text" class="form-text" id="nombrecuenta" name="nombrecuenta" value="<?php echo $nombrecuentaR; ?>" required>
                              <span class="bar"></span>
                              <label>Nombre</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:30px !important;">
                              <span class="bar"></span>
                              <label>Tipo</label>
                              <br>
                              <br>
                              <?php
                              if($tipocuentaR=="ACTIVO"){
                                echo '<select id="tipocuenta" class="select2" style="width: 300px; font-size: 20px" name="tipocuenta">
                                <option value="SELECCIONE">SELECCIONE</option>
                                <option value="ACTIVO" selected>ACTIVO</option>
                                <option value="PASIVO">PASIVO</option>
                                <option value="PATRIMONIO">PATRIMONIO</option>
                                <option value="CUENTASRESULTDEUDORAS" >CUENTAS DE RESULTADO DEUDORAS</option>
                                <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                <option value="CUENTASRESULTLIQUID" >CUENTAS DE RESULTADO LIQUIDADORAS</option>
                                <option value="CUENTASCONTINGENTESO" >CUENTAS CONTINGENTES Y ORDEN</option>
                                <option value="CUENTASCONTINGENTESOC" >CUENTAS CONTINGENTES Y ORDEN POR CONTRA</option>
                                </select>';
                              }
                              if($tipocuentaR=="PASIVO"){
                                  echo '<select id="tipocuenta" class="select2" style="width: 300px; font-size: 20px" name="tipocuenta">
                                  <option value="SELECCIONE">SELECCIONE</option>
                                  <option value="ACTIVO">ACTIVO</option>
                                  <option value="PASIVO" selected>PASIVO</option>
                                  <option value="PATRIMONIO">PATRIMONIO</option>
                                  <option value="CUENTASRESULTDEUDORAS" >CUENTAS DE RESULTADO DEUDORAS</option>
                                  <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                  <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                  <option value="CUENTASRESULTLIQUID" >CUENTAS DE RESULTADO LIQUIDADORAS</option>
                                  <option value="CUENTASCONTINGENTESO" >CUENTAS CONTINGENTES Y ORDEN</option>
                                  <option value="CUENTASCONTINGENTESOC" >CUENTAS CONTINGENTES Y ORDEN POR CONTRA</option>
                                  </select>';
                                }
                                if($tipocuentaR=="PATRIMONIO"){
                                    echo '<select id="tipocuenta" class="select2" style="width: 300px; font-size: 20px" name="tipocuenta">
                                    <option value="SELECCIONE">SELECCIONE</option>
                                    <option value="ACTIVO" >ACTIVO</option>
                                    <option value="PASIVO">PASIVO</option>
                                    <option value="PATRIMONIO"selected>PATRIMONIO</option>
                                    <option value="CUENTASRESULTDEUDORAS" >CUENTAS DE RESULTADO DEUDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTLIQUID" >CUENTAS DE RESULTADO LIQUIDADORAS</option>
                                    <option value="CUENTASCONTINGENTESO" >CUENTAS CONTINGENTES Y ORDEN</option>
                                    <option value="CUENTASCONTINGENTESOC" >CUENTAS CONTINGENTES Y ORDEN POR CONTRA</option>
                                    </select>';
                                  }
                                if($tipocuentaR=="CUENTASRESULTDEUDORAS"){
                                    echo '<select id="tipocuenta" class="select2" style="width: 300px; font-size: 20px" name="tipocuenta">
                                    <option value="SELECCIONE">SELECCIONE</option>
                                    <option value="ACTIVO" >ACTIVO</option>
                                    <option value="PASIVO">PASIVO</option>
                                    <option value="PATRIMONIO">PATRIMONIO</option>
                                    <option value="CUENTASRESULTDEUDORAS" selected>CUENTAS DE RESULTADO DEUDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTLIQUID" >CUENTAS DE RESULTADO LIQUIDADORAS</option>
                                    <option value="CUENTASCONTINGENTESO" >CUENTAS CONTINGENTES Y ORDEN</option>
                                    <option value="CUENTASCONTINGENTESOC" >CUENTAS CONTINGENTES Y ORDEN POR CONTRA</option>
                                    </select>';
                                  }
                                if($tipocuentaR=="CUENTASRESULTACREEDORAS"){
                                    echo '<select id="tipocuenta" class="select2" style="width: 300px; font-size: 20px" name="tipocuenta">
                                    <option value="SELECCIONE">SELECCIONE</option>
                                    <option value="ACTIVO" >ACTIVO</option>
                                    <option value="PASIVO">PASIVO</option>
                                    <option value="PATRIMONIO">PATRIMONIO</option>
                                    <option value="CUENTASRESULTDEUDORAS">CUENTAS DE RESULTADO DEUDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" selected>CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTLIQUID" >CUENTAS DE RESULTADO LIQUIDADORAS</option>
                                    <option value="CUENTASCONTINGENTESO" >CUENTAS CONTINGENTES Y ORDEN</option>
                                    <option value="CUENTASCONTINGENTESOC" >CUENTAS CONTINGENTES Y ORDEN POR CONTRA</option>
                                    </select>';
                                  }
                                if($tipocuentaR=="CUENTASRESULTLIQUID"){
                                    echo '<select id="tipocuenta" class="select2" style="width: 300px; font-size: 20px" name="tipocuenta">
                                    <option value="SELECCIONE">SELECCIONE</option>
                                    <option value="ACTIVO" >ACTIVO</option>
                                    <option value="PASIVO">PASIVO</option>
                                    <option value="PATRIMONIO">PATRIMONIO</option>
                                    <option value="CUENTASRESULTDEUDORAS">CUENTAS DE RESULTADO DEUDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTLIQUID" selected>CUENTAS DE RESULTADO LIQUIDADORAS</option>
                                    <option value="CUENTASCONTINGENTESO" >CUENTAS CONTINGENTES Y ORDEN</option>
                                    <option value="CUENTASCONTINGENTESOC" >CUENTAS CONTINGENTES Y ORDEN POR CONTRA</option>
                                    </select>';
                                  }
                                if($tipocuentaR=="CUENTASCONTINGENTESO"){
                                    echo '<select id="tipocuenta" class="select2" style="width: 300px; font-size: 20px" name="tipocuenta">
                                    <option value="SELECCIONE">SELECCIONE</option>
                                    <option value="ACTIVO" >ACTIVO</option>
                                    <option value="PASIVO">PASIVO</option>
                                    <option value="PATRIMONIO">PATRIMONIO</option>
                                    <option value="CUENTASRESULTDEUDORAS">CUENTAS DE RESULTADO DEUDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTLIQUID" >CUENTAS DE RESULTADO LIQUIDADORAS</option>
                                    <option value="CUENTASCONTINGENTESO" selected>CUENTAS CONTINGENTES Y ORDEN</option>
                                    <option value="CUENTASCONTINGENTESOC" >CUENTAS CONTINGENTES Y ORDEN POR CONTRA</option>
                                    </select>';
                                  }
                                if($tipocuentaR=="CUENTASCONTINGENTESOC"){
                                    echo '<select id="tipocuenta" class="select2" style="width: 300px; font-size: 20px" name="tipocuenta">
                                    <option value="SELECCIONE">SELECCIONE</option>
                                    <option value="ACTIVO" >ACTIVO</option>
                                    <option value="PASIVO">PASIVO</option>
                                    <option value="PATRIMONIO">PATRIMONIO</option>
                                    <option value="CUENTASRESULTDEUDORAS">CUENTAS DE RESULTADO DEUDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTLIQUID" >CUENTAS DE RESULTADO LIQUIDADORAS</option>
                                    <option value="CUENTASCONTINGENTESO" >CUENTAS CONTINGENTES Y ORDEN</option>
                                    <option value="CUENTASCONTINGENTESOC" selected >CUENTAS CONTINGENTES Y ORDEN POR CONTRA</option>
                                    </select>';
                                  }
                                  if($tipocuentaR=="Ninguno")  {
                                echo '<select id="tipocuenta" class="select2" style="width: 300px; font-size: 20px" name="tipocuenta">
                                <option value="SELECCIONE" selected >SELECCIONE</option>
                                <option value="ACTIVO" >ACTIVO</option>
                                <option value="PASIVO">PASIVO</option>
                                <option value="PATRIMONIO">PATRIMONIO</option>
                                <option value="CUENTASRESULTDEUDORAS">CUENTAS DE RESULTADO DEUDORAS</option>
                                <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                <option value="CUENTASRESULTLIQUID" >CUENTAS DE RESULTADO LIQUIDADORAS</option>
                                <option value="CUENTASCONTINGENTESO" >CUENTAS CONTINGENTES Y ORDEN</option>
                                <option value="CUENTASCONTINGENTESOC" >CUENTAS CONTINGENTES Y ORDEN POR CONTRA</option>
                                </select>';

                              }
                              ?>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <span class="bar"></span>
                              <label>Saldo</label>
                              <br>
                              <br>
                              <?php
                              if($saldocuentaR=="DEUDOR"){
                                echo '<select id="saldocuenta" class="select2" style="width: 300px; font-size: 20px" name="saldocuenta">
                                <option value="SELECCIONE">SELECCIONE</option>
                                <option value="DEUDOR" selected>DEUDOR</option>
                                <option value="ACREEDOR">ACREEDOR</option>
                                </select>';
                              }
                              if($saldocuentaR=="ACREEDOR"){
                                echo '<select id="saldocuenta" class="select2" style="width: 300px; font-size: 20px" name="saldocuenta">
                                <option value="SELECCIONE">SELECCIONE</option>
                                <option value="DEUDOR">DEUDOR</option>
                                <option value="ACREEDOR" selected>ACREEDOR</option>
                                </select>';
                              }
                              if($saldocuentaR=="Ninguno"){
                                echo '<select id="saldocuenta" class="select2" style="width: 300px; font-size: 20px" name="saldocuenta">
                                <option value="SELECCIONE" selected>SELECCIONE</option>
                                <option value="DEUDOR">DEUDOR</option>
                                <option value="ACREEDOR">ACREEDOR</option>
                                </select>';
                              }
                               ?>
                             </div>
                            <div class="col-md-3">
                              <button type="button" class="btn-flip btn btn-gradient btn-primary" onclick="verificar()">
                                <div class="flip">
                                  <div class="side">
                                    Guardar <span class="fa fa-trash"></span>
                                  </div>
                                  <div class="side back">
                                    continuar?
                                  </div>
                                </div>
                                <span class="icon"></span>
                              </button>
                          </div>
                </div>
                <div class="col-md-2">
                            <div class="form-group form-animate-text" style="margin-top:30px !important; width: 300px;">
                              <input onkeyup="generarNivel()" type="text" class="form-text" id="codigocuenta" name="codigocuenta" value="<?php echo $codigocuentaR; ?>" required>
                              <span class="bar"></span>
                              <label>C&oacute;digo</label>
                            </div>

                </div>
                <div class="col-md-7">
                  <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Lista De Cuentas</h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Codigo</th>
                          <th>Nombre</th>
                          <th>Tipo</th>
                          <th>Saldo</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include "../config/conexion.php";
$result = $conexion->query("select * from catalogo order by codigocuenta");
if ($result) {
    while ($fila = $result->fetch_object()) {
        echo "<tr>";
        echo "<td>
          <div class='col-md-2' style='margin-top:1px'>
            <button class='btn ripple-infinite btn-round btn-warning' onclick='modify(" . $fila->idcatalogo . ")';>
            <div>
              <span>Editar</span>
            </div>
            </button>
            </div>
        </td>";
        //echo "<tr>";
        //echo "<td><img src='img/modificar.png' style='width:30px; height:30px' onclick=modify(".$fila->idasignatura.",'".$fila->codigo."','".$fila->nombre."');></td>";
        //echo "<td><img src='img/eliminar.png' style='width:30px; height:30px' onclick=elyminar(".$fila->idasignatura.",'".$fila->nombre."');></td>";
        echo "<td>" . $fila->codigocuenta . "</td>";
        echo "<td>" . $fila->nombrecuenta . "</td>";
        echo "<td>" . $fila->tipocuenta . "</td>";
        echo "<td>" . $fila->saldo . "</td>";
        echo "<td>
          <div class='col-md-2' style='margin-top:1px'>
            <button class='btn ripple-infinite btn-round btn-success' onclick='confirmar(" . $fila->idcatalogo . ")'>
            <div>
              <span>Borrar</span>
            </div>
            </button>
            </div>
        </td>";
        echo "</tr>";

    }
}
?>
                      </tbody>
                        </table>
                      </div>
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
    $consulta  = "UPDATE catalogo set codigocuenta='" . $codigocuenta . "',nombrecuenta='" . $nombrecuenta . "',tipocuenta='" . $tipocuenta . "',saldo='" . $saldocuenta . "',r='" . $r . "',nivel='" . $nivel . "' where idcatalogo='" . $baccion . "'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("En Hora Buena");
    } else {
        msg("No Exito");
    }
}
if ($bandera == 'enviar') {
    echo "<script type='text/javascript'>";
    echo "document.location.href='cuenta.php?id=" . $baccion . "';";
    echo "</script>";
    # code...
}
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
  //  echo "document.location.href='cuenta.php';";
    echo "</script>";
}
?>
=======
<?php
$id  = $_REQUEST["id"];
$aux = " ";
$tipocuentaR="Ninguno";
$saldocuentaR="Ninguno";
include "../config/conexion.php";
$result = $conexion->query("select * from catalogo where idcatalogo=" . $id);
if ($result) {
    while ($fila = $result->fetch_object()) {
        $idcatalogoR   = $fila->idcatalogo;
        $codigocuentaR = $fila->codigocuenta;
        $nombrecuentaR = $fila->nombrecuenta;
        $tipocuentaR   = $fila->tipocuenta;
        $saldocuentaR  = $fila->saldo;
        $rR            = $fila->r;
        $nivelR        = $fila->nivel;
    }
    $aux = "modificar";
}
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
      function comprobarR(cadena)
      {
        if (cadena.indexOf('r')!=-1 || cadena.indexOf('R')!=-1) {
          document.getElementById('r').value="R";
          alert("LLeva R");
        }else
        {
           document.getElementById('r').value="";
        }
      }
      function generarNivel()
      {
        if (document.getElementById('codigocuenta').value.length==1) {
          document.getElementById('nivelcuenta').value=1;
        }
        if (document.getElementById('codigocuenta').value.length==2) {
          document.getElementById('nivelcuenta').value=2;
        }
        if (document.getElementById('codigocuenta').value.length==3) {
          document.getElementById('nivelcuenta').value=3;
        }
        if (document.getElementById('codigocuenta').value.length>3 && document.getElementById('codigocuenta').value.length<6) {
          document.getElementById('nivelcuenta').value=4;
        }
        if (document.getElementById('codigocuenta').value.length>5 && document.getElementById('codigocuenta').value.length<8) {
          document.getElementById('nivelcuenta').value=5;
        }
      }
      function verificar(){
          if(document.getElementById('nivelcuenta').value=="" || document.getElementById('codigocuenta').value=="" || document.getElementById('nombrecuenta').value=="" || document.getElementById('tipocuenta').value=="SELECCIONE" || document.getElementById('saldocuenta').value=="SELECCIONE"){
            alert("Complete los campos");
          }else{
            if (document.getElementById("aux").value=="modificar") {
              alert('Va a modificar.');
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
          document.getElementById('nivelcuenta').value="";
          document.getElementById('codigocuenta').value="";
          document.getElementById('nombrecuenta').value="";
          document.getElementById('tipocuenta').value="SELECCIONE";
          document.getElementById('saldocuenta').value="SELECCIONE";

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
                        <h3 class="animated fadeInLeft">CATALOGO</h3>
                        <p class="animated fadeInDown">
                          Tabla <span class="fa-angle-right fa"></span> Cuentas
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
               <div class="col-md-3">
                            <div class="form-group form-animate-text" style="margin-top:30px !important; width: 100px;">
                              <input type="text" class="form-text" id="nivelcuenta" name="nivelcuenta" style="width: 100px;" value="<?php echo $nivelR; ?>">
                              <span class="bar" style="width: 100px<"></span>
                              <label>Nivel</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:30px !important;">
                              <input type="text" class="form-text" id="nombrecuenta" name="nombrecuenta" value="<?php echo $nombrecuentaR; ?>" required>
                              <span class="bar"></span>
                              <label>Nombre</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:30px !important;">
                              <span class="bar"></span>
                              <label>Tipo</label>
                              <br>
                              <br>
                              <?php
                              if($tipocuentaR=="ACTIVO"){
                                echo '<select id="tipocuenta" class="select2" style="width: 300px; font-size: 20px" name="tipocuenta">
                                <option value="SELECCIONE">SELECCIONE</option>
                                <option value="ACTIVO" selected>ACTIVO</option>
                                <option value="PASIVO">PASIVO</option>
                                <option value="PATRIMONIO">PATRIMONIO</option>
                                <option value="CUENTASRESULTDEUDORAS" >CUENTAS DE RESULTADO DEUDORAS</option>
                                <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                <option value="CUENTASRESULTLIQUID" >CUENTAS DE RESULTADO LIQUIDADORAS</option>
                                <option value="CUENTASCONTINGENTESO" >CUENTAS CONTINGENTES Y ORDEN</option>
                                <option value="CUENTASCONTINGENTESOC" >CUENTAS CONTINGENTES Y ORDEN POR CONTRA</option>
                                </select>';
                              }
                              if($tipocuentaR=="PASIVO"){
                                  echo '<select id="tipocuenta" class="select2" style="width: 300px; font-size: 20px" name="tipocuenta">
                                  <option value="SELECCIONE">SELECCIONE</option>
                                  <option value="ACTIVO">ACTIVO</option>
                                  <option value="PASIVO" selected>PASIVO</option>
                                  <option value="PATRIMONIO">PATRIMONIO</option>
                                  <option value="CUENTASRESULTDEUDORAS" >CUENTAS DE RESULTADO DEUDORAS</option>
                                  <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                  <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                  <option value="CUENTASRESULTLIQUID" >CUENTAS DE RESULTADO LIQUIDADORAS</option>
                                  <option value="CUENTASCONTINGENTESO" >CUENTAS CONTINGENTES Y ORDEN</option>
                                  <option value="CUENTASCONTINGENTESOC" >CUENTAS CONTINGENTES Y ORDEN POR CONTRA</option>
                                  </select>';
                                }
                                if($tipocuentaR=="PATRIMONIO"){
                                    echo '<select id="tipocuenta" class="select2" style="width: 300px; font-size: 20px" name="tipocuenta">
                                    <option value="SELECCIONE">SELECCIONE</option>
                                    <option value="ACTIVO" >ACTIVO</option>
                                    <option value="PASIVO">PASIVO</option>
                                    <option value="PATRIMONIO"selected>PATRIMONIO</option>
                                    <option value="CUENTASRESULTDEUDORAS" >CUENTAS DE RESULTADO DEUDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTLIQUID" >CUENTAS DE RESULTADO LIQUIDADORAS</option>
                                    <option value="CUENTASCONTINGENTESO" >CUENTAS CONTINGENTES Y ORDEN</option>
                                    <option value="CUENTASCONTINGENTESOC" >CUENTAS CONTINGENTES Y ORDEN POR CONTRA</option>
                                    </select>';
                                  }
                                if($tipocuentaR=="CUENTASRESULTDEUDORAS"){
                                    echo '<select id="tipocuenta" class="select2" style="width: 300px; font-size: 20px" name="tipocuenta">
                                    <option value="SELECCIONE">SELECCIONE</option>
                                    <option value="ACTIVO" >ACTIVO</option>
                                    <option value="PASIVO">PASIVO</option>
                                    <option value="PATRIMONIO">PATRIMONIO</option>
                                    <option value="CUENTASRESULTDEUDORAS" selected>CUENTAS DE RESULTADO DEUDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTLIQUID" >CUENTAS DE RESULTADO LIQUIDADORAS</option>
                                    <option value="CUENTASCONTINGENTESO" >CUENTAS CONTINGENTES Y ORDEN</option>
                                    <option value="CUENTASCONTINGENTESOC" >CUENTAS CONTINGENTES Y ORDEN POR CONTRA</option>
                                    </select>';
                                  }
                                if($tipocuentaR=="CUENTASRESULTACREEDORAS"){
                                    echo '<select id="tipocuenta" class="select2" style="width: 300px; font-size: 20px" name="tipocuenta">
                                    <option value="SELECCIONE">SELECCIONE</option>
                                    <option value="ACTIVO" >ACTIVO</option>
                                    <option value="PASIVO">PASIVO</option>
                                    <option value="PATRIMONIO">PATRIMONIO</option>
                                    <option value="CUENTASRESULTDEUDORAS">CUENTAS DE RESULTADO DEUDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" selected>CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTLIQUID" >CUENTAS DE RESULTADO LIQUIDADORAS</option>
                                    <option value="CUENTASCONTINGENTESO" >CUENTAS CONTINGENTES Y ORDEN</option>
                                    <option value="CUENTASCONTINGENTESOC" >CUENTAS CONTINGENTES Y ORDEN POR CONTRA</option>
                                    </select>';
                                  }
                                if($tipocuentaR=="CUENTASRESULTLIQUID"){
                                    echo '<select id="tipocuenta" class="select2" style="width: 300px; font-size: 20px" name="tipocuenta">
                                    <option value="SELECCIONE">SELECCIONE</option>
                                    <option value="ACTIVO" >ACTIVO</option>
                                    <option value="PASIVO">PASIVO</option>
                                    <option value="PATRIMONIO">PATRIMONIO</option>
                                    <option value="CUENTASRESULTDEUDORAS">CUENTAS DE RESULTADO DEUDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTLIQUID" selected>CUENTAS DE RESULTADO LIQUIDADORAS</option>
                                    <option value="CUENTASCONTINGENTESO" >CUENTAS CONTINGENTES Y ORDEN</option>
                                    <option value="CUENTASCONTINGENTESOC" >CUENTAS CONTINGENTES Y ORDEN POR CONTRA</option>
                                    </select>';
                                  }
                                if($tipocuentaR=="CUENTASCONTINGENTESO"){
                                    echo '<select id="tipocuenta" class="select2" style="width: 300px; font-size: 20px" name="tipocuenta">
                                    <option value="SELECCIONE">SELECCIONE</option>
                                    <option value="ACTIVO" >ACTIVO</option>
                                    <option value="PASIVO">PASIVO</option>
                                    <option value="PATRIMONIO">PATRIMONIO</option>
                                    <option value="CUENTASRESULTDEUDORAS">CUENTAS DE RESULTADO DEUDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTLIQUID" >CUENTAS DE RESULTADO LIQUIDADORAS</option>
                                    <option value="CUENTASCONTINGENTESO" selected>CUENTAS CONTINGENTES Y ORDEN</option>
                                    <option value="CUENTASCONTINGENTESOC" >CUENTAS CONTINGENTES Y ORDEN POR CONTRA</option>
                                    </select>';
                                  }
                                if($tipocuentaR=="CUENTASCONTINGENTESOC"){
                                    echo '<select id="tipocuenta" class="select2" style="width: 300px; font-size: 20px" name="tipocuenta">
                                    <option value="SELECCIONE">SELECCIONE</option>
                                    <option value="ACTIVO" >ACTIVO</option>
                                    <option value="PASIVO">PASIVO</option>
                                    <option value="PATRIMONIO">PATRIMONIO</option>
                                    <option value="CUENTASRESULTDEUDORAS">CUENTAS DE RESULTADO DEUDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                    <option value="CUENTASRESULTLIQUID" >CUENTAS DE RESULTADO LIQUIDADORAS</option>
                                    <option value="CUENTASCONTINGENTESO" >CUENTAS CONTINGENTES Y ORDEN</option>
                                    <option value="CUENTASCONTINGENTESOC" selected >CUENTAS CONTINGENTES Y ORDEN POR CONTRA</option>
                                    </select>';
                                  }
                                  if($tipocuentaR=="Ninguno")  {
                                echo '<select id="tipocuenta" class="select2" style="width: 300px; font-size: 20px" name="tipocuenta">
                                <option value="SELECCIONE" selected >SELECCIONE</option>
                                <option value="ACTIVO" >ACTIVO</option>
                                <option value="PASIVO">PASIVO</option>
                                <option value="PATRIMONIO">PATRIMONIO</option>
                                <option value="CUENTASRESULTDEUDORAS">CUENTAS DE RESULTADO DEUDORAS</option>
                                <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                <option value="CUENTASRESULTACREEDORAS" >CUENTAS DE RESULTADO ACREEDORAS</option>
                                <option value="CUENTASRESULTLIQUID" >CUENTAS DE RESULTADO LIQUIDADORAS</option>
                                <option value="CUENTASCONTINGENTESO" >CUENTAS CONTINGENTES Y ORDEN</option>
                                <option value="CUENTASCONTINGENTESOC" >CUENTAS CONTINGENTES Y ORDEN POR CONTRA</option>
                                </select>';

                              }
                              ?>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <span class="bar"></span>
                              <label>Saldo</label>
                              <br>
                              <br>
                              <?php
                              if($saldocuentaR=="DEUDOR"){
                                echo '<select id="saldocuenta" class="select2" style="width: 300px; font-size: 20px" name="saldocuenta">
                                <option value="SELECCIONE">SELECCIONE</option>
                                <option value="DEUDOR" selected>DEUDOR</option>
                                <option value="ACREEDOR">ACREEDOR</option>
                                </select>';
                              }
                              if($saldocuentaR=="ACREEDOR"){
                                echo '<select id="saldocuenta" class="select2" style="width: 300px; font-size: 20px" name="saldocuenta">
                                <option value="SELECCIONE">SELECCIONE</option>
                                <option value="DEUDOR">DEUDOR</option>
                                <option value="ACREEDOR" selected>ACREEDOR</option>
                                </select>';
                              }
                              if($saldocuentaR=="Ninguno"){
                                echo '<select id="saldocuenta" class="select2" style="width: 300px; font-size: 20px" name="saldocuenta">
                                <option value="SELECCIONE" selected>SELECCIONE</option>
                                <option value="DEUDOR">DEUDOR</option>
                                <option value="ACREEDOR">ACREEDOR</option>
                                </select>';
                              }
                               ?>
                             </div>
                            <div class="col-md-3">
                              <button type="button" class="btn-flip btn btn-gradient btn-primary" onclick="verificar()">
                                <div class="flip">
                                  <div class="side">
                                    Guardar <span class="fa fa-trash"></span>
                                  </div>
                                  <div class="side back">
                                    continuar?
                                  </div>
                                </div>
                                <span class="icon"></span>
                              </button>
                          </div>
                </div>
                <div class="col-md-2">
                            <div class="form-group form-animate-text" style="margin-top:30px !important; width: 300px;">
                              <input onkeyup="generarNivel()" type="text" class="form-text" id="codigocuenta" name="codigocuenta" value="<?php echo $codigocuentaR; ?>" required>
                              <span class="bar"></span>
                              <label>C&oacute;digo</label>
                            </div>

                </div>
                <div class="col-md-7">
                  <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Lista De Cuentas</h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Codigo</th>
                          <th>Nombre</th>
                          <th>Tipo</th>
                          <th>Saldo</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include "../config/conexion.php";
$result = $conexion->query("select * from catalogo order by codigocuenta");
if ($result) {
    while ($fila = $result->fetch_object()) {
        echo "<tr>";
        echo "<td>
          <div class='col-md-2' style='margin-top:1px'>
            <button class='btn ripple-infinite btn-round btn-warning' onclick='modify(" . $fila->idcatalogo . ")';>
            <div>
              <span>Editar</span>
            </div>
            </button>
            </div>
        </td>";
        //echo "<tr>";
        //echo "<td><img src='img/modificar.png' style='width:30px; height:30px' onclick=modify(".$fila->idasignatura.",'".$fila->codigo."','".$fila->nombre."');></td>";
        //echo "<td><img src='img/eliminar.png' style='width:30px; height:30px' onclick=elyminar(".$fila->idasignatura.",'".$fila->nombre."');></td>";
        echo "<td>" . $fila->codigocuenta . "</td>";
        echo "<td>" . $fila->nombrecuenta . "</td>";
        echo "<td>" . $fila->tipocuenta . "</td>";
        echo "<td>" . $fila->saldo . "</td>";
        echo "<td>
          <div class='col-md-2' style='margin-top:1px'>
            <button class='btn ripple-infinite btn-round btn-success' onclick='confirmar(" . $fila->idcatalogo . ")'>
            <div>
              <span>Borrar</span>
            </div>
            </button>
            </div>
        </td>";
        echo "</tr>";

    }
}
?>
                      </tbody>
                        </table>
                      </div>
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
    $consulta  = "UPDATE catalogo set codigocuenta='" . $codigocuenta . "',nombrecuenta='" . $nombrecuenta . "',tipocuenta='" . $tipocuenta . "',saldo='" . $saldocuenta . "',r='" . $r . "',nivel='" . $nivel . "' where idcatalogo='" . $baccion . "'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("En Hora Buena");
    } else {
        msg("No Exito");
    }
}
if ($bandera == 'enviar') {
    echo "<script type='text/javascript'>";
    echo "document.location.href='cuenta.php?id=" . $baccion . "';";
    echo "</script>";
    # code...
}
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
  //  echo "document.location.href='cuenta.php';";
    echo "</script>";
}
?>
>>>>>>> 22769d25a60b72460fce669d3eb62b44819a0ed9
