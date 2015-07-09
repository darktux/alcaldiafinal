<?php 
	require('../php/fpdf17/fpdf.php');
	include('../php/conexion.php');
	$conn=conectar();
class PDF extends FPDF
{
	function Header()
	{
    // Logo
    $this->Image('../img/logoes.jpg',15,20,20);
    // Arial bold 15
    $this->SetFont('Arial','U',12);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(60,20,utf8_decode('TÍTULO DE PUESTO A PERPETUIDAD EN EL CEMENTERIO MUNICIPAL'),0,0,'C');
    $this->Ln(6);
    $this->SetFont('Arial','',11);
    $this->Cell(20,50,utf8_decode('DEPARTAMENTO: Cuscatlán'),0,0,'C');
    $this->Ln(6);
    // $this->SetFont('Arial','',10);
    // $this->SetTextColor(0,0,0);
    // $this->Cell(195,10,'DEPARTAMENTO DE CUSCATLAN, TEL. 2379-7131',0,0,'C');
    // $this->Ln(3);
    // $this->SetFont('Arial','',10);
    // $this->SetTextColor(0,0,150);
    // $this->Cell(197,10,'___________________________________________________________',0,0,'C');
    // $this->Ln(3);
    // $this->SetFont('Arial','',10);
    // $this->Cell(197,10,'___________________________________________________________',0,0,'C');
    // $this->Ln(12);
    // $this->SetFont('Arial','B',12);
    // $this->SetTextColor(0,0,0);
    // $this->Cell(195,10,'REPORTE DE COSTOS POR PROYECTO',0,0,'C');
    // $this->Ln(15);
	}



}

	// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
// $pdf->ImprovedTable($header,$data);
$pdf->Output();
?>