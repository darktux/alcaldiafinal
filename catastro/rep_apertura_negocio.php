<?php 
	include_once("../php/class/tcpdf/tcpdf.php");
	include_once("../php/class/PHPJasperXML.inc.php");
	$logoal="../img/logoal.jpg";
	$logoes="../img/logoes.jpg";
	date_default_timezone_set('America/El_Salvador');
	$dias=array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
	$meses=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

	$fecha=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]." de ".date("Y");
	$hora=date("H:i");
	$hora=$hora;
	$id=$_GET['cod_con'];
	$idneg=$_GET['cod_neg'];
	$tip_con=$_GET['tip_con'];

	$PHPJasperXML = new PHPJasperXML();
	$PHPJasperXML->debugsql=false;
	$PHPJasperXML->arrayParameter=array("cod_con"=>$id,"fechaReporte"=>$fecha,"horaReporte"=>$hora,"cod_neg"=>$idneg);
	if($tip_con=="N")
		$archivo="../reportes/catastro/form_negocio.jrxml";
	else
		$archivo="../reportes/catastro/form_negocio_jur.jrxml";
	$PHPJasperXML->load_xml_file($archivo);
	$PHPJasperXML->transferDBtoArray("localhost","postgres","root","db_alcaldia","psql");
	$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
?>