<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Activos en Mantenimiento</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<link rel="stylesheet" href="../css/table.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="../js/funciones.js"></script>
	<script src="./../js/table.js"></script>
	<script src="cons_depreciacion.js"></script>
<body>
	<form class='well form-search'>
		<legend>Depreciación</legend>
		<a href="#bus_act" data-toggle="modal" class="btn"><i class="icon-search"></i>Buscar Activo</a><br><br><br>
	</form>

	<div id="cabecera" >
		<h4>hola</h4>
	</div>

	<div class="span12" id="tablaResultado">
		<table data-toolbar="#cabecera" data-toggle='table' data-height='500' data-pagination="true" data-page-list="[10, 20, 50, 100]" data-show-toggle='true' data-show-columns='true' data-search='true' data-select-item-name='toolbar1' id="tablaR">
			<thead>
				<tr>
					<th>Año</th>
					<th>Depreciacion Anual</th>
					<th>Depreciacion Acumulado</th>
					<th>Valor en libros</th>
				</tr>
		 	</thead>
		</table>
	</div>

	<!-- <table class="table table-bordered">
		<thead>
			<th>Año</th>
			<th>Depreciación Anual</th>
			<th>Depreciación Acumulada</th>
			<th>Valor en Libros</th>
		</thead>
	</table> -->
</body>
</html>


<!--**********************************************************************************************************************************************-->
	<div class="modal hide fade" id="bus_act" >
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Busqueda de Activo</h3>
		</div>
		<div class="modal-body">
			<div class="well">
				<div class="control-group">
					<strong>Buscar por:</strong><br>
					<label class="radio inline"><input type="radio" name="radBusBen" id="radBusBen" value="codigo">Codigo</label>
					<label class="radio inline"><input type="radio" name="radBusBen" id="radBusBen" value="nombre" checked>Nombre</label>
				</div>
	  			<input type="text" class="search-query" style="width:250px" name="txtBusBen" id="txtBusBen">
	  			<button class="btn" id="btnBusBen"><i class="icon-search"></i> Buscar</button>
			</div>
			<table class="table table-bordered">
				<thead>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Marca</th>
					<th>Fecha Adquisición</th>
					<th>Agregar</th>
				</thead>
				<tbody id="cuerpo">
					
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<!-- <a href="#" class="btn"><i class="icon-plus"></i> Añadir</a> -->
			<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>
<!--**********************************************************************************************************************************************-->
