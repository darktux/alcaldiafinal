<?php
	include ("../php/conexion.php");
	$conn=conectar();
	$sql="";
	if ($_POST[buspor]=="Nombre") {
		$sql="SELECT * FROM rf_persona,um_expediente WHERE rf_persona.nom='$_POST[bus_per]' and rf_persona.cod_per=um_expediente.cod_per";
	}else{
		$sql="SELECT * FROM rf_persona,um_expediente WHERE dui='$_POST[bus_per]' and rf_persona.cod_per=um_expediente.cod_per";
	}
	$rs=pg_query($sql) or die("Error en la busqueda");
	$numRow=pg_num_rows($rs);
	for ($i=0; $i < $numRow; $i++) { 
		$row=pg_fetch_array($rs,$i);
		$cod_per= $row['rf_persona.cod_per'];
		$nom= $row['nom'];
		$ape1= $row['ape1'];
		$ape2= $row['ape2'];
		$sex= $row['sex'];
		$dui= $row['dui'];
		$nit= $row['nit'];
		$dir= $row['dir'];
		$fec_nac= $row['fec_nac'];
		$lug_nac= $row['lug_nac'];
		$ano_res= $row['ano_res'];
		$niv_edu= $row['niv_edu'];
		$oci_ded= $row['oci_ded'];
		$oci_lec= $row['oci_lec'];
		$oci_otr= $row['oci_otr'];
		$rec_fin= $row['rec_fin'];
		$seg_soc= $row['seg_soc'];
		$med_cab= $row['med_cab'];
		$acu_amb= $row['acu_amb'];
		$tra_con= $row['tra_con'];
		$tie_lav= $row['tie_lav'];
		$num_lav_sem= $row['num_lav_sem'];
		$com= $row['com'];
		$con_agr= $row[''];
		$dur_rel_sen= $row['dur_rel_sen'];
		$ano_con_agr= $row['ano_con_agr'];
		$pri_con= $row['pri_con'];
		$con_otr= $row['con_otr'];
		$cua_otr= $row['cua_otr'];
		$suf_mal= $row['suf_mal'];
		$mal_qui= $row['mal_qui'];
		$suf_abu_sex= $row['suf_abu_sex'];
		$abu_qui_sex= $row['abu_qui_sex'];
		$fec_ing_mun= $row['fec_ing_mun'];
		$mot_ing= $row['mot_ing'];
		$ing_ant= $row['ing_ant'];
		$cua= $row['cua'];
		$dur= $row['dur'];
		$per_cen_act= $row['per_cen_act'];
		$otr_per= $row['otr_per'];
		$num_den= $row['num_den'];
		$con_sit= $row['con_sit'];
		$rec_ayu_ong= $row['rec_ayu_ong'];
		$obs= $row['obs'];
		$tra_rem= $row['tra_rem'];
		$tip_tra= $row['tip_tra'];
		$baj_con= $row['baj_con'];
		$ing_med_men= $row['ing_med_men'];
		$otr_tip_ing= $row['otr_tip_ing'];
		$jor_tra= $row['jor_tra'];
		$dep_eco_agr= $row['dep_eco_agr'];
		$res_ant= $row['res_ant'];
		$est_civ= $row['est_civ'];
		$tra_sep= $row['tra_sep'];
		$num_hij= $row['num_hij'];
		$eda_hij= $row['eda_hij'];
		$num_pad= $row['num_pad'];
		$med_cau= $row['med_cau'];
		$per_hog= $row['per_hog'];
		$sol_viv_soc= $row['sol_viv_soc'];
		$viv_con= $row['viv_con'];
		$car_agr= $row['car_agr'];
		$rup_ant= $row['rup_ant'];
		$dur_mal= $row['dur_mal'];
		$dec_aba_hog= $row['dec_aba_hog'];
		$dur_aba= $row['dur_aba'];
		$ame_rup= $row['ame_rup'];
		$res_ame_rup= $row['res_ame_rup'];
		$mal_men= $row['mal_men'];
		$tip_mal_men= $row['tip_mal_men'];
		$rel_fam_ext= $row['rel_fam_ext'];
		$apo_afe_fam= $row['apo_afe_fam'];
		$apo_efe_fam= $row['apo_efe_fam'];
		$apo_cri= $row['apo_cri'];
		$con_apo= $row['con_apo'];
		$man_rel_agr= $row['man_rel_agr'];
		$apo_afe_ami= $row['apo_afe_ami'];
		$apo_efe_ami= $row['apo_efe_ami'];
		$ent_con_agr= $row['ent_con_agr'];
		$ent_apo_agr= $row['ent_apo_agr'];
		$nom_agr= $row['nom_agr'];
		$eda_agr= $row['eda_agr'];
		$lug_nac_agr= $row['lug_nac_agr'];
		$ano_res_agr= $row['ano_res_agr'];
		$niv_edu_agr= $row['niv_edu_agr'];
		$tra_agr= $row['tra_agr'];
		$ant_pen_agr= $row['ant_pen_agr'];
		$ant_vio_otr= $row['ant_vio_otr'];
		$abu_qui= $row['abu_qui'];
		$prob_agr= $row['prob_agr'];
		$cod_per= $row['cod_per'];
		$pat= $row['pat'];
	}
	pg_close($conn);


echo "
<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset='UTF-8'>
	<title>Actualizar Expediente</title>
	<link rel='stylesheet' href='../css/bootstrap.css'>
	<script src='../js/jquery.min-1.7.1-google.js'></script>
	<script src='../js/bootstrap-2.0.2.js'></script>
