<?php
	session_start();
	include('./../../php/conexion.php');
	$conn=conectar();
	$x=0;
	
	switch ($_POST['caso']) {
		case '1':{
			//Insertar proyecto
			$sqlp="INSERT INTO um_proyecto VALUES('".$_POST['cod_pro']."','".$_POST['nom_pro']."','".$_POST['des']."','".$_POST['ubi']."','".$_POST['fec_ini']."','".$_POST['fec_fin']."','".$_POST['tip_fon']."','".$_POST['mon_pro']."','".$_POST['mon_ext']."','".$_POST['pat']."','".$_POST['est']."')";
			$rs=pg_query($sqlp) or die("Error al insertar proyecto");
			//Se agregan los colaboradores a la bd
			foreach ($_POST['objDatosColumna'] as $key => $value) {
				$sql="INSERT INTO um_per_proy VALUES('".$value[2]."','".$value[3]."','".$_POST['cod_pro']."','".$value[0]."')";
				pg_query($sql) or die("Error al ingresar colaboradores");
			}
			pg_query("DELETE FROM um_per_proy_temp");
			if($rs){
				pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Registró nuevo proyecto',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				echo "Guardado exitosamente";
			}
			pg_close();
		}break;

		case '2':{
			pg_query("INSERT INTO um_per_proy_temp VALUES('$_POST[car]','$_POST[sal]','$_POST[cod_pro]','$_POST[cod_per]')")or die("Error al asignar persona a proyecto");
			pg_close();
		}break;

		case '3':{
			$sql="INSERT INTO rf_persona(nom,ape1,ape2,sex,fec_nac,dui,nit,tel1,tel2,dep,mun,dir) VALUES('$_POST[nom]','$_POST[ape1]','$_POST[ape2]','$_POST[sex]','$_POST[fec_nac]','$_POST[dui]','$_POST[nit]','$_POST[tel1]','$_POST[tel2]','$_POST[dep]','$_POST[mun]','$_POST[dir]')";
			pg_query($sql);
			$sql="SELECT MAX(cod_per) FROM rf_persona";
			$rs=pg_query($sql);
			$row=pg_fetch_array($rs,0);
			if ($row = pg_fetch_row($rs)) {
				$cod_per = trim($row[0]);
			}
			pg_query("INSERT INTO um_per_proy_temp VALUES('$_POST[car]','$_POST[sal]','$_POST[cod_pro]','".$cod_per."')")or die("Error al asignar persona a proyecto");
			pg_close();
		}break;

		case '4':{
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

		case '5':{
			$sql="SELECT * FROM rf_persona WHERE cod_per='$_POST[cod_per]'";
			$rs3=pg_query($sql) or die("Error en la búsqueda");
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

		case '6':{
			$sql="SELECT rp.cod_per,rp.nom,rp.ape1,rp.ape2,pp.car,pp.sal FROM rf_persona rp,um_per_proy_temp pp WHERE rp.cod_per=pp.cod_per and pp.cod_pro='$_POST[cod_pro]'";
			$rs=pg_query($sql);
			$datben=array();
			while($obj=pg_fetch_object($rs)){
				$datben[]=array(
					'cod_per'=>$obj->cod_per,
					'nom'=>$obj->nom,
					'ape1'=>$obj->ape1,
					'ape2'=>$obj->ape2,
					'car'=>$obj->car,
					'sal'=>$obj->sal
				);
			}
			echo ''.json_encode($datben).'';
			pg_close();
		}break;

		case '7':{
			pg_query("DELETE FROM um_per_proy_temp");
			pg_close();
		}break;
	}
?>