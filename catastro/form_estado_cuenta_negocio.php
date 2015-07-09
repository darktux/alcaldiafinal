<?php 
	include('./../php/conexion.php');
	$conn=conectar();
	$sql="SELECT codigo,nom_cue FROM co_impuesto";
	$rs=pg_query($sql);
?>
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
	<script src="./../js/bootstrap-select.js"></script>
	<script src="./../js/table.js"></script>
	<script src="js/form_estado_cuenta_negocio.js"></script>
</head>
<body>
	<legend style="margin-top:25px">Actualizar Estado de Cuenta de Negocio</legend>
	<div class="well form-horizontal">
		<fieldset>
		<a href="#bus_neg" data-toggle="modal" class="btn"><i class="icon-search"></i> Buscar Negocio</a>
		<br><br>
		<input type="hidden" id="cod_neg" name="cod_neg" value="<?php echo $_GET['cod_neg'] ?>">
		<input type="hidden" id="cod_con" name="cod_con" value="<?php echo $_GET['cod_con'] ?>">
		<input type="hidden" id="tipoPer" name="tipoPer" value="<?php echo $_GET['tip_neg'] ?>">
		<div class="control-group span6">
			<label class="control-label" for="propietario">Contribuyente</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="propietario" disabled>
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label" for="nom_neg">Negocio</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="nom_neg" disabled>
			</div>
		</div>
		<div class="control-group span6">
			<label class="control-label" for="dir_neg">Dirección</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="dir_neg" disabled>
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label" for="med_neg">Mts. a calle</label>
			<div class="controls">
				<div class="input-append">
					<input type="number" min="0" class="input-mini" id="med_neg" name="med_neg" value="0" disabled>
					<span class="add-on">Mts.</span>
				</div>
			</div>
		</div>
		<div class="control-group span6">
			<label class="control-label">Meses</label>
			<div class="controls">
				<select name="meses[]" id="mesesX" class="selectpicker" data-selected-text-format="count>4" multiple>
					<!-- <option value="Enero">Enero</option>
					<option value="Febrero">Febrero</option>
					<option value="Marzo">Marzo</option>
					<option value="Abril">Abril</option>
					<option value="Mayo">Mayo</option>
					<option value="Junio">Junio</option>
					<option value="Julio">Julio</option>
					<option value="Agosto">Agosto</option>
					<option value="Septiembre">Septiembre</option>
					<option value="Octubre">Octubre</option>
					<option value="Noviembre">Noviembre</option>
					<option value="Diciembre">Diciembre</option> -->
				</select>
			</div>
		</div>
		</fieldset>
		<input type="hidden" id="tot_pag" name="tot_pag">
		<div class="form-actions offset2">
			<!-- <a href="#divAbono" data-toggle="modal" class="btn" onclick=""><i class="icon-refresh"></i> Abonar Cuenta</a> -->
			<!-- <button class="btn" id="btnGuardar"><img src="./../img/icon-save.png" width="14px" height="14px"> Guardar</button> -->
			<button class="btn" onclick="generarFactura()"><i class="icon-refresh"></i> Generar Factura</button>
			<!-- <button class="btn" onclick="calcularCargos('1')"><i class="icon-search"></i> Ver meses anteriores</button> -->
			<button class="btn" onclick="cancela()"><i class="icon-remove"></i> Cancelar</button>
		</div>
	</div>
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
	

	<!-- <div class="span12" id="tablaResultado"> -->
		
		<!-- </div> -->

	<div class="modal hide fade" id="bus_neg">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Buscar Negocio</h3>
		</div>
		<div class="modal-body">
			<div class="well">
				<div class="control-group offset1">
					<label class="radio inline"><input type="radio" name="radTip" id="radTip" value="N" checked>Persona Natural</label>
					<label class="radio inline"><input type="radio" name="radTip" id="radTip" value="J">Persona Jurídica</label>
				</div>
			</div>
			<div class="well">
				<div class="control-group">
					<strong>Buscar por:</strong><br>
					<label class="radio inline"><input type="radio" id="radBusNeg" name="radBusNeg" value="Nombre" checked>Nombre del Negocio</label>
					<label class="radio inline"><input type="radio" id="radBusNeg" name="radBusNeg" value="Contribuyente">Contribuyente</label>
				</div>
	  			<input type="text" class="search-query" style="width:250px" name="txtBusNeg" id="txtBusNeg">
	  			<button class="btn" id="btnBusNeg"><i class="icon-search"></i> Buscar</button>
			</div>
			<table class="table table-bordered">
				<thead>
					<th>Nombre</th>
					<th>Contribuyente</th>
					<th>Dirección</th>
					<th>Añadir</th>
				</thead>
				<tbody id="cuerpo_neg">
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<!-- <a href="#" class="btn btn-primary"><i class="icon-plus"></i> Añadir</a> -->
			<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>
	<div class="modal hide fade" id="divAbono">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Abonar Cuenta</h3>
		</div>
		<div class="modal-body">
			<div class="well">
				<select name="mesesAbono[]" id="mesesAbono" class="selectpicker" data-selected-text-format="count>4" multiple>
					<option value="Enero">Enero</option>
					<option value="Febrero">Febrero</option>
					<option value="Marzo">Marzo</option>
					<option value="Abril">Abril</option>
					<option value="Mayo">Mayo</option>
					<option value="Junio">Junio</option>
					<option value="Julio">Julio</option>
					<option value="Agosto">Agosto</option>
					<option value="Septiembre">Septiembre</option>
					<option value="Octubre">Octubre</option>
					<option value="Noviembre">Noviembre</option>
					<option value="Diciembre">Diciembre</option>
				</select>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn"><i class=""></i> Generar Factura</a>
			<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>

</body>
</html>