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
		$sql="select a.pre from se_preguntas pre inner join se_usuario usu on usu.cod_pre=pre.cod where ";
		$rs=pg_query($sql);
		if($rs){
			$numRow=pg_num_rows($rs);
			echo "<select name='depto' id='sel_depto'>
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

		case '3':
			$sql="select u.usu,u.cod_pre, p.pre from se_usuario u inner join se_preguntas p on p.cod=u.cod_pre where usu='$_POST[txt_buscar]'";
			$rs=pg_query($sql);
			$numRow=pg_num_rows($rs);
			$datper = array();
			if($numRow!=0){
				// echo "encontrado mono";
				while ($obj=pg_fetch_object($rs)){
					$datper[]=array(
						'usu'=>$obj->usu,
						'cod_pre'=>$obj->cod_pre,
						'pre'=>$obj->pre
					);
				}
				echo ''.json_encode($datper).'';
			}
			else{
				echo "El usuario digitado no se encuentra.";
			}
		break;

		case '4':
			$sql="select u.res as res from se_usuario u where usu='$_POST[txt_buscar]'";
			$rs=pg_query($sql);
			$numRow=pg_num_rows($rs);
			$datper = array();
			if($numRow!=0){
				// echo "encontrado mono";
				for ($i=0; $i < $numRow; $i++) {
					$row=pg_fetch_array($rs,$i);
					$res= $row['res'];
					if($res==$_POST['txt_res']){
						echo "son iguales";
					}
				}
				
			}
			else{
				echo "El usuario digitado no se encuentra.";
			}
		break;

		case '5':

			$sql="update se_usuario set contra='".sha1(md5(trim($_POST['txt_buscar']).trim($_POST['contra1'])))."' where usu='$_POST[txt_buscar]'";
			pg_query($sql) or die ("error al actualizar contraseñas");
			echo "Actualizado exitosamente";
			
		break;
	}
	pg_close($conn);

?>