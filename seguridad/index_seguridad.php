<?php 
	session_start();
	// echo $_SESSION['ta02_nivel'];
	if($_SESSION['ta02_nivel']!="6" && $_SESSION['ta02_nivel']!="7"){//deja entrar si es seguridad
		echo'
			<script language="javascript1.5" type="text/javascript">
				window.location="../seguridad/identificacion.php?mod=6";
		  	</script>
	  	';
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Seguridad</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/retoques.css">
	<script src="../js/jquery.min-1.7.1-google.js"></script>
	<script src="../js/bootstrap-2.0.2.js"></script>
	<script src="../js/funciones.js"></script>
    
    <link   href="jquery.fileDownload-master/src/Content/Site.css" type="text/css" rel="stylesheet"  />
    <link   href="jquery.fileDownload-master/src/Content/shCoreDefault.css" type="text/css" rel="stylesheet" />
    <link   href="jquery.fileDownload-master/src/Content/jquery.gritter.css" type="text/css" rel="stylesheet" />
    <script src ="jquery.fileDownload-master/src/Scripts/jquery.fileDownload.js" type="text/javascript"></script>
    <script src ="jquery.fileDownload-master/src/Scripts/Support/shCore.js" type="text/javascript"></script>
    <script src ="jquery.fileDownload-master/src/Scripts/Support/shBrushJScript.js" type="text/javascript"></script>
    <script src ="jquery.fileDownload-master/src/Scripts/Support/shBrushXml.js" type="text/javascript"></script>
    <script src ="jquery.fileDownload-master/src/Scripts/Support/jquery.gritter.min.js" type="text/javascript"></script>
    
	<script>
		function cs(){
			//alert("hola mono");
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open('GET','../seguridad/ajaxseguridad.php?caso=borrar',true);
	        xmlhttp.send();
			window.location="../index.php";
		}
		function backup(){
			 //$.fileDownload("bkp/Backup_db_alcaldia17.05.2015.20.45.44.sql");
			 //HOLA! cambio...
	        $.ajax({
		        type:"post",
		        url: "back_rest.php",
		        data:{actionButton:'Export'},
		        success:function(responseText){
		        	$("#descargaarchivo").attr("href",responseText);
		        	//alert("Backup generado en la carpeta seguridad/bkp ");
		        	element=document.getElementById('divenlace');
		        	element.style.display="block";
		        }
	        }); 
		}
		function cierramsj(){
			element=document.getElementById('divenlace');
		    element.style.display="none";
		}
	</script>
</head>
<body style="background:url(../img/bg.jpg) fixed;">
	<header class="well" style="background:url(../img/banner_se.png) no-repeat;" id="banner"></header>
	<div class="navbar">
		<div class="navbar-inner" style="">
			<div class="container">
				<a class="brand" href="index_seguridad.php" title="Inicio"><i class="icon-home icon-white"></i></a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="divider-vertical"></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="form_nuevo_usuario.php" target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-list-alt"></i> Registrar usuario</a></li>
								<li><a href="form_act_usuario.php" target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-list-alt"></i> Actualizar datos de usuario</a></li>
								<li><a href="form_ab_usuario.php" target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-list-alt"></i> Alta/Baja usuario</a></li>
							</ul>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Backups<b class="caret"></b></a>
							<ul class="dropdown-menu">
									<li><a style="cursor:pointer;" onclick="backup();"><i class="icon-download"></i> Hacer copia de seguridad</a></li>
                <li><a href="form_restaurar.php" target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-upload"></i> Restaurar copia de seguridad</a></li>
							</ul>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Bit&aacute;cora<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="bitacora.php" target="centro" onclick="getElementById('centro').height='980px'"><i class="icon-eye-open"></i> Registro de actividad</a></li>
							</ul>
						</li>
						
						
					</ul>
				</div>
				<ul class="nav pull-right">
					<li class="divider-vertical"></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" title="Ayuda, Cerrar Sesión"><i class="glyphicon glyphicon-user"></i><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="ayuda.php" target="centro" onclick="getElementById('centro').height='1000px'" title="Ayuda"><i class="icon-question-sign"></i> Ayuda</a></li>
							<li><a href="javascript:cs()"><i class="icon-off"></i> Cerrar Sesión</a></li>						
						</ul>
					</li>
          		</ul>
			</div>
		</div>
	</div>
	<div class="container" style="width:1024px;">
		<div class="well" style="display:none" id="divenlace">
				<div class="alert alert-success">
				  <button type="button" class="close" data-dismiss="alert" onclick="cierramsj()">&times;</button>
				  <h3>Información <small>El backup fue guardado en el servidor</small></h3> <h4>Por favor haga click derecho y eliga "Guardar enlace como..." en el siguiente link si desea guardar el backup en otra ubicación.</h4>
				  <br><br>
				  <a id="descargaarchivo"><legend>Enlace del archivo</legend></a><br>
				  <p align="center"><a class="btn" onclick="cierramsj()"><i class="icon-remove"></i> Cerrar Información</a></p>
				</div>
			</div>
		<!-- <object type="text/php" name="centro" id="centro" width="100%" height="100%" scrolling="no"></object> -->
		<iframe name="centro" id="centro" width="100%" height="100%"  frameborder="0"  style="width:1024px;"></iframe>
	</div>	
	<footer></footer>

</body>
</html>