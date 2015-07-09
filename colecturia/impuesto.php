<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro de activo</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
</head>
	<body>
		<form action="" class="well form-horizontal">

			<legend>Impuestos</legend>
			
				<div class="control-group">
					<label for="fecha" class="control-label">fecha:</label>
					<div class="controls">
						<input type="date" name="fecha" />	
					</div>
				</div>

				<div class="control-group">
					<label for="codigo" class="control-label">Código</label>
					<div class="controls">
						<input type="text">
					</div>
				</div>

				<div class="control-group">
					<label for="nombre" class="control-label">Nombre de cuenta</label>
					<div class="controls">
						<input type="text">
					</div>
				</div>
		
				<div class="control-group">
					<label for="descripcion" class="control-label">Descripción</label>
					<div class="controls">
						<textarea name="descripcion" id="descripcion" cols="30" rows="5"></textarea>
					</div>
				</div>

				<div class="control-group">
					<label for="tarifa" class="control-label">Tarifa</label>
					<div class="controls">
					<div class="input-append">
						<input type="text" name="tarifa" class="span2"/>
						<span class="add-on">%</span>
					</div>
					</div>
				</div>

				<div class="control-group">
					<label for="minimo" class="control-label">Base imponible minimo</label>
					<div class="controls">
					<div class="input-prepend">
						<span class="add-on">$</span><input type="text" class="span2" name="minimo"/>
					</div>
					</div>
				</div>

				<div class="control-group">
					<label for="maximo" class="control-label">Base imponible maxima</label>
					<div class="controls">
					<div class="input-prepend">
						<span class="add-on">$</span><input type="text" class="span2" id="appendedPrependedInput" name="maximo">
					</div>
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