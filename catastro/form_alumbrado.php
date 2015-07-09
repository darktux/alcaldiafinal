<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Alumbrado Municipal</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<link rel="stylesheet" href="./../css/fileinput.css">
	<link rel="stylesheet" href="./../css/bootstrap-select.css">
	<link rel="stylesheet" href="./../css/table.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/fileinput.js"></script>
	<script src="./../js/funciones.js"></script>
	<script src="./../js/jquery.maskedinput.js"></script>
	<script src="./../js/bootstrap-select.js"></script>
	<script src="./../js/table.js"></script>
	<script src="js/form_alumbrado.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBp0xi0Mj1DrO0wran3J-9U5Fz-PBt2VjE&sensor=false"></script>
	<script src="js/mapa2.js"></script>
	
</head>
<body onLoad="cargaAlumbrado()" >
	<div class="form-horizontal well">
		<div class="span12">
			<legend>Alumbrado Municipal</legend>
			<div class="control-group">
				<label class="control-label">Dirección (*)</label>
				<div class="controls">
					<textarea class="input-xlarge"  id="sit_en" name="sit_en"></textarea>
						<input type="hidden" id="pos" name="pos" value="<? echo $_GET['pos'] ?>">
						<input type="hidden" id="ico" name="ico" value="<? echo $_GET['ico'] ?>">
						<input type="hidden" id="cod" name="cod" value="<? echo $_GET['cod_alumbrado'] ?>">
					
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Estado (*)</label>
				<div class="controls">
					<label class="radio inline"><input type="radio" id="alum_bueno" name="alum_mun" value="Funcionando" checked >Funcionando</label>
					<label class="radio inline"><input type="radio" id="alum_malo" name="alum_mun" value="Inhabilitada"  >Inhabilitada</label>
				</div>
			</div>
			<div class="span6" style="margin-left:450px; margin-top:-150px">

				<div id="mapa"  class="well" style="height: 150px; width:250px; margin:auto">
				</div>
			</div>
			<div id="divAnadir" class="control-group"></div>
			<div class="form-actions" id="divActions">
				<a class="btn" id="btnGuardar"><img src="./../img/icon-save.png" width="14px" height="14px"> Guardar</a>
				<a class="btn" onclick="limpiarCampos()"><i class="icon-trash"></i> Limpiar</a>
				<a class="btn" onclick="cancela()"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>

	</div>

<div class="span12" id="tablaResultado">
 		<table data-toggle='table' data-height='500' data-pagination="true" data-page-list="[10, 20, 50, 100]" data-show-toggle='true' data-show-columns='true' data-search='true' data-select-item-name='toolbar1' id="tablaR">
 			<thead>
 				<tr>
 					<th data-field='cod_alumbrado'>Correlativo</th>
 					<th data-field='sit_en'>Dirección</th>
 					<th data-field='alum_mun'>Estado</th>
 					<th data-field='acciones'>Acciones</th>
 				</tr>
 			</thead>
 			
 		</table>
  </div>
	
	
</body>
</html>