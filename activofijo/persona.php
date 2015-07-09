<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<script>
		function limpiarlo(){
			
		}
	</script>
</head>
<body>
	<form action="" class="well form-horizontal">
		<legend>Ingreso de personas</legend>
		<div class="control-group">
			<label for="nombre" class="control-label">Nombre</label>
			<div class="controls">
				<input type="text">
			</div>			
		</div>

		<div class="control-group">
			<label for="apellido1" class="control-label">Primer Apellido</label>
			<div class="controls">
				<input type="text">
			</div>			
		</div>
		
		<div class="control-group">
			<label for="apellido2" class="control-label">Segundo Apellido</label>
			<div class="controls">
				<input type="text">
			</div>			
		</div>

		<div class="control-group">
			<label for="sexo" class="control-label">Sexo</label>
			<div class="controls">
				<label class="radio">
					<input type="radio" name="radioSexo"> Masculino
				</label>
				<label class="radio">
					<input type="radio" name="radioSexo"> Femenino
				</label>
			</div>			
		</div>

		<div class="control-group">
			<label for="nit" class="control-label">NIT</label>
			<div class="controls">
				<input type="text">
			</div>			
		</div>

		<div class="control-group">
			<label for="dui" class="control-label">DUI</label>
			<div class="controls">
				<input type="text">
			</div>			
		</div>

		<div class="control-group">
			<label for="direccion" class="control-label">Dirección</label>
			<div class="controls">
				<textarea name="direccion" id="direccion" cols="30" rows="5"></textarea>
			</div>			
		</div>

		<div class="control-group">
			<label for="cuenta" class="control-label">Cuenta</label>
			<div class="controls">
				<input type="text">
			</div>			
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
			<button type="button" class="btn" id="limpiar" onClick="limpiarlo()">Limpiar</button>
			<button type="button" class="btn" id="cancelar">Cancelar</button>	
		</div>
		
	</form>
</body>
</html>