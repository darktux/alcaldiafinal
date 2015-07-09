<!-- Inicia código de conexion a la base de datos para buscar todas las cuentas del catalogo -->
<?php 
	include('../php/conexion.php');
	$conexion=conectar();
	$consulta="SELECT codigo,nom_cue FROM co_impuesto";
	$resultado=pg_query($consulta);

	/* TODO Implementar sincronizacion para la obtención del total*/

	$cuentas = ""; 
	while ($fila = pg_fetch_array($resultado)){
		$cuentas .= "<option data-subtext='$fila[codigo]' value='$fila[codigo]'>$fila[nom_cue]</option>";
	}

	pg_close($conexion);

	if ($_GET[estado] == "false")
		$est = "false";
	else
		$est = "true";
?>
<!-- Termina código de conexion a la base de datos para buscar todas las cuentas del catalogo -->

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Nueva Factura</title>
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/retoques.css">
		<link rel="stylesheet" href="../css/table.css">	
		<link rel="stylesheet" href="../css/bootstrap-select.css">
		<script type="text/javascript" src="../js/jquery.min-1.7.1-google.js"></script>
		<script type="text/javascript" src="../js/bootstrap-2.0.2.js"></script>
		<script type="text/javascript" src="../js/table.js"></script>
		<!--<script type="text/javascript" src="../../js/funciones.js"></script>-->
		<script type="text/javascript" src="./../js/jquery.maskedinput.js"></script>
		<script type="text/javascript" src="../js/bootstrap-select.js"></script>
	</head>
	<body>

		<!-- Inicia área de mensajes -->
		<div id="mensajes">
		</div>
		<!-- Termina área de mensajes -->

		<!-- Inicia formulario principal -->
		<form action="" class="well form-horizontal">

			<input type="hidden" name="cod_con" id="cod_con">
			<input type="hidden" name="mon" id="mon" value="0">
			<input type="hidden" name="est" id="est" value="<?php echo $est; ?>">

			<div class="control-group">
				<label for="nom_con" class="control-label">Nombre del Contribuyente</label>
				<div class="controls">
					<input type="text" class="input-xlarge" name="nom_con" id="nom_con"/>
					<button type="button" class="btn" data-toggle="modal" href="#buscar-contribuyente"><i class="icon-search"></i></button>
				</div>
			</div>

			<!-- <div class="control-group">
				<label class="control-label" for="fec">Fecha</label>
				<div class="controls">
					<input type="date" name="fec" id="fec" value="<?php echo date('Y-m-d'); ?>">
				</div>
			</div> -->

			<div class="control-group">
				<label for="det" class="control-label">Rubro</label>
				<div class="controls">
					<select name="det" id="det" class="selectpicker" data-width="285px" data-live-search="true" data-size="5" data-show-subtext="true">
						<?php echo $cuentas; ?>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label for="mon_det" class="control-label">Monto</label>
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on">$</span>
						<input type="number" name="mon_det" id="mon_det" class="span2" value="" step="0.01" min="0.01" max="1000"/>
					</div>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="button" class="btn" name="agregar_detalle" id="agregar_detalle"><i class="icon-ok"></i> Agregar</button>
				</div>
			</div>

			<!-- Inicia tabla_factura -->
			<div class="span12">
				<br>
				<table class="" id="tabla_factura" data-toggle="table" data-height="300">
					<thead>
						<tr>
							<th data-field="codigo">Código</th>
							<th data-field="descripcion">Descripción</th>
							<th data-field="total">Total</th>
						</tr>
					</thead>
				</table>
				<br>
			</div>
			<!-- Termina tabla_factura -->

			<div class="control-group span3">
				<label class="control-label" for="des">Descripción</label>
				<div class="controls">
					<strong id="lon">100/100</strong>
					<br>
					<textarea class="input-xlarge" name="des" id="des" rows="4" maxlength="100"></textarea>
				</div>
			</div>

			<!-- Inicia tabla_total -->
			<div class="offset6 span3">
				<br>
				<table class="table table-bordered" id="tabla_total">
					<thead>
						<tr>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td id="total_factura">$ 0.00</td>
						</tr>
					</tbody>
				</table>
				<br>
			</div>
			<!-- Termina tabla_total -->

			<!-- Inicia area de botones -->
			<div class="form-actions">
				<!-- btn-guardar -->
				<button type="button" class="btn" name="guardar_factura" id="guardar_factura"><img src="../img/icon-save.png" height="14" width="14"> Guardar</button>
				<button type="reset" class="btn"><i class="icon-trash"></i> Limpiar</button>
				<button type="button" class="btn" onclick="parent.location='index_colecturia.php'"><i class="icon-remove"></i> Cancelar</button>
			</div>
			<!-- Termina area de botones -->
				
		</form>
		<!-- Termina formulario principal -->

		<!-- Inicia formulario modal de búsqueda del contribuyente -->
		<div class="modal hide fade" id="buscar-contribuyente">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Buscar Contribuyente</h3>
			</div>
			<div class="modal-body">
				<div class="well">
				<form class="form form-search" name="form_buscar_contribuyente" id="form_buscar_contribuyente" action="" method="POST">
					<div class="control-group">
						<strong>Buscar por:</strong><br>
						<label class="radio inline"><input type="radio" name="tip_bus" id="nom" value="nombre" checked>Nombre</label>
						<label class="radio inline"><input type="radio" name="tip_bus" id="dui" value="dui">DUI</label>
					</div>
					<input type="hidden" name="accion" id="accion" value="buscar_contribuyente">
		  			<input type="text" class="search-query" style="width:250px" name="par_bus" id="par_bus">
		  			<button type="button" class="btn" id="btn-buscar-contribuyente"><i class="icon-search"></i> Buscar</button>
				</form>
				</div>
				<div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>DUI</th>
								<th>Seleccionar</th>
							</tr>
						</thead>
						<tbody id="resultado-buscar-contribuyente">

						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!--	Termina formulario modal de búsqueda del contribuyente -->

		<!-- Inicia JavaScript -->
		<script type="text/javascript">

			/* Inicia codigo de configuración Inicial */
			$(document).ready(function(){
				/* Inicia código de configuracion de las variables de sessión */
				$.ajax({
					type : "POST",
					url : "proc_factura.php",
					datatype : "JSON",
					data : {
						"accion" : "inicializar"
					},
					success : function(responseText){
						var datos_factura = eval(responseText);
						$("#tabla_factura").bootstrapTable("load", datos_factura);
					}
				});
				/* Termina código de configuracion de las variables de sessión */

				/* Inicia código de configuracion del boton agregar_detalle */
				$("#agregar_detalle").click(function(){
					//comprobar si el monto es un numero entero
					if( $("#mon_det").val() == "" || $("#mon_det").val() <= 0 || $("#mon_det").val() > 1000){
						$("#mon_det").val("");
						alert("Especifíque el monto");
						$("#mon_det").focus();
					} else{
						$.ajax({
							type : "POST",
							url : "proc_factura.php",
							datatype : "JSON",
							data : {
								"codigo" : $("#det").val(),
								"descripcion" : $("option[value=" + $("#det").val() + "]").text(),
								"total" : $("#mon_det").val(),
								"accion" : "agregar_detalle"
							},
							success : function(responseText){
								var datos_factura = eval(responseText);
								$("#tabla_factura").bootstrapTable("load", datos_factura);
								$("#mon_det").val("").focus();
							}
						});

						// Actualizar la tabla total
						$.ajax({
							type : "POST",
							url : "proc_factura.php",
							datatype : "JSON",
							data : {
								"accion" : "obtener_total"
							},
							success : function(responseText){
								$("#total_factura").html("$ " + responseText);
								$("#mon").val(responseText);
							}
						});
					}

				});
				/* Termina código de configuración del botón agregar_detalle */


				/* Inicia código de configuración del textarea de la descripción*/
				$("#des").on("keyup" ,function(){
					texto = $("#des").val();
					restantes = 100 - texto.length;
					$("#lon").html(restantes + "/100");
				});
				/* Termina código de configuración del textarea de la descripción*/

				/* Inicia código de configuracion del boton guardar */
				$("#guardar_factura").click(function(){
					// Comprobar si existen campos vacios
					if($("#nom_con").val() == ""){
						alert("Debe especificar el nombre del contribuyente");
						$("#nom_con").focus();
					} else if($("#mon").val() == 0){
						alert("Debe Agregar almenos un detalle");
						$("#mon_det").focus();
					} else {
						$.ajax({
							type : "POST",
							url : "proc_factura.php",
							datatype : "JSON",
							data : {
								nom_con : $("#nom_con").val(),
								cod_con : $("#cod_con").val(),
								accion : "guardar_factura",
								est : $("#est").val(),
								des : $("#des").val()
							},
							success : function(responseText){
								$("#mensajes").html(responseText);
							}
						});
					}
				});
				/* Termina código de configuracion del boton guardar */

				/* Inicia código de configuración del modal buscar-contribuyente*/
				$("#btn-buscar-contribuyente").click(function(){
					if($("#par_bus").val() == ""){
						alert("Ingrese un parámetro de búsqueda");
					} else{
						//alert("tip_bus: " + $("input[name='tip_bus']:checked").val() + " par_bus: " + $("#par_bus").val() + " accion:" + $("#accion").val());
						$.ajax({
	          			type: "POST",
	           			url: "proc_factura.php",
	           			data: $("#form_buscar_contribuyente").serialize(),
	           			success: function(data){
	               					$("#resultado-buscar-contribuyente").html(data);
	          			}
	        			});
					}
	 			});
				/* Termina código de configuración del modal buscar-contribuyente*/

				/* Inicia eventos radio tip_bus del formulario modal*/
				$("input[name='tip_bus']").change(function(){
					if($(this).val() == "nombre"){
						$("#par_bus").val("");
						$("#par_bus").unmask();
					} else if($(this).val() == "dui"){
						$("#par_bus").val("");
						$("#par_bus").mask("99999999-9");
					}
				});
				/* Inicia eventos radio tip_bus del formulario modal*/

			});
			/* Termina codigo de configuración Inicial */

			/* Inicia área de funciones */
			function cargarContribuyente(contribuyente){
				$("#nom_con").attr({value: contribuyente.nom_com});
				$("#cod_con").attr({value: contribuyente.cod_per});
			}
			/* Termina área de funciones */

		</script>
		<!-- Termina JavaScript -->
	</body>
</html>