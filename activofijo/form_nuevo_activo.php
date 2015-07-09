<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro de activo</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<link rel="stylesheet" href="../css/pnotify.custom.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="../js/funciones.js"></script>
	<script src="../js/pnotify.custom.js"></script>
	<script src="form_nuevo_activo.js"></script>
	<script>
		function substr_replace(str, replace, start, length){
			if(start<0){
				start=start+str.length;
			}
			length=length!= undefined ? length: str.length;
			if(length<0){
				length=length+str.length-start;		
			}
			return str.slice(0,start)+replace.substr(0,length)+replace.slice(length)+str.slice(start+length);
		}
		function agre(){
			 var valorCambiar = $("#depto").val();
			 var texto = $("#cod_act").val();
			 if(valorCambiar<9){
				valorCambiar="0"+valorCambiar.toString();
			 }
			 if(texto.length>=4){
			 	texto=substr_replace(texto, valorCambiar, 4,2);
			 	$("#cod_act").val(texto);
			 }
		}
		function validar(){
			/*var x=document.getElementById("cod_act");
			alert(""+x.value);*/

			if(document.getElementById("cod_act").value=="" || document.getElementById("nom").value=="" || document.getElementById("mar").value=="" || document.getElementById("mod").value=="" || document.getElementById("ser").value=="" || document.getElementById("ubi").value=="" || document.getElementById("cos_adq").value=="" || document.getElementById("fec_adq").value==""){
				alert("Existen campos vacios");
			}
			else{
				document.forms["form_nuevo_activo"].submit();
			}
		}
	</script>
</head>
<body onload="cargar_sel()">
	<form action="proc_nuevo_activo.php" method="post" class="well form-horizontal span12" id="form_nuevo_activo" name="form_nuevo_activo" >
			<legend align="center">Regitrar Activos</legend>
		
		<div class="row">
			<div class="control-group span6">
				<label for="cod_act" class="control-label">Código (*)</label>
				<div class="controls">
					<input type="text" id="cod_act" name="cod_act" value="870900-00<?php echo date('Y')?>-000000" disabled/>	
				</div>
			</div>

			<div class="control-group span6">
				<label for="nom" class="control-label">Nombre (*)</label>
				<div class="controls">
					<input type="text" id="nom" name="nom"/>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="control-group span6">
				<label for="mar" class="control-label">Marca</label>
				<div class="controls">
					<input type="text" id="mar" name="mar"/>
				</div>
			</div>

			<div class="control-group span6">
				<label for="mod" class="control-label">Modelo</label>
				<div class="controls">
					<input type="text" id="mod" name="mod"/>
				</div>
			</div>
		</div>	

		<div class="row">
			<div class="control-group span6">
				<label for="ser" class="control-label">Serie</label>
				<div class="controls">
					<input type="text" id="ser" name="ser"/>
				</div>
			</div>

			<div class="control-group span6">
				<label for="ser" class="control-label">Tipo de activo</label>
				<div class="controls">
					<select name="tactivo" id="tactivo">
					</select>
					<a href="#agregar_tactivo" class="btn" data-toggle="modal"><i class="icon-plus"></i></a>
				</div>
			</div>

			
		</div>

		<div class="row">
			<div class="control-group span6" id="div_depto">
				<label for="ser" class="control-label" >Departamento (*)</label> 
				<div class="controls">
					<select name="depto" id="depto">
					</select>
					<a href="#agregar_depto" class="btn" data-toggle="modal"><i class="icon-plus"></i></a>
				</div>
			</div>

			<div class="control-group span6">
				<label for="ubi" class="control-label ">Ubicación (*)</label>
				<div class="controls">
					<textarea name="ubi" id="ubi" class="input-xlarge"></textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="control-group span6">
				<label for="cos_adq" class="control-label">Costo de adquisición &nbsp; (*)</label>
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on">$</span>
						<input type="text" id="cos_adq" name="cos_adq" class="span2"/>
					</div>
				</div>
			</div>

			<div class="control-group span6">
				<label for="can" class="control-label" >Cantidad (*)</label>
				<div class="controls">
					<input type="number" id="can" min="1" class="input-mini" name="can" id="can"/>
				</div>
			</div>

					
		</div>

		<div class="row">

			<div class="control-group span6">
				<label for="fec_adq" class="control-label">Origen (*)</label>
				<div class="controls">
					<label class='radio'><input type='radio' name='ori' id='ori' onChange="ocultar()" value='donado' checked>Donado</label>
		  			<label class='radio'><input type='radio' name='ori' id='ori' onChange="ocultar()" value='comprado'>Comprado</label>
				</div>
			</div>	

			<div class="control-group span6" id="div_tfondo">
				<label for="fec_adq" class="control-label">Tipo de fondo (*)</label>
				<div class="controls">
					<select name="tfondo" id="tfondo">
						<!--<option value="0">Seleccione...</option>-->
					</select>
					<a href="#agregar_tfondo"class="btn" data-toggle="modal"><i class="icon-plus"></i></a>
				</div>
			</div>

			<div class="control-group span6" id="div_donado">
				<label for="don" class="control-label">Donado por: (*)</label>
				<div class="controls">
					<input type="text" name="don" id="don" class="span3">
				</div>
			</div>

			
			
		</div>

		<div class="row">
			
			<div class="control-group span6">
				<label for="fec_adq" class="control-label">Fecha de adquisición (*)</label>
				<div class="controls">
					<input type="date" name="fec_adq" id="fec_adq" value="<?php echo date('Y-m-d')?>"/>
				</div>
			</div>

			<div class="control-group span6">
				<label for="fec_adq" class="control-label">Fecha de vencimiento de garantia (*)</label>
				<div class="controls">
					<input type="date" name="fec_gar" id="fec_gar" value="<?php echo date('Y-m-d')?>"/>
				</div>
			</div>
		</div>	


			
			
		<div class="row">
			<div class="form-actions span6 offset2">
				<button type="button" class="btn" name="guardar" id="guardar"><img src="../img/icon-save.png" height="14" width="14"> Guardar</button>			
				<button type="reset" class="btn" name="limpiar" id="limpiar"><i class="icon-trash"></i> Limpiar</button>
				<button type="button" class="btn" name="cancelar" id="cancelar"><i class="icon-remove"></i> Cancelar</button>		
			</div>
		</div>
	</form>



	<div class="modal hide fade" id="agregar_depto" >
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Agregar Departamento</h3>
		</div>
		<div class="modal-body">
			<div class="form-horizontal">

				<!-- <div class="control-group">
					<label for="fec_adq" class="control-label">Codigo</label>
					<div class="controls">
						<input type="text" name="codigo" id="codigo" class="span3"/>
					</div>
				</div> -->

				<div class="control-group">
					<label for="fec_adq" class="control-label">Nombre</label>
					<div class="controls">
						<input type="text" name="nombre" id="nombre" class="span3"/>
					</div>
				</div>				
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" name="guardar_depto" id="guardar_depto"><img src="../img/icon-save.png" height="14" width="14"> Guardar</a>
			<a href="#" class="btn" data-dismiss="modal" id="cancelar_depto"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>
