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
    $this->Cell(195,10,'REPORTE DE BENEFICIARIOS',0,0,'C');
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
    $w = array(30, 75, 80);
    // Cabeceras
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Datos
    $i=0;
    foreach($data as $row)
    {
       // $row[$i][]= explode(';',trim($row));
        if($i==0)
        {
            if($data[$i][0]==$data[$i+1][0]){
                $this->Cell($w[0],6,$data[$i][0],'LR',0,'J');
                $this->Cell($w[1],6,$data[$i][1],'LR',0,'J');
                $this->Cell($w[2],6,$data[$i][2],'LR',0,'J');
                $this->Ln();
            }
            else
            {
               $this->Cell($w[0],6,$data[$i][0],'LRT',0,'J'); 
               $this->Cell($w[1],6,$data[$i][1],'LRT',0,'J');
               $this->Cell($w[2],6,$data[$i][2],'LRT',0,'J');
               $this->Ln();
            }
        }
        else{
            if($data[$i][0]==$data[$i-1][0]){
                $this->Cell($w[0],6,'','LR');
                $this->Cell($w[1],6,'','LR');
                $this->Cell($w[2],6,$data[$i][2],'LR',0,'J');
                $this->Ln();
            }
            else
            {
               $this->Cell($w[0],6,$data[$i][0],'LRT',0,'J'); 
               $this->Cell($w[1],6,$data[$i][1],'LRT',0,'J');
               $this->Cell($w[2],6,$data[$i][2],'LRT',0,'J');
               $this->Ln();
            }

        }
            //$this->Cell($w[0],6,$data[$i][0],'LRT');
            //$this->Cell($w[1],6,$data[$i][1],'LR');
            //$this->Cell($w[2],6,$data[$i][2],'LR',0,'J');
            //$this->Ln();
       
        $i++;
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}

}

$sql="select b.cod_pro CODIGO,c.nom_pro PROYECTO, CONCAT(a.nom,' ',a.ape1,' ',a.ape2) as BENEFICIARIO from rf_persona a,um_ben_proy b, um_proyecto as c where a.cod_per=b.cod_per and b.cod_pro=c.cod_pro and c.cod_pro in (select cod_pro from um_proyecto) order by CODIGO";
$rs=pg_query($sql) or die("Error en la busqueda");
$numRow=pg_num_rows($rs);

$header = array('Codigo', 'Proyecto', 'Beneficiario');
// Carga de datos
$data = array();
for ($i=0; $i < $numRow; $i++) 
{ 
    $row=pg_fetch_array($rs,$i);
    $data[$i][0]="$row[codigo]";
    $data[$i][1]="$row[proyecto]";
    $data[$i][2]="$row[beneficiario]";
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->ImprovedTable($header,$data);
$pdf->Output();
?>