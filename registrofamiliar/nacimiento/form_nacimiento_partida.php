<?php
include_once("../php/var.php");
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Registro de Partidas de Nacimiento</title>
		<link rel="stylesheet" href="../../css/bootstrap.css">
		<link rel="stylesheet" href="../../css/retoques.css">
		<link rel="stylesheet" href="../../css/pnotify.custom.css">
		<!-- <link rel="stylesheet" href="../../css/table.css"> -->
		<script type="text/javascript" src="../../js/jquery.min-1.7.1-google.js"></script>
		<script type="text/javascript" src="../../js/bootstrap-2.0.2.js"></script>
		<!-- <script type="text/javascript" src="../../js/table.js"></script> -->
		<script src="../../js/pnotify.custom.js"></script>
		<script type="text/javascript" src="../../js/funciones.js"></script>
		<script type="text/javascript" src="../../js/jquery.maskedinput.js"></script>
	</head>
	<body>
		
		<!-- Inicia área de mensajes -->
		<div id="mensajes">
		</div>
		<!-- Termina área de mensajes -->
	
		<!-- Inicia formulario principal -->
		<form name="form_nacimiento_partida" id="form_nacimiento_partida" class="form-horizontal well" method="" action="">
			<legend>Registro de Partidas de Nacimiento</legend>
			
			<input type="hidden" name="accion" id="accion" value="guardar-nacimiento-partida">
			<input type="hidden" name="cod_per" id="cod_per" value="">
			<input type="hidden" name="cod_mad" id="cod_mad" value="">
			<input type="hidden" name="cod_pad" id="cod_pad" value="">
			<input type="hidden" name="cod_inf" id="cod_inf" value="">
			<input type="hidden" name="cod_tes1" id="cod_tes1" value="">
			<input type="hidden" name="cod_tes2" id="cod_tes2" value="">
			
			<!-- Inicia área de pestañas -->
			<div class="tabbable tabs-left">
				
				<!-- Inicia área de menú -->
				<ul id="pestanas" class="nav nav-tabs">
					<li class="active"><a href="#datos-del-inscrito-a" data-toggle="tab">Datos del inscrito(a)</a></li>
					<li><a href="#datos-de-la-madre" data-toggle="tab">Datos de la madre</a></li>
					<li><a href="#datos-del-padre" data-toggle="tab">Datos del padre</a></li>
					<li><a href="#datos-del-informante" data-toggle="tab">Datos del informante</a></li>
					<li><a href="#datos-de-los-testigos" data-toggle="tab">Datos de los testigos</a></li>
				</ul>
				<!-- Termina área de menú -->
				
				<!-- Inicia área de bloques -->
				<div class="tab-content">
				
					<!-- Inicia primer bloque, datos del inscrito(a) -->
					<div class="tab-pane active" id="datos-del-inscrito-a">
					
						<div class="row-fluid">
							<div id="xd" class="control-group span3">
								<label class="control-label" for="ano_lib">Año (*)</label>
								<div class="controls">
									<input type="number" min="1911" max="<?php echo date('Y') ?>" class="input-mini" name="ano_lib" id="ano_lib" value="<?php echo date('Y') ?>">
								</div>
							</div>

							<div class="control-group span3 offset1">
								<label class="control-label" for="num_lib" style="text-align: right;">Libro No.&nbsp;&nbsp;&nbsp;&nbsp; (*)</label>
								<div class="controls">
									<input type="number" min="1" max="<?php echo date('Y') - 1911; ?>" class="input-mini" name="num_lib" id="num_lib" value="<?php echo date('Y') - 1911; ?>">
								</div>
							</div>
						
							<div class="control-group span3 offset1">
								<label class="control-label" for="num_tom" style="text-align: right;">Tomo No. (*)</label>
								<div class="controls">
								<input type="number" min="1" max="10" class="input-mini" name="num_tom" id="num_tom" value="1">
								</div>
							</div>
						</div>
						
						<div class="row-fluid">
							<div class="control-group span3">
								<label class="control-label" for="num_pag">Folio (*)</label>
								<div class="controls">
									<input type="number" min="1" max="500" class="input-mini" name="num_pag" id="num_pag">
								</div>
							</div>
						
							<div class="control-group span3 offset1">
								<label class="control-label" for="num_par" style="text-align: right;">Partida No. (*)</label>
								<div class="controls">
									<input type="number" min="1" max="500" class="input-mini" name="num_par" id="num_par">
								</div>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="nom">Nombre del bebé (*)</label>
							<div class="controls">
								<input type="text" class="span3" name="nom" id="nom">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="sex">Sexo (*)</label>
							<div class="controls">
								<label class="radio inline">
									<input type="radio" class="" name="sex" id="sex_m" value="M">
									Masculino
								</label>
								<label class="radio inline">
									<input type="radio" class="" name="sex" id="sex_f" value="F" checked="">
									Femenino
								</label>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="lug_nac">Lugar de nacimiento (*)</label>
							<div class="controls">
								<input type="text" class="input-xlarge" name="lug_nac" id="lug_nac">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="dep_nac">Departamento de nacimiento (*)</label>
							<div class="controls">
								<select name="dep_nac" id="dep_nac" onchange="cargarMunicipios('dep_nac', 'mun_nac')"></select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="mun_nac">Municipio de nacimiento (*)</label>
							<div class="controls">
								<select name="mun_nac" id="mun_nac"></select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="fec_nac">Fecha de nacimiento (*)</label>
							<div class="controls">
								<input type="date" min="1911-01-01" max="<?php echo date('Y-m-d'); ?>" class="" name="fec_nac" id="fec_nac">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="hor_min">Hora de nacimiento (*)</label>
							<div class="controls">
								<input type="time" class="" name="hor_min" id="hor_min">
							</div>
						</div>
										
					</div>
					<!-- Termina primer bloque, datos del inscrito(a) -->
						
					<!-- Inicia segundo bloque, datos de la madre -->
					
					<div class="tab-pane" id="datos-de-la-madre">
						
						<!-- <div class="control-group">
							<label class="radio inline">
								<input type="radio" name="mad_tip_ing" id="mad_bus" onclick="desactivarFormularioMadre();" checked="">
								Buscar madre
							</label>
							<label class="radio inline">
								<input type="radio" name="mad_tip_ing" id="mad_man" onclick="activarFormularioMadre();">
								Ingreso manual
							</label>
						</div> -->
						
						<div class="control-group">
							<button type="button" class="btn" name="btn-buscar-madre" id="btn-buscar-madre" data-toggle="modal" href="#buscar-madre"><i class="icon-search"></i> Buscar madre</button>
							<button type="button" class="btn" name="btn-registrar-madre" id="btn-registrar-madre" data-toggle="modal" href="#modal-registrar-madre" tabindex="-1"><i class="icon-plus"></i></button>
						</div>
					
						<div class="control-group">
							<label class="control-label" for="nom_mad">Nombre de la madre (*)</label>
							<div class="controls">
								<input type="text" class="span3" name="nom_mad" id="nom_mad">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="ape1_mad">Primer apellido (*)</label>
							<div class="controls">
								<input type="text" class="span3" name="ape1_mad" id="ape1_mad">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="ape2_mad">Segundo apellido</label>
							<div class="controls">
								<input type="text" class="span3" name="ape2_mad" id="ape2_mad">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="eda_mad">Edad (*)</label>
							<div class="controls">
								<input type="number" class="input-mini" name="eda_mad" id="eda_mad" min="10" max="100">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="ocu_mad">Profesión u oficio (*)</label>
							<div class="controls">
								<input type="text" class="span3" name="ocu_mad" id="ocu_mad">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="dep_ori_mad">Departamento de origen (*)</label>
							<div class="controls">
								<select name="dep_ori_mad" id="dep_ori_mad" onchange="cargarMunicipios('dep_ori_mad', 'mun_ori_mad')"></select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="mun_ori_mad">Municipio de origen (*)</label>
							<div class="controls">
								<select name="mun_ori_mad" id="mun_ori_mad"></select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="dep_res_mad">Departamento de residencia (*)</label>
							<div class="controls">
								<select name="dep_res_mad" id="dep_res_mad" onchange="cargarMunicipios('dep_res_mad', 'mun_res_mad')"></select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="mun_res_mad">Municipio de residencia (*)</label>
							<div class="controls">
								<select name="mun_res_mad" id="mun_res_mad"></select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="nac_mad">Nacionalidad (*)</label>
							<div class="controls">
								<input type="text" class="span3" name="nac_mad" id="nac_mad" value="Salvadoreña">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="doc_mad">Tipo de documento (*)</label>
							<div class="controls">
								<select class="span2" name="doc_mad" id="doc_mad">
								<option selected="" id="doc_mad_dui" value="DUI">DUI</option>
								<option id="doc_mad_pasaporte" value="Pasaporte">Pasaporte</option>
								</select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="num_doc_mad">Número de documento (*)</label>
							<div class="controls">
								<input type="text" class="span2" name="num_doc_mad" id="num_doc_mad">
							</div>
						</div>
						
					</div>
					<!-- Termina segundo bloque, datos de la madre -->
				
					<!-- Inicia tercer bloque, datos del padre -->
					<div class="tab-pane" id="datos-del-padre">

						<div class="control-group">
							<button type="button" class="btn" name="btn-buscar-padre" id="btn-buscar-padre" data-toggle="modal" href="#buscar-padre"><i class="icon-search"></i> Buscar padre</button>
							<button type="button" class="btn" name="btn-registrar-padre" name="btn-registrar-padre" data-toggle="modal" href="#modal-registrar-padre" tabindex="-1"><i class="icon-plus"></i></button>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="nom_pad">Nombre del padre (*)</label>
							<div class="controls">
								<input type="text" class="span3" name="nom_pad" id="nom_pad">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="ape1_pad">Primer apellido (*)</label>
							<div class="controls">
								<input type="text" class="span3" name="ape1_pad" id="ape1_pad">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="ape2_pad">Segundo apellido</label>
							<div class="controls">
								<input type="text" class="span3" name="ape2_pad" id="ape2_pad">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="eda_pad">Edad (*)</label>
							<div class="controls">
								<input type="number" min="10" max="100" class="input-mini" name="eda_pad" id="eda_pad">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="ocu_pad">Profesión u oficio (*)</label>
							<div class="controls">
								<input type="text" class="span3" name="ocu_pad" id="ocu_pad">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="dep_ori_pad">Departamento de origen (*)</label>
							<div class="controls">
								<select name="dep_ori_pad" id="dep_ori_pad" onchange="cargarMunicipios('dep_ori_pad', 'mun_ori_pad')"></select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="mun_ori_pad">Municipio de origen (*)</label>
							<div class="controls">
								<select name="mun_ori_pad" id="mun_ori_pad"></select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="dep_res_pad">Departamento de residencia (*)</label>
							<div class="controls">
								<select name="dep_res_pad" id="dep_res_pad" onchange="cargarMunicipios('dep_res_pad', 'mun_res_pad')"></select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="mun_res_pad">Municipio de residencia (*)</label>
							<div class="controls">
								<select name="mun_res_pad" id="mun_res_pad"></select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="nac_pad">Nacionalidad (*)</label>
							<div class="controls">
								<input type="text" class="span3" name="nac_pad" id="nac_pad" value="Salvadoreña">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="doc_pad">Tipo de documento (*)</label>
							<div class="controls">
								<select class="span2" name="doc_pad" id="doc_pad">
								<option selected="" id="doc_pad_dui" value="DUI">DUI</option>
								<option id="doc_pad_pasaporte" value="Pasaporte">Pasaporte</option>
								</select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="num_doc_pad">Número de documento (*)</label>
							<div class="controls">
								<input type="text" class="span2" name="num_doc_pad" id="num_doc_pad">
							</div>
						</div>
						
					</div>
					<!-- Termina tercer bloque, datos del padre -->
				
					<!-- Inicia cuarto bloque, datos del informante -->
					<div class="tab-pane" id="datos-del-informante">
					
					<div class="control-group">
						<label class="radio inline"><input type="radio" name="inf_tip" id="inf_pad" onclick="cargarInfPad()">Padre</label>
						<label class="radio inline"><input type="radio" name="inf_tip" id="inf_mad" onclick="cargarInfMad()">Madre</label>
						<label class="radio inline"><input type="radio" name="inf_tip" id="inf_otr" onclick="limpiarInf()">Otro</label>
					</div>
					
					<div class="control-group">
							<button type="button" class="btn" name="btn-buscar-informante" id="btn-buscar-informante" data-toggle="modal" href="#buscar-informante"><i class="icon-search"></i> Buscar informante</button>
							<button type="button" class="btn" name="btn-registrar-informante" id="btn-registrar-informante" data-toggle="modal" href="#modal-registrar-informante" tabindex="-1"><i class="icon-plus"></i></button>
					</div>
						
						<div class="control-group">
							<label class="control-label" for="nom_inf">Nombre de quien dió los datos (*)</label>
							<div class="controls">
								<input type="text" class="span3" name="nom_inf" id="nom_inf">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="ape1_inf">Primer apellido (*)</label>
							<div class="controls">
								<input type="text" class="span3" name="ape1_inf" id="ape1_inf">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="ape2_inf">Segundo apellido</label>
							<div class="controls">
								<input type="text" class="span3" name="ape2_inf" id="ape2_inf">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="doc_inf">Tipo de documento (*)</label>
							<div class="controls">
								<select class="span2" name="doc_inf" id="doc_inf">
								<option selected="" id="doc_inf_dui" value="DUI">DUI</option>
								<option id="doc_inf_pasaporte" value="Pasaporte">Pasaporte</option>
								</select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="num_doc_inf">Número de documento (*)</label>
							<div class="controls">
								<input type="text" class="span2" name="num_doc_inf" id="num_doc_inf">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="par_inf">Parentesco (*)</label>
							<div class="controls">
								<input type="text" class="span3" name="par_inf" id="par_inf">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="fir">Y para constancia firma o por no</label>
							<div class="controls">
								<select class="span2" name="fir" id="fir">
									<option></option>
									<option id="fir_pod" value="poder">poder</option>
									<option id="fir_sab" value="saber">saber</option>
								</select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="">Deja impresa la huella dactilar del dedo</label>
							<div class="controls">
								<select class="span2" name="ded" id="ded">
									<option></option>
									<option id="ded_pul" value="pulgar">pulgar</option>
									<option id="ded_ind" value="indice">indice</option>
									<option id="ded_med" value="medio">medio</option>
									<option id="ded_anur" value="anular">anular</option>
									<option id="ded_men" value="meñique">meñique</option>
								</select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="man_inf">De su mano</label>
							<div class="controls">
								<select class="span2" name="man" id="man">
									<option></option>
									<option id="man_der" value="derecha">derecha</option>
									<option id="man_izq" value="izquierda">izquierda</option>
								</select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="vir_ase">Se asienta en virtud de</label>
							<div class="controls">
								<select class="span2" name="vir_ase" id="vir_ase">
									<option></option>
									<option id="vir_ase_con" value="constancia">constancia</option>
									<option id="vir_ase_tes" value="testimonio">testimonio</option>
									<option id="vir_ase_sen" value="sentencia">sentencia</option>
								</select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="fec_vir_ase">Fecha de Constancia/ Sentencia/Testimonio</label>
							<div class="controls">
								<input type="date" min="1911-01-01" max="<?php echo date('Y-m-d'); ?>" name="fec_vir_ase" id="fec_vir_ase">
							</div>
						</div>
						
					</div>
					<!-- Termina cuarto bloque, datos del informante -->
				
					<!-- Inicia quinto bloque, datos de los testigos -->
					<div class="tab-pane" id="datos-de-los-testigos">
						
						<div class="control-group">
							<label class="control-label" for="dec_tes">Con las declaraciones de los testigos de:</label>
							<div class="controls">
								<select class="span2" name="dec_tes" id="dec_tes">
								<option></option>
								<option id="dec_tes_act" value="Acto">acto</option>
								<option id="dec_tes_con" value="conocimiento">conocimiento</option>
								</select>
							</div>
						</div>
						
						<div class="control-group">
							<button type="button" class="btn" name="btn-buscar-testigo1" id="btn-buscar-testigo1" data-toggle="modal" href="#buscar-testigo1"><i class="icon-search"></i> Buscar primer testigo</button>
							<button type="button" class="btn" name="btn-registrar-informante" id="btn-registrar-testigo1" data-toggle="modal" href="#modal-registrar-testigo1" tabindex="-1"><i class="icon-plus"></i></button>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="nom_tes1">Nombre del primer testigo</label>
							<div class="controls">
								<input type="text" class="span3" name="nom_tes1" id="nom_tes1">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="ape1_tes1">Primer apellido</label>
							<div class="controls">
								<input type="text" class="span3" name="ape1_tes1" id="ape1_tes1">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="ape2_tes1">Segundo apellido</label>
							<div class="controls">
								<input type="text" class="span3" name="ape2_tes1" id="ape2_tes1">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="doc_tes1">Tipo de documento</label>
							<div class="controls">
								<select class="span2" name="doc_tes1" id="doc_tes1">
								<option selected="" id="doc_tes1_dui" value="DUI">DUI</option>
								<option id="doc_tes1_pasaporte" value="Pasaporte">Pasaporte</option>
								</select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="num_doc_tes1">Número de documento</label>
							<div class="controls">
								<input type="text" class="span2" name="num_doc_tes1" id="num_doc_tes1">
							</div>
						</div>
						
						<div class="control-group">
							<button type="button" class="btn" name="btn-buscar-testigo2" id="btn-buscar-testigo2" data-toggle="modal" href="#buscar-testigo2"><i class="icon-search"></i> Buscar segundo testigo</button>
							<button type="button" class="btn" name="btn-registrar-informante" id="btn-registrar-testigo2" data-toggle="modal" href="#modal-registrar-testigo2" tabindex="-1"><i class="icon-plus"></i></button>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="nom_tes2">Nombre del segundo testigo</label>
							<div class="controls">
								<input type="text" class="span3" name="nom_tes2" id="nom_tes2">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="ape1_tes2">Primer apellido</label>
							<div class="controls">
								<input type="text" class="span3" name="ape1_tes2" id="ape1_tes2">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="ape2_tes2">Segundo apellido</label>
							<div class="controls">
								<input type="text" class="span3" name="ape2_tes2" id="ape2_tes2">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="doc_tes2">Tipo de documento</label>
							<div class="controls">
								<select class="span2" name="doc_tes2" id="doc_tes2">
								<option selected="" id="doc_tes2_dui" value="DUI">DUI</option>
								<option id="doc_tes2_pasaporte" value="Pasaporte">Pasaporte</option>
								</select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="num_doc_tes2">Número de documento</label>
							<div class="controls">
								<input type="text" class="span2" name="num_doc_tes2" id="num_doc_tes2">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="fec">Fecha</label>
							<div class="controls">
								<input type="date" min="1911-01-01" max="<?php echo date('Y-m-d'); ?>" class="" name="fec" id="fec" value="<?php echo date('Y-m-d'); ?>">
							</div>
						</div>
						
						<!-- <div class="control-group">
							<label class="control-label" for="esc_lib">Imagen escaneada</label>
							<div class="controls">
								<input type="file" class="input-file" name="esc_libx" id="esc_libx">
								<input type="hidden" name="esc_lib" id="esc_lib">
							</div>
						</div> -->
						
						<div class="control-group">
							<label class="control-label" for="nom_reg">Nombre del Registrador</label>
							<div class="controls">
								<input type="text" class="input-xlarge" name="nom_reg" id="nom_reg" value="<?php echo $variables['nom_jef_reg_fam']; ?>">
							</div>
						</div>
						
						<!-- Inicia area de botones -->
						<div class="form-actions" style="background-color:transparent;">
							<button type="button" class="btn" name="btn-guardar" id="btn-guardar"><img src="../../img/icon-save.png" height="14" width="14"> Guardar </button>
							<button type="reset" class="btn"><i class="icon-trash"></i> Limpiar</button>
							<button type="button" class="btn" onclick="parent.location='../index_registrofamiliar.php'"><i class="icon-remove"></i> Cancelar</button>
						</div>
						<!-- Termina area de botones -->
						
					</div>
					<!-- Terminan quinto bloque, datos de los testigos -->
				
				</div>
				<!-- Termina área de bloques -->
				
			</div>
			<!-- Termina área de pestañas -->
			
		</form>
		<!-- Termina formulario Principal -->
		
		<!-- Inicia formulario modal de búsqueda del padre -->
		<div class="modal hide fade" id="buscar-padre" >
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Buscar padre</h3>
			</div>
			<div class="modal-body">
				<div class="well">
				<form class="form form-search" name="form_buscar_padre" id="form_buscar_padre" action="" method="POST">
					<div class="control-group">
						<strong>Buscar por:</strong><br>
						<label class="radio inline"><input type="radio" name="nombre" value="nombre" checked>Nombre</label>
					</div>
					<input type="hidden" name="accion" value="buscar-padre">
		  			<input type="text" class="search-query" style="width:250px" name="nom" id="nom">
		  			<button type="button" class="btn" id="btn2-buscar-padre"><i class="icon-search"></i> Buscar</button>
				</form>
				</div>
				<div id="resultado-buscar-padre">
				
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!--	Termina formulario modal de búsqueda del padre -->
		
		<!-- Inicia formulario modal de búsqueda de la madre -->
		<div class="modal hide fade" id="buscar-madre" >
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Buscar madre</h3>
			</div>
			<div class="modal-body">
				<div class="well">
				<form class="form form-search" name="form_buscar_madre" id="form_buscar_madre" action="" method="POST">
					<div class="control-group">
						<strong>Buscar por:</strong><br>
						<label class="radio inline"><input type="radio" name="nombre" value="nombre" checked>Nombre</label>
					</div>
					<input type="hidden" name="accion" value="buscar-madre">
		  			<input type="text" class="search-query" style="width:250px" name="nom" id="nom">
		  			<button type="button" class="btn" id="btn2-buscar-madre"><i class="icon-search"></i> Buscar</button>
				</form>
				</div>
				<div id="resultado-buscar-madre">
				
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!--	Termina formulario modal de búsqueda de la madre -->
		
		<!-- Inicia formulario modal de búsqueda del informante -->
		<div class="modal hide fade" id="buscar-informante" >
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Buscar informante</h3>
			</div>
			<div class="modal-body">
				<div class="well">
				<form class="form form-search" name="form_buscar_informante" id="form_buscar_informante" action="" method="POST">
					<div class="control-group">
						<strong>Buscar por:</strong><br>
						<label class="radio inline"><input type="radio" name="nombre" value="nombre" checked>Nombre</label>
					</div>
					<input type="hidden" name="accion" value="buscar-informante">
		  			<input type="text" class="search-query" style="width:250px" name="nom" id="nom">
		  			<button type="button" class="btn" id="btn2-buscar-informante"><i class="icon-search"></i> Buscar</button>
				</form>
				</div>
				<div id="resultado-buscar-informante">
				
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!--	Termina formulario modal de búsqueda del informante -->
		
		<!-- Inicia formulario modal de búsqueda del primer testigo -->
		<div class="modal hide fade" id="buscar-testigo1" >
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Buscar Primer testigo</h3>
			</div>
			<div class="modal-body">
				<div class="well">
				<form class="form form-search" name="form_buscar_testigo1" id="form_buscar_testigo1" action="" method="POST">
					<div class="control-group">
						<strong>Buscar por:</strong><br>
						<label class="radio inline"><input type="radio" name="nombre" value="nombre" checked>Nombre</label>
					</div>
					<input type="hidden" name="accion" value="buscar-testigo1">
		  			<input type="text" class="search-query" style="width:250px" name="nom" id="nom">
		  			<button type="button" class="btn" id="btn2-buscar-testigo1"><i class="icon-search"></i> Buscar</button>
				</form>
				</div>
				<div id="resultado-buscar-testigo1">
				
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!--	Termina formulario modal de búsqueda del primer testigo -->
		
		<!-- Inicia formulario modal de búsqueda del segundo testigo -->
		<div class="modal hide fade" id="buscar-testigo2" >
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Buscar Segundo testigo</h3>
			</div>
			<div class="modal-body">
				<div class="well">
				<form class="form form-search" name="form_buscar_testigo2" id="form_buscar_testigo2" action="" method="POST">
					<div class="control-group">
						<strong>Buscar por:</strong><br>
						<label class="radio inline"><input type="radio" name="nombre" value="nombre" checked>Nombre</label>
					</div>
					<input type="hidden" name="accion" value="buscar-testigo2">
		  			<input type="text" class="search-query" style="width:250px" name="nom" id="nom">
		  			<button type="button" class="btn" id="btn2-buscar-testigo2"><i class="icon-search"></i> Buscar</button>
				</form>
				</div>
				<div id="resultado-buscar-testigo2">
				
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!-- Termina formulario modal de búsqueda del segundo testigo -->

		<!-- Inicia Formulario modal de registro del padre -->
		<div class="modal hide fade" id="modal-registrar-padre">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Registrar Padre</h3>
			</div>
			<div class="modal-body">
				<div class="well">
					<form class="form form-horizontal" name="form_registrar_padre" id="form_registrar_padre" action="" method="POST">
						
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
								<input type="radio" name="sex" value="M" checked="">
								Masculino
							</label>
							<label class="radio inline">
								<input type="radio" name="sex" value="F">
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
									<option>Casado/a</option>
									<option>Soltero/a</option>
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
								<select class="span2" name="dep" id="dep_pad" onchange="cargarMunicipios('dep_pad', 'mun_pad')"></select>
							</div>
						</div>
							
						<div class="control-group">
							<label class="control-label" for="mun">Municipio de residencia</label>
							<div class="controls">
								<select name="mun" id="mun_pad"></select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Dirección</label>
							<div class="controls">
								<textarea class="input-xlarge" name="dir" rows="4"></textarea>
							</div>
						</div>
						
					<div class="form-actions">
						<button type="button" class="btn" id="btn-guardar-padre" name="btn-guardar-padre" data-dismiss="modal"><img src="../../img/icon-save.png" height="14" width="14"> Guardar</button>
						<button type="reset" class="btn"><i class="icon-trash"></i> Limpiar</button>
					</div>
					</form>
				</div>
				<div id="resultado-buscar-esposox"></div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!-- Termina Formulario modal de registro del padre -->

		<!-- Inicia Formulario modal de registro de la madre -->
		<div class="modal hide fade" id="modal-registrar-madre">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Registrar Madre</h3>
			</div>
			<div class="modal-body">
				<div class="well">
					<form class="form form-horizontal" name="form_registrar_madre" id="form_registrar_madre" action="" method="POST">
						
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
									<option>Casado/a</option>
									<option>Soltero/a</option>
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
								<select class="span2" name="dep" id="dep_mad" onchange="cargarMunicipios('dep_mad', 'mun_mad')"></select>
							</div>
						</div>
							
						<div class="control-group">
							<label class="control-label" for="mun">Municipio de residencia</label>
							<div class="controls">
								<select name="mun" id="mun_mad"></select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Dirección</label>
							<div class="controls">
								<textarea class="input-xlarge" name="dir" rows="4"></textarea>
							</div>
						</div>
						
					<div class="form-actions">
						<button type="button" class="btn" id="btn-guardar-madre" name="btn-guardar-madre" data-dismiss="modal"><img src="../../img/icon-save.png" height="14" width="14"> Guardar</button>
						<button type="reset" class="btn"><i class="icon-trash"></i> Limpiar</button>
					</div>
					</form>
				</div>
				<div id="resultado-buscar-esposax"></div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!-- Termina Formulario modal de registro de la madre -->

		<!-- Inicia Formulario modal de registro del informante -->
		<div class="modal hide fade" id="modal-registrar-informante">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Registrar Informante</h3>
			</div>
			<div class="modal-body">
				<div class="well">
					<form class="form form-horizontal" name="form_registrar_informante" id="form_registrar_informante" action="" method="POST">
						
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
								<select class="span2" name="dep" id="dep_inf" onchange="cargarMunicipios('dep_inf', 'mun_inf')"></select>
							</div>
						</div>
							
						<div class="control-group">
							<label class="control-label" for="mun">Municipio de residencia</label>
							<div class="controls">
								<select name="mun" id="mun_inf"></select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Dirección</label>
							<div class="controls">
								<textarea class="input-xlarge" name="dir" rows="4"></textarea>
							</div>
						</div>
						
					<div class="form-actions">
						<button type="button" class="btn" id="btn-guardar-informante" name="btn-guardar-informante" data-dismiss="modal"><img src="../../img/icon-save.png" height="14" width="14"> Guardar</button>
						<button type="reset" class="btn"><i class="icon-trash"></i> Limpiar</button>
					</div>
					</form>
				</div>
				<div id="resultado-buscar-esposax"></div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!-- Termina Formulario modal de registro del informante -->

