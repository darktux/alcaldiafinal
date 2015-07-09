<?
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
					<a href='#agregar_tfondo' class='btn' data-toggle='modal'><i class='icon-plus'></i></a>";
		}
		pg_close($conn);
		break;

	case '3':
		$can=$_POST['can'];
		if($_POST['ori']=="donado"){
		
		
			if($can=='1'){
				pg_query($conn,"BEGIN");
				$des_ubi="Nuevo Activo";
				$_POST["ubi"]=$des_ubi.$_POST["ubi"];
				$sql="insert into af_activo(cod_act,nom,mar,mod,ser,cos_adq,fec_adq,act,ori,fec_gar,don,tact) values('$_POST[cod_act]','$_POST[nom]','$_POST[mar]','$_POST[mod]','$_POST[ser]','$_POST[cos_adq]','$_POST[fec_adq]','t','$_POST[ori]','$_POST[fec_gar]','$_POST[don]','$_POST[tactivo]')";
				pg_query($sql);
				$sql="insert into af_traslados(cod_act,fec,des,new_ubi) values('$_POST[cod_act]','$_POST[fec_adq]','$_POST[ubi]','$_POST[depto]')";
				pg_query($sql);
				$rs=pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Ingreso de un nuevo Activo ($_POST[nom]).',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				if($rs){ 
					echo "exito";
					pg_query($conn,"COMMIT");
				}else{
					echo "Error, al guardar el usuario";
					pg_query($conn,"ROLLBACK");
				}
				
			}
			else{
				$cod=$_POST['cod_act'];
				$ara12=substr($_POST['cod_act'], 0,14);
				$ara3=substr($_POST['cod_act'], 14);

				pg_query($conn,"BEGIN");
				for ($i=0; $i < $can ; $i++) { 
					$sql="insert into af_activo(cod_act,nom,mar,mod,ser,cos_adq,fec_adq,act,ori,fec_gar,don,tact) values('".$cod."','$_POST[nom]','$_POST[mar]','$_POST[mod]','$_POST[ser]','$_POST[cos_adq]','$_POST[fec_adq]','t','$_POST[ori]','$_POST[fec_gar]','$_POST[don]','$_POST[tactivo]')";	
					$hecho=pg_query($sql);
					if($hecho){
						$sql="insert into af_traslados(cod_act,fec,des,new_ubi) values('".$cod."','$_POST[fec_adq]','$_POST[ubi]','$_POST[depto]')";
						pg_query($sql);
						echo "Insertado";
						if(($i+1)<$can){
							pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Ingreso $can Activos($_POST[nom]).',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
							echo "exito";
							pg_query($conn,"COMMIT");
						}
					}else{
						echo "Ha sucedido un Error ".pg_last_error();
					}
					$ara3=$ara3+1;
					if ($ara3>=0 && $ara3<=9) {
						$s="00000".$ara3;
					}
					if($ara3>=10 && $ara3<=99){
						$s="0000".$ara3;
					}
					if($ara3>=100 && $ara3<=999){
						$s="000"+$ara3;
					}
					if($ara3>=1000 && $ara3<=9999){
						$s="00".$ara3;
					}
					if($ara3>=10000 && $ara3<=99999){
						$s="0".$ara3;
					}
					if($ara3>=100000 && $ara3<=999999){
						$s=''.$ara3;
					}
					$total=$ara12.$s;
					echo ">".$total."<";
					$cod=$total;	
				}
			}

		}
		else{

			if($can=='1'){
				pg_query($conn,"BEGIN");
				$des_ubi="Nuevo Activo";
				$sql="insert into af_activo(cod_act,nom,mar,mod,ser,cos_adq,fec_adq,act,cod_tfondo,ori,fec_gar,tact) values('$_POST[cod_act]','$_POST[nom]','$_POST[mar]','$_POST[mod]','$_POST[ser]','$_POST[cos_adq]','$_POST[fec_adq]','t','$_POST[tfondo]','$_POST[ori]','$_POST[fec_gar]','$_POST[tactivo]')";
				pg_query($sql);
				$sql="insert into af_traslados(cod_act,fec,des,new_ubi) values('$_POST[cod_act]','$_POST[fec_adq]','$_POST[ubi]',$_POST[depto])";
				pg_query($sql);
				$rs=pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Ingreso de un nuevo Activo ($_POST[nom]).',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				if($rs){ 
					echo "exito";
					pg_query($conn,"COMMIT");
				}else{
					echo "Error, al guardar el usuario";
					pg_query($conn,"ROLLBACK");
				}
				
				
			}
			else{
				$cod=$_POST['cod_act'];
				$ara12=substr($_POST['cod_act'], 0,14);
				$ara3=substr($_POST['cod_act'], 14);

				pg_query($conn,"BEGIN");
				for ($i=0; $i < $can ; $i++) { 

					$sql="insert into af_activo(cod_act,nom,mar,mod,ser,cos_adq,fec_adq,act,cod_tfondo,ori,fec_gar,tact) values('".$cod."','$_POST[nom]','$_POST[mar]','$_POST[mod]','$_POST[ser]','$_POST[cos_adq]','$_POST[fec_adq]','t','$_POST[tfondo]','$_POST[ori]','$_POST[fec_gar]','$_POST[tactivo]')";	
					$hecho=pg_query($sql);
					//$cod=$cod+1;
					if($hecho){
						$sql="insert into af_traslados(cod_act,fec,des,new_ubi) values('".$cod."','$_POST[fec_adq]','$_POST[ubi]',$_POST[depto])";
						pg_query($sql);
						echo "Insertado";
						if(($i+1)<$can){
							pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Ingreso $can Activos($_POST[nom]).',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
							echo "exito";
							pg_query($conn,"COMMIT");
						}
					}else{
						echo "Ha sucedido un Error ".pg_last_error();
					}

					$ara3=$ara3+1;
					if ($ara3>=0 && $ara3<=9) {
						$s="00000".$ara3;
					}
					if($ara3>=10 && $ara3<=99){
						$s="0000".$ara3;
					}
					if($ara3>=100 && $ara3<=999){
						$s="000"+$ara3;
					}
					if($ara3>=1000 && $ara3<=9999){
						$s="00".$ara3;
					}
					if($ara3>=10000 && $ara3<=99999){
						$s="0".$ara3;
					}
					if($ara3>=100000 && $ara3<=999999){
						$s=''.$ara3;
					}
					$total=$ara12.$s;
					echo ">".$total."<";
					$cod=$total;	
				}

			}

		}
		pg_close($conn);
		break;

	case '4':
		$sql="insert into af_depto(nom) values('$_POST[nombre]')";
		$hecho=pg_query($sql);
		if($hecho){
			echo "Insertado";
		}else{
			echo "Ha sucedido un Error ".pg_last_error();
		}	
		pg_close($conn);
		break;

	case '5':
		$sql="insert into af_tfondo(nom,des) values('$_POST[nombre_tfondo]','$_POST[descripcion]')";
		$hecho=pg_query($sql);
		if($hecho){
			echo "Insertado";
		}else{
			echo "Ha sucedido un Error ".pg_last_error();
		}	
		pg_close($conn);
		break;

	case '6':{
		//$sub=substr($_POST['cod_act'], 7);
		//$entero=$sub;
		//echo ">".$entero."<";
		$sql="select cod_act from af_activo where cod_act ilike '$_POST[cod_act]%' order by cod_act";
		$rs=pg_query($sql) or die("Error en la busqueda");
		
		// $y=pg_num_rows($rs);
		// for ($i=0; $i <$y ; $i++) { 
		// 	$row= pg_fetch_array($rs,$i);
		// 	echo $row['cod_act'];
		// }
		 $dat= array();
		 while($obj=pg_fetch_object($rs)){
		 	$dat[]=array(
		 		'cod_act'=>$obj->cod_act
		 	);
		 }
		 echo ''.json_encode($dat).'';

	}	break;

	case '7':
		$sql="insert into af_tactivo(nom,des,anio) values('$_POST[nombre_tactivo]','$_POST[tdescripcion]','$_POST[tcantidad]')";
		$hecho=pg_query($sql);
		if($hecho){
			echo "Insertado";
		}else{
			echo "Ha sucedido un Error ".pg_last_error();
		}	
		pg_close($conn);
		break;

	case '8':
		$sql="select * from af_tactivo order by cod";
		$rs=pg_query($sql);
		if($rs){
			$numRow=pg_num_rows($rs);
			echo "<select name='tactivo' id='tactivo'>
					<option value='0'>Seleccione...</option>";

			for ($i=0; $i < $numRow; $i++) {
				$row=pg_fetch_array($rs,$i);
				$cod= $row['cod'];
				$nom= $row['nom'];
				echo "<option value=".$cod.">".$nom."</option>";
			}
			echo "</select>
					<a href='#agregar_tactivo' class='btn' data-toggle='modal'><i class='icon-plus'></i></a>";
		}
		pg_close($conn);
		break;
}
?>
