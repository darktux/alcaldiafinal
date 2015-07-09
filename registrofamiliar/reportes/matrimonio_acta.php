<?php 
	include_once("../../php/class/tcpdf/tcpdf.php");
	include_once("../../php/class/PHPJasperXML.inc.php");
	$logoal="../img/logoal.jpg";
	$logoes="../img/logoes.jpg";
	$fecha=date("d/m/Y");
	$PHPJasperXML = new PHPJasperXML();
	$PHPJasperXML->debugsql=false;
	$PHPJasperXML->arrayParameter=array("logoes"=>$logoes,"logoal"=>$logoal,"fechaReporte"=>$fecha, "num_lib"=>$_GET[num_lib], "num_act"=>$_GET[num_act]);

			$archivo="../../reportes/registrofamiliar/matrimonio_acta.jrxml";
			$PHPJasperXML->load_xml_file($archivo);
			$PHPJasperXML->transferDBtoArray("localhost","admin","admin","db_alcaldia","psql");
			$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
?>