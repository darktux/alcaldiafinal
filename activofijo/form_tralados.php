<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro de Traslados</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
</head>
<body>
	<form action="" id="form_traslados" class="well form-horizontal">
		<legend>Traslados</legend>

		<div class="control-group">
			<label for="codigo" class="control-label">Codigo</label>
			<div class="controls">
				<input type="text" id="codigo"/>
			</div>
		</div>

		<div class="control-group">
			<label for="nombre" class="control-label">Nombre</label>
			<div class="controls">
				<input type="text" id="nombre"/>	
			</div>
		</div>

		<div class="control-group">
			<label for="nombre" class="control-label">Fecha</label>
			<div class="controls">
				<input type="text" id="fecha"/>	
			</div>
		</div>

		<div class="control-group">
			<label for="nombre" class="control-label">Ubicaciòn</label>
			<div class="controls">
				<textarea name="" id="" cols="30" rows="5"></textarea>
			</div>
		</div>
		
		<div class="form-actions">
			<button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
			<button type="button" class="btn" name="limpiar" id="limpiar">Limpiar</button>
			<button type="button" class="btn" name="cancelar" id="cancelar">Cancelar</button>
		</div>

	</form>
</body>
</html>