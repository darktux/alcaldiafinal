<?php 
	session_start();
	if($_SESSION['ta02_nivel']!="2" && $_SESSION['ta02_nivel']!="7"){//deja entrar si es activo fijo
		echo'
			<script language="javascript1.5" type="text/javascript">
				window.location="../seguridad/identificacion.php?mod=2";
		  	</script>
	  	';
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Unidad de la Mujer</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./../css/retoques.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/funciones.js"></script>
	<script>
		// $(function(){
		// 	//Funcion para cargar el mapa dentro del div
		// 	document.getElementById('centro').height='800px';
		// 	document.getElementById('centro').contentDocument.location = "accesos_directos.php";
		// });
	</script>
	<script>
		function cs(){
			//alert("hola mono");
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open('GET','../seguridad/ajaxseguridad.php?caso=borrar',true);
	        xmlhttp.send();
			window.location="../index.php";
		}
	</script>
</head>
<body style="background: url(../img/bg.jpg) fixed;">
	<header class="well" style="background:url(../img/banner_um.png) no-repeat;" id="banner"></header>

	<nav class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="index_unidadmujer.php" title="Inicio"><i class="icon-home icon-white"></i></a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="divider-vertical"></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Proyecto<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a target="centro" href="form_proyecto.php" onclick="getElementById('centro').height='680px'"><i class="icon-file"></i> Nuevo</a></li>
								<li><a target="centro" href="act_proyecto.php" onclick="getElementById('centro').height='680px'"><i class="icon-refresh"></i> Actualizar datos</a></li>
								<!-- <li><a target="centro" href="cons_proyecto.php" onclick="getElementById('centro').height='1000px'"><i class="icon-list"></i> Control de actividades</a></li> -->
								<li><a target="centro" href="form_financiero.php" onclick="getElementById('centro').height='1000px'"><img src="../img/icon-money.png" height="15" width="15"> Actualizar Gastos</a></li>
								<li><a target="centro" href="form_asignar.php" onclick="getElementById('centro').height='1800px'"><i class="icon-edit"></i> Asignar a Proyecto</a></li>
							</ul>
						</li>
												
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Expediente<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a target="centro" href="form_expediente.php" onclick="getElementById('centro').height='650px'"><i class="icon-file"></i> Nuevo</a></li>
								<li><a target="centro" href="act_expediente.php" onclick="getElementById('centro').height='650px'"><i class="icon-refresh"></i> Actualizar datos</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Consulta<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a target="centro" href="cons_expediente.php" onclick="getElementById('centro').height='1000px'"><i class="icon-search"></i> Gráficas</a></li>
								<li><a target="centro" href="cons_proyecto.php" onclick="getElementById('centro').height='1000px'"><i class="icon-search"></i> Proyecto</a></li>
								</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reporte<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a target="centro" href="rep_expediente.php" onclick="getElementById('centro').height='600px'"><i class="icon-list-alt"></i> Expedientes</a></li>
								<li><a target="centro" href="reportes/reporte_beneficiarios.php" onclick="getElementById('centro').height='1000px'"><i class="icon-list-alt"></i> Beneficiarios de proyecto</a></li>
								<li><a target="centro" href="reportes.php?casorep=3" onclick="getElementById('centro').height='1000px'"><i class="icon-list-alt"></i> Proyectos anteriores</a></li>
								<li><a target="centro" href="reportes/reporte_costos_proyectos.php" onclick="getElementById('centro').height='1000px'"><i class="icon-list-alt"></i> Costos por proyecto</a></li>
								<!-- <li><a target="centro" href="reportes.php?casorep=5" onclick="getElementById('centro').height='1000px'"><i class="icon-list-alt"></i> Informe general de casos de violencia</a></li> -->
								<!-- <li><a target="centro" href="reportes/reporte_beneficiarios.php" onclick="getElementById('centro').height='1000px'"><i class="icon-list-alt"></i>  beneficiarios</a></li> 
								 <li><a target="centro" href="reportes/reporte_proyectos_anteriores.php" onclick="getElementById('centro').height='1000px'"><i class="icon-list-alt"></i>  beneficiarios</a></li> --> 
							</ul>
						</li>
					</ul>
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
	</div>
	<div class="container" style="width:1024px;">
		<!-- <object type="text/php" name="centro" id="centro" width="100%" height="100%" scrolling="no"></object> -->
		<iframe name="centro" id="centro" width="100%" height="100%"  frameborder="0" style="width:1024px;"></iframe>
	</div>			
	


</body>
</html>
