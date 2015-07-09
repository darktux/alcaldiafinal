<?php 
	session_start();
	include('./../../php/conexion.php');
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{ //Busca a una persona y carga las coincidencias
			if ($_POST['per']=="N") {
				if ($_POST['radBusPer']=="DUI") {
					$sql="SELECT * FROM rf_persona WHERE dui='$_POST[txtBusPer]'";
				}
				if ($_POST['radBusPer']=="NIT") {
					$sql="SELECT * FROM rf_persona WHERE nit='$_POST[txtBusPer]'";
				}
				if($_POST['radBusPer']=="Nombre"){
					$sql="SELECT * FROM rf_persona rp WHERE (rp.nom ilike '%$_POST[txtBusPer]%' or rp.ape1 ilike '%$_POST[txtBusPer]%' or rp.ape2 ilike '%$_POST[txtBusPer]%') and date_part('year',age(rp.fec_nac))>15";
				}
			}else{
				if ($_POST['radBusPer']=="NIT") {
					$sql="SELECT idsoc as cod_per,nom_jur as nom,nit_jur as nit FROM ca_sociedad WHERE nit_jur='$_POST[txtBusPer]'";
				}
				if($_POST['radBusPer']=="Nombre"){
					$sql="SELECT idsoc as cod_per,nom_jur as nom,nit_jur as nit FROM ca_sociedad WHERE nom_jur ilike '%$_POST[txtBusPer]%'";
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
			pg_close();
		}break;

		case '2':{//Devuelve los datos de una persona seleccionada en la busqueda
			if ($_POST['per']=="N") {
				$sql="SELECT * FROM rf_persona WHERE cod_per='$_POST[cod_per]'";
				$rs2=pg_query($sql) or die("Error en la busqueda");
				$datper = array();
				while ($obj=pg_fetch_object($rs2)){
					$datper[]=array(
						'cod_per'=>$obj->cod_per,
						'nom'=>$obj->nom,
						'ape1'=>$obj->ape1,
						'ape2'=>$obj->ape2,
						'sex'=>$obj->sex,
						'fec_nac'=>$obj->fec_nac,
						'dui'=>$obj->dui,
						'nit'=>$obj->nit,
						'tel1'=>$obj->tel1,
						'tel2'=>$obj->tel2,
						'dep'=>$obj->dep,
						'mun'=>$obj->mun,
						'dir'=>$obj->dir,
						'ocu'=>$obj->ocu,
						'est_civ'=>$obj->est_civ
					);
				}
				echo ''.json_encode($datper).'';
			}else{
				$sql="SELECT * FROM ca_sociedad WHERE idsoc='$_POST[cod_per]'";
				$rs2=pg_query($sql);
				$datjur=array();
				while ($obj=pg_fetch_object($rs2)) {
					$datjur[]=array(
						'idSoc'=>$obj->idsoc,
						'nom_jur'=>$obj->nom_jur,
						'fec_cons'=>$obj->fec_cons,
						'gir_jur'=>$obj->gir_jur,
						'nit_jur'=>$obj->nit_jur,
						'tel_jur'=>$obj->tel_jur,
						'dir_jur'=>$obj->dir_jur,
						'rep_jur'=>$obj->rep_jur
					);
				}
				echo ''.json_encode($datjur).'';
			}
			pg_close();
		}break;

		case '3':{ //Ingresa a persona como contribuyente
			$sql="UPDATE rf_persona SET nom='$_POST[nom]',ape1='$_POST[ape1]',ape2='$_POST[ape2]',sex='$_POST[sex]',fec_nac='$_POST[fec_nac]',dui='$_POST[dui]',nit='$_POST[nit]',tel1='$_POST[tel1]',tel2='$_POST[tel2]',dep='$_POST[dep]',mun='$_POST[mun]',dir='$_POST[dir]',ocu='$_POST[ocu]',est_civ='$_POST[est_civ]' WHERE cod_per='$_POST[cod_per]'";
			if(pg_query($sql)){
				pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Actualizó datos de contribuyente (Persona Natural)',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				echo "Actualizado correctamente";
			}
			pg_close();
		}break;

		case '4':{
			$sql="UPDATE ca_sociedad SET nom_jur='$_POST[nom_jur]',fec_cons='$_POST[fec_cons]',gir_jur='$_POST[gir_jur]',nit_jur='$_POST[nit_jur]',tel_jur='$_POST[tel_jur]',dir_jur='$_POST[dir_jur]',rep_jur='$_POST[rep_jur]' WHERE idsoc='$_POST[idSoc]'";
			if (pg_query($sql)) {
				pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Actualizó datos de contribuyente (Persona Jurídica)',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				echo "Actualizado correctamente";
			}
			pg_close();
		}break;
		
		
	}
?>