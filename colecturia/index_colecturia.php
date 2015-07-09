<?php 
	session_start();
	//$_SESSION['ta02_nivel'] = "7";
	if($_SESSION['ta02_nivel']!="3" && $_SESSION['ta02_nivel']!="7"){//deja entrar si es activo fijo
		echo'
			<script language="javascript1.5" type="text/javascript">
				window.location="../seguridad/identificacion.php?mod=3";
		  	</script>
	  	';
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Colecturia</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<link rel="stylesheet" href="./../css/retoques.css">
	<link rel="stylesheet" href="./../css/pnotify.custom.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
	<script src="./../js/pnotify.custom.js"></script>
	<script src="js/notificaciones.js"></script>
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
<body style="background:url(../img/bg.jpg) fixed;">
	<header class="well" style="background:url(../img/banner_co.png) no-repeat;" id="banner"></header>

	<div class="navbar">
		<div class="navbar-inner" style="">
			<div class="container">
				<a class="brand" href="index_colecturia.php" title="Inicio"><i class="icon-home icon-white"></i></a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="divider-vertical"></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge" id="num_not">0</span>&nbsp;&nbsp;&nbsp;Cobros<b class="caret"></b></a>
							<ul class="dropdown-menu" id="divX">
							</ul>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Impuesto<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="form_impuesto.php"  target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-file"></i> Ingresar</a></li>
								<li><a href="act_impuesto.php"  target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-refresh"></i> Actualizar</a></li>
								<!-- <li><a href="form_condonacion_impuesto.php"  target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-remove"></i> Condonación</a></li> -->
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Cobro<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="form_factura.php" target="centro" onclick="getElementById('centro').height='1000px'"><i class="icon-edit"></i> Factura</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Consulta<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="cons_rep_ingresos.php" target="centro" onclick="getElementById('centro').height='680px'"><i class="icon-search"></i> Consulta de Ingresos</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reporte<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="rep_ingresos.php" target="centro" onclick="getElementById('centro').height='1000px'"><i class="icon-search"></i> Reporte de Ingresos Diario</a></li>
								<li><a href="rep_ingresos.php?opc=men&par_bus=<?php echo date('Y-m')?>" target="centro" onclick="getElementById('centro').height='1000px'"><i class="icon-search"></i> Reporte de Ingresos Mensual</a></li>
								<li><a href="rep_ingresos.php?opc=anu&par_bus=<?php echo date('Y')?>" target="centro" onclick="getElementById('centro').height='1000px'"><i class="icon-search"></i> Reporte de Ingresos Anual</a></li>
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
		<iframe name="centro" id="centro" width="100%" height="600px"  frameborder="0" style="width:1024px;"></iframe>
	</div>	
	

	<footer>
		
	</footer>

	<script type="text/javascript">
		function eliminar(cod_fac){
			$("#" + cod_fac + "").remove();
			$("#num_not").html($(".not").size());
		}
	</script>
</body>
</html>