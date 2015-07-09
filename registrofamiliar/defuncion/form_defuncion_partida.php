<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Registro de Partidas de Defunción</title>
		<link rel="stylesheet" href="../../css/bootstrap.css">
		<link rel="stylesheet" href="../../css/retoques.css">
		<script type="text/javascript" src="../../js/jquery.min-1.7.1-google.js" ></script>
		<script type="text/javascript" src="../../js/bootstrap-2.0.2.js"></script>
		<link rel="stylesheet" href="../../css/pnotify.custom.css">
		<script type="text/javascript" src="../../js/funciones.js"></script>
		<script type="text/javascript" src="../../js/jquery.maskedinput.js"></script>
		<script src="../../js/pnotify.custom.js"></script>
	</head>
	<body style="background-color: rgba(255,255,255,0.85);">
			
		<div id="mensajes">
			<!-- Area para los mensajes devueltos por el script -->
		</div>
			
			<form class="well form-horizontal" name="form_defuncion_partida" id="form_defuncion_partida" action="" method="POST">
				<fieldset>
					<legend>Registro de Partidas de Defunción</legend>
					
					<input type="hidden" name="accion" value="guardar-defuncion-partida">
					<input type="hidden" name="cod_per" id="cod_per">

					
			<div class="tabbable tabs-left" >
				<ul class="nav nav-tabs">
				<li id="tab1" class="active">	<a href="#1" data-toggle="tab">Datos generales</a></li>
				<li id="tab2">						<a href="#2" data-toggle="tab">Datos del difunto</a></li>
				<li id="tab3">						<a href="#3" data-toggle="tab">Datos de la muerte </a></li>
				<li id="tab4">						<a href="#4" data-toggle="tab">Otros datos</a></li>
				</ul>
			
				<div class="tab-content">
				
				<!-- inicio primer bloque -->
				<div class="tab-pane active" id="1">
				
				<div class="row-fluid">
				
					<div class="control-group span6">
						<label class="control-label" for="ano_lib">Año (*)</label>
						<div class="controls">
							<input type="number" min="1911" max="<?php echo date('Y') ?>" class="input-mini" name="ano_lib" id="ano_lib" value="<?php echo date('Y') ?>">
						</div>
					</div>
					
					<div class="control-group span6">
						<label class="control-label" for="num_lib">Libro No. (*)</label>
						<div class="controls">
							<input type="number" min="1" max="<?php echo date('Y') - 1944; ?>" class="input-mini" name="num_lib" id="num_lib" value="<?php echo date('Y') - 1944 ?>">
						</div>
					</div>
					
				</div>
					
				<div class="row-fluid">
				
					<div class="control-group span6">
						<label class="control-label" for="num_tom">Tomo No. (*)</label>
						<div class="controls">
							<input type="number" min="1" max="10" class="input-mini" name="num_tom" id="num_tom" value="1">
						</div>
					</div>
				
					<div class="control-group span6">
						<label class="control-label" for="num_pag">Folio (*)</label>
						<div class="controls">
							<input type="number" min="1" max="500" class="input-mini" name="num_pag" id="num_pag" >
						</div>
					</div>

				</div>
				
				<div class="row-fluid">
					<div class="control-group span6">
						<label class="control-label" for="num_par">Partida No. (*)</label>
						<div class="controls">
							<input type="number" min="1" max="500" class="input-mini" name="num_par" id="num_par" >
						</div>
					</div>
				</div>
				
				</div>
				<!--Fin primer bloque -->
				
				<!--Inicio segundo bloque -->
					<div class="tab-pane" id="2">
					
					<div class="control-group">
						<button data-toggle="modal" href="#buscar-persona" class="btn" name="btn-buscar-persona" id="btn-buscar-persona"><i class="icon-search"></i> Buscar difunto</button>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="nom">Nombre del fallecido (*)</label>
						<div class="controls">
							<input type="text" class="span3" name="nom" id="nom">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="ape1">Primer Apellido (*)</label>
						<div class="controls">
							<input  type="text" class="span3" name="ape1" id="ape1">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="ape2">Segundo Apellido</label>
						<div class="controls">
							<input type="text" class="span3" name="ape2" id="ape2">
						</div>
					</div>
					
				<div class="control-group">
					<label class="control-label" for="sex">Sexo&nbsp;&nbsp;&nbsp;&nbsp;(*)</label>
					<div class="controls">
						<label class="radio inline">
						<input type="radio" name="sex" id="Masculino" value="M" onchange="cargarEstadoCivil('est_fam','M')">
						Masculino
						</label>
						<label class="radio inline">
						<input type="radio" name="sex" id="Femenino" value="F" onchange="cargarEstadoCivil('est_fam','F')" checked="">
						Femenino
						</label>
					</div>
				</div>
				
					<div class="control-group">
						<label class="control-label" for="eda">Edad (*)</label>
						<div class="controls">
							<input type="number"  min="0" max="125"  class="input-mini" name="eda" id="eda">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="est_fam">Estado Familiar (*)</label>
						<div class="controls">
							<select name="est_fam" id="est_fam" onchange="activarConyugue()">
								<option value="Casado">Casado</option>
								<option value="Viudo">Viudo</option>
								<option value="Soltero">Soltero</option>
								<option value="Divorciado">Divorciado</option>
							</select>
						</div>
					</div>
				
					<div class="control-group">
						<label class="control-label" for="nom_con">Nombre del C&oacute;nyugue</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="nom_con" id="nom_con"  disabled="true">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="ocu">Profesión u oficio del fallecido (*)</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="ocu" id="ocu">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="dep_org">Departamento de origen (*)</label>
						<div class="controls">
							<select name="dep_org" id="dep_org" onchange="cargarMunicipios('dep_org', 'mun_org')">
							</select>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="mun_org">Municipio de Origen (*)</label>
						<div class="controls">
						<select name="mun_org" id="mun_org">
						</select>
						</div>
					</div>
				
					<div class="control-group">
						<label class="control-label" for="dep_res">Departamento de Residencia (*)</label>
						<div class="controls">
							<select name="dep_res" id="dep_res" onchange="cargarMunicipios('dep_res', 'mun_res')">
							</select>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="mun_res">Municipio de residencia (*)</label>
						<div class="controls">
						<select name="mun_res" id="mun_res">
						</select>
						</div>
					</div>
				
				
					<div class="control-group">
						<label class="control-label" for="canlug_res">Lugar de residencia (*)</label>
						<div class="controls">
						<input type="text" class="input-xlarge" name="canlug_res" id="canlug_res">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="jur">Jurisdicci&oacute;n de (*)</label>
						<div class="controls">
						<input type="text" class="input-large" name="jur" id="jur">
						</div>
					</div>
				
				
					<div class="control-group">
						<label class="control-label" for="nac">Nacionalidad (*)</label>
						<div class="controls">
							<input type="text" class="input-large" name="nac" id="nac" value="Salvadoreña">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="dui">DUI del fallecido</label>
						<div class="controls">
							<input type="text" class="input-large" name="dui" id="dui" onblur="getElementById('formulario').">
						</div>
					</div>
					</div>
				<!--Fin segundo bloque -->
				
				<!--Inicio tercer bloque -->
				<div class="tab-pane" id="3">
				
					<div class="control-group">
						<label class="control-label" for="loc_def">Local de defunci&oacute;n (*)</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="loc_def" id="loc_def">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="canlug_def">Lugar de defunci&oacute;n (*)</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="canlug_def" id="canlug_def">
						</div>
					</div>
				
					<div class="control-group">
						<label class="control-label" for="dep_def">Departamento de defunci&oacute;n (*)</label>
						<div class="controls">
						<select name="dep_def" id="dep_def" onchange="cargarMunicipios('dep_def', 'mun_def')">
							</select>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="mun_def">Municipio de defunci&oacute;n (*)</label>
						<div class="controls">
							<select name="mun_def" id="mun_def">
							</select>
						</div>
					</div>
				
					<div class="control-group">
						<label class="control-label" for="hor_min">Hora de defunci&oacute;n (*)</label>
						<div class="controls">
							<input type="time" class="span3" name="hor_min" id="hor_min">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="fec_def">Fecha del defunci&oacute;n (*)</label>
						<div class="controls">
							<input type="date" min="1944-01-01" max="<?php echo date('Y-m-d'); ?>" name="fec_def" id="fec_def">
						</div>
					</div>
				
					<div class="control-group">
						<label class="control-label" for="asi_med">Recibi&oacute; asistencia M&eacute;dica</label>
						<div class="controls">
							<label class="radio inline">
								<input type="radio" name="asi_med" id="asi_med_si" value="true" checked="">Si
							</label>
							<label class="radio inline">
								<input type="radio" name="asi_med" id="asi_med_no" value="false">No
							</label>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="cau_def">Causa de la muerte (*)</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="cau_def" id="cau_def">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="nom_pro">Nombre del profesional que determinó la causa</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="nom_pro" id="nom_pro">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="car_pro">Cargo</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="car_pro" id="car_pro">
						</div>
					</div>
				
					<div class="control-group">
						<label class="control-label" for="jvpm">J.V.P.M. del profesional que determino la causa</label>
						<div class="controls">
							<input type="text" class="span3" name="jvpm" id="jvpm">
						</div>
					</div>
				</div>
				<!-- Fin tercer bloque -->
				
				<!-- Inicio cuarto bloque -->
				<div class="tab-pane" id="4">
				
					<div class="control-group">
						<label class="control-label" for="nom_mad">Nombre de la Madre (*)</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="nom_mad" id="nom_mad">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="nom_pad">Nombre del padre (*)</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="nom_pad" id="nom_pad">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="cem">Fue sepultado en cementerio (*)</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="cem" id="cem">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="inf">Nombre del informante (*)</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="inf" id="inf">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="dui_inf">DUI del informante (*)</label>
						<div class="controls">
							<input type="text" class="input-large" name="dui_inf" id="dui_inf">
						</div>
					</div>
				
					<div class="control-group">
						<label class="control-label" for="par_inf">Parentesco del informante (*)</label>
						<div class="controls">
							<input type="text" class="input-large" name="par_inf" id="par_inf">
						</div>
					</div>
				
					<div class="control-group">
						<label class="control-label" for="nom_tes1">Nombre del primer testigo</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="nom_tes1" id="nom_tes1">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="dui_tes1">DUI del primer testigo</label>
						<div class="controls">
							<input type="text" class="input-large" name="dui_tes1" id="dui_tes1">
						</div>
					</div>
				
					<div class="control-group">
						<label class="control-label" for="nom_tes2">Nombre del segundo testigo</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="nom_tes2" id="nom_tes2">
						</div>
					</div>
				
					<div class="control-group">
						<label class="control-label" for="dui_tes2">DUI del segundo testigo</label>
						<div class="controls">
							<input type="text" class="input-large" name="dui_tes2" id="dui_tes2">
						</div>
					</div>
				
					<div class="control-group">
						<label class="control-label" for="fec_reg">Fecha de Registro</label>
						<div class="controls">
							<input type="date" min="1944-01-01" max="<?php echo date("Y-m-d"); ?>" name="fec_reg" id="fec_reg">
						</div>
					</div>
					
					<!--<div class="control-group">
						<label class="control-label" for="enm">Enmendado</label>
						<div class="controls">
							<textarea class="input-xlarge" rows="3" name="enm" id="enm"></textarea>
						</div>
					</div> --> 
					
					<div class="control-group">
						<label class="control-label" for="esc_libx">Imagen escaneada</label>
						<div class="controls">
							<input type="file" name="esc_libx" id="esc_libx">
							<input type="hidden" name="esc_lib" id="esc_lib">
						</div>
					</div>
					
				<div class="form-actions" style="background-color:transparent;">
					<button type="button" class="btn" name="btn-guardar" id="btn-guardar"><img src="../../img/icon-save.png" height="14" width="14"> Guardar</button>
					<button type="reset" class="btn"><i class="icon-trash"></i> Limpiar</button>
					<button  type="button "class="btn" onclick="parent.location='../index_registrofamiliar.php'"><i class="icon-remove"></i> Cancelar</button>
				</div>
				
				</div>
				</div> <!-- Fin del tab-content -->
				</div>
				
					
				</fieldset>
			</form>
			<!-- Inicia formulario de búsqueda de personas -->
	<div class="modal hide fade" id="buscar-persona" >
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Buscar Persona</h3>
		</div>
		<div class="modal-body">
			<div class="well">
			<form class="form form-search" name="form_buscar_difunto" id="form_buscar_difunto" action="" method="POST">
				<div class="control-group">
					<strong>Buscar por:</strong><br>
					<!-- <label class="radio inline"><input type="radio" name="radBusBen" value="DUI">DUI</label> -->
					<label class="radio inline"><input type="radio" name="radBusBen" value="Nombre" checked>Nombre</label>
					<input type="hidden" name="accion" value="buscar-difunto">
				</div>
	  			<input type="text" class="search-query" style="width:250px" name="nom">
	  			<button type="button" class="btn" id="btn-buscar"><i class="icon-search"></i> Buscar</button>
			</form>
			</div>
			<div id="resultado">
			
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>
	<!--	Termina formulario de búsqueda de personas -->

	<!-- Inicia AJAX -->
	<script type="text/javascript">
		/* Inicia codigo de configuración Inicial */
		$(document).ready(function(){
			new PNotify({
				title: 'Información',
				text: 'Los campos con (*) son obligatorios.',
				type: 'info'
			});
			/* Inicia código para subir la imagen inmediatamente despues de seleccionarla*/				
			$("#esc_libx").change(function(){
				var num_lib = $("#num_lib").val();
				var num_par = $("#num_par").val();
				$("#esc_lib").attr({value : "def_par_" + num_lib + "_" + num_par + ".jpg" });
				
				$.ajax({
					type : "POST",
					url : "../img/proc_subir_imagen.php",
					data : new FormData($("#form_defuncion_partida")[0]),
					cache : false,
					contentType : false,
					processData : false
				});
			});
			/* Termina código para subir la imagen inediatamente despues de seleccionarla */

		});
		/* Termina código de configuración Inicial */


		$(function(){
			cargarDepartamentos("dep_org");
			cargarMunicipios("dep_org", "mun_org");
			
			cargarDepartamentos("dep_res");
			cargarMunicipios("dep_res", "mun_res");
			
			cargarDepartamentos("dep_def");
			cargarMunicipios("dep_def", "mun_def");

			cargarEstadoCivil('est_fam','F');
		});
	
		$(function(){
 			$("#btn-guardar").click(function(){ // #btn_guardar es el boton encargado de llamar al script php
 				var url = "proc_defuncion_partida.php"; // proc_persona.php El script a dónde se realizará la petición.
   			if(confirm("¿Esta seguro de querer guardar estos datos?")){
   				$.ajax({
          			type: "POST",
           			url: url,
           			data: $("#form_defuncion_partida").serialize(), // Adjuntar los campos del formulario enviado.
           			success: function(data){
               		$("#mensajes").html(data); // Mostrar la respuestas del script PHP.
          				}
        			});
        		 }
   			return false; // Evitar ejecutar el submit del formulario.
 			});
		});
		
		$(function(){
 			$("#btn-buscar").click(function(){ // #btn_guardar es el boton encargado de llamar al script php
 				var url = "proc_defuncion_partida.php"; // proc_persona.php El script a dónde se realizará la petición.
   				$.ajax({
          			type: "POST",
           			url: url,
           			data: $("#form_buscar_difunto").serialize(), // Adjuntar los campos del formulario enviado.
           			success: function(data){
               		$("#resultado").html(data); // Mostrar la respuestas del script PHP.
          				}
        			});
   			return false; // Evitar ejecutar el submit del formulario.
 			});
		});
		
		function cargarDifunto(difunto)
		{
			$("#nom").attr({value: difunto.nom});
			$("#ape1").attr({value : difunto.ape1});
			$("#ape2").attr({value : difunto.ape2});
			$("#ocu").attr({value : difunto.ocu});
			$("#dui").attr({value : difunto.dui});
			$("#cod_per").attr({value: difunto.cod_per});
			if(difunto.sex == "M")
			{
				$("#Masculino").attr({checked: "true"});
			} else if(difunto.sex == "F")
			{
				$("#Femenino").attr({checked: "true"});
			}
			$("#eda").attr({value: calcularEdad(difunto.fec_nac)});
		}

		function cargarEstadoCivil(idEstCiv,sex){
			var est = $("#"+idEstCiv);
			est.children().remove();
			if (sex=="M") {
				est.append("<option value='Soltero' selected=''>Soltero</option>");
				est.append("<option value='Casado'>Casado</option>");
				est.append("<option value='Divorciado'>Divorciado</option>");
				est.append("<option value='Viudo'>Viudo</option>");
				est.append("<option value='Separado'>Separado</option>");
				est.append("<option value='Otros'>Otros</option>");
			}else{
				est.append("<option value='Soltera' selected=''>Soltera</option>");
				est.append("<option value='Casada'>Casada</option>");
				est.append("<option value='Divorciada'>Divorciada</option>");
				est.append("<option value='Viuda'>Viuda</option>");
				est.append("<option value='Separada'>Separada</option>");
				est.append("<option value='Otros'>Otros</option>");
			}
		}

		function activarConyugue(){
			if($("#est_fam").val() == "Casado" || $("#est_fam").val() == "Casada")
				$("#nom_con").attr({disabled : false});
			else
				$("#nom_con").attr({disabled: true});
		}

		$(function($){
			//$("#tel1").mask("9999-9999"); // Formato del telefono 1
			//$("#tel2").mask("9999-9999"); // Formato del telefono 2
			$("#dui").mask("99999999-9"); // Formato del DUI
			$("#dui_inf").mask("99999999-9"); // Formato del DUI
			$("#dui_tes1").mask("99999999-9"); // Formato del DUI
			$("#dui_tes2").mask("99999999-9"); // Formato del DUI
			$("#jvpm").mask("99999"); // Formato del JVPM
			//$("#nit").mask("9999-999999-999-9"); // Formato del NIT
		});

		/* Inicia fución para cambiar el valor del imput esc_lib */
		function cambio(){
			var input = $("#esc_libx").val();
			input = input.replace("C:\\fakepath\\","");
			$("#esc_lib").attr({value : input });
		}
		/* Termina función para cambiar el valor del imput esc_lib */
	</script>
	<!-- Termina AJAX -->

	</body>
</html>