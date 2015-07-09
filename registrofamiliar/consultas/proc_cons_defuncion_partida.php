<?php
	require_once("../../php/conexion.php");
	$conexion =  conectar();
	
	if($_POST["nom"] != ""){
		$consulta = "SELECT * FROM rf_defuncion_partida WHERE nom ILIKE '%$_POST[nom]%'";
	}
	else if($_POST["fec"] != ""){
		$consulta = "SELECT * FROM rf_defuncion_partida WHERE fec_def = '%$_POST[fec]%'";
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
			$fila[nom_ape] =$fila[nom] . " " . $fila[ape1] . " " . $fila[ape2];
			$fila[imp] = "<a class='btn' href='../reportes/defuncion_partida.php?num_lib=" . $fila[num_lib] . "&num_par=" . $fila[num_par] . "'><i class='icon-print'></i></a>";
		}
		$tabla[] = $fila;
	}

	$datos = json_encode($tabla);
	
	echo $datos;
	
	pg_close($conexion);
?>