<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Cementerios Municipales</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="../css/retoques.css">
	<link rel="stylesheet" href="./../css/pnotify.custom.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/pnotify.custom.js"></script>
	<script src="./../js/funciones"></script>
	<script src="js/form_cementerio.js"></script>
</head>
<body onLoad="cargaCementerio()">
	
	<div class="well form-horizontal">
		<legend>Cementerios Municipales</legend>
		<fieldset>
			<div class="span11">
				<div class="control-group">
					<label class="control-label">Nombre del cementerio (*)</label>
					<div class="controls">
						<input type="text" id="nom_cem" name="nom_cem" class="input-xlarge">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Dirección (*)</label>
					<div class="controls">
						<textarea class="input-xlarge"  id="sit_en" name="sit_en"></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Zona (*)</label>
					<div class="controls">
						<label class="radio inline"><input type="radio" id="zon_cemU" name="zon_cem" value="Urbana" >Urbana</label>
						<label class="radio inline"><input type="radio" id="zon_cemR" name="zon_cem" value="Rural" checked >Rural</label>
					</div>
				</div>
			</div>
			<div class="tabbable">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#divPC">Primera Clase (*)</a></li>
					<li><a data-toggle="tab" href="#divCE">Clase Económica (*)</a></li>
					<li><a data-toggle="tab" href="#divFC">Fosa Común (*)</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="divPC">
						<div class="control-group span5">
							<label class="control-label">Precio del nicho (*)</label>
							<div class="controls">
								<div class="input-prepend">
									<span class="add-on">$</span>
									<input type="text" class="span2" id="pre_nicPC" name="pre_nicPC" value="0" onkeypress="return validaMonto(event)">
								</div>
							</div>
						</div>
						<div class="control-group span6">
							<label class="control-label">Precio del segundo nicho en adelante (*)</label>
							<div class="controls">
								<div class="input-prepend">
									<span class="add-on">$</span>
									<input type="text" class="span2" id="pre_nic2PC" name="pre_nic2PC" value="0" onkeypress="return validaMonto(event)">
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="divCE">
						<div class="control-group span5">
							<label class="control-label">Precio del nicho (*)</label>
							<div class="controls">
								<div class="input-prepend">
									<span class="add-on">$</span>
									<input type="text" class="span2" id="pre_nicCE" name="pre_nicCE" value="0" onkeypress="return validaMonto(event)">
								</div>
							</div>
						</div>
						<div class="control-group span6">
							<label class="control-label">Precio del segundo nicho en adelante (*)</label>
							<div class="controls">
								<div class="input-prepend">
									<span class="add-on">$</span>
									<input type="text" class="span2" id="pre_nic2CE" name="pre_nic2CE" value="0" onkeypress="return validaMonto(event)">
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="divFC">
						<div class="control-group span5">
							<label class="control-label">Precio del nicho (*)</label>
							<div class="controls">
								<div class="input-prepend">
									<span class="add-on">$</span>
									<input type="text" class="span2" id="pre_nicFC" name="pre_nicFC" value="0" onkeypress="return validaMonto(event)">
								</div>
							</div>
						</div>
						<div class="control-group span6">
							<label class="control-label">Precio del segundo nicho en adelante (*)</label>
							<div class="controls">
								<div class="input-prepend">
									<span class="add-on">$</span>
									<input type="text" class="span2" id="pre_nic2FC" name="pre_nic2FC" value="0" onkeypress="return validaMonto(event)">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</fieldset>
		<div id="divAnadir" class="offset2"></div>
		<div class="form-actions" id="divActions">
			<a class="btn offset2" id="btnGuardar"><img src="./../img/icon-save.png" width="14px" height="14px"> Guardar</a>
			<a class="btn" onclick="limpiarCampos()"><i class="icon-trash"></i> Limpiar</a>
			<a class="btn" onclick="cancela()"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>
	

	<div class="well">
 		<table class="table table-bordered">
 			<thead>
 				<tr>
 					<th>Cementerio</th>
                    <th>Dirección</th>
 					<th>Zona</th>
 				</tr>
 			</thead>
 			<tbody id="cuerpo_com">
 			</tbody>
 		</table>
  </div>
	
</body>
</html>