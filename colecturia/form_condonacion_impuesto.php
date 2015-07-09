<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Condonación de Impuesto</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="js/form_condonacion_impuesto.js"></script>
</head>
<body>
	<form class="well form-horizontal" id="formCondonacion">
		<legend>Condonación de impuesto</legend>
		<a href="#bus_imp" data-toggle="modal" class="btn"><i class="icon-search"></i> Buscar Impuesto</a>
		<br><br>
		<div class="control-group span5">
			<label for="codigo" class="control-label">Código</label>
			<div class="controls">
				<input type="text" id="codigo" name="codigo" class="input-mini" readonly>
			</div>
		</div>
		<div class="control-group span7">
			<label for="nombre" class="control-label">Nombre de cuenta</label>
			<div class="controls">
				<input type="text" id="nom_cue" name="nom_cue" class="input-xlarge" readonly>
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label">Fecha de Inicio</label>
			<div class="controls">
				<input type="date" id="fec_ini" name="fec_ini" class="input-medium" onBlur="compararFechaI()">
			</div>
		</div>
		<div class="control-group span7">
			<label class="control-label">Fecha de Fin</label>
			<div class="controls">
				<input type="date" id="fec_fin" name="fec_fin" class="input-medium" onBlur="compararFechaF()">
			</div>
		</div>
		<div class="control-group span12">
			<label for="nombre" class="control-label">Según Acuerdo Nº</label>
			<div class="controls">
				<input type="text" id="num_acu" name="num_acu">
			</div>
		</div>
		<div class="control-group span12">
			<label for="nombre" class="control-label">Impuesto Condonado</label>
			<div class="controls">
				<label class="radio inline"><input type="radio" id="conS" name="con" value="t">Sí</label>
				<label class="radio inline"><input type="radio" id="conN" name="con" value="f" checked>No</label>
			</div>
		</div>
		<div class="form-actions offset2">
			<a href="#" class="btn" id="btnGuardar"><img src="./../img/icon-save.png" width="14" height="14"> Guardar</a>
			<a class="btn" onclick="limpiar()"><i class="icon-trash"></i> Limpiar</a>
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