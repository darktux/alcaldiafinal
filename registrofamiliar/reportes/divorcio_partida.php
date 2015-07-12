<?php 
	include_once("../../php/class/tcpdf/tcpdf.php");
	include_once("../../php/class/PHPJasperXML.inc.php");
	$logoal="../img/logoal.jpg";
	$logoes="../img/logoes.jpg";
	$fecha=date("d/m/Y");
	$PHPJasperXML = new PHPJasperXML();
	$PHPJasperXML->debugsql=false;

	// verificar si hay marginaciones
	require_once("../../php/conexion.php");
	require_once("../php/funciones.php");
	$conexion =  conectar();
	$consulta2 = "SELECT * FROM rf_marginacion WHERE (num_lib,num_par,tip) = ('$_GET[num_lib]','$_GET[num_par]','divorcio')";
	$resultado2 = pg_query($consulta2);
	if(pg_num_rows($resultado2)>0){
		
		$marginacion = "\n\nAl margen de la partida se lee: "; 
		while ($registro2 = pg_fetch_array($resultado2)) {
			$marginacion .= "\n" . $registro2[cue];
		}
	}


	$PHPJasperXML->arrayParameter=array("logoes"=>$logoes,"logoal"=>$logoal,"fechaReporte"=>$fecha, "num_lib"=>$_GET[num_lib], "num_par"=>$_GET[num_par], "marginacion"=>$marginacion);

			$archivo="../../reportes/registrofamiliar/divorcio_partida.jrxml";
			$PHPJasperXML->load_xml_file($archivo);
			$PHPJasperXML->transferDBtoArray("localhost","admin","admin","db_alcaldia","psql");
			$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
?>