<?php 
	include_once("../php/class/tcpdf/tcpdf.php");
	include_once("../php/class/PHPJasperXML.inc.php");
	$logoal="../img/logoal.jpg";
	$logoes="../img/logoes.jpg";
	$fecha=date("d/m/Y");
	$PHPJasperXML = new PHPJasperXML();
	$PHPJasperXML->debugsql=false;
	$PHPJasperXML->arrayParameter=array("logoes"=>$logoes,"logoal"=>$logoal,"fechaReporte"=>$fecha);
				
	// echo "
	// <html>
	// <body>
	// <embed src='../reportes/report1.pdf' width='1024' height='680'>
	// </body>
	// </html>
	// ";
	switch ($_GET['casorep']) {
		case '1':{
			$archivo="../reportes/catastro/rep_contribuyente.jrxml";
			$PHPJasperXML->load_xml_file($archivo);
			$PHPJasperXML->transferDBtoArray("localhost","postgres","root","db_alcaldia","psql");
			$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
		}break;

		case '2':{
			$archivo="../reportes/catastro/rep_negocio.jrxml";
			$PHPJasperXML->load_xml_file($archivo);
			$PHPJasperXML->transferDBtoArray("localhost","postgres","root","db_alcaldia","psql");
			$PHPJasperXML->outpage("I");
		}break;

		case '3':{
			$archivo="../reportes/catastro/rep_inmueble.jrxml";
			$PHPJasperXML->load_xml_file($archivo);
			$PHPJasperXML->transferDBtoArray("localhost","postgres","root","db_alcaldia","psql");
			$PHPJasperXML->outpage("I");
		}break;
		
	}
?>