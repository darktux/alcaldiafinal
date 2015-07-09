<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizar Impuestos</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/jquery.maskedinput.js"></script>
	<script src="js/act_impuesto.js"></script>
</head>
<body>
	<form class="well form-horizontal" id="formImpuesto">
		<legend>Actualizar Impuesto</legend>
		<a href="#bus_imp" data-toggle="modal" class="btn"><i class="icon-search"></i> Buscar Impuesto</a>
		<br><br>
		<div class="control-group">
			<label for="codigo" class="control-label">Código (*)</label>
			<div class="controls">
				<input type="text" id="codigo" name="codigo" class="input-mini" readonly>
			</div>
		</div>
		<div class="control-group">
			<label for="cob_met" class="control-label">Cobro por metro lineal</label>
			<div class="controls">
				<label class="checkbox"><input type="checkbox" id="cob_met" name="cob_met" title="Marque esta casilla si el impuesto se cobra por metros a los negocios e inmuebles"></label>
			</div>
		</div>

		<div class="control-group">
			<label for="nombre" class="control-label">Nombre de cuenta  (*)</label>
			<div class="controls">
				<input type="text" id="nom_cue" name="nom_cue" class="input-xlarge">
			</div>
		</div>
		
		<div class="control-group">
			<label for="des_cue" class="control-label">Descripción  (*)</label>
			<div class="controls">
				<textarea name="des_cue" id="des_cue" class="input-xlarge" rows="3"></textarea>
			</div>
		</div>

		<div class="control-group">
			<label for="tipo" class="control-label">Tipo de cobro  (*)</label>
			<div class="controls">
				<label class="radio inline"><input type="radio" id="tip_cobP" name="tip_cob" value="Porcentaje" onchange="muestraTipo()">Porcentaje</label>
				<label class="radio inline"><input type="radio" id="tip_cobF" name="tip_cob" value="Fijo" onchange="muestraTipo()" checked>Monto Fijo</label>
			</div>
		</div>

		<div class="control-group" id="divTarifa" style="display:none">
			<label for="tarifa" class="control-label">Tarifa (*)</label>
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
			<label for="maximo" class="control-label">Mínimo de cobro (*)</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on">$</span><input type="text" class="span2" id="cob_min" name="cob_min" value="2.86">
				</div>
			</div>
		</div>

		<div class="form-actions">
			<a href="#" class="btn" id="btnActualizar"><i class="icon-refresh"></i> Actualizar</a>
			<a class="btn" id="btnLimpiar" onclick="limpiarCampos()"><i class="icon-trash"></i> Limpiar</a>
			<a class="btn" id="btnCancelar" onclick="cancela()"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</form>

	<div class="modal hide fade" id="bus_imp">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Buscar Impuesto</h3>
		</div>
		<div class="modal-body">
			<div class="well">
				<div class="control-group">
					<strong>Buscar por:</strong><br>
					<label class="radio inline"><input type="radio" name="radBusImp" id="radBusImp" value="Codigo">Código</label>
					<label class="radio inline"><input type="radio" name="radBusImp" id="radBusImp" value="Nombre" checked>Nombre de Cuenta</label>
				</div>
	  			<input type="text" class="search-query" style="width:250px" name="txtBusImp" id="txtBusImp">
	  			<button class="btn" id="btnBusImp"><i class="icon-search"></i> Buscar</button>
			</div>
			<table class="table table-bordered">
				<thead>
					<th>Código</th>
					<th>Nombre de Cuenta</th>
					<th>Seleccionar</th>
				</thead>
				<tbody id="cuerpo">
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>
</body>
</html>