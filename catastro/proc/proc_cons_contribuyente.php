<?php  
	include ("../../php/conexion.php");
	$conn=conectar();

	switch ($_POST['caso']) {
		case 'N':
			$propietario="";
			// $sex="";
			$fec_nac="";
			$nit="";
			$tel1="";
			$dir="";
			//Búsqueda de Negocio
			$sql="SELECT rp.nom,rp.ape1,rp.ape2,to_char(rp.fec_nac,'DD/MM/YYYY') as fec_nac,rp.nit,rp.tel1,rp.dir,count(cn.nom_neg) FROM rf_persona rp,ca_negocio cn WHERE rp.cod_per=cn.cod_con AND cn.tip_con='N' GROUP BY rp.nom,rp.ape1,rp.ape2,rp.sex,rp.fec_nac,rp.nit,rp.tel1,rp.dir";
			$rs=pg_query($sql);
			$datcon = array();
			while ($row=pg_fetch_array($rs)){
				$propietario=$row['nom']." ".$row['ape1']." ".$row['ape2'];
				// $sex=$row['sex'];
				$fec_nac=$row['fec_nac'];
				$nit=$row['nit'];
				$tel1=$row['tel1'];
				$dir=$row['dir'];
				$datcon[]=array(
					'propietario'=>$propietario,
					// 'sex'=>$sex,
					'fec_nac'=>$fec_nac,
					'nit'=>$nit,
					'tel1'=>$tel1,
					'dir'=>$dir
				);
			}
			echo ''.json_encode($datcon).'';
			pg_close();
		break;

		case 'J':
			$propietario="";
			// $sex="";
			$fec_nac="";
			$nit="";
			$tel1="";
			$dir="";
			//Búsqueda de Negocio
			$sql="SELECT cs.nom_jur,to_char(cs.fec_cons,'DD/MM/YYYY') as fec_cons,cs.nit_jur,cs.tel_jur,cs.dir_jur,count(cn.nom_neg) FROM ca_sociedad cs,ca_negocio cn WHERE cs.idsoc=cn.cod_con AND cn.tip_con='J' GROUP BY cs.nom_jur,cs.fec_cons,cs.nit_jur,cs.tel_jur,cs.dir_jur";
			$rs=pg_query($sql);
			$datcon = array();
			while ($row=pg_fetch_array($rs)){
				$propietario=$row['nom_jur'];
				// $sex="";
				$fec_nac=$row['fec_cons'];
				$nit=$row['nit_jur'];
				$tel1=$row['tel_jur'];
				$dir=$row['dir_jur'];
				$datcon[]=array(
					'propietario'=>$propietario,
					// 'sex'=>$sex,
					'fec_nac'=>$fec_nac,
					'nit'=>$nit,
					'tel1'=>$tel1,
					'dir'=>$dir
				);
			}
			echo ''.json_encode($datcon).'';
			pg_close();
		break;

		case 'T':
			$propietario="";
			// $sex="";
			$fec_nac="";
			$nit="";
			$tel1="";
			$dir="";
			$datcon = array();
			$sql="SELECT rp.nom,rp.ape1,rp.ape2,to_char(rp.fec_nac,'DD/MM/YYYY') as fec_nac,rp.nit,rp.tel1,rp.dir,count(cn.nom_neg) FROM rf_persona rp,ca_negocio cn WHERE rp.cod_per=cn.cod_con AND cn.tip_con='N' GROUP BY rp.nom,rp.ape1,rp.ape2,rp.sex,rp.fec_nac,rp.nit,rp.tel1,rp.dir";
			$rs=pg_query($sql);
			while ($row=pg_fetch_array($rs)){
				$propietario=$row['nom']." ".$row['ape1']." ".$row['ape2'];
				// $sex=$row['sex'];
				$fec_nac=$row['fec_nac'];
				$nit=$row['nit'];
				$tel1=$row['tel1'];
				$dir=$row['dir'];
				$datcon[]=array(
					'propietario'=>$propietario,
					// 'sex'=>$sex,
					'fec_nac'=>$fec_nac,
					'nit'=>$nit,
					'tel1'=>$tel1,
					'dir'=>$dir
				);
			}
			$sql="SELECT cs.nom_jur,to_char(cs.fec_cons,'DD/MM/YYYY') as fec_cons,cs.nit_jur,cs.tel_jur,cs.dir_jur,count(cn.nom_neg) FROM ca_sociedad cs,ca_negocio cn WHERE cs.idsoc=cn.cod_con AND cn.tip_con='J' GROUP BY cs.nom_jur,cs.fec_cons,cs.nit_jur,cs.tel_jur,cs.dir_jur";
			$rs=pg_query($sql);
			while ($row=pg_fetch_array($rs)){
				$propietario=$row['nom_jur'];
				// $sex="";
				$fec_nac=$row['fec_cons'];
				$nit=$row['nit_jur'];
				$tel1=$row['tel_jur'];
				$dir=$row['dir_jur'];
				$datcon[]=array(
					'propietario'=>$propietario,
					// 'sex'=>$sex,
					'fec_nac'=>$fec_nac,
					'nit'=>$nit,
					'tel1'=>$tel1,
					'dir'=>$dir
				);
			}
			echo ''.json_encode($datcon).'';
			pg_close();
		break;
		// case '1':{
		// 	if ($_POST['buspor']=="Nombre") {
		// 		// $sql="SELECT * FROM rf_persona rp, WHERE nom ilike '%$_POST[bus_proy]%' or ape1 ilike '%$_POST[bus_proy]%' or ape2 ilike '%$_POST[bus_proy]%'";
		// 		$sql="SELECT rp.* FROM rf_persona rp,ca_negocio cn WHERE rp.cod_per=cn.cod_con and (nom ilike '%$_POST[bus_proy]%' or ape1 ilike '%$_POST[bus_proy]%' or ape2 ilike '%$_POST[bus_proy]%') UNION ALL SELECT rp.* FROM rf_persona rp,ca_inmueble ci WHERE rp.cod_per=ci.cod_pro";
		// 	}else{
		// 		$sql="SELECT * FROM rf_persona rp, WHERE dui='$_POST[bus_proy]' ";
		// 	}
		// 	enviaDatos($sql);
		// }break;
		
		// case '2':{
		// 	$sql="SELECT * FROM rf_persona rp,ca_negocio cn WHERE rp.cod_per=cn.cod_con and cn.nom_neg ilike '%$_POST[buspor]%'";
		// 	enviaDatos($sql);
		// }break;

		// case '3':{
		// 	$sql="SELECT * FROM rf_persona rp,ca_inmueble ci WHERE rp.cod_per=ci.cod_pro and ci.cod_inm='$_POST[buspor]'";
		// 	enviaDatos($sql);
		// }break;

		// case 'T':
		// 	// $sql="SELECT rp.nom,rp.ape1,rp.ape2,cn.nom_neg FROM rf_persona rp,ca_negocio cn WHERE rp.cod_per=cn.cod_con UNION ALL SELECT rp.nom,rp.ape1,rp.ape2,ci.cod_inm as nom_neg FROM rf_persona rp,ca_inmueble ci WHERE rp.cod_per=ci.cod_pro";
		// 	$propietario="";
		// 	$sex="";
		// 	$fec_nac="";
		// 	$nit="";
		// 	$tel1="";
		// 	$tel2="";
		// 	$dir="";
		// 	$neg="";
		// 	$codcat="";
		// 	$datcon = array();
		// 	$sql="SELECT * FROM ca_negocio";
		// 	$rs=pg_query($sql);
		// 	while($row=pg_fetch_array($rs)){
		// 		if($row['tip_con']=='J'){//Personas Juridicas
		// 			$sql2="SELECT nom_jur,nit_jur,tel_jur,dir_jur FROM ca_sociedad WHERE idsoc=".$row['cod_con'];
		// 			$rs2=pg_query($sql2);
		// 			$row2=pg_fetch_array($rs2);
		// 			$propietario=$row2['nom_jur'];
		// 			$nit=$row2['nit_jur'];
		// 			$tel1=$row2['tel_jur'];
		// 			$dir=$row2['dir_jur'];
		// 		}else{//Personas Naturales
		// 			$sql2="SELECT nom,ape1,ape2,sex,fec_nac,nit,tel1,tel2,dir FROM rf_persona WHERE cod_per=".$row['cod_con'];
		// 			$rs2=pg_query($sql2);
		// 			$row2=pg_fetch_array($rs2);
		// 			$propietario=$row2['nom']." ".$row2['ape1']." ".$row2['ape2'];
		// 		}
		// 		echo $propietario;
		// 	}
		// break;

		// case 'p':
		// 	$propietario="";
		// 	$sex="";
		// 	$fec_nac="";
		// 	$nit="";
		// 	$tel1="";
		// 	$tel2="";
		// 	$dir="";
		// 	$neg="";
		// 	$codcat="";
		// 	$datcon = array();
		// 	$sql="select rp.nom,rp.ape1,rp.ape2,count(cn.nom_neg) from rf_persona rp,ca_negocio cn where rp.cod_per=cn.cod_con and group by rp.nom,rp.ape1,rp.ape2";
		// 	break;

	
	}

	function enviaDatos($consulta){
		$rs=pg_query($consulta) or die("Error en la busqueda");
		$datproy = array();
		while ($obj=pg_fetch_object($rs)){
			$datproy[]=array(
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
				'nom_neg'=>$obj->nom_neg,
				'cod_inm'=>$obj->cod_inm
			);
		}
		echo ''.json_encode($datproy).'';
		pg_close();
	}

?>