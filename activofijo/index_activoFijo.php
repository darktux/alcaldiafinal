<?php 
	session_start();
	if($_SESSION['ta02_nivel']!="4" && $_SESSION['ta02_nivel']!="7"){//deja entrar si es activo fijo
		echo'
			<script language="javascript1.5" type="text/javascript">
				window.location="../seguridad/identificacion.php?mod=4";
		  	</script>
	  	';
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Activo Fijo</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>	
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
	
		<header class="well row-fluid" style="background:url(../img/1af.png) no-repeat;">
			<!--<div class="span1 offset3"><img src="../img/El_Salvador.png" alt="" ></div>
			<div class="span3"><h1>Activo Fijo</h1></div>
			<div class="span1"><img src="../img/Flag-map_of_El_Salvador.png" alt=""></div>		-->
		</header>

		<div class="navbar">
			<div class="navbar-inner" style="">
				<div class="container">
					<a class="brand" href="index_activoFijo.php" title="Inicio"> <i class="icon-home icon-white"></i></a>
					<div class="nav-collapse">
						<ul class="nav">
							<li class="divider-vertical"></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Activo<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="form_nuevo_activo.php" onclick="getElementById('centro').height='1000px'" target="centro"><i class="icon-file"></i> Ingreso</a></li>
									<li><a href="form_act_activo.php" onclick="getElementById('centro').height='975px'" target="centro"><i class="icon-refresh"></i> Actualizar</a></li>
									<li><a href="cons_ab_activo.php" onclick="getElementById('centro').height='800px'" target="centro"><i class="icon-arrow-down"></i> Descargo</a></li>
									<!-- <li><a href="consulta.php" target="centro"><i class="icon-search"></i> Consultas</a></li> -->
								</ul>
							</li>
							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reparación<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="form_nuevo_mantenimiento.php" onclick="getElementById('centro').height='670px'" target="centro"><i class="icon-file"></i> Ingreso</a></li>
									<li><a href="form_actmantenimiento.php" onclick="getElementById('centro').height='670px'" target="centro"><i class="icon-refresh"></i> Actualizar</a></li>
									<!-- <li><a href="cons_mantenimiento.php" target="centro"><i class="icon-search"></i> Consultar</a></li> -->
								</ul>
							</li>
							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Traslado<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="form_nuevo_traslado.php" onclick="getElementById('centro').height='670px'" target="centro"><i class="icon-file"></i> Ingreso</a></li>
									<li><a href="form_act_traslado.php" onclick="getElementById('centro').height='670px'" target="centro"><i class="icon-refresh"></i> Actualizar</a></li>
									<!-- <li><a href="cons_traslados.php" target="centro"><i class="icon-search"></i> Consultar</a></li> -->
								</ul>
							</li>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Consulta<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="cons_activo.php" target="centro" onclick="getElementById('centro').height='670px'"><i class="icon-search"></i> Activo</a></li>
									<li><a href="cons_reparacion.php" target="centro" onclick="getElementById('centro').height='670px'"><i class="icon-search"></i> Reparacion</a></li>
									<li><a href="cons_traslados.php" target="centro" onclick="getElementById('centro').height='670px'"><i class="icon-search"></i> Traslado</a></li>
									<li><a href="cons_depreciacion.php" target="centro" onclick="getElementById('centro').height='670px'"><i class="icon-search"></i> Depreciación</a></li>
								</ul>								
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reporte<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="proc_rep_activo.php" target="centro" onclick="getElementById('centro').height='1190px'"><i class="icon-list-alt"></i> Activos registrados</a></li>
									<li><a href="rep_activo_fec_gar.php" target="centro" onclick="getElementById('centro').height='1190px'"><i class="icon-list-alt"></i> Activos con garantia proxima a vencer</a></li>
									<li><a href="rep_act_fec_adq.php" target="centro" onclick="getElementById('centro').height='1190px'"><i class="icon-list-alt"></i> Activos adquiridos recientemente</a></li>
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
		<iframe name="centro" id="centro" width="100%" height="100%"  frameborder="0"  style="width:1024px;"></iframe>
	</div>
		
	


</body>
</html>