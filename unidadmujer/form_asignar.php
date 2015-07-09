<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Asignar Beneficiaria</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<link rel="stylesheet" href="./../css/pnotify.custom.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/jquery.maskedinput.js"></script>
	<script src="./../js/pnotify.custom.js"></script>
	<script src="./../js/funciones.js"></script>
	<script src="js/form_asignar.js"></script>
</head>

<body>
	<div class="well span12 form-horizontal">
        <legend>Asignación de Beneficirias/os a Proyecto</legend>
        <a data-toggle="modal" href="#buscarProyecto" class="btn"><i class="icon-search"></i> Buscar Proyecto</a>
        <br><br>
        <div class="row-fluid">
            <div class="control-group span6">
                <label class="control-label" for="cod_pro" >Código (*)</label>
                <div class="controls">
                    <label id="cod_pro"></label>
                </div>
            </div>
            <div class="control-group span6">
                <label class="control-label" for="nom_pro">Nombre (*)</label>
                <div class="controls">
                    <label id="nom_pro"></label>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="control-group span6">
                <label class="control-label" for="fec_ini" >Fecha de Inicio (*)</label>
                <div class="controls">
                    <input type="date" name="fec_ini" id="fec_ini" readonly>
                </div>
            </div>
            <div class="control-group span6">
                <label class="control-label" for="fec_fin" >Fecha de Finalizaci&oacute;n (*)</label>
                <div class="controls" >
                    <input type="date" name="fec_fin" id="fec_fin" readonly>
                </div>
            </div>
        </div>
    </div>


    <div class="well span12 form-horizontal">
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
				<input type="date" id="fec_nac" name="fec_nac">
			</div>
		</div>
		<div class="control-group span4">
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
				<textarea class="input-xlarge" name="dir" id="dir"></textarea>
			</div>
		</div>
		<div class="control-group span12" id="divAnadir">
			<div class="controls">
				<button class="btn offset2" onclick="asignar()"><i class="icon-plus"></i> Añadir</button>
			</div>
		</div>
		
	</div>	

	<div class="well span12">
		<table class='table' id="tablaBen">
			<thead>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>DUI</th>
			</thead>
			<tbody id="cuerpo_asignar">
			</tbody>
		</table>
		<!-- <div class='form-actions span3 offset4'>
			<button class="btn"><img src="../img/icon-save.png" height="14" width="14"> Guardar</button>
			<button class='btn' onclick="parent.location='index_unidadmujer.php'"><i class='icon-remove'></i> Cancelar</button>
		</div>	 -->
	</div>

	<div class="modal hide fade" id="buscarProyecto">
        <div class="modal-header">
            <a class="close" data-dismiss="modal">×</a>
            <h3>Buscar Proyecto</h3>
        </div>
        <div class="modal-body">
            <div class="well">
                <div class="control-group">
                    <strong>Buscar por:</strong>
                    <label class="radio inline"><input type="radio" name="buspor" id="buspor" value="Código">Código</label>
                    <label class="radio inline"><input type="radio" name="buspor" id="buspor" value="Nombre" checked>Nombre</label>
                </div>
                <input type="text" class="search-query" style="width:250px" name="bus_proy" id="bus_proy">
                <button class="btn" id="btnBusProy"><i class="icon-search"></i> Buscar</button>
            </div>
            <table class="table table-bordered">
                <thead>
                    <th>Código</th>
                    <th>Proyecto</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                </thead>
                <tbody id="cuerpoProy">
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
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
					<th>Agregar</th>
				</thead>
				<tbody id="cuerpo">
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal" onclick="vermsj()"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>
	
	
</body>
</html>