<?php

      require_once 'fpdf/fpdf.php';


			error_reporting(E_ALL & ~E_NOTICE);
		     ini_set('display_errors', 0);
		     ini_set('log_errors', 1);
		     ob_end_clean();

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('images/logo.png', 10, 10, 25);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
		$this->SetFont('Arial','B',15);
					$this->Cell(80);
					$this->Cell(120,10, 'Factura',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,('#Registro'),1,0,'C',1);
	$pdf->Cell(20,6,('#Reserva'),1,0,'C',1);
	$pdf->Cell(20,6,'Estado',1,0,'C',1);
	$pdf->Cell(25,6,('Inicio'),1,0,'C',1);
	$pdf->Cell(25,6,('Fin'),1,0,'C',1);
	$pdf->Cell(25,6,('Modelo'),1,0,'C',1);
	$pdf->Ln();




include_once ('php/conexion.php');

$sqlg="SELECT * FROM registroalquiler";
$rese=$cn->query($sqlg);

if ($rese->num_rows>0) {
	while ($usuario=$rese->fetch_assoc()) {
		$pdf->Cell(20,6, ($usuario['idRegistro']),1,0);
		$pdf->Cell(20,6, ($usuario['idReserva']),1,0);
		$pdf->Cell(20,6, ($usuario['estado']),1,0);


		$sqlg="SELECT * FROM reservas WHERE idReserva='".$usuario["idReserva"]."' ";
		$resc=$cn->query($sqlg);
		while ($cargo=$resc->fetch_assoc()) {
			$fechaInic=substr($cargo["fechaInicio"],0,10);
			$fechaFin=substr($cargo["fechaFin"],0,10);


			$pdf->Cell(25,6, ($fechaInic),1,0);
			$pdf->Cell(25,6, ($fechaFin),1,0);
			


			$sqlgCata="SELECT * FROM catalogo WHERE idVehiculo='".$cargo["idVehiculo"]."' ";
			$rescCata=$cn->query($sqlgCata);

			while ($catalogo=$rescCata->fetch_assoc()) {
				$pdf->Cell(20,6, ($catalogo['modelo']),1,0);



			}


		}

$pdf->Ln();


		}

 }
$pdf->Output();

?>
