<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Control Financiero de Proyectos</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="../css/retoques.css">
    <link rel="stylesheet" href="./../css/pnotify.custom.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
    <script src="./../js/pnotify.custom.js"></script>
    <script src="js/form_financiero.js"></script>
</head>
<body>
    <div class="well span12 form-horizontal">
        <legend>Actualizar Gastos de Proyecto</legend>
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
        <legend>Costos o Gastos incurridos en el proyecto</legend>
        <div class="row-fluid">
            <div class="control-group span6">
                <label class="control-label">Fecha (*)</label>
                <div class="controls">
                    <input type="date" id="fec_com" value="<?php echo date("Y-m-d"); ?>">
                </div>
            </div>
            <div class="control-group span6">
                <label for="" class="control-label">Nº Comprobante (*)</label>
                <div class="controls">
                    <input type="text" id="num_com">
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="control-group span6">
                <label for="" class="control-label">Concepto (*)</label>
                <div class="controls">
                    <input type="text" id="con_com">
                </div>
            </div>
            <div class="control-group span6">
                <label class="control-label">Monto (*)</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on">$</span>
                        <input type="text" style="width:180px;" id="mon_com" value="0">
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="control-group offset3" id="divAnadir">
                <div class="controls">
                    <button href="#" class="btn" id="add_com" onclick="anadirComprobante()"><i class="icon-plus"></i> Agregar</button>
                </div>
            </div>
        </div>
    </div>

 	<div class="well span12">
 		<table class="table table-bordered">
 			<thead>
 				<tr>
 					<th>Fecha</th>
                    <th>Nº Comprobante</th>
 					<th>Concepto</th>
 					<th>Cantidad</th>
 					<th>Modificar/Eliminar</th>
 				</tr>
 			</thead>
 			<tbody id="cuerpo_com">
 			</tbody>
 		</table>
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
                    <th>Seleccionar</th>
                </thead>
                <tbody id="cuerpoProy">
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
        </div>
    </div>

    
     
   
    
</body>
</html>