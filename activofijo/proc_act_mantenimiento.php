<?php
	include ("../php/conexion.php");
	$conn=conectar();
	$sql="UPDATE af_mantenimiento SET des='$_POST[des]', cos='$_POST[cos]', emp='$_POST[emp]' where cod_man='$_POST[cod_man]'";
	$rs=pg_query($sql) or die("Error al actualizar");
	if($rs){
		echo "<script>";
		echo "alert('Actualizado')";
		echo "</script>";
	}
	else{
		echo "<script>";
		echo "alert('Error al actualizar '".pg_last_error().")";
		echo "</script>";	
	}
?>