<?php
require_once 'cCustomer.php';   //Requerimos del cotrolador para poner instanciar su clase.
require_once 'fpdf/fpdf.php';   //Requerimos de la clase de fpdf para poder acceder a sus atributoss y métodos.
    
$obj_cCustomer = new CCustomer; //Instanciamos la clase
$datos = $obj_cCustomer->listar();  //Llamamos al método listar que devuelve un array con los datos de la bbdd.

// Crear una nueva instancia de FPDF
$pdf = new FPDF();
$pdf->AddPage();    //Añadimos una página
$pdf->SetFont('Times', 'B', 8);   //SetFont() -> Establece una fuente, b:"bold"(negrita), tamaño 8


//----------------------------CELL()----------------------------
//Cell()-> crea una celda con 192 ancho ((27*6)+30)->anchura de columnas
//      -> txt: imprime el texto, border: border 1, align: center
$pdf->Cell(192 , 10, 'CLIENTES', 1, 1, 'C'); 

// Agregar el encabezado de la tabla
$pdf->Cell(27, 10, 'cust_id', 1, 0, 'C');
$pdf->Cell(27, 10, 'fed_id', 1, 0, 'C');
$pdf->Cell(27, 10, 'cust_type_cd', 1, 0, 'C');
$pdf->Cell(30, 10, 'address', 1, 0, 'C');
$pdf->Cell(27, 10, 'city', 1, 0, 'C');
$pdf->Cell(27, 10, 'state', 1, 0, 'C');
$pdf->Cell(27, 10, 'postal_code', 1, 0, 'C');
$pdf->Ln(); //Salto de línea

// Agregar los datos de la tabla
foreach ($datos as $fila) {
    $pdf->SetFillColor(255, 255, 0);   //SetFillColor()->
    $pdf->Cell(27, 10, $fila['cust_id'], 1,0, 'C');
    $pdf->Cell(27, 10, $fila['fed_id'], 1, 0, 'C');
    $pdf->Cell(27, 10, $fila['cust_type_cd'], 1, 0, 'C');
    $pdf->Cell(30, 10, $fila['address'], 1, 0, 'C');
    $pdf->Cell(27, 10, $fila['city'], 1, 0, 'C');
    $pdf->Cell(27, 10, $fila['state'], 1, 0, 'C');
    $pdf->Cell(27, 10, $fila['postal_code'], 1, 0, 'C');
    $pdf->Ln(); //salto de línea.
}

// Previsualizar el PDF en el navegador 
$pdf->Output('I', 'reporte.pdf');


?>
