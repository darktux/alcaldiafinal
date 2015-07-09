<?php
require_once("../../php/conexion.php");
$conexion = conectar();

if($_POST["accion"] == "guardar-divorcio-digestyc") {
	/*echo "<script type='text/javascript'>".
		 "alert('Ha entrado a la opcion de guardar los datos de digestyc');".
		 "</script>"; */
	guardarDivorcioDigestyc();
}

/* ==================================================================================================== *
 * ==================================================================================================== *
 * Definicion de las funciones utilizadas en este script
 * ==================================================================================================== *
 * ==================================================================================================== */

/* ==================================================================================================== *
 * Función: guardarDivorcioDigestyc()
 * Guarda los datos para DIGESTYC de la partida de divorcio
 * ==================================================================================================== */

function guardarDivorcioDigestyc()
{
	$consulta ="INSERT INTO rf_divorcio_digestyc(num_lib, num_par, dep_div, mun_div, eda_eso, alf_eso, ocu_eso, 
	dep_res_eso, mun_res_eso, can_res_eso, are_res_eso, eda_esa, alf_esa, ocu_esa, dep_res_esa, mun_res_esa, 
	can_res_esa, are_res_esa, cau_div, fec_mat, num_hij, fec_reg, obs, nom_reg) 
	VALUES ('$_POST[num_lib]', '$_POST[num_par]', '$_POST[dep_div]', '$_POST[mun_div]', '$_POST[eda_eso]', 
	'$_POST[alf_eso]', '$_POST[ocu_eso]', '$_POST[dep_res_eso]', '$_POST[mun_res_eso]', '$_POST[can_res_eso]', 
	'$_POST[are_res_eso]', '$_POST[eda_esa]', '$_POST[alf_esa]', '$_POST[ocu_esa]', '$_POST[dep_res_esa]', 
	'$_POST[mun_res_esa]', '$_POST[can_res_esa]', '$_POST[are_res_esa]', '$_POST[cau_div]', '$_POST[fec_mat]', 
	'$_POST[num_hij]', '$_POST[fec_reg]', '$_POST[obs]', '$_POST[nom_reg]')";
			
	if(pg_query($consulta))
	{
		echo "<script type='text/javascript'>
			 alert('Guardado exitosamente');" .
			 "window.open('../reportes/rep_formulario_divorcio_digestyc.php?num_lib=" . $_POST[num_lib] . "&num_par=" . $_POST[num_par] . "', '_blank');" .
			 "parent.location.href='../index_registrofamiliar.php';
			 </script>";
	}else{
		echo "<script type='text/javascript'>" .
			 "alert('Error al guardar');" .
			 "</script>";
	}
}
?>