<!-- Inicia Formulario modal de registro del primer testigo -->
		<div class="modal hide fade" id="modal-registrar-testigo1">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Registrar Primer Testigo</h3>
			</div>
			<div class="modal-body">
				<div class="well">
					<form class="form form-horizontal" name="form_registrar_testigo1" id="form_registrar_testigo1" action="" method="POST">
						
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
								<select class="span2" name="dep" id="dep_tes1" onchange="cargarMunicipios('dep_tes1', 'mun_tes1')"></select>
							</div>
						</div>
							
						<div class="control-group">
							<label class="control-label" for="mun">Municipio de residencia</label>
							<div class="controls">
								<select name="mun" id="mun_tes1"></select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Dirección</label>
							<div class="controls">
								<textarea class="input-xlarge" name="dir" rows="4"></textarea>
							</div>
						</div>
						
					<div class="form-actions">
						<button type="button" class="btn" id="btn-guardar-testigo1" name="btn-guardar-testigo1" data-dismiss="modal"><img src="../../img/icon-save.png" height="14" width="14"> Guardar</button>
						<button type="reset" class="btn"><i class="icon-trash"></i> Limpiar</button>
					</div>
					</form>
				</div>
				<div id="resultado-buscar-esposax"></div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!-- Termina Formulario modal de registro del primer testigo -->

