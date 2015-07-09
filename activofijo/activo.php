<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro de activo</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
</head>
<body>
	<form action="" class="well form-horizontal">
			<legend>Ingreso de Activos</legend>

			<div class="control-group">
				<label for="codigo" class="control-label">Código</label>
				<div class="controls">
						<span class="input-xlarge uneditable-input"></span>
				</div>
			</div>

			<div class="control-group">
				<label for="nombre" class="control-label">Nombre</label>
				<div class="controls">
					<input type="text" name="nombre"/>
				</div>
			</div>

			<div class="control-group">
				<label for="ubicacion" class="control-label">Ubicación</label>
				<div class="controls">
					<textarea name="ubicacion" id="" cols="20" rows="5"></textarea>
				</div>
			</div>

			<div class="control-group">
				<label for="costo" class="control-label">Costo de adquisición</label>
				<div class="controls">
					<input type="text" name="costo"/>
				</div>
			</div>

			<div class="control-group">
				<label for="fecha" class="control-label">Fecha de adquisición</label>
				<div class="controls">
					<input type="date" name="fecha"/>
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