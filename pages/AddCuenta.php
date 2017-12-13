<?php session_start();
$opcion=$_GET["opcion"];
if ($opcion=="agregar") {
	$idlugar=$_GET["idlugar"];

	$acumulador=$_SESSION["acumulador"];
	$matriz=$_SESSION["matriz"];
	$acumulador++;
	$matriz[$acumulador][0]=$idlugar;

	$_SESSION['acumulador']=$acumulador;
	$_SESSION['matriz']=$matriz;
	impresion();
}
if ($opcion=="quitar") {
	$id=$_GET["id"];
	$matriz=$_SESSION['matriz'];
	unset($matriz[$id]);//eliminacion de un indice en la matriz
	$_SESSION['matriz']=$matriz;
	impresion();
}
function impresion()
{
?>
<table border="0" align="center" class="table">
	<tr class="table-striped">
		<th align="center" style="font-size:12px;">Lugar</th>
		<th align="center" style="font-size:12px;">Accion</th>
	</tr>
	<?php
	$acumulador=$_SESSION['acumulador'];
	$matriz=$_SESSION['matriz'];

	for ($i=1; $i <=$acumulador ; $i++) {
		if (array_key_exists($i, $matriz)) {//verifica si existe elk indice en la matriz antes de imprimir
	 ?>
	 <tr style="font-size: 12px;">
	 	<?php
	 	include "../config/conexion.php";
	 	$idlugar=$matriz[$i][0];
	 	$result=$conexion->query("select * from lugar where idlugar=".$idlugar." order by nombre");
	 	if ($result) {
	 		while ($fila=$result->fetch_object()) {
	 			$xnombre=$fila->nombre;

	 		}
	 	}

	 	?>
	 	<td align="left"><?php echo $xnombre; ?></td>
	 	<td><input type="button" name="btn" value="Quitar" onclick="showUser('quitar','<?php echo $i ?>')">
	 	</td>
	 </tr>
	 <?php
	 }
	 }
	 ?>
</table>
<?php } ?>

<?php
include "../config/conexion.php";
$result = $conexion->query("select * from catalogo order by codigocuenta");
if ($result) {
while ($fila = $result->fetch_object()) {
echo "<tr>";
echo "<td></td>";
//echo "<tr>";
//echo "<td><img src='img/modificar.png' style='width:30px; height:30px' onclick=modify(".$fila->idasignatura.",'".$fila->codigo."','".$fila->nombre."');></td>";
//echo "<td><img src='img/eliminar.png' style='width:30px; height:30px' onclick=elyminar(".$fila->idasignatura.",'".$fila->nombre."');></td>";
echo "<td>" . $fila->codigocuenta . "</td>";
echo "<td>" . $fila->nombrecuenta . "</td>";
echo "<td>" . $fila->tipocuenta . "</td>";
echo "<td>" . $fila->saldo . "</td>";
echo "<td>" . $fila->codigocuenta . "</td>";
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
