<!DOCTYPE html>

<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Registro de Actas de Matrimonio</title>
		<link rel="stylesheet" href="../../css/bootstrap.css">
		<link rel="stylesheet" href="../../css/retoques.css">
		<link rel="stylesheet" href="../../css/pnotify.custom.css">
		<script type="text/javascript" src="../../js/jquery.min-1.7.1-google.js"></script>
		<script type="text/javascript" src="../../js/bootstrap-2.0.2.js"></script>
		<script src="../../js/pnotify.custom.js"></script>
		<script type="text/javascript" src="../../js/funciones.js"></script>
		<script type="text/javascript" src="../../js/jquery.maskedinput.js"></script>
	</head>
	<body>

		<div id="mensajes">
			<!-- Area para los mensajes devueltos por el script-->
		</div>

		<!-- Inicia Formulario Principal -->
		<form class="form form-horizontal well" name="form_matrimonio_acta" id="form_matrimonio_acta" action="" method="POST">
			<legend>Registro de Actas de Matrimonio</legend>

			<input type="hidden" name="accion" value="guardar-matrimonio-acta">
			<input type="hidden" name="cod_eso" id="cod_eso" value="">
			<input type="hidden" name="cod_esa" id="cod_esa" value="">

			<div class="row">
				<div class="control-group span6">
					<label class="control-label" for="ano_lib">Año (*)</label>
					<div class="controls">
						<input type="number" min="1961" max="<?php echo date('Y') ?>" class="input-mini" name="ano_lib" id="ano_lib" value="<?php echo date("Y") ?>" tabindex="1">
					</div>
				</div>

				<div class="control-group span6">
					<label class="control-label" for="num_lib">Libro No. (*)</label>
					<div class="controls">
						<input type="number" min="1" max="<?php echo date("Y") - 1961 ?>" class="input-mini" name="num_lib" id="num_lib" value="<?php echo date("Y") - 1961 ?>" tabindex="2">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="control-group span6">
					<label class="control-label" for="num_tom">Tomo No. (*)</label>
					<div class="controls">
						<input type="number" min="1" max="10" class="input-mini" name="num_tom" id="num_tom" value="1" tabindex="3">
					</div>
				</div>

				<div class="control-group span6">
					<label class="control-label" for="num_pag">Página No. (*)</label>
					<div class="controls">
						<input type="number" min="1" max="500" class="input-mini" name="num_pag" id="num_pag" tabindex="4">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="control-group  span6">
					<label class="control-label" for="num_act">Acta No. (*)</label>
					<div class="controls">
						<input type="number" min="1" max="500" class="input-mini" name="num_act" id="num_act" tabindex="5">
					</div>
				</div>
			</div>

			<br>

			<div class="row">
				<div class="control-group span6">
					<label class="control-label" for="nom_eso">Nombre del Esposo (*)</label>
					<div class="controls">
						<input type="text" class="input-medium"name="nom_eso" id="nom_eso" tabindex="6" readonly>
						<button type="button" class="btn" name="btn-buscar-esposo" id="btn-buscar-esposo" data-toggle="modal" href="#buscar-esposo" tabindex="-1"><i class="icon-search"></i></button>
						<button type="button" class="btn" name="btn-registrar-esposo" id="btn-registrar-esposo" data-toggle="modal" href="#modal-registrar-esposo" tabindex="-1"><i class="icon-plus"></i></button>
					</div>
				</div>

				<div class="control-group span6">
					<label class="control-label" for="nom_esa">Nombre de la Esposa (*)</label>
					<div class="controls">
						<input type="text" class="input-medium" name="nom_esa" id="nom_esa" tabindex="9" readonly>
						<button type="button" class="btn" name="btn-buscar-esposa" name="btn-buscar-esposa" data-toggle="modal" href="#buscar-esposa" tabindex="-1"><i class="icon-search"></i></button>
						<button type="button" class="btn" name="btn-registrar-esposa" name="btn-registrar-esposa" data-toggle="modal" href="#modal-registrar-esposa" tabindex="-1"><i class="icon-plus"></i></button>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="control-group span6">
					<label class="control-label" for="ape1_eso">Primer apellido del Esposo (*)</label>
					<div class="controls">
						<input type="text" class="span3" name="ape1_eso" id="ape1_eso" tabindex="7" readonly> 
					</div>
				</div>

				<div class="control-group span6">
					<label class="control-label" for="ape1_esa">Primer apellido de la Esposa (*)</label>
					<div class="controls">
						<input type="text" class="span3" name="ape1_esa" id="ape1_esa" tabindex="10" readonly>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="control-group span6">
					<label class="control-label" for="ape2_eso">Segundo apellido del Esposo</label>
					<div class="controls">
						<input type="text" class="span3" name="ape2_eso" id="ape2_eso" tabindex="8" readonly>
					</div>
				</div>

				<div class="control-group span6">
					<label class="control-label" for="ape2_esa">Segundo apellido de la Esposa</label>
					<div class="controls">
						<input type="text" class="span3" name="ape2_esa" id="ape2_esa" tabindex="11" readonly>
					</div>
				</div>
			</div>

			<br>

			<div class="control-group">
				<label class="control-label" for="fec_mat">Fecha del Matrimonio (*)</label>
				<div class="controls">
					<input type="date" min="1961-01-01" max="<?php echo date('Y-m-d'); ?>" name="fec_mat" id="fec_mat" tabindex="12">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="cue">Cuepo del Acta (*)</label>
				<div class="controls">
					<textarea class="input-xxlarge" name="cue" id="cue" rows="14" tabindex="13"></textarea>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="esc_libx">Imagen Escaneada</label>
				<div class="controls">
					<input type="file" class="input-file" name="esc_libx" id="esc_libx" tabindex="14">
					<input type="hidden" name="esc_lib" id="esc_lib">
				</div>
			</div>

			<div class="row">
				<div class="form-actions">
					<button type="button" class="btn offset2" name="btn-guardar" id="btn-guardar" tabindex="15"><img src="../../img/icon-save.png" height="14" width="14"> Guardar</button>
					<button type="reset" class="btn" tabindex="16"><i class="icon-trash"></i> Limpiar</button>
					<button type="button" class="btn" onclick="parent.location='../index_registrofamiliar.php'" tabindex="17"><i class="icon-remove"></i> Cancelar</button>
				</div>
			</div>
		</form>
		<!-- Termina Formulario Principal -->

		<!-- Inicia Formulario modal de búsqueda del esposo -->
		<div class="modal hide fade" id="buscar-esposo">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Buscar Esposo</h3>
			</div>
			<div class="modal-body">
				<div class="well">
					<form class="form form-search" name="form_buscar_esposo" id="form_buscar_esposo" action="" method="POST">
						<div class="control-group">
							<strong>Buscar por</strong><br>
							<label class="radio inline">
								<input type="radio" name="nombre" value="nombre" checked>Nombre
							</label>
						</div>
						<input type="hidden" name="accion" value="buscar-esposo">
						<input type="text" class="search-query" style="width : 250px;" name="nom">
						<button type="button" class="btn" name="btn2-buscar-esposo" id="btn2-buscar-esposo"><i class="icon-search"></i> Buscar</button>
					</form>
				</div>
				<div id="resultado-buscar-esposo"></div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!-- Termina Formulario modal de búsqueda del esposo -->

		<!-- Inicia Formulario modal de registro del esposo -->
		<div class="modal hide fade" id="modal-registrar-esposo">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Registrar Esposo</h3>
			</div>
			<div class="modal-body">
				<div class="well">
					<form class="form form-horizontal" name="form_registrar_esposo" id="form_registrar_esposo" action="" method="POST">
						
						<input type="hidden" name="accion" value="guardar-y-retornar">
						<div class="control-group">
							<label class="control-label" for="nom">Nombre</label>
							<div class="controls">
								<input type="text" class="span3" name="nom">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="ape1">Primer Apellido</label>
							<div class="controls">
								<input type="text" class="span3" name="ape1">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="ape2">Segundo Apellido</label>
							<div class="controls">
								<input type="text" class="span3" name="ape2">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Sexo</label>
							<div class="controls">
							<label class="radio inline">
								<input type="radio" name="sex" value="M">
								Masculino
							</label>
							<label class="radio inline">
								<input type="radio" name="sex" value="F" checked="">
								Femenino
							</label>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Fecha de nacimiento</label>
							<div class="controls">
								<input type="date" class="span3" name="fec_nac" max="<?php echo date('Y-m-d') ?>">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="ocu">Ocupación</label>
							<div class="controls">
								<input type="text" class="input-xlarge" name="ocu">
							</div>
						</div>
									
						<div class="control-group">
							<label class="control-label" for="est_civ">Estado civil</label>
							<div class="controls">
								<select class="span2" name="est_civ">
									<option>Soltero/a</option>
									<option>Casado/a</option>
									<option>Acompañado/a</option>
									<option>Viudo/a</option>
									<option>Divorciado/a</option>
								</select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">DUI</label>
							<div class="controls">
								<input type="text" class="span2" name="dui">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">NIT</label>
							<div class="controls">
								<input type="text" class="span3" name="nit">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Telefono 1</label>
							<div class="controls">
								<input type="text" class="span2" name="tel1">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Telefono 2</label>
							<div class="controls">
								<input type="text" class="span2" name="tel2">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="dep">Departamento de residencia</label>
							<div class="controls">
								<select class="span2" name="dep" id="dep_eso" onchange="cargarMunicipios('dep_eso', 'mun_eso')"></select>
							</div>
						</div>
							
						<div class="control-group">
							<label class="control-label" for="mun">Municipio de residencia</label>
							<div class="controls">
								<select name="mun" id="mun_eso"></select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Dirección</label>
							<div class="controls">
								<textarea class="input-xlarge" name="dir" rows="4"></textarea>
							</div>
						</div>
						
					<div class="form-actions">
						<button type="button" class="btn" id="btn-guardar-esposo" name="btn-guardar-esposo" data-dismiss="modal"><img src="../../img/icon-save.png" height="14" width="14"> Guardar</button>
						<button type="reset" class="btn"><i class="icon-trash"></i> Limpiar</button>
					</div>
					</form>
				</div>
				<div id="resultado-buscar-esposo"></div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!-- Termina Formulario modal de registro del esposo -->

		<!-- Inicia Formulario modal de búsqueda de la esposa -->
		<div class="modal hidde fade" id="buscar-esposa">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Buscar Esposa</h3>
			</div>
			<div class="modal-body">
				<div class="well">
					<form class="form form-search" name="form_buscar_esposa" id="form_buscar_esposa" action="" method="POST">
						<div class="control-group">
							<strong>Buscar por</strong><br>
							<label class="radio inline">
								<input type="radio" name="nombre" checked>Nombre
							</label>
						</div>
						<input type="hidden" name="accion" value="buscar-esposa">
						<input type="text" class="search-query" style="whidth : 250px;" name="nom">
						<button type="button" class="btn" name="btn2-buscar-esposa" id="btn2-buscar-esposa"><i class="icon-search"></i> Buscar</button>
					</form>
				</div>
				<div id="resultado-buscar-esposa"></div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!-- Termina Formulario modal de búsqueda de la esposa -->

		<!-- Inicia Formulario modal de registro de la esposa -->
		<div class="modal hidde fade" id="modal-registrar-esposa">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Buscar Esposa</h3>
			</div>
			<div class="modal-body">
				<div class="well">
					<form class="form form-search" name="form_buscar_esposa" id="form_buscar_esposa" action="" method="POST">
						<div class="control-group">
							<strong>Buscar por</strong><br>
							<label class="radio inline">
								<input type="radio" name="nombre" checked>Nombre
							</label>
						</div>
						<input type="hidden" name="accion" value="buscar-esposa">
						<input type="text" class="search-query" style="whidth : 250px;" name="nom">
						<button type="button" class="btn" name="btn2-buscar-esposa" id="btn2-buscar-esposa"><i class="icon-search"></i> Buscar</button>
					</form>
				</div>
				<div id="resultado-buscar-esposa"></div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!-- Termina Formulario modal de registro de la esposa -->

		<!-- Inicia código javascript -->
		<script type="text/javascript">
			/* Inicia codigo de configuración Inicial */
			$(document).ready(function(){

				cargarDepartamentos("dep_eso");
				cargarMunicipios("dep_eso", "mun_eso");

				/* Inicia código para establecer las mascaras */
				$("input[name='dui']").mask("99999999-9");
				$("input[name='nit']").mask("9999-999999-999-9");
				$("input[name='tel1']").mask("99999999");
				$("input[name='tel2']").mask("99999999");
				/* Termina código para establecer las mascaras */

				new PNotify({
					title: 'Información',
					text: 'Los campos con (*) son obligatorios.',
					type: 'info'
				});
				/* Inicia código para subir la imagen inmediatamente despues de seleccionarla*/				
				$("#esc_libx").change(function(){
					var num_lib = $("#num_lib").val();
					var num_act = $("#num_act").val();
					$("#esc_lib").attr({value : "mat_act_" + num_lib + "_" + num_act + ".jpg" });
					
					$.ajax({
						type : "POST",
						url : "../img/proc_subir_imagen.php",
						data : new FormData($("#form_matrimonio_acta")[0]),
						cache : false,
						contentType : false,
						processData : false
					});
				});
				/* Termina código para subir la imagen inediatamente despues de seleccionarla */

			});
			/* Termina código de configuración Inicial */

			/* Inicia código para funcionalidad del botón guardar del formulario prinipal */
			$(function(){
				$("#btn-guardar").click(function(){
					if(validarVacios()){
						if (confirm("¿Esta seguro de querer guardar estos datos?")){
							$.ajax({
								type : "POST",
								url : "proc_matrimonio_acta.php",
								data : $("#form_matrimonio_acta").serialize(),
								success : function(data){
									$("#mensajes").html(data);
								}
							});
						}
					}
				});
			});
			/*  Termina código para funcionalidad del boton guardar del formulario principal */

			/* Inicia código para funcionalidad del botón guardar del formulario de registro de esposo */
			$(function(){
				$("#btn-guardar-esposo").click(function(){
					//if(validarVacios()){
						if (confirm("¿Esta seguro de querer guardar estos datos?")){
							$.ajax({
								type : "POST",
								url : "../persona/proc_persona_modal.php",
								data : $("#form_registrar_esposo").serialize(),
								success : function(data){
									//$("#mensajes").html(data);
									//cargarEsposo(data);
									cargarEsposo(JSON.parse(data));
								}
							});
						}
					//}
				});
			});
			/*  Termina código para funcionalidad del boton guardar del formulario de registro de esposo */

			/* Inicia código para la funcionalidad del boton buscar del formulario de búsqueda del esposo */
			$(function(){
				$("#btn2-buscar-esposo").click(function(){
					$.ajax({
						type : "POST",
						url : "proc_matrimonio_acta.php",
						data : $("#form_buscar_esposo").serialize(),
						success : function(data){
							$("#resultado-buscar-esposo").html(data);
						}
					});
				});
			});
			/* Termina código para la funcionalidad del boton buscar del forulario  de búsqueda del padre */

			/* Inicia código para la funcionalidad del boton buscar del formulario de búsqueda de la esposa */
			$(function(){
				$("#btn2-buscar-esposa").click(function(){
					$.ajax({
						type : "POST",
						url : "proc_matrimonio_acta.php",
						data : $("#form_buscar_esposa").serialize(),
						success : function(data){
							$("#resultado-buscar-esposa").html(data);
						}
					});
				});
			});
			/* Termina código para la funcionalidad del boton buscar del formulario de búsqueda de la esposa */

			/* Inicia función para cargar los datos del esposo */
			function cargarEsposo(esposo){
				//esposo = JSON.parse(esposo);
				//alert("Entra a cargar " + esposo.cod_per);
				$("#cod_eso").attr({value: esposo.cod_per});
				$("#nom_eso").attr({value: esposo.nom});
				$("#ape1_eso").attr({value: esposo.ape1});
				$("#ape2_eso").attr({value: esposo.ape2});
			}
			/* Termina función para cargar los datos de la esposo */

			/* Inicia función para cargar los datos de la esposa */
			function cargarEsposa(esposa)
			{
				$("#cod_esa").attr({value: esposa.cod_per});
				$("#nom_esa").attr({value: esposa.nom});
				$("#ape1_esa").attr({value: esposa.ape1});
				$("#ape2_esa").attr({value: esposa.ape2});
			}
			/* Termina función para cargar los datos de la esposa */

			/* Inicia fución para cambiar el valor del imput esc_lib */
			function cambio(){
				var input = $("#esc_libx").val();
				input = input.replace("C:\\fakepath\\","");
				$("#esc_lib").attr({value : input });
			}
			/* Termina función para cambiar el valor del imput esc_lib */

			/* Inicia función de validación*/
			function validarVacios(){
				function alerta(){
					alert("Faltan campos por llenar");
				}

				if($("#ano_lib").val() == ""){
					alerta();
					$("#ano_lib").focus();
					return false;
				} else if($("#num_lib").val() == ""){
					alerta();
					$("#num_lib").focus();
					return false;
				} else if($("#num_tom").val() == ""){
					alerta();
					$("#num_tom").focus();
					return false;
				} else if($("#num_pag").val() == ""){
					alerta();
					$("#num_pag").focus();
					return false;
				} else if($("#num_act").val() == ""){
					alerta();
					$("#num_act").focus();
					return false;
				} else if($("#nom_eso").val() == ""){
					alerta();
					$("#nom_eso").focus();
					return false;
				} else if($("#ape1_eso").val() == ""){
					alerta();
					$("#ape1_eso").focus();
					return false;
				} else if($("#nom_esa").val() == ""){
					alerta();
					$("#nom_esa").focus();
					return false;
				} else if($("#ape1_esa").val() == ""){
					alerta();
					$("#ape1_esa").focus();
					return false;
				} else if($("#fec_mat").val() == ""){
					alerta();
					$("#fec_mat").focus();
					return false;
				} else if($("#cue").val() == ""){
					alerta();
					$("#cue").focus();
					return false;
				}else {
					return true;
				}
			}
			/* Termina función de validación*/

		</script>
		<!-- Termina código javascript -->

	</body>
</html>