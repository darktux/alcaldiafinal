<?php 
	session_start();
	include('./../../php/conexion.php');
	$conn=conectar();
	switch ($_POST['caso']) {
		case '1':{
			if ($_POST['radBusPer']=="DUI") {
				$sql="SELECT * FROM rf_persona WHERE dui='$_POST[txtBusPer]'";
			}else{
				$sql="SELECT * FROM rf_persona WHERE nom ilike '%$_POST[txtBusPer]%' or ape1 ilike '%$_POST[txtBusPer]%' or ape2 ilike '%$_POST[txtBusPer]%'";
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
			if ($_POST['radBusInm']=="Codigo") { 
				$sql="SELECT rp.cod_per,rp.nom,rp.ape1,rp.ape2,ci.cod_inm,ci.dir_inm FROM rf_persona rp,ca_inmueble ci WHERE ci.cod_pro=rp.cod_per and ci.cod_inm='$_POST[txtBusInm]'";
			}else{ //contribuyente
				$sql="SELECT rp.cod_per,rp.nom,rp.ape1,rp.ape2,ci.cod_inm,ci.dir_inm FROM rf_persona rp,ca_inmueble ci WHERE (rp.nom ilike '%$_POST[txtBusInm]%' or rp.ape1 ilike '%$_POST[txtBusInm]%' or rp.ape2 ilike '%$_POST[txtBusInm]%') and (ci.cod_pro=rp.cod_per)";
			}
			$rs=pg_query($sql) or die("Error en la busqueda");
			$numRow=pg_num_rows($rs);
			for ($i=0; $i < $numRow; $i++) { 
				$row=pg_fetch_array($rs,$i);
				$cod_per= $row['cod_per'];
				$nom= $row['nom'];
				$ape1= $row['ape1'];
				$ape2= $row['ape2'];
				$cod_inm= $row['cod_inm'];
				$dir_inm= $row['dir_inm'];
				echo "
					<tr>
						<td>".$cod_inm."</td>
						<td>".$nom." ".$ape1." ".$ape2."</td>
						<td>".$dir_inm."</td>
						<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaInm('".$cod_per."','".$cod_inm."')\"><i class='icon-ok'></i></a></td>
					</tr>
				";
			}
			pg_close($conn);
		}break;

		case '4':{
			$sql="SELECT rp.cod_per,rp.nom,rp.ape1,rp.ape2,ci.* FROM ca_inmueble ci,rf_persona rp WHERE ci.cod_pro='$_POST[cod_pro]' and ci.cod_inm='$_POST[cod_inm]' and ci.cod_pro=rp.cod_per";
			$rs2=pg_query($sql) or die("Error en la busqueda");
			$datneg = array();
			while ($obj=pg_fetch_object($rs2)){
				$datneg[]=array(
					'cod_per'=>$obj->cod_per,
					'nom'=>$obj->nom,
					'ape1'=>$obj->ape1,
					'ape2'=>$obj->ape2,
					'cod_inm'=>$obj->cod_inm,
					'zon_inm'=>$obj->zon_inm,
					'dir_inm'=>$obj->dir_inm,
					'med_inm'=>$obj->med_inm,
					'lim_nor'=>$obj->lim_nor,
					'lim_sur'=>$obj->lim_sur,
					'lim_est'=>$obj->lim_est,
					'lim_oes'=>$obj->lim_oes
				);
			}
			echo ''.json_encode($datneg).'';
			pg_close($conn);
		}break;
		
		case '5':{
			$sql="UPDATE ca_inmueble SET cod_pro='$_POST[cod_pro]',zon_inm='$_POST[zon_inm]',dir_inm='$_POST[dir_inm]',med_inm='$_POST[med_inm]',lim_nor='$_POST[lim_nor]',lim_sur='$_POST[lim_sur]',lim_est='$_POST[lim_est]',lim_oes='$_POST[lim_oes]' WHERE cod_inm='$_POST[cod_inm]'";
			if(pg_query($sql)){
				$cod_imp=$_POST['imp'];
				pg_query("DELETE FROM co_neginm_imp WHERE cod_neginm='$_POST[cod_inm]'");
				for ($i=0; $i < count($cod_imp); $i++) { 
					pg_query("INSERT INTO co_neginm_imp VALUES('$_POST[cod_inm]','$cod_imp[$i]')");
				}
				pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Actualizó datos de inmueble',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				echo "Actualizado correctamente";
			}
			pg_close($conn);
		}break;

		case '6':{
			$sql="SELECT * FROM co_neginm_imp WHERE cod_neginm='$_POST[cod_inm]'";
			$rs=pg_query($sql);
			$datimp=array();
			while($obj=pg_fetch_object($rs)){
				$datimp[]=array(
					'cod_neginm'=>$obj->cod_neginm,
					'cod_imp'=>$obj->cod_imp
				);
			}
			echo ''.json_encode($datimp).'';
			pg_close($conn);
		}break;

	}
?>