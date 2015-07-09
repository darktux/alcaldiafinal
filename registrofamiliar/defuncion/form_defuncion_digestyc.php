<?php
	require_once("../php/var.php");
	if(isset($_GET[num_lib]) and isset($_GET[num_par])){
		require_once("../../php/conexion.php");
		$conexion = conectar();

		$consulta = "SELECT * FROM rf_defuncion_partida WHERE (num_lib, num_par) = ($_GET[num_lib], $_GET[num_par])";
		$resultado = pg_query($consulta);
		
		$registro = pg_fetch_array($resultado);
	
		foreach($registro as $clave => $valor){
			if(is_string($x = $clave)){
				$$clave = $valor;
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro de Defunciones DIGESTYC</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/retoques.css">
	<script type="text/javascript" src="../../js/jquery.min-1.7.1-google.js" ></script>
	<script type="text/javascript" src="../../js/bootstrap-2.0.2.js" ></script>
	<script type="text/javascript" src="../js/deptos_mun.js"></script>
</head>
<body>

	<div id="mensajes">
		<!-- Area de mensajes -->
	</div>
	
	<!-- Comienza Formulario -->
		<form class="well form-horizontal" name="form_defuncion_digestyc" id="form_defuncion_digestyc" action="" method="POST">
			<fieldset>
				<legend>Registro de Defunciones DIGESTYC</legend>
				
				<input type="hidden" name="accion" id="accion" value="guardar-defuncion-digestyc">
				
				<div class="tabbable tabs-left">
					<ul class="nav nav-tabs">
						<li id="tab1" class="active"><a href="#1"  data-toggle="tab">Datos generales</a></li>
						<li id="tab2"					 ><a href="#2"  data-toggle="tab">Menor de 1 año</a></li>
						<li id="tab3"					 ><a href="#3"  data-toggle="tab">Menor de 4 semanas</a></li>
						<li id="tab4"					 ><a href="#4"  data-toggle="tab">Datos de la muerte</a></li>
					</ul>
				
				
				<div class="tab-content">
				
				<div id="1" class="tab-pane active">
				
<!-- Comienzan datos del registro -->
			<div class="row-fluid">
			<div class="row-fluid">
				<div class="control-group span6">
					<label class="control-label" for="num_lib">Libro No.</label>
					<div class="controls">
						<input type="text" class="input-mini" name="num_lib_disabled" id="num_lib_disabled" value="<?php echo $num_lib; ?>">
						<input type="hidden" name="num_lib" id="num_lib" value="<?php echo $num_lib; ?>">
					</div>
				</div>
				
				<div class="control-group span6">
					<label class="control-label" for="num_par">Partida No.</label>
					<div class="controls">
						<input type="text" class="input-mini" name="num_par_disabled" id="num_par_disabled" value="<?php echo $num_par; ?>">
						<input type="hidden" name="num_par" id="num_par" value="<?php echo $num_par; ?>">
					</div>
				</div>
			</div>
			</div>
<!-- Terminan Datos del Registro -->			

<!-- Datos Generales -->
				<div class="control-group">
					<label class="control-label" for="nom">Nombres y apellidos</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="nom" id="nom" value="<?php echo $nom . ' ' . $ape1 . ' ' . $ape2; ?>">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="dui">DUI</label>	
					<div class="controls">
						<input type="text" class="input-medium" name="dui" id="dui" value="<?php echo $dui; ?>">
					</div>				
				</div>

				<div class="control-group">
					<label class="control-label" for="fec_def">Fecha de defunci&oacute;n</label>
					<div class="controls">
						<input type="date" name="fec_def" id="fec_def" value="<?php echo $fec_def; ?>">
					</div>
				</div>				
				
				<div class="control-group">
					<label class="control-label" for="hor_min">Hora de defunci&oacute;n</label>
					<div class="controls">
						<input type="time" name="hor_min" id="hor_min" value="<?php echo $hor_min; ?>">
					</div>
				</div>
			
				<div class="control-group">
					<label class="control-label" for="dep_def">Departamento de defunci&oacute;n</label>
					<div class="controls">
						<select name="dep_def" id="dep_def">
							<option value=""><?php echo $dep_def; ?></option>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="mun_def">Municipio de defunci&oacute;n</label>
					<div class="controls">
						<select id="mun_def" name="mun_def">
							<option value=""><?php echo $mun_def; ?></option>
						</select>
					</div>
				</div>
			<!-- </div> -->
				<div class="control-group">
					<label class="control-label" for="canlug_def">Cant&oacute;n de defunci&oacute;n</label>	
					<div class="controls">
						<input type="text" class="input-large"  name="canlug_def" id="canlug_def" value="<?php echo $canlug_def; ?>">
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="loc_def">Local de defunci&oacute;n</label>	
					<div class="controls">
						<select id="loc_def" name="loc_def">
							<option value=""><?php echo $loc_def; ?></option>
						</select>
						<!-- <input type="text" class="input-xlarge"  name="loc_def" id="loc_def" placeholder="Local de Defunci&oacute;n">
					 	-->
					 </div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="sex">Sexo</label>
					<div class="controls">
						<label class="radio inline">
						<input type="radio" name="sex" id="sex_mas" value="M" <?php if($sex=='M') echo "checked=''"; ?>>
						Masculino
						</label>
						<label class="radio inline">
						<input type="radio" name="sex" id="sex_fem" value="F" <?php if($sex=='F') echo "checked''"; ?>>
						Femenino
						</label>
						<label class="radio inline">
						<input type="radio" name="sex" id="sex_ind" <?php if($sex=='I') echo "checked=''"; ?>>
						Indeterminado
						</label>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="est_fam">Estado familiar</label>
					<div class="controls">
						<select id="est_fam">
						<option id="soltero"	value="" ><?php echo $est_fam; ?></option>
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="eda">Edad del difunto (años)</label>
					<div class="controls">
						<input type="text" class="input-mini" name="eda" id="eda" value="<?php echo $eda; ?>">
					</div>
				</div>
<!-- Terminan Datos Generales -->
				
				</div>
				<div id="2" class="tab-pane">
				
<!-- Datos para menores de un año -->

				<div class="control-group">
					<label class="control-label" for="men1">El difunto es menor de un año</label>
					<div class="controls">
						<label class="radio">
							<input type="radio" name="men1" id="mem1_si" value="si" onclick="activar()">
							Si
						</label>
						<label>
							<input type="radio" name="men1" id="men1_si" value="no" checked="" onclick="desactivar()">
							No
						</label>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="eda_inf">Edad del infante</label>
					<div class="controls">
						<input type="number" min="0" max="11" class="input-mini" name="mes_eda"  id="mes_eda"> &nbsp;Meses<br><br>
						<input type="number" min="0" max="30" class="input-mini" name="dia_eda"  id="dia_eda"> &nbsp;Días <br><br>
						<input type="time" class="input-medium" name="hor_min_eda"  id="hor_min_eda"> &nbsp;Horas y minutos<br><br>
					</div> 
				</div>
				
				<div class="control-group">
					<label class="control-label" for="mad_cas">Madre casada</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="mad_cas" id="mad_cas_si" value="Si" checked="">
							Si
						</label>
						<label class="radio inline">
							<input type="radio" name="mad_cas" id="mad_cas_no" value="No">
							NO
						</label>
						<label class="radio inline">
							<input type="radio" name="mad_cas" id="mad_cas_nos" value="No sabe">
							No sabe
						</label>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="tip_par">Tipo de parto</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="tip_par" id="tip_par_vag" value="Vaginal" checked="">
							Vaginal
						</label>
						<label class="radio inline">
							<input type="radio" name="tip_par" id="tip_par_ces" value="Cesárea">
							Cesárea
						</label>
						<label class="radio inline">
							<input type="radio" name="tip_par" id="tip_par_nos" value="No sabe">
							No sabe
						</label>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="eda_mad">Edad de la madre (años)</label>
					<div class="controls">
						<input type="number" min="6" max="50" class="input-mini"  name="eda_mad" id="eda_mad">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="dur_emb">Duración del embarazo (dias)</label>
					<div class="controls">
						<input type="number" min="180" max="300" class="input-mini" name="dur_emb" id="dur_emb">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="sem_ges">Semanas de gestación</label>
					<div class="controls">
						<input type="number" min="25" max="43" name="sem_ges" id="sem_ges" class="input-mini">
					</div>
				</div>
				</div>
				
				<!-- Datos para menores de 4 semanas -->
				
				<div id="3" class="tab-pane">
				
				<div class="control-group">
					<label class="control-label" for="men2">El difunto es menor de un año</label>
					<div class="controls">
						<label class="radio">
							<input type="radio" name="men2" id="men2_si" value="si" onclick="activar2()">
							Si
						</label>
						<label>
							<input type="radio" name="men2" id="men2_no" value="no" checked="" onclick="desactivar2()">
							No
						</label>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="pes">Peso al nacer (gramos)</label>
					<div class="controls">
						<input type="number" min="50" max="1000" class="input-mini"  name="pes" id="pes">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="tal">Talla al nacer (centimetros)</label>
					<div class="controls">
						<input type="number" min="5" max="50" class="input-mini" name="tal" id="tal">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="lug_nac">Lugar donde nació el niño</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="lug_nac" id="lug_nac_hos" value="Hospital" checked="">
							Hospital
						</label>
						<label class="radio inline">
							<input type="radio" name="lug_nac" id="lug_nac_ext" value="Extrahospitalario">
							Extrahospitalario
						</label>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="num_emb">Número de embarazos de la madre</label>
					<div class="controls">
						<input type="number" min="1" max="40" class="input-mini" name="num_emb" id="num_emb">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="num_abo">Número de abortos de la madre</label>
					<div class="controls">
						<input type="number" min="0" max="40" class="input-mini" name="num_abo" id="num_abo">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="num_nac_mue">Número de nacidos muertos de la madre</label>
					<div class="controls">
						<input type="number" min="0" max="40" class="input-mini" name="num_nac_mue" id="num_nac_mue">
					</div>
				</div>
				
				</div>
				<!-- Terminan datos para menores de 4 semanas -->
				
				<!-- Datos de la muerte -->
				<div id="4" class="tab-pane">
					
				<div class="control-group">
					<label class="control-label" for="ocu">Ocupaci&oacute;n</label>
					<div class="controls">
						<input type="text" class="input-large" name="ocu" id="ocu" value="<?php echo $ocu; ?>">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="jub_pen">Jubilado o pensionado</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="jub_pen" id="Si" value="S">
							Si
						</label>
						<label class="radio inline">
							<input type="radio" name="jub_pen" id="No" value="N" checked="">
							No
						</label>
						<label class="radio inline">
							<input type="radio" name="jub_pen" id="Ignorado" value="I">
							Ignorado
						</label>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="dep_res">Departamento de residencia </label>
					<div class="controls">
						<select name="dep_res" name="dep_res" id="dep_res">
						<option value=""><?php echo $dep_res; ?></option>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="mun_res">Municipio de residencia</label>
					<div class="controls">
						<select id="mun_res" name="mun_res">
						<option value=""><?php echo $mun_res; ?></option>
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="canlug_res">Cant&oacute;n de residencia</label>	
					<div class="controls">
						<input type="text" class="input-large"  name="canlug_res" id="canlug_res" value="<?php echo $canlug_res ?>">
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="are">Area de residencia</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="are" id="urbana" value="U">
							Urbana
						</label>
						<label class="radio inline">
							<input type="radio" name="are" id="rural" value="R" checked="">
							Rural
						</label>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="nom_mad">Nombres y apellidos de la madre</label>
					<div class="controls">
						<input type="text" class="input-xlarge"  name="nom_mad" id="nom_mad" value="<?php echo $nom_mad; ?>">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="nom_pad">Nombres y apellidos del padre</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="nom_pad" id="nom_pad" value="<?php echo $nom_pad; ?>">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="cau_def">Causa de defunci&oacute;n</label>
					<div class="controls">
						<input type="text" class="input-xlarge"  name="cau_def" id="cau_def" value="<?php echo $cau_def; ?>">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="otr_est">Otros estados patol&oacute;gicos</label>
					<div class="controls">
						<input type="text" class="input-xlarge"  name="otr_est" id="otr_est">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="fal_emb">Muerte durante embarazo o parto</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="fal_emb" id="Embarazo" value="Embarazo">
							Embarazo
						</label>
						<label class="radio inline">
							<input type="radio" name="fal_emb" id="Parto" value="Parto">
							Parto
						</label>
						<label class="radio inline">
							<input type="radio" name="fal_emb" id="Postparto" value="Postparto">
							Postparto
						</label>
						<label class="radio inline">
							<input type="radio" name="fal_emb" id="Puerperio" value="Puerperio">
							Puerperio
						</label>
						<label class="radio inline">
							<input type="radio" name="fal_emb" id="Ninguno" value="Ninguno" checked="">
							Ninguno
						</label>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="mue_acc">Muerte accidental o violenta</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="mue_acc" id="Accidente" value="Accidente">
							Accidente
						</label>
						<label class="radio inline">
							<input type="radio" name="mue_acc" id="Suicidio" value="Suicidio">
							Suicidio
						</label>
						<label class="radio inline">
							<input type="radio" name="mue_acc" id="Homicidio" value="Homicidio">
							Homicidio
						</label>
						<label class="radio inline">
							<input type="radio" name="mue_acc" id="Ignorado" value="Ignorado" checked="">
							Ignorado
						</label>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="cau_def">Causa de la muerte</label>
					<div class="controls">
						<select name="cau_def" 	id="cau_def">
						<option id="" 								value=""></option>
						<option id="armadefuego" 					value="Arma de Fuego">Arma de Fuego</option>
						<option id="armablanca" 					value="Arma blanca">Arma blanca</option>
						<option id="caida" 							value="Caida">Caida</option>
						<option id="ahogamiento" 					value="Ahogamiento">Ahogamiento</option>
						<option id="accidentedetrancito" 			value="Accidente de Tráncito">Accidente de Tráncito</option>
						<option id="envenenamiento" 				value="Envenenamiento">Envenenamiento</option>
						<option id="artefactoexplosivo" 			value="Artefacto Explosivo">Artefacto Explosivo</option>
						<option id="ahorcamientooestrangulamiento"	value="Ahorcamiento o Estrangulamiento">Ahorcamiento o estrangulamiento</option>
						<option id="porobjetocontundente" 			value="Por objeto Contundente">Por objeto Contundente</option>
						<option id="otro"			 				value="Otro">Otro</option>
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="asi_med">Tuvo asistencia médica durante su enfermedad</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="asi_med" id="asi_med_si" value="S" <?php if($asi_med == true) echo "checked"; ?> >
							Si
						</label>
						<label class="radio inline">
							<input type="radio" name="asi_med" id="asi_med_no" value="N" <?php if($asi_med == false) echo "checked"; ?>>
							NO
						</label>
						<label class="radio inline">
							<input type="radio" name="asi_med" id="asi_med_ignorado" value="I">
							Ignorado
						</label>
					</div>
				</div>

				
				<div class="control-group">
					<label class="control-label" for="cer_med">Defunción certificada por médico</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="cer_med" id="Si" value="true" checked="">
							Si
						</label>
						<label class="radio inline">
							<input type="radio" name="cer_med" id="No" value="false">
							NO
						</label>
						<label class="radio inline">
							<input type="radio" name="cer_med" id="Ignorado" value="">
							Ignorado
						</label>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="cer_for">Defunción certificada por médico forence</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="cer_for" id="Si" value="true">
							Si
						</label>
						<label class="radio inline">
							<input type="radio" name="cer_for" id="No" value="false" checked="">
							NO
						</label>
						<label class="radio inline">
							<input type="radio" name="cer_for" id="Ignorado" value="">
							Ignorado
						</label>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">Nombre del registrador</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="nom_reg" id="nom_reg" value="<?php echo $variables['nom_jef_reg_fam']; ?>">
					</div>
				</div>

				
				<div class="form-actions" style="background-color:transparent;">
					<button type="button" class="btn" name="btn-guardar" id="btn-guardar"><img src="../../img/icon-save.png" height="14" width="14"> Guardar</button>
					<button type="reset" class="btn"><i class="icon-trash"></i> Limpiar</button>
					<button type="button" class="btn" onclick="parent.location='../index_registrofamiliar.php'"><i class="icon-remove"></i> Cancelar</button>
				</div>
				</div>
				<!-- Terminan datos de la muerte -->
				
				</div>
<!-- fin del tab-content -->
				
				</div>
<!-- fin del tabbable -->
			
			</fieldset>
		</form>
<!-- Termina formulario -->

<!-- Inicio JavaScript -->
<script type="text/javascript" >
	$(function(){
 			$("#btn-guardar").click(function(){ // #btn_guardar es el boton encargado de llamar al script php
 				var url = "proc_defuncion_digestyc.php"; // proc_persona.php El script a dónde se realizará la petición.
   			if(confirm("¿Esta seguro de querer guardar estos datos?")){
   				$.ajax({
          			type: "POST",
           			url: url,
           			data: $("#form_defuncion_digestyc").serialize(), // Adjuntar los campos del formulario enviado.
           			success: function(data){
               		$("#mensajes").html(data); // Mostrar la respuestas del script PHP.
          				}
        			});
        		 }
   			return false; // Evitar ejecutar el submit del formulario.
 			});
		});

	$(function(){
		$("#num_lib_disabled").attr({disabled : true});
		$("#num_par_disabled").attr({disabled : true});
		$("#nom").attr({disabled : true});
		$("#dui").attr({disabled : true});
		$("#fec_def").attr({disabled : true});
		$("#hor_min").attr({disabled : true});
		$("#dep_def").attr({disabled : true});
		$("#mun_def").attr({disabled : true});
		$("#canlug_def").attr({disabled : true});
		$("#loc_def").attr({disabled : true});
		$("#sex_mas").attr({disabled : true});
		$("#sex_fem").attr({disabled : true});
		$("#sex_ind").attr({disabled : true});
		$("#est_fam").attr({disabled : true});
		$("#eda").attr({disabled : true});

		$("#ocu").attr({disabled : true});
		$("#dep_res").attr({disabled : true});
		$("#mun_res").attr({disabled : true});
		$("#canlug_res").attr({disabled : true});
		$("#nom_mad").attr({disabled : true});
		$("#nom_pad").attr({disabled : true});
		$("#cau_def").attr({disabled : true});
		$("#asi_med_si").attr({disabled : true});
		$("#asi_med_no").attr({disabled : true});
		$("#asi_med_ignorado").attr({disabled : true});
		
		$("#mes_eda").attr({disabled : true});
		$("#dia_eda").attr({disabled : true});
		$("#hor_min_eda").attr({disabled : true});
		$("#mad_cas_si").attr({disabled : true});
		$("#mad_cas_no").attr({disabled : true});
		$("#mad_cas_nos").attr({disabled : true});
		$("#tip_par_vag").attr({disabled : true});
		$("#tip_par_ces").attr({disabled : true});
		$("#tip_par_nos").attr({disabled : true});
		$("#mad_cas").attr({disabled : true});
		$("#tip_par").attr({disabled : true});
		$("#eda_mad").attr({disabled : true});
		$("#dur_emb").attr({disabled : true});
		$("#sem_ges").attr({disabled : true});
		
		$("#pes").attr({disabled : true});
		$("#tal").attr({disabled : true});
		$("#lug_nac_hos").attr({disabled : true});
		$("#lug_nac_ext ").attr({disabled : true});
		$("#num_emb").attr({disabled : true});
		$("#num_abo").attr({disabled : true});
		$("#num_nac_mue").attr({disabled : true});
	});
	
	function activar()
	{
		$("#mes_eda").attr({disabled : false});
		$("#dia_eda").attr({disabled : false});
		$("#hor_min_eda").attr({disabled : false});
		$("#mad_cas_si").attr({disabled : false});
		$("#mad_cas_no").attr({disabled : false});
		$("#mad_cas_nos").attr({disabled : false});
		$("#tip_par_vag").attr({disabled : false});
		$("#tip_par_ces").attr({disabled : false});
		$("#tip_par_nos").attr({disabled : false});
		$("#mad_cas").attr({disabled : false});
		$("#tip_par").attr({disabled : false});
		$("#eda_mad").attr({disabled : false});
		$("#dur_emb").attr({disabled : false});
		$("#sem_ges").attr({disabled : false});
	}
	
	function desactivar()
	{
		$("#mes_eda").attr({disabled : true});
		$("#dia_eda").attr({disabled : true});
		$("#hor_min_eda").attr({disabled : true});
		$("#mad_cas_si").attr({disabled : true});
		$("#mad_cas_no").attr({disabled : true});
		$("#mad_cas_nos").attr({disabled : true});
		$("#tip_par_vag").attr({disabled : true});
		$("#tip_par_ces").attr({disabled : true});
		$("#tip_par_nos").attr({disabled : true});
		$("#mad_cas").attr({disabled : true});
		$("#tip_par").attr({disabled : true});
		$("#eda_mad").attr({disabled : true});
		$("#dur_emb").attr({disabled : true});
		$("#sem_ges").attr({disabled : true});
	}
	
	function activar2()
	{
		$("#pes").attr({disabled : false});
		$("#tal").attr({disabled : false});
		$("#lug_nac_hos").attr({disabled : false});
		$("#lug_nac_ext ").attr({disabled : false});
		$("#num_emb").attr({disabled : false});
		$("#num_abo").attr({disabled : false});
		$("#num_nac_mue").attr({disabled : false});
	}
	
	function desactivar2()
	{
		$("#pes").attr({disabled : true});
		$("#tal").attr({disabled : true});
		$("#lug_nac_hos").attr({disabled : true});
		$("#lug_nac_ext ").attr({disabled : true});
		$("#num_emb").attr({disabled : true});
		$("#num_abo").attr({disabled : true});
		$("#num_nac_mue").attr({disabled : true});
	}
	
</script>
<!-- Fin JavaScript -->

</body>
</html>