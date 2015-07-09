<?php
	require_once("../conexion/conexion.php");
	$conexion = Conexion::getConexion();
	
	if($_POST["nom"] != ""){
	$consulta  = "SELECT * FROM rf_matrimonio_acta WHERE nom_eso ILIKE '%$_POST[nom]%' or ape1_eso ILIKE '%$_POST[nom]%' or ape2_eso ILIKE '%$_POST[nom]%' or nom_esa ILIKE '%$_POST[nom]%' or ape1_esa ILIKE '%$_POST[nom]%' or ape2_esa ILIKE '%$_POST[nom]%'";
	}
	else if($_POST["fec"] != ""){
	$consulta  = "SELECT * FROM rf_matrimonio_acta WHERE fec_mat = '%$_POST[fec]%'";
	}
	$resultado = $conexion->prepare($consulta);
	$resultado->execute();
	
	// Inicia conversión de tabla a array JSON
	$arrayJSON = array();
	foreach($resultado as $filaResultado){
		foreach($filaResultado as $clave => $valor){
			if(is_string($x = $clave)){
			$filaJSON[$clave] = $valor;
			}
			$filaJSON[nom_ape_eso] =$filaResultado[nom_eso] . " " . $filaResultado[ape1_eso] . " " . $filaResultado[ape2_eso];
			$filaJSON[nom_ape_esa] =$filaResultado[nom_esa] . " " . $filaResultado[ape1_esa] . " " . $filaResultado[ape2_esa];
			$filaJSON[imp] = "<a class='btn' href='../reportes/matrimonio_acta.php?num_lib=" . $filaResultado[num_lib] . "&num_act=" . $filaResultado[num_act] . "'><i class='icon-print'></a>";
		}
		$arrayJSON[] = $filaJSON;
	}
	// Termina conversión de tabla a array JSON
	
		echo '' . json_encode($arrayJSON) . '';
?>