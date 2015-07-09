<?php  
	include ("../php/conexion.php");
	$conn=conectar();
	$sql="";
	if ($_POST[buspor]=="Nombre") {
		$sql="SELECT * FROM af_activo WHERE nom='$_POST[bus_act]'";
	}else{
		$sql="SELECT * FROM af_activo WHERE cod_act='$_POST[bus_act]'";
	}
	$rs=pg_query($sql) or die("Error en la busqueda");
	$numRow=pg_num_rows($rs);
	for ($i=0; $i < $numRow; $i++) { 
		$row=pg_fetch_array($rs,$i);
		$cod_act= $row['cod_act'];
		$nom= $row['nom'];
		$mar= $row['mar'];
		$mod= $row['mod'];
		$ser= $row['ser'];
		$ubi= $row['ubi'];
		$cos_adq= $row['cos_adq'];
		$fec_adq= $row['fec_adq'];
	}
	pg_close($conn);
	echo "
<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset='UTF-8'>
	<title>Modificar activo</title>
	<link rel='stylesheet' href='./../css/bootstrap.css'>
</head>
<body>
	<form action='proc_bus_activo.php' method='POST' class='well form-search' style='background-color: transparent;'>
		  <legend>Buscar Activo</legend>
		  <div class='control-group'>
		  	<strong>Buscar por:</strong>
		  	<label class='radio'><input type='radio' name='buspor' value='Código'>Código</label>
		  	<label class='radio'><input type='radio' name='buspor' value='Nombre' checked>Nombre</label>
		  </div>
		  <input type='text' class='input-xlarge search-query' name='bus_act' id='bus_act'>
		  <button type='submit' class='btn btn-info'><i class='icon-search'></i> Buscar</button>
	</form>
<form action='proc_act_activo.php' method='POST' class='well form-horizontal'>
			<legend>Modificar datos de Activos</legend>

			<div class='control-group'>
				<label for='codigo' class='control-label'>Código</label>
				<div class='controls'>
					<input type='text' name='cod_act' id='cod_act' value='".$cod_act."' readonly>
				</div>
			</div>

			<div class='control-group'>
				<label for='nombre' class='control-label'>Nombre</label>
				<div class='controls'>
					<input type='text' name='nom' value='".$nom."'>
				</div>
			</div>

			<div class='control-group'>
				<label for='mar' class='control-label'>Marca</label>
				<div class='controls'>
					<input type='text' id='mar' name='mar' value='".$mar."'>
				</div>
			</div>

			<div class='control-group'>
				<label for='mod' class='control-label'>Modelo</label>
				<div class='controls'>
					<input type='text' id='mod' name='mod' value='".$mod."'>
				</div>
			</div>

			<div class='control-group'>
				<label for='ser' class='control-label'>Serie</label>
				<div class='controls'>
					<input type='text' id='ser' name='ser' value='".$ser."'>
				</div>
			</div>

			<div class='control-group'>
				<label for='costo' class='control-label'>Costo de adquisición</label>
				<div class='controls'>
					<input type='text' name='cos_adq' value='".$cos_adq."'>
				</div>
			</div>

			<div class='control-group'>
				<label for='fecha' class='control-label'>Fecha de adquisición</label>
				<div class='controls'>
					<input type='date' name='fec_adq' value='".$fec_adq."'>
				</div>
			</div>

			<div class='form-actions'>
				<button type='submit' class='btn btn-primary' name='modificar'>Modificar</button>			
				<button type='reset' class='btn' name='limpiar' id='limpiar'>Limpiar</button>
				<button type='button' class='btn' name='cancelar' id='cancelar'>Cancelar</button>		
			</div>
	</form>
	</body>
</html>
	";
?>