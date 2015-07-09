<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro de activo</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<script src="form_nuevo_usuario.js"></script>
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="../js/funciones.js"></script>
	<script src="form_nuevo_usuario.js"></script>
</head>
<body>
	<form action="proc_nuevo_activo.php" method="post" class="well form-horizontal span12" id="form_nuevo_activo" name="form_nuevo_activo" >
			<legend align="center">Ingreso de Usuarios</legend>
		
		<div class="row">

			<div class="control-group span6">
				<label for="nom" class="control-label">Nombre (*)</label>
				<div class="controls">
					<input type="text" id="nom" name="nom"/>
				</div>
			</div>

			<div class="control-group span6">
				<label for="mar" class="control-label">Correo (*)</label>
				<div class="controls">
					<input type="text" id="cor" name="cor"/>
				</div>
			</div>


		</div>
		
		<div class="row">
			<div class="control-group span6">
				<label for="mar" class="control-label">Usuario (*)</label>
				<div class="controls">
					<input type="text" id="usu" name="usu"/>
				</div>
			</div>

			<div class="control-group span6">
				<label for="mod" class="control-label">Nivel (*)</label>
				<div class="controls">
					<select id="niv" name="niv">
							<option value="0">Seleccione...</option>
							<option value="1">Catastro</option>
							<option value="2">Unidad de la mujer</option>
							<option value="3">Colecturia</option>
							<option value="4">Activo Fijo</option>
							<option value="5">Registro Familiar</option>
							<option value="6">Seguridad</option>
							<option value="7">Administrador</option>
						</select>
				</div>
			</div>
		</div>	

		<div class="row">
			<div class="control-group span6">
				<label for="ser" class="control-label">Contraseña (*)</label>
				<div class="controls">
					<input type="password" id="contra" name="contra"/>
				</div>
			</div>

			<div class="control-group span6">
				<label for="can" class="control-label" >Confirmar contraseña (*)</label>
				<div class="controls">
					<input type="password" id="contra2" name="contra2"/>
				</div>
			</div>			
		</div>

		<div class="row">
			<div class="control-group span6">
				<label for="ser" class="control-label">Preguntas (*)</label>
				<div class="controls">
					<select name="pre" id="pre">
						<option value="seleccione..."></option>
					</select>
				</div>
			</div>

			<div class="control-group span6">
				<label for="can" class="control-label" >respuestas (*)</label>
				<div class="controls">
					<input type="text" id="res" name="res"/>
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
</body>
</html>