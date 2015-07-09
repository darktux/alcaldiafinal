<?php 
	session_start();
	include ("../../php/conexion.php");
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{  //Buscar proyecto y cargarlo en la tabla de coincidencias
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

		case '3':{ //Devuelve los datos de los colaboradores asginados al proyecto escogido
			$sql="SELECT * FROM rf_persona rp,um_per_proy upp WHERE rp.cod_per=upp.cod_per and upp.cod_pro='$_POST[cod_pro]'";
			$rs3=pg_query($sql) or die("Error en la busqueda");
			$datper = array();
			while ($obj=pg_fetch_object($rs3)){
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
					'dir'=>$obj->dir,
					'car'=>$obj->car,
					'sal'=>$obj->sal,
				);
			}
			echo ''.json_encode($datper).'';
			pg_close();
		}break;

		case '4':{ //Elimina a un colaborador de un proyecto
			$sql="DELETE FROM um_per_proy WHERE cod_per='$_POST[cod_per]' and cod_pro='$_POST[cod_pro]'";
			pg_query($sql) or die("Error al eliminar persona del proyecto");
			pg_close();
		}break;

		case '5':{ //Selecciona los datos del colaborador para editarlos
			$sql="SELECT * FROM rf_persona rp,um_per_proy upp WHERE rp.cod_per=upp.cod_per and upp.cod_pro='$_POST[cod_pro]' and rp.cod_per='$_POST[cod_per]'";
			$rs3=pg_query($sql) or die("Error en la busqueda");
			$datper = array();
			while ($obj=pg_fetch_object($rs3)){
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
					'car'=>$obj->car,
					'sal'=>$obj->sal,
				);
			}
			echo ''.json_encode($datper).'';
			pg_close();
		}break;

		case '6':{ //Edita los datos del colaborador
			$sql="UPDATE rf_persona SET nom='$_POST[nom]', ape1='$_POST[ape1]',ape2='$_POST[ape2]',sex='$_POST[sex]',fec_nac='$_POST[fec_nac]',dui='$_POST[dui]',nit='$_POST[nit]',tel1='$_POST[tel1]',tel2='$_POST[tel2]',dep='$_POST[dep]',mun='$_POST[mun]',dir='$_POST[dir]' WHERE cod_per='$_POST[cod_col]'";
			pg_query($sql) or die("Error al actualizar datos");
			$sql="UPDATE um_per_proy SET car='$_POST[car]',sal='$_POST[sal]' WHERE cod_per='$_POST[cod_col]' and cod_pro='$_POST[cod_pro]'";
			pg_query($sql);
			pg_close();
		}break;

		case '7':{ //Agrega un nuevo colaborador
			// $codigo="";
			if ($_POST['cod_col']=="") {//No existe la persona en la BD
			 	$sql="INSERT INTO rf_persona(nom,ape1,ape2,sex,fec_nac,dui,nit,tel1,tel2,dep,mun,dir) VALUES('$_POST[nom_col]','$_POST[ape1_col]','$_POST[ape2_col]','$_POST[sex_col]','$_POST[fec_nac]','$_POST[dui_col]','$_POST[nit_col]','$_POST[tel1_col]','$_POST[tel2_col]','$_POST[dep]','$_POST[mun]','$_POST[dir_col]')";			 	
				pg_query($sql) or die("Error al ingresar nueva persona");
				$sql2="SELECT cod_per FROM rf_persona WHERE nom='$_POST[nom_col]' and ape1='$_POST[ape1_col]' and ape2='$_POST[ape2_col]' and sex='$_POST[sex_col]' and fec_nac='$_POST[fec_nac]' and dui='$_POST[dui_col]' and nit='$_POST[nit_col]' and tel1='$_POST[tel1_col]' and tel2='$_POST[tel2_col]' and dir='$_POST[dir_col]'";
				$rs=pg_query($sql2) or die("error al obtener el codigo de persona ingresada");
				$row=pg_fetch_array($rs,0);
				$codigo=$row['cod_per'];
			}else{
				$codigo=$_POST['cod_col'];
			}
			$sql="INSERT INTO um_per_proy VALUES('$_POST[car_col]','$_POST[sal_col]','$_POST[cod_pro]','$codigo')";
			pg_query($sql);
			pg_close();
		}break;

		case '8':{ //Busca una persona
			if ($_POST['radBusPer2']=="DUI") {
				$sql="SELECT * FROM rf_persona WHERE dui='$_POST[txtBusPer2]'";
			}else{
				$sql="SELECT * FROM rf_persona WHERE nom ilike '%$_POST[txtBusPer2]%'  or ape1 ilike '%$_POST[txtBusPer2]%' or ape2 ilike '%$_POST[txtBusPer2]%'";
			}
			$rs2=pg_query($sql) or die("Error en la búsqueda");
			$numRow=pg_num_rows($rs2);
			for ($i=0; $i < $numRow; $i++) { 
				$row=pg_fetch_array($rs2,$i);
				$cod_per=$row['cod_per'];
				$nom=$row['nom'];
				$ape1=$row['ape1'];
				$ape2=$row['ape2'];
				$dui=$row['dui'];
				$nit=$row['nit'];
				echo "
				<tr>
					<td>".$nom." ".$ape1." ".$ape2."</td>
					<td>".$dui."</td>
					<td>".$nit."</td>
					<td><a href='#addCol' class='btn' data-dismiss='modal' onclick=\"cargaDatos2('".$cod_per."')\"><i class='icon-ok'></i></a></td>
				</tr>
				";
			}
			pg_close();
		}break;

		case '9':{ //Actuailizar datos de proyecto
			$sql="UPDATE um_proyecto SET nom_pro='$_POST[nom_pro]',des='$_POST[des]',ubi='$_POST[ubi]', fec_ini='$_POST[fec_ini]', fec_fin='$_POST[fec_fin]',tip_fon='$_POST[tip_fon]',mon_pro='$_POST[mon_pro]',mon_ext='$_POST[mon_ext]',pat='$_POST[pat]',est='$_POST[est]' WHERE cod_pro='$_POST[cod_pro]' ";
			$rs=pg_query($sql) or die("Error al actualizar datos del");
			if($rs){
				pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Actualizó datos de proyecto',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				echo "Actualizado exitosamente";
			}
			pg_close();
		}break;

		case '10':{
			$sql="SELECT * FROM rf_persona rp WHERE rp.cod_per='$_POST[cod_per]'";
			$rs3=pg_query($sql) or die("Error en la busqueda");
			$datper = array();
			while ($obj=pg_fetch_object($rs3)){
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


		
	}

?>