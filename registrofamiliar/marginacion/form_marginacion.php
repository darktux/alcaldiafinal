<?php
include("../php/var.php");
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Registro de Marginaciones</title>
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
		
		<!-- Inicia área de mensajes -->
		<div id="mensajes">
		</div>
		<!-- Termina área de mensajes -->
	
		<!-- Inicia formulario principal -->
		<form name="form_marginaciones" id="form_marginaciones" class="form-horizontal well" method="" action="">
			<legend>Registro de Marginaciones</legend>
			
			<input type="hidden" name="accion" id="accion" value="guardar-marginacion">


			<div class="control-group">
				<label class="control-label" for="tip">Tipo de Documento</label>
				<div class="controls">
					<select name="tip" id="tip">
						<option name="tip_nac" id="tip_nac" value="nacimiento">Partida de Nacimiento</option>
						<option name="tip_mat" id="tip_mat" value="matrimonio">Partida de Matrimonio</option>
						<option name="tip_div" id="tip_div" value="divorcio">Partida de Divorcio</option>
						<option name="tip_def" id="tip_def" value="defuncion">Partida de Defunción</option>
						<option name="tip_act_mat" id="tip_act_mat" value="acta">Acta de matrimonio</option>
					</select>
				</div>
			</div>
						
			<div class="control-group">
				<label class="control-label" for="num_lib">Número del libro</label>
				<div class="controls">
					<input type="number" class="input-mini" name="num_lib" id="num_lib">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="num_par">Número de Partida</label>
				<div class="controls">
					<input type="number" class="input-mini" name="num_par" id="num_par">
				</div>
			</div>	

			<div class="control-group">
				<label class="control-label" for="fec">fecha de la marginación</label>
				<div class="controls">
					<input type="date" name="fec" id="fec">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="num_par">Cuerpo de la marginacion</label>
				<div class="controls">
					<textarea class="input-xxlarge" rows="5" name="cue" id="cue"></textarea>
				</div>
			</div>
				

			<!-- Inicia area de botones -->
			<div class="form-actions" style="background-color:transparent;">
				<button type="button" class="btn" name="btn-guardar" id="btn-guardar"><img src="../../img/icon-save.png" height="14" width="14"> Guardar </button>
				<button type="reset" class="btn"><i class="icon-trash"></i> Limpiar</button>
				<button type="button" class="btn" onclick="parent.location='../index_registrofamiliar.php'"><i class="icon-remove"></i> Cancelar</button>
				<!-- <button type="button" class="btn" id="imprimir"><i class="icon-print"></i> Imprimir</button> -->
			</div>
			<!-- Termina area de botones -->			
		</form>
		<!-- Termina formulario Principal -->
		
		
		<!-- Inicia JavaScript -->
		<script type="text/javascript"  >
		/* Inicia codigo de configuración Inicial */
		$(document).ready(function(){
		});
		/* Termina código de configuración Inicial */

		
		$(function(){
 			$("#btn-guardar").click(function(){ // #btn_guardar es el boton encargado de llamar al script php
 				var url = "proc_marginacion.php"; // proc_persona.php El script a dónde se realizará la petición.
   			if(confirm("¿Esta seguro de querer guardar estos datos?")){
   				$.ajax({
          			type: "POST",
           			url: url,
           			data: $("#form_marginaciones").serialize(), // Adjuntar los campos del formulario enviado.
           			success: function(data){
               		$("#mensajes").html(data); // Mostrar la respuestas del script PHP.
          				}
        			});
        		 }
   			return false; // Evitar ejecutar el submit del formulario.
 			});
		});
	
		</script>
		<!-- Termina JavaScript -->
		
	</body>
</html>