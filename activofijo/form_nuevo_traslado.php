<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro de Traslados</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./../css/retoques.css">
	<link rel="stylesheet" href="../css/pnotify.custom.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="../js/funciones.js"></script>
	<script src="../js/pnotify.custom.js"></script>
	<script src="form_nuevo_traslado.js"></script>
</head>
<body onload="cargar_sel()">
	<form action="proc_nuevo_traslado.php" method='POST' id="form_traslados" class="well form-horizontal span12">
		<legend>Ingreso de Traslado</legend>
		
		<a href="#bus_act" data-toggle="modal" class="btn"><i class="icon-search"></i>Buscar Activo</a><br><br><br>

	<div class="row">
		<div class="control-group span6">
			<label for="codigo" class="control-label">Codigo  (*)</label>
			<div class="controls">
				<input type="text" name="cod_act" id="cod_act" value='<?php echo $cod_act ?>' readonly/>
			</div>
		</div>

		<div class="control-group span6">
			<label for="nombre" class="control-label">Nombre (*)</label>
			<div class="controls">
				<input type="text" name="nom" id="nom" value='<?php echo $nom ?>' readonly/>	
			</div>
		</div>	
	</div>
		
	<div class="row">
		<div class="control-group span6">
			<label for="nombre" class="control-label">Departamento Actual (*)</label>
			<div class="controls">
				<select type="text" name="depto_act" id="depto_act" readonly disabled></select>
				<!--<a href="#agregar_depto" class="btn" data-toggle="modal"><i class="icon-plus"></i></a>-->
			</div>
		</div>

		<div class="control-group span6">
			<label for="nombre" class="control-label">Fecha (*)</label>
			<div class="controls">
				<input type="date" name="fec" id="fec" value="<?php echo date('Y-m-d')?>"/>	
			</div>
		</div>

	</div>
	
	<div class="row">
		<div class="control-group span6">
			<label for="nombres" class="control-label">Departamento de traslado (*)</label>
			<div class="controls">
				<select type="text" name="depto_tra" id="depto_tra"></select>
				<a href="#agregar_depto" class="btn" data-toggle="modal"><i class="icon-plus"></i></a>
			</div>
		</div>

		<div class="control-group span6">
			<label for="nombre" class="control-label">Ubicación (*)</label>
			<div class="controls">
				<textarea name="new_ubi" id="new_ubi" class="input-xlarge"></textarea>
			</div>
		</div>
	</div>
		
	<div class="row">
		<div class="form-actions span6 offset2">
			<button type="button" class="btn" name="guardar" id="guardar"><img src="../img/icon-save.png" height="14" width="14"> Guardar</button>			
			<button type="reset" class="btn" name="limpiar" id="limpiar"><i class="icon-trash"></i> Limpiar</button>
			<button type="button" class="btn" name="cancelar" id="cancelar"><i class="icon-remove"></i> Cancelar</button>		
		</div>
	</div>
		

	</form>

<!--***********************************************************************************************************************************************-->
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
					<th>Fecha de adquisición</th>
					<th>Seleccionar</th>
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
<div class="modal hide fade" id="agregar_depto" >
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Agregar Departamento</h3>
		</div>
		<div class="modal-body">
			<div class="form-horizontal">

				<!-- <div class="control-group">
					<label for="fec_adq" class="control-label">Codigo</label>
					<div class="controls">
						<input type="text" name="codigo" id="codigo" class="span3"/>
					</div>
				</div> -->

				<div class="control-group">
					<label for="fec_adq" class="control-label">Nombre</label>
					<div class="controls">
						<input type="text" name="nombre" id="nombre" class="span3"/>
					</div>
				</div>				
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" name="guardar_depto" id="guardar_depto"><img src="../img/icon-save.png" height="14" width="14"> Guardar</a>
			<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>
<!--**********************************************************************************************************************************************-->

</body>
</html>