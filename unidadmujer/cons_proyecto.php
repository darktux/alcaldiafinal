<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Consulta de Proyecto</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="../css/retoques.css">
	<link rel="stylesheet" href="../css/table.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/table.js"></script>
	<script src="js/cons_proyecto.js"></script>
</head>
<body>
	<div class="well row">
		<legend>Consulta de Proyecto</legend>
		<h4 style="margin-left:25px;">Filtros: <small>escoja una opción</small></h4>
		<div class="span2">
			<label class="radio inline"><input type="radio" name="radBus" value="Proyecto">Proyecto</label>
		</div>
		<div class="span2">
			<label class="radio inline"><input type="radio" name="radBus" value="Estado" >Estado</label>
		</div>
		<div class="span2">
			<label class="radio inline"><input type="radio" name="radBus" value="Fecha" >Rango (Fechas)</label>
		</div>
		<div class="span2">
			<label class="radio inline"><input type="radio" name="radBus" value="Monto" >Rango (Monto)</label>
		</div>
		<div class="span2">
			<label class="radio inline"><input type="radio" name="radBus" value="Fondos" >Tipo de Fondo</label>
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
					<th data-field='cod_pro'>Código</th>
					<th data-field='nom_pro'>Proyecto</th>
					<th data-field='des' data-visible="false">Descripción</th>
					<th data-field='ubi' data-visible="false">Ubicación</th>
					<th data-field='fec_ini'>Fecha de Inicio</th>
					<th data-field='fec_fin'>Fecha de Finalización</th>
					<th data-field='tip_fon'>Tipo de Fondos</th>
					<th data-field='mon_pro'>Fondos Propios</th>
					<th data-field='mon_ext'>Fondos Externos</th>
					<th data-field='pat' data-visible="false">Patrocinadores</th>
					<th data-field='est'>Estado</th>
				</tr>
		 	</thead>
		</table>
	</div>
	
</body>
</html>