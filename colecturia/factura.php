<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Datos de factura</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
</head>
<body>
	<form action="" class="well form-horizontal">
		<div class="control-group">
			<label for="nombre" class="control-label">Nombre</label>
			<div class="controls">
				<input type="text" id="nombre"/>
			</div>
		</div>
		<div class="control-group">
			<label for="cuenta" class="control-label">Cuentas</label>
			<div class="controls">
				<select name="cuenta" id="cuenta" placeholder="seleccione...">
					<option>Cementerios municipales</option>
					<option>5% fiestas patronales</option>
					<option>Mercado</option>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label for="monto" class="control-label">Monto</label>
			<div class="controls">
			<div class="input-prepend">
				<span class="add-on">$</span>
				<input type="text" id="text" class="span2">
				<button><i class="icon-ok"></i> Agregar</button>
			</div>
			</div>
		</div>
		<div class="form-actions">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<button type="button" class="btn">Limpiar</button>
			<button type="button" class="btn">Cancelar</button>
		</div>
			
		<div>
			<h4>Contribuyente: Gustavo Alejandro Angel Maravilla</h4>
			<table border="1">
				<tr>
					<th>Codigo</th>
					<th>Cuenta</th>
					<th>Monto</th>
				</tr>
				<tr>
					<td>12111</td>
					<td>Cementerios municipales</td>
					<td>$2.00</td>
				</tr>
				<tr>
					<td>12114</td>
					<td>5% Fiestas municipales</td>
					<td>$0.10</td>
				</tr>
				<tr>
					<td colspan="2">Total</td>
					<td>$2.10</td>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>