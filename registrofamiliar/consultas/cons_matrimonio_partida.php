<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>consulta de matrimonios</title>
		<link rel="stylesheet" href="../../css/bootstrap.css">
		<link rel="stylesheet" href="../../css/table.css">
		<link rel="stylesheet" href="../../css/retoques.css">
		<script type="text/javascript" src="../../js/jquery.min-1.7.1-google.js"></script>
		<script type="text/javascript" src="../../js/bootstrap-2.0.2.js"></script>
		<script type="text/javascript" src="../../js/table.js"></script>
	</head>
	<body>
		<!-- Inicia area de filtros -->
		<div class="well row">
		<!-- Inicia area de filtros principales -->
			<legend>Consulta de matrimonios</legend>
			<h4 style="margin-left: 25px">Filtros: <small>Elija una opción</small></h4>
			<label class="radio" style="margin-left: 25px"><input type="radio" name="opcion" id="nombre" value="nombre" checked="">Nombre</label>
			<label class="radio" style="margin-left: 25px"><input type="radio" name="opcion" id="fecha" value="fecha"> Fecha del matrimonio</label>
		<!-- Termina area de filtros principales -->
		
		<!-- Inicia area de filtros secundarios -->
		<div class="span12">
			<div class="well" id="filtros">
				<div class='control-group'>
					<strong>Buscar por: &nbsp;&nbsp;</strong>
					<input type='text' name='nom' id='nom' class='search-query'>
					<button class='btn' id='btn-buscar' onclick='buscar()'><i class='icon-search'></i> Buscar</button>
				</div>
			</div>
		</div>
		<!-- Termina area de filtros secundarios -->
		</div>
		<!-- Termina area de filtros -->
		
		<!-- Inicia tabla de resultados -->
		<div class="span12">
			<table class="" id="nacpar" data-toggle="table" data-height="500" data-pagination="true" data-page-list="[10, 20, 50, 100]" data-show-toggle='true' data-show-columns='true' data-search='true'>
				<thead>
					<tr>
						<th data-field="fec_mat">Fecha del matrimonio</th>
						<!-- <th data-field="ano_lib">Año</th> -->
						<th data-field="num_lib">Libro</th>
						<!-- <th data-field="num_tom">Tomo</th> -->
						<!-- <th data-field="num_pag">Página</th> -->
						<th data-field="num_par">Partida</th>
						<th data-field="nom_ape_eso">Nombre del esposo</th>
						<th data-field="nom_ape_esa">Nombre de la esposa</th>
						<!-- <th data-field="cue">Cuerpo</th>
						<th data-field="esc_lib">Imágen</th>
						<th data-field="cod_per">Código</th> -->
						<th data-field="imp">Imprimir</th>
					</tr>
				</thead>
			</table>
		</div>
		<!-- Termina tabla de resultados -->
		
		<script type="text/javascript" >
			$(function(){
				$("input[name=opcion]").click(function(){
					if($(this).val() == "nombre"){
						html = "";
						html += "<div class='control-group'>";
						html += "<strong>Buscar por: &nbsp;&nbsp;</strong>";
						html += "<input type='text' name='nom' id='nom' class='search-query'>";
						html += "<button class='btn' id='btn-buscar' onclick='buscar()'><i class='icon-search'></i> Buscar</button>";
						html += "</div>";
						$("#filtros").html(html);
					} 
					else if($(this).val() == "fecha"){
						html = "";
						html += "<div class='control-group'>";
						html += "<strong>Buscar por: &nbsp;&nbsp;</strong>";
						html += "<input type='date' name='fec' id='fec' class='search-query'>";
						html += "<button class='btn' id='btn-buscar' onclick='buscar()'><i class='icon-search'></i> Buscar</button>";
						html += "</div>";
						$("#filtros").html(html);
					} 
				});
			});

			function buscar(){
				if($("input[name:opcion]:checked").val() == "nombre"){
					$.ajax({
						type : "post",
						url : "proc_cons_matrimonio_partida.php",
						data : {
							"nom" : $("#nom").val()
							},
						success : function(responseText){
							var dataJson = eval(responseText);
							$("#nacpar").bootstrapTable("load", dataJson);
						}
					});
				}
				else if($("input[name:opcion]:checked").val() == "fecha"){
					$.ajax({
						type : "post",
						url : "proc_cons_matrimonio_partida.php",
						data : {
							"fec" : $("#fec").val()
							},
						success : function(responseText){
							var dataJson = eval(responseText);
							$("#nacpar").bootstrapTable("load", dataJson);
						}
					});
				}
			}
		</script>
	</body>
</html>