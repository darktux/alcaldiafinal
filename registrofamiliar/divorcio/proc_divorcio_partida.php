<?php	
session_start();
require_once("../../php/conexion.php");
$conexion = conectar();

if($_POST["nom"]== "" and $_POST["accion"] != "guardar-divorcio-partida"){
	echo 	"<script type='text/javascript'>
			alert('Ingrese un parámetro de búsqueda XD');
			</script>";
}

elseif($_POST["accion"] == "guardar-divorcio-partida"){
	guardarDivorcioPartida();
}

elseif($_POST["accion"] == "buscar-esposo"){
	buscarEsposo();
}

elseif($_POST["accion"] == "buscar-esposa"){
	buscarEsposa();
}

/* ==================================================================================================== *
 * ==================================================================================================== *
 * Definicion de las funciones utilizadas en este script
 * ==================================================================================================== *
 * ==================================================================================================== */

/* ================================================== *
 * Función guardarDivorcioPartida()
 * Busca datos de un registro en la tabla rf_persona
 * ================================================== */

function guardarDivorcioPartida(){
	
			if($_POST["cod_eso"] == "")
				$_POST[cod_eso] = "null";
		
			if($_POST["cod_esa"] == "")
				$_POST[cod_esa] = "null";

			$consulta = "INSERT INTO rf_divorcio_partida (" .
			"ano_lib, num_lib, num_tom, num_pag, num_par, cod_eso, cod_esa, nom_eso, ape1_eso, ape2_eso, nom_esa, ape1_esa, ape2_esa, fec_div, cue, esc_lib" .
			") VALUES ('$_POST[ano_lib]', '$_POST[num_lib]', '$_POST[num_tom]', '$_POST[num_pag]', '$_POST[num_par]', $_POST[cod_eso], $_POST[cod_esa], '$_POST[nom_eso]', '$_POST[ape1_eso]', '$_POST[ape2_eso]', '$_POST[nom_esa]', '$_POST[ape1_esa]', '$_POST[ape2_esa]', '$_POST[fec_div]', '$_POST[cue]', '$_POST[esc_lib]')";
			if(pg_query($consulta))
			{
				pg_query("INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Registró partida de divorcio',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				echo 	"<script type='text/javascript'>" .
						"alert('Guardado exitosamente');" .
						"parent.centro.location.href='form_divorcio_digestyc.php?num_lib=" . $_POST[num_lib] . "&num_par=" . $_POST[num_par] . "&cod_eso=" . $_POST[cod_eso] . "&cod_esa=" . $_POST[cod_esa] . "#'" .
						"</script>";
			}
			else
			{
				//echo $consulta;
				echo	"<script type='text/javascript'>" .
						"alert('Error al guardar');" .
						"</script>";
			}
}	

/* ================================================== *
 * Función buscarEsposo()
 * Busca datos de un registro en la tabla rf_persona
 * ================================================== */

function buscarEsposo(){
	echo "<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Fecha de nacimiento</th>
				<th>Número de DUI</th>
				<th>Seleccionar</th>
			</tr>
		</thead>
		<tbody>";
	
	$consulta = "SELECT * FROM rf_persona WHERE sex = 'M' and (nom ilike '%$_POST[nom]%' or ape1 ilike '%$_POST[nom]%' or ape2 ilike '%$_POST[nom]%')";
	$resultado = pg_query($consulta);
	
	while($registro = pg_fetch_array($resultado)) {
		$registros[] = $registro;
	}
	
	foreach($registros as $registro){
		foreach($registro as $clave => $valor){
			if(is_string($x = $clave)){
				$fila[$clave] = $valor;
			}
		}
		list($ano, $mes, $dia) = explode("-", $fila[fec_nac]);
		$fila[fec_for] = $dia . "-" . $mes . "-" . $ano;
		$fila[nom_com] = $fila[nom] . " " . $fila[ape1] . " " . $fila[ape2];
		
		echo "<tr>
				<td>$fila[nom_com]</<td>
				<td>$fila[fec_for]</td>
				<td>$fila[dui]</td>
				<td><button class='btn' name='seleccionar' id='seleccionar' onclick='cargarEsposo(" . json_encode($fila) . ");' data-dismiss='modal' ><i class='icon-ok'></i></button></td>	
			</tr>";
	}
	if(!is_array($fila)){
		echo 	"<script type='text/javascript'>
				alert('No encontrado');
				</script>";
	}
}

/* ================================================== *
 * Función buscarEsposa()
 * Busca datos de un registro en la tabla rf_persona
 * ================================================== */

function buscarEsposa(){
	echo "<table class='table table-bordered'>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Fecha de nacimiento</th>
				<th>Número de DUI</th>
				<th>Seleccionar</th>
			</tr>
		</thead>
		<tbody>";
	
	$consulta = "SELECT * FROM rf_persona WHERE sex = 'F' and (nom ilike '%$_POST[nom]%' or ape1 ilike '%$_POST[nom]%' or ape2 ilike '%$_POST[nom]%')";
	$resultado = pg_query($consulta);
	
	while($registro = pg_fetch_array($resultado)) {
		$registros[] = $registro;
	}
	
	foreach($registros as $registro){
		foreach($registro as $clave => $valor){
			if(is_string($x = $clave)){
				$fila[$clave] = $valor;
			}
		}
		list($ano, $mes, $dia) = explode("-", $fila[fec_nac]);
		$fila[fec_for] = $dia . "-" . $mes . "-" . $ano;
		$fila[nom_com] = $fila[nom] . " " . $fila[ape1] . " " . $fila[ape2];
		
		echo "<tr>
				<td>$fila[nom_com]</<td>
				<td>$fila[fec_for]</td>
				<td>$fila[dui]</td>
				<td><button class='btn' name='seleccionar' id='seleccionar' onclick='cargarEsposa(" . json_encode($fila) . ");' data-dismiss='modal' ><i class='icon-ok'></i></button></td>	
			</tr>";
	}
	if(!is_array($fila)){
		echo 	"<script type='text/javascript'>
				alert('No encontrado');
				</script>";
	}
}

?>