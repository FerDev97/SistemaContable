<?php
session_start();
$codigoCuenta=$_GET["codigo"];
$nombreCuenta=$_GET["concepto"];
$montoPartida=$_GET["monto"];
$accion=$_GET["accion"];
if ($accion=="cargo") {
		$cargo=$montoPartida;
		$abono=null;
}else {
	$abono=$montoPartida;
	$cargo=null;
}
$acumulador=$_SESSION["acumulador"];
$matriz=$_SESSION["matriz"];
$acumulador++;
$matriz[$acumulador][0]=$codigoCuenta;
$matriz[$acumulador][1]=$nombreCuenta;
$matriz[$acumulador][2]=$cargo;
$matriz[$acumulador][3]=$abono;
$_SESSION['acumulador']=$acumulador;
$_SESSION['matriz']=$matriz;
impresion();
function impresion()
{
?>
	<div class="responsive-table">
	<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>Codigo</th>
			<th>Concepto</th>
			<th>Debe</th>
			<th>Haber</th>
			<th>Modificar</th>
		</tr>
		<?php
		$acumulador=$_SESSION['acumulador'];
		$matriz=$_SESSION['matriz'];

	for ($i=1; $i <=$acumulador ; $i++) {
		if (array_key_exists($i, $matriz)) {//verifica si existe elk indice en la matriz antes de imprimir
		 ?>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $matriz[$i][0]; ?></td>
			<td><?php echo $matriz[$i][1]; ?></td>
			<td><?php echo $matriz[$i][2]; ?></td>
			<td><?php echo $matriz[$i][3]; ?></td>
			<td>
				<div class='col-md-2' style='margin-top:1px'>
					<input type="button" class='btn ripple-infinite btn-round btn-warning' onclick="agg('quitar',''<?php echo $matriz[$i];?>)";>
					<div>
						<span>Quitar</span>
					</div>
				</iinput>
					</div>
			</td>
		</tr>
		<?php
	}
	}
	?>
	</tbody>
		</table>
	</div>
	<?php } ?>
