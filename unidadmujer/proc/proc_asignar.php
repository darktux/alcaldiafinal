<?php
	session_start();
	include('./../../php/conexion.php');
	$conn=conectar();
	switch ($_POST['caso']) {
		case '1':{ //Buscar proyecto y cargarlo en la tabla de coincidencias
			$sql="";
			if ($_POST['buspor']=="Nombre") {
				$sql="SELECT * FROM um_proyecto WHERE nom_pro ilike '%$_POST[bus_proy]%' ";
			}else{
				$sql="SELECT * FROM um_proyecto WHERE cod_pro ilike '%$_POST[bus_proy]%' ";
			}
			$rs=pg_query($sql) or die("Error en la busqueda");
			$numRow=pg_num_rows($rs);
			for ($i=0; $i < $numRow; $i++) { 
				$row=pg_fetch_array($rs,$i);
				$cod_pro= $row['cod_pro'];
				$nom_pro= $row['nom_pro'];
				$fec_ini= $row['fec_ini'];
				$fec_fin= $row['fec_fin'];
				echo "
					<tr>
						<td>".$cod_pro."</td>
						<td>".$nom_pro."</td>
						<td>".$fec_ini."</td>
						<td>".$fec_fin."</td>
						<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaProy('".$cod_pro."')\"><i class='icon-ok'></i></a></td>
					</tr>
				";
			}
			pg_close();
		}break;

		case '2':{ //Devuelve los datos del proyecto seleccionado en la busqueda
			$sql="SELECT * FROM um_proyecto WHERE cod_pro='$_POST[cod_pro]' ";
			$rs2=pg_query($sql) or die("Error en la busqueda");
			$datproy = array();
			while ($obj=pg_fetch_object($rs2)){
				$datproy[]=array(
					'cod_pro'=>$obj->cod_pro,
					'nom_pro'=>$obj->nom_pro,
					'des'=>$obj->des,
					'ubi'=>$obj->ubi,
					'fec_ini'=>$obj->fec_ini,
					'fec_fin'=>$obj->fec_fin,
					'tip_fon'=>$obj->tip_fon,
					'mon_pro'=>$obj->mon_pro,
					'mon_ext'=>$obj->mon_ext,
					'pat'=>$obj->pat,
					'est'=>$obj->est,
				);
			}
			echo ''.json_encode($datproy).'';
			pg_close();
		}break;

		case '3':{ //Busca a una persona y carga las coincidencias
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
			pg_close();
		}break;

		case '4':{//Devuelve los datos de una persona seleccionada en la busqueda
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
				);
			}
			echo ''.json_encode($datper).'';
			pg_close();
		}break;

		case '5':{ //ASigna personas a proyecto
			pg_query("INSERT INTO um_ben_proy VALUES('$_POST[cod_per]','$_POST[cod_pro]')")or die("Error al asignar persona a proyecto");
			pg_close();
		}break;

		case '6':{ //Elimina a una persona de un proyecto
			pg_query("DELETE FROM um_ben_proy WHERE cod_per='$_POST[cod_per]' and cod_pro='$_POST[cod_pro]'");
			pg_close();
		}break;

		case '7':{ //Actualiza los datos de una persona
			$sql="UPDATE rf_persona SET nom='$_POST[nom]',ape1='$_POST[ape1]',ape2='$_POST[ape2]',sex='$_POST[sex]',fec_nac='$_POST[fec_nac]',dui='$_POST[dui]',nit='$_POST[nit]',tel1='$_POST[tel1]',tel2='$_POST[tel2]',dep='$_POST[dep]',mun='$_POST[mun]',dir='$_POST[dir]' WHERE cod_per='$_POST[cod_per]'";
			pg_query($sql);
			pg_close();
		}break;

		case '8':{ //Devuelve los datos de una beneficiaria para llenar la tabla
			$sql="SELECT rp.cod_per,rp.nom,rp.ape1,rp.ape2,rp.dui FROM rf_persona rp,um_ben_proy bp WHERE rp.cod_per=bp.cod_per and bp.cod_pro='$_POST[cod_pro]'";
			$rs=pg_query($sql);
			$datben=array();
			while($obj=pg_fetch_object($rs)){
				$datben[]=array(
					'cod_per'=>$obj->cod_per,
					'nom'=>$obj->nom,
					'ape1'=>$obj->ape1,
					'ape2'=>$obj->ape2,
					'dui'=>$obj->dui,
				);
			}
				echo ''.json_encode($datben).'';
				pg_close();
		}break;

		case '9':{ //Agrega a una persona nueva a la BD
			$sql="INSERT INTO rf_persona(nom,ape1,ape2,sex,fec_nac,dui,nit,tel1,tel2,dep,mun,dir) VALUES('$_POST[nom]','$_POST[ape1]','$_POST[ape2]','$_POST[sex]','$_POST[fec_nac]','$_POST[dui]','$_POST[nit]','$_POST[tel1]','$_POST[tel2]','$_POST[dep]','$_POST[mun]','$_POST[dir]')";
			pg_query($sql);
			$sql="SELECT cod_per FROM rf_persona WHERE nom='$_POST[nom]' and ape1='$_POST[ape1]' and ape2='$_POST[ape2]' and sex='$_POST[sex]' and fec_nac='$_POST[fec_nac]' and dui='$_POST[dui]' and nit='$_POST[nit]' and tel1='$_POST[tel1]' and tel2='$_POST[tel2]' and dir='$_POST[dir]'";
			$rs=pg_query($sql);
			$row=pg_fetch_array($rs,0);
			pg_query("INSERT INTO um_ben_proy VALUES('$row[cod_per]','$_POST[cod_pro]')")or die("Error al asignar persona a proyecto");
			pg_close();
		}break;
		
	}

	
?>