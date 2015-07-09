<?php 
	include('./../php/conexion.php');
	$conn=conectar();
	$sql="SELECT codigo,nom_cue FROM co_impuesto WHERE tip_cob='Fijo'";
	$rs=pg_query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizar datos de Inmueble</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<link rel="stylesheet" href="./../css/bootstrap-select.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/jquery.maskedinput.js"></script>
	<script src="./../js/bootstrap-select.js"></script>
	<script src="js/act_inmueble.js"></script>
</head>
<body>
	<legend style="margin-top:25px;">Actualizar datos de Inmueble</legend>
	<div class="form-horizontal well">	
		<a href="#bus_inm" data-toggle="modal" class="btn"><i class="icon-search"></i> Buscar Inmueble</a>
		<br><br>
		<div class="control-group span6">
			<label class="control-label">Propietario (*)</label>
			<div class="controls">
				<input type="hidden" id="cod_per" name="cod_per" value="<?php echo $_GET['cod_pro'] ?>">
				<input type="text" class="span3" id="nom_per" name="cod_per" readonly>
				<a href="#bus_per" data-toggle="modal" class="btn"><i class="icon-search"></i></a>
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label" for="nombre">C&oacute;digo Catastral (*)</label>
			<div class="controls">
				<input type="text" id="cod_inm" name="cod_inm" value="<?php echo $_GET['cod_inm'] ?>">
			</div>
		</div>
		
		<div class="control-group span6">
			<label class="control-label">Zona (*)</label>
			<div class="controls">
				<label class="radio inline"><input type="radio" id="zon_inmU" name="zon_inm" value="Urbana" >Urbana</label>
				<label class="radio inline"><input type="radio" id="zon_inmR" name="zon_inm" value="Rural" checked >Rural</label>
			</div>
		</div>

		<div class="control-group span5">
			<label class="control-label">Direcci&oacute;n (*)</label>
			<div class="controls">
				<textarea class="input-xlarge" id="dir_inm" name="dir_inm"></textarea>
			</div>
		</div>

		<div class="control-group span6">
			<label class="control-label">Metros a calle (*)</label>
			<div class="controls">
				<div class="input-append">
					<input type="number" class="input-mini" id="med_inm" name="med_inm" value="0">
					<span class="add-on">Mts.</span>
				</div>
			</div>
		</div>

				<legend style="text-align:left;">L&iacute;mites</legend>
		
		<div clas="row">
		<div class="control-group span6">
			<label class="control-label" >Al norte</label>
			<div class="controls">
				<textarea class="input-xlarge" id="lim_nor" name="lim_nor"></textarea>
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label">Al sur</label>
			<div class="controls">
				<textarea class="input-xlarge" id="lim_sur" name="lim_sur"></textarea>
			</div>
		</div>
		<div class="control-group span6">
			<label class="control-label">Al oriente</label>
			<div class="controls">
				<textarea class="input-xlarge" id="lim_est" name="lim_est"></textarea>
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label">Al poniente</label>
			<div class="controls">
				<textarea class="input-xlarge" id="lim_oes" name="lim_oes"></textarea>
			</div>
		</div>
		<div class="control-group span11">
			<label class="control-label">Impuestos a aplicar (*)</label>
			<div class="controls">
				<select name="imp[]" id="imp" class="selectpicker" data-width="285px" multiple data-live-search="true" title="Seleccione una o varias opciones" data-size="5" multiple data-selected-text-format="count>5">
					<?php
					while ($row=pg_fetch_array($rs)) {
						echo "
						<option data-subtext='$row[1]' value='$row[0]'>$row[0]</option>
						";
					}
					pg_close($conn);
					?>
				</select>
			</div>
		</div>
		</div>

		<div class="form-actions offset2">
			<button class="btn" id="btnActualizar" ><i class="icon-refresh"></i> Actualizar</button>
			<button class="btn" onclick="limpiarCampos()"><i class="icon-trash"></i> Limpiar</button>
			<button class=" btn"><i class="icon-remove"></i> Cancelar</button>
		</div>
	</div>


	<div class="modal hide fade" id="bus_per">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Buscar Persona</h3>
		</div>
		<div class="modal-body">
			<div class="well">
				<div class="control-group">
					<strong>Buscar por:</strong><br>
					<label class="radio inline"><input type="radio" name="radBusPer" id="radBusPer" value="DUI">DUI</label>
					<label class="radio inline"><input type="radio" name="radBusPer" id="radBusPer" value="Nombre" checked>Nombre</label>
				</div>
	  			<input type="text" class="search-query" style="width:250px" name="txtBusPer" id="txtBusPer">
	  			<button class="btn" id="btnBusPer"><i class="icon-search"></i> Buscar</button>
			</div>
			<table class="table table-bordered">
				<thead>
					<th>Nombre</th>
					<th>DUI</th>
					<th>NIT</th>
					<th>Agregar</th>
				</thead>
				<tbody id="cuerpo">
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
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