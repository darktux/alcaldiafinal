<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Registro de activo</title>
		<link rel="stylesheet" href="./../css/bootstrap.css">
	</head>
	<body>
		<form action="" name="form_usuario" class="well form-horizontal">
			<legend align="center">Usuario</legend>

				<div class="control-group">
					<label for="nombre" class="control-label">Nombre</label>
					<div class="controls">
						<input type="text" name="nombre"/>	
					</div>
				</div>
					
					
				<div class="control-group">
					<label for="contra" class="control-label">Contraseña</label>
					<div class="controls">
						<input type="password" name="contra">
					</div>
				</div>

				<div class="control-group">
					<label for="contra2" class="control-label">Confirme contraseña</label>
						<div class="controls"><input type="password" name="contra2">
					</div>
				</div>

				<div class="control-group">
					<label for="correo" class="control-label">Correo</label>
					<div class="controls">
						<input type="text">
					</div>
				</div>

				<div class="control-group">
					<label for="pregunta" class="control-label">Pregunta</label>
					<div class="controls">
						<select name="pregunta" id=""></select>
					</div>
				</div>

				<div class="control-group">
					<label for="respuesta" class="control-label">Respuesta</label>
					<div class="controls">
						<input type="text" name="respuesta">
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
					<button type="button" class="btn" id="limpiar">Limpiar</button>
					<button type="button" class="btn" id="cancelar">Cancelar</button>		
				</div>
		</form>

	</body>
</html>