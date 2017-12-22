<?php
include "../config/conexion.php";
$result = $conexion->query("select * from catalogo order by codigocuenta");
if ($result) {
while ($fila = $result->fetch_object()) {
echo "<tr>";

//echo "<tr>";
//echo "<td><img src='img/modificar.png' style='width:30px; height:30px' onclick=modify(".$fila->idasignatura.",'".$fila->codigo."','".$fila->nombre."');></td>";
//echo "<td><img src='img/eliminar.png' style='width:30px; height:30px' onclick=elyminar(".$fila->idasignatura.",'".$fila->nombre."');></td>";
echo "<td>" . $fila->codigocuenta . "</td>";
echo "<td>" . $fila->nombrecuenta . "</td>";
echo "<td>" . $fila->tipocuenta . "</td>";
echo "<td>" . $fila->saldo . "</td>";
echo "<td>
<div class='col-md-2' style='margin-top:1px'>
<button type='button' class='btn ripple-infinite btn-round btn-success' onclick=llenarDatos(" . $fila->codigocuenta . "," . $fila->idcatalogo . ",'" . str_replace(" ",".",$fila->nombrecuenta) . "')>
<div>
<span>Enviar</span>
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