<!-- Inicia Formulario modal de registro del segundo testigo -->
		<div class="modal hide fade" id="modal-registrar-testigo2">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Registrar Segundo Testigo</h3>
			</div>
			<div class="modal-body">
				<div class="well">
					<form class="form form-horizontal" name="form_registrar_testigo2" id="form_registrar_testigo2" action="" method="POST">
						
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
								<select class="span2" name="dep" id="dep_tes2" onchange="cargarMunicipios('dep_tes2', 'mun_tes2')"></select>
							</div>
						</div>
							
						<div class="control-group">
							<label class="control-label" for="mun">Municipio de residencia</label>
							<div class="controls">
								<select name="mun" id="mun_tes2"></select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Dirección</label>
							<div class="controls">
								<textarea class="input-xlarge" name="dir" rows="4"></textarea>
							</div>
						</div>
						
					<div class="form-actions">
						<button type="button" class="btn" id="btn-guardar-testigo2" name="btn-guardar-testigo2" data-dismiss="modal"><img src="../../img/icon-save.png" height="14" width="14"> Guardar</button>
						<button type="reset" class="btn"><i class="icon-trash"></i> Limpiar</button>
					</div>
					</form>
				</div>
				<div id="resultado-buscar-esposax"></div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
			</div>
		</div>
		<!-- Termina Formulario modal de registro del segundo testigo -->

		
		<!-- Inicia JavaScript -->
		<script type="text/javascript"  >

			/* Inicia código de configuración Inicial */
			$(document).ready(function(){
				new PNotify({
					title: 'Información',
					text: 'Los campos con (*) son obligatorios.',
					type: 'info'
				});

				/* Inicia activación eventos de validación de vacios y backups */
				$("a[href='#datos-de-la-madre']").on('shown', function (){
					validarVacios("datos-del-inscrito-a");
				});

				$("a[href='#datos-del-padre']").on('shown', function (){
					validarVacios("datos-de-la-madre");
				});

				$("a[href='#datos-del-informante']").on('shown', function (){
					validarVacios("datos-del-padre");
				});

				$("a[href='#datos-de-los-testigos']").on('shown', function (){
					validarVacios("datos-del-informante");
				});

				/* Termina activación eventos de validación de vacios y backups */

				/* Inicia código para inicializar selects de departamentos y municipios */
				cargarDepartamentos("dep_nac");
				cargarMunicipios("dep_nac", "mun_nac");
				
				cargarDepartamentos("dep_ori_mad");
				cargarMunicipios("dep_ori_mad", "mun_ori_mad");
				
				cargarDepartamentos("dep_res_mad");
				cargarMunicipios("dep_res_mad", "mun_res_mad");
				
				cargarDepartamentos("dep_ori_pad");
				cargarMunicipios("dep_ori_pad", "mun_ori_pad");
				
				cargarDepartamentos("dep_res_pad");
				cargarMunicipios("dep_res_pad", "mun_res_pad");

				// Selects de los modales
				cargarDepartamentos("dep_mad");
				cargarMunicipios("dep_mad", "mun_mad");
				cargarDepartamentos("dep_pad");
				cargarMunicipios("dep_pad", "mun_pad");
				cargarDepartamentos("dep_inf");
				cargarMunicipios("dep_inf", "mun_inf");
				cargarDepartamentos("dep_tes1");
				cargarMunicipios("dep_tes1", "mun_tes1");
				cargarDepartamentos("dep_tes2");
				cargarMunicipios("dep_tes2", "mun_tes2");
				/* Termina código para nicializar selects de departamentos y municipios */

				/* Inicia código para establecer las mascaras */
				$("#num_doc_pad").mask("99999999-9");
				$("#num_doc_mad").mask("99999999-9");
				$("#num_doc_inf").mask("99999999-9");
				$("#num_doc_tes1").mask("99999999-9");
				$("#num_doc_tes2").mask("99999999-9");
				// Mascaras de los modales
				$("input[name='dui']").mask("99999999-9");
				$("input[name='nit']").mask("9999-999999-999-9");
				$("input[name='tel1']").mask("99999999");
				$("input[name='tel2']").mask("99999999");
				/* Termina código para establecer las mascaras */

	 			$("#btn-guardar").click(function(){
		 			if(validarVacios("datos-de-los-testigos")){
			   			if(confirm("¿Esta seguro de querer guardar estos datos?")){
			   				$.ajax({
			          			type: "POST",
			           			url: "proc_nacimiento_partida.php",
			           			data: $("#form_nacimiento_partida").serialize(),
			           			success: function(data){
			               		$("#mensajes").html(data);
			          				}
			        			});
			        	}
		 			} //else {alert("false");}
		   			return false;
	 			});

	 			/* Inicia código para funcionalidad del botón guardar del formulario de registro de la madre */
				$(function(){
					$("#btn-guardar-madre").click(function(){
						//if(validarVacios()){
							if (confirm("¿Esta seguro de querer guardar estos datos?")){
								$.ajax({
									type : "POST",
									url : "../persona/proc_persona_modal.php",
									data : $("#form_registrar_madre").serialize(),
									success : function(data){
										cargarMadre(JSON.parse(data));
									}
								});
							}
						//}
					});
				});
				/*  Termina código para funcionalidad del boton guardar del formulario de registro de la madre */

				/* Inicia código para funcionalidad del botón guardar del formulario de registro del padre */
				$(function(){
					$("#btn-guardar-padre").click(function(){
						//if(validarVacios()){
							if (confirm("¿Esta seguro de querer guardar estos datos?")){
								$.ajax({
									type : "POST",
									url : "../persona/proc_persona_modal.php",
									data : $("#form_registrar_padre").serialize(),
									success : function(data){
										cargarPadre(JSON.parse(data));
									}
								});
							}
						//}
					});
				});
				/*  Termina código para funcionalidad del boton guardar del formulario de registro del padre */

				/* Inicia código para funcionalidad del botón guardar del formulario de registro del informante */
				$(function(){
					$("#btn-guardar-informante").click(function(){
							if (confirm("¿Esta seguro de querer guardar estos datos?")){
								$.ajax({
									type : "POST",
									url : "../persona/proc_persona_modal.php",
									data : $("#form_registrar_informante").serialize(),
									success : function(data){
										cargarInformante(JSON.parse(data));
									}
								});
							}
						//}
					});
				});
				/*  Termina código para funcionalidad del boton guardar del formulario de registro del informante */

					/* Inicia código para funcionalidad del botón guardar del formulario de registro del primer testigo */
					$(function(){
						$("#btn-guardar-testigo1").click(function(){
								if (confirm("¿Esta seguro de querer guardar estos datos?")){
									$.ajax({
										type : "POST",
										url : "../persona/proc_persona_modal.php",
										data : $("#form_registrar_testigo1").serialize(),
										success : function(data){
											cargarTestigo1(JSON.parse(data));
										}
									});
								}
							//}
						});
					});
					/*  Termina código para funcionalidad del boton guardar del formulario de registro del primer testigo */
					
					/* Inicia código para funcionalidad del botón guardar del formulario de registro del segundo testigo */
					$(function(){
						$("#btn-guardar-testigo2").click(function(){
								if (confirm("¿Esta seguro de querer guardar estos datos?")){
									$.ajax({
										type : "POST",
										url : "../persona/proc_persona_modal.php",
										data : $("#form_registrar_testigo2").serialize(),
										success : function(data){
											cargarTestigo2(JSON.parse(data));
										}
									});
								}
							//}
						});
					});
					/*  Termina código para funcionalidad del boton guardar del formulario de registro del segundo testigo */


				$("#btn2-buscar-padre").click(function(){
	   				$.ajax({
	          			type: "POST",
	           			url: "proc_nacimiento_partida.php",
	           			data: $("#form_buscar_padre").serialize(),
	           			success: function(data){
	               					$("#resultado-buscar-padre").html(data);
	          						}
	        			});
	   				return false;
	 			});

	 			$("#btn2-buscar-madre").click(function(){
	   				$.ajax({
	          			type: "POST",
	           			url: "proc_nacimiento_partida.php",
	           			data: $("#form_buscar_madre").serialize(),
	           			success: function(data){
	               					$("#resultado-buscar-madre").html(data);
	          						}
	        			});
	   			return false;
	 			});

	 			$("#btn2-buscar-informante").click(function(){
	   				$.ajax({
	          			type: "POST",
	           			url: "proc_nacimiento_partida.php",
	           			data: $("#form_buscar_informante").serialize(),
	           			success: function(data){
	               					$("#resultado-buscar-informante").html(data);
	          						}
	        			});
	   			return false;
	 			});

	 			$("#btn2-buscar-testigo1").click(function(){
	   				$.ajax({
	          			type: "POST",
	           			url: "proc_nacimiento_partida.php",
	           			data: $("#form_buscar_testigo1").serialize(),
	           			success: function(data){
	               					$("#resultado-buscar-testigo1").html(data);
	          						}
	        			});
	   			return false;
	 			});

	 			$("#btn2-buscar-testigo2").click(function(){
	   				$.ajax({
	          			type: "POST",
	           			url: "proc_nacimiento_partida.php",
	           			data: $("#form_buscar_testigo2").serialize(),
	           			success: function(data){
	               					$("#resultado-buscar-testigo2").html(data);
	          						}
	        			});
	   			return false;
	 			});

				/* Inicia código para subir la imagen inmediatamente despues de seleccionarla*/				
				$("#esc_libx").change(function(){
					var num_lib = $("#num_lib").val();
					var num_par = $("#num_par").val();
					$("#esc_lib").attr({value : "nac_par_" + num_lib + "_" + num_par + ".jpg" });
					
					$.ajax({
						type : "POST",
						url : "../img/proc_subir_imagen.php",
						data : new FormData($("#form_nacimiento_partida")[0]),
						cache : false,
						contentType : false,
						processData : false
					});
				});
				/* Termina código para subir la imagen inediatamente despues de seleccionarla */
			
				$("#eda_mad").blur(function(){
					if($("#eda_mad").val() < 18){
					alert("Ha Establecido una edad Menor de 18 años");
					}
				});

				$("#eda_pad").blur(function(){
					if($("#eda_pad").val() < 18){
					alert("Ha Establecido una edad Menor de 18 años");
					}
				});
			});
			/* Termina código de configuración Inicial */

			/* Inicia área de funciones */

			/* Inicia función para validar vacios */
			function validarVacios(pestana){

				if(pestana == "datos-del-inscrito-a"){
					validarInscrito();
				} else if (pestana == "datos-de-la-madre"){
					if(validarInscrito()){
						validarMadre();
					}
				} else if (pestana == "datos-del-padre"){
					if(validarInscrito()){
						if(validarMadre()){
							validarPadre();
						}
					}
				} else if (pestana == "datos-del-informante"){
					if(validarInscrito()){
						if(validarMadre()){
							if(validarPadre()){
								validarInformante();
							}
						}
					}
				} else if (pestana == "datos-de-los-testigos"){
					if(validarInscrito()){
						if(validarMadre()){
							if(validarPadre()){
								if(validarInformante()){
									return validarTestigos();
								}
							}
						}
					}
				}

				/* Inicia validación de los datos del inscrito */
				function validarInscrito(){
					if ($("#ano_lib").val() == ""){
						alert("Falta campos por llenar");
						$("a[href='#datos-del-inscrito-a']").tab("show");
						$("#ano_lib").focus();
						return false;
					} else if ($("#num_lib").val() == "" ) {
						alert("Falta campos por llenar");
						$("a[href='#datos-del-inscrito-a']").tab("show");
						$("#num_lib").focus();
						return false;
					} else if ($("#num_tom").val() == "" ) {
						alert("Falta campos por llenar");
						$("a[href='#datos-del-inscrito-a']").tab("show");
						$("#num_tom").focus();
						return false;
					} else if ($("#num_pag").val() == "" ) {
						alert("Falta campos por llenar");
						$("a[href='#datos-del-inscrito-a']").tab("show");
						$("#num_pag").focus();
						return false;
					} else if ($("#num_par").val() == "" ) {
						alert("Falta campos por llenar");
						$("a[href='#datos-del-inscrito-a']").tab("show");
						$("#num_par").focus();
						return false;
					} else if($("#nom").val() == ""){
						alert("Falta campos por llenar");
						$("a[href='#datos-del-inscrito-a']").tab("show");
						$("#nom").focus();
						return false;
					} else if ($("#lug_nac").val() == "" ) {
						alert("Falta campos por llenar");
						$("a[href='#datos-del-inscrito-a']").tab("show");
						$("#lug_nac").focus();
						return false;
					} else if ($("#fec_nac").val() == "" ) {
						alert("Falta campos por llenar");
						$("a[href='#datos-del-inscrito-a']").tab("show");
						$("#fec_nac").focus();
						return false;
					} else if ($("#hor_min").val() == "" ) {
						alert("Falta campos por llenar");
						$("a[href='#datos-del-inscrito-a']").tab("show");
						$("#hor_min").focus();
						return false;
					} else return true;
				}
				/* Termina validación de los datos del inscrito */

				/* Inicia validación de los datos de la matre */
				function validarMadre(){
					if($("#nom_mad").val() == ""){
						alert("Faltan campos por llenar");
						$("a[href='#datos-de-la-madre']").tab("show");
						$("#nom_mad").focus();
						return false;
					} else if ($("#ape1_mad").val() == ""){
						alert("Faltan campos por llenar");
						$("a[href='#datos-de-la-madre']").tab("show");
						$("#ape1_mad").focus();
						return false;
					} else if($("#eda_mad").val() == ""){
						alert("Faltan campos por llenar");
						$("a[href='#datos-de-la-madre']").tab("show");
						$("#eda_mad").focus();
						return false;
					} else if ($("#ocu_mad").val() == ""){
						alert("Faltan campos por llenar");
						$("a[href='#datos-de-la-madre']").tab("show");
						$("#ocu_mad").focus();
						return false;
					} else if ($("#num_doc_mad").val() == ""){
						alert("faltan campos por llenar");
						$("a[href='#datos-de-la-madre']").tab("show");
						$("#num_doc_mad").focus();
						return false;
					} else {
						return true
					}
				}
				/* Termina validación de los datos de la madre */

				/* Inicia validación de los datos del padre */
				function validarPadre(){
					if ($("#nom_pad").val() != "") {
						if ($("#ape1_pad").val() == ""){
							alert("Faltan campos por llenar");
							$("a[href='#datos-del-padre']").tab("show");
							$("#ape1_pad").focus();
							return false;
						} else if ($("#eda_pad").val() == ""){
							alert("Faltan campos por llenar");
							$("a[href='#datos-del-padre']").tab("show");
							$("#eda_pad").focus();
							return false;
						} else if ($("#ocu_pad").val() == ""){
							alert("Faltan campos por llenar");
							$("a[href='#datos-del-padre']").tab("show");
							$("#ocu_pad").focus();
							return false;
						} else if ($("#num_doc_pad").val() == ""){
							alert("Faltan campos por llenar");
							$("a[href='#datos-del-padre']").tab("show");
							$("#num_doc_pad").focus();
							return false;
						} else {
							return true
						}
					} else {
						return true;
					}
				}
				/* Termina validación de los datos del padre */

				/* Inicia validación de los datos del informante */
				function validarInformante(){
					if($("#nom_inf").val() == ""){
						alert("Faltan campos por llenar");
						$("a[href='#datos-del-informante']").tab("show");
						$("#nom_inf").focus();
						return false;
					} else if($("#ape1_inf").val() == ""){
						alert("Faltan campos por llenar");
						$("a[href='#datos-del-informante']").tab("show");
						$("#ape1_inf").focus();
						return false;
					} else if($("#num_doc_inf").val() == ""){
						alert("Faltan campos por llenar");
						$("a[href='#datos-del-informante']").tab("show");
						$("#num_doc_inf").focus();
						return false;
					} else if($("#par_inf").val() == ""){
						alert("Faltan campos por llenar");
						$("a[href='#datos-del-informante']").tab("show");
						$("#par_inf").focus();
						return false;
					} else if($("#fir").val() != ""){
						if($("#ded").val() == ""){
							alert("Faltan campos por llenar");
							$("a[href='#datos-del-informante']").tab("show");
							$("#ded").focus();
							return false;
						} else if($("#man").val() == ""){
							alert("Faltan campos por llenar");
							$("a[href='#datos-del-informante']").tab("show");
							$("#man").focus();
							return false;
						}
					}

					if($("#vir_ase").val() != ""){
						if($("#fec_vir_ase").val() == ""){
							alert("Faltan campos por llenar");
							$("a[href='#datos-del-informante']").tab("show");
							$("#fec_vir_ase").focus();
							return false;
						}
					}
					
					return true
				}
				/* Termina validacion de los datos del informante */

				/* Inicia validación de los datos de los testigos */
				function validarTestigos(){
					if ($("#dec_tes").val() != ""){
						if ($("#nom_tes1").val() == "") {
							alert("Faltan campos por llenar");
							$("#nom_tes1").focus();
							return false;
						} else if ($("#ape1_tes1").val() == "") {
							alert("Faltan campos por llenar");
							$("#ape1_tes1").focus();
							return false;
						} if ($("#num_doc_tes1").val() == "") {
							alert("Faltan campos por llenar");
							$("#num_doc_tes1").focus();
							return false;
						} else if ($("#nom_tes2").val() == "") {
							alert("Faltan campos por llenar");
							$("#nom_tes2").focus();
							return false;
						} else if ($("#ape1_tes2").val() == "") {
							alert("Faltan campos por llenar");
							$("#ape1_tes2").focus();
							return false;
						} if ($("#num_doc_tes2").val() == "") {
							alert("Faltan campos por llenar");
							$("#num_doc_tes2").focus();
							return false;
						}
					}

					if ($("#fec").val() == "") {
						alert("Faltan campos por llenar");
						$("#fec").focus();
						return false;
					} else if ($("#nom_reg").val() == "") {
						alert("Faltan campos por llenar");
						$("#nom_reg").focus();
						return false;
					} else {
						return true;
					}
				}
				/* Termina validación de los datos de los testigos */
			}
			/* Termina función para validar vacios */

			function cargarPadre(padre)
			{
				$("#cod_pad").attr({value: padre.cod_per});
				$("#nom_pad").attr({value: padre.nom});
				$("#ape1_pad").attr({value: padre.ape1});
				$("#ape2_pad").attr({value: padre.ape2});
				$("#eda_pad").attr({value: padre.eda});
				$("#ocu_pad").attr({value: padre.ocu});
				$("#num_doc_pad").attr({value: padre.dui});
				$("#eda_pad").attr({value: calcularEdad(padre.fec_nac)});
				$("#dep_res_pad option[value='" + padre.dep + "']").attr({selected : true});
				cargarMunicipios("dep_res_pad", "mun_res_pad");
				$("#mun_res_pad option[value='" + padre.mun + "']").attr({selected : true});
			}
			
			function cargarMadre(madre)
			{
				$("#cod_mad").attr({value: madre.cod_per});
				$("#nom_mad").attr({value: madre.nom});
				$("#ape1_mad").attr({value: madre.ape1});
				$("#ape2_mad").attr({value: madre.ape2});
				$("#eda_mad").attr({value: madre.eda});
				$("#ocu_mad").attr({value: madre.ocu});
				$("#num_doc_mad").attr({value: madre.dui});
				$("#eda_mad").attr({value: calcularEdad(madre.fec_nac)});
				$("#dep_res_mad option[value='" + madre.dep + "']").attr({selected : true});
				cargarMunicipios("dep_res_mad", "mun_res_mad");
				$("#mun_res_mad option[value='" + madre.mun + "']").attr({selected : true});
			}
			
			function cargarInformante(informante)
			{
				$("#cod_inf").attr({value: informante.cod_per});
				$("#nom_inf").attr({value: informante.nom});
				$("#ape1_inf").attr({value: informante.ape1});
				$("#ape2_inf").attr({value: informante.ape2});
				$("#num_doc_inf").attr({value: informante.dui});
			}
			
			function cargarTestigo1(testigo1)
			{
				$("#cod_tes1").attr({value: testigo1.cod_per});
				$("#nom_tes1").attr({value: testigo1.nom});
				$("#ape1_tes1").attr({value: testigo1.ape1});
				$("#ape2_tes1").attr({value: testigo1.ape2});
				$("#num_doc_tes1").attr({value: testigo1.dui});
			}
			
			function cargarTestigo2(testigo2)
			{
				$("#cod_tes2").attr({value: testigo2.cod_per});
				$("#nom_tes2").attr({value: testigo2.nom});
				$("#ape1_tes2").attr({value: testigo2.ape1});
				$("#ape2_tes2").attr({value: testigo2.ape2});
				$("#num_doc_tes2").attr({value: testigo2.dui});
			}
			function cargarInfPad()
			{
				$("#cod_inf").attr({value: $("#cod_pad").val()});
				$("#nom_inf").attr({value: $("#nom_pad").val()});
				$("#ape1_inf").attr({value: $("#ape1_pad").val()});
				$("#ape2_inf").attr({value: $("#ape2_pad").val()});
				$("#num_doc_inf").attr({value: $("#num_doc_pad").val()});
				$("#par_inf").attr({value: "padre"});
				$("#btn-buscar-informante").attr({disabled: true});
				$("#btn-registrar-informante").attr({disabled: true});
			}
			function cargarInfMad(){
				$("#cod_inf").attr({value: $("#cod_mad").val()});
				$("#nom_inf").attr({value: $("#nom_mad").val()});
				$("#ape1_inf").attr({value: $("#ape1_mad").val()});
				$("#ape2_inf").attr({value: $("#ape2_mad").val()});
				$("#num_doc_inf").attr({value: $("#num_doc_mad").val()});
				$("#par_inf").attr({value: "madre"});
				$("#btn-buscar-informante").attr({disabled: true});
				$("#btn-registrar-informante").attr({disabled: true});
			}
			function limpiarInf(){
				$("#cod_inf").attr({value: ""});
				$("#nom_inf").attr({value: ""});
				$("#ape1_inf").attr({value: ""});
				$("#ape2_inf").attr({value: ""});
				$("#num_doc_inf").attr({value: ""});
				$("#par_inf").attr({value: ""});
				$("#btn-buscar-informante").attr({disabled: false});
				$("#btn-registrar-informante").attr({disabled: false});
			}

			/* Inicia fución para cambiar el valor del imput esc_lib */
			/*function cambio(){
				var input = $("#esc_libx").val();
				input = input.replace("C:\\fakepath\\","");
				$("#esc_lib").attr({value : input })
			}*/
			/* Termina función para cambiar el valor del imput esc_lib */

			/* Termina área de funciones */
		</script>
		<!-- Termina JavaScript -->
	</body>
</html>