</head>
<body>
	<form action='proc_bus_expediente.php' method='POST' class='well form-search'>
		<legend align='center'>Buscar Expediente</legend>
		<div class='control-group'>
		  	<strong>Buscar por:</strong>
		  	<label class='radio'><input type='radio' name='buspor' value='duibus'>DUI</label>
		  	<label class='radio'><input type='radio' name='buspor' value='Nombrebus' checked>Nombre</label>
		  </div>
		<input type='text' class='input-xlarge search-query' name='bus_per'>
  		<button type='submit' class='btn'>Buscar</button>
	</form>
	<form action='proc_act_expediente.php' method='POST' name='form_expediente' id='form_Expediente' class='well form-horizontal'>
		<legend align='center'>Actualizar Expediente</legend>
		<div class='tabbable tabs-left'>
			<ul class='nav nav-tabs'>
				<li class='active'><a data-toggle='tab' href='#datPer'>Datos Personales</a></li>
				<li><a data-toggle='tab' href='#cul'>Cultura</a></li>
				<li><a data-toggle='tab' href='#oci'>Ocio</a></li>
				<li><a data-toggle='tab' href='#sitGen'>Situación General</a></li>
		  		<li><a data-toggle='tab' href='#sitLab'>Situación Laboral</a></li>
				<li><a data-toggle='tab' href='#proGen'>Problemática General</a></li>
				<li><a data-toggle='tab' href='#famExt'>Familia Extensa</a></li>
				<li><a data-toggle='tab' href='#relSoc'>Relaciones Sociales</a></li>
				<li><a data-toggle='tab' href='#datAgr'>Datos del Agresor</a></li>
				<li><a data-toggle='tab' href='#fin'>Finalizar</a></li>
			</ul>

			<div class='tab-content'>
				<div class='tab-pane active' id='datPer'>
					<div class='control-group'>
						<label class='control-label' for='nom'>Nombre</label>
						<div class='controls'>
							<input type='hidden' name='cod_per' value='".$cod_per."'>
							<input type='text' class='span3' name='nom' id='nom' placeholder='Según como aparece en el DUI' value='".$nom."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label' for='ape1'>Primer Apellido</label>
						<div class='controls'>
							<input type='text' class='span3' name='ape1' id='ape1' placeholder='Según como aparece en el DUI' value='".$ape1."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label' for='ape2'>Segundo Apellido</label>
						<div class='controls'>
							<input type='text' class='span3' name='ape2' id='ape2' placeholder='O apellido de casada' value='".$ape2."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label' for='sex'>Sexo</label>
						<div class='controls'>";
						if ($sex=='M') {
							echo "<label class='radio inline'><input type='radio' name='sex' value='M' checked>Masculino</label>";
							echo "<label class='radio inline'><input type='radio' name='sex' value='F'>Femenino</label>";
						}else{
							echo "<label class='radio inline'><input type='radio' name='sex' value='M'>Masculino</label>";
							echo "<label class='radio inline'><input type='radio' name='sex' value='F' checked>Femenino</label>";
						}
							
				echo "	</div>
					</div>
					<div class='control-group'>
						<label class='control-label' for='dui'>DUI</label>
						<div class='controls'>
							<input type='text' class='span3' name='dui' id='dui' placeholder='########-#' value='".$dui."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label' for='nit'>NIT</label>
						<div class='controls'>
							<input type='text' class='span3' name='nit' id='nit' placeholder='####-######-###-#' value='".$nit."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label' for='dir'>Direcci&oacute;n</label>
						<div class='controls'>
							<textarea class='input-xlarge' name='dir' id='dir' placeholder='Dirección actual'>".$dir."</textarea>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Fecha de Nacimiento</label>
						<div class='controls'>
							<input type='date' name='fec_nac' value='".$fec_nac."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Lugar de Nacimiento</label>
						<div class='controls'>
							<textarea class='input-xlarge' name='lug_nac' placeholder='Departamento y municipio de nacimiento'>".$lug_nac."</textarea>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Años de residencia en el país</label>
						<div class='controls'>
							<input type='number' name='ano_res' placeholder='#' class='input-mini' value='".$ano_res."'>
						</div>
					</div>
					<p class='pull-right'><a data-toggle='tab' href='#cul'>Siguiente</a></p>
				</div>		
			
				<div class='tab-pane' id='cul'>
					<div class='control-group'>
						<label class='control-label'>Nivel Educativo</label>
						<div class='controls'>
							<select name='niv_edu'>";
							$s1=$s2=$s3=$s4=$s5=$s6="";
							if ($niv_edu=="Sin estudios") {$s1="selected";}
							if ($niv_edu=="Primarios (certificados)") {$s2="selected";}
							if ($niv_edu=="Primarios (graduado)") {$s3="selected";}	
							if ($niv_edu=="Bachiller o equivalente") {$s4="selected";}	
							if ($niv_edu=="Superiores") {$s5="selected";}	
							if ($niv_edu=="Doctorado") {$s6="selected";}	
					echo   "
								<option value='Sin estudios' ".$s1.">Sin estudios</option>;
								<option value='Primarios (certificados)' ".$s2.">Primarios (certificados)</option>;
								<option value='Primarios (graduado)' ".$s3.">Primarios (graduado)</option>;
								<option value='Bachiller o equivalente' ".$s4.">Bachiller o equivalente</option>;
								<option value='Superiores' ".$s5.">Superiores</option>;
								<option value='Doctorado' ".$s6.">Doctorado</option>;
							</select>
						</div>
					</div>
					<p class='pull-right'><a data-toggle='tab' href='#oci'>Siguiente</a></p>
				</div>

				<div class='tab-pane' id='oci'>
					<div class='control-group'>
						<label class='control-label'>Dedicaciones preferidas</label>
						<div class='controls'>";
					$chk1=$chk2=$chk3=$chk4=$chk5=$chk6=$chk7=$chk8=$chk9=$chk10=$chk11=$chk12=$chk13="";
					$sel_oci_ded = explode('|', $oci_ded); 
					$x=count($sel_oci_ded);
					for ($i=0; $i <$x ; $i++) { 
						if ($sel_oci_ded[$i]=="estar con los hijos") {$chk0='checked="checked" ';}
						if ($sel_oci_ded[$i]=="estar con los amigos") {$chk1='checked="checked" ';}
						if ($sel_oci_ded[$i]=="juegos de azar") {$chk2='checked="checked" ';}
						if ($sel_oci_ded[$i]=="videojuegos") {$chk3='checked="checked" ';}
						if ($sel_oci_ded[$i]=="tragaperras") {$chk4='checked="checked" ';}
						if ($sel_oci_ded[$i]=="discotecas") {$chk5='checked="checked" ';}
						if ($sel_oci_ded[$i]=="labores") {$chk6='checked="checked" ';}
						if ($sel_oci_ded[$i]=="lectura") {$chk7='checked="checked" ';}
						if ($sel_oci_ded[$i]=="musica") {$chk8='checked="checked" ';}
						if ($sel_oci_ded[$i]=="pasear") {$chk9='checked="checked" ';}
						if ($sel_oci_ded[$i]=="bares") {$chk10='checked="checked" ';}
						if ($sel_oci_ded[$i]=="cine") {$chk11='checked="checked" ';}
						if ($sel_oci_ded[$i]=="maq") {$chk12='checked="checked" ';}
						if ($sel_oci_ded[$i]=="tv") {$chk13='checked="checked" ';}
					}

				echo "		<div class='span2'>
								<label class='checkbox'><input type='checkbox' name='oci_ded[]' ".$chk0." value='estar con los hijos'>Estar con los hijos</label>
								<label class='checkbox'><input type='checkbox' name='oci_ded[]' ".$chk1." value='estar con amigos'>Estar con amigos</label>
								<label class='checkbox'><input type='checkbox' name='oci_ded[]' ".$chk2." value='juegos de azar'>Juegos de azar</label>
								<label class='checkbox'><input type='checkbox' name='oci_ded[]' ".$chk3." value='videojuegos'>Videojuegos</label>
								<label class='checkbox'><input type='checkbox' name='oci_ded[]' ".$chk4." value='tragaperras'>Tragaperras</label>
								<label class='checkbox'><input type='checkbox' name='oci_ded[]' ".$chk5." value='discotecas'>Discotecas</label>
								<label class='checkbox'><input type='checkbox' name='oci_ded[]' ".$chk6." value='labores'>Labores</label>
							</div>
							<div class='span3'>
								<label class='checkbox'><input type='checkbox' name='oci_ded[]' ".$chk7." value='lectura'>Lectura</label>
								<label class='checkbox'><input type='checkbox' name='oci_ded[]' ".$chk8." value='musica'>Música</label>
								<label class='checkbox'><input type='checkbox' name='oci_ded[]' ".$chk9." value='pasear'>Pasear</label>
								<label class='checkbox'><input type='checkbox' name='oci_ded[]' ".$chk10." value='bares'>Bares</label>
								<label class='checkbox'><input type='checkbox' name='oci_ded[]' ".$chk11." value='cine'>Cine</label>
								<label class='checkbox'><input type='checkbox' name='oci_ded[]' ".$chk12." value='maq'>MAQ</label>
								<label class='checkbox'><input type='checkbox' name='oci_ded[]' ".$chk13." value='tv'>TV</label>
							</div>
						</div>
					</div>

					<div class='control-group'>
						<label class='control-label'>Lecturas</label>
						<div class='controls'>";
					$chk0=$chk1=$chk2="";
					$cadena2 = explode('|', $oci_lec); 
					$x=count($cadena2);
					for ($i=0; $i <$x ; $i++) { 
						if ($cadena2[$i]=="Libros") {$chk0='checked="checked" ';}
						if ($cadena2[$i]=="Revistas") {$chk1='checked="checked" ';}
						if ($cadena2[$i]=="Periodicos") {$chk2='checked="checked" ';}
					}

				echo "	<label class='checkbox inline span1'><input type='checkbox' name='oci_lec[]' ".$chk0." value='Libros'>Libros</label>
							<label class='checkbox inline span1'><input type='checkbox' name='oci_lec[]' ".$chk1." value='Revistas'>Revistas</label>
							<label class='checkbox inline span1'><input type='checkbox' name='oci_lec[]' ".$chk2." value='Periodicos'>Periódicos</label>";
				echo "	</div>
					</div>

					<div class='control-group'>
						<label class='control-label'>Otro Tipo</label>
						<div class='controls'>
							<textarea name='oci_otr' class='input-xlarge' placeholder='Describa otros pasatiempos'>".$oci_otr."</textarea>
						</div>
					</div>
					<p class='pull-right'><a data-toggle='tab' href='#sitGen'>Siguiente</a></p>
				</div>

				<div class='tab-pane' id='sitGen'>
					<div class='control-group'>
						<label class='control-label'>Recursos financieros</label>
						<div class='controls'>
							<select name='rec_fin'>";
							$s1=$s2=$s3=$s4="";
							if ($rec_fin=="Metalico") {$s1="selected";}
							if ($rec_fin=="Cuenta bancaria o libreta") {$s2="selected";}
							if ($rec_fin=="Apoyo economico familiar") {$s3="selected";}
							if ($rec_fin=="Cobertura sanitaria"){$s4="selected";}
								
				echo " 	
								<option value='Metalico' ".$s1.">Met&aacute;lico</option>
								<option value='Cuenta bancaria o libreta' ".$s2.">Cuenta bancaria o libreta</option>
								<option value='Apoyo economico familiar' ".$s3.">Apoyo econ&oacute;mico familiar</option>
								<option value='Cobertura sanitaria' ".$s4.">Cobertura sanitaria</option>
							</select>
						</div>
					</div>

					<div class='control-group'>
						<label class='control-label'>Seguridad social</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($seg_soc=='t') {
							$chk1='checked="checked" ';
						}else{
							$chk2='checked="checked" ';
						}
							
				echo "
							<label class='radio inline'><input type='radio' name='seg_soc' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='seg_soc' value='f' ".$chk2.">No</label>
						</div>
					</div>

					<div class='control-group'>
						<label class='control-label'>M&eacute;dico de cabecera</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($med_cab=='t') {
							$chk1='checked="checked" ';
						}else{
							$chk2='checked="checked" ';							
						}
							
				echo "
							<label class='radio inline'><input type='radio' name='med_cab' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='med_cab' value='f' ".$chk2.">No</label>
						</div>
					</div>

					<div class='control-group'>
						<label class='control-label'>Cuando est&aacute; enferma</label>
						<div class='controls'>
							<select name='acu_amb'>";
							$s1=$s2=$s3="";
							if ($acu_amb=="Acude al ambulatorio") {$s1="selected";}
							if ($acu_amb=="Hospital") {$s2="selected";}
							if ($acu_amb=="No estoy enferma") {$s3="selected";}

						echo "<option value='Acude al ambulatorio' ".$s1.">Acude a la clínica</option>
								<option value='Hospital' ".$s2.">Hospital</option>
								<option value='No estoy enferma' ".$s3.">Se queda en casa</option>
							</select>
						</div>
					</div>

					<div class='control-group'>
						<label class='control-label'>Tratamiento continuo</label>
						<div class='controls'>
							<input type='text' name='tra_con' class='span5' placeholder='Especifique el tipo de tratamiento si lo hay' value='".$tra_con."'>
						</div>
					</div>

					<div class='control-group'>
						<label class='control-label'>Tiene lavadora</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($tie_lav=='t') {
							$chk1='checked="checked" ';
						}else{
							$chk2='checked="checked" ';
						}
				echo "	<label class='radio inline'><input type='radio' name='tie_lav' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='tie_lav' value='f' ".$chk2.">No</label>
						</div>
					</div>

					<div class='control-group'>
						<label class='control-label'>Lavadas por semana</label>
						<div class='controls'>
							<input type='number' name='num_lav_sem' class='span1' placeholder='#' value='".$num_lav_sem."'>
						</div>
					</div>

					<div class='control-group'>
						<label class='control-label'>La comida es fundamentalmente</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($com=='Caliente') {
							$chk1='checked="checked" ';
						}else{
							$chk2='checked="checked" ';
						}
				echo "	<label class='radio inline'><input type='radio' name='com' value='Caliente' ".$chk1.">Caliente</label>
							<label class='radio inline'><input type='radio' name='com' value='Bocadillo' ".$chk2.">Bocadillo</label>
						</div>			
					</div>
					<div class='control-group'>
						<label class='control-label'>Tipo de convivencia con el agresor</label>
						<div class='controls'>
							<select name='con_agr'>";
							$s1=$s2=$s3="";
							if ($con_agr=="Contínua y Estable") {$s1="selected";}
							if ($con_agr=="Inestable y a Temporadas") {$s2="selected";}
							if ($con_agr=="Esporádica"){$s3="selected";}
						echo"	<option value='Contínua y Estable' ".$s1.">Contínua y Estable</option>
								<option value='Inestable y a Temporadas' ".$s2.">Inestable y a Temporadas</option>
								<option value='Esporádica' ".$s3.">Esporádica</option>
							</select>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Periodo de duración de la relación sentimental</label>
						<div class='controls'><input type='text' name='dur_rel_sen' value='".$dur_rel_sen."' placeholder='Años y/o meses'></div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Años de convivencia con el 'presunto' agresor</label>
						<div class='controls'><input type='number' name='ano_con_agr' class='input-mini' placeholder='#' value='".$ano_con_agr."'></div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Es primera convivencia</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($pri_con=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "<label class='radio inline'><input type='radio' name='pri_con' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='pri_con' value='f' ".$chk2.">No</label>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Antes ha convvido con otra persona(as)</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($con_otr=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='con_otr' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='con_otr' value='f' ".$chk2.">No</label>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Cuántas</label>
						<div class='controls'>
							<input type='number' name='cua_otr' placeholder='#' class='input-mini' value='".$cua_otr."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Antes ha sufrido maltratos</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($suf_mal=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='suf_mal' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='suf_mal' value='f' ".$chk2.">No</label>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Si la respuesta anterior es afirmativa, de quién</label>
						<div class='controls'>
							<input type='text' name='mal_qui' class='span3' placeholder='del padre, madre, otro' value='".$mal_qui."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Antes ha sufrido abuso sexual</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($suf_abu_sex=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='suf_abu_sex' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='suf_abu_sex' value='f' ".$chk2.">No</label>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Si la respuesta anterior es afirmativa, de quién</label>
						<div class='controls'>
							<input type='text' name='abu_qui_sex' class='span3' placeholder='del padre, madre, otro' value='".$abu_qui_sex."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Fecha de ingreso en el centro de la municipalidad</label>
						<div class='controls'>
							<input type='date' name='fec_ing_mun' value='".$fec_ing_mun."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Motivos de ingreso</label>
						<div class='controls'>
							<input type='text' name='mot_ing' class='span3' placeholder='orden judicial, otros' value='".$mot_ing."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Ingresos anteriores</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($ing_ant=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='ing_ant' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='ing_ant' value='f' ".$chk2.">No</label>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Cuántos</label>
						<div class='controls'>
							<input type='number' name='cua' class='span1' placeholder='#' value='".$cua."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Duración</label>
						<div class='controls'>
							<input type='text' name='dur' value='".$dur."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Permanencia en el centro actual</label>
						<div class='controls'>
							<input type='text' name='per_cen_act' value='".$per_cen_act."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Otras permanencias</label>
						<div class='controls'>
							<input type='text' name='otr_per' value='".$otr_per."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Nº de denuncias</label>
						<div class='controls'>
							<input type='number' name='num_den' class='input-mini inline' placeholder='#' value='".$num_den."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Conoce alguien de su familia su situación</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($con_sit=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='con_sit' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='con_sit' value='f' ".$chk2.">No</label>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Recibe ayuda de ONGs, ASociaciones, Caritas, otras</label>
						<div class='controls'>
							<input type='text' name='rec_ayu_ong' value='".$rec_ayu_ong."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Observaciones</label>
						<div class='controls'>
							<textarea name='obs' class='input-xlarge' rows='5' placeholder='Ingrese las observaciones correspondientes a la sitaución actual'>".$obs."</textarea>
						</div>
					</div>
					<p class='pull-right'><a data-toggle='tab' href='#sitLab'>Siguiente</a></p>
				</div>

				<div class='tab-pane' id='sitLab'>
					<div class='control-group'>
						<label class='control-label'>Trabajo remunerado</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($tra_rem=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='tra_rem' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='tra_rem' value='f' ".$chk2.">No</label>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Tipo</label>
						<div class='controls'>
							<input type='text' name='tip_tra' placeholder='Tipo de trabajo' value='".$tip_tra."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Contrato</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($baj_con=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='baj_con' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='baj_con' value='f' ".$chk2.">No</label>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Ingresos medios mensuales</label>
						<div class='controls'>
							<div class='input-prepend'>
								<span class='add-on'>$</span>
								<input type='text' class='span2' name='ing_med_men' value='".$ing_med_men."'>
							</div>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Otros ingresos</label>
						<div class='controls'>
							<select name='otr_tip_ing'>";
							$s1=$s2=$s3=$s4=$s5="";
							if ($otr_tip_ing=="Pensión") {$s1="selected";}
							if ($otr_tip_ing=="Subsidio por desempleo") {$s2="selected";}
							if ($otr_tip_ing=="Prestaciones sociales") {$s3="selected";}
							if ($otr_tip_ing=="Remesas") {$s4="selected";}
							if ($otr_tip_ing=="Ninguno") {$s5="selected";}
						echo "<option value='Pensión' ".$s1.">Pensi&oacute;n</option>
								<option value='Subsidio por desempleo' ".$s2.">Subsidios por desempleo</option>
								<option value='Prestaciones sociales' ".$s3.">Prestaciones sociales</option>
								<option value='Remesas' ".$s4.">Remesas</option>
								<option value='Ninguno' ".$s5.">Ninguno</option>
							</select>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Jornada de Trabajo</label>
						<div class='controls'>
							<div class='input-append'>
								<input type='number' class='input-mini' name='jor_tra' placeholder='#' value='".$jor_tra."'>
								<span class='add-on'>horas</span>
							</div>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Dependencia económica con el presunto agresor</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($dep_eco_agr=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='dep_eco_agr' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='dep_eco_agr' value='f' ".$chk2.">No</label>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Lugares de residencias anteriores</label>
						<div class='controls'>
							<textarea class='input-xlarge' name='res_ant' >".$res_ant."</textarea>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Estado Civil</label>
						<div class='controls'>
							<select name='est_civ'>";
							$s1=$s2=$s3=$s4=$s5=$s6="";
							if ($est_civ=="Casada") {$s1="selected";}
							if ($est_civ=="Separada") {$s2="selected";}
							if ($est_civ=="Divorciada") {$s3="selected";}
							if ($est_civ=="Soltera") {$s4="selected";}
							if ($est_civ=="Viuda") {$s5="selected";}
							if ($est_civ=="Otras") {$s6="selected";}
							echo "
									<option value='Casada' ".$s1.">Casada</option>
									<option value='Separada' ".$s2.">Separada</option>
									<option value='Divorciada' ".$s3.">Divorciada</option>
									<option value='Soltera' ".$s4.">Soltera</option>
									<option value='Viuda' ".$s5.">Viuda</option>
									<option value='Otras' ".$s6.">Otras</option>
							</select>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Ha iniciado trámites de separación</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($tra_sep=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='tra_sep' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='tra_sep' value='f' ".$chk2.">No</label>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Número de hijos</label>
						<div class='controls'>
							<input type='number' class='input-mini' name='num_hij' placeholder='#' value='".$num_hij."'>
						</div>
					</div>
						
					<div class='control-group'>
						<label class='control-label'>Edades de los hijos</label>
						<div class='controls'>
							<input type='text' name='eda_hij' placeholder='Separe las edades por coma' value='".$eda_hij."'>
						</div>
					</div>
						
					<div class='control-group'>
						<label class='control-label' for=''>Nº Padres</label>
						<div class='controls'>
							<input type='number' name='num_pad' class='input-mini' placeholder='#' value='".$num_pad."'>
						</div>
					</div>
						
					<div class='control-group'>
						<label class='control-label' for=''>Medidas cautelares relacionada con la visita de los menores</label>
						<div class='controls'>
							<textarea class='input-xlarge' name='med_cau' placeholder='Punto de encuentro,etc.'>".$med_cau."</textarea>
						</div>
					</div>
						
					<div class='control-group'>
						<label class='control-label'>Personas que viven en el hogar</label>
						<div class='controls'>";
						$chk1=$chk2=$chk3=$chk4="";
						$sel_per_hog = explode('|', $per_hog); 
						$x=count($sel_per_hog);
						for ($i=0; $i <$x ; $i++) { 
							if ($sel_per_hog[$i]=="Hombre (compañero)") {$chk1='checked="checked" ';}
							if ($sel_per_hog[$i]=="Mujer") {$chk2='checked="checked" ';}
							if ($sel_per_hog[$i]=="Hijos") {$chk3='checked="checked" ';}
							if ($sel_per_hog[$i]=="Otros (abuelos,tíos,etc)") {$chk4='checked="checked" ';}
						}
					echo "
							<label class='checkbox inline'><input name='per_hog[]' type='checkbox' ".$chk1." value='Hombre (compañero)'>Hombre (compa&ntilde;ero)</label>
							<label class='checkbox inline'><input name='per_hog[]' type='checkbox' ".$chk2." value='Mujer'>Mujer</label>
							<label class='checkbox inline'><input name='per_hog[]' type='checkbox' ".$chk3." value='Hijos'>Hijos</label>
							<label class='checkbox inline'><input name='per_hog[]' type='checkbox' ".$chk4." value='Otros (abuelos,tíos,etc)'>Otros (abuelos,t&iacute;os,etc)</label>
						</div>
					</div>
						
					<div class='control-group'>
						<label class='control-label'>Ha solicitado la vivienda social</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($sol_viv_soc=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='sol_viv_soc' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='sol_viv_soc' value='f' ".$chk2.">No</label>
						</div>
					</div>
						
					<div class='control-group'>
						<label class='control-label'>Se la han concedido</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($viv_con=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='viv_con' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='viv_con' value='f' ".$chk2.">No</label>
						</div>
					</div>
					<p class='pull-right'><a data-toggle='tab' href='#proGen'>Siguiente</a></p>
				</div>

				<div class='tab-pane' id='proGen'>
					<div class='control-group'>	
						<label class='control-label'>Car&aacute;cter de las agresiones</label>
						<div class='controls'>";
						$chk1=$chk2=$chk3=$chk4=$chk5=$chk6=$chk7=$chk8=$chk9=$chk10="";
						$sel_car_agr = explode('|', $car_agr); 
						$x=count($sel_car_agr);
						for ($i=0; $i <$x ; $i++) { 
							if ($sel_car_agr[$i]=="Chantaje económico") {$chk1='checked';}
							if ($sel_car_agr[$i]=="Persecución y acoso") {$chk2='checked';}
							if ($sel_car_agr[$i]=="Maltrato físico") {$chk3='checked';}
							if ($sel_car_agr[$i]=="Maltrato psicológico") {$chk4='checked';}
							if ($sel_car_agr[$i]=="Amenazas de muerte") {$chk5='checked';}
							if ($sel_car_agr[$i]=="Expulsión del hogar") {$chk6='checked';}
							if ($sel_car_agr[$i]=="Chantaje emocional") {$chk7='checked';}
							if ($sel_car_agr[$i]=="Llamadas telefónicas amenazantes") {$chk8='checked';}
							if ($sel_car_agr[$i]=="Menosprecio en público o en privado") {$chk9='checked';}
							if ($sel_car_agr[$i]=="Amenazas relacionadas con la custodia de los menores") {$chk10='checked';}
						}
					echo "
							<div class='span3'>
								<label class='checkbox'><input type='checkbox' name='car_agr[]' ".$chk1." value='Chantaje económico'>Chantaje econ&oacute;mico</label>
								<label class='checkbox'><input type='checkbox' name='car_agr[]' ".$chk2." value='Persecución y acoso'>Persecuci&oacute;n y acoso</label>
								<label class='checkbox'><input type='checkbox' name='car_agr[]' ".$chk3." value='Maltrato físico'>Maltrato F&iacute;sico</label>
								<label class='checkbox'><input type='checkbox' name='car_agr[]' ".$chk4." value='Maltrato psicológico'>Maltrato psicol&oacute;gico</label>
								<label class='checkbox'><input type='checkbox' name='car_agr[]' ".$chk5." value='Amenazas de muerte'>Amenazas de muerte</label>
								<label class='checkbox'><input type='checkbox' name='car_agr[]' ".$chk6." value='Expulsión del hogar'>Expulsi&oacute;n del hogar</label>
							</div>
							<div class='span3'>
								<label class='checkbox'><input type='checkbox' name='car_agr[]' ".$chk7." value='Chantaje emocional'>Chantaje emocional</label>
								<label class='checkbox'><input type='checkbox' name='car_agr[]' ".$chk8." value='Llamadas telefónicas amenazantes'>Llamadas telef&oacute;nicas amenazantes</label>
								<label class='checkbox'><input type='checkbox' name='car_agr[]' ".$chk9." value='Menosprecio en público o en privado'>Menosprecio en p&uacute;blico o en privado</label>
								<label class='checkbox'><input type='checkbox' name='car_agr[]' ".$chk10." value='Amenazas relacionadas con la custodia de los menores'>Amenazas relacionadas con la custodia de los menores</label>
							</div>
						</div>
					</div>

					<div class='control-group'>
						<label class='control-label'>Se han dado rupturas anteriores</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($rup_ant=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='rup_ant' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='rup_ant' value='f' ".$chk2.">No</label>
						</div>
					</div>

					<div class='control-group'>
						<label class='control-label'>Duraci&oacute;n del maltrato</label>
						<div class='controls'>
							<input type='text' name='dur_mal' class='span3' placeholder='Cuántos meses o años' value='".$dur_mal."'>
						</div>
					</div>

					<div class='control-group'>
						<label class='control-label'>La decisi&oacute;n de abandonar el hogar la ha tomado</label>
						<div class='controls'>";
						$chk1=$chk2=$chk3="";
						$sel_dec_aba = explode('|', $dec_aba_hog); 
						$x=count($sel_dec_aba);
						for ($i=0; $i <$x ; $i++) { 
							if ($sel_dec_aba[$i]=="Usted sola") {$chk1='checked';}
							if ($sel_dec_aba[$i]=="Apoyada por familiares") {$chk2='checked';}
							if ($sel_dec_aba[$i]=="Apoyada por amigos") {$chk3='checked';}
						}
					echo "
							<label class='checkbox inline'><input type='checkbox' name='dec_aba_hog[]' ".$chk1." value='Usted sola'>Usted sola</label>
							<label class='checkbox inline'><input type='checkbox' name='dec_aba_hog[]' ".$chk2." value='Apoyada por familiares'>Apoyada por familiares</label>
							<label class='checkbox inline'><input type='checkbox' name='dec_aba_hog[]' ".$chk3." value='Apoyada por amigos'>Apoyada por amigos</label>
						</div>
					</div>
					
					<div class='control-group'>
						<label class='control-label' for=''>Duraci&oacute;n</label>
						<div class='controls'>
							<input type='text' name='dur_aba' placeholder='Hace cuánto tiempo se separó' value='".$dur_aba."'>
						</div>
					</div>

					<div class='control-group'>
						<label class='control-label' for=''>Ha habido amenaza de ruptura</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($ame_rup=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='ame_rup' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='ame_rup' value='f' ".$chk2.">No</label>
						</div>
					</div>

					<div class='control-group'>
						<label class='control-label'>Respuesta del agresor ante amenaza de ruptura</label>
						<div class='controls'>";
						$chk1=$chk2=$chk3=$chk4=$chk5=$chk6=$chk7=$chk8=$chk9="";
						$sel_res_ame = explode('|', $res_ame_rup); 
						$x=count($sel_res_ame);
						for ($i=0; $i <$x ; $i++) { 
							if ($sel_res_ame[$i]=="Agresiones") {$chk1='checked';}
							if ($sel_res_ame[$i]=="Acoso") {$chk2='checked';}
							if ($sel_res_ame[$i]=="Persecuciones") {$chk3='checked';}
							if ($sel_res_ame[$i]=="Intento de suicidios") {$chk4='checked';}
							if ($sel_res_ame[$i]=="Suicidios") {$chk5='checked';}
							if ($sel_res_ame[$i]=="Amenaza con abandono") {$chk6='checked';}
							if ($sel_res_ame[$i]=="Deseos de abandono el mismo") {$chk7='checked';}
							if ($sel_res_ame[$i]=="Promesas de cambio") {$chk8='checked';}
							if ($sel_res_ame[$i]=="Amenaza relacionada con los menores (custodia)") {$chk9='checked';}
						}
					echo "
							<div class='span3'>
								<label class='checkbox '><input type='checkbox' name='res_ame_rup[]' ".$chk1." value='Agresiones'>Agresiones</label>
								<label class='checkbox '><input type='checkbox' name='res_ame_rup[]' ".$chk2." value='Acoso'>Acoso</label>
								<label class='checkbox '><input type='checkbox' name='res_ame_rup[]' ".$chk3." value='Persecuciones'>Persecuciones</label>
								<label class='checkbox '><input type='checkbox' name='res_ame_rup[]' ".$chk4." value='Intento de suicidios'>Intento de suicidios</label>
								<label class='checkbox '><input type='checkbox' name='res_ame_rup[]' ".$chk5." value='Suicidios'>Suicidios</label>
							</div>
							<div class='span3'>
								<label class='checkbox '><input type='checkbox' name='res_ame_rup[]' ".$chk6." value='Amenaza con abandono'>Amenaza con abandono</label>
								<label class='checkbox '><input type='checkbox' name='res_ame_rup[]' ".$chk7." value='Deseos de abandono el mismo'>Deseos de abandono el mismo</label>
								<label class='checkbox '><input type='checkbox' name='res_ame_rup[]' ".$chk8." value='Promesas de cambio'>Promesas de cambio</label>
								<label class='checkbox '><input type='checkbox' name='res_ame_rup[]' ".$chk9." value='Amenaza relacionada con los menores (custodia)'>Amenaza relacionada con los menores (custodia)</label>
							</div>
						</div>
					</div>


					<div class='control-group'>
						<label class='control-label'>El agresor maltrata a los menores</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($mal_men=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='mal_men' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='mal_men' value='f' ".$chk2.">No</label>
						</div>
					</div>

					<div class='control-group'>
						<label class='control-label' >Tipo de maltrato</label>
						<div class='controls'>
							<textarea class='input-xlarge' name='tip_mal_men' placeholder='Describa el tipo de maltrato hacia los menores'>".$tip_mal_men."</textarea>
						</div>
					</div>
					<p class='pull-right'><a data-toggle='tab' href='#famExt'>Siguiente</a></p>
				</div>

				<div class='tab-pane' id='famExt'>
					<div class='control-group'>
						<label class='control-label'>Relaciones con la familia extensa</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($rel_fam_ext=='de la propia mujer') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='rel_fam_ext' value='de la propia mujer' ".$chk1.">de la propia mujer</label>
							<label class='radio inline'><input type='radio' name='rel_fam_ext' value='de la familia del agresor' ".$chk2.">de la familia del agresor</label>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Apoyo Econ&oacute;mico</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($apo_efe_fam=='de la familia de la mujer') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='apo_efe_fam' value='de la familia de la mujer' ".$chk1.">de la familia de la mujer</label>
							<label class='radio inline'><input type='radio' name='apo_efe_fam' value='de la familia del agresor' ".$chk2.">de la familia del agresor</label>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label' for=''>Apoyo Afectivo</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($apo_afe_fam=='de la familia de la mujer') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='apo_afe_fam' value='de la familia de la mujer' ".$chk1.">de la familia de la mujer</label>
							<label class='radio inline'><input type='radio' name='apo_afe_fam' value='de la familia del agresor' ".$chk2.">de la familia del agresor</label>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label' for=''>Apoyo en la labor de crianza de los hijos</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($apo_cri=='de la familia de la mujer') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='apo_cri' value='de la familia de la mujer' ".$chk1.">de la familia de la mujer</label>
							<label class='radio inline'><input type='radio' name='apo_cri' value='de la familia del agresor' ".$chk2.">de la familia del agresor</label>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label' for=''>Su familia condiciona el apoyo de la ruptura con el agresor</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($con_apo=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='con_apo' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='con_apo' value='f' ".$chk2.">No</label>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label' for=''>Mantiene alguna relaci&oacute;n con el agresor</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($man_rel_agr=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='man_rel_agr' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='man_rel_agr' value='f' ".$chk2.">No</label>
						</div>
					</div>
					<p class='pull-right'><a data-toggle='tab' href='#relSoc'>Siguiente</a></p>
				</div>

				<div class='tab-pane' id='relSoc'>
					<div class='control-group'>
						<label class='control-label'>Apoyo afectivo</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($apo_afe_ami=='de amigos propios') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='apo_afe_ami' value='de amigos propios' ".$chk1.">de amigos propios</label>
							<label class='radio inline'><input type='radio' name='apo_afe_ami' value='de amigos del agresor' ".$chk2.">de amigos del agresor</label>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label' for=''>Apoyo econ&oacute;mico</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($apo_efe_ami=='de amigos propios') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='apo_efe_ami' value='de amigos propios' ".$chk1.">de amigos propios</label>
							<label class='radio inline'><input type='radio' name='apo_efe_ami' value='de amigos del agresor' ".$chk2.">de amigos del agresor</label>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label' for=''>Su entorno conoce las agresiones</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($ent_con_agr=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='ent_con_agr' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='ent_con_agr' value='f' ".$chk2.">No</label>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label' for=''>Su entorno le ofrece apoyo si rompe con el agresor</label>
						<div class='controls'>";
						$chk1=$chk2="";
						if ($ent_apo_agr=='t') {
							$chk1="checked";
						}else{
							$chk2="checked";
						}
					echo "
							<label class='radio inline'><input type='radio' name='ent_apo_agr' value='t' ".$chk1.">Si</label>
							<label class='radio inline'><input type='radio' name='ent_apo_agr' value='f' ".$chk2.">No</label>
						</div>
					</div>
					<p class='pull-right'><a data-toggle='tab' href='#datAgr'>Siguiente</a></p>
				</div>

				<div class='tab-pane' id='datAgr'>
					<div class='control-group'>
						<label class='control-label'>Nombre</label>
						<div class='controls'><input type='text' class='span4' name='nom_agr' placeholder='Nombre completo del presunto agresor' value='".$nom_agr."'></div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Edad</label>
						<div class='controls'>
							<input type='number' name='eda_agr' class='input-mini' placeholder='#' value='".$eda_agr."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Lugar de nacimiento</label>
						<div class='controls'>
							<textarea type='text' name='lug_nac_agr' class='input-xlarge' placeholder='Lugar de nacimiento del presunto agresor'>".$lug_nac_agr."</textarea>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Años de residencia (si es extranjero)</label>
						<div class='controls'>
							<input type='number' name='ano_res_agr' placeholder='#' class='input-mini' value='".$ano_res_agr."'>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Nivel Educativo</label>
						<div class='controls'>
							<select name='niv_edu_agr'>";
							$s1=$s2=$s3=$s4=$s5=$s6="";
							if ($niv_edu_agr=="Sin estudios") {$s1="selected";}
							if ($niv_edu_agr=="Primarios (certificados)") {$s2="selected";}
							if ($niv_edu_agr=="Primarios (graduado)") {$s3="selected";}
							if ($niv_edu_agr=="Bachiller o equivalente") {$s4="selected";}
							if ($niv_edu_agr=="Superiores") {$s5="selected";}
							if ($niv_edu_agr=="Doctorado") {$s6="selected";}
							echo "
								<option value='Sin estudios' ".$s1.">Sin estudios</option>
								<option value='Primarios (certificados)' ".$s2.">Primarios (certificados)</option>
								<option value='Primarios (graduado)' ".$s3.">Primarios (graduado)</option>
								<option value='Bachiller o equivalente' ".$s4.">Bachiller o equivalente</option>
								<option value='Superiores' ".$s5.">Superiores</option>
								<option value='Doctorado' ".$s6.">Doctorado</option>					
							</select>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Trabajo del presunto agresor</label>
						<div class='controls'>
							<textarea class='input-xlarge' name='tra_agr' placeholder='Describa el o los trabajos del presunto agresor'>".$tra_agr."</textarea>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Antecedentes penales</label>
						<div class='controls'>
							<textarea class='input-xlarge' name='ant_pen_agr' placeholder='Describa si el presunto agresor tiene antecedentes'>".$ant_pen_agr."</textarea>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>Antecedentes de violencia con otras personas</label>
						<div class='controls'>
							<textarea class='input-xlarge' name='ant_vio_otr' placeholder='Describa el tipo de ataques que ha hecho el presunto agresor a otras personas'>".$ant_vio_otr."</textarea>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label'>A quienes ha abusado</label>
						<div class='controls'>";
						$chk1=$chk2=$chk3=$chk4=$chk5=$chk6="";
						$sel_abu_qui = explode('|', $abu_qui); 
						$x=count($sel_abu_qui);
						for ($i=0; $i <$x ; $i++) { 
							if ($sel_abu_qui[$i]=="A otra compañera") {$chk1='checked';}
							if ($sel_abu_qui[$i]=="A los hijos") {$chk2='checked';}
							if ($sel_abu_qui[$i]=="A sus propios padres") {$chk3='checked';}
							if ($sel_abu_qui[$i]=="A sus hermanos") {$chk4='checked';}
							if ($sel_abu_qui[$i]=="A empleados") {$chk5='checked';}
							if ($sel_abu_qui[$i]=="A desconocidos") {$chk6='checked';}
						}
					echo "
							<div class='span3'>
								<label class='checkbox'><input type='checkbox' name='abu_qui[]' ".$chk1." value='A otra compañera'>A otra compañera</label>
								<label class='checkbox'><input type='checkbox' name='abu_qui[]' ".$chk2." value='A los hijos'>A los hijos</label>
								<label class='checkbox'><input type='checkbox' name='abu_qui[]' ".$chk3." value='A sus propios padres'>A sus propios padres</label>
							</div>
							<div class='span3'>
								<label class='checkbox'><input type='checkbox' name='abu_qui[]' ".$chk4." value='A sus hermanos'>A sus hermanos</label>
								<label class='checkbox'><input type='checkbox' name='abu_qui[]' ".$chk5." value='A empleados'>A empleados</label>
								<label class='checkbox'><input type='checkbox' name='abu_qui[]' ".$chk6." value='A desconocidos'>A desconocidos</label>
							</div>
						</div>
					</div>
					<div class='control-group'>
						<label class='control-label' for=''>Presunto agresor manifiesta</label>
						<div class='controls'>";
						$chk1=$chk2=$chk3=$chk4=$chk5=$chk6=$chk7=$chk8=$chk9=$chk10=$chk11="";
						$sel_pro = explode('|', $prob_agr); 
						$x=count($sel_pro);
						for ($i=0; $i <$x ; $i++) { 
							if ($sel_pro[$i]=="Falta de trabajo") {$chk1='checked';}
							if ($sel_pro[$i]=="Dependencia económica") {$chk2='checked';}
							if ($sel_pro[$i]=="Vivienda en condiciones precarias") {$chk3='checked';}
							if ($sel_pro[$i]=="Aislamiento social") {$chk4='checked';}
							if ($sel_pro[$i]=="Alcoholismo") {$chk5='checked';}
							if ($sel_pro[$i]=="Otra toxicomania") {$chk6='checked';}
							if ($sel_pro[$i]=="Ludopatia") {$chk7='checked';}
							if ($sel_pro[$i]=="adicción al ordenador como chatear") {$chk8='checked';}
							if ($sel_pro[$i]=="Problemas emocionales o conductuales como depreción") {$chk9='checked';}
							if ($sel_pro[$i]=="Minusvalía física") {$chk10='checked';}
							if ($sel_pro[$i]=="Minusvalía psíquica") {$chk11='checked';}
							if ($sel_pro[$i]=="Minusvalía sensorial") {$chk12='checked';}
						}
					echo "
							<div class='span3'>
								<label class='checkbox'><input type='checkbox' name='prob_agr[]' ".$chk1." value='Falta de trabajo'>Falta de trabajo</label>
								<label class='checkbox'><input type='checkbox' name='prob_agr[]' ".$chk2." value='Dependencia económica'>Dependencia económica</label>
								<label class='checkbox'><input type='checkbox' name='prob_agr[]' ".$chk3." value='Vivienda en condiciones precarias'>Vivienda en condiciones precarias</label>
								<label class='checkbox'><input type='checkbox' name='prob_agr[]' ".$chk4." value='Aislamiento social'>Aislamiento social</label>
								<label class='checkbox'><input type='checkbox' name='prob_agr[]' ".$chk5." value='Alcoholismo'>Alcoholismo</label>
								<label class='checkbox'><input type='checkbox' name='prob_agr[]' ".$chk6." value='Otra toximanía'>Otra toximanía</label>
								<label class='checkbox'><input type='checkbox' name='prob_agr[]' ".$chk7." value='Ludopatia'>Ludopatia</label>
							</div>
							<div class='span3'>
								
								<label class='checkbox'><input type='checkbox' name='prob_agr[]' ".$chk8." value='Adicción al ordenador como chatear'>Adicción al ordenador como chatear</label>
								<label class='checkbox'><input type='checkbox' name='prob_agr[]' ".$chk9." value='Problemas emocionales o conductuales como depreción'>Problemas emocionales o conductuales como depreción</label>
								<label class='checkbox'><input type='checkbox' name='prob_agr[]' ".$chk10." value='Transtornos de personalidad'>Transtornos de personalidad</label>
								<label class='checkbox'><input type='checkbox' name='prob_agr[]' ".$chk11." value='Minusvalía Física'>Minusvalía Física</label>
								<label class='checkbox'><input type='checkbox' name='prob_agr[]' ".$chk12." value='Minusvalía Psíquica'>Minusvalía Psíquica</label>
								<label class='checkbox'><input type='checkbox' name='prob_agr[]' ".$chk13." value='Minusvalía Sensorial'>Minusvalía Sensorial</label>
							</div>
						</div>
					</div>
					<p class='pull-right'><a data-toggle='tab' href='#fin'>Siguiente</a></p>
				</div>
				<div class='tab-pane' id='fin'>
					<p>Ha terminado de rellenar el formulario, pulse uno de los siguientes botones</p>
					<p>Datos caputrados según fecha: <input type='date'></p>
					<div class='form-actions' style='background-color: transparent;'>
						<button type='submit' class='btn'><i class='icon-refresh'></i> Actualizar</button>
						<button type='clean' class='btn'><i class='icon-trash'></i> Limpiar</button>
						<button class='btn'><i class='icon-remove'></i> Cancelar</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</body>

</html>
";
?>