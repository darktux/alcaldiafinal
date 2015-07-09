<?php 
	include('./../php/conexion.php');
	$conn=conectar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Titulo de Perpetuidad</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<link rel="stylesheet" href="./../css/pnotify.custom.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/pnotify.custom.js"></script>
	<script src="./../js/funciones"></script>
	<script src="js/act_titulo_perpetuidad.js"></script>
</head>
<body>
	<form class="form-horizontal well" id="formulario">
		<legend>Actualizar datos de título de puesto a perpetuidad</legend>
		<fieldset>
			<a data-toggle="modal" href="#bus_per" class="btn"><i class="icon-search"></i> Buscar Persona</a>
			<br><br>
			<input type="hidden" id="cod_tit" name="cod_tit">
			<input type="hidden" id="cod_per" name="cod_per">
			<div class="control-group span6">
				<label class="control-label" for="nom">Nombre del propietario (*)</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="nom" name="nom" readonly>
				</div>
			</div>
			<div class="control-group span5">
				<label class="control-label">Cementerio (*)</label>
				<div class="controls">
					<select name="cem" id="cem" class="input-xlarge" readonly>
					<?php 
						$rs=pg_query("SELECT cod_cem,nom_cem FROM ca_cementerio");
						while($row=pg_fetch_array($rs)){
							echo "<option value='$row[0]'>$row[1]</option>";
						}
					?>
					</select>
				</div>
			</div>
			<div class="control-group span6">
				<label class="control-label">DUI (*)</label>
				<div class="controls">
					<input type="text" id="dui" name="dui" readonly>
				</div>
			</div>
			<div class="control-group span5">
				<label class="control-label">No. de nichos autorizados a construir (*)</label>
				<div class="controls">
					<input type="number" class="input-mini" value="1" min="1" max="5" id="nic_aut" name="nic_aut" onkeypress="return validaMonto(event)" onchange="nichos()" readonly>
				</div>
			</div>
			<div class="control-group span6">
				<label class="control-label">Largo del puesto (*)</label>
				<div class="controls">
					<div class="input-append">
						<input type="number" min="0" class="input-mini" id="largo" name="largo" value="0" onkeypress="return validaMonto(event)" readonly>
						<span class="add-on">Mts.</span>
					</div>
				</div>
			</div>	
			<div class="control-group span5">
				<label class="control-label">Ancho del puesto (*)</label>
				<div class="controls">
					<div class="input-append">
						<input type="number" min="0" class="input-mini" id="ancho" name="ancho" value="0" onkeypress="return validaMonto(event)" readonly>
						<span class="add-on">Mts.</span>
					</div>
				</div>
			</div>
			<div class="control-group span6">
				<label class="control-label">Clase (*)</label>
				<div class="controls">
					<select name="clase" id="clase" onchange="nichos()" readonly>
						<option value="Primera">Primera</option>
						<option value="Económica">Económica</option>
						<option value="Fosa Común">Fosa Común</option>
					</select>
				</div>
			</div>
			<div class="control-group span5">
				<label class="control-label">Valor</label>
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on">$</span>
						<input type="text" class="span2" id="valor" name="valor" readonly>
					</div>
				</div>
			</div>
			<div class="control-group span6">
				<label class="control-label">Nº de Recibo de ingreso (*)</label>
				<div class="controls">
					<input type="text" class="span2" id="num_rec" name="num_rec" readonly>
				</div>
			</div>
			<div class="control-group span5">
				<label class="control-label">Fecha del Recibo (*)</label>
				<div class="controls">
					<input type="date" class="span2" id="fec_rec" name="fec_rec" readonly>
				</div>
			</div>
			
			<div><legend style="text-align:left;margin-left:20px;font-size: 18px;">L&iacute;mites</legend></div>
			
			<div class="control-group span6">
				<label class="control-label">Al norte</label>
				<div class="controls">
					<input type="text" placeholder="con el puesto Nº o la calle" id="lim_nor" name="lim_nor">
				</div>
			</div>
			<div class="control-group span5">
				<label class="control-label">Al sur</label>
				<div class="controls">
					<input type="text" placeholder="con el puesto Nº o la calle" id="lim_sur" name="lim_sur">
				</div>
			</div>
			<div class="control-group span6">
				<label class="control-label">Al oriente</label>
				<div class="controls">
					<input type="text" placeholder="con el puesto Nº o la calle" id="lim_est" name="lim_est">
				</div>
			</div>
			<div class="control-group span5">
				<label class="control-label">Al poniente</label>
				<div class="controls">
					<input type="text" placeholder="con el puesto Nº o la calle" id="lim_oes" name="lim_oes">
				</div>
			</div>
			
			<div id="divfallecido">
				<div class="control-group span6" id="divfa1">
					<label class="control-label">Nombre del fallecido</label>
					<div class="controls">
						<input type="text" id="fall1" name="fall1" class="input-xlarge">
					</div>
				</div>
				<div class="control-group span5" id="divfec_fa1">
					<label class="control-label">Fecha de Fallecimiento</label>
					<div class="controls">
						<input type="date" id="fec_fall1" name="fec_fall1" class="span2" value="<?php echo date('Y-m-d') ?>">
					</div>
				</div>
				<div class="control-group span6" id="divfa2" style="display:none;">
					<label class="control-label">Nombre del fallecido en nicho 2</label>
					<div class="controls">
						<input type="text" id="fall2" name="fall2" class="input-xlarge">
					</div>
				</div>
				<div class="control-group span5" id="divfec_fa2" style="display:none;">
					<label class="control-label">Fecha de Fallecimiento</label>
					<div class="controls">
						<input type="date" id="fec_fall2" name="fec_fall2" class="span2" value="<?php echo date('Y-m-d') ?>">
					</div>
				</div>
				<div class="control-group span6" id="divfa3" style="display:none;">
					<label class="control-label">Nombre del fallecido en nicho 3</label>
					<div class="controls">
						<input type="text" id="fall3" name="fall3" class="input-xlarge">
					</div>
				</div>
				<div class="control-group span5" id="divfec_fa3" style="display:none;">
					<label class="control-label">Fecha de Fallecimiento</label>
					<div class="controls">
						<input type="date" id="fec_fall3" name="fec_fall3" class="span2" value="<?php echo date('Y-m-d') ?>">
					</div>
				</div>
				<div class="control-group span6" id="divfa4" style="display:none;">
					<label class="control-label">Nombre del fallecido en nicho 4</label>
					<div class="controls">
						<input type="text" id="fall4" name="fall4" class="input-xlarge">
					</div>
				</div>
				<div class="control-group span5" id="divfec_fa4" style="display:none;">
					<label class="control-label">Fecha de Fallecimiento</label>
					<div class="controls">
						<input type="date" id="fec_fall4" name="fec_fall4" class="span2" value="<?php echo date('Y-m-d') ?>">
					</div>
				</div>
				<div class="control-group span6" id="divfa5" style="display:none;">
					<label class="control-label">Nombre del fallecido en nicho 5</label>
					<div class="controls">
						<input type="text" id="fall5" name="fall5" class="input-xlarge">
					</div>
				</div>
				<div class="control-group span5" id="divfec_fa5" style="display:none;">
					<label class="control-label">Fecha de Fallecimiento</label>
					<div class="controls">
						<input type="date" id="fec_fall5" name="fec_fall5" class="span2" value="<?php echo date('Y-m-d') ?>">
					</div>
				</div>
			</div>
		</fieldset>
		<div class="form-actions offset1">
			<a class="btn" id="btnGuardar"><i class="icon-refresh"></i> Actualizar</a>
			<a class="btn" onclick="limpiarCampos()"><i class="icon-trash"></i> Limpiar</a>
			<a class="btn" onclick="cancela()"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</form>

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
</body>
</html>