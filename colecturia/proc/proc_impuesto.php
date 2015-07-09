<?php 
	session_start();
	include('./../../php/conexion.php');
	$conn=conectar();	
	if($_POST['cob_met']==""){
		$_POST['cob_met']="f";
	}
	if(pg_query("INSERT INTO co_impuesto VALUES('$_POST[codigo]','$_POST[nom_cue]','$_POST[des_cue]','$_POST[tip_cob]','$_POST[cob_por]','$_POST[cob_fij]','$_POST[cob_min]','$_POST[cob_met]')")){
		pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Registró nuevo impuesto',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
		echo "Guardado exitosamente";
	};
	pg_close($conn);
?>