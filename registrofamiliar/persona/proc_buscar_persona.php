<?php
	require_once("../conexion/conexion.php");
	require_once("clas_persona.php");
	
	$persona = new Persona();
	$tablaPersona = $persona->buscarPorNombre($_POST["nom"]);
?>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Fecha de nacimiento</th>
				<th>Seleccionar</th>
			</tr>
		</thead>
		<tbody>
<?php
	foreach ($tablaPersona as $filaPersona){
		foreach($filaPersona as $clave => $valor){
			if(is_string($x = $clave)){
				$$clave = $valor;
			}
		}
		
		$objetoPersona ="{cod_per: '" . $cod_per . "', nom: '" . $nom . "', ape1: '" . $ape1 . "', ape2: '" . $ape2 . "', sex: '" . $sex . "', fec_nac: '" . $fec_nac . "', dui: '" . $dui . "', nit: '" . $nit . "', tel1: '" . $tel1 . "', tel2: '" . $tel2 . "', dir: '" . $dir . "', ocu: '" . $ocu . "'}";
		
?>
			<tr>
				<td><?php echo $nom . " " . $ape1 . " " . $ape2; ?></<td>
				<td><?php echo $filaPersona["fec_nac"]; ?></td>
				<td><button class="btn" name="seleccionar" id="seleccionar" onclick="recargar(<?php echo $objetoPersona; ?>);" data-dismiss="modal" ><i class="icon-ok"></i></button></td>
			</tr>
<?php
	}
?>
		</tbody>
	</table>