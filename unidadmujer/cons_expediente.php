<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Consulta de Expediente</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="../css/retoques.css">
	<link rel="stylesheet" href="../css/table.css">
	<link rel="stylesheet" href="./../css/bootstrap-select.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/bootstrap-select.js"></script>
	<script type="text/javascript" src="./../graficas" onerror="Necesita una conexión a internet para obtener gráficas"></script>
	<script type="text/javascript">
		google.load("visualization", "1", {packages:["corechart","bar"]});
	</script>
	<script src="js/cons_expediente.js"></script>
	<script src="js/pastel_um.js"></script>
	<script src="js/barra_um.js"></script>
</head>
<body>
	<legend style="margin-top:25px;">Consulta de Expediente</legend>
	<div class="form-actions span12">
		<div class="control-group">
			<label class="control-label">Filtros:</label>
			<div class="controls">
				<select name="radBus" class="selectpicker" data-width="285px"  data-live-search="true" title="Seleccione una o varias opciones" data-size="5"  data-selected-text-format="count>5">
					<option style="display:none"></option>
					<option  value='sx'>Sexo</option>
					<option  value='ec'>Estado Civil</option>
					<option  value='ne'>Nivel Educativo</option>
					<option  value='ps'>Pasatiempos</option>
					<option  value='sl'>Personas bajo contrato</option>
					<option  value='de'>Dependencia Económica </option>
					<option  value='ta'>Tipo de Alimentación</option>
					<option  value='ma'>Maltratos</option>
					<option  value='as'>Abuso Sexual</option>
					<option  value="ca">Carácter de agresiones</option>
					<option  value="pa">Patología del agresor</option>
				</select>
			</div>
		</div>
	</div>
	<br>
	<div class="form-actions span12">
		<a onclick="imprimeGrafica()" class="btn"><i class="icon-print"></i> Imprimir Gráfica</a>
	</div>
	<br>
	<br>
	<div class="well span12" id="contenedor">
		<h3 style="text-align:center;font-family:TimesRoman">Alcaldía Municipal de San Cristóbal</h3>
		<h4 style="text-align:center;font-family:TimesRoman">Unidad de Género</h4>
	<div id="migrafica" class="offset1" ></div>
	<div id="migrafica2" class="offset1" style="width: 800px; height: 500px;"></div>
	</div>
</body>
</html>