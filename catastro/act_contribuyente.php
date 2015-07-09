<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizar Contribuyente</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/jquery.maskedinput.js"></script>
	<script src="./../js/funciones.js"></script>
	<script src="js/act_contribuyente.js"></script>
</head>
<body>
	<legend style="margin-top:25px">Actualizar Datos de Contribuyente</legend>
	<div class="well">
		<label class="radio inline offset4"><input type="radio" id="per" name="per" value="N" checked>Persona Natural</label>
		<label class="radio inline offset4"><input type="radio" id="per" name="per" value="J" >Persona Jurídica</label>
	</div>
	
	
	<form class="form-horizontal span12" id="form1" name="form1">
		<a href="#bus_per" data-toggle="modal" class="btn"><i class="icon-search"></i> Buscar Contribuyente</a>
		<br><br>
		<input type="hidden" id="cod_per">
		<div class="control-group span6">
			<label class="control-label" for="nom">Nombre (*)</label>
			<div class="controls">
				<input type="text" class="span3" name="nom" id="nom" >
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label" for="ape1">Primer Apellido (*)</label>
			<div class="controls">
				<input type="text" class="span3" name="ape1" id="ape1" >
			</div>
		</div>
		<div class="control-group span6">
			<label class="control-label" for="ape2">Segundo Apellido</label>
			<div class="controls">
				<input type="text" class="span3" name="ape2" id="ape2">
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label" for="sex">Sexo (*)</label>
			<div class="controls">
				<label class="radio inline"><input type="radio" id="sexM" name="sex" value="M">Masculino</label>
				<label class="radio inline"><input type="radio" id="sexF" name="sex" value="F" checked>Femenino</label>
			</div>
		</div>
		<div class="control-group span6">
			<label class="control-label">Fecha de Nacimiento (*)</label>
			<div class="controls">
				<input type="date" id="fec_nac" name="fec_nac">
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label" for="dui">DUI</label>
			<div class="controls">
				<input type="text" class="span3" name="dui" id="dui" >
			</div>
		</div>
		<div class="control-group span6">
			<label class="control-label" for="nit">NIT (*)</label>
			<div class="controls">
				<input type="text" class="span3" name="nit" id="nit" >
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label" for="tel1">Teléfono 1 (*)</label>
			<div class="controls">
				<input type="text" class="span3" name="tel1" id="tel1">
			</div>
		</div>
		<div class="control-group span6">
			<label class="control-label" for="tel2">Teléfono 2</label>
			<div class="controls">
				<input type="text" class="span3" name="tel2" id="tel2">
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label" for="dep">Departamento (*)</label>
			<div class="controls">
				<select name="dep" id="dep" onChange="cargarMunicipios('dep','mun')">
				</select>
			</div>
		</div>
		<div class="control-group span6">
			<label class="control-label" for="mun">Municipio (*)</label>
			<div class="controls">
				<select id="mun" name="mun">
				</select>
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label" for="dir">Dirección (*)</label>
			<div class="controls">
				<textarea class="input-large" name="dir" id="dir"></textarea>
			</div>
		</div>


		<div class="control-group span6">
			<label class="control-label" for="ocu">Ocupación (*)</label>
			<div class="controls">
				<input type="text" class="span3" name="ocu" id="ocu">
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label">Estado Civil</label>
			<div class="controls">
				<select name="est_civ" id="est_civ">
					<option value="Casado/a">Casado/a</option>
					<option value="Separado/a">Separado/a</option>
					<option value="Divorciado/a">Divorciado/a</option>
					<option value="Soltero/a">Soltero/a</option>
					<option value="Viudo/a">Viudo/a</option>
					<option value="Otros">Otros</option>
				</select>
			</div>
		</div>
		<div class="span8 offset4">
			<a class="btn" id="btnGuardar"><i class="icon-refresh"></i> Actualizar</a>
			<a class="btn" onclick="limpiarCampos()"><i class="icon-trash"></i> Limpiar</a>
			<a onclick="cancela()" class="btn" ><i class="icon-remove"></i> Cancelar</a>
		</div>
	</form>
	
	
	<form class="well form-horizontal span12" id="form2" name="form2" style="display:none">
		<a href="#bus_per" data-toggle="modal" class="btn"><i class="icon-search"></i> Buscar Contribuyente</a>
		<br><br>
		<input type="hidden" id="idSoc" name="idSoc">
		<div class="control-group span6">
			<label class="control-label" for="nom_jur">Nombre (*)</label>
			<div class="controls">
				<input type="text" class="span3" name="nom_jur" id="nom_jur" >
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label" for="fec_cons">Fecha de Constitución (*)</label>
			<div class="controls">
				<input type="date" id="fec_cons" name="fec_cons">
			</div>
		</div>
		<div class="control-group span6">
			<label class="control-label" for="gir_jur">Giro del negocio (*)</label>
			<div class="controls">
				<input type="text" class="span3" name="gir_jur" id="gir_jur">
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label" for="nit_jur">NIT (*)</label>
			<div class="controls">
				<input type="text" id="nit_jur" name="nit_jur">
			</div>
		</div>
		<div class="control-group span6">
			<label class="control-label" for="tel_jur">Teléfono (*)</label>
			<div class="controls">
				<input type="text" class="span3" name="tel_jur" id="tel_jur">
			</div>
		</div>
		<div class="control-group span5">
			<label class="control-label" for="dir_jur">Dirección (*)</label>
			<div class="controls">
				<textarea class="input-large" name="dir_jur" id="dir_jur"></textarea>
			</div>
		</div>
		<div class="control-group span6">
			<label class="control-label" for="rep_jur">Representante Legal (*)</label>
			<div class="controls">
				<input type="text" class="span3" name="rep_jur" id="rep_jur" placeholder="Nombre completo de la persona">
			</div>
		</div>

		<div class="span9 offset4" style="background-color: transparent;">
			<a class="btn" id="btnGuardar2"><i class="icon-refresh"></i> Actualizar</a>
			<a class="btn" onclick="limpiarCampos2()"><i class="icon-trash"></i> Limpiar</a>
			<a onclick="cancela()" class="btn" ><i class="icon-remove"></i> Cancelar</a>
		</div>
	</form>

	<div class="modal" id="bus_per">
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
					<th>Seleccionar</th>
				</thead>
				<tbody id="cuerpo">
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal" onclick="vermsj()"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>
</body>
</html>