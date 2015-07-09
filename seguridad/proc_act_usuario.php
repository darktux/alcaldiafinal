<?php
	session_start();
	include ("../php/conexion.php");
	$conn=conectar();
	switch ($_POST['caso']) {
		case '1':
			if($_POST['radBus']=='nombre'){
				$sql="select id,nom,mail,usu from se_usuario where nom ilike '%$_POST[txtBus]%' and act='t' order by nom";				
			}
			else{
				$sql="select id,nom,mail,usu from se_usuario where usu ilike '%$_POST[txtBus]%' and act='t' order by usu";	
			}
			$rs=pg_query($sql) or die("Error en la busqueda");
			$numRow=pg_num_rows($rs);

			for ($i=0; $i < $numRow; $i++) {
				$row=pg_fetch_array($rs,$i);
				$nom= $row['nom'];
				$mail= $row['mail'];
				$usu= $row['usu'];
				$id=$row['id'];
				echo "<tr>
						<td>".$nom."</td>
						<td>".$mail."</td>
						<td>".$usu."</td>
						<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaDatos('".$id."')\"><i class='icon-ok'></i></a></td>
					</tr>";
			}		
			pg_close($conn);
		break;

		case '2': 
			//$sql="SELECT a.*, b.nom as depto, c.nom as tfondo FROM af_tfondo c inner join af_activo a inner join af_depto b on a.cod_dep=b.cod on c.cod_tfondo=a.cod_tfondo WHERE cod_act='$_POST[cod_act]'";
			$sql="SELECT id,nom,usu,contra,niv,mail FROM se_usuario WHERE act='t' and id='$_POST[cod_man]'";
			$rs3=pg_query($sql) or die("Error en la búsqueda");
			$datper = array();
			while ($obj=pg_fetch_object($rs3)){
				$datper[]=array(
					'nom'=>$obj->nom,
					'usu'=>$obj->usu,
					'contra'=>$obj->contra,
					'niv'=>$obj->niv,
					'cor'=>$obj->mail,
					'cod'=>$obj->id
				);
			}
			echo ''.json_encode($datper).'';
		break;
		
		case '3':
			pg_query($conn,"BEGIN");
			$sql="update se_usuario set nom='$_POST[nom]', mail='$_POST[cor]', usu='$_POST[usu]', niv='$_POST[niv]' where id='$_POST[cod]'";
			pg_query($sql)or die("Error en la búsqueda");
			$rs=pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Actualizo un nuevo usuario ($_POST[usu]).',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
			if($rs){ 
				echo "exito";
				pg_query($conn,"COMMIT");
			}else{
				echo "Error, al guardar el usuario";
				pg_query($conn,"ROLLBACK");
			}
		
		break;

	}


?>