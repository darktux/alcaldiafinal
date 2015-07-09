<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Proyecto</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<link rel="stylesheet" href="./../css/pnotify.custom.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/jquery.maskedinput.js"></script>
	<script src="./../js/pnotify.custom.js"></script>
	<script src="./../js/funciones.js"></script>
	<script src="js/form_proyecto.js"></script>
</head>

<body>
	<div id="form_proyecto" class="well form-horizontal">
		<legend>Agregar Proyecto</legend>
		<div class="tabbable tabs-left">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#1" data-toggle="tab">Datos de Proyecto</a></li>
				<li><a href="#2" data-toggle="tab" onclick="vermsj()">Colaboradores</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="1">
					<div class="control-group span5" style="width: 400px;">
						<label class="control-label" for="cod_pro" style="width:100px;">Código (*)</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="cod_pro" id="cod_pro">
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" for="nom_pro" style="width:100px;">Nombre (*)</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="input-xlarge" name="nom_pro" id="nom_pro">
						</div>
					</div>
					<div class="control-group span5" style="width: 400px;">
						<label class="control-label" for="des" style="width:100px;">Descripci&oacute;n</label>
						<div class="controls" style="margin-left:100px;">
							<textarea class="input-xlarge" name="des" id="des" ></textarea>
						</div>
					</div>	
					
					<div class="control-group span4">
						<label class="control-label" for="ubi" style="width:100px;">Ubicaci&oacute;n (*)</label>
						<div class="controls" style="margin-left:100px;">
							<textarea type="text" class="input-xlarge" name="ubi" id="ubi" ></textarea>
						</div>
					</div>

					
						<div class="control-group span5" style="width: 400px;">
							<label class="control-label" for="fec_ini" style="width:100px;">Fecha de Inicio (*)</label>
							<div class="controls" style="margin-left:100px;">
								<input type="date" name="fec_ini" id="fec_ini" style="width:130px;" onBlur="compararFechaI()">
							</div>
						</div>
						<div class="control-group span4">
							<label class="control-label" for="fec_fin" style="width:100px;">Fecha de Fin (*)</label>
							<div class="controls" style="margin-left:100px;">
								<input type="date" name="fec_fin" id="fec_fin" style="width:130px;" onBlur="compararFechaF()">
							</div>
						</div>
					
					
					<div class="control-group span10">
						<label class="control-label" style="width:100px;">Tipo de Fondos</label>
						<div class="controls" style="margin-left:100px;">
							<label class="radio inline"><input type="radio" name="tip_fon" id="tip_fon" value="Propios"  onchange="mostrarTipoMonto()">Propios</label>
							<label class="radio inline"><input type="radio" name="tip_fon" id="tip_fon" value="Externos" checked onchange="mostrarTipoMonto()">Externos</label>
							<label class="radio inline"><input type="radio" name="tip_fon" id="tip_fon" value="Combinados" onchange="mostrarTipoMonto()">Mixtos</label>
						</div>
					</div>
					<div class="control-group span5" id="div_montop"  style="display:none;width: 400px;">
						<label class="control-label" for="mon_pro" id="labelmp" style="width:100px;">Monto (*)</label>
						<div class="controls" style="margin-left:100px;">
							<div class="input-prepend">
								<span class="add-on">$</span>
								<input type="text" class="span2" name="mon_pro" id="mon_pro" value="0">
							</div>
						</div>
					</div>
					<div class="control-group span5" id="div_montoe">
						<label class="control-label" for="mon_ext" id="labelme" style="width:100px;">Monto (*)</label>
						<div class="controls" style="margin-left:100px;">
							<div class="input-prepend">
								<span class="add-on">$</span>
								<input type="text" class="span2" name="mon_ext" id="mon_ext" value="0">
							</div>
						</div>
					</div>

					<div class="control-group span10">
						<label class="control-label" for="pat" style="width:100px;">Patrocinadores</label>
						<div class="controls" style="margin-left:100px;">
							<textarea class="input-xlarge" name="pat" id="pat" placeholder="Instituciones que apoyan el proyecto"></textarea>
						</div>
					</div>
					<div class="control-group span10">
						<label class="control-label" style="width:100px;">Estado</label>
						<div class="controls" style="margin-left:100px;">
							<select name="est" id="est">
								<option value="En espera">En espera</option>
								<option value="En ejecución">En ejecución</option>
								<option value="Pausado">Pausado</option>
								<option value="Finalizado">Finalizado</option>
							</select>
						</div>
					</div>
					<!-- <p class="pull-right"><a data-toggle="tab" href="#2" class="btn">Guardar y Continuar <i class="icon-arrow-right"></i></a></p> -->
				</div>

				<div class="tab-pane" id="2">
					<div id="div_col">
					<a data-toggle="modal" href="#bus_per2" class="btn"><i class="icon-search"></i> Buscar Persona</a>
					<br><br> 
					<input type="hidden" id="cod_col">
					<div class="control-group span5">
						<label class="control-label" for="nom_col" style="width:100px;">Nombre (*)</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="nom_col" id="nom_col">
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" for="ape1_col" style="width:100px;">Primer Apellido (*)</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="ape1_col" id="ape1_col">
						</div>
					</div>
					<div class="control-group span5">
						<label class="control-label" for="ape2_col" style="width:100px;">Segundo Apellido</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="ape2_col" id="ape2_col">
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" for="sex_col" style="width:100px;">Sexo (*)</label>
						<div class="controls" style="margin-left:100px;">
							<label class="radio inline"><input type="radio" name="sex_col" id="sex_colM" value="M">Masculino</label>
							<label class="radio inline"><input type="radio" name="sex_col" id="sex_colF" value="F" checked>Femenino</label>
						</div>
					</div>
					<div class="control-group span5">
						<label class="control-label" style="width:100px;">Nacimiento (*)</label>
						<div class="controls" style="margin-left:100px;">
							<input type="date" id="fec_nac" name="fec_nac">
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" for="dui_col" style="width:100px;">DUI (*)</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="dui_col" id="dui_col">
						</div>
					</div>
					<div class="control-group span5">
						<label class="control-label" for="nit_col" style="width:100px;">NIT</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="nit_col" id="nit_col" >
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" for="tel1_col" style="width:100px;">Teléfono 1 (*)</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="tel1_col" id="tel1_col" >
							<!-- <a href="#" class="btn"><i class="icon-plus"></i></a> -->
						</div>
					</div>
					<div class="control-group span5">
						<label class="control-label" for="tel2_col" style="width:100px;">Teléfono 2</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="tel2_col" id="tel2_col" >
							<!-- <a href="#" class="btn"><i class="icon-plus"></i></a> -->
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" for="dep" style="width:100px;">Departamento (*)</label>
						<div class="controls" style="margin-left:100px;">
							<select name="dep" id="dep" onChange="cargarMunicipios('dep','mun')">
							</select>
						</div>
					</div>
					<div class="control-group span5">
						<label class="control-label" for="mun" style="width:100px;">Municipio (*)</label>
						<div class="controls" style="margin-left:100px;">
							<select id="mun" name="mun">
							</select>
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" for="dir_col" style="width:100px;">Direcci&oacute;n (*)</label>
						<div class="controls" style="margin-left:100px;">
							<textarea class="input-large" name="dir_col" id="dir_col"></textarea>
						</div>
					</div>
					<div class="control-group span5">
						<label class="control-label" style="width:100px;">Cargo para el proyecto (*)</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="car_col" id="car_col">
						</div>
					</div>

					<div class="control-group span4">
						<label class="control-label" style="width:100px;">Salario</label>
						<div class="controls" style="margin-left:100px;">
							<div class="input-prepend">
								<span class="add-on">$</span>
								<input type="text" class="span2" name="sal_col" id="sal_col" value="0">
							</div>
						</div>
					</div>
					</div>
					<div class="control-group span10">
						<div class="controls">
							<a href="#addCol" class="btn offset1" id="addCol" onclick="agregar()"><i class="icon-plus"></i> Añadir</a>
						</div>
					</div>

					<table class="table table-bordered" id="tabla_col">
						<thead>
							<th>Nombre</th>
							<th>Cargo</th>
							<th>Salario</th>
						</thead>
						<tbody id="cuerpo_col">
						</tbody>
					</table>

					<div class="form-actions">
						<button class="btn" id="btnGuardar"><img src="../img/icon-save.png" height="14" width="14"> Guardar</button>
						<button class="btn" onclick="cancela()"><i class="icon-remove"></i> Cancelar</button>
					</div>	
				</div>
			</div>	
		</div>
	</div>

	<div class="modal hide fade" id="bus_per2">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Buscar Persona</h3>
		</div>
		<div class="modal-body">
			<div class="well">
				<div class="control-group">
					<strong>Buscar por:</strong><br>
					<label class="radio inline"><input type="radio" name="radBusPer2" id="radBusPer2" value="DUI">DUI</label>
					<label class="radio inline"><input type="radio" name="radBusPer2" id="radBusPer2" value="Nombre" checked>Nombre</label>
				</div>
	  			<input type="text" class="search-query" style="width:250px" name="txtBusPer2" id="txtBusPer2">
	  			<button class="btn" id="btnBusPer2"><i class="icon-search"></i> Buscar</button>
			</div>
			<table class="table table-bordered">
				<thead>
					<th>Nombre</th>
					<th>DUI</th>
					<th>NIT</th>
					<th>Seleccionar</th>
				</thead>
				<tbody id="cuerpo2">
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal" onclick="vermsj2()"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>



</body>
</html>