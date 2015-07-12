<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Reporte de expediente</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./../css/retoques.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
</head>
<body style="background:transparent;">
	<div class="modal" id="bus_per">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Buscar Persona</h3>
		</div>
		<div class="modal-body">
			<div class="well">
				<div class="control-group">
					<strong>Buscar por:</strong><br>
					<label class="radio inline"><input type="radio" name="radBusPer" id="radBusPerD" value="DUI">DUI</label>
					<label class="radio inline"><input type="radio" name="radBusPer" id="radBusPerN" value="NIT">NIT</label>
					<label class="radio inline"><input type="radio" name="radBusPer" id="radBusPer" value="Nombre" checked>Nombre</label>
				</div>
	  			<input type="text" class="search-query" style="width:250px" name="txtBusPer" id="txtBusPer">
	  			<button class="btn" id="btnBusPer"><i class="icon-search"></i> Buscar</button>
			</div>
			<table class="table table-bordered" id="tabla_col">
				<thead>
					<th>Nombre</th>
					<th id="thd">DUI</th>
					<th>NIT</th>
					<th>Agregar</th>
				</thead>
				<tbody id="cuerpo">
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal" onclick="cancela()"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>
	<script>
	$(function(){
		$("#btnBusPer").click(function(){
			if ($("#txtBusPer").val()!="") {
				$("#cuerpo").load("proc/proc_act_expediente.php",{radBusPer:$("#radBusPer:checked").val(),txtBusPer:$("#txtBusPer").val(),caso:2},function(responseText,textStatus,XMLHttpRequest){
					if (textStatus=="success") {
						if (responseText=="") {
							alert("No encontrado");
						}
					}
				});
			}else{
				alert("Ingrese un parámetro de búsqueda");
			}
		});
	});

	function cargaDatos(codtit){
		window.open("reportes/reporte_expediente.php?codigo="+codtit+"","_self");
	}
	function cancela(){
		parent.location="index_unidadmujer.php";
	}
	</script>
</body>
</html>