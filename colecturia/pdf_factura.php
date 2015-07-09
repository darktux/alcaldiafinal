<?php
require_once("../php/fpdf17/fpdf.php");
require_once("../php/conexion.php");
require_once("../registrofamiliar/php/funciones.php");
$conexion = conectar();
/* TODO obtener la fecha del registro y no del sistema*/


/* ================================================== *
 * Preparación del documento
 * ================================================== */

$factura = new FPDF(); // Crear un nuevo objeto FPDF
$factura->FPDF('l','mm', array(170 ,130 )); // Configurar la pagina llamando al constructor del objeto
$factura->AddPage(); // Agregar una nueva página
$factura->SetFont("courier", "", 8); // Configurar la Fuente

/* ================================================== *
 * Preparación de los campos
 * ================================================== */

//variables principales
$cod_fac = $_GET[cod_fac];

// Campos del encabezado
$lug_dia = "San Cristóbal, " . date("d");
$mes = mesATexto(date("m"));
$ano = date("Y");

// Campos de la factura
$consulta  = "SELECT * FROM co_factura where cod_fac = $cod_fac";
$resultado = pg_query($consulta);
$fila_factura = pg_fetch_array($resultado);

$mon_num = $fila_factura[mon];
$des = $fila_factura[des];

$nom_con = explode(" ", $fila_factura[nom_con]);

$nom_con_lin_1 = "";
$nom_con_lin_2 = "";

foreach ($nom_con as $key => $value){
	if ($key < 3) {
		$nom_con_lin_1 .= $value . " ";// Mostrar tres nombres en la primera linea
	} else {
		$nom_con_lin_2 .= $value . " ";// Mostrar los demas nombres en la segunda linea
	}
}

//$fila_factura[mon] = "1.09";
list($par_ent, $par_dec) = explode(".", $fila_factura[mon]);

if($par_ent == "0"){
	$mon_let_lin_1 = "cero";
} else {
	$mon_let_lin_1 = numeroATexto($par_ent);
}

//if($fila_factura[mon] - $par_ent == 0){ // Caso donde no hay parte decimal
if($par_dec == null){
	$par_dec = "00";
} else if ($par_dec === "1" || $par_dec === "2" || $par_dec === "3" || $par_dec === "4" || $par_dec === "5" || $par_dec === "6" || $par_dec === "7" || $par_dec === "8" || $par_dec === "9"){ // Caso donde no hay parte
	$par_dec = $par_dec . "0";
}

//if ($fila_factura[mon] - $par_ent < 0.1){
//	$par_dec = $par_dec . "0";
//}

$mon_let_lin_2 = "con " . $par_dec . "/100 dolares" ;

$tot = "$ " . $mon_num;

// Campos de detalle
$consulta = "SELECT * FROM co_factura_detalle WHERE cod_fac = $cod_fac ";
$resultado = pg_query($consulta);
$borde = 0;
$top = 46;
while($registro = pg_fetch_array($resultado)) {
	$factura->SetXY(67 , $top);
	$factura->Cell(35, 4, utf8_decode($registro[cod_rub] . " " . substr($registro[det], 0, 14)), $borde);

	$factura->SetXY(104 , $top);
	$factura->Cell(18, 4, utf8_decode($registro[mon]), $borde);

	$top = $top + 4;
}

$factura->SetXY(67 , $top);
$factura->Multicell(35, 4, utf8_decode($des), $borde);

/* ================================================== *
 * Preparación de las celdas
 * ================================================== */

// Celdas del encabezado
$factura->SetXY(30 ,24);
$factura->Cell(75, 4, utf8_decode($lug_dia), $borde);

$factura->SetXY(115 ,24);
$factura->Cell(30, 4, utf8_decode($mes), $borde);

$factura->SetXY(152 ,24);
$factura->Cell(15, 4, utf8_decode($ano), $borde);

// Celdas de la factura
$factura->SetXY(40 ,33);
$factura->Cell(25, 4, utf8_decode($mon_num), $borde);

$factura->SetXY(18 ,43);
$factura->Cell(48, 4, utf8_decode($nom_con_lin_1), $borde);

$factura->SetXY(18 ,51);
$factura->Cell(48, 4, utf8_decode($nom_con_lin_2), $borde);

$factura->SetXY(18 ,70);
$factura->Cell(48, 4, utf8_decode($mon_let_lin_1), $borde);

$factura->SetXY(18 ,78);
$factura->Cell(48, 4, utf8_decode($mon_let_lin_2), $borde);

// Celdas de total
$factura->SetXY(104 ,102);
$factura->Cell(18, 5, utf8_decode($tot), $borde);

// Cerrar el documento y mandarlo al navegador
$factura->Output();

// actualizar el estado de la factura y de la notificación
$con_act_fac = "update co_factura set est='t' where cod_fac='$cod_fac'";
$con_act_not = "update co_notificacion set status = 'f' where cod_fac='$cod_fac'";
pg_query($con_act_fac);
pg_query($con_act_not);

?>