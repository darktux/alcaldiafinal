<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Consulta de Contribuyentes</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="../css/retoques.css">
	<link rel="stylesheet" href="../css/table.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/table.js"></script>
	<script src="js/cons_contribuyente.js"></script>
</head>
<body>
	<div class="well row">
		<legend>Consulta de Contribuyente</legend>
		<h4 style="margin-left:25px;">Filtros: <small>escoja una opción</small></h4>
		<!-- <div class="span2">
			<label class="radio inline"><input type="radio" name="radBus" value="Nombre">Nombre</label>
		</div> -->
		<!-- <div class="span2">
			<label class="radio inline"><input type="radio" name="radBus" value="Negocio" >Negocio</label>
		</div> -->
		<!-- <div class="span2">
			<label class="radio inline"><input type="radio" name="radBus" value="Inmueble" >Inmueble</label>
		</div> -->
		<div class="span2">
			<!-- <label class="radio inline"><input type="radio" name="radBus" value="tipocon" >Tipo de Contribuyente</label> -->
			<label class='radio inline'><input type='radio' name='bustipcon' id='bustipcon' value='N' onchange='buscarDatos()'>Persona Natural</label>
		</div>
		<div class="span2">
			<!-- <label class="radio inline"><input type="radio" name="radBus" value="cuenta" >Estado de Cuenta</label> -->
			<label class='radio inline'><input type='radio' name='bustipcon' id='bustipcon' value='J' onchange='buscarDatos()'>Persona Jurídica</label>
		</div>
		<div class="span2">
			<!-- <label class="radio inline"><input type="radio" name="radBus" value="tipocon" >Tipo de Contribuyente</label> -->
			<label class='radio inline'><input type='radio' name='bustipcon' id='bustipcon' value='T' onchange='buscarDatos()'>Todos</label>
		</div>
		<!-- <div class="span12">
			<div class="well" id="filtros"></div>
		</div> -->
	</div>


		<div class="span12" id="tablaResultado">
		<table data-toggle='table' data-height='500' data-pagination="true" data-page-list="[10, 20, 50, 100]" data-show-toggle='true' data-show-columns='true' data-search='true' data-select-item-name='toolbar1' id="tablaR">
			<thead>
				<tr>
					<th data-field='propietario'>Contribuyente</th>
					<!-- <th data-field='ape1' >Primer Apellido</th>
					<th data-field='ape2' >Segundo Apellido</th> -->
					<!-- <th data-field='sex'>Sexo</th> -->
					<th data-field='fec_nac'>Fecha de Nacimiento/Constitución</th>
					<!-- <th data-field='dui'>DUI</th> -->
					<th data-field='nit'>NIT</th>
					<th data-field='tel1'>Teléfono</th>
					<!-- <th data-field='tel2' data-visible="false">Teléfono 2</th> -->
					<th data-field='dir' data-visible="false">Dirección</th>
					<!-- <th data-field='nom_neg' data-visible="false">Negocio</th>
					<th data-field='cod_inm' data-visible="false">Código Catastral</th> -->
				</tr>
		 	</thead>
		</table>
		</div>
		
	</div>
	
</body>
</html>