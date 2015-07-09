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
		<script src="bitacora.js"></script>
	</head>
	<body>

		<div class="well row">
				<legend>Bitácora</legend>
				<h4 style="margin-left:25px;"><small></small></h4>
				<div class="span3">
					<label class="radio inline">Unidades:<select class="radio inline" name="usuario" id="usuario" onchange='buscarDatos2()'>
						<option value="0">Seleccione...</option>
						<option value="1">Catastro</option>
						<option value="2">Unidad de género</option>
						<option value="3">Colecturia</option>
						<option value="4">Activo fijo</option>
						<option value="5">Registro familiar</option>
						<option value="6">Seguridad</option>
					</select></label>
				</div>
				<div class="span3">
					<!--<label class="radio inline">Fecha<input type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d') ?>" ></label>-->
				</div>
				
				
		</div>

		<div class="span12" id="tablaResultado">
		<table data-toggle='table' data-height='500' data-pagination="true" data-page-list="[10, 20, 50, 100]" data-show-toggle='true' data-show-columns='true' data-search='true' data-select-item-name='toolbar1' id="tablaR">
			<thead>
				<tr>
					
					<th data-field='nom'>Nombre</th>
					<th data-field='accion' >Accion</th>
					<th data-field='fecha'>Fecha</th>
					<th data-field='hora'>Hora</th>
					
				</tr>
		 	</thead>
		</table>
		</div>

		<!--<form action='form_nuevo_traslado.php' method='POST' class='well form-search span12'>
			  <legend>Busqueda de Activo</legend>
			  <div class='control-group'>
			  	<strong>Buscar por:</strong>
			  	<label class='radio'><input type='radio' name='buspor' value='Código'>Código</label>
			  	<label class='radio'><input type='radio' name='buspor' value='Nombre'>Nombre</label>
			  	<label class='radio'><input type='radio' name='buspor' value='Nombre'>Marca</label>
			  	<label class='radio'><input type='radio' name='buspor' value='Nombre'>Depto.</label>
			  	<label class='radio'><input type='radio' name='buspor' value='Nombre'>Fecha de Adquisición</label>
			  	<label class='radio'><input type='radio' name='buspor' value='Nombre' checked>Caducidad de garantia</label>
			  </div>

			  <input type='text' class='input-xlarge search-query' name='bus_act' id='bus_act'>
			  <button type='submit' class='btn'><i class='icon-search'></i> Buscar</button>
		</form>

		<form action='proc_ab_activo.php' method='post' id='ab' name='ab' class='well form-horizontal span12' style='background-color: transparent;'>
			<legend>Descargo de Activo</legend>
	 
	 		<input type='hidden' value='' name='opt' id='opt'/>
	 		<input type='hidden' value='' name='opt2' id='opt2'/>

	 		<div class='tab-content'>
			  <div class='tab-pane active' id='altas'>
			  	<table class='table table-bordered'>
					<thead>
						<th>Codigo</th>
						<th>Nombre</th>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Serie</th>
						<th>depto.</th>
						<th>Costo de adquisicion</th>
						<th>Fecha de adquisicion</th>
						<th>Descargo</th>
					</thead>
					<tbody>
						<tr>
							<td>23654789-9</td>
							<td>Mesa ejecutiva</td>
							<td>blogger</td>
							<td></td>
							<td></td>
							<td>Catastro</td>
							<td></td>
							<td></td>
							<td>
								<a href="#comentario" class="btn" data-toggle="modal"><i class='icon-arrow-down'></i></a>
							</td>
						</tr>
					</tbody>
				</table>
			  </div>
			</div>
		</form>-->

<!--************************************************************************************************************-->	
	<div class="modal hide fade" id="comentario" >
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>¿Por que descarga este activo?</h3>
		</div>
		<div class="modal-body">
			<div class="form-horizontal">

				<div class="control-group">
					<label for="fec_adq" class="control-label">Comentario</label>
					<div class="controls">
						<textarea name="comen" id="comen" class="input-xlarge"></textarea>
					</div>
				</div>				

			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn"><img src="../img/icon-save.png" height="14" width="14"> Guardar</a>
			<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>
<!--*************************************************************************************************************-->	

</body>
</html>