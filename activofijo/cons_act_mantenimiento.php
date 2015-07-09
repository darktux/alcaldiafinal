<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Altas y Bajas</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<script src="./../js/jquery.min-1.7.1-google.js"></script>
	<script src="./../js/bootstrap-2.0.2.js"></script>
</head>
<body>
	<div class="well">
	<legend>Altas/Bajas mantenimiento</legend>
	<div class="tabbable">
			<ul class="nav nav-tabs">
		  		<li class="active"><a data-toggle="tab" href="#altas">Altas</a></li>
		  		<li><a data-toggle="tab" href="#bajas">Bajas</a></li>
			</ul>
		</div>

		<div class="tab-content">
		  <div class="tab-pane active" id="altas">
		  	<table border="1" align="center">
				<tr>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Costo</th>
					<th>Empresa</th>
					<th>Acciòn</th>
				</tr>
				<tr>
					<td>101-140791-1210-001</td>
					<td>Muebles para el grupo de desarrollo</td>
					<td>$320.00</td>
					<td>RYSI SA DE CV</td>
					<td><button>Dar de Alta</button></td>
				</tr>
				<tr>
					<td>101-140791-1210-002</td>
					<td>Televisor</td>
					<td>$210.00</td>
					<td>FREUND</td>
					<td><button>Dar de Alta</button></td>
				</tr>
			</table>
		  </div>

		  <div class="tab-pane" id="bajas">
		  	<table border="1" align="center">
				<tr>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Costo</th>
					<th>Empresa</th>
					<th>Acciòn</th>
				</tr>
				<tr>
					<td>101-140791-1210-001</td>
					<td>Muebles para el grupo de desarrollo</td>
					<td>$320.00</td>
					<td>RYSI SA DE CV</td>
					<td><button>Dar de baja</button></td>
				</tr>
				<tr>
					<td>101-140791-1210-002</td>
					<td>Televisor</td>
					<td>$320.00</td>
					<td>RYSI SA DE CV</td>
					<td><button>Dar de baja</button></td>
				</tr>
			</table>		  	
		  </div>
		</div>
	</div>
</body>
</html>