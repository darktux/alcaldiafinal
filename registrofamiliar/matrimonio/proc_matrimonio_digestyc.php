<?php
require_once("../../php/conexion.php");
$conexion = conectar();

if($_POST["accion"] == "guardar-matrimonio-digestyc") {
	/*echo "<script type='text/javascript'>".
		 "alert('Ha entrado a la opcion de guardar los datos de digestyc');".
		 "</script>";*/
	guardarMatrimonioDigestyc();
}

/* ==================================================================================================== *
 * ==================================================================================================== *
 * Definicion de las funciones utilizadas en este script
 * ==================================================================================================== *
 * ==================================================================================================== */

/* ==================================================================================================== *
 * Función: guardarMatrimonioDigestyc()
 * Guarda los datos para DIGESTYC de la partida de matrimonio
 * ==================================================================================================== */

function guardarMatrimonioDigestyc()
{
	$consulta= "INSERT INTO rf_matrimonio_digestyc(num_lib, num_par, dep_mat, mun_mat, eda_eso, dep_eso, mun_eso, 
	can_eso, zon_eso, est_civ_eso, alf_eso, ocu_eso, eda_esa, dep_esa, mun_esa, can_esa, zon_esa, est_civ_esa, alf_esa, 
	ocu_esa, fec_reg, nom_reg, obs) 
	VALUES ('$_POST[num_lib]', '$_POST[num_par]', '$_POST[dep_mat]', '$_POST[mun_mat]', '$_POST[eda_eso]', 
	'$_POST[dep_eso]', '$_POST[mun_eso]', '$_POST[can_eso]', '$_POST[zon_eso]', '$_POST[est_civ_eso]', 
	'$_POST[alf_eso]', '$_POST[ocu_eso]', '$_POST[eda_esa]', '$_POST[dep_esa]', '$_POST[mun_esa]', '$_POST[can_esa]', 
	'$_POST[zon_esa]', '$_POST[est_civ_esa]', '$_POST[alf_esa]', '$_POST[ocu_esa]', '$_POST[fec_reg]', 
	'$_POST[nom_reg]', '$_POST[obs]')";

	if(pg_query($consulta)){
		echo "<script type='text/javascript'>
			 alert('Guardado exitosamente');" .
			 "window.open('../reportes/rep_formulario_matrimonio_digestyc.php?num_lib=" . $_POST[num_lib] . "&num_par=" . $_POST[num_par] . "', '_blank');" .
			 "parent.location.href='../index_registrofamiliar.php';
			 </script>";
	}else{
		echo "<script type='text/javascript'>" .
			 "alert('Error al guardar');" .
			 "</script>";
	}
}
?>