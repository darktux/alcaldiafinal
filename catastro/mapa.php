<!DOCTYPE html>
<html lang="es">
<style type="text/css">
	html { height: 100% }
	body { height: 100%; margin: 0; padding: 0 }
	div#mapa{ height: 100%; width:70%;float: left; border-radius: 10px; }
	div#acordion{height: 100%; width:30%;float: left;}
</style>
<head>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<link rel="stylesheet" href="./../css/pnotify.custom.css">
	<link rel="stylesheet" href="./../css/bootstrap-select.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap.js"></script>
	<script src="./../js/bootstrap-select.js"></script>
	<script src="./../js/pnotify.custom.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBp0xi0Mj1DrO0wran3J-9U5Fz-PBt2VjE&sensor=false" onerror="alert('No hay conexion a internet, no se puede cargar el mapa')"></script>
	<!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=geometry&sensor=false"></script>-->
	<script src="js/mapa.js"></script>
	<script src="js/notificaciones.js"></script>
</head>
<body>
	<div id="mapa"></div>
	<div id="menu">
		<div class="accordion" id="acordion">
		 <!-- <div class="accordion-group">
		    <div class="accordion-heading">
		      <a class="accordion-toggle" data-toggle="collapse" data-parent="#acordion" href="#c1">Zonas</a>
		    </div>
		    <div id="c1" class="accordion-body collapse">
		      <div class="accordion-inner">
		      	<a class="btn" href="#" onclick="addP()"><i class="icon-file"></i> Agregar</a>
		      	<a class="btn" href="#"><i class="icon-refresh"></i> Modificar</a>
		       <a class="btn" href="#" onclick="remP()">Eliminar</a>
		      </div>
		    </div>
		  </div>-->
		  <div class="accordion-group">
		    <div class="accordion-heading">
		      <a class="accordion-toggle" data-toggle="collapse" data-parent="#acordion" href="#c2" onclick="ver(1)">Negocios</a>
		    </div>
		    <div id="c2" class="accordion-body collapse">
		      <div class="accordion-inner">
		        <a class="btn" href="#" onclick="addN()"><i class="icon-map-marker"></i> Agregar</a>		      	
		        <!-- <a class="btn" href="#" onclick="verN()"><i class="icon-search"></i> Contribuyentes morosos</a> -->
		      </div>
		    </div>
		  </div>
		  <div class="accordion-group">
		    <div class="accordion-heading">
		      <a class="accordion-toggle" data-toggle="collapse" data-parent="#acordion" href="#c3" onclick="ver(2)">Inmuebles</a>
		    </div>
		    <div id="c3" class="accordion-body collapse">
		      <div class="accordion-inner">
		        <a class="btn" href="#" onclick="addI()"><i class="icon-map-marker"></i> Agregar</a>
		        <!-- <a class="btn" href="#" onclick="verI()"><i class="icon-search"></i> Contribuyentes morosos</a> -->
		      </div>
		    </div>
		  </div>
		  
		  <div class="accordion-group">
		    <div class="accordion-heading">
		      <a class="accordion-toggle" data-toggle="collapse" data-parent="#acordion" href="#c5" onclick="ver(3)">Alumbrado</a>
		    </div>
		    <div id="c5" class="accordion-body collapse">
		      <div class="accordion-inner">
		        <a class="btn" href="#" onclick="addL()"><i class="icon-map-marker"></i> Agregar</a>
		      	<!-- <a class="btn" href="#" onclick="verL()"><i class="icon-search"></i> Ver Estado</a> -->
		      </div>
		    </div>
		  </div>
		  <div class="accordion-group">
		    <div class="accordion-heading">
		      <a class="accordion-toggle" data-toggle="collapse" data-parent="#acordion" href="#c4" onclick="ver(4)">Calles en mantenimiento</a>
		    </div>

		    <div id="c4" class="accordion-body collapse" style="z-index:250">
		    	<div class="accordion-inner">
		    		<a class="btn" href="#" onclick="addC()" id="btnAC"><i class="icon-map-marker"></i> Agregar</a>
		        	<a class="btn" href="#modalC" id="btnL" data-toggle="modal" style="display:none"><i class="icon-ok"></i> Listo</a>
		      		<a class="btn" href="#" onclick="cancelarC()" id="btnCC" style="display:none"><i class="icon-remove"></i> Cancelar</a>
		      	</div>
		    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    	<select onChange="cambio()" name="est_call" id="est_call" class="selectpicker"  title="Seleccione una o varias opciones" multiple>
					<option value="2">En mantenimiento</option>
					<option value="3">Cerrada</option>
					<option value="4">En construcción</option>
				</select>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>		     
		    </div>
		  </div>
		</div>
	</div>

	<div class="modal hide fade" id="modalC">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Agregar estado de calle</h3>
		</div>
		<div class="modal-body">
			<div class="well form-horizontal">
				<div class="control-group">
					<label class="control-label">Estado de la calle</label>
					<div class="controls">
						<select name="estado_calle" id="estado_calle">
							<option value="En mantenimiento">En mantenimiento</option>
							<option value="Cerrada">Cerrada</option>
							<option value="En construcción">En construcción</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Tipo de calle</label>
					<div class="controls">
						<select name="tip_call" id="tip_call">
							<option value="Concreto">Concreto</option>
							<option value="Empedrado">Empedrado</option>
							<option value="Empedrado y Fraguado">Empedrado y Fraguado</option>
							<option value="Pavimentación con asfalto">Pavimentación con asfalto</option>
							<option value="Concreteado y fraguado">Concreteado y fraguado</option>
							<option value="Concreto hidráulico">Concreto hidráulico</option>
							<option value="Tierra">Tierra</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Descripción</label>
					<div class="controls"><textarea id="concepto" name="concepto"></textarea></div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a class="btn" href="#" onclick="guardarC()" id="btnGC"><img src="./../img/icon-save.png" width="14px" height="14px"> Guardar</a>
			<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>

</body>
</html>