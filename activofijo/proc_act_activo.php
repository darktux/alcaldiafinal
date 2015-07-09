<?php  
session_start();
include ("../php/conexion.php");
$conn=conectar();
switch ($_POST['caso']) {

	case '1':
		$sql="select * from af_depto";
		$rs=pg_query($sql);
		if($rs){
			$numRow=pg_num_rows($rs);
			echo "<select name='depto' id='sel_depto'>
					<option value='0'>Seleccione...</option>";

			for ($i=0; $i < $numRow; $i++) {
				$row=pg_fetch_array($rs,$i);
				$cod= $row['cod'];
				$nom= $row['nom'];

				echo "<option value=".$cod.">".$nom."</option>";
			}
			echo "</select>";
		}
		pg_close($conn);
		break;

	case '2':
		$sql="select * from af_tfondo";
		$rs=pg_query($sql);
		if($rs){
			$numRow=pg_num_rows($rs);
			echo "<select name='tfondo' id='sel_tfondo'>
					<option value='0'>Seleccione...</option>";

			for ($i=0; $i < $numRow; $i++) {
				$row=pg_fetch_array($rs,$i);
				$cod= $row['cod_tfondo'];
				$nom= $row['nom'];
				echo "<option value=".$cod.">".$nom."</option>";
			}
			echo "</select>
					<a href='#agregar_tfondo' class='btn' data-toggle='modal'><i class='icon-plus'></i></a>
				</div>";
		}
		pg_close($conn);
		break;

	case '3':
		if($_POST['radBus']=='codigo'){
			$sql="select a.cod_act,a.nom,a.mar,a.fec_adq from af_activo a  where a.act='t' and a.cod_act ilike '%$_POST[txtBus]%' order by a.cod_act";				
		}
		else{
			$sql="select a.cod_act,a.nom,a.mar,a.fec_adq from af_activo a  where a.act='t' and a.nom ilike '%$_POST[txtBus]%' order by a.cod_act";	
		}
		$rs=pg_query($sql) or die("Error en la busqueda");
		$numRow=pg_num_rows($rs);

		for ($i=0; $i < $numRow; $i++) {
			$row=pg_fetch_array($rs,$i);
			$cod= $row['cod_act'];
			$nom= $row['nom'];
			$mar= $row['mar'];
			$dep= $row['fec_adq'];
			echo "<tr>
					<td>".$cod."</td>
					<td>".$nom."</td>
					<td>".$mar."</td>
					<td>".$dep."</td>
					<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaDatos('".$cod."')\"><i class='icon-ok'></i></a></td>
				</tr>";
		}		
		pg_close($conn);
	break;

		case '4':
			//$sql="SELECT a.*, b.nom as depto, c.nom as tfondo FROM af_tfondo c inner join af_activo a inner join af_depto b on a.cod_dep=b.cod on c.cod_tfondo=a.cod_tfondo WHERE cod_act='$_POST[cod_act]'";
			$sql="SELECT * FROM af_activo a WHERE cod_act='$_POST[cod_act]'";
			$rs3=pg_query($sql) or die("Error en la búsqueda");
			$datper = array();
			while ($obj=pg_fetch_object($rs3)){
				$datper[]=array(
					'cod_act'=>$obj->cod_act,
					'nom'=>$obj->nom,
					'mar'=>$obj->mar,
					'mod'=>$obj->mod,
					'ser'=>$obj->ser,
					'cos_adq'=>$obj->cos_adq,
					'fec_adq'=>$obj->fec_adq,
					'cod_dep'=>$obj->cod_dep,
					'cod_tfondo'=>$obj->cod_tfondo,
					'ori'=>$obj->ori,
					'fec_gar'=>$obj->fec_gar,
					'don'=>$obj->don
				);
			}
			echo ''.json_encode($datper).'';
		break;

	case '5':
		if($_POST['ori']=="donado"){
			pg_query($conn,"BEGIN");
			$sql="update af_activo set nom='$_POST[nom]', mar='$_POST[mar]', mod='$_POST[mod]', ser='$_POST[ser]', ori='$_POST[ori]',don='$_POST[don]',cos_adq='$_POST[cos_adq]', fec_adq='$_POST[fec_adq]', fec_gar='$_POST[fec_gar]' where cod_act='$_POST[cod_act]'";
			pg_query($sql)or die("Error en la búsqueda");
			$rs=pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Actualizo un activo ($_POST[nom]).',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
			if($rs){ 
				echo "exito";
				pg_query($conn,"COMMIT");
			}else{
				echo "Error, al guardar el usuario";
				pg_query($conn,"ROLLBACK");
			}
			
		}
		else{
			pg_query($conn,"BEGIN");
			$sql="update af_activo set nom='$_POST[nom]', mar='$_POST[mar]', mod='$_POST[mod]', ser='$_POST[ser]', ori='$_POST[ori]',cod_tfondo='$_POST[tfondo]',cos_adq='$_POST[cos_adq]', fec_adq='$_POST[fec_adq]', fec_gar='$_POST[fec_gar]' where cod_act='$_POST[cod_act]'";
			pg_query($sql)or die("Error en la búsqueda");
			$rs=pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Actualizo un activo ($_POST[nom]).',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
			if($rs){ 
				echo "exito";
				pg_query($conn,"COMMIT");
			}else{
				echo "Error, al guardar el usuario";
				pg_query($conn,"ROLLBACK");
			}
			
		}
	break;
}
	// include ("../php/conexion.php");
	// $conn=conectar();
	// $sql="UPDATE af_activo SET nom='$_POST[nom]',mar='$_POST[mar]', mod='$_POST[mod]',ser='$_POST[ser]',cos_adq='$_POST[cos_adq]',fec_adq='$_POST[fec_adq]' where cod_act='$_POST[cod_act]'";
	// $rs=pg_query($sql) or die("Error al Actualizar");
	// if($rs){
	// 	echo "<script>";
	// 	echo "alert('Actualizado')";
	// 	echo "</script>";
	// }else{
	// 	echo "<script>";
	// 	echo "alert('No Actualizado')";
	// 	echo "</script>";
	// }
	// pg_close($conn);
?>