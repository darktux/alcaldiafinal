<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Impuestos</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<link rel="stylesheet" href="../css/pnotify.custom.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/jquery.maskedinput.js"></script>
	<script src="../js/pnotify.custom.js"></script>
	<script src="js/form_impuesto.js"></script>
</head>
<body>
	<form class="well form-horizontal" id="formImpuesto">
		<legend>Registro de Impuesto</legend>

		<div class="control-group">
			<label for="codigo" class="control-label">Código (*)</label>
			<div class="controls">
				<input type="text" id="codigo" name="codigo" class="input-mini">
			</div>
		</div>
		<div class="control-group">
			<label for="cob_met" class="control-label">Cobro por metro lineal</label>
			<div class="controls">
				<label class="checkbox"><input type="checkbox" id="cob_met" name="cob_met" title="Marque esta casilla si el impuesto se cobra por metros a los negocios e inmuebles"></label>
			</div>
		</div>

		<div class="control-group">
			<label for="nombre" class="control-label">Nombre de cuenta (*)</label>
			<div class="controls">
				<input type="text" id="nom_cue" name="nom_cue" class="input-xlarge">
			</div>
		</div>
		
		<div class="control-group">
			<label for="des_cue" class="control-label">Descripción (*)</label>
			<div class="controls">
				<textarea name="des_cue" id="des_cue" class="input-xlarge" rows="3"></textarea>
			</div>
		</div>

		<div class="control-group">
			<label for="tipo" class="control-label">Tipo de cobro (*)</label>
			<div class="controls">
				<label class="radio inline"><input type="radio" id="tip_cob" name="tip_cob" value="Porcentaje" onchange="muestraTipo()">Porcentaje</label>
				<label class="radio inline"><input type="radio" id="tip_cob" name="tip_cob" value="Fijo" onchange="muestraTipo()" checked>Monto Fijo</label>
			</div>
		</div>

		<div class="control-group" id="divTarifa" style="display:none">
			<label for="tarifa" class="control-label">Tarifa  (*)</label>
			<div class="controls">
				<div class="input-append">
					<input type="number" min="0.00" max="100.0" step="0.1" class="input-mini" value="0" id="cob_por" name="cob_por">
					<span class="add-on">%</span>
				</div>
			</div>
		</div>

		<div class="control-group" id="divMinimo">
			<label for="minimo" class="control-label">Base imponible (*)</label>
				<div class="controls">
				<div class="input-prepend">
					<span class="add-on">$</span>
					<input type="text" class="span2" name="cob_fij" id="cob_fij" value="0">
				</div>
			</div>
		</div>

		<div class="control-group" id="divMaximo" style="display:none">
			<label for="maximo" class="control-label">Mínimo de cobro(*)</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on">$</span><input type="text" class="span2" id="cob_min" name="cob_min" value="2.86">
				</div>
			</div>
		</div>

		<div class="form-actions">
			<a href="#" class="btn" id="btnGuardar"><img src="./../img/icon-save.png" width="14" height="14"> Guardar</a>
			<a class="btn" id="btnLimpiar" onclick="limpiarCampos()"><i class="icon-trash"></i> Limpiar</a>
			<a class="btn" id="btnCancelar" onclick="cancela()"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</form>
</body>
</html>