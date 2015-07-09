<!DOCTYPE html>
	<html lang='es'>
	<head>
		<meta charset='UTF-8'>
		<title>Dar de baja activos</title>
		<link rel='stylesheet' href='./../css/bootstrap.css'>
		<link rel='stylesheet' href='./../css/retoques.css'>
		<link rel="stylesheet" href="../css/table.css">
		<script src='./../js/jquery.min-1.7.1-google.js'></script>
		<script src='./../js/bootstrap-2.0.2.js'></script>
		<script src="./../js/table.js"></script>
		<script src="cons_reparacion.js"></script>
	</head>
	<body>

		<div class="well row">
				<legend>Consulta de Traslados</legend>
				<h4 style="margin-left:25px;">Filtros: <small>escoja una opción</small></h4>
				<div class="span3">
					<label class="radio inline"><input type="radio" name="radBus" value="Codigo">Codigo</label>
				</div>
				<div class="span3">
					<label class="radio inline"><input type="radio" name="radBus" value="Nombre" >Nombre</label>
				</div>
				
				<div class="span3">
					<label class="radio inline"><input type="radio" name="radBus" value="Fecha" >Fecha</label>
				</div>
				
				<div class="span3">
					<label class="radio inline"><input type="radio" name="radBus" value="Ubi" >Ubicacion</label>
				</div>
				
				<div class="span12">
					<div class="well" id="filtros"></div>
				</div>
		</div>

		<div class="span12" id="tablaResultado">
		<table data-toggle='table' data-height='500' data-pagination="true" data-page-list="[10, 20, 50, 100]" data-show-toggle='true' data-show-columns='true' data-search='true' data-select-item-name='toolbar1' id="tablaR">
			<thead>
				<tr>
					<th data-field='cod_act'>Código</th>
					<th data-field='nom'>Nombre</th>
					<th data-field='fec' data-visible="false">Fecha</th>
					<th data-field='new_ubi'>Ubicacion</th>
					<th data-field='cod_dep'>Departamento</th>
				</tr>
		 	</thead>
		</table>
		</div>
</body>
</html>