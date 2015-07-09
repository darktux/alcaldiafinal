<?php
//default_charset = "utf-8";
date_default_timezone_set('America/El_Salvador');
require('../../php/fpdf17/fpdf.php');
include('../../php/conexion.php');
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
    $this->Cell(195,10,'Expediente de Agresion',0,0,'C');
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

function ImprovedTable($data)
{
    // Anchuras de las columnas
    $w = array(32, 73, 80);
   // $numRow=pg_num_rows($data);
    
    // Carga de datos
   
    for ($i=0; $i < 1; $i++) 
    { 
        $row=pg_fetch_array($data,$i);
        $date2 = date('Y-m-d');//
        $diff = abs(strtotime($date2) - strtotime($row['fec_nac']));
        $years = floor($diff / (365*60*60*24));

        //Datos generales---------
        $this->SetFillColor(211,211,211);
        $this->Cell($w[0]+$w[1]+$w[2],6,'Datos Generales',1,0,'C',true);
        $this->Ln(6);
        $this->Cell($w[0]+$w[1],6,'Nombre: '.$row['nom'].' '.$row['ape1'].' '.$row['ape2'],1,0,'J');
        $this->Cell($w[2],6,'Edad: '.$years,1,0,'J');
        $this->Ln(6);
        $this->Cell($w[0]+$w[1],6,'Dui: '.$row['dui'],1,0,'J');
        $this->Cell($w[2],6,'Telefono: '.$row['tel1'],1,0,'J');
        $this->Ln(6);
        $this->Multicell($w[0]+$w[1]+$w[2],6,'Direccion: '.$row['dir'],1);
        $this->Cell($w[0]+$w[1],6,'Estado Civil: '.$row['est_civ'],1,0,'J');
        $this->Cell($w[2],6,'Nivel Educativo: '.$row['niv_edu'],1,0,'J');
        $this->Ln(6);

        //Pasatiempos---------
        $this->SetFillColor(211,211,211);
        $this->Cell($w[0]+$w[1]+$w[2],6,'Pasatiempos',1,0,'C',true);
        $this->Ln(6);
        $sql="select * from um_checkbox where cod_chk=1 and cat_chk like 'oci%ded'";
        $rs=pg_query($sql) or die("Error en la busqueda");
        $numRow=pg_num_rows($rs);
        for ($j=0; $j < $numRow; $j++) 
        { 
            $rows=pg_fetch_array($rs,$j);
            if($j==0){
                $this->cell($w[0]+25,6,'Dedicacion Preferida: ','L');
                $this->Cell($w[2]+$w[1]-25,6,$rows['sel_chk'],'R',0,'J');
            }
            else
            {
                $this->cell($w[0]+25,6,'','L');
                 $this->Cell($w[2]+$w[1]-25,6,$rows['sel_chk'],'R',0,'J');
            }
              $this->Ln(6);
        }

        //Situacion laboral---------
        $this->SetFillColor(211,211,211);
        $this->Cell($w[0]+$w[1]+$w[2],6,'Situacion Laboral',1,0,'C',true);
        $this->Ln(6);
        $this->cell($w[0],6,'Trabaja: '.$row['tra_rem'],1);
        $this->Cell($w[1],6,'Oficio: '.$row['ocu'],1);
        $this->Cell($w[2],6,'Contrato: '.$row['baj_con'],1);
        $this->Ln(6);
        $this->Cell($w[0],6,'Jornada: '.$row['jor_tra'].' horas',1);
        $this->cell($w[1],6,'Ingresos Medios Mensuales: $ '.$row['ing_med_men'],1);
        $this->Cell($w[2],6,'Otros Ingresos: '.$row['otr_tip_ing'],1);
        $this->Ln(6);
        $this->Cell($w[0]+$w[1],6,'Dependencia Economica con el presunto agresor: '.$row['dep_eco_agr'],1);
        $this->cell($w[2],6,'Recibe ayuda de ONGs: '.$row['rec_ayu'],1);
        $this->Ln(6);

        //Relaciones familiares---------
        $this->SetFillColor(211,211,211);
        $this->Cell($w[0]+$w[1]+$w[2],6,'Relaciones Familiares',1,0,'C',true);
        $this->Ln(6);
        $this->cell(22,6,'# Hijos: '.$row['num_hij'],1);
        $this->Cell(10+$w[1],6,'Apoyo Economico: '.$row['apo_eco_fam'],1);
        $this->Cell($w[2],6,'Apoyo Afectivo: '.$row['apo_afe_fam'],1);
        $this->Ln(6);
        $this->cell($w[0]+$w[1],6,'Apoyo Crianza de los hijos: '.$row['apo_cri'],1);
        $this->Cell($w[2],6,'Su familia conoce su situacion: '.$row['con_sit'],1);
        $this->Ln(6);
        $this->cell($w[0]+$w[1],6,'Su familia ofrece ayuda si termina relacion: '.$row['con_apo'],1);
        $this->Cell($w[2],6,'Mantiene alguna relacion con el agresor: '.$row['man_rel_agr'],1);
        $this->Ln(6);

        //Relaciones Sociales---------
        $this->SetFillColor(211,211,211);
        $this->Cell($w[0]+$w[1]+$w[2],6,'Relaciones Sociales',1,0,'C',true);
        $this->Ln(6);
        $this->Cell($w[0]+$w[1],6,'Apoyo Economico: '.$row['apo_efe_ami'],1);
        $this->Cell($w[2],6,'Apoyo Afectivo: '.$row['apo_afe_ami'],1);
        $this->Ln(6);
        $this->Cell($w[0]+$w[1],6,'Su entorno ofrece ayuda si termina relacion: '.$row['ent_apo_agr'],1);
        $this->cell($w[2],6,'Su entorno conoce las agresiones: '.$row['ent_con_agr'],1); 
        $this->Ln(6);

        //Situacion General---------
        $this->SetFillColor(211,211,211);
        $this->Cell($w[0]+$w[1]+$w[2],6,'Situacion General',1,0,'C',true);
        $this->Ln(6);
        $this->Cell($w[0]+$w[1],6,'Cuando esta enferma: '.$row['acu_amb'],1);
        $this->cell($w[2],6,'Medico de Cabecera: '.$row['med_cab'],1);
        $this->Ln(6);
        $this->Cell($w[0]+$w[1],6,'Tratamiento Continuo: '.$row['tra_con'],1);
        $this->cell($w[2],6,'Tipo de Alimentacion: '.$row['com'],1);
        $this->Ln(6);
        $this->Cell($w[0]+$w[1],6,'Tipo de convivencia con el agresor: '.utf8_decode($row['con_agr']),1);
        $this->cell($w[2],6,'Es primera convicencia: '.$row['pri_con'],1);
        $this->Ln(6);
        $this->Cell($w[0]+$w[1]+$w[2],6,'Periodo de duracion de la relacion sentimental: '.$row['dur_rel_sen'],1);
        $this->Ln(6);

        //Problematica General---------
        $this->SetFillColor(211,211,211);
        $this->Cell($w[0]+$w[1]+$w[2],6,'Problematica General',1,0,'C',true);
        $this->Ln(6);
        $this->Cell($w[0]+$w[1],6,'Ha sufrido maltratos: '.$row['suf_mal'],1);
        $this->cell($w[2],6,'Ha sufrido abuso sexual: '.$row['suf_abu_sex'],1);
        $this->Ln(6);
        $sql="select * from um_checkbox where cod_chk=".$_GET['codigo']." and cat_chk like 'car%'";
        $rs=pg_query($sql) or die("Error en la busqueda");
        $numRow=pg_num_rows($rs);
        for ($j=0; $j < $numRow; $j++) 
        { 
            $rows=pg_fetch_array($rs,$j);
            if($j==0){
                $this->cell($w[0]+25,6,utf8_decode('Carácter de las agresiones: '),'L');
                $this->Cell($w[2]+$w[1]-25,6,utf8_decode($rows['sel_chk']),'R',0,'J');
            }
            else
            {
                $this->cell($w[0]+25,6,'','L');
                 $this->Cell($w[2]+$w[1]-25,6,utf8_decode($rows['sel_chk']),'R',0,'J');
            }
              $this->Ln(6);
        }
        $this->Cell($w[0]+$w[1],6,utf8_decode('Ha iniciado trámites de separación: ').$row['tra_sep'],1);
        $this->cell($w[2],6,'Se han dado rupturas anteriores: '.$row['rup_ant'],1);
        $this->Ln(6);
        $this->Multicell($w[0]+$w[1]+$w[2],6,'Medidas cautelares relacionada con la visita de los menores: '.$row['med_cau'],1);
        $this->Ln(6);
        $this->Cell($w[0]+$w[1],6,utf8_decode('Duración del maltrato: '.$row['dur_mal']),1);
        $this->cell($w[2],6,'Ha habido amenaza de ruptura: '.$row['ame_rup'],1);
        $this->Ln(6);
        $sql="select * from um_checkbox where cod_chk=".$_GET['codigo']." and cat_chk like 'dec%'";
        $rs=pg_query($sql) or die("Error en la busqueda");
        $numRow=pg_num_rows($rs);
        for ($j=0; $j < $numRow; $j++) 
        { 
            $rows=pg_fetch_array($rs,$j);
            if($j==0){
                $this->cell($w[0]+$w[1]+$w[2],6,utf8_decode('La decisión de abandonar el hogar la ha tomado: '. $rows['sel_chk']),'LR');
               // $this->Cell($w[2],6,,'LR',0,'J');
            }
            
              $this->Ln(6);
        }
        $this->Cell($w[0]+$w[1]+$w[2],6,'El agresor maltrata a los menores: '.$row['mal_men'],1);
        $this->Ln(6);

        //Datos del Agresor---------
        $this->SetFillColor(211,211,211);
        $this->Cell($w[0]+$w[1]+$w[2],6,'Datos del Agresor',1,0,'C',true);
        $this->Ln(6);
        $sql="select * from rf_persona a, um_expediente b where a.cod_per=b.cod_agr and b.cod_exp=".$_GET['codigo'];
        $rs=pg_query($sql) or die("Error en la busqueda");
        $numRow=pg_num_rows($rs);
        for ($j=0; $j < $numRow; $j++) 
        { 
            $date2 = date('Y-m-d');//
            $diff = abs(strtotime($date2) - strtotime($rows['fec_nac']));
            $years = floor($diff / (365*60*60*24));
            $rows=pg_fetch_array($rs,$j);
            $this->Cell($w[0]+$w[1],6,'Nombre: '.$rows['nom'].' '.$rows['ape1'].' '.$rows['ape2'],1,0,'J');
            $this->Cell($w[2],6,'Edad: '.$years,1,0,'J');
            $this->Ln(6);
            $this->Cell($w[0]+$w[1],6,'Dui: '.$rows['dui'],1,0,'J');
            $this->Cell($w[2],6,'Telefono: '.$rows['tel1'],1,0,'J');
            $this->Ln(6);
            $this->Multicell($w[0]+$w[1]+$w[2],6,'Direccion: '.$rows['dir'],1);
            $this->Cell($w[0]+$w[1],6,'Oficio: '.$rows['ocu'],1,0,'J');
            $this->Cell($w[2],6,'Nivel Educativo: '.$rows['niv_edu'],1,0,'J');
            $this->Ln(6);
        }

        //Conducta del Agresor---------
        $this->SetFillColor(211,211,211);
        $this->Cell($w[0]+$w[1]+$w[2],6,'Conducta del Agresor',1,0,'C',true);
        $this->Ln(6);
        $this->Multicell($w[0]+$w[1]+$w[2],6,utf8_decode('Antecedentes Penales: '.$rows['ant_pen_agr']),1);
        $sql="select * from um_checkbox where cod_chk=".$_GET['codigo']." and cat_chk like 'abu%'";
        $rs=pg_query($sql) or die("Error en la busqueda");
        $numRow=pg_num_rows($rs);
        for ($j=0; $j < $numRow; $j++) 
        { 
            $rows=pg_fetch_array($rs,$j);
            if($j==0){
                $this->cell($w[0]+25,6,'A quienes ha abusado: ','L');
                $this->Cell($w[2]+$w[1]-25,6,utf8_decode($rows['sel_chk']),'R',0,'J');
            }
            else
            {
                $this->cell($w[0]+25,6,'','L');
                 $this->Cell($w[2]+$w[1]-25,6,utf8_decode($rows['sel_chk']),'R',0,'J');
            }
              $this->Ln(6);
        }
        $this->Cell(array_sum($w),0,'','T');
        $this->Ln();
        $sql="select * from um_checkbox where cod_chk=".$_GET['codigo']." and cat_chk like 'prob%'";
        $rs=pg_query($sql) or die("Error en la busqueda");
        $numRow=pg_num_rows($rs);
        for ($j=0; $j < $numRow; $j++) 
        { 
            $rows=pg_fetch_array($rs,$j);
            if($j==0){
                $this->cell($w[0]+25,6,'Presunto agresor manifiesta: ','L');
                $this->Cell($w[2]+$w[1]-25,6,utf8_decode($rows['sel_chk']),'R',0,'J');
            }
            else
            {
                $this->cell($w[0]+25,6,'','L');
                 $this->Cell($w[2]+$w[1]-25,6,utf8_decode($rows['sel_chk']),'R',0,'J');
            }
              $this->Ln(6);
        }

         //Observaciones---------
        $this->SetFillColor(211,211,211);
        $this->Cell($w[0]+$w[1]+$w[2],6,'Observaciones',1,0,'C',true);
        $this->Ln(6);
        $sql="select to_char(fec_obs,'DD/MM/YYYY') as fec_obs,obs from um_obs_exp where cod_exp=".$_GET['codigo'];
        $rs=pg_query($sql) or die("Error en la busqueda");
        $numRow=pg_num_rows($rs);
        for ($j=0; $j < $numRow; $j++) 
        { 
            $rows=pg_fetch_array($rs,$j);
            $this->Cell($w[0]+$w[1]+$w[2],6,'Fecha de Observacion: '.$rows['fec_obs'],'LR',0,'C');
            $this->Ln(6);
            $this->Multicell($w[0]+$w[1]+$w[2],6,'Observacion: '.utf8_decode($rows['obs']),'LRB');
            $this->Ln(6);
        }
    }
   
   
}

}

$sql="select * from rf_persona a, um_expediente b, um_obs_exp c, um_checkbox d where a.cod_per=b.cod_per and b.cod_exp=c.cod_exp and c.cod_exp=d.cod_chk and d.cod_chk=".$_GET['codigo'];
$rs=pg_query($sql) or die("Error en la busqueda");
$numRow=pg_num_rows($rs);

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->ImprovedTable($rs);
$pdf->Output();
?>