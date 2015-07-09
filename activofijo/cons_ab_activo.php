<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Descargo de activo</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./../css/retoques.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="../js/funciones.js"></script>
	<script src="cons_ab_activo.js"></script>
</head>
<body onload="cargar_sel()">
	<form action="proc_cons_ab_activo.php" method="post" class="well form-horizontal span12" id="form_nuevo_activo" name="form_nuevo_activo">
			<legend align="center">Descargo de Activo</legend>

			<a href="#bus_act" data-toggle="modal" class="btn"><i class="icon-search"></i>Buscar Activo</a><br><br><br>

		<div class="row">
			<div class="control-group span6">
				<label for="cod_act" class="control-label">Código</label>
				<div class="controls">
					<input type="text" id="cod_act" name="cod_act" value="870900-00<?php echo date('Y')?>-000000" disabled/>	
				</div>
			</div>

			<div class="control-group span6">
				<label for="nom" class="control-label" >Nombre</label>
				<div class="controls">
					<input type="text" id="nom" name="nom" disabled/>
				</div>
			</div>
		</div>	

		<div class="row">
			<div class="control-group span6">
				<label for="mar" class="control-label">Marca</label>
				<div class="controls">
					<input type="text" id="mar" name="mar" disabled/>
				</div>
			</div>

			<div class="control-group span6">
				<label for="mod" class="control-label">Modelo</label>
				<div class="controls">
					<input type="text" id="mod" name="mod" disabled/>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="control-group span6">
				<label for="ser" class="control-label">Serie</label>
				<div class="controls">
					<input type="text" id="ser" name="ser" disabled/>
				</div>
			</div>

			<div class="control-group span6">
				<label for="cos_adq" class="control-label">Costo de adquisición &nbsp;</label>
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on">$</span>
						<input type="number" id="cos_adq" step="0.01" name="cos_adq" class="span2" disabled/>
					</div>
				</div>
			</div>
		</div>	

			

			<!-- <div class="control-group">
				<label for="ser" class="control-label" >Cantidad</label>
				<div class="controls">
					<input type="number" id="can" min="1" class="span2" name="can"/>
				</div>
			</div> -->

			<!-- <div class="control-group">
				<label for="cod_act" class="control-label">Ubicación</label>
				<div class="controls">
					<textarea name="ubi" id="ubi" class="input-xlarge"></textarea>
				</div>
			</div> -->
		<div class="row">
			

			<div class="control-group span6">
				<label for="fec_adq" class="control-label">Origen</label>
				<div class="controls">
					<label class='radio'><input type='radio' name='ori' id='ori_d' onChange="ocultar()" value='donado' checked disabled>Donado</label>
		  			<label class='radio'><input type='radio' name='ori' id='ori_c' onChange="ocultar()" value='comprado' disabled>Comprado</label>
				</div>
			</div>
			
			<div class="control-group span6" id="div_tfondo">
				<label for="fec_adq" class="control-label">Tipo de fondo</label>
				<div class="controls">
					<select name="tfondo" id="tfondo" disabled>
						<!--<option value="0">Seleccione...</option>-->
					</select>
					<!--<a href="#agregar_tfondo"class="btn" data-toggle="modal"><i class="icon-plus"></i></a>-->
				</div>
			</div>

			<div class="control-group span6" id="div_donado">
				<label for="don" class="control-label">Donado por:</label>
				<div class="controls">
					<input type="text" name="don" id="don" class="span3" disabled>
				</div>
			</div>

		</div>
			
		<div class="row">
			

			<div class="control-group span6">
				<label for="fec_adq" class="control-label">Fecha de adquisición</label>
				<div class="controls">
					<input type="date" name="fec_adq" id="fec_adq" value="<?php echo date('Y-m-d')?>" disabled/>
				</div>
			</div>

			<div class="control-group span6">
				<label for="fec_adq" class="control-label">Fecha de vencimiento de garantia</label>
				<div class="controls">
					<input type="date" name="fec_gar" id="fec_gar" value="<?php echo date('Y-m-d')?>" disabled/>
				</div>
			</div>
		</div>
			
		<div class="row">
			<div class="form-actions span6 offset2">
				<a href="#motivo_des" data-toggle="modal" class="btn"><i class="icon-arrow-down"></i>Descargo</a>
				<!--<button type="button" class="btn" name="descargo"><i class="icon-arrow-down"></i> Descargo</button>-->			
				<button type="reset" class="btn" name="limpiar" id="limpiar"><i class="icon-trash"></i> Limpiar</button>
				<button type="button" class="btn" name="cancelar" id="cancelar"><i class="icon-remove"></i> Cancelar</button>		
			</div>
		</div>
			
	</form>
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
					<th>Depto.</th>
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
	<div class="modal hide fade" id="agregar_tfondo" >
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Agregar Tipo de Fondo</h3>
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
						<input type="text" name="nombre_tfondo" id="nombre_tfondo" class="span3"/>
					</div>
				</div>

				<div class="control-group">
					<label for="descripcion" class="control-label">Descripción</label>
					<div class="controls">
						<textarea name="descripcion" id="descripcion" class="input-xlarge"></textarea>
					</div>
				</div>

			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" name="guardar_tfondo" id="guardar_tfondo"><img src="../img/icon-save.png" height="14" width="14"> Guardar</a>
			<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>
<!--**********************************************************************************************************************************************-->

<div class="modal hide fade" id="motivo_des" >
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>¿En realidad desea descargar este activo?</h3>
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
					<label for="fec_adq" class="control-label">Motivo</label>
					<div class="controls">
						<textarea name="mot" id="mot" class="input-xlarge"></textarea>
					</div>
				</div>				
				<div class="control-group">
					<label for="fec_des" class="control-label">Fecha</label>
					<div class="controls">
						<input type="date" name="fec_des" id="fec_des" value="<?php echo date('Y-m-d')?>"/>
					</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" name="guardar_depto" id="descargo"><img src="../img/icon-save.png" height="14" width="14"> Guardar</a>
			<a href="#" class="btn" data-dismiss="modal" id="can_mot"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>
<!--**********************************************************************************************************************************************-->
</body>
</html>