<?php
	include ('../php/conexion.php');
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
	for ($i=0; $i < $numRow; $i++) {
		$row=pg_fetch_array($rs,$i);
		$cod_act= $row['cod_act'];
		$nom= $row['nom'];

	}

echo "<!DOCTYPE html>
<html lang='es'>
	<head>
		<meta charset='UTF-8'>
		<title>Registro de activo</title>
		<link rel='stylesheet' href='./../css/bootstrap.css'>
	</head>
	<body>
		<form action='proc_bus_mantenimiento.php' method='POST' class='well form-search' style='background-color: transparent;'>
			  		<legend>Buscar Activo</legend>
			  		<div class='control-group'>
		  				<strong>Buscar por:</strong>
		  				<label class='radio'><input type='radio' name='buspor' value='Código'>Código</label>
			  			<label class='radio'><input type='radio' name='buspor' value='Nombre' checked>Nombre</label>
			  		</div>
			  		<input type='text' class='input-xlarge search-query' name='bus_act' id='bus_act'/>
			  		<button type='submit' class='btn btn-info'><i class='icon-search'></i> Buscar</button>
				</form>
		<form action='proc_nuevo_mantenimiento.php' method='post' id='form_mantenimiento' class='well form-horizontal'>
				<legend>Mantenimiento</legend>

				<div class='control-group'>
					<label for='cod_act' class='control-label'>Codigo</label>
					<div class='controls'>
						<input type='text' name='cod_act' value='".$cod_act."'/>
					</div>
				</div>

				<div class='control-group'>
					<label for='nom_act' class='control-label'>Nombre</label>
					<div class='controls'>
						<input type='text' name='act' value='".$nom."'/>
					</div>
				</div>

				<div class='control-group'>
					<label for='fec' class='control-label'>Fecha</label>
					<div class='controls'>
						<input type='date' id='fec' name='fec' value='".date('Y-m-d')."'/>
					</div>
				</div>

				<div class='control-group'>
					<label for='descripcion' class='control-label'>Descripción</label>
					<div class='controls'>
						<textarea name='des' cols='30' rows='5'></textarea>	
					</div>
				</div>

				<div class='control-group'>
					<label for='appendedPrependedInput' class='control-label'>Costo</label>
					<div class='controls'>
					<div class='input-prepend input-append'>	
						<span class='add-on'>$</span>
						<input class='span2' type='text' name='cos'/>
					</div>
					</div>
				</div>

				<div class='control-group'>
					<label for='empresa' class='control-label'>Empresa</label>
					<div class='controls'>
						<input type='text' name='emp'/>
					</div>
				</div>

				<div class='form-actions'>
					<button type='submit' class='btn btn-primary' name='guardar'>Guardar</button>
					<button type='reset' class='btn' name='limpiar' id='limpiar'>Limpiar</button>
					<button type='button' class='btn' name='cancelar' id='cancelar'>Cancelar</button>
				</div>
		</form>
	</body>
</html>";

	}
?>