<?php
	require_once("../../php/conexion.php");
	$conexion =  conectar();
	
	if($_POST["nom"] != ""){
		$consulta = "SELECT * FROM rf_nacimiento_partida WHERE nom ILIKE '%$_POST[nom]%'";
	}
	else if($_POST["fec"] != ""){
		$consulta = "SELECT * FROM rf_nacimiento_partida WHERE fec_nac = '%$_POST[fec]%'";
	}
	
	$resultado = pg_query($consulta);
	
	while($registro = pg_fetch_array($resultado)) {
		$registros[]= $registro;	
	}
	
	foreach($registros as $registro){
		foreach($registro as $clave => $valor){
			if(is_string($x = $clave)){
				$fila[$clave]  = $valor;
			}
			$fila[nom_ape_pad] =$fila[nom_pad] . " " . $fila[ape1_pad] . " " . $fila[ape2_pad];
			$fila[nom_ape_mad] =$fila[nom_mad] . " " . $fila[ape1_mad] . " " . $fila[ape2_mad];
			$fila[imp] = "<a class='btn' href='../reportes/nacimiento_partida.php?num_lib=" . $fila[num_lib] . "&num_par=" . $fila[num_par] . "'><i class='icon-print'></a>";
		}
		$tabla[] = $fila;
	}

	$datos = json_encode($tabla);
	
	echo $datos;
	
	pg_close($conexion);
?>