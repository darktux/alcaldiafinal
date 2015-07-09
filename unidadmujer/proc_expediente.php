<?php  
	include ("../php/conexion.php");
	/////ARMAR LOS CHECKBOX EN UNA SOLA CADENA/////
	$oci_ded = '';
	foreach ($_POST['oci_ded'] as $id){
		$s = '|';
		if($oci_ded == ''){
			$oci_ded =$id;
		}else{
			$oci_ded .= $s.$id; 
		}
	}
	// echo $oci_ded;
	
	/* esto es para separar la cadena */
	// $cadena2 = explode('|', $oci_ded); 
	
	// echo '<br><br>imprimo el valor 0 de mi array '.$cadena2[0];
///////////////////////////////////////////////////////////////
	$oci_lec = '';
	foreach ($_POST['oci_lec'] as $id){
		$s = '|';
		if($oci_lec == ''){
			$oci_lec =$id;
		}else{
			$oci_lec .= $s.$id; 
		}
	}
	// echo $oci_lec;
	
	/* esto es para separar la cadena */
	// $cadena2 = explode('|', $oci_lec); 
	
	// echo '<br><br>imprimo el valor 0 de mi array '.$cadena2[0];
///////////////////////////////////////////////////////////////
	$per_hog = '';
	foreach ($_POST['per_hog'] as $id){
		$s = '|';
		if($per_hog == ''){
			$per_hog =$id;
		}else{
			$per_hog .= $s.$id; 
		}
	}
	// echo $per_hog;
	
	/* esto es para separar la cadena */
	// $cadena2 = explode('|', $per_hog); 
	
	// echo '<br><br>imprimo el valor 0 de mi array '.$cadena2[0];
///////////////////////////////////////////////////////////////
	// $pro = '';
	// foreach ($_POST['pro'] as $id){
	// 	$s = '|';
	// 	if($pro == ''){
	// 		$pro =$id;
	// 	}else{
	// 		$pro .= $s.$id; 
	// 	}
	// }
	// echo $pro;
	
	/* esto es para separar la cadena */
	// $cadena2 = explode('|', $pro); 
	
	// echo '<br><br>imprimo el valor 0 de mi array '.$cadena2[0];
///////////////////////////////////////////////////////////////
	$car_agr = '';
	foreach ($_POST['car_agr'] as $id){
		$s = '|';
		if($car_agr == ''){
			$car_agr =$id;
		}else{
			$car_agr .= $s.$id; 
		}
	}
	// echo $car_agr;
	
	/* esto es para separar la cadena */
	// $cadena2 = explode('|', $car_agr); 
	
	// echo '<br><br>imprimo el valor 0 de mi array '.$cadena2[0];
///////////////////////////////////////////////////////////////
	$dec_aba_hog = '';
	foreach ($_POST['dec_aba_hog'] as $id){
		$s = '|';
		if($dec_aba_hog == ''){
			$dec_aba_hog =$id;
		}else{
			$dec_aba_hog .= $s.$id; 
		}
	}
	// echo $dec_aba_hog;
	
	/* esto es para separar la cadena */
	// $cadena2 = explode('|', $dec_aba_hog); 
	
	// echo '<br><br>imprimo el valor 0 de mi array '.$cadena2[0];
///////////////////////////////////////////////////////////////
	$res_ame_rup = '';
	foreach ($_POST['res_ame_rup'] as $id){
		$s = '|';
		if($res_ame_rup == ''){
			$res_ame_rup =$id;
		}else{
			$res_ame_rup .= $s.$id; 
		}
	}
	// echo $res_ame_rup;
	
	/* esto es para separar la cadena */
	// $cadena2 = explode('|', $res_ame_rup); 
	
	// echo '<br><br>imprimo el valor 0 de mi array '.$cadena2[0];
///////////////////////////////////////////////////////////////
	$abu_qui = '';
	foreach ($_POST['abu_qui'] as $id){
		$s = '|';
		if($abu_qui == ''){
			$abu_qui =$id;
		}else{
			$abu_qui .= $s.$id; 
		}
	}
	// echo $abu_qui;
	
	/* esto es para separar la cadena */
	// $cadena2 = explode('|', $abu_qui); 
	
	// echo '<br><br>imprimo el valor 0 de mi array '.$cadena2[0];
///////////////////////////////////////////////////////////////
	$prob_agr = '';
	foreach ($_POST['prob_agr'] as $id){
		$s = '|';
		if($prob_agr == ''){
			$prob_agr =$id;
		}else{
			$prob_agr .= $s.$id; 
		}
	}
	// echo $prob_agr;
	
	/* esto es para separar la cadena */
	// $cadena2 = explode('|', $prob_agr); 
	
	// echo '<br><br>imprimo el valor 0 de mi array '.$cadena2[0];
