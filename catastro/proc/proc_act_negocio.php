<?php 
	session_start();
	include('./../../php/conexion.php');
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{ //Busca coincidencias de negocio
			if ($_POST['radBusNeg']=="Nombre") { //nombre de negocio
				if($_POST['tipoPer']=="N")
					$sql="SELECT rp.cod_per,rp.nom,rp.ape1,rp.ape2,cn.cod_neg,cn.nom_neg,cn.dir_neg FROM rf_persona rp,ca_negocio cn WHERE cn.cod_con=rp.cod_per and cn.nom_neg ilike '%$_POST[txtBusNeg]%' and cn.est_neg='t' and cn.tip_con='N'";
				else
					$sql="SELECT cs.idsoc as cod_per,cs.nom_jur as nom,cn.cod_neg,cn.nom_neg,cn.dir_neg FROM ca_sociedad cs,ca_negocio cn WHERE cn.cod_con=cs.idsoc and cn.nom_neg ilike '%$_POST[txtBusNeg]%' and cn.est_neg='t' and cn.tip_con='J'";
			}else{ //contribuyente
				if($_POST['tipoPer']=="N")
					$sql="SELECT rp.cod_per,rp.nom,rp.ape1,rp.ape2,cn.cod_neg,cn.nom_neg,cn.dir_neg FROM rf_persona rp,ca_negocio cn WHERE (rp.nom ilike '%$_POST[txtBusNeg]%' or rp.ape1 ilike '%$_POST[txtBusNeg]%' or rp.ape2 ilike '%$_POST[txtBusNeg]%') and (cn.cod_con=rp.cod_per) and cn.est_neg='t' and cn.tip_con='N' and date_part('year',age(rp.fec_nac))>15";
				else
					$sql="SELECT cs.idsoc as cod_per,cs.nom_jur as nom,cn.cod_neg,cn.nom_neg,cn.dir_neg FROM ca_sociedad cs,ca_negocio cn WHERE cs.nom_jur ilike '%$_POST[txtBusNeg]%' and (cn.cod_con=cs.idsoc) and cn.est_neg='t' and cn.tip_con='J'";
			}
			$rs=pg_query($sql) or die("Error en la busqueda");
			$numRow=pg_num_rows($rs);
			for ($i=0; $i < $numRow; $i++) { 
				$row=pg_fetch_array($rs,$i);
				$cod_per= $row['cod_per'];
				$nom= $row['nom'];
				$ape1= $row['ape1'];
				$ape2= $row['ape2'];
				$cod_neg= $row['cod_neg'];
				$nom_neg= $row['nom_neg'];
				$dir_neg= $row['dir_neg'];
				echo "
					<tr>
						<td>".$nom_neg."</td>
						<td>".$nom." ".$ape1." ".$ape2."</td>
						<td>".$dir_neg."</td>
						<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaNeg('".$cod_per."','".$cod_neg."','$_POST[tipoPer]')\"><i class='icon-ok'></i></a></td>
					</tr>
				";
			}
			pg_close($conn);
		}break;

		case '2':{ //Devuelve los valores del negocio seleccionado
			if($_POST['tipoPer']=="N")
				$sql="SELECT rp.cod_per,rp.nom,rp.ape1,rp.ape2,cn.* FROM ca_negocio cn,rf_persona rp WHERE cn.cod_con='$_POST[cod_con]' and cn.cod_neg='$_POST[cod_neg]' and cn.cod_con=rp.cod_per";
			else
				$sql="SELECT cs.idsoc as cod_per,cs.nom_jur as nom,cn.* FROM ca_negocio cn,ca_sociedad cs WHERE cn.cod_con='$_POST[cod_con]' and cn.cod_neg='$_POST[cod_neg]' and cn.cod_con=cs.idsoc";

			$rs2=pg_query($sql) or die("Error en la busqueda");
			$datneg = array();
			while ($obj=pg_fetch_object($rs2)){
				$datneg[]=array(
					'cod_per'=>$obj->cod_per,
					'nom'=>$obj->nom,
					'ape1'=>$obj->ape1,
					'ape2'=>$obj->ape2,
					'cod_neg'=>$obj->cod_neg,
					'nom_neg'=>$obj->nom_neg,
					'rub_neg'=>$obj->rub_neg,
					'zon_neg'=>$obj->zon_neg,
					'dep'=>$obj->dep,
					'mun'=>$obj->mun,
					'dir_neg'=>$obj->dir_neg,
					'med_neg'=>$obj->med_neg,
					'img_neg'=>$obj->img_neg,
					'est_neg'=>$obj->est_neg
				);
			}
			echo ''.json_encode($datneg).'';
			pg_close($conn);
		}break;

		case '3':{
			$file_name=$_FILES[img_neg][name];
			$ext=substr($file_name, strlen($file_name)-4);
			$new_name=$_POST['cod_neg'].$ext;
			if(!is_dir("imagenes/")) {mkdir("imagenes/", 0777);}
        	if ($file_name!="") {
        		//unlink("imagenes/".$new_name);
        		if(move_uploaded_file($_FILES[img_neg][tmp_name], "imagenes/".$new_name)){
        			$sql="UPDATE ca_negocio SET nom_neg='$_POST[nom_neg]',rub_neg='$_POST[rub_neg]',zon_neg='$_POST[zon_neg]',dep='$_POST[dep]',mun='$_POST[mun]',dir_neg='$_POST[dir_neg]',med_neg='$_POST[med_neg]',img_neg='$_POST[cod_neg]',puntos='$_POST[pos]' WHERE cod_neg='$_POST[cod_neg]'";
				}else{echo "Error al subir el archivo";}
			}else{
        		$sql="UPDATE ca_negocio SET nom_neg='$_POST[nom_neg]',rub_neg='$_POST[rub_neg]',zon_neg='$_POST[zon_neg]',dep='$_POST[dep]',mun='$_POST[mun]',dir_neg='$_POST[dir_neg]',med_neg='$_POST[med_neg]',puntos='$_POST[pos]' WHERE cod_neg='$_POST[cod_neg]'";
        	}

			if(pg_query($sql)){
				$cod_imp=$_POST['imp'];
				pg_query("DELETE FROM co_neg_imp WHERE cod_neg='$_POST[cod_neg]'");
				for ($i=0; $i < count($cod_imp); $i++) { 
					pg_query("INSERT INTO co_neg_imp VALUES('$_POST[cod_neg]','$cod_imp[$i]')");
				}
				pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Actualizó datos de negocio',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				echo "Actualizado correctamente";
			}
			pg_close($conn);
		}break;

		case '4':{
			if ($_POST['radBusPer']=="DUI") {
				if ($_POST['per']=="N") {
					$sql="SELECT * FROM rf_persona WHERE dui='$_POST[txtBusPer]'";
				}
			}
			if ($_POST['radBusPer']=="NIT") {
				if ($_POST['per']=="N") {
					$sql="SELECT * FROM rf_persona WHERE nit='$_POST[txtBusPer]'";
				}else{
					$sql="SELECT idSoc as cod_per,nom_jur as nom,nit_jur as nit FROM ca_sociedad WHERE nit_jur='$_POST[txtBusPer]'";
				}
			}
			if($_POST['radBusPer']=="Nombre"){
				if ($_POST['per']=="N") {
					$sql="SELECT * FROM rf_persona rp WHERE (rp.nom ilike '%$_POST[txtBusPer]%' or rp.ape1 ilike '%$_POST[txtBusPer]%' or rp.ape2 ilike '%$_POST[txtBusPer]%') and date_part('year',age(rp.fec_nac))>15";
				}else{
					$sql="SELECT idSoc as cod_per,nom_jur as nom,nit_jur as nit FROM ca_sociedad WHERE nom_jur ilike '%$_POST[txtBusPer]%'";
				}
			}
			if($_POST['per']=="N"){
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
							<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaPer('".$cod_per."','N')\"><i class='icon-ok'></i></a></td>
						</tr>
					";
				}
			}else{
				$rs=pg_query($sql) or die("Error en la busqueda");
				$numRow=pg_num_rows($rs);
				for ($i=0; $i < $numRow; $i++) { 
					$row=pg_fetch_array($rs,$i);
					$cod_per= $row['cod_per'];
					$nom= $row['nom'];
					$nit= $row['nit'];
					echo "
						<tr>
							<td style='display:none'>".$cod_per."</td>
							<td>".$nom."</td>
							<td>".$nit."</td>
							<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaPer('".$cod_per."','J')\"><i class='icon-ok'></i></a></td>
						</tr>
					";
				}
			}
			pg_close($conn);
		}break;

		case '5':{//Devuelve los datos de una persona seleccionada en la busqueda
			if ($_POST['tipo']=="N") {
				$sql="SELECT cod_per,nom,ape1,ape2 FROM rf_persona WHERE cod_per='$_POST[cod_per]'";
			}else{
				$sql="SELECT idSoc as cod_per,nom_jur as nom FROM ca_sociedad WHERE idSoc='$_POST[cod_per]'";
			}
			
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

		case '6':{
			$sql="SELECT * FROM co_neg_imp WHERE cod_neg='$_POST[cod_neg]'";
			$rs=pg_query($sql);
			$datimp=array();
			while($obj=pg_fetch_object($rs)){
				$datimp[]=array(
					'cod_neginm'=>$obj->cod_neg,
					'cod_imp'=>$obj->cod_imp
				);
			}
			echo ''.json_encode($datimp).'';
			pg_close($conn);
		}break;
	}
?>