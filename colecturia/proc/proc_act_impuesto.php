<?php 
	session_start();
	include('./../../php/conexion.php');
	$conn=conectar();
	switch ($_POST['caso']) {
		case '1':{
			$sql="UPDATE co_impuesto SET nom_cue='$_POST[nom_cue]',des_cue='$_POST[des_cue]',tip_cob='$_POST[tip_cob]',cob_por='$_POST[cob_por]',cob_fij='$_POST[cob_fij]',cob_min='$_POST[cob_min]',cob_met='$_POST[cob_met]' WHERE codigo='$_POST[codigo]'";
			if(pg_query($sql)){
				pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Actualizó datos de impuesto',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				echo "Actualizado exitosamente";
			}
		}break;
		case '2':{			
			$sql="";
			if ($_POST['buspor']=="Nombre") {
				$sql="SELECT * FROM co_impuesto WHERE nom_cue ilike '%$_POST[txtBusImp]%' ";
			}else{
				$sql="SELECT * FROM co_impuesto WHERE codigo ilike '%$_POST[txtBusImp]%' ";
			}
			$rs=pg_query($sql) or die("Error en la busqueda");
			$numRow=pg_num_rows($rs);
			for ($i=0; $i < $numRow; $i++) { 
				$row=pg_fetch_array($rs,$i);
				$codigo= $row['codigo'];
				$nom_cue= $row['nom_cue'];
				echo "
					<tr>
						<td>".$codigo."</td>
						<td>".$nom_cue."</td>
						<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaImp('".$codigo."')\"><i class='icon-ok'></i></a></td>
					</tr>
				";
			}
			pg_close($conn);
		}break;

		case '3':{
			$sql="SELECT * FROM co_impuesto WHERE codigo='$_POST[codigo]'";
			$rs2=pg_query($sql) or die("Error en la busqueda");
			$datper = array();
			while ($obj=pg_fetch_object($rs2)){
				$datper[]=array(
					'codigo'=>$obj->codigo,
					'nom_cue'=>$obj->nom_cue,
					'des_cue'=>$obj->des_cue,
					'tip_cob'=>$obj->tip_cob,
					'cob_por'=>$obj->cob_por,
					'cob_fij'=>$obj->cob_fij,
					'cob_min'=>$obj->cob_min,
					'cob_met'=>$obj->cob_met
				);
			}
			echo ''.json_encode($datper).'';
			pg_close($conn);
		}break;
	}
?>