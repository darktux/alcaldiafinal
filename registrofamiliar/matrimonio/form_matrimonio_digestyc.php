<?php
	require_once("../php/var.php");
	if(isset($_GET["num_lib"]) and isset($_GET["num_par"])){
		require_once("../../php/conexion.php");
		$conexion = conectar();

		$consulta = "SELECT * FROM rf_matrimonio_partida WHERE (num_lib, num_par) = ($_GET[num_lib], $_GET[num_par])";
		$resultado = pg_query($consulta);
		
		$registro = pg_fetch_array($resultado);
	
		foreach($registro as $clave => $valor){
			if(is_string($x = $clave)){
				$$clave = $valor;
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Registro de Matrimonios DIGESTYC</title>
		<link rel="stylesheet" href="../../css/bootstrap.css">
		<link rel="stylesheet" href="../../css/retoques.css">
		<script type="text/javascript" src="../../js/jquery.min-1.7.1-google.js"></script>
		<script type="text/javascript" src="../../js/bootstrap-2.0.2.js"></script>
		<script type="text/javascript" src="../../js/funciones.js"></script>
	</head>
	<body style="background-color: rgba(255,255,255,0.85);">
	
	<div id="mensajes">
		<!-- Area de mensajes -->
	</div>

<!-- Comienza Formulario -->
			<form class="well form-horizontal" name="form_matrimonio_digestyc" id="form_matrimonio_digestyc" action="" method="POST" style="background-color:transparent;">
				<fieldset>
				<legend>Registro de Matrimonios DIGESTYC</legend>
				
				<input type="hidden" name="accion" id="accion" value="guardar-matrimonio-digestyc">

<!-- Inicio del tabbable -->
				<div class="tabbable tabs-left">
					<ul class="nav nav-tabs">
						<li id="tab1" class="active"><a href="#1" data-toggle="tab"> Datos generales </a></li>
						<li id="tab2"					 ><a href="#2" data-toggle="tab"> Datos del esposo </a></li>
						<li id="tab3"					 ><a href="#3" data-toggle="tab"> Datos de la esposa </a></li>
						<li id="tab4"					 ><a href="#4" data-toggle="tab"> Otros datos </a></li>
					</ul>
				
<!-- Inicio del tab-content -->
				<div class="tab-content">
				
				<div class="tab-pane active" id="1">

<!-- Comienzan datos del registro -->
				<div class="control-group">
					<label class="control-label" for="num_lib">Libro No.</label>
					<div class="controls">
						<input type="text" class="input-mini" name="num_lib_disabled" id="num_lib_disabled" value="<?php echo $num_lib; ?>" disabled="">
						<input type="hidden" name="num_lib" id="num_lib" value="<?php echo $num_lib; ?>">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="num_par">Partida No.</label>
					<div class="controls">
						<input type="text" class="input-mini" name="num_par_disabled" id="num_par_disabled" value="<?php echo $num_par; ?>" disabled="">
						<input type="hidden" name="num_par" id="num_par" value="<?php echo $num_par; ?>">
					</div>
				</div>
<!-- Terminan Datos del Registro -->
				
<!-- Comienzan datos del Lugar y Fecha -->
					<div class="control-group">
						<label class="control-label" for="dep_mat">Departamento</label>
						<div class="controls">
							<select name="dep_mat" id="dep_mat" onchange="cargarMunicipios('dep_mat', 'mun_mat');">
							</select>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="mun_mat" >Municipio</label>
						<div class="controls">
							<select name="mun_mat" id="mun_mat">
							</select>
						</div>
					</div>
					
					<div class="contol-group">
						<label class="control-label" for="fec_mat">Fecha</label>
						<div class="controls">
							<input type="date" name="fec_mat" id="fec_mat" value="<?php echo $fec_mat; ?>" disabled>
						</div>
					</div>
<!-- Terminan datos del Lugar y Fecha -->

				</div>
				<div class="tab-pane" id="2">
					
<!-- Comienzan datos del Esposo -->
					<div class="control-group">
						<label class="control-label" for="nom_eso">Nombres y apellidos</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="nom_eso" id="nom_eso" value="<?php echo $nom_eso . ' ' . $ape1_eso . ' ' . $ape2_eso; ?>" disabled="">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="eda_eso">Edad</label>
						<div class="controls">
							<input type="number" min="14" max="125" class="input-mini" name="eda_eso" id="eda_eso">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="dep_eso">Departamento</label>
						<div class="controls">
							<select name="dep_eso" id="dep_eso"  onchange="cargarMunicipios('dep_eso', 'mun_eso');">
							</select>
						</div>						
					</div>
					
					<div class="control-group">
						<label class="control-label" for="mun_eso">Municipio</label>
						<div class="controls">
							<select name="mun_eso" id="mun_eso">
							</select>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="can_eso">Cantón</label>
						<div class="controls">
							<input type="text" class="input-large" name="can_eso" id="can_eso">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="zon_eso">Area</label>
						<div class="controls">
							<label class="radio inline">
								<input type="radio" name="zon_eso" id="urbana" value="Urbana">
								Urbana
							</label>
							<label class="radio inline">
								<input type="radio" name="zon_eso" id="rural" value="Rural" checked="">
								Rural
							</label>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="est_civ_eso">Estado civil</label>
						<div class="controls">
							<label class="radio inline">
								<input type="radio" name="est_civ_eso" id="soltero" value="Soltero" checked="">
								Soltero
							</label>
							<label class="radio inline">
								<input type="radio" name="est_civ_eso" id="viudo" value="Viudo">
								Viudo
							</label>
							<label class="radio inline">
								<input type="radio" name="est_civ_eso" id="divorciado" value="Divorciado">
								Divorciado
							</label>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="alf_eso" for>Sabe leer y escribir</label>
						<div class="controls">
							<label class="radio inline">
								<input type="radio" name="alf_eso" id="si" value="Si" checked="">
								Si
							</label>
							<label class="radio inline">
								<input type="radio" name="alf_eso" id="No" value="NO" >
								No
							</label>
							<label class="radio inline">
								<input type="radio" name="alf_eso" id="ignorado" value="Ignorado">
								Ignorado
							</label>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="ocu_eso">Ocupación actual</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="ocu_eso" id="ocu_eso">
						</div>
					</div>
<!-- Terminan datos del Esposo-->
					
				</div>
				<div class="tab-pane" id="3">
					
<!-- Comienzan datos de la Esposa -->
					<div class="control-group">
						<label class="control-label" for="nom_esa">Nombres y apellidos</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="nom_esa" id="nom_esa" value="<?php echo $nom_esa . ' ' . $ape1_esa . ' ' . $ape2_esa;?>" disabled="">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="eda_esa">Edad</label>
						<div class="controls">
							<input type="number"  min="14" max="125" class="input-mini" name="eda_esa" id="eda_esa">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="dep_esa">Departamento</label>
						<div class="controls">
							<select name="dep_esa" id="dep_esa" onchange="cargarMunicipios('dep_esa', 'mun_esa');">
							</select>
						</div>						
					</div>
					
					<div class="control-group">
						<label class="control-label" for="mun_esa">Municipio</label>
						<div class="controls">
							<select name="mun_esa" id="mun_esa">
							</select>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="can_esa">Cantón</label>
						<div class="controls">
							<input type="text" class="input-large" name="can_esa" id="can_esa">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="zon_esa">Area</label>
						<div class="controls">
							<label class="radio inline">
								<input type="radio" name="zon_esa" id="urbana" value="Urbana">
								Urbana
							</label>
							<label class="radio inline">
								<input type="radio" name="zon_esa" id="rural" value="Rural" checked="">
								Rural
							</label>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="est_civ_esa">Estado civil</label>
						<div class="controls">
							<label class="radio inline">
								<input type="radio" name="est_civ_esa" id="soltera" value="Soltera" checked="">
								Soltera
							</label>
							<label class="radio inline">
								<input type="radio" name="est_civ_esa" id="viuda" value="Viuda">
								Viuda
							</label>
							<label class="radio inline">
								<input type="radio" name="est_civ_esa" id="divorciada" value="Divorciada">
								Divorciada
							</label>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="alf_esa" for>Sabe leer y escribir</label>
						<div class="controls">
							<label class="radio inline">
								<input type="radio" name="alf_esa" id="si" value="Si" checked="">
								Si
							</label>
							<label class="radio inline">
								<input type="radio" name="alf_esa" id="No" value="NO" >
								No
							</label>
							<label class="radio inline">
								<input type="radio" name="alf_esa" id="ignorado" value="Ignorado">
								Ignorado
							</label>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="ocu_esa">Ocupación actual</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="ocu_esa" id="ocu_esa">
						</div>
					</div>
<!-- Terminan datos de la Esposa -->

				</div>
				<div class="tab-pane" id="4">
					
<!-- Comienzan Otros -->	
					<div class="control-group">
						<label class="control-label" for="fec_reg">Fecha de registro</label>
						<div class="controls">
							<input type="date" max="<?php echo date('Y-m-d'); ?>" name="fec_reg" id="fec_reg" value="<?php echo date('Y-m-d'); ?>">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="nom_reg">Nombre del registrador</label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="nom_reg" id="nom_reg" value="<?php echo $variables['nom_jef_reg_fam']; ?>">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="obs">Observaciones</label>
						<div class="controls">
							<textarea class="input-xxlarge" rows="4" name="obs" id="obs"></textarea>
						</div>
					</div>
<!-- Terminan Otros -->
					
					<div class="form-actions" style="background-color:transparent;">
						<button type="button" class="btn" name="btn-guardar" id="btn-guardar" ><img src="../../img/icon-save.png" height="14" width="14"> Guardar</button>
						<button type="clear" class="btn"><i class="icon-trash"></i> Borrar</button>
						<button type="button" class="btn" onclick="parent.location='../index_registrofamiliar.php'"><i class="icon-remove"></i> Cancelar</button>
					</div>
					
					</div>
				
				</div>
<!-- Fin del tab-content -->
					
				</div>
<!-- Fin del tabbable -->
					
				</fieldset>
			</form>
<!-- Termina Formulario -->

<!-- Inicia AJAX -->
	<script type="text/javascript">
		$(function(){
			cargarDepartamentos("dep_mat");
			cargarMunicipios("dep_mat", "mun_mat");
			
			cargarDepartamentos("dep_esa");
			cargarMunicipios("dep_esa", "mun_esa");
			
			cargarDepartamentos("dep_eso");
			cargarMunicipios("dep_eso", "mun_eso");
		});
		
		$(function(){
 			$("#btn-guardar").click(function(){ // #btn_guardar es el boton encargado de llamar al script php
 				var url = "proc_matrimonio_digestyc.php"; // proc_persona.php El script a dónde se realizará la petición.
   			if(confirm("¿Esta seguro de querer guardar estos datos?")){
   				$.ajax({
          			type: "POST",
           			url: url,
           			data: $("#form_matrimonio_digestyc").serialize(), // Adjuntar los campos del formulario enviado.
           			success: function(data){
               		$("#mensajes").html(data); // Mostrar la respuestas del script PHP.
          				}
        			});
        		 }
   			return false; // Evitar ejecutar el submit del formulario.
 			});
		});
	</script>
	<!-- Termina AJAX -->
	</body>
</html>