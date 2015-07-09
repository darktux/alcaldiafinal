<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Estado de Cuenta</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<link rel="stylesheet" href="./../css/bootstrap-select.css">
	<link rel="stylesheet" href="../css/table.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/jquery.maskedinput.js"></script>
	<script src="./../js/bootstrap-select.js"></script>
	<script src="./../js/table.js"></script>
	<script src="js/form_estado_cuenta_inmueble.js"></script>
</head>
<body>
	<form name="form_inmueble" id="form_inmueble" class="well form-horizontal">
		<legend>Actualizar Estado de Cuenta de Inmueble</legend>
	<fieldset>
		<input type="hidden" id="cod_per" name="cod_per" value="<?php echo $_GET['cod_pro'] ?>">
		<a href="#bus_inm" data-toggle="modal" class="btn"><i class="icon-search"></i> Buscar Inmueble</a>
		<br><br>
		<div class="control-group span6">
			<label class="control-label">Propietario (*)</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="propietario" name="propietario" readonly>
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label" for="nombre">C&oacute;digo Catastral (*)</label>
			<div class="controls">
				<input type="text" id="cod_inm" name="cod_inm" value="<?php echo $_GET['cod_inm'] ?>" readonly>
			</div>
		</div>

		<div class="control-group span6">
			<label class="control-label">Direcci&oacute;n (*)</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="dir_inm" name="dir_inm" readonly>
			</div>
		</div>

		<div class="control-group span5">
			<label class="control-label">Metros a calle (*)</label>
			<div class="controls">
				<div class="input-append">
					<input type="number" class="input-mini" id="med_inm" name="med_inm" value="0" readonly>
					<span class="add-on">Mts.</span>
				</div>
			</div>
		</div>
		<div class="control-group span6">
			<label class="control-label">Meses</label>
			<div class="controls">
				<select name="meses[]" id="mesesX" class="selectpicker" data-selected-text-format="count>4" multiple>
				</select>
			</div>
		</div>
	</fieldset>	
			<input type="hidden" id="tot_pag" name="tot_pag">
		<div class="form-actions">
			<!-- <button class="btn offset2"><img src="./../img/icon-save.png" width="14px" height="14px"> Guardar</button> -->
			<button class="btn offset2" onclick="generarFactura()"><i class="icon-refresh"></i> Generar Factura</button>
			<button class="btn" onclick="cancela()"><i class="icon-remove"></i> Cancelar</button>
		</div>
	</form>
	<div class="tabbable">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#divCP">Cargos Pendientes</a></li>
			<li><a data-toggle="tab" href="#divH" onclick="verHistorico()">Histórico</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="divCP">
				<table data-toggle='table' data-height='495' data-pagination="true" data-page-list="[10, 20, 50, 100]" data-select-item-name='toolbar1' id="tablaR">
					<thead>
						<tr>
							<th data-field="state" data-visible="false" data-checkbox="true" style="display:none"></th>
							<th data-field='fecha'>Fecha</th>
							<th data-field='concepto'>Concepto</th>
							<th data-field='num_com'>Nº Comprobante</th>
							<th data-field='cargo'>Cargo</th>
							<th data-field='abono'>Abono</th>
							<th data-field='saldo'>Saldo</th>
						</tr>
				 	</thead>
				</table>
			</div>
			<div class="tab-pane" id="divH">
				<table data-toggle='table' data-height='495' data-pagination="true" data-page-list="[10, 20, 50, 100]" data-select-item-name='toolbar1' id="tablaH">
					<thead>
						<tr>
							<th data-field='fecha'>Fecha</th>
							<th data-field='concepto'>Concepto</th>
							<th data-field='num_com'>Nº Comprobante</th>
							<th data-field='cargo'>Cargo</th>
							<th data-field='abono'>Abono</th>
							<th data-field='saldo'>Saldo</th>
						</tr>
				 	</thead>
				</table>
			</div>
		</div>
	</div>

	<div class="modal hide fade" id="bus_inm">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Buscar Inmueble</h3>
		</div>
		<div class="modal-body">
			<div class="well">
				<div class="control-group">
					<strong>Buscar por:</strong><br>
					<label class="radio inline"><input type="radio" id="radBusInm" name="radBusInm" value="Codigo" checked>Código Catastral</label>
					<label class="radio inline"><input type="radio" id="radBusInm" name="radBusInm" value="Propietario">Propietario</label>
				</div>
	  			<input type="text" class="search-query" style="width:250px" name="txtBusInm" id="txtBusInm">
	  			<button class="btn" id="btnBusInm"><i class="icon-search"></i> Buscar</button>
			</div>
			<table class="table table-bordered">
				<thead>
					<th>Código Catastral</th>
					<th>Propietario</th>
					<th>Dirección</th>
					<th>Añadir</th>
				</thead>
				<tbody id="cuerpo_inm">
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<!-- <a href="#" class="btn btn-primary"><i class="icon-plus"></i> Añadir</a> -->
			<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>

</body>
</html>