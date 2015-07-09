<?php
require('../../php/fpdf17/fpdf.php');
include('../../php/conexion.php');
date_default_timezone_set('America/El_Salvador');
$conn=conectar();

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../../img/logoes.jpg',10,6,33);
    // Arial bold 15
    $this->SetFont('Arial','',10);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(33,10,'UNIDAD DE GENERO',0,0,'C');
    $this->Ln(6);
    $this->SetFont('Arial','',14);
    $this->SetTextColor(0,0,150);
    $this->Cell(198,10,'ALCALDIA MUNICIPAL VILLA DE SAN CRISTOBAL',0,0,'C');
    $this->Ln(6);
    $this->SetFont('Arial','',10);
    $this->SetTextColor(0,0,0);
    $this->Cell(195,10,'DEPARTAMENTO DE CUSCATLAN, TEL. 2379-7131',0,0,'C');
    $this->Ln(3);
    $this->SetFont('Arial','',10);
    $this->SetTextColor(0,0,150);
    $this->Cell(197,10,'___________________________________________________________',0,0,'C');
    $this->Ln(3);
    $this->SetFont('Arial','',10);
    $this->Cell(197,10,'___________________________________________________________',0,0,'C');
    $this->Image('../../img/logoal.jpg',170,8,33);
    $this->Ln(12);
    $this->SetFont('Arial','B',12);
    $this->SetTextColor(0,0,0);
    $this->Cell(195,10,'REPORTE DE COSTOS POR PROYECTO',0,0,'C');
    $this->Ln(15);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    $this->Cell(0,10,'Fecha de Impresion: '.date('d/m/Y H:i:s'),0,0,'R');
}

function ImprovedTable($header, $data)
{
    // Anchuras de las columnas
    $w = array(25, 73, 28, 20, 30, 20);
    // Cabeceras
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Datos
    $i=0;
    $x=0;
    $y=0;
    foreach($data as $row)
    {
       // $row[$i][]= explode(';',trim($row));
        $this->Cell($w[0],6,$data[$i][0],'LRT',0,'J'); 
        $this->Cell($w[1],6,$data[$i][1],'LRT',0,'J');
        $this->Cell($w[2],6,$data[$i][2],'LRT',0,'J');
        $this->Cell($w[3],6,$data[$i][3],'LRT',0,'J');
        $this->Cell($w[4],6,$data[$i][4],'LRT',0,'J');
        $this->Cell($w[5],6,$data[$i][5],'LRT',0,'J');
        $this->Ln();
        $x+=$data[$i][3];
        $y+=$data[$i][4];
        $i++;
    }
    // Línea de cierre
    $this->Cell($w[0]+$w[1]+$w[2],6,'Totales: ','T',0,'R');
    $this->Cell($w[3],6,$x,1,0,'J');
    $this->Cell($w[4],6,$y,1,0,'J');
    $this->Cell($w[5],6,$x+$y,1,0,'J');
}

}

$sql="select * from um_proyecto";
$rs=pg_query($sql) or die("Error en la busqueda");
$numRow=pg_num_rows($rs);

$header = array('Codigo', 'Proyecto','Estado','Monto','Monto Externo','Total');
// Carga de datos
$data = array();
for ($i=0; $i < $numRow; $i++) 
{ 
    $row=pg_fetch_array($rs,$i);
    $data[$i][0]="$row[cod_pro]";
    $data[$i][1]="$row[nom_pro]";
    $data[$i][2]="$row[est]";
    $data[$i][3]="$row[mon_pro]";
    $data[$i][4]="$row[mon_ext]";
    $data[$i][5]=$row[mon_pro]+$row[mon_ext];
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->ImprovedTable($header,$data);
$pdf->Output();
?>