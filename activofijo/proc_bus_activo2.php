<?php
	include ("../php/conexion.php");
	$conn=conectar();
	$sql="";
	if ($_POST[buspor]=="Nombre") {
		$sql="SELECT * FROM af_activo WHERE nom='$_POST[bus_act]' and act='1'";
	}else{
		$sql="SELECT * FROM af_activo WHERE cod_act='$_POST[bus_act]' and act='1'";
	}
	$rs=pg_query($sql) or die("Error en la busqueda");
	if($rs){
	$numRow=pg_num_rows($rs);
	
	pg_close($conn);
echo "<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset='UTF-8'>
	<title>Altas/Bajas de activo</title>
	<link rel='stylesheet' href='./../css/bootstrap.css'>
</head>
<body>
	<form action='proc_bus_activo2.php' method='POST' class='well form-search' style='background-color: transparent;'>
		  <legend>Buscar Activo</legend>
		  <div class='control-group'>
		  	<strong>Buscar por:</strong>
		  	<label class='radio'><input type='radio' name='buspor' value='Código'>Código</label>
		  	<label class='radio'><input type='radio' name='buspor' value='Nombre' checked>Nombre</label>
		  </div>
		  <input type='text' class='input-xlarge search-query' name='bus_act' id='bus_act'>
		  <button type='submit' class='btn btn-info'><i class='icon-search'></i> Buscar</button>
	</form>
	<form action='' name='consulta' id='consulta' method='post' class='well form-horizontal'>
		<legend>Consultas de Activos</legend>
		<table class='table table-bordered'>
			<thead>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Marca</th>
				<th>Modelo</th>
				<th>Serie</th>
				<th>Ubicacion</th>
				<th>Costo de adquisición</th>
				<th>Fecha de adquisición</th>
			</thead>";
	for ($i=0; $i < $numRow; $i++) {
		echo "<tr>" ;
		$row=pg_fetch_array($rs,$i);
		$cod_act= $row['cod_act'];
		$nom= $row['nom'];
		$mar= $row['mar'];
		$mod= $row['mod'];
		$ser= $row['ser'];
		$ubi= $row['ubi'];
		$cos_adq= $row['cos_adq'];
		$fec_adq= $row['fec_adq'];
		echo "<td>".$cod_act."</td>";
		echo "<td>".$nom."</td>";
		echo "<td>".$mar."</td>";
		echo "<td>".$mod."</td>";
		echo "<td>".$ser."</td>";
		echo "<td>".$ubi."</td>";
		echo "<td>".$cos_adq."</td>";
		echo "<td>".$fec_adq."</td>";
		echo "</tr>";
	}

echo "
		</table>
	</form>
</body>
</html>";
}	
?>