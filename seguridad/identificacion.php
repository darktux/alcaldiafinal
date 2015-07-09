<?php 	
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Identificación</title>
		<link rel="stylesheet" href="./../css/bootstrap.css">
		<link rel="stylesheet" href="./../css/retoques.css">
		<script src="./../js/jquery.min-1.7.1-google.js"></script>
		<script src="./../js/bootstrap-2.0.2.js"></script>
		<script src="../js/funciones.js"></script>
	</head>
	<body style="background:url(../img/bg.jpg) fixed;">
		<header class="well" style="background:url(../img/banner_index.png) no-repeat;" id="banner"></header>
		<!--<div style="margin:auto;  width:600px; padding:10px;">-->
		<div class="container form-horizontal" style="width:1024px;">
			<div class="well">
			<br><p align="center" style="color:#333333;font-size:32px;">Identificación de usuarios</p><br><br>
			
				<div class="row">

					<div class="control-group span6 offset3">
						<label for="usuario" class="control-label" style="width:100px; font-size: 20px;" >Usuario: </label>
						<div class="controls" style='margin-left: 120px;'>
							<input type="text" id="usuario" name="usuario" />
						</div>
					</div>

				</div>

				<div class="row">
					<div class="control-group span6 offset3">
						<label for="contrasena" class="control-label" style="width:100px; font-size: 20px;" >Contraseña: </label>
						<div class="controls" style='margin-left: 120px;'>
							<input type="password" id="contrasena" name="contrasena">
						</div>
					</div>
				</div>	

				<div class="row">
					<div class=" span5 offset4">
						
						<button type="button" class="btn" onclick="comprobar();"><i class="icon-off"></i> Entrar</button>			
						<button type="button" class="btn" onclick="location.href='../index.php'"><i class="icon-remove"></i> Cancelar</button>			
						<input id="modulo" name="modulo" type="hidden" value="<?php echo $_REQUEST['mod']?>">
					</div>
				</div>		

				<div class="row">
					<div class="span5 offset4">
						<br>
						<a href="form_rec_contra.php" style="">¿olvidaste tu contraseña?</a>
					</div>
				</div>			
					
					<!--<td colspan="2" align="center"><button onclick="comprobar();">Comprobar</button></td>-->
			</div>	
			</div>
		<!--</div>-->
		<div id="avisos">
			
		</div>
		<script type="text/javascript">
			function comprobar(){
				var usuario=document.getElementById('usuario').value;
				var contrasena=document.getElementById('contrasena').value;	
				var modulo=document.getElementById('modulo').value;
				var xmlhttp = new XMLHttpRequest();
	            xmlhttp.onreadystatechange=function(){
	                if(xmlhttp.readyState==4 && xmlhttp.status==200){
	                	//alert(xmlhttp.responseText);
	                	if(/exito/.test(xmlhttp.responseText)){
	                		var aux = parseInt(xmlhttp.responseText.split('-')[1]);
	                		switch(aux){
	                			case 1:
	                					window.parent.location="../catastro/index_catastro.php";
	                				break;
	                			case 2:
	                					window.parent.location="../unidadmujer/index_unidadmujer.php";
	                				break;
	                			case 3:
	                					window.parent.location="../colecturia/index_colecturia.php";
	                				break;
	                			case 4:
	                					window.parent.location="../activofijo/index_activofijo.php";
	                				break;
	                			case 5:
	                					window.parent.location="../registrofamiliar/index_registrofamiliar.php";
	                				break;
	                			case 6:
	                					window.parent.location="../seguridad/index_seguridad.php";
	                				break;
	                		}
	                	}
	                	else{
	                		//document.getElementById('avisos').innerHTML=xmlhttp.responseText;
	                		alert(xmlhttp.responseText);
	                	}
	                }
	            }

	            xmlhttp.open('GET','ajaxseguridad.php?caso=identificar&usuario='+usuario+'&contrasena='+contrasena+'&mod='+modulo,true);
	            xmlhttp.send();
	        }
		</script>
	</body>
</html>