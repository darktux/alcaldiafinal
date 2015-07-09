<?php  
	include ("../../php/conexion.php");
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{
			if($_POST['tipoper']=="N"){
				if ($_POST['buspor']=="Nombre") {
					$sql="SELECT rp.nom,rp.ape1,rp.ape2,cn.nom_neg,cn.rub_neg,cn.zon_neg,cn.dir_neg,cn.med_neg,cn.tip_con FROM rf_persona rp,ca_negocio cn WHERE rp.cod_per=cn.cod_con and (rp.nom ilike '%$_POST[bus_per]%' or rp.ape1 ilike '%$_POST[bus_per]%' or rp.ape2 ilike '%$_POST[bus_per]%')";
				}
				if($_POST['buspor']=="DUI"){
					$sql="SELECT rp.nom,rp.ape1,rp.ape2,cn.nom_neg,cn.rub_neg,cn.zon_neg,cn.dir_neg,cn.med_neg,cn.tip_con FROM rf_persona rp,ca_negocio cn WHERE rp.cod_per=cn.cod_con and rp.dui='$_POST[bus_per]' ";
				}
				if($_POST['buspor']=="NIT"){
					$sql="SELECT rp.nom,rp.ape1,rp.ape2,cn.nom_neg,cn.rub_neg,cn.zon_neg,cn.dir_neg,cn.med_neg,cn.tip_con FROM rf_persona rp,ca_negocio cn WHERE rp.cod_per=cn.cod_con and rp.nit='$_POST[bus_per]' ";
				}	
			}if($_POST['tipoper']=="J"){
				if ($_POST['buspor']=="Nombre") {
					$sql="SELECT cs.nom_jur,cn.nom_neg,cn.rub_neg,cn.zon_neg,cn.dir_neg,cn.med_neg,cn.tip_con FROM ca_sociedad cs,ca_negocio cn WHERE cs.idsoc=cn.cod_con and cs.nom_jur ilike '%$_POST[bus_per]%'";
				}
				if($_POST['buspor']=="NIT"){
					$sql="SELECT cs.nom_jur,cn.nom_neg,cn.rub_neg,cn.zon_neg,cn.dir_neg,cn.med_neg,cn.tip_con FROM ca_sociedad cs,ca_negocio cn WHERE cs.idsoc=cn.cod_con and cs.nit_jur='$_POST[bus_per]' ";
				}	
			}
			
			$rs=pg_query($sql);
			$datneg = array();
			$propietario="";
			while ($obj=pg_fetch_object($rs)){
				if($obj->tip_con=="N"){
					$propietario=$obj->nom." ".$obj->ape1." ".$obj->ape2;
				}else{
					$propietario=$obj->nom_jur;
				}
				$datneg[]=array(
					'propietario'=>$propietario,
					'nom_neg'=>$obj->nom_neg,
					'rub_neg'=>$obj->rub_neg,
					'zon_neg'=>$obj->zon_neg,
					'dir_neg'=>$obj->dir_neg,
					'med_neg'=>$obj->med_neg
				);
			}
			echo ''.json_encode($datneg).'';
			pg_close();
	
		}break;
		
		case '2':{
			$sql="SELECT * FROM ca_negocio cn WHERE cn.rub_neg='$_POST[buspor]'";
			enviaDatos($sql);
		}break;

		case '3':{
			$sql="SELECT * FROM ca_negocio cn WHERE cn.zon_neg='$_POST[buspor]'";
			enviaDatos($sql);
		
		}break;

		case '5':
			$sqlg="SELECT * FROM ca_rubro";
			$rs2=pg_query($sqlg);
			echo "<option>Seleccione...</option>";
			while ($row2=pg_fetch_array($rs2)) {
				echo "
				<option value='$row2[1]'>$row2[1]</option>
				";
			}
			pg_close($conn);
		break;

	}

	function enviaDatos($consulta){
		$rs=pg_query($consulta) or die("Error en la busqueda");
		$datneg = array();
		$propietario="";
		while ($obj=pg_fetch_object($rs)){
			if($obj->tip_con=='J'){
				$sql="SELECT nom_jur FROM ca_sociedad WHERE idsoc=".$obj->cod_con;
				$rs2=pg_query($sql);
				$row=pg_fetch_array($rs2);
				$propietario=$row['nom_jur'];
			}else{
				$sql="SELECT nom,ape1,ape2 FROM rf_persona WHERE cod_per=".$obj->cod_con;
				$rs2=pg_query($sql);
				$row=pg_fetch_array($rs2);
				$propietario=$row['nom']." ".$row['ape1']." ".$row['ape2'];
			}
			$datneg[]=array(
				'propietario'=>$propietario,
				'nom_neg'=>$obj->nom_neg,
				'rub_neg'=>$obj->rub_neg,
				'zon_neg'=>$obj->zon_neg,
				'dir_neg'=>$obj->dir_neg,
				'med_neg'=>$obj->med_neg
			);
		}
		echo ''.json_encode($datneg).'';
		pg_close();
	}

	
?>