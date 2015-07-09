<?php 
	require_once("../../php/conexion.php");
	$conexion = conectar();
	
	switch ($_POST["accion"]) {
		case 'guardar-y-retornar';
			guardarYRetornar();
			break;
	}
	
	function guardarYRetornar(){
		$consulta = "INSERT INTO rf_persona(nom,ape1,ape2,sex,fec_nac,dui,nit,tel1,tel2,dep,mun,dir,ocu,
			est_civ)
			VALUES('$_POST[nom]','$_POST[ape1]','$_POST[ape2]','$_POST[sex]','$_POST[fec_nac]',
			'$_POST[dui]','$_POST[nit]','$_POST[tel1]','$_POST[tel2]','$_POST[dep]',
			'$_POST[mun]','$_POST[dir]','$_POST[ocu]','$_POST[est_civ]')";
		if (pg_query($consulta)) {
			$consulta = "SELECT * FROM rf_persona WHERE dui='$_POST[dui]'";
			$resultado = pg_query($consulta);

			if(pg_num_rows($resultado)>0){
			$registro = pg_fetch_array($resultado);

				$fila= array();
				foreach($registro as $clave => $valor){
					if(is_string($x = $clave)){
						$fila[$clave] = $valor;
					}
				}			
			echo json_encode($fila);
		}
	}

	}

	function prueba(){
		$consulta = "SELECT * FROM rf_persona WHERE dui='04223023-5'";
			$resultado = pg_query($consulta);

			if(pg_num_rows($resultado)>0){
			$registro = pg_fetch_array($resultado);

				$fila= array();
				foreach($registro as $clave => $valor){
					if(is_string($x = $clave)){
						$fila[$clave] = $valor;
					}
				}
			#list($ano, $mes, $dia) = explode("-", $fila[fec_nac]);
			//$fila[fec_for] = $dia . "-" . $mes . "-" . $ano;
			#$fila[nom_com] = $fila[nom] . " " . $fila[ape1] . " " . $fila[ape2];
			
			echo json_encode($fila);
		}
	}
?>