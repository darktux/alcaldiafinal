<?php
session_start();
require_once("../../php/conexion.php");
$conexion = conectar();

if($_POST["nom"]== "" and $_POST["accion"] != "guardar-defuncion-partida"){
	echo 	"<script type='text/javascript'>
			alert('Ingrese un parámetro de búsqueda');
			</script>";
}

elseif($_POST["accion"] == "guardar-defuncion-partida") {
	guardarDefuncionPartida();
}

elseif($_POST["accion"] == "buscar-difunto"){
	buscarDifunto();
}

/* ==================================================================================================== *
 * ==================================================================================================== *
 * Definicion de las funciones utilizadas en este script
 * ==================================================================================================== *
 * ==================================================================================================== */

/* ==================================================================================================== *
 * Función: guardarDefuncionPartida()
 * Guarda los datos de la partida de defuncion
 * ==================================================================================================== */

function guardarDefuncionPartida(){
	//####### Si no se eligio una persona registrada, se procede a registrar los datos del difunto como persona
	if($_POST[cod_per] == "" ){
		$consulta = "INSERT INTO rf_persona (nom, ape1, ape2, ocu, sex, dep, mun, dui
		) VALUES ('$_POST[nom]', '$_POST[ape1]', '$_POST[ape2]', '$_POST[ocu]', '$_POST[sex]', '$_POST[dep_res]', '$_POST[mun_res]', '$_POST[dui]'
		)";
		
		pg_query($consulta);
	
		//Obtener el codigo de persona del recien registrado
		$consulta = "SELECT cod_per FROM rf_persona WHERE (nom, ape1, ape2) = ('$_POST[nom]', '$_POST[ape1]', '$_POST[ape2]')";
	
		$resultado = pg_query($consulta);
		$fila = pg_fetch_array($resultado);
		$_POST[cod_per] = $fila[cod_per];
	}
	
	$consulta= "INSERT INTO rf_defuncion_partida(ano_lib, num_lib, num_tom, num_pag, num_par, cod_per, nom, ape1, ape2, 
	sex, eda, est_fam, nom_con, ocu, dep_org, mun_org, dep_res, mun_res, canlug_res, jur, nac, dui, dep_def, mun_def, 
	canlug_def, loc_def, fec_def, hor_min, asi_med, cau_def, nom_pro, car_pro, jvpm, nom_mad, nom_pad, cem, inf, dui_inf, 
	par_inf, nom_tes1, dui_tes1, nom_tes2, dui_tes2, fec_reg, enm, esc_lib) 
	VALUES ('$_POST[ano_lib]', '$_POST[num_lib]', '$_POST[num_tom]', '$_POST[num_pag]', '$_POST[num_par]', 
	'$_POST[cod_per]', '$_POST[nom]', '$_POST[ape1]', '$_POST[ape2]', '$_POST[sex]', '$_POST[eda]', '$_POST[est_fam]', 
	'$_POST[nom_con]', '$_POST[ocu]', '$_POST[dep_org]', '$_POST[mun_org]', '$_POST[dep_res]', '$_POST[mun_res]', 
	'$_POST[canlug_res]', '$_POST[jur]', '$_POST[nac]', '$_POST[dui]', '$_POST[dep_def]', '$_POST[mun_def]', 
	'$_POST[canlug_def]', '$_POST[loc_def]', '$_POST[fec_def]', '$_POST[hor_min]', '$_POST[asi_med]', '$_POST[cau_def]', 
	'$_POST[nom_pro]', '$_POST[car_pro]', '$_POST[jvpm]', '$_POST[nom_mad]', '$_POST[nom_pad]', '$_POST[cem]', 
	'$_POST[inf]', '$_POST[dui_inf]', '$_POST[par_inf]', '$_POST[nom_tes1]', '$_POST[dui_tes1]', '$_POST[nom_tes2]', 
	'$_POST[dui_tes2]', 	'$_POST[fec_reg]', '$_POST[enm]', '$_POST[esc_lib]')";
			
	if(pg_query($consulta)){
		pg_query("INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Registró partida de defunción',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
		echo 	"<script type='text/javascript'>" .
				"alert('Guardado exitosamente');" .
				"parent.centro.location.href='form_defuncion_digestyc.php?num_lib=" . $_POST[num_lib] . "&num_par=" . $_POST[num_par] . "&cod_per=" . $_POST[cod_per] . "#'" .
				"</script>";
	}
	else{
		echo pg_last_error();
		echo	"<script type='text/javascript'>" .
				"alert('Error al guardar');" .
				"</script>";
	}
}

/* ================================================== *
 * Función buscarDifunto()
 * Busca datos de un registro en la tabla rf_persona
 * ================================================== */

function buscarDifunto(){
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
	
	$consulta = "SELECT * FROM rf_persona WHERE (nom ilike '%$_POST[nom]%' or ape1 ilike '%$_POST[nom]%' or ape2 ilike '%$_POST[nom]%')";
	
	$resultado = pg_query($consulta);
	
	if(pg_num_rows($resultado)>0){
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
					<td><button class='btn' name='seleccionar' id='seleccionar' onclick='cargarDifunto(" . json_encode($fila) . ");' data-dismiss='modal' ><i class='icon-ok'></i></button></td>	
				</tr>";
		}
	} else{
		echo 	"<script type='text/javascript'>
				alert('No encontrado');
				</script>";
	}
}
?>