<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizar Expediente</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/jquery.maskedinput.js"></script>
	<script src="./../js/funciones.js"></script>
	<script src="js/act_expediente.js"></script>
</head>

<body>
	<div class="well form-horizontal">
		<legend >Actualizar Datos de Expediente</legend>
		<div class="tabbable tabs-left">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#datPer">Datos Personales</a></li>
				<li><a data-toggle="tab" href="#oci">Pasatiempos</a></li>
				<li><a data-toggle="tab" href="#sitLab">Situación Laboral</a></li>
				<li><a data-toggle="tab" href="#famExt">Relaciones Familiares</a></li>
				<li><a data-toggle="tab" href="#relSoc">Relaciones Sociales</a></li>
				<li><a data-toggle="tab" href="#sitGen">Situación General</a></li>
				<li><a data-toggle="tab" href="#proGen">Problemática General</a></li>
				<li><a data-toggle="tab" href="#datAgr">Datos del Agresor</a></li>
				<li><a data-toggle="tab" href="#cond_agr">Conducta del Agresor</a></li>
				<li><a data-toggle="tab" href="#fin">Finalizar</a></li>
			</ul>

			<div class="tab-content" id="formExpediente">
				<input type="hidden" id="cod_exp">
				<div class="tab-pane active" id="datPer">
					<a data-toggle="modal" href="#bus_per" class="btn"><i class="icon-search"></i> Buscar Persona</a>
					<br><br>
					<input type="hidden" id="cod_per">
					<div class="control-group span5">
						<label class="control-label" for="nom_col" style="width:100px;">Nombre (*)</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="nom" id="nom" required>
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" for="ape1_col" style="width:100px;">Primer Apellido (*)</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="ape1" id="ape1" required>
						</div>
					</div>
					<div class="control-group span5">
						<label class="control-label" for="ape2_col" style="width:100px;">Segundo Apellido</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="ape2" id="ape2">
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" for="sex_col" style="width:100px;">Sexo (*)</label>
						<div class="controls" style="margin-left:100px;">
							<label class="radio inline"><input type="radio" id="sexM" name="sex" value="M">Masculino</label>
							<label class="radio inline"><input type="radio" id="sexF" name="sex" value="F" checked>Femenino</label>
						</div>
					</div>
					<div class="control-group span5">
						<label class="control-label" style="width:100px;">Nacimiento (*)</label>
						<div class="controls" style="margin-left:100px;">
							<input type="date" id="fec_nac" name="fec_nac" onblur="verMinoridad()">
						</div>
					</div>
					<div class="control-group span4" id="divDUI">
						<label class="control-label" for="dui_col" style="width:100px;">DUI</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="dui" id="dui" >
						</div>
					</div>
					<div class="control-group span5">
						<label class="control-label" for="nit_col" style="width:100px;">NIT</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="nit" id="nit" >
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" for="tel1_col" style="width:100px;">Teléfono 1 (*)</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="tel1" id="tel1">
							<!-- <a href="#" class="btn"><i class="icon-plus"></i></a> -->
						</div>
					</div>
					<div class="control-group span5">
						<label class="control-label" for="tel2_col" style="width:100px;">Teléfono 2</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="tel2" id="tel2">
							<!-- <a href="#" class="btn"><i class="icon-plus"></i></a> -->
						</div>
					</div>
					
					<div class="control-group span4">
						<label class="control-label" for="dep" style="width:100px;">Departamento (*)</label>
						<div class="controls" style="margin-left:100px;">
							<select name="dep" id="dep" onChange="cargarMunicipios('dep','mun')">
							</select>
						</div>
					</div>
					<div class="control-group span5">
						<label class="control-label" for="mun" style="width:100px;">Municipio (*)</label>
						<div class="controls" style="margin-left:100px;">
							<select id="mun" name="mun">
							</select>
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" for="dir_col" style="width:100px;">Direcci&oacute;n (*)</label>
						<div class="controls" style="margin-left:100px;">
							<textarea class="input-large" name="dir" id="dir"></textarea>
						</div>
					</div>
				
					<div class="control-group span5">
						<label class="control-label" style="width:100px;">Estado Civil (*)</label>
						<div class="controls" style="margin-left:100px;">
							<select name="est_civ" id="est_civ">
								<option value="Casada">Casado/a</option>
								<option value="Separada">Separado/a</option>
								<option value="Divorciada">Divorciado/a</option>
								<option value="Soltera">Soltero/a</option>
								<option value="Viuda">Viudo/a</option>
								<option value="Otras">Otros</option>
							</select>
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" style="width:100px;">Nivel Educativo</label>
						<div class="controls" style="margin-left:100px;">
							<select name="niv_edu" id="niv_edu">
								<option value="Sin estudios">Sin estudios</option>
								<option value="Primarios (certificados)">Primarios (certificados)</option>
								<option value="Primarios (graduado)">Primarios (graduado)</option>
								<option value="Bachiller o equivalente">Bachiller o equivalente</option>
								<option value="Superiores">Superiores</option>
								<option value="Doctorado">Doctorado</option>					
							</select>
						</div>
					</div>
					<div class="well span9" style="background-color: #f5f5f5;display:none;" id="menorEdad">
						<h5>Al ser menor de edad se necesita alguno de los siguientes</h5>
						<input type="hidden" id="cod_mad">
						<input type="hidden" id="cod_pad">
						<label>Datos de la Madre</label><a href="#bus_mad" data-toggle="modal" class="btn"><i class="icon-plus"></i></a><input type="text" id="nom_mad" readonly>
						<label>Datos del Padre</label><a href="#bus_pad" data-toggle="modal" class="btn"><i class="icon-plus"></i></a><input type="text" id="nom_pad" readonly>
					</div>
					<!-- <p class="pull-right"><a data-toggle="tab" href="#oci" class="btn">Guardar y Continuar  &rarr;</a></p> -->
				</div>		

				<div class="tab-pane" id="oci">
					<div class="well control-group" style="background-color: #f5f5f5;">
						<label class="control-label">Dedicaciones preferidas</label>
						<div class="controls">
							<div class="span2">
								<label class="checkbox"><input type="checkbox" id="oci_ded[]" name="oci_ded[]" value="estar con amigos">Estar con amigos</label>
								<label class="checkbox"><input type="checkbox" id="oci_ded[]" name="oci_ded[]" value="juegos de azar">Juegos de azar</label>
								<label class="checkbox"><input type="checkbox" id="oci_ded[]" name="oci_ded[]" value="videojuegos">Videojuegos</label>
								<label class="checkbox"><input type="checkbox" id="oci_ded[]" name="oci_ded[]" value="tragaperras">Tragaperras</label>
								<label class="checkbox"><input type="checkbox" id="oci_ded[]" name="oci_ded[]" value="discotecas">Discotecas</label>
							</div>
							<div class="span3">
								<label class="checkbox"><input type="checkbox" id="oci_ded[]" name="oci_ded[]" value="musica">Música</label>
								<label class="checkbox"><input type="checkbox" id="oci_ded[]" name="oci_ded[]" value="pasear">Pasear</label>
								<label class="checkbox"><input type="checkbox" id="oci_ded[]" name="oci_ded[]" value="bares">Bares</label>
								<label class="checkbox"><input type="checkbox" id="oci_ded[]" name="oci_ded[]" value="cine">Cine</label>
								<label class="checkbox"><input type="checkbox" id="oci_ded[]" name="oci_ded[]" value="tv">TV</label>
							</div>
						</div>
					</div>

					<div class="well control-group" style="background-color: #f5f5f5;">
						<label class="control-label">Lecturas</label>
						<div class="controls">
							<label class="checkbox inline span1"><input type="checkbox" id="oci_lec[]" name="oci_lec[]" value="Libros">Libros</label>
							<label class="checkbox inline span1"><input type="checkbox" id="oci_lec[]" name="oci_lec[]" value="Revistas">Revistas</label>
							<label class="checkbox inline span1"><input type="checkbox" id="oci_lec[]" name="oci_lec[]" value="Periodicos">Periódicos</label>
						</div>
					</div>
					
					<div class="well control-group" style="background-color: #f5f5f5;">
						<label class="control-label">Otro Tipo</label>
						<div class="controls">
							<textarea name="oci_otr" id="oci_otr" class="input-xlarge" placeholder="Describa otros pasatiempos"></textarea>
						</div>
					</div>
					
					<!-- <p class="pull-right"><a data-toggle="tab" href="#sitLab" class="btn">Guardar y Continuar  &rarr;</a></p> -->
				</div>

				<div class="tab-pane" id="sitLab">
					<div class="control-group span5" style="width: 350px;">
						<label class="control-label" style="width:150px;">Trabajo remunerado</label>
						<div class="controls" style="margin-left:150px;">
							<label class="radio inline"><input type="radio" id="tra_rem" name="tra_rem" value="Si">Si</label>
							<label class="radio inline"><input type="radio" id="tra_rem" name="tra_rem" value="No" checked>No</label>
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" style="width:150px;">Oficio</label>
						<div class="controls" style="margin-left:150px;">
							<input type="text" class="span3" name="tip_tra" id="tip_tra">
						</div>
					</div>
					<div class="control-group span5" style="width: 350px;">
						<label class="control-label" style="width:150px;">Contrato</label>
						<div class="controls" style="margin-left:150px;">
							<label class="radio inline"><input type="radio" id="baj_con" name="baj_con" value="Si">Si</label>
							<label class="radio inline"><input type="radio" id="baj_con" name="baj_con" value="No" checked>No</label>
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" style="width:150px;">Jornada de Trabajo</label>
						<div class="controls" style="margin-left:150px;">
							<div class="input-append">
								<input type="number" class="input-mini" id="jor_tra" name="jor_tra" value="0">
								<span class="add-on">horas</span>
							</div>
						</div>
					</div>
					<div class="control-group span5" style="width: 350px;">
						<label class="control-label" style="width:150px;">Ingresos medios/mes</label>
						<div class="controls" style="margin-left:150px;">
							<div class="input-prepend">
								<span class="add-on">$</span>
								<input type="text" class="span2" id="ing_med_men" name="ing_med_men" value="0">
							</div>
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" style="width:150px;">Otros ingresos</label>
						<div class="controls" style="margin-left:150px;">
							<select name="otr_tip_ing" id="otr_tip_ing">
								<option value="Pensión">Pensi&oacute;n</option>
								<option value="Subsidio por desempleo">Subsidios por desempleo</option>
								<option value="Prestaciones sociales">Prestaciones sociales</option>
								<option value="Remesas">Remesas</option>
								<option value="Otros">Otros</option>
								<option value="Ninguno" selected>Ninguno</option>
							</select>
						</div>
					</div>
					
					<div class="control-group span5" style="width: 350px;">
						<label class="control-label" style="width:150px;">Dependencia económica con el presunto agresor</label>
						<div class="controls" style="margin-left:150px;">
							<label class="radio inline"><input type="radio" id="dep_eco_agr" name="dep_eco_agr" value="Si">Si</label>
							<label class="radio inline"><input type="radio" id="dep_eco_agr" name="dep_eco_agr" value="No" checked>No</label>
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" style="width:150px;">Recibe ayuda de ONGs</label>
						<div class="controls" style="margin-left:150px;">
							<label class="radio inline"><input type="radio" id="rec_ayu" name="rec_ayu" value="Si">Si</label>
							<label class="radio inline"><input type="radio" id="rec_ayu" name="rec_ayu" value="No" checked>No</label>
							<input type="text" class="input-large" placeholder="Escriba el nombre de la institución" name="rec_ayu_ong" id="rec_ayu_ong" style="display:none;">
						</div>
					</div>			
					<!-- <p class="pull-right"><a data-toggle="tab" href="#famExt" class="btn">Guardar y Continuar  &rarr;</a></p> -->
				</div>

				<div class="tab-pane" id="sitGen">
					<div class="control-group">
						<label class="control-label">M&eacute;dico de cabecera</label>
						<div class="controls">
							<label class="radio inline"><input type="radio" id="med_cab" name="med_cab" value="Si">Si</label>
							<label class="radio inline"><input type="radio" id="med_cab" name="med_cab" value="No" checked>No</label>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Cuando est&aacute; enferma</label>
						<div class="controls">
							<select name="acu_amb" id="acu_amb">
								<option value="Acude al ambulatorio">Acude al ambulatorio</option>
								<option value="Hospital">Hospital</option>
								<option value="Se queda en casa">Se queda en casa</option>
							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Tratamiento contínuo</label>
						<div class="controls">
							<input type="text" name="tra_con" id="tra_con" class="span3" placeholder="especifique">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Tipo de alimentación</label>
						<div class="controls">
							<label class="radio inline"><input type="radio" id="com" name="com" value="Regular" checked>Regular</label>
							<label class="radio inline"><input type="radio" id="com" name="com" value="Irregular">Irregular</label>
						</div>			
					</div>
					<div class="control-group">
						<label class="control-label">Tipo de convivencia con el agresor</label>
						<div class="controls">
							<select name="con_agr" id="con_agr">
								<option value="Contínua y Estable">Contínua y Estable</option>
								<option value="Inestable y a Temporadas">Inestable y a Temporadas</option>
								<option value="Esporádica">Esporádica</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Periodo de duración de la relación sentimental</label>
						<div class="controls"><input type="text" id="dur_rel_sen" name="dur_rel_sen" placeholder="Años y/o meses"></div>
					</div>

					<div class="control-group">
						<label class="control-label">Es primera convivencia</label>
						<div class="controls">
							<label class="radio inline"><input type="radio" id="pri_con" name="pri_con" value="Si">Si</label>
							<label class="radio inline"><input type="radio" id="pri_con" name="pri_con" value="No" checked>No</label>
						</div>
					</div>

					
					
					
					<!-- <p class="pull-right"><a data-toggle="tab" href="#proGen" class="btn">Guardar y Continuar  &rarr;</a></p> -->
				</div>

				<div class="tab-pane" id="proGen">
					<div class="control-group span5" style="width: 350px;">
						<label class="control-label" style="width:150px;">Ha sufrido maltratos</label>
						<div class="controls" style="margin-left:150px;">
							<label class="radio inline"><input type="radio" id="suf_mal" name="suf_mal" value="Si">Si</label>
							<label class="radio inline"><input type="radio" id="suf_mal" name="suf_mal" value="No" checked>No</label>
						</div>
					</div>
					<div class="control-group span4" id="divMalqui" style="display:none;">
						<label class="control-label" style="width:150px;">Si la respuesta anterior es afirmativa, de quién</label>
						<div class="controls" style="margin-left:150px;">
							<input type="text" name="mal_qui" id="mal_qui" class="span3">
						</div>
					</div>
					<div class="control-group span5" style="width: 350px;">
						<label class="control-label" style="width:150px;">Ha sufrido abuso sexual</label>
						<div class="controls" style="margin-left:150px;">
							<label class="radio inline"><input type="radio" name="suf_abu_sex" id="suf_abu_sex" value="Si">Si</label>
							<label class="radio inline"><input type="radio" name="suf_abu_sex" id="suf_abu_sex" value="No" checked>No</label>
						</div>
					</div>
					<div class="control-group span4" id="divAbusex" style="display:none;">
						<label class="control-label" style="width:150px;">Si la respuesta anterior es afirmativa, de quién</label>
						<div class="controls" style="margin-left:150px;">
							<input type="text" name="abu_qui_sex" id="abu_qui_sex" class="span3">
						</div>
					</div>
					<div class="control-group span10">	
						<label class="control-label" >Car&aacute;cter de las agresiones</label>
						<div class="controls" >
							<div class="span3">
								<label class="checkbox"><input type="checkbox" id="car_agr[]" name="car_agr[]" value="Chantaje económico">Chantaje econ&oacute;mico</label>
								<label class="checkbox"><input type="checkbox" id="car_agr[]" name="car_agr[]" value="Persecución y acoso">Persecuci&oacute;n y acoso</label>
								<label class="checkbox"><input type="checkbox" id="car_agr[]" name="car_agr[]" value="Maltrato físico">Maltrato F&iacute;sico</label>
								<label class="checkbox"><input type="checkbox" id="car_agr[]" name="car_agr[]" value="Maltrato psicológico">Maltrato psicol&oacute;gico</label>
								<label class="checkbox"><input type="checkbox" id="car_agr[]" name="car_agr[]" value="Amenazas de muerte">Amenazas de muerte</label>
								<label class="checkbox"><input type="checkbox" id="car_agr[]" name="car_agr[]" value="Expulsión del hogar">Expulsi&oacute;n del hogar</label>
							</div>
							<div class="span3">
								<label class="checkbox"><input type="checkbox" id="car_agr[]" name="car_agr[]" value="Chantaje emocional">Chantaje emocional</label>
								<label class="checkbox"><input type="checkbox" id="car_agr[]" name="car_agr[]" value="Llamadas telefónicas amenazantes">Llamadas telef&oacute;nicas amenazantes</label>
								<label class="checkbox"><input type="checkbox" id="car_agr[]" name="car_agr[]" value="Menosprecio en público o en privado">Menosprecio en p&uacute;blico o en privado</label>
								<label class="checkbox"><input type="checkbox" id="car_agr[]" name="car_agr[]" value="Amenazas relacionadas con la custodia de los menores">Amenazas relacionadas con la custodia de los menores</label>
							</div>
						</div>
					</div>
					<div class="control-group span5">
						<label class="control-label" style="width:150px;">Ha iniciado trámites de separación</label>
						<div class="controls" style="margin-left:150px;">
							<label class="radio inline"><input type="radio" id="tra_sep" name="tra_sep" value="Si">Si</label>
							<label class="radio inline"><input type="radio" id="tra_sep" name="tra_sep" value="No" checked>No</label>
						</div>
					</div>
					
					<div class="control-group span4">
						<label class="control-label"  style="width:150px;">Medidas cautelares relacionada con la visita de los menores</label>
						<div class="controls" style="margin-left:150px;">
							<textarea class="input-large" name="med_cau" id="med_cau" placeholder="Punto de encuentro,etc."></textarea>
						</div>
					</div>

					<div class="control-group span5">
						<label class="control-label" style="width:150px;">Se han dado rupturas anteriores</label>
						<div class="controls" style="margin-left:150px;">
							<label class="radio inline"><input type="radio" id="rup_ant" name="rup_ant" value="Si">Si</label>
							<label class="radio inline"><input type="radio" id="rup_ant" name="rup_ant" value="No" checked>No</label>
						</div>
					</div>

					<div class="control-group span4">
						<label class="control-label" style="width:150px;">Duraci&oacute;n del maltrato</label>
						<div class="controls" style="margin-left:150px;">
							<input type="text" name="dur_mal" id="dur_mal" class="span3" placeholder="Cuántos meses o años">
						</div>
					</div>

					<div class="control-group span10">
						<label class="control-label" >La decisi&oacute;n de abandonar el hogar la ha tomado</label>
						<div class="controls" >
							<label class="checkbox inline"><input type="checkbox" id="dec_aba_hog[]" name="dec_aba_hog[]" value="Usted sola">Usted sola</label>
							<label class="checkbox inline"><input type="checkbox" id="dec_aba_hog[]" name="dec_aba_hog[]" value="Apoyada por familiares">Apoyada por familiares</label>
							<label class="checkbox inline"><input type="checkbox" id="dec_aba_hog[]" name="dec_aba_hog[]" value="Apoyada por amigos">Apoyada por amigos</label>
						</div>
					</div>
	
					<div class="control-group span4">
						<label class="control-label" for="ame_rup" style="width:150px;">Ha habido amenaza de ruptura</label>
						<div class="controls" style="margin-left:150px;">
							<label class="radio inline"><input type="radio" id="ame_rup" name="ame_rup" value="Si">Si</label>
							<label class="radio inline"><input type="radio" id="ame_rup" name="ame_rup" value="No" checked>No</label>
						</div>
					</div>

					<div class="control-group span10" id="divAmerup" style="display:none;">
						<label class="control-label" style="width:150px;">Respuesta del agresor ante amenaza de ruptura</label>
						<div class="controls" style="margin-left:150px;">
							<div class="span3">
								<label class="checkbox "><input type="checkbox" id="res_ame_rup[]" name="res_ame_rup[]" value="Agresiones">Agresiones</label>
								<label class="checkbox "><input type="checkbox" id="res_ame_rup[]" name="res_ame_rup[]" value="Acoso">Acoso</label>
								<label class="checkbox "><input type="checkbox" id="res_ame_rup[]" name="res_ame_rup[]" value="Persecuciones">Persecuciones</label>
								<label class="checkbox "><input type="checkbox" id="res_ame_rup[]" name="res_ame_rup[]" value="Intento de suicidios">Intento de suicidios</label>
								<label class="checkbox "><input type="checkbox" id="res_ame_rup[]" name="res_ame_rup[]" value="Suicidios">Suicidios</label>
							</div>
							<div class="span3">
								<label class="checkbox "><input type="checkbox" id="res_ame_rup[]" name="res_ame_rup[]" value="Amenaza con abandono">Amenaza con abandono</label>
								<label class="checkbox "><input type="checkbox" id="res_ame_rup[]" name="res_ame_rup[]" value="Deseos de abandono el mismo">Deseos de abandono el mismo</label>
								<label class="checkbox "><input type="checkbox" id="res_ame_rup[]" name="res_ame_rup[]" value="Promesas de cambio">Promesas de cambio</label>
								<label class="checkbox "><input type="checkbox" id="res_ame_rup[]" name="res_ame_rup[]" value="Amenaza relacionada con los menores (custodia)">Amenaza relacionada con los menores (custodia)</label>
							</div>
							
						</div>
					</div>


					<div class="control-group span5">
						<label class="control-label" style="width:150px;">El agresor maltrata a los menores</label>
						<div class="controls" style="margin-left:150px;">
							<label class="radio inline"><input type="radio" id="mal_men" name="mal_men" value="Si">Si</label>
							<label class="radio inline"><input type="radio" id="mal_men" name="mal_men" value="No" checked>No</label>
						</div>
					</div>

					<div class="control-group span4" id="divTipmal" style="display:none;">
						<label class="control-label"  style="width:150px;">Tipo de maltrato</label>
						<div class="controls" style="margin-left:150px;">
							<textarea class="input-large" name="tip_mal_men" id="tip_mal_men" placeholder="Describa el tipo de maltrato hacia los menores"></textarea>
						</div>
					</div>
					<!-- <p class="pull-right"><a data-toggle="tab" href="#datAgr" class="btn">Guardar y Continuar  &rarr;</a></p> -->
				</div>

				<div class="tab-pane" id="famExt">
					<div class="control-group">
						<label class="control-label">Nº de hijos</label>
						<div class="controls">
							<input type="number" class="input-mini" name="num_hij" id="num_hij" placeholder="#" value="0">
						</div>
					</div>
				
					<div class="control-group">
						<label class="control-label">Personas que viven en el hogar</label>
						<div class="controls">
							<label for="" class="checkbox inline"><input name="per_hog[]" id="per_hog[]" type="checkbox" value="Hombre (compañero)">Hombre (compa&ntilde;ero)</label>
							<label for="" class="checkbox inline"><input name="per_hog[]" id="per_hog[]" type="checkbox" value="Mujer">Mujer</label>
							<label for="" class="checkbox inline"><input name="per_hog[]" id="per_hog[]" type="checkbox" value="Hijos">Hijos</label>
							<label for="" class="checkbox inline"><input name="per_hog[]" id="per_hog[]" type="checkbox" value="Otros (abuelos,tíos,etc)">Otros (abuelos,t&iacute;os,etc)</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Apoyo Econ&oacute;mico</label>
						<div class="controls">
							<label class="radio inline"><input type="radio" id="apo_eco_fam" name="apo_eco_fam" value="de la familia de la mujer" checked>De la familia de la mujer</label>
							<label class="radio inline"><input type="radio" id="apo_eco_fam" name="apo_eco_fam" value="de la familia del agresor">De la familia del agresor</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="">Apoyo Afectivo</label>
						<div class="controls">
							<label class="radio inline"><input type="radio" id="apo_afe_fam" name="apo_afe_fam" value="de la familia de la mujer" checked>De la familia de la mujer</label>
							<label class="radio inline"><input type="radio" id="apo_afe_fam" name="apo_afe_fam" value="de la familia del agresor">De la familia del agresor</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="">Apoyo en la labor de crianza de los hijos</label>
						<div class="controls">
							<label class="radio inline"><input type="radio" id="apo_cri" name="apo_cri" value="de la familia de la mujer" checked>De la familia de la mujer</label>
							<label class="radio inline"><input type="radio" id="apo_cri" name="apo_cri" value="de la familia del agresor">De la familia del agresor</label>
						</div>
					</div>
					<div class="control-group span5" style="margin-left: 0px;">
						<label class="control-label">Su familia conoce su situación</label>
						<div class="controls">
							<label class="radio inline"><input type="radio" id="con_sit" name="con_sit" value="Si">Si</label>
							<label class="radio inline"><input type="radio" id="con_sit" name="con_sit" value="No" checked>No</label>
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" for="">Su familia le ofrece apoyo si termina la relación</label>
						<div class="controls">
							<label class="radio inline"><input type="radio" id="con_apo" name="con_apo" value="Si">Si</label>
							<label class="radio inline"><input type="radio" id="con_apo" name="con_apo" value="No" checked>No</label>
						</div>
					</div>
					<div class="control-group span5" style="margin-left: 0px;">
						<label class="control-label" for="">Mantiene alguna relaci&oacute;n con el agresor</label>
						<div class="controls">
							<label class="radio inline"><input type="radio" id="man_rel_agr" name="man_rel_agr" value="Si">Si</label>
							<label class="radio inline"><input type="radio" id="man_rel_agr" name="man_rel_agr" value="No" checked>No</label>
						</div>
					</div>
					<!-- <p class="pull-right"><a data-toggle="tab" href="#relSoc" class="btn">Guardar y Continuar  &rarr;</a></p> -->
				</div>

				<div class="tab-pane" id="relSoc">
					<div class="control-group">
						<label class="control-label" for="">Apoyo Econ&oacute;mico</label>
						<div class="controls">
							<label class="radio inline"><input type="radio" id="apo_efe_ami" name="apo_efe_ami" value="de amigos propios">de amigos propios</label>
							<label class="radio inline"><input type="radio" id="apo_efe_ami" name="apo_efe_ami" value="de amigos del agresor" checked>de amigos del agresor</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Apoyo Afectivo</label>
						<div class="controls">
							<label class="radio inline"><input type="radio" id="apo_afe_ami" name="apo_afe_ami" value="de amigos propios">de amigos propios</label>
							<label class="radio inline"><input type="radio" id="apo_afe_ami" name="apo_afe_ami" value="de amigos del agresor" checked>de amigos del agresor</label>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="">Su entorno conoce las agresiones</label>
						<div class="controls">
							<label class="radio inline"><input type="radio" id="ent_con_agr" name="ent_con_agr" value="Si">Si</label>
							<label class="radio inline"><input type="radio" id="ent_con_agr" name="ent_con_agr" value="No" checked>No</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="">Su entorno le ofrece apoyo si termina la relación</label>
						<div class="controls">
							<label class="radio inline"><input type="radio" id="ent_apo_agr" name="ent_apo_agr" value="Si">Si</label>
							<label class="radio inline"><input type="radio" id="ent_apo_agr" name="ent_apo_agr" value="No" checked>No</label>
						</div>
					</div>
					<!-- <p class="pull-right"><a data-toggle="tab" href="#sitGen" class="btn">Guardar y Continuar  &rarr;</a></p> -->
				</div>

				<div class="tab-pane" id="datAgr">
					<a data-toggle="modal" href="#bus_per2" class="btn"><i class="icon-search"></i> Buscar Persona</a>
					<br><br>
					<div id="dA">
					<input type="hidden" name="cod_agr" id="cod_agr">
					<div class="control-group span5">
					<label class="control-label" style="width:100px;">Nombre (*)</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" id="nom_agr" name="nom_agr">
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" for="ape1" style="width:100px;">Primer Apellido (*)</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="ape1_agr" id="ape1_agr">
						</div>
					</div>
					<div class="control-group span5">
						<label class="control-label" for="ape2" style="width:100px;">Segundo Apellido</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="ape2_agr" id="ape2_agr">
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" for="sex_agr" style="width:100px;">Sexo (*)</label>
						<div class="controls" style="margin-left:100px;">
							<label class="radio inline"><input type="radio" id="sex_agrM" name="sex_agr" value="M">Masculino</label>
							<label class="radio inline"><input type="radio" id="sex_agrF" name="sex_agr" value="No" checked>Femenino</label>
						</div>
					</div>
					<div class="control-group span5">
						<label class="control-label" style="width:100px;">Nacimiento</label>
						<div class="controls" style="margin-left:100px;">
							<input type="date" id="fec_nac_agr" name="fec_nac_agr">
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" for="dui" style="width:100px;">DUI</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="dui_agr" id="dui_agr">
						</div>
					</div>
					<div class="control-group span5">
						<label class="control-label" for="nit" style="width:100px;">NIT</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="nit_agr" id="nit_agr">
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" for="tel1_agr" style="width:100px;">Teléfono 1</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="tel1_agr" id="tel1_agr">
						</div>
					</div>
					<div class="control-group span5">
						<label class="control-label" for="tel2_agr" style="width:100px;">Teléfono 2</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" class="span3" name="tel2_agr" id="tel2_agr">
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" for="dep_agr" style="width:100px;">Departamento</label>
						<div class="controls" style="margin-left:100px;">
							<select name="dep_agr" id="dep_agr" onChange="cargarMunicipios('dep_agr','mun_agr')" >
							</select>
						</div>
					</div>
					<div class="control-group span5">
						<label class="control-label" for="mun_agr" style="width:100px;">Municipio</label>
						<div class="controls" style="margin-left:100px;">
							<select id="mun_agr" name="mun_agr">
							</select>
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" for="dir" style="width:100px;">Direcci&oacute;n</label>
						<div class="controls" style="margin-left:100px;">
							<textarea class="input-large" name="dir_agr" id="dir_agr"></textarea>
						</div>
					</div>
					</div>
					

					<div class="control-group span5">
						<label class="control-label" style="width:245px;">Años de residencia (si es extranjero)</label>
						<div class="controls" style="margin-left:245px;">
							<input type="number" name="ano_res_agr" id="ano_res_agr" placeholder="#" class="input-mini" value="0" min="0" max="100">
						</div>
					</div>
					<div class="control-group span4">
						<label class="control-label" style="width:100px;">Nivel Educativo</label>
						<div class="controls" style="margin-left:100px;">
							<select name="niv_edu_agr" id="niv_edu_agr">
								<option value="Sin estudios">Sin estudios</option>
								<option value="Primarios (certificados)">Primarios (certificados)</option>
								<option value="Primarios (graduado)">Primarios (graduado)</option>
								<option value="Bachiller o equivalente">Bachiller o equivalente</option>
								<option value="Superiores">Superiores</option>
								<option value="Doctorado">Doctorado</option>					
							</select>
						</div>
					</div>
					<div class="control-group span5">
						<label class="control-label" style="width:100px;">Oficio</label>
						<div class="controls" style="margin-left:100px;">
							<input type="text" id="tra_agr" name="tra_agr" class="span3">
						</div>
					</div>
				</div>
				<div class="tab-pane" id="cond_agr">
					<div class="control-group">
						<label class="control-label">Antecedentes penales</label>
						<div class="controls" style="margin-left:100px;">
							<textarea class="input-xxlarge" id="ant_pen_agr" name="ant_pen_agr"></textarea>
						</div>
					</div>
					<div class="well control-group span9" style="background-color: #f5f5f5;">
						<label class="control-label">A quienes ha abusado</label>
						<div class="controls">
							<div class="span3">
								<label class="checkbox"><input type="checkbox" name="abu_qui[]" value="A otra compañera">A otra compañera</label>
								<label class="checkbox"><input type="checkbox" name="abu_qui[]" value="A los hijos">A los hijos</label>
								<label class="checkbox"><input type="checkbox" name="abu_qui[]" value="A sus propios padres">A sus propios padres</label>
							</div>
							<div class="span3">
								<label class="checkbox"><input type="checkbox" name="abu_qui[]" value="A sus hermanos">A sus hermanos</label>
								<label class="checkbox"><input type="checkbox" name="abu_qui[]" value="A empleados">A empleados</label>
								<label class="checkbox"><input type="checkbox" name="abu_qui[]" value="A desconocidos">A desconocidos</label>
							</div>
						</div>
					</div>
					<div class="well control-group span9" style="background-color: #f5f5f5;">
						<label class="control-label" for="">Presunto agresor manifiesta</label>
						<div class="controls">
							<div class="span3">
								<label class="checkbox"><input type="checkbox" name="prob_agr[]" value="Falta de trabajo">Falta de trabajo</label>
								<label class="checkbox"><input type="checkbox" name="prob_agr[]" value="Dependencia económica">Dependencia económica</label>
								<label class="checkbox"><input type="checkbox" name="prob_agr[]" value="Vivienda en condiciones precarias">Vivienda en condiciones precarias</label>
								<label class="checkbox"><input type="checkbox" name="prob_agr[]" value="Aislamiento social">Aislamiento social</label>
								<label class="checkbox"><input type="checkbox" name="prob_agr[]" value="Alcoholismo">Alcoholismo</label>
								<label class="checkbox"><input type="checkbox" name="prob_agr[]" value="Otra toximanía">Otra toximanía</label>
								<label class="checkbox"><input type="checkbox" name="prob_agr[]" value="Ludopatia">Ludopatia</label>
							</div>
							<div class="span3">
								
								<label class="checkbox"><input type="checkbox" name="prob_agr[]" value="Adicción al ordenador como chatear">Adicción al ordenador como chatear</label>
								<label class="checkbox"><input type="checkbox" name="prob_agr[]" value="Problemas emocionales o conductuales como depreción">Problemas emocionales o conductuales como depreción</label>
								<label class="checkbox"><input type="checkbox" name="prob_agr[]" value="Transtornos de personalidad">Transtornos de personalidad</label>
								<label class="checkbox"><input type="checkbox" name="prob_agr[]" value="Minusvalía Física">Minusvalía Física</label>
								<label class="checkbox"><input type="checkbox" name="prob_agr[]" value="Minusvalía Psíquica">Minusvalía Psíquica</label>
								<label class="checkbox"><input type="checkbox" name="prob_agr[]" value="Minusvalía Sensorial">Minusvalía Sensorial</label>
							</div>
						</div>
					</div>
					
					<!-- <p class="pull-right"><a data-toggle="tab" href="#fin" class="btn">Guardar y Continuar  &rarr;</a></p> -->
				</div>

				<div class="tab-pane" id="fin">
					<div id="divObs" class="form-horizontal">
					</div>
					<div class="control-group">
						<label class="control-label">Observaciones</label>
						<div class="controls">
							<textarea name="obs" id="obs" class="input-xlarge" rows="5" placeholder="Ingrese las observaciones correspondientes a la situación actual"></textarea>
						</div>
					</div>
					
					<div class="form-actions">
						<a class="btn" id="btnActualizar" onclick="guardar()"><i class="icon-refresh"></i> Actualizar</a>
						<a class="btn" onclick="limpiarCampos()"><i class="icon-trash"></i> Limpiar</a>
						<button class="btn" onclick="parent.location='index_unidadmujer.php'"><i class="icon-remove"></i> Cancelar</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal hide fade" id="bus_per">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Buscar Persona</h3>
		</div>
		<div class="modal-body">
			<div class="well">
				<div class="control-group">
					<strong>Buscar por:</strong><br>
					<label class="radio inline"><input type="radio" name="radBusPer" id="radBusPer" value="DUI">DUI</label>
					<label class="radio inline"><input type="radio" name="radBusPer" id="radBusPer" value="Nombre" checked>Nombre</label>
				</div>
	  			<input type="text" class="search-query" style="width:250px" name="txtBusPer" id="txtBusPer">
	  			<button class="btn" id="btnBusPer"><i class="icon-search"></i> Buscar</button>
			</div>
			<table class="table table-bordered">
				<thead>
					<th>Nombre</th>
					<th>DUI</th>
					<th>NIT</th>
					<th>Seleccionar</th>
				</thead>
				<tbody id="cuerpo">
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal" onclick="vermsj()"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>

	<div class="modal hide fade" id="bus_per2">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Buscar Persona</h3>
		</div>
		<div class="modal-body">
			<div class="well">
				<div class="control-group">
					<strong>Buscar por:</strong><br>
					<label class="radio inline"><input type="radio" name="radBusPer2" id="radBusPer2" value="DUI">DUI</label>
					<label class="radio inline"><input type="radio" name="radBusPer2" id="radBusPer2" value="Nombre" checked>Nombre</label>
				</div>
	  			<input type="text" class="search-query" style="width:250px" name="txtBusPer2" id="txtBusPer2">
	  			<button class="btn" id="btnBusPer2"><i class="icon-search"></i> Buscar</button>
			</div>
			<table class="table table-bordered">
				<thead>
					<th>Nombre</th>
					<th style="width:80px;">DUI</th>
					<th style="width:115px;">NIT</th>
					<th>Agregar</th>
				</thead>
				<tbody id="cuerpo2">
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal" onclick="vermsj()"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>

	
</body>

</html>