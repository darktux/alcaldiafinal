<?php
require_once("../../php/conexion.php");
$conexion = conectar();

if($_POST["accion"] == "guardar-nacimiento-digestyc") {
	/*echo "<script type='text/javascript'>".
		 "alert('Ha entrado a la opcion de guardar los datos de digestyc');".
		 "</script>";*/
	guardarNacimientoDigestyc();
}

/* ==================================================================================================== *
 * ==================================================================================================== *
 * Definicion de las funciones utilizadas en este script
 * ==================================================================================================== *
 * ==================================================================================================== */

/* ==================================================================================================== *
 * Función: guardarNacimientoDigestyc()
 * Guarda los datos para DIGESTYC de la partida de nacimiento
 * ==================================================================================================== */

function guardarNacimientoDigestyc()
{
	if($_POST[loc_nac] == "Otro"){
		$_POST[loc_nac] = $_POST[det_loc_nac];
	}

	$consulta = "INSERT INTO rf_nacimiento_digestyc(num_lib, num_par, loc_nac, can_nac, pes_nac, tal, 
	cla_par, tip_par, nom_asi, car_asi, dur_emb, est_fam, alf_mad, can_res, are_res, hij_nac_viv, hij_mue, hij_nac_mue, 
	alf_pad) 
	VALUES ('$_POST[num_lib]', '$_POST[num_par]', '$_POST[loc_nac]', '$_POST[can_nac]', 
	'$_POST[pes_nac]', '$_POST[tal]', '$_POST[cla_par]', '$_POST[tip_par]', '$_POST[nom_asi]', '$_POST[car_asi]', 
	'$_POST[dur_emb]', '$_POST[est_fam]', '$_POST[alf_mad]', '$_POST[can_res]', '$_POST[are_res]', '$_POST[hij_nac_viv]', 
	'$_POST[hij_mue]', '$_POST[hij_nac_mue]', '$_POST[alf_pad]')";
			
	if(pg_query($consulta)){
		echo "<script type='text/javascript'>
			 alert('Guardado exitosamente');" .
			 "window.open('../reportes/rep_formulario_nacimiento_digestyc.php?num_lib=" . $_POST[num_lib] . "&num_par=" . $_POST[num_par] . "', '_blank');" .
			 "parent.location.href='../index_registrofamiliar.php';
			 </script>";
	}else{
		echo "<script type='text/javascript'>
			 alert('Error al guardar');
			 </script>";
	}
		
}
?>