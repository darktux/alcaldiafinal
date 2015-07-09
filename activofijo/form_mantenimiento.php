<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Registro de activo</title>
		<link rel="stylesheet" href="./../css/bootstrap.css">
	</head>
	<body>
		<form action="" id="form_mantenimiento" class="well form-horizontal">
				<legend>Mantenimiento</legend>

				<div class="control-group">
					<label for="activo" class="control-label">Activo</label>
					<div class="controls">
						<input type="text" id="activo"/>
					</div>
				</div>

				
				<div class="control-group">
					<label for="descripcion" class="control-label">Descripción</label>
					<div class="controls">
						<textarea name="descripcion" cols="30" rows="5"></textarea>	
					</div>
				</div>

				<div class="control-group">
					<label for="appendedPrependedInput" class="control-label">Costo</label>
					<div class="controls">
					<div class="input-prepend input-append">	
						<span class="add-on">$</span>
						<input class="span2" type="text" name="Costo"/>
					</div>
					</div>
				</div>

				<div class="control-group">
					<label for="empresa" class="control-label">Empresa</label>
					<div class="controls">
						<input type="text" name="Empresa"/>
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