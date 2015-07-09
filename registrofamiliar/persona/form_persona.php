<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Registro de personas</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../../css/bootstrap.css">
		<link rel="stylesheet" href="../../css/retoques.css">
		<!-- <link rel="stylesheet" href="../../css/table.css"> -->
		<script type="text/javascript" src="../../js/jquery.min-1.7.1-google.js"></script>
		<script type="text/javascript" src="../../js/bootstrap-2.0.2.js"></script>
		<!-- <script type="text/javascript" src="../../js/table.js"></script> -->
		<script type="text/javascript" src="../../js/funciones.js"></script>
		<script type="text/javascript" src="../../js/jquery.maskedinput.js"></script>
	</head>
	<body>
		<div id="mensajes">
			<!-- Area para los mensajes devueltos por el script -->
		</div>
		<!-- Inicia Formulario -->
		<form class="well form-horizontal" id="form_persona" action="" name="form_persona" method="POST">
			<legend>Registro de personas</legend>
	
			<input type="hidden" value="guardar-persona" name="accion" id="accion">
			
			<div class="control-group">
				<label class="control-label">Nombre</label>
				<div class="controls">
					<input type="text" class="input-large" name="nom" id="nom">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Primer apellido</label>
				<div class="controls">
					<input type="text" class="span2" name="ape1" id="ape1">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Segundo Apellido</label>
				<div class="controls">
					<input type="text" class="span2" name="ape2" id="ape2">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Sexo</label>
				<div class="controls">
				<label class="radio inline">
					<input type="radio" name="sex" id="masculino" value="M" onchange="estadoCivil('est_civ','M')">
					Masculino
				</label>
				<label class="radio inline">
					<input type="radio" name="sex" id="femenino" value="F" onchange="estadoCivil('est_civ','F')" checked="">
					Femenino
				</label>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Fecha de nacimiento</label>
				<div class="controls">
					<input type="date" class="span3" id="fec_nac" name="fec_nac">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="ocu">Ocupación</label>
				<div class="controls">
					<input type="text" class="input-xlarge" name="ocu" id="ocu">
				</div>
			</div>
						
			<div class="control-group">
				<label class="control-label" for="est_civ">Estado civil</label>
				<div class="controls">
					<select class="span2" name="est_civ" id="est_civ">
					</select>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">DUI</label>
				<div class="controls">
					<input type="text" class="span2" name="dui" id="dui">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">NIT</label>
				<div class="controls">
					<input type="text" class="span3" name="nit" id="nit">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Telefono 1</label>
				<div class="controls">
					<input type="text" class="span2" name="tel1" id="tel1">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Telefono 2</label>
				<div class="controls">
					<input type="text" class="span2" name="tel2" id="tel2">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="dep">Departamento de residencia</label>
				<div class="controls">
					<select class="span2" name="dep" id="dep" onchange="cargarMunicipios('dep', 'mun')"></select>
				</div>
			</div>
				
			<div class="control-group">
				<label class="control-label" for="mun">Municipio de residencia</label>
				<div class="controls">
					<select name="mun" id="mun"></select>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Dirección</label>
				<div class="controls">
					<textarea class="input-xlarge" name="dir" id="dir" rows="4"></textarea>
				</div>
			</div>
			
		<div class="form-actions">
			<button type="button" class="btn" id="btn-guardar" name="btn-guardar"><img src="../../img/icon-save.png" height="14" width="14"> Guardar</button>
			<button type="reset" class="btn"><i class="icon-trash"></i> Limpiar</button>
			<button type="button" class="btn" onclick="parent.location='../index_registrofamiliar.php'"><i class="icon-remove"></i> Cancelar</button>
		</div>
	</form>
	<!-- Termina Formulario -->
	
	<!-- Inicia AJAX -->
	<script type="text/javascript">
	
		$(function(){
				cargarDepartamentos("dep");
				cargarMunicipios("dep", "mun");
				estadoCivil('est_civ','F');
		});
	
		$(function(){
 			$("#btn-guardar").click(function(){ // #btn_guardar es el boton encargado de llamar al script php
 				var url = "proc_persona.php"; // proc_persona.php El script a dónde se realizará la petición.
   			if(confirm("¿Esta seguro de querer guardar estos datos?")){
   				$.ajax({
          			type: "POST",
           			url: url,
           			data: $("#form_persona").serialize(), // Adjuntar los campos del formulario enviado.
           			success: function(data){
               		$("#mensajes").html(data); // Mostrar la respuestas del script PHP.
          				}
        			});
        		 }
   			return false; // Evitar ejecutar el submit del formulario.
 			});
		});
		
		$(function($){
			$("#tel1").mask("9999-9999"); // Formato del telefono 1
			$("#tel2").mask("9999-9999"); // Formato del telefono 2
			$("#dui").mask("99999999-9"); // Formato del DUI
			$("#nit").mask("9999-999999-999-9"); // Formato del NIT
		});
		
	</script>
	<!-- Termina AJAX -->

	</body>
</html>