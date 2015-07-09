<?php
require_once("../../php/conexion.php");
$conexion = conectar();

/*echo 	"<script type='text/javascript'>
			alert('ha entrado al archivo proc_marginacion.php');
			</script>";*/

guardarMarginacion();

/*if($_POST["nom"]== "" and $_POST["accion"] != "guardar-nacimiento-partida"){
	echo 	"<script type='text/javascript'>
			alert('Ingrese un parámetro de búsqueda');
			</script>";
}

elseif($_POST["accion"] == "guardar-nacimiento-partida") {
	guardarNacimientoPartida();
}

elseif($_POST["accion"] == "buscar-padre"){
	buscarPadre();
}

elseif($_POST["accion"] == "buscar-madre") {
	buscarMadre();
}

elseif($_POST["accion"] == "buscar-informante"){
	buscarInformante();
}

elseif($_POST["accion"] == "buscar-testigo1"){
	buscarTestigo1();
}

elseif($_POST["accion"] == "buscar-testigo2") {
	buscarTestigo2();
}*/

/* ==================================================================================================== *
 * ==================================================================================================== *
 * Definicion de las funciones utilizadas en este script
 * ==================================================================================================== *
 * ==================================================================================================== */

/* ================================================== *
 * Función GuardarNacimientoPartida()
 * Busca datos de un registro en la tabla rf_persona
 * ================================================== */

function guardarMarginacion(){
	$consulta = "INSERT INTO rf_marginacion (num_lib, num_par,tip, fec, cue)
	VALUES ('$_POST[num_lib]', '$_POST[num_par]', '$_POST[tip]', '$_POST[fec]', '$_POST[cue]' )";

	//echo $consulta;

	if(pg_query($consulta)){
		echo "<script type='text/javascript'>" .
			 "alert('Guardado exitosamente');" .
			 //"window.open('../reportes/formulario_nacimiento_partida.php?num_lib=" . $_POST[num_lib] . "&num_par=" . $_POST[num_par] . "', '_blank');" .
			 //"parent.formulario.location.href='form_nacimiento_digestyc.php?num_lib=" . $_POST[num_lib] . "&num_par=" . $_POST[num_par] . "&cod_per=" . $_POST[cod_per] . "#'" .
			 "parent.location.href='../index_registrofamiliar.php';" .
			 "</script>";
	}
	else{
		echo "<script type='text/javascript'>" .
			 "alert('Error al guardar');" .
			 "</script>";
	}
}
?>