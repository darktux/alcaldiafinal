<?php 
	include_once("../php/class/tcpdf/tcpdf.php");
	include_once("../php/class/PHPJasperXML.inc.php");
	// $logoal="../img/bg5.jpg";
	// $logoes="../img/bg5.jpg";

	$PHPJasperXML = new PHPJasperXML();
	$PHPJasperXML->debugsql=false;
	// $PHPJasperXML->arrayParameter=array("logoes"=>$logoes,"logoal"=>$logoal);
	$PHPJasperXML->arrayParameter=array("parameter1"=>1);
	
	$PHPJasperXML->load_xml_file("../reportes/report1.jrxml");

	$PHPJasperXML->transferDBtoArray("localhost","postgres","root","db_alcaldia","psql");
	// $PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
	echo "
	<html>
	<body>
	<embed src='../reportes/report1.pdf' width='1024' height='680'>
	</body>
	</html>
	";
?>