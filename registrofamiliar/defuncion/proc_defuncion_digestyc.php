<?php
require_once("../../php/conexion.php");
$conexion = conectar();

if($_POST["accion"] == "guardar-defuncion-digestyc") {
	/*echo "<script type='text/javascript'>".
		 "alert('Ha entrado a la opcion de guardar los datos de digestyc');".
		 "</script>";*/
	guardarDefuncionDigestyc();
}

/* ==================================================================================================== *
 * ==================================================================================================== *
 * Definicion de las funciones utilizadas en este script
 * ==================================================================================================== *
 * ==================================================================================================== */

/* ==================================================================================================== *
 * Función: guardarDefuncionDigestyc()
 * Guarda los datos para DIGESTYC de la partida de defunción
 * ==================================================================================================== */

function guardarDefuncionDigestyc()
{
	$consulta = "INSERT INTO rf_defuncion_digestyc (num_lib, num_par, jub_pen, are, otr_est, fal_emb, mue_acc, cer_med, 
	cer_for, nom_reg) 
	VALUES ('$_POST[num_lib]', '$_POST[num_par]', '$_POST[jub_pen]', '$_POST[are]', '$_POST[otr_est]', '$_POST[fal_emb]', 
	'$_POST[mue_acc]', '$_POST[cer_med]', '$_POST[cer_for]', '$_POST[nom_reg]')";

	if (pg_query($consulta)) {
		$bandera = true;
	}
		
	if($_POST[men1] == "si"){
		$consulta2 = "INSERT INTO rf_defuncion_digestyc2(num_lib, num_par, hor_min, dia, mes, mad_cas, tip_par, 
		eda_mad, dur_emb, sem_ges) 
		VALUES ('$_POST[num_lib]', '$_POST[num_par]', '$_POST[hor_min_eda]', '$_POST[dia_eda]', 
		'$_POST[mes_eda]', '$_POST[mad_cas]', '$_POST[tip_par]', '$_POST[eda_mad]', '$_POST[dur_emb]', '$_POST[sem_ges]')";

		if(pg_query($consulta2)){
			echo "<br> Guardado 2";
		}
	}
				
	if($_POST[men2] == "si"){
		$consulta3 = "INSERT INTO rf_defuncion_digestyc3(num_lib, num_par, pes, tal, lug_nac, num_emb, num_abo, 
		num_nac_mue) VALUES ('$_POST[num_lib]', '$_POST[num_par]', '$_POST[pes]', '$_POST[tal]', '$_POST[lug_nac]', 
		'$_POST[num_emb]', '$_POST[num_abo]', '$_POST[num_nac_mue]')";

		if(pg_query($consulta3)){
			echo "<br> Guardado 3";
		}	
	}	
	
	if($bandera == true){
		echo"<script type='text/javascript'>
			 alert('Guardado exitosamente');" .
			 "window.open('../reportes/rep_formulario_defuncion_digestyc.php?num_lib=" . $_POST[num_lib] . "&num_par=" . $_POST[num_par] . "', '_blank');" .
			 "parent.location.href='../index_registrofamiliar.php';
			 </script>";
	}else{
		echo "<script type='text/javascript'>" .
			 "alert('Error al guardar');" .
			 "</script>";
	}
}

?>