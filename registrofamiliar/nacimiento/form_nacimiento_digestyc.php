<?php
	if(isset($_GET["num_lib"]) and isset($_GET["num_par"])){
		require_once("../../php/conexion.php");
		$conexion = conectar();

		$consulta = "SELECT * FROM rf_nacimiento_partida WHERE (num_lib, num_par) = ($_GET[num_lib], $_GET[num_par])";
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
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Registro de Nacimientos DIGESTYC</title>
		<link rel="stylesheet" href="../../css/bootstrap.css">
		<link rel="stylesheet" href="../../css/retoques.css">
		<script type="text/javascript" src="../../js/jquery.min-1.7.1-google.js"></script>
		<script type="text/javascript" src="../../js/jquery.maskedinput.js"></script>
		<script type="text/javascript" src="../../js/funciones.js"></script>
		<script type="text/javascript" src="../../js/bootstrap-2.0.2.js" ></script>
	</head>
<body>

	<div id="mensajes">
		<!-- Area de mensajes -->
	</div>

	<!-- Inicia Formulario -->
		<form class="well form-horizontal" name="form_nacimiento_digestyc" id="form_nacimiento_digestyc" action="" method="POST">
			<fieldset>
				<legend>Registro de Nacimientos DIGESTYC</legend>
				
				<input type="hidden" name="accion" id="accion" value="guardar-nacimiento-digestyc">
				
			<div class="tabbable tabs-left">
				<ul class="nav nav-tabs">
				<li id="tab1" class="active">	<a href="#1" data-toggle="tab">Datos del recien nacido</a></li>
				<li id="tab2">						<a href="#2" data-toggle="tab">Datos de la madre</a></li>
				<li id="tab3">						<a href="#3" data-toggle="tab">Datos del padre</a></li>
				<li id="tab4">						<a href="#4" data-toggle="tab">Otros datos</a></li>
				</ul>
				
			<div class="tab-content">
			
			<!--Inicio del primer bloque -->
			<div class="tab-pane active" id="1">
				
				<div class="control-group">
					<label class="control-label" for="num_lib">Libro No.</label>
					<div class="controls">
						<input type="text" class="input-mini" id="num_lib_disabled" name="num_lib_disabled" value="<?php echo $num_lib; ?>" disabled>
						<input type="hidden" name="num_lib" id="num_lib" value="<?php echo $num_lib; ?>">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="num_par">Partida No.</label>
					<div class="controls">
						<input type="text" class="input-mini" id="num_par_disabled" name="num_par_disabled" value="<?php echo $num_par; ?>" disabled>
						<input type="hidden" name="num_par" id="num_par" value="<?php echo $num_par; ?>">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="nom_ase">Nombre completo del recién nacido</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="nom_ase" id="nom_ase"  value="<?php echo $nom . ' ' . $ape1 . ' ' . $ape2; ?>" disabled="true">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="loc_nac">Local de nacimiento</label>
					<div class="controls">
						<select name="loc_nac" id="loc_nac">
							<option>Hospital Nacional</option>
							<option>Unidad de Salud</option>
							<option>Hospital o clínica privada</option>
							<option>Casa de habitación</option>
							<option>Otro</option>
						</select>
						<input type="text" class="input-xlarge" name="det_loc_nac" id="det_loc_nac" placeholder="Especifique el local">
					</div>
				</div>
					
				<div class="control-group">
					<label class="control-label" for="fec_nac">Fecha de nacimiento</label>
					<div class="controls">
						<input type="date" name="fec_nac" id="fec_nac" value="<?php echo $fec_nac; ?>" disabled="true">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="hor_nac">Hora de nacimiento</label>
					<div class="controls">
						<input type="time" name="hor_nac" id="hor_nac" value="<?php echo $hor_min; ?>" disabled="true">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="dep_nac" >Departamento de nacimiento</label>
					<div class="controls" >
						<select name="dep_nac" id="dep_nac" disabled="true">
							<option><?php echo $dep_nac; ?></option>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="mun_nac">Municipio de nacimiento</label>
					<div class="controls">
						<select name="mun_nac" id="mun_nac" disabled="true">
							<option><?php echo $mun_nac; ?></option>
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="can_nac">Cantón de nacimiento</label>
					<div class="controls">
						<input type="text" class="input-large" name="can_nac" id="can_nac">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="sex">Sexo</label>
					<div class="controls">
						<label class="radio inline">
						<input type="radio" name="sex" id="sex_mas" value="M" disabled="" <?php if($sex=='M') echo "checked=''"; ?>>
						Masculino
						</label>
						<label class="radio inline">
						<input type="radio" name="sex" id="sex_fem" value="F" disabled="" <?php if($sex=='F') echo "checked''"; ?>>
						Femenino
						</label>
					</div>
					</div>
				
				

				<div class="control-group">
					<label class="control-label" for="pes_nac">Peso al nacer (gramos)</label>
					<div class="controls">
						<input type="number" class="input-mini" name="pes_nac" id="pes_nac">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for=" tal">Talla al nacer (centimetros)</label>
					<div class="controls">
						<input type="number" class="input-mini" name=" tal" id=" tal">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="cla_par">Clase de parto</label>
					<div class="controls">
						<select name="cla_par" id="cla_par">
							<option>Único</option>
							<option>Gemelo</option>
							<option>Triple</option>
							<option>Cuádruple o más</option>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="tip_par">Tipo de parto</label>
					<div class="controls">
						<label class="radio inline">
						<input type="radio" name="tip_par" id="vaginal" value="Vaginal" checked="">
						Vaginal
						</label>
						<label class="radio inline">
						<input type="radio" name="tip_par" id="cesarea" value="Cesárea">
						Cesárea
						</label>
					</div>
				</div>
					
				</div>
				<!--Fin del primer Bloque -->
				
				<!-- Inicio del segundo bloque: Datos de la madre -->
				<div class="tab-pane" id="2">
					
				<div class="control-group">
					<label class="control-label" for="nom_mad">Nombre completo de la madre</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="nom_mad" id="nom_mad" value="<?php echo $nom_mad . ' ' . $ape1_mad . ' ' . $ape2_mad; ?>" disabled="true">
					</div>
				</div>
				

				<div class="control-group">
					<label class="control-label" for="eda_mad">Edad de la madre</label>
					<div class="controls">
						<input type="number" class="input-mini" name="eda_mad" id="eda_mad" value="<?php echo $eda_mad; ?>" disabled="true">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="nom_asi">Nombre del/la asistente</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="nom_asi" id="nom_asi">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="car_asi">Cargo</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="car_asi" id="medico" value="Médico" checked="">
							Médico
						</label>
						<label class="radio inline">
							<input type="radio" name="car_asi" id="enfermera" value="Enfermera">
							Enfermera
						</label>
						<label class="radio inline">
							<input type="radio" name="car_asi" id="partera" value="Partera" >
							Partera
						</label>
						<label class="radio inline">
							<input type="radio" name="car_asi" id="otro" value="Otro">
							Otro
						</label>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="dur_emb">Duración del embarazo (meses)</label>
					<div class="controls">
						<input type="number" class="input-mini" name="dur_emb" id="dur_emb">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="est_fam">Estado familiar</label>
					<div class="controls">
						<select name="est_fam" id="est_fam">
							<option selected="" value="Soltera">Soltera</option>
							<option value="Acompañada">Acompañada</option>
							<option value="Casada">Casada</option>
							<option value="Viuda">Viuda</option>
							<option value="Separada">Separada</option>
							<option value="Divorciada">Divorciada</option>
							<option value="Ignorado">Ignorado</option>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="alf_mad">Sabe leer y escribir</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="alf_mad" id="si" value="si" checked="">
							Si
						</label>
						<label class="radio inline">
							<input type="radio" name="alf_mad" id="no" value="no">
							No
						</label>
						<label class="radio inline">
							<input type="radio" name="alf_mad" id="ignorado" value="ignorado"> 
							Ignorado
						</label>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="ocu_mad">Ocupación actual de la madre</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="ocu_mad" id="ocu_mad" value="<?php echo $ocu_mad; ?>" disabled="true">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="dep_res_mad">Departamento de residencia de la madre</label>
					<div class="controls">
						<select name="dep_res_mad" id="dep_res_mad" disabled="true">
							<option><?php echo $dep_res_mad; ?></option>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="mun_res_mad">Municipio de residencia de la madre</label>
					<div class="controls">
						<select name="mun_res_mad" id="mun_res_mad" disabled="true">
							<option><?php echo $mun_res_mad; ?></option>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="can_res">Canton residencia de la madre</label>
					<div class="controls">
						<input type="text" name="can_res" id="can_res">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="are_res">Area de residencia</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="are_res" id="urbana" value="Urbana">
							Urbana
						</label>
						<label class="radio inline">
							<input type="radio" name="are_res" id="rural" value="Rural" checked="">
							Rural
						</label>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="dep_nac_mad">Departamento de nacimiento de la madre</label>
					<div class="controls">
						<select name="dep_nac_mad" id="dep_nac_mad" disabled="true">
							<option><?php echo $dep_ori_mad; ?></option>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="mun_nac_mad">Municipio de nacimiento de la madre</label>
					<div class="controls">
						<select name="mun_nac_mad" id="mun_nac_mad" disabled="true">
							<option><?php echo $mun_ori_mad; ?></option>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="nac_mad">Nacionalidad de la madre</label>
					<div class="controls">
						<input type="text" class="span3" name="nac_mad" id="nac_mad" value="<?php echo $nac_mad ?>" disabled="true">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="hij_nac_viv">Número de hijos nacidos vivos, incluyendo este</label>
					<div class="controls">
						<input type="number" class="input-mini" name="hij_nac_viv" id="hij_nac_viv">
					</div>
				</div>
				
								<div class="control-group">
					<label class="control-label" for="hij_mue">De los hijos nacidos vivos cuantos han muerto</label>
					<div class="controls">
						<input type="number" class="input-mini" name="hij_mue" id="hij_mue">
					</div>
				</div>
				
								<div class="control-group">
					<label class="control-label" for="hij_nac_mue">Hijos nacidos muertos</label>
					<div class="controls">
						<input type="number" class="input-mini" name="hij_nac_mue" id="hij_nac_mue">
					</div>
				</div>
				
				</div>
				<!-- Fin del segundo bloque: Datos de la madre -->
				
				<!-- Inicio del tercer bloque: Datos del padre -->
				<div class="tab-pane" id="3">
				
				<div class="control-group">
					<label class="control-label" for="nom_pad">Nombre completo del padre</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="nom_pad" id="nom_pad" value="<?php echo $nom_pad . ' ' . $ape1_pad . ' ' . $ape2_pad; ?>" disabled="true">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="eda_pad">Edad del padre</label>
					<div class="controls">
						<input type="number" class="input-mini" name="eda_pad" id="eda_pad" value="<?php echo $eda_pad; ?>" disabled="true">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="alf_pad">Sabe leer y escribir</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="alf_pad" id="si" value="si" checked="">
							Si
						</label>
						<label class="radio inline">
							<input type="radio" name="alf_pad" id="no" value="no">
							No
						</label>
						<label class="radio inline">
							<input type="radio" name="alf_pad" id="ignorado" value="ignorado"> 
							Ignorado
						</label>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="ocu_pad">Ocupación actual del padre</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="ocu_pad" id="ocu_pad" value="<?php echo $ocu_pad; ?>" disabled="true">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="dep_nac_pad">Departamento de nacimiento del padre</label>
					<div class="controls">
						<select name="dep_nac_pad" id="dep_nac_pad" disabled="true">
							<option><?php echo $dep_ori_pad; ?></option>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="mun_nac_pad">Municipio de nacimiento del padre</label>
					<div class="controls">
						<select name="mun_nac_pad" id="mun_nac_pad" disabled="true">
							<option><?php echo $mun_ori_pad; ?></option>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="nac_pad">Nacionalidad del padre</label>
					<div class="controls">
						<input type="text" class="span3" name="nac_pad" id="nac_pad" value="<?php echo $nac_pad; ?>" disabled="true">
					</div>
				</div>
				
				</div> 
				<!-- Fin del tercer bloque -->

				<!-- Inicio del cuarto bloque -->
				<div class="tab-pane" id="4">


				<div class="control-group">
					<label class="control-label" for="nom_inf">Nombre del informante</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="nom_inf" id="nom_inf" value="<?php echo $nom_inf . ' ' . $ape1_inf . ' ' . $ape2_inf; ?>" disabled="true">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="par_inf">Parentesco</label>
					<div class="controls">
						<input type="text" class="span3" name="par_inf" id="par_ing" value="<?php echo $par_inf; ?>" disabled="true">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="dui_inf">DUI del informane</label>
					<div class="controls">
						<input type="text" class="span3" name="dui_inf" id="dui_inf" value="<?php echo $num_doc_inf; ?>" disabled="true">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="fec_reg">Fecha de registro</label>
					<div class="controls">
						<input type="date" name="fec_reg" id="fec_reg" value="<?php echo $fec; ?>" disabled="true">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="nom_jef">Nombre del jefe del registro del estado familiar</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="nom_jef" id="nom_jef" value="<?php echo $nom_reg; ?>" disabled="true">
					</div>
				</div>

				<div class="form-actions" style="background-color:transparent;">
					<button type="button" class="btn" name="btn-guardar" id="btn-guardar"><img src="../../img/icon-save.png" height="14" width="14"> </i> Guardar </button>
					<button type="reset" class="btn"><i class="icon-trash"></i> Limpiar</button>
					<button type="button" class="btn" onclick="parent.location='../index_registrofamiliar.php'"><i class="icon-remove"></i> Cancelar</button>
				</div>
				
				</div>
				<!-- Fin del cuarto bloque -->
				
				</div> 
				<!-- Fin del tab-content -->
				
				</div>
				<!-- Fin del tabbable -->
				
			</fieldset>
			</form>
<!-- Termina Formulario -->

<!-- Inicia AJAX -->
	<script type="text/javascript">
		/*$(function(){
			cargarDepartamentos("dep_nac");
			cargarMunicipios("dep_nac", "mun_nac");
			
			cargarDepartamentos("dep_res_mad");
			cargarMunicipios("dep_res_mad", "mun_res_mad");
			
			cargarDepartamentos("dep_nac_mad");
			cargarMunicipios("dep_nac_mad", "mun_nac_mad");
			
			cargarDepartamentos("dep_nac_pad");
			cargarMunicipios("dep_nac_pad", "mun_nac_pad");
		});*/
		
		$(function(){
 			$("#btn-guardar").click(function(){ // #btn_guardar es el boton encargado de llamar al script php
 				var url = "proc_nacimiento_digestyc.php"; // proc_persona.php El script a dónde se realizará la petición.
   			if(confirm("¿Esta seguro de querer guardar estos datos?")){
   				$.ajax({
          			type: "POST",
           			url: url,
           			data: $("#form_nacimiento_digestyc").serialize(), // Adjuntar los campos del formulario enviado.
           			success: function(data){
               		$("#mensajes").html(data); // Mostrar la respuestas del script PHP.
          				}
        			});
        		 }
   			return false; // Evitar ejecutar el submit del formulario.
 			});
		});
		
		$(function($){
			$("#dui_inf").mask("99999999-9"); // Formato del DUI
		});
	</script>
	<!-- Termina AJAX -->
	
</body>
</html>

