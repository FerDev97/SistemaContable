<?php
session_start();
if($_SESSION["logueado"] == TRUE) {
  $accion=$_REQUEST['accion'];
  include "../config/conexion.php";
  $result = $conexion->query("select * from anio");

  if($accion=="guardar")
  {
    $consulta  = "INSERT INTO anio VALUES('" . $idanio . "','0')";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("Exito ");
      } else {
        msg(mysqli_error($conexion));
    }
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

      function verificar(){
          if(document.getElementById('nombre').value=="" || document.getElementById('correo').value=="" || document.getElementById('telefono').value=="" || document.getElementById('usuario').value=="" || document.getElementById('pass').value==""){
            alert("Complete los campos");
          }else{
            if (document.getElementById("aux").value=="modificar") {

            document.getElementById('bandera').value="modificar";
            document.turismo.submit();
            }else
            {

            document.getElementById('bandera').value="add";
           document.turismo.submit();
            }
            }
        }

        function modify(id)
        {
          document.getElementById('nombre').value="";
          document.getElementById('correo').value="";
          document.getElementById('pass').value="";
          document.getElementById('telefono').value="";
          document.getElementById('usuario').value="";

         document.location.href='usuario.php?id='+id;
        }

        function confirmar(id,op)
        {
          if (op==1) {
            if (confirm("!!Advertencia!! Desea Desactivar Este Registro?")) {
            document.getElementById('bandera').value='desactivar';
            document.getElementById('baccion').value=id;

            document.turismo.submit();
          }else
          {
            alert("No entra");
          }
          }else{
            if (confirm("!!Advertencia!! Desea Activar Este Registro?")) {
            document.getElementById('bandera').value='activar';
            document.getElementById('baccion').value=id;
            document.turismo.submit();
          }else
          {
            alert("No entra");
          }
          }
        }
        function agregar(){
            if (document.getElementById("anio").value=="" ) {
              alert("Campo obligatorio");
            }else{
                  //llamamos addCuenta}bod
                  location.href="main.php?baccion=guardar&anio="+document.getElementById("anio").value;
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
                        <h3 class="animated fadeInLeft">BIENVENIDO A PACHOLI-2018</h3>
                        <p class="animated fadeInDown">

                        </p>
                    </div>
                  </div>
              </div>
              <form id="turismo" name="turismo" action="" method="">
              <input type="hidden" name="bandera" id="bandera">
              <input type="hidden" name="baccion" id="baccion"  >
              <input type="hidden" name="aux" id="aux" >
              <input type="hidden" name="r" id="r" value="">
              <div class="col-md-12 top-20 padding-0">

                 <div class="col-md-7">
                   <div class="col-md-12">
                   <div class="panel">
                     <div class="panel-heading"><h3>Ciclos Contables</h3>
                       <button type="button" class="btn-flip btn btn-gradient btn-primary" data-toggle='modal' data-target='#myModal'>
                             <div class="flip">
                               <div class="side">
                                 Agregar Nuevo <span class="fa fa-edit"></span>
                               </div>
                               <div class="side back">
                                 Continuar?

                               </div>
                             </div>
                             <span class="icon"></span>
                           </button>
                          </div>
                     <div class="panel-body">
                       <div class="responsive-table">
                       <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0" >
                       <thead>
                         <tr>
                             <th>Ciclos</th>
                            <th>Estado</th>
                            <th>Activar/Desactivar</th>


                         </tr>
                       </thead>
                       <tbody>
                       <?php
 include "../config/conexion.php";
 $result = $conexion->query("select * from anio order by idanio");
 if ($result) {
     while ($fila = $result->fetch_object()) {
         echo "<tr>";
         echo "<td> Año:" . $fila->idanio . "</td>";

         //echo "<tr>";
         //echo "<td><img src='img/modificar.png' style='width:30px; height:30px' onclick=modify(".$fila->idasignatura.",'".$fila->codigo."','".$fila->nombre."');></td>";
         //echo "<td><img src='img/eliminar.png' style='width:30px; height:30px' onclick=elyminar(".$fila->idasignatura.",'".$fila->nombre."');></td>";
         if ($fila->estado==1) {
                      echo "<td>Activo</td>";
                      //echo "<td><img src='imagenes.php?id=" . $fila->idclientes . "&tipo=cliente' width=100 height=180></td>";
                      echo "<td style='text-align:center;'><button align='center' type='button' class='btn btn-default' onclick=confirmar(" . $fila->idanio . ",1);><i class='fa fa-remove'></i>
                         </button></td>";
                   }else
                    if ($fila->estado==0) {

                      echo "<td>Inactivo</td>";
                     //  echo "<td><img src='imagenes.php?id=" . $fila->idclientes . "&tipo=cliente' width=100 height=180></td>";
                      echo "<td style='text-align:center;'><button align='center' type='button' class='btn btn-default' onclick=confirmar(" . $fila->idanio . ",0);><i class='fa fa-check'></i>
                         </button></td>";
                   }
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


//Modal de Ciclos
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar nuevo ciclo contable</h4>
      </div>
      <div class="modal-body">
        <div class="form-group form-animate-text" style="margin-top:0px !important;">
          <input type="text" class="form-text" id="anio" name="anio" >
          <span class="bar"></span>
          <label>Año Contable:</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default"  onclick="agregar()">Agregar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

      </div>
    </div>

  </div>
</div>



      <!-- start: Mobile -->
      <div id="mimin-mobile" class="reverse">
        <div class="mimin-mobile-menu-list">
            <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
                <ul class="nav nav-list">
                    <li class="active ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-home fa"></span>Dashboard
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                          <li><a href="dashboard-v1.html">Dashboard v.1</a></li>
                          <li><a href="dashboard-v2.html">Dashboard v.2</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-diamond fa"></span>Layout
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="topnav.html">Top Navigation</a></li>
                        <li><a href="boxed.html">Boxed</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-area-chart fa"></span>Charts
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="chartjs.html">ChartJs</a></li>
                        <li><a href="morris.html">Morris</a></li>
                        <li><a href="flot.html">Flot</a></li>
                        <li><a href="sparkline.html">SparkLine</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-pencil-square"></span>Ui Elements
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="color.html">Color</a></li>
                        <li><a href="weather.html">Weather</a></li>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="icons.html">Icons</a></li>
                        <li><a href="buttons.html">Buttons</a></li>
                        <li><a href="media.html">Media</a></li>
                        <li><a href="panels.html">Panels & Tabs</a></li>
                        <li><a href="notifications.html">Notifications & Tooltip</a></li>
                        <li><a href="badges.html">Badges & Label</a></li>
                        <li><a href="progress.html">Progress</a></li>
                        <li><a href="sliders.html">Sliders</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                        <li><a href="modal.html">Modals</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                       <span class="fa fa-check-square-o"></span>Forms
                       <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="formelement.html">Form Element</a></li>
                        <li><a href="#">Wizard</a></li>
                        <li><a href="#">File Upload</a></li>
                        <li><a href="#">Text Editor</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-table"></span>Tables
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="datatables.html">Data Tables</a></li>
                        <li><a href="handsontable.html">handsontable</a></li>
                        <li><a href="tablestatic.html">Static</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a href="calendar.html">
                         <span class="fa fa-calendar-o"></span>Calendar
                      </a>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-envelope-o"></span>Mail
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="mail-box.html">Inbox</a></li>
                        <li><a href="compose-mail.html">Compose Mail</a></li>
                        <li><a href="view-mail.html">View Mail</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-file-code-o"></span>Pages
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="forgotpass.html">Forgot Password</a></li>
                        <li><a href="login.html">SignIn</a></li>
                        <li><a href="reg.html">SignUp</a></li>
                        <li><a href="article-v1.html">Article v1</a></li>
                        <li><a href="search-v1.html">Search Result v1</a></li>
                        <li><a href="productgrid.html">Product Grid</a></li>
                        <li><a href="profile-v1.html">Profile v1</a></li>
                        <li><a href="invoice-v1.html">Invoice v1</a></li>
                      </ul>
                    </li>
                     <li class="ripple"><a class="tree-toggle nav-header"><span class="fa "></span> MultiLevel  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="view-mail.html">Level 1</a></li>
                        <li><a href="view-mail.html">Level 1</a></li>
                        <li class="ripple">
                          <a class="sub-tree-toggle nav-header">
                            <span class="fa fa-envelope-o"></span> Level 1
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                          </a>
                          <ul class="nav nav-list sub-tree">
                            <li><a href="mail-box.html">Level 2</a></li>
                            <li><a href="compose-mail.html">Level 2</a></li>
                            <li><a href="view-mail.html">Level 2</a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li><a href="credits.html">Credits</a></li>
                  </ul>
            </div>
        </div>
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


if ($bandera == "desactivar") {
  $consulta = "UPDATE anio SET estado= '0' WHERE idanio= '".$baccion."'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        //msg("Exito");
    } else {
        msg("No Exito");
    }
}
if ($bandera == "activar") {
  $consulta = "UPDATE anio SET estado= '1' WHERE idanio= '".$baccion."'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        //msg("Exito");
    } else {
        msg("No Exito");
    }
}

function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "document.location.href='usuario.php';";
    echo "</script>";
}

} else {
header("Location: ../index.php");
}

?>
