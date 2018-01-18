<?php
session_start();
$inventariofinal=$_REQUEST["if"];
function mensaje($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
  //  echo "document.location.href='listacliente.php';";
    echo "</script>";
}
if($_SESSION["logueado"] == TRUE) {
include "../config/conexion.php";
$result = $conexion->query("select * from anio where estado=1");
if($result)
{
  while ($fila=$result->fetch_object()) {
    $anioActivo=$fila->idanio;
  }
}
//saldo de ventas
$resultventa= $conexion->query("select c.nombrecuenta as nombre, c.codigocuenta as codigo, SUBSTRING(c.codigocuenta,'1','2') as codigocorto, p.idpartida as npartida, p.concepto as concepto, p.fecha as fecha, l.debe as debe, l.haber as haber FROM catalogo as c,partida as p, ldiario as l where SUBSTRING(c.codigocuenta,1,'2')='51' and p.idpartida=l.idpartida and l.idcatalogo=c.idcatalogo and p.idanio='".$anioActivo."' ORDER BY p.idpartida ASC");
if ($resultventa) {
    while ($fila = $resultventa->fetch_object()) {
      if ($fila->saldo=="DEUDOR") {
        $saldoV=$saldoV+($fila->debe)-($fila->haber);
      }else {
        $saldoV=$saldoV-($fila->debe)+($fila->haber);
      }
      }
  }
  // saldo de reb y dev sobre ventas
$resultRebDevVet= $conexion->query("select c.nombrecuenta as nombre, c.codigocuenta as codigo, SUBSTRING(c.codigocuenta,'1','3') as codigocorto, p.idpartida as npartida, p.concepto as concepto, p.fecha as fecha, l.debe as debe, l.haber as haber FROM catalogo as c,partida as p, ldiario as l where SUBSTRING(c.codigocuenta,1,'3')='411' and p.idpartida=l.idpartida and l.idcatalogo=c.idcatalogo and p.idanio='".$anioActivo."' ORDER BY p.idpartida ASC");
if ($resultRebDevVet) {
    while ($fila = $resultRebDevVet->fetch_object()) {
      $saldoRDV=$saldoRDV+($fila->debe)-($fila->haber);
      }
}
//Saldo de Compras
$resultCompras= $conexion->query("select c.nombrecuenta as nombre, c.codigocuenta as codigo, SUBSTRING(c.codigocuenta,'1','2') as codigocorto, p.idpartida as npartida, p.concepto as concepto, p.fecha as fecha, l.debe as debe, l.haber as haber FROM catalogo as c,partida as p, ldiario as l where SUBSTRING(c.codigocuenta,1,'2')='43' and p.idpartida=l.idpartida and l.idcatalogo=c.idcatalogo and p.idanio='".$anioActivo."' ORDER BY p.idpartida ASC");
if ($resultCompras) {
    while ($fila = $resultCompras->fetch_object()) {
      $saldoComp=$saldoComp+($fila->debe)-($fila->haber);
      }
}
//Saldo de Gastos sobre Compras
$resultGastoComp= $conexion->query("select c.nombrecuenta as nombre, c.codigocuenta as codigo, SUBSTRING(c.codigocuenta,'1','2') as codigocorto, p.idpartida as npartida, p.concepto as concepto, p.fecha as fecha, l.debe as debe, l.haber as haber FROM catalogo as c,partida as p, ldiario as l where SUBSTRING(c.codigocuenta,1,'2')='44' and p.idpartida=l.idpartida and l.idcatalogo=c.idcatalogo and p.idanio='".$anioActivo."' ORDER BY p.idpartida ASC");
if ($resultGastoComp) {
    while ($fila = $resultGastoComp->fetch_object()) {
      $saldoGasComp=$saldoGasComp+($fila->debe)-($fila->haber);
      }
}
//Saldo de Reb y dev sobre Compras
$resultRebDevComp= $conexion->query("select c.nombrecuenta as nombre, c.codigocuenta as codigo, SUBSTRING(c.codigocuenta,'1','2') as codigocorto, p.idpartida as npartida, p.concepto as concepto, p.fecha as fecha, l.debe as debe, l.haber as haber FROM catalogo as c,partida as p, ldiario as l where SUBSTRING(c.codigocuenta,1,'2')='53' and p.idpartida=l.idpartida and l.idcatalogo=c.idcatalogo and p.idanio='".$anioActivo."' ORDER BY p.idpartida ASC");
if ($resultRebDevComp) {
    while ($fila = $resultRebDevComp->fetch_object()) {
      $saldoRDC=$saldoRDC-($fila->debe)+($fila->haber);
      }
}
//Saldo Gastos de admon
$resuktGasAdmon= $conexion->query("select c.nombrecuenta as nombre, c.codigocuenta as codigo, SUBSTRING(c.codigocuenta,'1','3') as codigocorto, p.idpartida as npartida, p.concepto as concepto, p.fecha as fecha, l.debe as debe, l.haber as haber FROM catalogo as c,partida as p, ldiario as l where SUBSTRING(c.codigocuenta,1,'3')='415' and p.idpartida=l.idpartida and l.idcatalogo=c.idcatalogo and p.idanio='".$anioActivo."' ORDER BY p.idpartida ASC");
if ($resuktGasAdmon) {
    while ($fila = $resuktGasAdmon->fetch_object()) {
      $saldoGA=$saldoGA+($fila->debe)-($fila->haber);
      }
}
//Saldo Gastos de ventas
$resuktGasVen= $conexion->query("select c.nombrecuenta as nombre, c.codigocuenta as codigo, SUBSTRING(c.codigocuenta,'1','3') as codigocorto, p.idpartida as npartida, p.concepto as concepto, p.fecha as fecha, l.debe as debe, l.haber as haber FROM catalogo as c,partida as p, ldiario as l where SUBSTRING(c.codigocuenta,1,'3')='416' and p.idpartida=l.idpartida and l.idcatalogo=c.idcatalogo and p.idanio='".$anioActivo."' ORDER BY p.idpartida ASC");
if ($resuktGasVen) {
    while ($fila = $resuktGasVen->fetch_object()) {
      $saldoGV=$saldoGV+($fila->debe)-($fila->haber);
      }
}
//Saldo Gastos de Finan
$resuktGasFina= $conexion->query("select c.nombrecuenta as nombre, c.codigocuenta as codigo, SUBSTRING(c.codigocuenta,'1','3') as codigocorto, p.idpartida as npartida, p.concepto as concepto, p.fecha as fecha, l.debe as debe, l.haber as haber FROM catalogo as c,partida as p, ldiario as l where SUBSTRING(c.codigocuenta,1,'3')='417' and p.idpartida=l.idpartida and l.idcatalogo=c.idcatalogo and p.idanio='".$anioActivo."' ORDER BY p.idpartida ASC");
if ($resuktGasFina) {
    while ($fila = $resuktGasFina->fetch_object()) {
      $saldoGF=$saldoGF+($fila->debe)-($fila->haber);
      }
}
//Saldo Otros Gastos
$resulOG= $conexion->query("select c.nombrecuenta as nombre, c.codigocuenta as codigo, SUBSTRING(c.codigocuenta,'1','3') as codigocorto, p.idpartida as npartida, p.concepto as concepto, p.fecha as fecha, l.debe as debe, l.haber as haber FROM catalogo as c,partida as p, ldiario as l where SUBSTRING(c.codigocuenta,1,'3')='423' and p.idpartida=l.idpartida and l.idcatalogo=c.idcatalogo and p.idanio='".$anioActivo."' ORDER BY p.idpartida ASC");
if ($resulOG) {
    while ($fila = $resulOG->fetch_object()) {
      $saldoOG=$saldoOG+($fila->debe)-($fila->haber);
      }
}
//Saldo Otros ingresos
$resulOI= $conexion->query("select c.nombrecuenta as nombre, c.codigocuenta as codigo, SUBSTRING(c.codigocuenta,'1','3') as codigocorto, p.idpartida as npartida, p.concepto as concepto, p.fecha as fecha, l.debe as debe, l.haber as haber FROM catalogo as c,partida as p, ldiario as l where SUBSTRING(c.codigocuenta,1,'3')='521' and p.idpartida=l.idpartida and l.idcatalogo=c.idcatalogo and p.idanio='".$anioActivo."' ORDER BY p.idpartida ASC");
if ($resulOI) {
    while ($fila = $resulOI->fetch_object()) {
      $saldoOI=$saldoOI-($fila->debe)+($fila->haber);
      }
}
$resulII= $conexion->query("select c.nombrecuenta as nombre, c.codigocuenta as codigo, SUBSTRING(c.codigocuenta,'1','3') as codigocorto, p.idpartida as npartida, p.concepto as concepto, p.fecha as fecha, l.debe as debe, l.haber as haber FROM catalogo as c,partida as p, ldiario as l where SUBSTRING(c.codigocuenta,1,'3')='118' and p.idpartida=l.idpartida and l.idcatalogo=c.idcatalogo and p.idanio='".$anioActivo."' ORDER BY p.idpartida ASC");
if ($resulII) {
    while ($fila = $resulII->fetch_object()) {
      $saldoII=$saldoII+($fila->debe)-($fila->haber);
      }
}
  //codigo para guardar en la tabla estado
  $consulta  = "INSERT INTO estadoresultado VALUES('".$numeroPartida1."','" . $concepto . "','" . $fecha . "','" . $idanio . "')";
  $resultado = $conexion->query($consulta);
  if ($resultado) {
      msg("Exito Partida");
    } else {
      msg("No Exito Partida");
  }

}else {
header("Location: ../index.php");
}

 ?>
