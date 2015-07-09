<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Consulta de Ingresos</title>
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/retoques.css">
		<link rel="stylesheet" href="../css/table.css">
		<script type="text/javascript" src="../js/jquery.min-1.7.1-google.js"></script>
		<script type="text/javascript" src="../js/bootstrap-2.0.2.js"></script>
		<script type="text/javascript" src="../js/table.js"></script>
		<!-- <script type="text/javascript" src="../../js/funciones.js"></script> -->
		<!-- <script type="text/javascript" src="../../js/jquery.maskedinput.js"></script> -->
	</head>
	<body>

		<!-- Inicia area de filtros -->
		<div class="well row">
			<!-- Inicia area de filtros principales -->
			<legend>Consulta de Ingresos</legend>
			<h4 style="margin-left: 25px">Filtros: <small>Elija una opción</small></h4>
			<label class="radio" style="margin-left: 25px"><input type="radio" name="opc" id="dia" value="dia" checked="">Reporte Diario</label>
			<label class="radio" style="margin-left: 25px"><input type="radio" name="opc" id="men" value="men">Reporte Mensual</label>
			<label class="radio" style="margin-left: 25px"><input type="radio" name="opc" id="anu" value="anu"> Reporte Anual</label>
			<!-- Termina area de filtros principales -->
		
			<!-- Inicia area de filtros secundarios -->
			<div class="span12">
				<div class="well" id="filtros">
					<div class='control-group'>
						<strong>Buscar por: &nbsp;&nbsp;</strong>
						<input type='date' name='par_dia' id='par_dia' class='search-query' min="2015-06-01" max="<?php echo date("Y-m-d"); ?>">
						<input type='month' name='par_men' id='par_men' class='search-query' min="2015-06" max="<?php echo date("Y-m"); ?>">
						<input type='number' name='par_anu' id='par_anu' class='search-query' min="2015" max="<?php echo date("Y"); ?>">
						<button class='btn' id='btn-buscar' onclick='buscar()'><i class='icon-search'></i> Buscar</button>
					</div>
				</div>
			</div>
			<!-- Termina area de filtros secundarios -->
		</div>
		<!-- Termina area de filtros -->
		
		<!-- Inicia JavaScript -->
		<script type="text/javascript" >

			/* Inicia código de configuración Inicial */
			$(document).ready(function(){

				// Enfocar el primer imput radio
				$("#dia").attr({checked : true})

				// Ocultar y limpiar inputs
				$("#par_dia").show().val("");
				$("#par_men").hide().val("");
				$("#par_anu").hide().val("");

				// Mostrar/ocultar inputs segun el filtro seleccionado
				$("input[name=opc]").change(function(){
					if($(this).val() == "dia"){
						$("#par_dia").show();
						$("#par_men").hide().val("");
						$("#par_anu").hide().val("");
					} 
					else if($(this).val() == "men"){
						$("#par_dia").hide().val("");
						$("#par_men").show();
						$("#par_anu").hide().val("");
					}
					else if($(this).val() == "anu"){
						$("#par_dia").hide().val("");
						$("#par_men").hide().val("");
						$("#par_anu").show();
					}
				});

			});
			/* Termina código de configuración Inicial */

			function buscar(){
				// TODO Verificar por que al utilizar .val() obtiene tambien los valores fuera del rango permitido
				// Almacenar los parametros en variables
				opc = $("input[name='opc']:checked").val();
				par_dia = $("input[name='par_dia']").val();
				par_men = $("input[name='par_men']").val();
				par_anu = $("input[name='par_anu']").val();

				// Comprobar que los parametros no esten vacios
				// Si los parametros estan bien, llamar el reporte con los parametros via GET
				if((par_dia != "" || par_men != "" || par_anu != "") && (opc == "dia" || opc == "men" || opc == "anu")){
					switch(opc){
						case "dia":
							parent.centro.location= "rep_ingresos.php?opc=dia&par_bus=" + par_dia;
							break;
						case "men":
							parent.centro.location= "rep_ingresos.php?opc=men&par_bus=" + par_men;
							break;
						case "anu":
							parent.centro.location= "rep_ingresos.php?opc=anu&par_bus=" + par_anu;
							break;
					}
				}
				// Si los parametros no estan bien, mandar un mensaje y enfocar el input correspondiente
				else {
					alert("Debe ingresar un parámetro de búsqueda");
					switch(opc){
						case "dia":
							$("input[name='par_dia']").focus();
							break;
						case "men":
							$("input[name='par_men']").focus();
							break;
						case "anu":
							$("input[name='par_anu']").focus();
							break;
					}
				}
			}
		</script>
		<!-- Termina JavaScript -->
	</body>
</html>