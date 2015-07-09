<?php 
	session_start();
	if($_SESSION['ta02_nivel']!="1" && $_SESSION['ta02_nivel']!="7"){//deja entrar si es activo fijo
		echo'
			<script language="javascript1.5" type="text/javascript">
				window.location="../seguridad/identificacion.php?mod=1";
		  	</script>
	  	';
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Catastro</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap.js"></script>
	<script type="text/javascript">
	$(function(){
		//Funcion para cargar el mapa dentro del div
		document.getElementById('centro').height='800px';
		document.getElementById('centro').contentDocument.location = $("#ver").attr("href");
	});
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
	<header class="well" style="background:url(../img/banner_ca.png) no-repeat;" id="banner"></header>

	<div class="navbar">
		<div class="navbar-inner" style="">
			<div class="container">
				<a class="brand" href="index_catastro.php" title="Inicio"><i class="icon-home icon-white"></i></a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="divider-vertical"></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Contribuyente<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="form_contribuyente.php" target="centro" onclick="getElementById('centro').height='750px'"><i class="icon-file"></i> Ingresar</a></li>
								<li><a href="act_contribuyente.php" target="centro" onclick="getElementById('centro').height='750px'"><i class="icon-refresh"></i> Actualizar datos</a></li>
								<li style="display:none;"><a href="mapa.php" target="centro" onclick="getElementById('centro').height='500px'" id="ver">Ver Mapa</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Negocio<b class="caret"></b></a>
							<ul class="dropdown-menu">								
								<li><a href="form_negocio.php" target="centro" onclick="getElementById('centro').height='750px'"><i class="icon-file"></i> Ingresar</a></li>
								<li><a href="act_negocio.php" target="centro" onclick="getElementById('centro').height='750px'"><i class="icon-refresh"></i> Actualizar datos</a></li>
								<li><a href="form_traspaso.php" target="centro" onclick="getElementById('centro').height='750'"><img src="./../img/icon-transfer.png" width="14px" height="14px"> Traspasar</a></li>
								<li><a href="form_cierre.php" target="centro" onclick="getElementById('centro').height='750'"><i class="icon-ban-circle"></i> Cerrar</a></li>
								<li><a href="form_estado_cuenta_negocio.php" target="centro" onclick="getElementById('centro').height='1080px'"><img src="./../img/icon-money.png" width="14px" height="14px"><i class="glyphicons glyphicons-money"></i> Estado de Cuenta</a></li>
							</ul>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Inmueble<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="form_inmueble.php" target="centro" onclick="getElementById('centro').height='800px'"><i class="icon-file"></i> Ingresar</a></li>
								<li><a href="act_inmueble.php" target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-refresh"></i> Actualizar datos</a></li>
								<li><a href="form_estado_cuenta_inmueble.php" target="centro" onclick="getElementById('centro').height='1080px'"><img src="./../img/icon-money.png" width="14px" height="14px"> Estado de Cuenta</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Alumbrado<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="form_alumbrado.php" target="centro" onclick="getElementById('centro').height='1000px'"><i class="icon-file"></i> Ingresar</a></li>
								<!-- <li><a href="act_alumbrado.php" target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-refresh"></i> Actualizar datos</a></li> -->
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">T&iacute;tulo de Perpetuidad<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="form_titulo_perpetuidad.php" target="centro" onclick="getElementById('centro').height='1000px'"><i class="icon-file"></i> Ingresar</a></li>
								<li><a href="act_titulo_perpetuidad.php" target="centro" onclick="getElementById('centro').height='1000px'"><i class="icon-refresh"></i> Actualizar datos</a></li>
								<li><a href="form_cementerio.php" target="centro" onclick="getElementById('centro').height='1000px'"><i class="icon-file"></i> Cementerios</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Cobro<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="../colecturia/form_factura.php?estado=false" target="centro" onclick="getElementById('centro').height='1000px'"><i class="icon-edit"></i> Factura</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Consulta<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a target="centro" href="cons_catastro.php" onclick="getElementById('centro').height='1500px'"><i class="icon-search"></i> Gráficas</a></li>
								<li><a href="cons_contribuyente.php" target="centro" onclick="getElementById('centro').height='1000px'"><i class="icon-search"></i> Contribuyente</a></li>
								<li><a href="cons_negocio.php" target="centro" onclick="getElementById('centro').height='1000px'"><i class="icon-search"></i> Negocio</a></li>
								<li><a href="cons_inmueble.php" target="centro" onclick="getElementById('centro').height='1000px'"><i class="icon-search"></i> Inmueble</a></li>
								<!-- <li><a href="ayuda_catastro.php" target="centro" onclick="getElementById('centro').height='1000px'"><i class="icon-question-sign"></i> Ayuda</a></li> -->
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reporte<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a target="centro" href="reportes.php?casorep=1" onclick="getElementById('centro').height='1000px'"><i class="icon-list-alt"></i> Contribuyentes</a></li>
								<li><a target="centro" href="reportes.php?casorep=2" onclick="getElementById('centro').height='1000px'"><i class="icon-list-alt"></i> Negocios</a></li>
								<li><a target="centro" href="reportes.php?casorep=3" onclick="getElementById('centro').height='1000px'"><i class="icon-list-alt"></i> Inmuebles</a></li>
							</ul>
						</li>
						
						<!--<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Mapa<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li class="dropdown-submenu">
									<a href="#">Zonas</a>
									<ul class="dropdown-menu">
										<li><a href="#" onclick="dibujaZona()">Añadir zona</a></li>
										<li><a href="#">Eliminar zona</a></li>
									</ul>
								</li>
							</ul>
						</li>-->
						
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
		<iframe name="centro" id="centro" width="100%" height="900px"  frameborder="0" class="" style="width:1024px;"></iframe>
	</div>
	
</body>
</html>