/////////////////////////////////////////////////////////////////////////////
	$conn=conectar();
	$bus="SELECT cod_per FROM rf_persona WHERE nom='".$_POST['nom']."' and ape1='".$_POST['ape1']."' and ape2='".$_POST['ape2']."' and sex='".$_POST['sex']."' and dui='".$_POST['dui']."' and nit='".$_POST['nit']."' and tel1='".$_POST['tel1']."' and tel2='".$_POST['tel2']."' and dir='".$_POST['dir']."'";
	$rs=pg_query($bus) or die("Error al buscar duplicidad en persona");
	if($rs){
		$numRow=pg_num_rows($rs);
		for ($i=0; $i <$numRow ; $i++) { 
			$row=pg_fetch_array($rs,$i);
			$cod_per=$row['cod_per'];
		}
		isset($cod_per){
			$sqlper="INSERT INTO rf_persona(nom,ape1,ape2,sex,dui,nit,tel1,tel2,dir) VALUES('".$_POST['nom']."','".$_POST['ape1']."','".$_POST['ape2']."','".$_POST['sex']."','".$_POST['dui']."','".$_POST['nit']."','".$_POST['tel1']."','".$_POST['tel2']."','".$_POST['dir']."')";
		}
	}
	

	$sqlexp="INSERT INTO um_expediente(
		fec_nac,lug_nac,ano_res,
		niv_edu,
		oci_ded,oci_lec,oci_otr,
		rec_fin,seg_soc,med_cab,acu_amb,tra_con,tie_lav,num_lav_sem,com,con_agr,dur_rel_sen,ano_con_agr,pri_con,con_otr,cua_otr,suf_mal,mal_qui,suf_abu_sex,abu_qui_sex,fec_ing_mun,mot_ing,ing_ant,cua,dur,per_cen_act,otr_per,num_den,con_sit,rec_ayu_ong,obs,
		tra_rem,tip_tra,baj_con,ing_med_men,otr_tip_ing,jor_tra,dep_eco_agr,res_ant,est_civ,tra_sep,num_hij,eda_hij,num_pad,med_cau,per_hog,sol_viv_soc,viv_con,
		car_agr,rup_ant,dur_mal,dec_aba_hog,dur_aba,ame_rup,res_ame_rup,mal_men,tip_mal_men,
		rel_fam_ext,apo_efe_fam,apo_afe_fam,apo_cri,con_apo,man_rel_agr,
		apo_afe_ami,apo_efe_ami,ent_con_agr,ent_apo_agr,
		nom_agr,eda_agr,lug_nac_agr,ano_res_agr,niv_edu_agr,tra_agr,ant_pen_agr,ant_vio_otr,abu_qui,prob_agr,cod_per) 
		VALUES(
		'$_POST[fec_nac]','$_POST[lug_nac]','$_POST[ano_res]',
		'$_POST[niv_edu]',
		'".$oci_ded."','".$oci_lec."','$_POST[oci_otr]',
		'$_POST[rec_fin]','$_POST[seg_soc]','$_POST[med_cab]','$_POST[acu_amb]','$_POST[tra_con]','$_POST[tie_lav]','$_POST[num_lav_sem]','$_POST[com]','$_POST[con_agr]','$_POST[dur_rel_sen]','$_POST[ano_con_agr]','$_POST[pri_con]','$_POST[con_otr]','$_POST[cua_otr]','$_POST[suf_mal]','$_POST[mal_qui]','$_POST[suf_abu_sex]','$_POST[abu_qui_sex]','$_POST[fec_ing_mun]','$_POST[mot_ing]','$_POST[ing_ant]','$_POST[cua]','$_POST[dur]','$_POST[per_cen_act]','$_POST[otr_per]','$_POST[num_den]','$_POST[con_sit]','$_POST[rec_ayu_ong]','$_POST[obs]',
		'$_POST[tra_rem]','$_POST[tip_tra]','$_POST[baj_con]','$_POST[ing_med_men]','$_POST[otr_tip_ing]','$_POST[jor_tra]','$_POST[dep_eco_agr]','$_POST[res_ant]','$_POST[est_civ]','$_POST[tra_sep]','$_POST[num_hij]','$_POST[eda_hij]','$_POST[num_pad]','$_POST[med_cau]','".$per_hog."','$_POST[sol_viv_soc]','$_POST[viv_con]',
		'".$car_agr."','$_POST[rup_ant]','$_POST[dur_mal]','".$dec_aba_hog."','$_POST[dur_aba]','$_POST[ame_rup]','".$res_ame_rup."','$_POST[mal_men]','$_POST[tip_mal_men]',
		'$_POST[rel_fam_ext]','$_POST[apo_efe_fam]','$_POST[apo_afe_fam]','$_POST[apo_cri]','$_POST[con_apo]','$_POST[man_rel_agr]',
		'$_POST[apo_afe_ami]','$_POST[apo_efe_ami]','$_POST[ent_con_agr]','$_POST[ent_apo_agr]',
		'$_POST[nom_agr]','$_POST[eda_agr]','$_POST[lug_nac_agr]','$_POST[ano_res_agr]','$_POST[niv_edu_agr]','$_POST[tra_agr]','$_POST[ant_pen_agr]','$_POST[ant_vio_otr]','".$abu_qui."','".$prob_agr."','".$cod_per."')";
	
	$rsp=pg_query($sqlper) or die("Error al ingresar persona");
	$rse=pg_query($sqlexp) or die("Error al ingresar expediente");
	if ($rsp&&$rse) {
		echo "Ingresado correctamente";
	}else{
		//intentar borrar el registro insertado??
	}
	pg_close($conn);

?>