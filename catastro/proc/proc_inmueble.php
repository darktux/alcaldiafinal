<?php 
	session_start();
	include('./../../php/conexion.php');
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{
			if ($_POST['radBusPer']=="DUI") {
				$sql="SELECT * FROM rf_persona WHERE dui='$_POST[txtBusPer]'";
			}else{
				$sql="SELECT * FROM rf_persona rp WHERE (rp.nom ilike '%$_POST[txtBusPer]%' or rp.ape1 ilike '%$_POST[txtBusPer]%' or rp.ape2 ilike '%$_POST[txtBusPer]%') and date_part('year',age(rp.fec_nac))>15";
			}
			$rs=pg_query($sql) or die("Error en la busqueda");
			$numRow=pg_num_rows($rs);
			for ($i=0; $i < $numRow; $i++) { 
				$row=pg_fetch_array($rs,$i);
				$cod_per= $row['cod_per'];
				$nom= $row['nom'];
				$ape1= $row['ape1'];
				$ape2= $row['ape2'];
				$dui= $row['dui'];
				$nit= $row['nit'];
				echo "
					<tr>
						<td style='display:none'>".$cod_per."</td>
						<td>".$nom." ".$ape1." ".$ape2."</td>
						<td>".$dui."</td>
						<td>".$nit."</td>
						<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaPer('".$cod_per."')\"><i class='icon-ok'></i></a></td>
					</tr>
				";
			}
			pg_close($conn);
		}break;

		case '2':{
			$sql="SELECT * FROM rf_persona WHERE cod_per='$_POST[cod_per]'";
			$rs2=pg_query($sql) or die("Error en la busqueda");
			$datper = array();
			while ($obj=pg_fetch_object($rs2)){
				$datper[]=array(
					'cod_per'=>$obj->cod_per,
					'nom'=>$obj->nom,
					'ape1'=>$obj->ape1,
					'ape2'=>$obj->ape2
				);
			}
			echo ''.json_encode($datper).'';
			pg_close($conn);
		}break;

		case '3':{
			$fecha=date('d/m/Y');
			if(pg_query("INSERT INTO ca_inmueble VALUES('$_POST[cod_inm]','$_POST[cod_pro]','$_POST[zon_inm]','$_POST[dir_inm]','$_POST[med_inm]','$_POST[lim_nor]','$_POST[lim_sur]','$_POST[lim_est]','$_POST[lim_oes]','$fecha','$_POST[pos]')")){
				$cod_imp=$_POST['imp'];
				for ($i=0; $i < count($cod_imp); $i++) { 
					pg_query("INSERT INTO co_inm_imp VALUES('$_POST[cod_inm]','$cod_imp[$i]')");
				}
				//se abre el estado de cuenta del inmueble
				pg_query("INSERT INTO co_estcta_inm(cod_inm,fec_imp,concepto,monto) VALUES('$_POST[cod_inm]','$fecha','Registro de inmueble','0')");
				$result=pg_query("SELECT MAX(cod_estcta) as cod_estcta FROM co_estcta_inm");
				$rowX=pg_fetch_array($result,0);
				$cod_estcta=$rowX['cod_estcta'];
				pg_query("INSERT INTO co_fecpag_inm VALUES('$cod_estcta','$fecha')");
				pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Registró nuevo inmueble',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				echo "Guardado exitosamente";
			}
			pg_close($conn);
		}break;

		case '4':
			$sql="UPDATE ca_inmueble SET puntos='$_POST[puntos]' WHERE cod_inm='$_POST[cod_inm]'";
			if(pg_query($sql)){
				echo "Actualizado correctamente";
			}
			pg_close();
		break;
	}
?>