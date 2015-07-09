<?php 
	session_start();
	include('./../../php/conexion.php');
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{
			$sql="INSERT INTO ca_alumbrado(sit_en,alum_mun,puntos) VALUES('$_POST[sit_en]','$_POST[alum_mun]','$_POST[puntos]')";
			if (pg_query($sql)) {
				pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Registró nueva lámpara',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				echo "Guardado exitosamente";
			}
			pg_close($conn);
		}break;

		case '2':{
			$sql="SELECT * FROM ca_alumbrado";
			$rs=pg_query($sql);
			$datalum = array();
			while ($obj=pg_fetch_object($rs)){
				$datalum[]=array(
					'cod_alumbrado'=>$obj->cod_alumbrado,
					'sit_en'=>$obj->sit_en,
					'alum_mun'=>$obj->alum_mun,
					'puntos'=>$obj->puntos,
					'acciones'=>"<button class='btn' onclick='editCol(".$obj->cod_alumbrado.")'><i class='icon-edit'></i></button><button class='btn' onclick='remCol(".$obj->cod_alumbrado.")'><i class='icon-remove'></i></button>"
				);
			}
			echo ''.json_encode($datalum).'';
			pg_close($conn);
		}break;

		case '3':{
			if (pg_query("DELETE FROM ca_alumbrado WHERE cod_alumbrado='$_POST[cod_alumbrado]'")) {
				pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Eliminó una lámpara',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				echo "Eliminado exitosamente";
			}
			pg_close($conn);
		}break;

		case '4':{
			$sql="SELECT * FROM ca_alumbrado WHERE cod_alumbrado='$_POST[cod_alumbrado]'";
			$rs=pg_query($sql);
			$datalum = array();
			while ($obj=pg_fetch_object($rs)){
				$datalum[]=array(
					'cod_alumbrado'=>$obj->cod_alumbrado,
					'sit_en'=>$obj->sit_en,
					'alum_mun'=>$obj->alum_mun,
					'posicion'=>$obj->puntos
				);
			}
			echo ''.json_encode($datalum).'';
			pg_close($conn);
		}break;

		case '5':{
			$sql="UPDATE ca_alumbrado SET sit_en='$_POST[sit_en]',alum_mun='$_POST[alum_mun]' ,puntos='$_POST[puntos]' WHERE cod_alumbrado='$_POST[cod_alumbrado]'";
			if (pg_query($sql)) {
				pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Actualizó datos de lámpara',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				echo "Actualizado exitosamente";
			}
		}break;
		case '6':{
			$sql="UPDATE ca_alumbrado SET alum_mun='$_POST[alum_mun]' WHERE cod_alumbrado='$_POST[cod_alumbrado]'";
			if (pg_query($sql)) {
				echo "Actualizado exitosamente";
			}
		}break;

	}
?>