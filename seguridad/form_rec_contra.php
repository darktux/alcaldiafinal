<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro de activo</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<script src="form_nuevo_usuario.js"></script>
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="../js/funciones.js"></script>
	<script src="form_rec_contra.js"></script>
</head>
<body style="background:url(../img/bg.jpg) fixed;">
	<header class="well" style="background:url(../img/banner_index.png) no-repeat;" id="banner"></header>
	<div class="container form-horizontal" style="width:1024px;">
			<div class="well">
			<br><p align="center" style="color:#333333;font-size:32px;">¿Olvidaste tu contraseña?</p><br><br>

				<div class="row">

					<div class="control-group span6 offset3">
						<label for="usuario" class="control-label" style="width:100px; font-size: 20px;" >Usuario: </label>
						<div class="controls" style='margin-left: 120px;'>
							<input type="text" id="txt_buscar" name="txt_buscar"/>
							<button type="button" class="btn" id="btn_buscar" name="btn_buscar"><i class="icon-search"></i> Buscar</button>	
						</div>
					</div>

				</div>
			
				<div class="row">

					<div class="control-group span6 offset3">
						<label for="usuario" class="control-label" style="width:100px; font-size: 20px;" >Pregunta: </label>
						<div class="controls" style='margin-left: 120px;'>
							<input type="text" id="txt_pregunta" name="txt_pregunta" disabled="disabled"/>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="control-group span6 offset3">
						<label for="contrasena" class="control-label" style="width:100px; font-size: 20px;" >Respuesta: </label>
						<div class="controls" style='margin-left: 120px;'>
							<input type="text" id="txt_res" name="txt_res" disabled="disabled">
							<button type="button" class="btn" id="btn_enviar" name="btn_enviar" disabled="disabled"><i class="icon-ok"></i></button>	
						</div>
					</div>
				</div>	

				<div class="row">
					<div class="control-group span6 offset3">
						<label for="contrasena" class="control-label" style="width:200px; font-size: 20px;" >Nueva Contraseña: </label>
						<div class="controls" style='margin-left: 120px;'>
							<input type="password" id="contra1" name="contra1" disabled="disabled">
						</div>
					</div>
				</div>	

				<div class="row">
					<div class="control-group span6 offset3">
						<label for="contrasena" class="control-label" style="width:200px; font-size: 20px;" >Confirme Contraseña: </label>
						<div class="controls" style='margin-left: 120px;'>
							<input type="password" id="contra2" name="contra2" disabled="disabled">
						</div>
					</div>
				</div>	

				<div class="row">
					<div class=" span5 offset4">
						
						<button type="button" class="btn" id="cambiar" name="cambiar" disabled="disabled"><i class="icon-refresh"></i> Cambiar</button>			
						<button type="button" class="btn" onclick="location.href='../index.php'"><i class="icon-remove"></i> Cancelar</button>			
						<input id="modulo" name="modulo" type="hidden" value="<?php echo $_REQUEST['mod']?>">
					</div>
				</div>		

				<div class="row">
					<div class="span5 offset4">
						<br>
						
					</div>
				</div>			
					
					<!--<td colspan="2" align="center"><button onclick="comprobar();">Comprobar</button></td>-->
			</div>	
			</div>
</body>