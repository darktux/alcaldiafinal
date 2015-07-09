<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Registro de activo</title>
		<link rel="stylesheet" href="./../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="./../css/retoques.css">
		<link rel="stylesheet" href="../css/pnotify.custom.css">
		<script src="./../js/jquery.min-1.7.1-google.js"></script>
		<script src="./../js/bootstrap-2.0.2.js"></script>
		<script src="./../js/jquery.maskedinput.js"></script>
		<script src="../js/funciones.js"></script>
		<script src="../js/pnotify.custom.js"></script>
		<script src="form_nuevo_mantenimiento.js"></script>

	</head>
	<body>
		<form action="proc_nuevo_mantenimiento.php" method="post" id="form_mantenimiento" class="well form-horizontal span12">
				<legend>Ingreso de Reparación</legend>
				
				<a href="#bus_act" data-toggle="modal" class="btn"><i class="icon-search"></i>Buscar Activo</a><br><br><br>

			<div class="row">
				<div class="control-group span6">
					<label for="cod_act" class="control-label">Código (*)</label>
					<div class="controls">
						<input type="text" name="cod_act" id="cod_act" disabled/>
					</div>
				</div>

				<div class="control-group span6">
					<label for="nom_act" class="control-label">Nombre (*)</label>
					<div class="controls">
						<input type="text" name="act" id="nom" disabled/>
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="control-group span6">
					<label for="fec" class="control-label">Fecha (*)</label>
					<div class="controls">
						<input type="date" id='fec' name="fec" id="fec" value="<?php echo date('Y-m-d')?>"/>
					</div>
				</div>

				<div class="control-group span6">
					<label for="descripcion" class="control-label">Descripción (*)</label>
					<div class="controls">
						<textarea name="des" class="input-xlarge" id="des"></textarea>	
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="control-group span6">
					<label for="appendedPrependedInput" class="control-label">Costo (*)</label>
					<div class="controls">
					<div class="input-prepend input-append">	
						<span class="add-on">$</span>
						<input class="span2" type="text" name="cos" id="cos"/>
					</div>
					</div>
				</div>

				<div class="control-group span6">
					<label for="empresa" class="control-label">Empresa (*)</label>
					<div class="controls" id="empre">
						<select name="emp" id="emp">
							<option value="">seleccione...</option>
						</select>
						<a href="#agregar_emp"class="btn" data-toggle="modal"><i class="icon-plus"></i></a>
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
					<th>Depto.</th>
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
	<!--***********************************************************************************************************************************************-->			

<div class="modal hide fade" id="agregar_emp" >
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Agregar Empresa</h3>
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
						<input type="text" name="nom_emp" id="nom_emp" class="span3"/>
					</div>
				</div>

				<div class="control-group">
					<label for="descripcion" class="control-label">Direccion</label>
					<div class="controls">
						<textarea name="dire" id="dire" class="input-xlarge"></textarea>
					</div>
				</div>

				<div class="control-group">
					<label for="descripcion" class="control-label">Telefono</label>
					<div class="controls">
						<input type="text" name="tel" id="tel" class="span3"/>
					</div>
				</div>

				<div class="control-group">
					<label for="descripcion" class="control-label">NIT</label>
					<div class="controls">
						<input type="text" name="nit" id="nit" class="span3"/>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" name="guardar_emp" id="guardar_emp"><img src="../img/icon-save.png" height="14" width="14"> Guardar</a>
			<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>


	</body>
</html>