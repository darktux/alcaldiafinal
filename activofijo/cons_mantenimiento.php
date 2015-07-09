<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Activos en Mantenimiento</title>
	<link rel="stylesheet" href="./../css/bootstrap.css">
	<script src='./../js/jquery.js'></script>
	<script src='cons_mantenimiento.js'></script>
	<link rel="stylesheet" type="text/css" href="./../css/retoques.css">

</head>
<body>
	<form action='proc_bus_mantenimiento.php' method='POST' class='well form-search'>
			<legend>Buscar Mantenimiento</legend>
			<div class='control-group'>
				<strong>Buscar por:</strong>
				<label class='radio'><input type='radio' name='buspor' value='Código'>Código</label>
				<label class='radio'><input type='radio' name='buspor' value='Nombre' checked>Nombre</label>
			</div>
			<input type='text' class='input-xlarge search-query' name='bus_act' id='bus_act'/>
			<button type='submit' class='btn'><i class='icon-search'></i> Buscar</button>
		</form>
	<form action="proc_cons_mantenimiento.php" method='post'  class="well form-horizontal">
		<legend>Consultas de Mantenimiento</legend>
		<table class="table table-bordered">
			<thead>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Costo</th>
				<th>Fecha</th>
				<th>Empresa</th>
			</thead>
			<tbody id="cuerpo"></tbody>
			<?php
				// include("../php/conexion.php");
				// $conn=conectar();
				// $sql="SELECT a.nom,m.* FROM af_mantenimiento m inner join af_activo a on a.cod_act=m.cod_act WHERE a.act='1' order by a.cod_act, m.fec";
				// $rs=pg_query($sql) or die("Error en la busqueda");
				// if($rs){
				// 	$numRow=pg_num_rows($rs);
				// 	pg_close($conn);
				// 	for ($i=0; $i < $numRow; $i++) {
		  // 					echo "<tr>";
				// 			$row=pg_fetch_array($rs,$i);
				// 			$cod_act= $row['cod_act'];
				// 			$nom= $row['nom'];
				// 			$cos=$row['cos'];
				// 			$des=$row['des'];
				// 			$emp=$row['emp'];
				// 			$fec=$row['fec'];
				// 			echo "<td>".$cod_act."</td>";
				// 			echo "<td>".$nom."</td>";
				// 			echo "<td>".$cos."</td>";
				// 			echo "<td>".$fec."</td>";
				// 			echo "<td>".$emp."</td>";																		
				// 			echo "</tr>";
				// 	}
				// }
			?>

		</table>
	</form>
</body>
</html>