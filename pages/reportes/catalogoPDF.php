<?php
/** Incluir la libreria PHPExcel */
include '../../Classes/PHPExcel.php';
$rendererName = PHPExcel_Settings::PDF_RENDERER_TCPDF;
$rendererLibrary = 'tcpdf';
$rendererLibraryPath = '../../' . $rendererLibrary;
// Crea un nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades
$objPHPExcel->getProperties()
->setCreator("Cattivo")
->setLastModifiedBy("Cattivo")
->setTitle("Catalogo de Cuentas-PACHOLI")
->setSubject("Catalogo de cuentas.")
->setDescription("Se van a almacenar todas las cuentas de nuestro catalogo.")
->setKeywords("Excel Office 2007 openxml php")
->setCategory("Catalogo.");
//arrays que contendran los formatos de las fuentes para las celdas.
$styleArray = array(
    'font' => array(
        'bold' => false,
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
    ),
    // 'borders' => array(
    //     'top' => array(
    //         'style' => PHPExcel_Style_Border::BORDER_THIN,
    //     ),
    // ),
    // 'fill' => array(
    //     'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
    //     'rotation' => 90,
    //     'startcolor' => array(
    //         'argb' => 'FFA0A0A0',
    //     ),
    //     'endcolor' => array(
    //         'argb' => 'FFFFFFFF',
    //     ),
    // ),
);
$cont=3;
// Agregar Informacion
$objPHPExcel->getActiveSheet()->getStyle('B1')
->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(27);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(27);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);

$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('B1', 'CATALOGO DE CUENTAS')
->mergeCells('B1:E1')
->setCellValue('B2', 'Codigo')
->setCellValue('C2', 'Nombre')
->setCellValue('D2', 'Tipo')
->setCellValue('E2', 'Saldo');
//recuperamos de la bd y procedemos a insertar en las celdas.

include "../../config/conexion.php";
$result = $conexion->query("select * from catalogo order by codigocuenta");
if ($result) {
  while ($fila = $result->fetch_object()) {
    if($fila->tipocuenta=='CUENTASRESULTDEUDORA' || $fila->tipocuenta=='CUENTASRESULTACREEDO'){
      $tipo='CUENTA DE RESULTADO';
    }else{
        $tipo=$fila->tipocuenta;
      }
      $objPHPExcel->getActiveSheet()->getStyle('B'."$cont")->applyFromArray($styleArray);
      $objPHPExcel->setActiveSheetIndex(0)
      ->setCellValue('B'."$cont",$fila->codigocuenta)
      ->setCellValue('C'."$cont",$fila->nombrecuenta)
      ->setCellValue('D'."$cont",$tipo)
      ->setCellValue('E'."$cont",$fila->saldo);
        $cont++;
      }

}
// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('CATALOGO DE CUENTAS');

// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);

if (!PHPExcel_Settings::setPdfRenderer(
		$rendererName,
		$rendererLibraryPath
	)) {
	die(
		'NOTICE: Please set the $rendererName and $rendererLibraryPath values' .
		'<br />' .
		'at the top of this script as appropriate for your directory structure'
	);
}
// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
// Redirect output to a client’s web browser (PDF)
header('Content-Type: application/pdf');
header('Content-Disposition: attachment;filename="catalogo.pdf"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
$objWriter->save('php://output');
exit;

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body onload="window.close()">

  </body>
</html>
