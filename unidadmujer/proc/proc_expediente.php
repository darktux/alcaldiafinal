<?php 
	session_start();
	include('./../../php/conexion.php');
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{
			//Variables
			$cod_per="";
			//Si está vació es porq no lo encontró registrado y se procede a almacenar la nueva persona
			if($_POST['cod_per']==""){$cod_per=agregaNuevaPersona();}else{$cod_per=$_POST['cod_per'];}
			if ($_POST['cod_agr']==""){$cod_agr=agregarAgresor();}else{$cod_agr=$_POST['cod_agr'];}
			//Se agrega el expediente
			agregaExpediente($cod_per,$cod_agr);
		}break;

		case '2':{ //Busca coincidencia de personas para abrirle expediente
			if ($_POST['radBusPer']=="DUI") {
				$sql="SELECT * FROM rf_persona WHERE dui='$_POST[txtBusPer]'";
			}else{
				$sql="SELECT * FROM rf_persona WHERE nom ilike '%$_POST[txtBusPer]%' or ape1 ilike '%$_POST[txtBusPer]%' or ape2 ilike '%$_POST[txtBusPer]%'";
			}
			$rs=pg_query($sql) or die("Error en la búsqueda");
			$numRow=pg_num_rows($rs);
			for ($i=0; $i < $numRow; $i++) { 
				$row=pg_fetch_array($rs,$i);
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
					<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaDatos('".$cod_per."')\"><i class='icon-ok'></i></a></td>
				</tr>
				";
			}
			pg_close();
		}break;

		case '3':{//Devuelve los datos de una persona seleccionada en la busqueda
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
			pg_close();
		}break;

		case '4':{ //Busca coincidencia de personas sobre el presunto agresor
			if ($_POST['radBusPer2']=="DUI") {
				$sql="SELECT * FROM rf_persona WHERE dui='$_POST[txtBusPer2]'";
			}else{
				$sql="SELECT * FROM rf_persona WHERE nom ilike '%$_POST[txtBusPer2]%' or ape1 ilike '%$_POST[txtBusPer2]%' or ape2 ilike '%$_POST[txtBusPer2]%'";
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
			if ($_POST['radBusMad']=="DUI") {
				$sql="SELECT * FROM rf_persona WHERE dui='$_POST[txtBusMad]'";
			}else{
				$sql="SELECT * FROM rf_persona WHERE nom ilike '%$_POST[txtBusMad]%' or ape1 ilike '%$_POST[txtBusMad]%' or ape2 ilike '%$_POST[txtBusMad]%'";
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
					<td><a href='#addCol' class='btn' data-dismiss='modal' onclick=\"cargaDatosMad('".$cod_per."')\"><i class='icon-ok'></i></a></td>
				</tr>
				";
			}
			pg_close();
		}break;

		case '6':{
			if ($_POST['radBusPad']=="DUI") {
				$sql="SELECT * FROM rf_persona WHERE dui='$_POST[txtBusPad]'";
			}else{
				$sql="SELECT * FROM rf_persona WHERE nom ilike '%$_POST[txtBusPad]%' or ape1 ilike '%$_POST[txtBusPad]%' or ape2 ilike '%$_POST[txtBusPad]%'";
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
					<td><a href='#addCol' class='btn' data-dismiss='modal' onclick=\"cargaDatosPad('".$cod_per."')\"><i class='icon-ok'></i></a></td>
				</tr>
				";
			}
			pg_close();
		}break;
	
	}

	function agregaNuevaPersona(){
		pg_query("INSERT INTO rf_persona(nom,ape1,ape2,sex,fec_nac,dui,nit,tel1,tel2,dep,mun,dir,ocu,est_civ) VALUES('$_POST[nom]','$_POST[ape1]','$_POST[ape2]','$_POST[sex]','$_POST[fec_nac]','$_POST[dui]','$_POST[nit]','$_POST[tel1]','$_POST[tel2]','$_POST[dep]','$_POST[mun]','$_POST[dir]','$_POST[tip_tra]','$_POST[est_civ]')");
		$rs=pg_query("SELECT MAX(cod_per) FROM rf_persona");
		if ($row = pg_fetch_row($rs)) {
			$cod_per = trim($row[0]);
		}
		return $cod_per;
	}
	function agregarAgresor(){
		pg_query("INSERT INTO rf_persona(nom,ape1,ape2,sex,fec_nac,dui,nit,tel1,tel2,dep,mun,dir,ocu,est_civ) VALUES('$_POST[nom_agr]','$_POST[ape1_agr]','$_POST[ape2_agr]','$_POST[sex_agr]','$_POST[fec_nac_agr]','$_POST[dui_agr]','$_POST[nit_agr]','$_POST[tel1_agr]','$_POST[tel2_agr]','$_POST[dep_agr]','$_POST[mun_agr]','$_POST[dir_agr]','$_POST[tra_agr]','$_POST[est_civ]')");
		$rs=pg_query("SELECT MAX(cod_per) FROM rf_persona");
		if ($row = pg_fetch_row($rs)) {
			$cod_agr = trim($row[0]);
		}
		return $cod_agr;
	}
	function agregaExpediente($cod_per,$cod_agr){
		$cod_exp="";
		$sqlexp="INSERT INTO um_expediente(ano_res,niv_edu,
			oci_otr,
			tra_rem,baj_con,jor_tra,ing_med_men,otr_tip_ing,dep_eco_agr,rec_ayu,rec_ayu_ong,
			med_cab,acu_amb,tra_con,com,con_agr,dur_rel_sen,pri_con,
			suf_mal,mal_qui,suf_abu_sex,abu_qui_sex,
			tra_sep,med_cau,rup_ant,dur_mal,
			ame_rup,
			mal_men,tip_mal_men,num_hij,apo_eco_fam,apo_afe_fam,apo_cri,con_sit,con_apo,man_rel_agr,
			apo_efe_ami,apo_afe_ami,ent_con_agr,ent_apo_agr,
			niv_edu_agr,ant_pen_agr,
			cod_per,cod_agr) 
			VALUES('$_POST[ano_res]','$_POST[niv_edu]',
			'$_POST[oci_otr]',
			'$_POST[tra_rem]','$_POST[baj_con]','$_POST[jor_tra]','$_POST[ing_med_men]','$_POST[otr_tip_ing]','$_POST[dep_eco_agr]','$_POST[rec_ayu]','$_POST[rec_ayu_ong]',
			'$_POST[med_cab]','$_POST[acu_amb]','$_POST[tra_con]','$_POST[com]','$_POST[con_agr]','$_POST[dur_rel_sen]','$_POST[pri_con]',
			'$_POST[suf_mal]','$_POST[mal_qui]','$_POST[suf_abu_sex]','$_POST[abu_qui_sex]',
			'$_POST[tra_sep]','$_POST[med_cau]','$_POST[rup_ant]','$_POST[dur_mal]',
			'$_POST[ame_rup]',
			'$_POST[mal_men]','$_POST[tip_mal_men]','$_POST[num_hij]','$_POST[apo_eco_fam]','$_POST[apo_afe_fam]','$_POST[apo_cri]','$_POST[con_sit]','$_POST[con_apo]','$_POST[man_rel_agr]',
			'$_POST[apo_efe_ami]','$_POST[apo_afe_ami]','$_POST[ent_con_agr]','$_POST[ent_apo_agr]',
			'$_POST[niv_edu_agr]','$_POST[ant_pen_agr]',
			'".$cod_per."','".$cod_agr."')";

		pg_query("BEGIN");
		$rse=pg_query($sqlexp);//Ingresa expediente
		//Recupera el codigo del expediente recien ingresado
		$rs=pg_query("SELECT MAX(cod_exp) as cod_exp FROM um_expediente");
		$row = pg_fetch_array($rs);
		$cod_exp = trim($row['cod_exp']);
		/////
		$oci_ded=$_POST['oci_ded'];
		$oci_lec=$_POST['oci_lec'];
		$per_hog=$_POST['per_hog'];
		$car_agr=$_POST['car_agr'];
		$dec_aba_hog=$_POST['dec_aba_hog'];
		$res_ame_rup=$_POST['res_ame_rup'];
		$abu_qui=$_POST['abu_qui'];
		$prob_agr=$_POST['prob_agr'];
		//Ingresa los valores de los checkbox
		for ($i=0; $i < count($_POST['oci_ded']); $i++) {
			pg_query("INSERT INTO um_checkbox VALUES('$cod_exp','oci_ded','$oci_ded[$i]')");
		}
		for ($i=0; $i < count($_POST['oci_lec']); $i++) {
			pg_query("INSERT INTO um_checkbox VALUES('$cod_exp','oci_lec','$oci_lec[$i]')");
		}
		for ($i=0; $i < count($_POST['per_hog']); $i++) {
			pg_query("INSERT INTO um_checkbox VALUES('$cod_exp','per_hog','$per_hog[$i]')");
		}
		for ($i=0; $i < count($_POST['car_agr']); $i++) {
			pg_query("INSERT INTO um_checkbox VALUES('$cod_exp','car_agr','$car_agr[$i]')");
		}
		for ($i=0; $i < count($_POST['dec_aba_hog']); $i++) {
			pg_query("INSERT INTO um_checkbox VALUES('$cod_exp','dec_aba_hog','$dec_aba_hog[$i]')");
		}
		for ($i=0; $i < count($_POST['res_ame_rup']); $i++) {
			pg_query("INSERT INTO um_checkbox VALUES('$cod_exp','res_ame_rup','$res_ame_rup[$i]')");
		}
		for ($i=0; $i < count($_POST['abu_qui']); $i++) {
			pg_query("INSERT INTO um_checkbox VALUES('$cod_exp','abu_qui','$abu_qui[$i]')");
		}
		for ($i=0; $i < count($_POST['prob_agr']); $i++) {
			pg_query("INSERT INTO um_checkbox VALUES('$cod_exp','prob_agr','$prob_agr[$i]')");
		}
		//Agrega las observaciones actuales
		$fecha_actual=date("Y-m-d");
		$rseob=pg_query("INSERT INTO um_obs_exp VALUES('$cod_exp','$fecha_actual','$_POST[obs]')");
		//Si es menor de edad agrega padre y madre
		if($_POST['cod_mad']!="" || $_POST['cod_pad']!=""){
			pg_query("INSERT INTO um_exp_padres VALUES('$_POST[cod_mad]','$_POST[cod_pad]','$cod_exp')");
		}
		//Comprobacion final
		if($rse&&$rseob){
			pg_query("INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Registró nuevo expediente',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
			echo "Guardado exitosamente";
			pg_query("COMMIT");
		}else{
			echo "Error al ingresar";
			pg_query("ROLLBACK");
		}
		pg_close();
	}
?>