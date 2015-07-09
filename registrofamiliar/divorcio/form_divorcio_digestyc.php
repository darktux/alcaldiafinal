<?php
	require_once("../php/var.php");
	if(isset($_GET[num_lib]) and isset($_GET[num_par])){
		require_once("../../php/conexion.php");
		$conexion = conectar();

		$consulta = "SELECT * FROM rf_divorcio_partida WHERE (num_lib, num_par) = ($_GET[num_lib], $_GET[num_par])";
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
<html>
<head>
	<meta charset="utf-8">
	<title>Registro de Divorcios DIGESTYC</title>
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/retoques.css">
	<script type="text/javascript" src="../../js/jquery.min-1.7.1-google.js"></script>
 	<script type="text/javascript" src="../../js/bootstrap-2.0.2.js"></script>
 	<script type="text/javascript" src="../../js/funciones.js"></script>
</head>
<body>

	<div id="mensajes">
		<!-- Area de mensajes -->
	</div>

	<!-- Comienza Formulario -->
		<form class="well form-horizontal" name="form_divorcio_digestyc" id="form_divorcio_digestyc" action="" method="POST">
			<fieldset>
			<legend>Registro de Divorcios DIGESTYC</legend>
			
			<input type="hidden" name="accion" id="accion" value="guardar-divorcio-digestyc">
			
			<div class="tabbable tabs-left">
				<ul class="nav nav-tabs">
					<li id="tab1" class="active"><a href="#1" data-toggle="tab" >Datos generales</a></li>
					<li id="tab2"					 ><a href="#2" data-toggle="tab" >Datos del esposo</a></li>
					<li id="tab3" 					 ><a href="#3" data-toggle="tab" >Datos de la esposa</a></li>
					<li id="tab4"					 ><a href="#4" data-toggle="tab" >Otros datos</a></li>
				</ul>
			
			<div class="tab-content">
			
							
				<div id="1" class="tab-pane active">
			
<!-- Comienzan datos del registro -->
				<div class="control-group">
					<label class="control-label" for="num_lib">Libro No.</label>
					<div class="controls">
						<input type="number" class="input-mini" name="num_lib" id="num_lib" value="<?php echo $num_lib; ?>" disabled="">
						<input type="hidden" name="num_lib" id="num_lib" value="<?php echo $num_lib; ?>">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="num_par">Partida No.</label>
					<div class="controls">
						<input type="number" class="input-mini" name="num_par" id="num_par" value="<?php echo $num_par; ?>" disabled="">
						<input type="hidden" name="num_par" id="num_par" value="<?php echo $num_par; ?>">
					</div>
				</div>
<!-- Terminan Datos del Registro -->

<!-- Comienzan datos del Lugar y Fecha del Divorcio -->
				<div class="control-group">
					<label class="control-label" for="dep_div">Departamento del divorcio </label>
					<div class="controls">
						<select name="dep_div" id="dep_div"  onchange="cargarMunicipios('dep_div', 'mun_div');">
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="mun_div">Municipio del divorcio</label>
					<div class="controls">
						<select name="mun_div" id="mun_div">
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="fec_fal">Fecha del fallo</label>
					<div class="controls">
						<input type="date" name="fec_fal" id="fec_fal" value="<?php echo $fec_div ?>" disabled="">
					</div>
				</div>
<!-- Terminan datos del Lugar y Fecha del Divorcio -->

				</div>
				<div id="2" class="tab-pane">
				
<!-- Comienzan datos del Esposo -->				
				<div class="control-group">
					<label class="control-label" for="nom_eso">Nombres y apellidos del esposo</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="nom_eso" id="nom_eso" value="<?php echo $nom_eso  . " " . $ape1_eso . " " . $ape2_eso ?>" disabled="">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="eda_eso">Edad del esposo</label>
					<div class="controls">
						<input type="number" min="14" max="125" class="input-mini" name="eda_eso" id="eda_eso"></input>
					</div>
				</div>
			
				<div class="control-group">
					<label class="control-label" for="alf_eso">Sabe leer y escribir</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="alf_eso" id="Si" value="S" checked="">
							Si
						</label>
						<label class="radio inline">
							<input type="radio" name="alf_eso" id="No" value="N">
							NO
						</label>
						<label class="radio inline">
							<input type="radio" name="alf_eso" id="Ignorado" value="I">
							Ignorado
						</label>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="ocu_eso">Ocupación actual del esposo</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="ocu_eso" id="ocu_eso">
					</div>
				</div>				
				
				<div class="control-group">
					<label class="control-label" for="dep_res_eso">Departamento de residencia del esposo</label>
					<div class="controls">
						<select name="dep_res_eso" id="dep_res_eso" onchange="cargarMunicipios('dep_res_eso', 'mun_res_eso');">
						<option>Ahuachap&aacute;n</option>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="mun_res_eso">Municipio de residencia del esposo</label>
					<div class="controls">
						<select name="mun_res_eso" id="mun_res_eso">
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="can_res_eso	">Cant&oacute;n de residencia del esposo</label>	
					<div class="controls">
						<input type="text" class="input-large" name="can_res_eso	" id="can_res_eso	">
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="are_res_eso">Area de residencia del esposo</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="are_res_eso" id="Urbana" value="U">
							Urbana
						</label>
						<label class="radio inline">
							<input type="radio" name="are_res_eso" id="Rural" value="R"  checked="">
							Rural
						</label>
					</div>
				</div>
<!-- Terminan datos del Esposo -->
	
				</div>
				<div id="3" class="tab-pane">
				
<!-- Comienzan datos de la Esposa-->
				<div class="control-group">
					<label class="control-label" for="nom_esa">Nombres y apellidos de la esposa</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="nom_esa" value="<?php echo $nom_esa . " " . $ape1_esa . " " . $ape2_esa ?>" disabled="">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="eda_esa">Edad de la esposa</label>
					<div class="controls">
						<input type="number" min="14" max="125" class="input-mini" name="eda_esa" id="eda_esa"></input>
					</div>
				</div>
			
				<div class="control-group">
					<label class="control-label" for="alf_esa">Sabe leer y escribir</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="alf_esa" id="Si" value="S" checked="">
							Si
						</label>
						<label class="radio inline">
							<input type="radio" name="alf_esa" id="No" value="N">
							NO
						</label>
						<label class="radio inline">
							<input type="radio" name="alf_esa" id="Ignorado" value="I">
							Ignorado
						</label>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="ocu_esa">Ocupación actual de la esposa</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="ocu_esa" id="ocu_esa">
					</div>
				</div>				
				
				<div class="control-group">
					<label class="control-label" for="dep_res_esa">Departamento de residencia de la esposa</label>
					<div class="controls">
						<select id="dep_res_esa" name="dep_res_esa" onchange="cargarMunicipios('dep_res_esa', 'mun_res_esa');">
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="mun_res_esa">Municipio de residencia de la esposa</label>
					<div class="controls">
						<select name="mun_res_esa" id="mun_res_esa">
						</select>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="can_res_esa">Cant&oacute;n de residencia de la esposa</label>	
					<div class="controls">
						<input type="text" class="input-large" name="can_res_esa" id="can_res_esa">
					</div>				
				</div>
				
				<div class="control-group">
					<label class="control-label" for="are_res_esa">Area de residencia de la esposa</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="are_res_esa" id="Urbana" value="U">
							Urbana
						</label>
						<label class="radio inline">
							<input type="radio" name="are_res_esa" id="Rural" value="R" checked="">
							Rural
						</label>
					</div>
				</div>
<!-- Terminan datos de la Esposa-->

				</div>
				<div id="4" class="tab-pane">
				
<!-- Comienzan datos del Divorcio -->
				<div class="control-group">
					<label class="control-label" for="cau_div">Causal del divorcio</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="cau_div" id="cau_div" value="Mutuo consentiento" checked="">
							Mutuo consentimiento
						</label>
						<label class="radio inline">
							<input type="radio" name="cau_div" id="separacion" value="Separación de los cónyugues">
							Separación de los cónyugues
						</label>
						<label class="radio inline">
							<input type="radio" name="cau_div" id="intolerancia" value="Por ser Intolerable la vida común">
							Por ser Intolerable la vida en común
						</label>
						<label class="radio inline">
							<input type="radio" name="cau_div" id="ignorado" value="Ignorado">
							Ignorado
						</label>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="fec_mat">Fecha del matrimonio</label>
					<div class="controls">
						<input type="date"  min="1961-01-01" max="<?php echo date('Y-m-d'); ?>" name="fec_mat" id="fec_mat">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="num_hij">Número de hijos</label>
					<div class="controls">
						<input type="number" min="0" max="30" class="input-mini" name="num_hij" id="num_hij"></input>
					</div>
				</div>
<!-- Terminan datos del Divorcio-->
				
<!-- Comienzan otros datos-->				
				<div class="control-group">
					<label class="control-label" for="fec_reg">Fecha de registro</label>
					<div class="controls">
						<input type="date" min="1961-01-01" max="<?php echo date('Y-m-d'); ?>" name="fec_reg" id="fec_reg" value="<?php echo date('Y-m-d'); ?>">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="obs">Observaciones</label>
					<div class="controls">
						<textarea class="input-xxlarge" name="obs" id="obs"></textarea>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="nom_reg">Nombre del registrador</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="nom_reg" id="nom_reg" value="<?php echo $variables['nom_jef_reg_fam']; ?>">
					</div>
				</div>
<!-- Terminan otros datos-->	

<!-- Comienzan Botones-->			
				<div class="form-actions" style="background-color:transparent;">
					<button type="button" class="btn" name="btn-guardar" id="btn-guardar"><img src="../../img/icon-save.png" height="14" width="14"> Guardar</button>
					<button type="reset" class="btn"><i class="icon-trash"></i> Limpiar</button>
					<button type="button" class="btn" onclick="parent.location='../index_registrofamiliar.php'"><i class="icon-remove"></i> Cancelar</button>
				</div>
<!-- Terminan Botones-->

			</div>

			</div>
<!-- fin del content-tab -->
			
			</div>
<!-- fin del tabbable -->
			
			</fieldset>
		</form>
<!-- Termina formulario -->

<!-- Inicia AJAX -->
	<script type="text/javascript">
		$(function(){
			
			//Cargar los selects de departamento y municipio
			cargarDepartamentos("dep_div");
			cargarMunicipios("dep_div", "mun_div");
			
			cargarDepartamentos("dep_res_eso");
			cargarMunicipios("dep_res_eso", "mun_res_eso");
			
			cargarDepartamentos("dep_res_esa");
			cargarMunicipios("dep_res_esa", "mun_res_esa");
			
		});
		
		$(function(){
 			$("#btn-guardar").click(function(){ // #btn_guardar es el boton encargado de llamar al script php
 				var url = "proc_divorcio_digestyc.php"; // proc_persona.php El script a dónde se realizará la petición.
   			if(confirm("¿Esta seguro de querer guardar estos datos?")){
   				$.ajax({
          			type: "POST",
           			url: url,
           			data: $("#form_divorcio_digestyc").serialize(), // Adjuntar los campos del formulario enviado.
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