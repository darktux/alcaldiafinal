<?php 
	include_once("../php/class/tcpdf/tcpdf.php");
	include_once("../php/class/PHPJasperXML.inc.php");
	$logoal="../img/logoal.jpg";
	$logoes="../img/logoes.jpg";
	$fecha=date("d/m/Y");
	$PHPJasperXML = new PHPJasperXML();
			$PHPJasperXML->debugsql=false;
			$PHPJasperXML->arrayParameter=array("logoes"=>$logoes,"logoal"=>$logoal,"fechaReporte"=>$fecha);
			//$PHPJasperXML->load_xml_file("../reportes/unidadmujer/rep_proy_eje.jrxml");
			// $PHPJasperXML->transferDBtoArray("localhost","postgres","root","db_alcaldia","psql");
	
	
	// echo "
	// <html>
	// <body>
	// <embed src='../reportes/report1.pdf' width='1024' height='680'>
	// </body>
	// </html>
	// ";
	switch ($_GET['casorep']) {
		case '1':{
			$archivo="../reportes/unidadmujer/rep_proy_eje.jrxml";
			$PHPJasperXML->load_xml_file($archivo);
			$PHPJasperXML->transferDBtoArray("localhost","postgres","root","db_alcaldia","psql");
			$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
		}break;

		case '2':
			$archivo="../reportes/unidadmujer/rep_beneficiarios.jrxml";
			$PHPJasperXML->load_xml_file($archivo);
			$PHPJasperXML->transferDBtoArray("localhost","postgres","root","db_alcaldia","psql");
			$PHPJasperXML->outpage("D");
			break;
		case '3':
			$archivo="../reportes/unidadmujer/rep_proyectos.jrxml";
			$PHPJasperXML->load_xml_file($archivo);
			$PHPJasperXML->transferDBtoArray("localhost","postgres","root","db_alcaldia","psql");
			$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
		break;

		case '4':
			$archivo="../reportes/unidadmujer/rep_cost_pro.jrxml";
			$PHPJasperXML->load_xml_file($archivo);
			$PHPJasperXML->transferDBtoArray("localhost","postgres","root","db_alcaldia","psql");
			$PHPJasperXML->outpage("I");
			break;
	}
?>