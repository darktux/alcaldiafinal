<?php
	session_start();
	include ("../php/conexion.php");
	$conn=conectar();
	switch ($_POST['caso']) {
		case '1':
			pg_query($conn,"BEGIN");
			$sql="insert into se_usuario(nom,mail,usu,contra,niv,act,cod_pre,res) values('$_POST[nom]','$_POST[cor]','$_POST[usu]','".sha1(md5(trim($_POST['usu']).trim($_POST['contra'])))."','$_POST[niv]','t','$_POST[pre]','$_POST[res]')";
			pg_query($sql)or die("Error en la búsqueda");
			$rs=pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Ingreso un nuevo usuario ($_POST[usu]).',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
			if($rs){ 
				echo "Guardado exitosamente";
				pg_query($conn,"COMMIT");
			}else{
				echo "Error, al guardar el usuario";
				pg_query($conn,"ROLLBACK");
			}
		break;

		case '2':
		$sql="select * from se_preguntas";
		$rs=pg_query($sql);
		if($rs){
			$numRow=pg_num_rows($rs);
			echo "<select name='pre' id='pre'>
					<option value='0'>Seleccione...</option>";

			for ($i=0; $i < $numRow; $i++) {
				$row=pg_fetch_array($rs,$i);
				$cod= $row['cod'];
				$nom= $row['pre'];
				echo "<option value=".$cod.">¿".$nom."</option>";

			}
			echo "</select>";
		}
		pg_close($conn);
		break;
	}
	pg_close($conn);
?>