<!--**********************************************************************************************************************************************-->
	<div class="modal hide fade" id="agregar_tfondo" >
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Agregar Tipo de Fondo</h3>
		</div>
		<div class="modal-body">
			<div class="form-horizontal">

				<!-- <div class="control-group">
					<label for="fec_adq" class="control-label">Codigo</label>
					<div class="controls">
						<input type="text" name="codigo" id="codigo" class="span3"/>
					</div>
				</div> -->

				<div class="control-group">
					<label for="fec_adq" class="control-label">Nombre</label>
					<div class="controls">
						<input type="text" name="nombre_tfondo" id="nombre_tfondo" class="span3"/>
					</div>
				</div>

				<div class="control-group">
					<label for="descripcion" class="control-label">Descripción</label>
					<div class="controls">
						<textarea name="descripcion" id="descripcion" class="input-xlarge"></textarea>
					</div>
				</div>

			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" name="guardar_tfondo" id="guardar_tfondo"><img src="../img/icon-save.png" height="14" width="14"> Guardar</a>
			<a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>
<!--**********************************************************************************************************************************************-->

<!--**********************************************************************************************************************************************-->
	<div class="modal hide fade" id="agregar_tactivo" >
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Agregar Tipo de Activo</h3>
		</div>
		<div class="modal-body">
			<div class="form-horizontal">

				<!-- <div class="control-group">
					<label for="fec_adq" class="control-label">Codigo</label>
					<div class="controls">
						<input type="text" name="codigo" id="codigo" class="span3"/>
					</div>
				</div> -->

				<div class="control-group">
					<label for="fec_adq" class="control-label">Nombre</label>
					<div class="controls">
						<input type="text" name="nombre_tactivo" id="nombre_tactivo" class="span3"/>
					</div>
				</div>

				<div class="control-group">
					<label for="descripcion" class="control-label">Descripción</label>
					<div class="controls">
						<textarea name="tdescripcion" id="tdescripcion" class="input-xlarge"></textarea>
					</div>
				</div>

				<div class="control-group">
					<label for="descripcion" class="control-label">años</label>
					<div class="controls">
						<input type="number" name="tcantidad" id="tcantidad" min="1" class="span1"/>
					</div>
				</div>

			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" name="guardar_tactivo" id="guardar_tactivo"><img src="../img/icon-save.png" height="14" width="14"> Guardar</a>
			<a href="#" class="btn" data-dismiss="modal" id="cancelar_tactivo" ><i class="icon-remove"></i> Cancelar</a>
		</div>
	</div>
<!--**********************************************************************************************************************************************-->
</body>
</html>