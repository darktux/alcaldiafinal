<?php
	include("../conexion/conexion.php");
	include("clas_nacimiento_partida.php");
	
	$nacimiento = new Nacimiento();
	$nacimiento->guardar();
?>