<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro de activo</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="../js/funciones.js"></script>
	<script src="form_ab_usuario.js"></script>
</head>
<body>
	<form action="proc_nuevo_activo.php" method="post" class="well form-horizontal span12" id="form_nuevo_activo" name="form_nuevo_activo" >
			<legend align="center">Alta y baja de Usuarios</legend>
		<input type="hidden" name="cod" id="cod">
		<input type="hidden" name="act" id="act">
		<a href="#bus_usu" data-toggle="modal" class="btn"><i class="icon-search"></i>Buscar Usuario</a><br><br><br>
		<div class="row">

			<div class="control-group span6">
				<label for="nom" class="control-label">Nombre</label>
				<div class="controls">
					<input type="text" id="nom" name="nom" disabled="disabled"/>
				</div>
			</div>

			<div class="control-group span6">
				<label for="mar" class="control-label">Correo</label>
				<div class="controls">
					<input type="text" id="cor" name="cor" disabled="disabled"/>
				</div>
			</div>


		</div>
		
		<div class="row">
			<div class="control-group span6">
				<label for="mar" class="control-label">Usuario</label>
				<div class="controls">
					<input type="text" id="usu" name="usu" disabled="disabled"/>
				</div>
			</div>

			<div class="control-group span6">
				<label for="mod" class="control-label">Nivel</label>
				<div class="controls">
					<select id="niv" name="niv" disabled="disabled">
							<option value="0">Seleccione...</option>
							<option value="1">Catastro</option>
							<option value="2">Unidad de la mujer</option>
							<option value="3">Colecturia</option>
							<option value="4">Activo Fijo</option>
							<option value="5">Registro Familiar</option>
							<option value="6">Seguridad</option>
						</select>
				</div>
			</div>
		</div>	

		<div class="row">
			<div class="control-group span6">
				<label for="ser" class="control-label">Contraseña</label>
				<div class="controls">
					<input type="password" id="contra" name="contra" disabled="disabled"/>
				</div>
			</div>

			<div class="control-group span6">
				<label for="can" class="control-label" >Confirmar contraseña</label>
				<div class="controls">
					<input type="password" id="contra2" name="contra2" disabled="disabled"/>
				</div>
			</div>			
		</div>

		
			
			
		<div class="row">
			<div class="form-actions span6 offset2">
				<button type="button" class="btn" name="guardar" id="guardar"><i class="icon-arrow-down"></i> Dar de baja</button>			
				<button type="reset" class="btn" name="limpiar" id="limpiar"><i class="icon-trash"></i> Limpiar</button>
				<button type="button" class="btn" name="cancelar" id="cancelar"><i class="icon-remove"></i> Cancelar</button>		
			</div>
		</div>
	</form>



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
<!--**********************************************************************************************************************************************-->
<!-- <ul class="nav nav-tabs">
  <li class="active">
    <a href="#">Home</a>
  </li>
  <li><a href="#">...</a></li>
  <li><a href="#">...</a></li>
</ul> -->
	<div class="modal hide fade" id="bus_usu" >
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Busqueda de Usuarios</h3>
		</div>
		<div class="modal-body">
			<div class="well">
				<div class="control-group">
					<strong>Buscar por:</strong><br>
					<label class="radio inline"><input type="radio" name="radBusBen" id="radBusBen" value="nombre">Nombre</label>
					<label class="radio inline"><input type="radio" name="radBusBen" id="radBusBen" value="usuario" checked>Usuario</label>
				</div>
	  			<input type="text" class="search-query" style="width:250px" name="txtBusBen" id="txtBusBen">
	  			<button class="btn" id="btnBusBen"><i class="icon-search"></i> Buscar</button>
			</div>
			<ul class="nav nav-tabs">
				<li class="active" >
					<a href="#activo" data-toggle="tab">Activos</a>
				</li>
				<li >
					<a href="#inactivo" data-toggle="tab">Inactivos</a>
				</li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="activo">
					<table class="table table-bordered">
						<thead>
							<th>Nombre</th>
							<th>Email</th>
							<th>Usuario</th>
							<th>Seleccionar</th>
						</thead>
						<tbody id="cuerpo1">
						</tbody>
					</table>
				</div>

				<div class="tab-pane" id="inactivo">
					<table class="table table-bordered">
						<thead>
							<th>Nombre</th>
							<th>Email</th>
							<th>Usuario</th>
							<th>Seleccionar</th>
						</thead>
						<tbody id="cuerpo2">
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
		<div class="modal-footer">
			<!-- <a href="#" class="btn"><i class="icon-plus"></i> Añadir</a> -->
			<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>

	
		
	
<!--**********************************************************************************************************************************************-->
</body>
</html>