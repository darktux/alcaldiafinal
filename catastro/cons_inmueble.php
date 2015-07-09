<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Consulta de Inmueble</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="../css/retoques.css">
	<link rel="stylesheet" href="../css/table.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/table.js"></script>
	<script src="./../js/jquery.maskedinput.js"></script>
	<script src="js/cons_inmueble.js"></script>
</head>
<body>
	<div class="well row">
		<legend>Consulta de Inmueble</legend>
		<h4 style="margin-left:25px;">Filtros: <small>escoja una opción</small></h4>
		<div class="span3">
			<label class="radio inline"><input type="radio" name="radBus" value="Zona">Zona</label>
		</div>
		<div class="span3">
			<label class="radio inline"><input type="radio" name="radBus" value="Rango" >Rango (Mts. a calle)</label>
		</div>
		<div class="span3">
			<label class="radio inline"><input type="radio" name="radBus" value="propietario" >Propietario</label>
		</div>
		
		<div class="span12">
			<div class="well" id="filtros">
			</div>
		</div>
	</div>


		<div class="span12" id="tablaResultado">
		<table data-toggle='table' data-height='500' data-pagination="true" data-page-list="[10, 20, 50, 100]" data-show-toggle='true' data-show-columns='true' data-search='true' data-select-item-name='toolbar1' id="tablaR">
			<thead>
				<tr>
					<th data-field='cod_inm'>Código Catastral</th>
					<th data-field='zon_inm'>Zona</th>
					<th data-field='dir_inm'>Dirección</th>
					<th data-field='med_inm'>Mts. a Calle</th>
					<th data-field='propietario'>Propietario</th>
				</tr>
		 	</thead>
		</table>
		</div>
		
	</div>
	
</body>
</html>