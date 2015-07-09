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
	<script src="js/cons_registrofamiliar.js"></script>
	<script src="js/pastel_rf.js"></script>
	<script src="js/barra_rf.js"></script>
	
</head>
<body>
	<legend style="margin-top:25px;">Consulta de Expediente</legend>
	<div class="tabbable">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#datGen">General</a></li>
			
			<!-- <li><a data-toggle="tab" href="#sitLab">Situación Laboral</a></li>
			<li><a data-toggle="tab" href="#famExt">Relaciones Familiares</a></li>
			<li><a data-toggle="tab" href="#relSoc">Relaciones Sociales</a></li>
			<li><a data-toggle="tab" href="#sitGen">Situación General</a></li>
			<li><a data-toggle="tab" href="#proGen">Problemática General</a></li> -->
		</ul>
		<div class="form-actions span12">
		<div class="control-group">
			
			<div class="controls">
				<div id="xd" class="control-group span3">
								<label class="control-label" for="ano_lib">Año Inicio</label>
								<div class="controls">
									<input type="number" min="1911" max="<?php echo date('Y')-5; ?>" class="input-mini" name="inicio" id="inicio" value="inicio">
								</div>
							</div>

							<div class="control-group span3 offset1">
								<label class="control-label" for="ano_lib">Año Final</label>
								<div class="controls">
									<input type="number" min="1911" max="<?php echo date('Y') ?>" class="input-mini" name="fin" id="fin" value="fin">
								</div>
							</div>
							<div class="control-group span3 offset1">
								<label class="control-label">Consulta:</label>
				<select name="radBus" class="selectpicker" data-width="285px"  data-live-search="true" title="Seleccione una o varias opciones" data-size="5"  data-selected-text-format="count>5">
					<option style="display:none"></option>
					<option  value='nc'>Nacimientos</option>
					<option  value='et'>Defunción</option>
					<option  value='mt'>Matrimonio</option>
					<option  value='po'>Población</option>
					
				</select>
			</div>
		</div>
	</div> <!--fin del div tabbable-->
	<br>
	<div class="form-actions span12">
		<!-- <a class="btn btn-ppal offset3"  id="btnGenerar"><img src="../img/icon-piechart.png" width="18px" height="18px"> Generar Gráfico</a> -->
		<a onclick="imprimeGrafica()" class="btn"><i class="icon-print"></i> Imprimir Gráfica</a>
		<!-- <a class="btn"><i class="icon-trash"></i> Limpiar filtros</a> -->
	</div>
	<br>
	<br>
	<div class="well span12" id="contenedor">
		<h3 style="text-align:center;font-family:TimesRoman">Alcaldía Municipal de San Cristóbal</h3>
		<h4 style="text-align:center;font-family:TimesRoman">Registro Familiar</h4>
	<div id="migrafica" class="offset1" ></div>
	<div id="migrafica2" class="offset1" style="width: 800px; height: 500px;" ></div>
	</div>
</body>
</html>