<?php
	include ("../php/conexion.php");
	$conn=conectar();
	$sql="";
	if ($_POST[buspor]=="Nombre") {
		$sql="SELECT a.nom,m.* FROM af_mantenimiento m inner join af_activo a on a.cod_act=m.cod_act WHERE a.nom='$_POST[bus_act]' and a.act='1' order by m.fec";
	}else{
		$sql="SELECT a.nom,m.* FROM af_mantenimiento m inner join af_activo a on a.cod_act=m.cod_act WHERE m.cod_act='$_POST[bus_act]' and a.act='1' order by m.fec";
	}
	$rs=pg_query($sql) or die("Error en la busqueda");
	if($rs){
	$numRow=pg_num_rows($rs);
	
	pg_close($conn);
}
?>

<!DOCTYPE html>
<html lang='es'>
	<head>
		<meta charset='UTF-8'>
		<title>Registro de activo</title>
		<link rel='stylesheet' href='./../css/bootstrap.css'>
		<link rel="stylesheet" href="./../css/retoques.css">
		<script>
			function mandar(cod_man,cod_act,nom,cos,fec,des,emp){
				document.getElementById('cod_man').value=cod_man;
				document.getElementById('cod_act').value=cod_act;
				document.getElementById('act').value=nom;
				document.getElementById('fec').value=fec;
				document.getElementById('cos').value=cos;
				document.getElementById('des').value=des;
				document.getElementById('emp').value=emp;
			}
		</script>
	</head>
	<body>

		
		<form action='bus_act_mantenimiento.php' method='POST' class='well form-search' style='background-color: transparent;'>
			  		<legend>Buscar Activo</legend>
			  		<div class='control-group'>
		  				<strong>Buscar por:</strong>
		  				<label class='radio'><input type='radio' name='buspor' value='Código'>Código</label>
			  			<label class='radio'><input type='radio' name='buspor' value='Nombre' checked/>Nombre</label>
			  		</div>
			  		<input type='text' class='input-xlarge search-query' name='bus_act' id='bus_act'/>
			  		<button type='submit' class='btn btn-info'><i class='icon-search'></i> Buscar</button>
		</form>
		
		<div class='row-fluid span12'>
		<div class='span5'>
		<form action='bus_act_mantenimiento.php' method='POST' class='well form-search' style='background-color: transparent;'>
			<legend>Activos Encontrados:</legend>
				<div style="height:525px;overflow:scroll;">
		  			<table class='table table-bordered'>
		  				<thead>
		  				<th>Codigo</th>
		  				<th>Nombre</th>
		  				<th>Fecha</th>
		  				<th>Empresa</th>
		  				</thead>
					<?php
		  				for ($i=0; $i < $numRow; $i++) {
		  					$row=pg_fetch_array($rs,$i);
		  					$cod_man=$row['cod_man'];
							$cod_act= $row['cod_act'];
							$nom= $row['nom'];
							$cos=$row['cos'];
							$des=$row['des'];
							$emp=$row['emp'];
							$fec=$row['fec'];
							echo "<tr Onclick=\"mandar('".$cod_man."','".$cod_act."','".$nom."','".$cos."','".$fec."','".$des."','".$emp."')\">";
							echo "<td>".$cod_act."</td>";
							echo "<td>".$nom."</td>";
							echo "<td>".$fec."</td>";
							echo "<td>".$emp."</td>";																		
							echo "</tr>";
						}
		  				?>
		  			</table>
			  	</div>
		</form>
		</div>
		<div class='span6'>
		<form action='proc_act_mantenimiento.php' method='post' id='form_mantenimiento' class='well form-horizontal'>
				<legend>Mantenimiento</legend>

				

				<div class='control-group'>
					<label for='cod_act' class='control-label'>Codigo</label>
					<div class='controls'>
						<input type='text' name='cod_act' id='cod_act' value=''/>
						<input type='hidden' name='cod_man' id='cod_man' value=''/>
					</div>
				</div>

				<div class='control-group'>
					<label for='nom_act' class='control-label'>Nombre</label>
					<div class='controls'>
						<input type='text' name='act' id='act' value=''/>
					</div>
				</div>

				<div class='control-group'>
					<label for='fec' class='control-label'>Fecha</label>
					<div class='controls'>
						<input type='date' id='fec' name='fec'/>
					</div>
				</div>

				<div class='control-group'>
					<label for='descripcion' class='control-label'>Descripción</label>
					<div class='controls'>
						<textarea name='des' id='des' cols='30' rows='5'></textarea>	
					</div>
				</div>

				<div class='control-group'>
					<label for='appendedPrependedInput' class='control-label'>Costo</label>
					<div class='controls'>
					<div class='input-prepend input-append'>	
						<span class='add-on'>$</span>
						<input class='span4' type='text' name='cos' id='cos'/>
					</div>
					</div>
				</div>

				<div class='control-group'>
					<label for='empresa' class='control-label'>Empresa</label>
					<div class='controls'>
						<input type='text' name='emp' id='emp'/>
					</div>
				</div>

				<div class='form-actions' style="padding-left: 120px;">
					<button type='submit' class='btn btn-primary' name='guardar'>Guardar</button>
					<button type='reset' class='btn' name='limpiar' id='limpiar'>Limpiar</button>
					<button type='button' class='btn' name='cancelar' id='cancelar'>Cancelar</button>
				</div>
		</form>
	</div>
	
	</div>
	</body>
</html>