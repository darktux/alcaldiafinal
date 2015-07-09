<?php 
	session_start();
	include('./../../php/conexion.php');
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{
			$sql="INSERT INTO ca_cementerio(nom_cem,sit_en,zon_cem,pre_nicPC,pre_nic2PC,pre_nicCE,pre_nic2CE,pre_nicFC,pre_nic2FC) VALUES('$_POST[nom_cem]','$_POST[sit_en]','$_POST[zon_cem]','$_POST[pre_nicPC]','$_POST[pre_nic2PC]','$_POST[pre_nicCE]','$_POST[pre_nic2CE]','$_POST[pre_nicFC]','$_POST[pre_nic2FC]')";
			pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Registró cementerio',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
			if (pg_query($sql)) {
				echo "Guardado exitosamente";
			}
			pg_close($conn);
		}break;

		case '2':{
			$sql="SELECT * FROM ca_cementerio";
			$rs=pg_query($sql);
			$datcem = array();
			while ($obj=pg_fetch_object($rs)){
				$datcem[]=array(
					'cod_cem'=>$obj->cod_cem,
					'nom_cem'=>$obj->nom_cem,
					'sit_en'=>$obj->sit_en,
					'zon_cem'=>$obj->zon_cem
				);
			}
			echo ''.json_encode($datcem).'';
			pg_close($conn);
		}break;

		case '3':{
			if (pg_query("DELETE FROM ca_cementerio WHERE cod_cem='$_POST[cod_cem]'")) {
				pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Eliminó cementerio',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				echo "Eliminado exitosamente";
			}
			pg_close($conn);
		}break;

		case '4':{
			$sql="SELECT * FROM ca_cementerio WHERE cod_cem='$_POST[cod_cem]'";
			$rs=pg_query($sql);
			$datcem = array();
			while ($obj=pg_fetch_object($rs)){
				$datcem[]=array(
					'cod_cem'=>$obj->cod_cem,
					'nom_cem'=>$obj->nom_cem,
					'sit_en'=>$obj->sit_en,
					'zon_cem'=>$obj->zon_cem,
					'pre_nicPC'=>$obj->pre_nicpc,
					'pre_nic2PC'=>$obj->pre_nic2pc,
					'pre_nicCE'=>$obj->pre_nicce,
					'pre_nic2CE'=>$obj->pre_nic2ce,
					'pre_nicFC'=>$obj->pre_nicfc,
					'pre_nic2FC'=>$obj->pre_nic2fc
				);
			}
			echo ''.json_encode($datcem).'';
			pg_close($conn);
		}break;

		case '5':{
			$sql="UPDATE ca_cementerio SET nom_cem='$_POST[nom_cem]',sit_en='$_POST[sit_en]',zon_cem='$_POST[zon_cem]',pre_nicPC='$_POST[pre_nicPC]',pre_nic2PC='$_POST[pre_nic2PC]',pre_nicCE='$_POST[pre_nicCE]',pre_nic2CE='$_POST[pre_nic2CE]',pre_nicFC='$_POST[pre_nicFC]',pre_nic2FC='$_POST[pre_nic2FC]' WHERE cod_cem='$_POST[cod_cem]'";
			if (pg_query($sql)) {
				pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Actualizó datos de cementerio',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				echo "Actualizado exitosamente";
			}
			pg_close($conn);
		}break;

	}
?>