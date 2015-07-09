<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Registro de partidas de nacimiento</title>
		<link rel="stylesheet" href="../../css/bootstrap.css">
		<link rel="stylesheet" href="../../css/retoques.css">
		<!-- <link rel="stylesheet" href="../../css/table.css"> -->
		<script type="text/javascript" src="../../js/jquery.min-1.7.1-google.js"></script>
		<script type="text/javascript" src="../../js/bootstrap-2.0.2.js"></script>
		<!-- <script type="text/javascript" src="../../js/table.js"></script> -->
		<!-- <script type="text/javascript" src="../../js/funciones.js"></script> -->
	</head>
	<body>
		
		<!-- Inicia area para mensajes AJAX -->
		<div id="mensajes">
		</div>
		<!-- Termina area para mensajes AJAX -->

		<!-- Inicia formulario principal -->
		<form class="well form-horizontal" name="form_nacimiento_partida" id="form_nacimiento_partida" action="" method="POST">
			<fieldset>
				<legend>Registro de partidas de nacimiento</legend>
				
				<input type="hidden" name="accion" id="accion" value="guardar-nacimiento-partida">
				<input type="hidden" name="cod_per" id="cod_per">
				<input type="hidden" name="cod_pad" id="cod_pad">
				<input type="hidden" name="cod_mad" id="cod_mad">
				
				<!-- <div class="control-group">
				<button data-toggle="modal" href="#buscar-persona" class="btn" name="btn-buscar-persona" id="btn-buscar-persona"><i class="icon-search"></i> Buscar persona</button>
				</div> -->
				
				<div class="row-fluid">
				<div class="span3">
				<div class="control-group">
					<label class="control-label" for="ano_lib">Año</label>
					<div class="controls">
						<input type="number" class="input-mini" name="ano_lib" id="ano_lib" value="<?php echo date('Y'); ?>"> 					
					</div>
				</div>
				</div>
				
				<div class="span3 offset1">
				<div class="control-group">
					<label class="control-label" for="num_lib" style="text-align: right;">Libro No.&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<div class="controls">
						<input type="number" class="input-mini" name="num_lib" id="num_lib" value="<?php  echo date('Y') - 1911; ?>">
					</div>
				</div>
				</div>
				
				<div class="span3 offset1">
				<div class="control-group">
					<label class="control-label" for="num_tom" style="text-align: right;">Tomo No.</label>
					<div class="controls">
						<input type="number" class="input-mini" name="num_tom" id="num_tom" value="1">
					</div>
				</div>
				</div>
				
				</div>
				
				<div class="row-fluid">
				<div class="span3">
				<div class="control-group">
					<label class="control-label" for="num_pag">Página No.</label>
					<div class="controls">
						<input type="number" class="input-mini" name="num_pag" id="num_pag">
					</div>
				</div>
				</div>
				
				<div class="span3 offset1">
				<div class="control-group">
					<label class="control-label" for="num_par" style="text-align: right;">Partida No.</label>
					<div class="controls">
						<input type="number" class="input-mini" name="num_par" id="num_par">
					</div>
				</div>
				</div>
				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="nom">Nombre del/la recien nacido/a</label>
					<div class="controls">
						<input type="text" class="span3" name="nom" id="nom">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="sex">Sexo</label>
					<div class="controls">
						<label class="radio inline">
						<input type="radio" name="sex" id="Masculino" value="M">
						Masculino
						</label>
						<label class="radio inline">
						<input type="radio" name="sex" id="Femenino" value="F" checked="">
						Femenino
						</label>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="fec_nac">Fecha de nacimiento</label>
					<div class="controls">
						<input type="date" name="fec_nac" id="fec_nac">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="nom_pad">Nombre del padre</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="nom_pad" id="nom_pad">
						<button type="button" name="btn-buscar-padre" id="btn-buscar-padre" data-toggle="modal" href="#buscar-padre"><i class="icon-search"></i></button>
						<!-- <button type="button" name="btn-agregar-padre" id="btn-agregar-padre" data-toggle="modal" href="#agregar-persona"><i class="icon-plus"></i></button> -->
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="nom_mad">Nombre de la madre</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="nom_mad" id="nom_mad">
						<button type="button" name="btn-buscar-madre" id="btn-buscar-madre" data-toggle="modal" href="#buscar-madre"><i class="icon-search"></i></button>
						<!-- <button type="button" name="btn-agregar-madre" id="btn-agregar-madre" data-toggle="modal" href="#agregar-persona"><i class="icon-plus"></i></button> -->
					</div>
				</div>
				
				<!-- <div class="control-group">
					<label class="control-label" for"btn-generar-cuerpo"></label>
					<div class="controls">
						<button type="button" class="btn" name="btn-generar-cuerpo" id="btn-generar-cuerpo" onclick="generarCuerpo();"><i class="icon-cog"></i> Generar partida</button>
					</div>
				</div> -->
				
				<div class="control-group">
					<label class="control-label" for="cue">Cuerpo de la partida</label>
					<div class="controls">
						<textarea class="input-xxlarge" rows="14" name="cue" id="cue"></textarea>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="esc_lib">Imagen escaneada</label>
					<div class="controls">
						<input type="file" class="input-file" name="esc_lib" id="esc_lib" >
					</div>
				</div>
				
				<div class="form-actions" style="background-color:transparent;">
					<button type="button" class="btn" name="btn-guardar" id="btn-guardar"><img src="../../img/icon-save.png" height="14" width="14"> Guardar </button>
					<button type="reset" class="btn"><i class="icon-trash"></i> Limpiar</button>
					<button type="button" class="btn" onclick="parent.location='../index_registrofamiliar.php'"><i class="icon-remove"></i> Cancelar</button>
				</div>
				
			</fieldset>
		</form>
		<!-- Termina formulario principal -->
		
		<!-- Inicia formulario modal de búsqueda de padres -->
		<div class="modal hide fade" id="buscar-padre" >
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Buscar padre</h3>
			</div>
			<div class="modal-body">
				<div class="well">
				<form class="form form-search" name="form_buscar_padre" id="form_buscar_padre" action="" method="POST">
					<div class="control-group">
						<strong>Buscar por:</strong><br>
						<label class="radio inline"><input type="radio" name="nombre" value="nombre" checked>Nombre</label>
					</div>
					<input type="hidden" name="accion" value="buscar-padre">
		  			<input type="text" class="search-query" style="width:250px" name="nom" id="nom">
		  			<button type="button" class="btn" id="btn2-buscar-padre"><i class="icon-search"></i> Buscar</button>
				</form>
				</div>
				<div id="resultado-buscar-padre">
				
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!--	Termina formulario modal de búsqueda de padres -->
		
		<!-- Inicia formulario modal de búsqueda de madres -->
		<div class="modal hide fade" id="buscar-madre" >
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Buscar madre</h3>
			</div>
			<div class="modal-body">
				<div class="well">
				<form class="form form-search" name="form_buscar_madre" id="form_buscar_madre" action="" method="POST">
					<div class="control-group">
						<strong>Buscar por:</strong><br>
						<label class="radio inline"><input type="radio" name="nombre" value="nombre" checked>Nombre</label>
					</div>
					<input type="hidden" name="accion" value="buscar-madre">
		  			<input type="text" class="search-query" style="width:250px" name="nom" id="nom">
		  			<button type="button" class="btn" id="btn2-buscar-madre"><i class="icon-search"></i> Buscar</button>
				</form>
				</div>
				<div id="resultado-buscar-madre">
				
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!--	Termina formulario modal de búsqueda de madres -->
		
		<!-- Inicia formulario modal de registro de personas -->
		<!-- <div class="modal hide fade" id="buscar-padre" >
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Buscar padre</h3>
			</div>
			<div class="modal-body">
				<div class="well">
				<form class="form form-search" name="form_buscar_padre" id="form_buscar_padre" action="" method="POST">
					<div class="control-group">
						<strong>Buscar por:</strong><br>
						<label class="radio inline"><input type="radio" name="nombre" value="nombre" checked>Nombre</label>
					</div>
					<input type="hidden" name="accion" value="buscar-padre">
		  			<input type="text" class="search-query" style="width:250px" name="nom" id="nom">
		  			<button type="button" class="btn" id="btn2-buscar-padre"><i class="icon-search"></i> Buscar</button>
				</form>
				</div>
				<div id="resultado-buscar-padre">
				
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div> -->
		<!--	Termina formulario modal de registro de personas -->


	<!-- Inicia JavaScript -->
	<script type="text/javascript">
	
		$(function(){
 			$("#btn2-buscar-padre").click(function(){ // #btn_guardar es el boton encargado de llamar al script php
 				var url = "proc_nacimiento_partida.php"; // proc_persona.php El script a dónde se realizará la petición.
   				$.ajax({
          			type: "POST",
           			url: url,
           			data: $("#form_buscar_padre").serialize(), // Adjuntar los campos del formulario enviado.
           			success: function(data){
               					$("#resultado-buscar-padre").html(data); // Mostrar la respuestas del script PHP.
          						}
        			});
   			return false; // Evitar ejecutar el submit del formulario.
 			});
		});
		
		$(function(){
 			$("#btn2-buscar-madre").click(function(){ // #btn_guardar es el boton encargado de llamar al script php
 				var url = "proc_nacimiento_partida.php"; // proc_persona.php El script a dónde se realizará la petición.
   				$.ajax({
          			type: "POST",
           			url: url,
           			data: $("#form_buscar_madre").serialize(), // Adjuntar los campos del formulario enviado.
           			success: function(data){
               					$("#resultado-buscar-madre").html(data); // Mostrar la respuestas del script PHP.
          						}
        			});
   			return false; // Evitar ejecutar el submit del formulario.
 			});
		});
	
		function cargarPadre(padre)
		{
			$("#nom_pad").attr({value: padre.nom_com});
			$("#cod_pad").attr({value: padre.cod_per});
		}
		
		function cargarMadre(madre)
		{
			$("#nom_mad").attr({value: madre.nom_com});
			$("#cod_mad").attr({value: madre.cod_per});
		}
		
		/*function generarCuerpo()
		{
			var cuerpo = "";
			cuerpo += "Partida número " + $("#num_par").val();
			cuerpo += ": " + $("#nom").val() + "; " ;
			cuerpo += "sexo " + $("input[name:sex]:checked").val() ;
			cuerpo += ", nació a las " + "XXX";
			cuerpo += " horas y " + "XXX" + " minutos";
			cuerpo += "" ;
			$("#cue").html(cuerpo);
		}*/
	
		$(function(){
 			$("#btn-guardar").click(function(){ // #btn_guardar es el boton encargado de llamar al script php
 				var url = "proc_nacimiento_partida.php"; // proc_persona.php El script a dónde se realizará la petición.
   			if(confirm("¿Esta seguro de querer guardar estos datos?")){
   				$.ajax({
          			type: "POST",
           			url: url,
           			data: $("#form_nacimiento_partida").serialize(), // Adjuntar los campos del formulario enviado.
           			success: function(data){
               		$("#mensajes").html(data); // Mostrar la respuestas del script PHP.
          				}
        			});
        		 }
   			return false; // Evitar ejecutar el submit del formulario.
 			});
		});
		
		/*$(function(){
 			$("#btn-buscar").click(function(){ // #btn_guardar es el boton encargado de llamar al script php
 				var url = "../persona/proc_buscar_persona.php"; // proc_persona.php El script a dónde se realizará la petición.
   				$.ajax({
          			type: "POST",
           			url: url,
           			data: $("#form_buscar_persona").serialize(), // Adjuntar los campos del formulario enviado.
           			success: function(data){
               					$("#resultado").html(data); // Mostrar la respuestas del script PHP.
          						}
        			});
   			return false; // Evitar ejecutar el submit del formulario.
 			});
		});
		
		function recargar(persona)
		{
			$("#nom").attr({value: persona.nom});
			$("#fec_nac").attr({value: persona.fec_nac});
			$("#cod_per").attr({value: persona.cod_per});
			if(persona.sex == "M")
			{
				$("#Masculino").attr({checked: "true"});
			} else if(persona.sex == "F")
			{
				$("#Femenino").attr({checked: "true"});
			}
		}*/
	</script>
	<!-- Termina JavaScript -->

</body>
</html>

