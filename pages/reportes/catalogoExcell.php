<?php
header("Pragma: public");
header("Expires: 0");
$nombreDelArchivo="catalogoExcell.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$nombreDelArchivo");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

 ?>
 <style type="text/css">
 th{font-size:100px;}
 td{font-size:20px;}
 </style>
 <table>
 <thead>
   <tr colspan=4 style="text-align: center;">
     <h2 style="font-size:20px;">Catalogo de Cuentas</h2>
   </tr>
   <tr>
     <th>Codigo</th>
     <th>Nombre</th>
     <th>Tipo</th>
     <th>Saldo</th>
   </tr>
 </thead>
 <tbody>
 <?php
include "../../config/conexion.php";
$result = $conexion->query("select * from catalogo order by codigocuenta");
if ($result) {
while ($fila = $result->fetch_object()) {
echo "<tr>";
echo "<td>" . $fila->codigocuenta . "</td>";
echo "<td>" . $fila->nombrecuenta . "</td>";
echo "<td>" . $fila->tipocuenta . "</td>";
echo "<td>" . $fila->saldo . "</td>";
echo "</tr>";

}
}
?>
 </tbody>
   </table>
