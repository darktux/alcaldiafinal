<?php
session_start();
require_once("../../php/conexion.php");
$conexion = conectar();
$conn=conectar();

if($_POST["nom"]== "" and $_POST["accion"] != "guardar-nacimiento-partida"){
	echo 	"<script type='text/javascript'>
			alert('Ingrese un parámetro de búsqueda');
			</script>";
}

elseif($_POST["accion"] == "guardar-nacimiento-partida") {
	guardarNacimientoPartida();
}

elseif($_POST["accion"] == "buscar-padre"){
	buscarPadre();
}

elseif($_POST["accion"] == "buscar-madre") {
	buscarMadre();
}

elseif($_POST["accion"] == "buscar-informante"){
	buscarInformante();
}

elseif($_POST["accion"] == "buscar-testigo1"){
	buscarTestigo1();
}

elseif($_POST["accion"] == "buscar-testigo2") {
	buscarTestigo2();
}

/* ==================================================================================================== *
 * ==================================================================================================== *
 * Definicion de las funciones utilizadas en este script
 * ==================================================================================================== *
 * ==================================================================================================== */

/* ================================================== *
 * Función GuardarNacimientoPartida()
 * Busca datos de un registro en la tabla rf_persona
 * ================================================== */

function guardarNacimientoPartida(){
	if($_POST["cod_mad"] == "")
		$_POST[cod_mad] = "null";
		
	if($_POST["cod_pad"] == "")
		$_POST[cod_pad] = "null";

	if($_POST["cod_inf"] == "")
		$_POST[cod_inf] = "null";
		
	if($_POST["cod_tes1"] == "")
		$_POST[cod_tes1] = "null";
		
	if($_POST["cod_tes2"] == "")
		$_POST[cod_tes2] = "null";

	//Verificar si ya ha sido registrado como persona
	$consulta = "SELECT cod_per FROM rf_persona WHERE (nom, ape1, ape2, fec_nac) = ('$_POST[nom]', '$_POST[ape1_pad]', '$_POST[ape1_mad]', '$_POST[fec_nac]')";
	$resultado = pg_query($consulta);
	$fila = pg_fetch_array($resultado);
	
	if ($fila[cod_per]== null) {
		//Registrar primero los datos del registrado como persona
		$consulta = "INSERT INTO rf_persona (nom, ape1, ape2, sex, fec_nac, dep, mun
		) VALUES ('$_POST[nom]', '$_POST[ape1_pad]', '$_POST[ape1_mad]', '$_POST[sex]', '$_POST[fec_nac]', '$_POST[dep_nac]', '$_POST[mun_nac]'
		)";
	
		pg_query($consulta);
	}

	//Obtener el codigo de persona del recien registrado
	$consulta = "SELECT cod_per FROM rf_persona WHERE (nom, ape1, ape2, fec_nac) = ('$_POST[nom]', '$_POST[ape1_pad]', '$_POST[ape1_mad]', '$_POST[fec_nac]')";
	
	$resultado = pg_query($consulta);
	$fila = pg_fetch_array($resultado);
	$_POST[cod_per] = $fila[cod_per];

	if ($_POST[fec_vir_ase] == "") {
		$_POST[fec_vir_ase] = "null";
	}else{
		$_POST[fec_vir_ase] = "'$_POST[fec_vir_ase]'";
	}
	
	$consulta = "INSERT INTO rf_nacimiento_partida (num_lib, ano_lib, num_tom, num_pag, num_par, nom, sex, lug_nac, dep_nac, 
	mun_nac, fec_nac, hor_min, nom_mad, ape1_mad, ape2_mad, eda_mad, ocu_mad, dep_ori_mad, mun_ori_mad, dep_res_mad, 
	mun_res_mad, nac_mad, doc_mad, num_doc_mad, nom_pad, ape1_pad, ape2_pad, eda_pad, ocu_pad, dep_ori_pad, mun_ori_pad, 
	dep_res_pad, mun_res_pad, nac_pad, doc_pad, num_doc_pad, nom_inf, ape1_inf, ape2_inf, doc_inf, num_doc_inf, par_inf, 
	fir, ded, man, vir_ase, fec_vir_ase, dec_tes, nom_tes1, ape1_tes1, ape2_tes1, doc_tes1, num_doc_tes1, nom_tes2, ape1_tes2, ape2_tes2, doc_tes2, num_doc_tes2, 
	nom_reg, fec, esc_lib, cod_per, cod_mad, cod_pad, cod_inf, cod_tes1, cod_tes2) 
	VALUES ('$_POST[num_lib]', '$_POST[ano_lib]', '$_POST[num_tom]', '$_POST[num_pag]', '$_POST[num_par]', '$_POST[nom]', '$_POST[sex]', 
	'$_POST[lug_nac]', '$_POST[dep_nac]', '$_POST[mun_nac]', '$_POST[fec_nac]', '$_POST[hor_min]', '$_POST[nom_mad]', '$_POST[ape1_mad]', 
	'$_POST[ape2_mad]', '$_POST[eda_mad]', '$_POST[ocu_mad]', '$_POST[dep_ori_mad]', '$_POST[mun_ori_mad]', 
	'$_POST[dep_res_mad]', '$_POST[mun_res_mad]', '$_POST[nac_mad]', '$_POST[doc_mad]', '$_POST[num_doc_mad]', 
	'$_POST[nom_pad]', '$_POST[ape1_pad]', '$_POST[ape2_pad]', '$_POST[eda_pad]', '$_POST[ocu_pad]', 
	'$_POST[dep_ori_pad]', '$_POST[mun_ori_pad]', '$_POST[dep_res_pad]', '$_POST[mun_res_pad]', '$_POST[nac_pad]', 
	'$_POST[doc_pad]', '$_POST[num_doc_pad]', '$_POST[nom_inf]', '$_POST[ape1_inf]', '$_POST[ape2_inf]', 
	'$_POST[doc_inf]', '$_POST[num_doc_inf]', '$_POST[par_inf]', '$_POST[fir]', '$_POST[ded]', '$_POST[man]', 
	'$_POST[vir_ase]', $_POST[fec_vir_ase], '$_POST[dec_tes]', '$_POST[nom_tes1]', '$_POST[ape1_tes1]', 
	'$_POST[ape2_tes1]', '$_POST[doc_tes1]', '$_POST[num_doc_tes1]', '$_POST[nom_tes2]', '$_POST[ape1_tes2]', 
	'$_POST[ape2_tes2]', '$_POST[doc_tes2]', '$_POST[num_doc_tes2]', '$_POST[nom_reg]', '$_POST[fec]', 
	'$_POST[esc_lib]', $_POST[cod_per], $_POST[cod_mad], $_POST[cod_pad], $_POST[cod_inf], $_POST[cod_tes1], 
	$_POST[cod_tes2])";

	//echo $consulta;

	if(pg_query($consulta)){
		//echo "INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Registró partida de nacimiento',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)";
		pg_query("INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Registró partida de nacimiento',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
		echo "<script type='text/javascript'>" .
			 "alert('Guardado exitosamente');" .
			 "window.open('../reportes/formulario_nacimiento_partida.php?num_lib=" . $_POST[num_lib] . "&num_par=" . $_POST[num_par] . "', '_blank');" .
			 "parent.centro.location.href='form_nacimiento_digestyc.php?num_lib=" . $_POST[num_lib] . "&num_par=" . $_POST[num_par] . "&cod_per=" . $_POST[cod_per] . "#'" .
			 "</script>";
	}
	else{
		echo "<script type='text/javascript'>" .
			 "alert('Error al guardar');" .
			 "</script>";
	}
}

/* ================================================== *
 * Función buscarPadre()
 * Busca datos de un registro en la tabla rf_persona
 * ================================================== */

function buscarPadre(){
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
	
	// Si hay almenos un registro, extraerlo, si no mandar mensaje de alerta
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
					<td><button class='btn' name='seleccionar' id='seleccionar' onclick='cargarPadre(" . json_encode($fila) . ");' data-dismiss='modal' ><i class='icon-ok'></i></button></td>	
				</tr>";
		}
	} else {
		echo 	"<script type='text/javascript'>
				alert('No encontrado');
				</script>";
	}
}

/* ================================================== *
 * Función buscarMadre()
 * Busca datos de un registro en la tabla rf_persona
 * ================================================== */

function buscarMadre(){
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
	
	// Si hay almenos un registro, extraerlo, si no mandar mensaje de alerta
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
					<td><button class='btn' name='seleccionar' id='seleccionar' onclick='cargarMadre(" . json_encode($fila) . ");' data-dismiss='modal' ><i class='icon-ok'></i></button></td>
				</tr>";
		}
	} else {
		echo 	"<script type='text/javascript'>
				alert('No encontrado');
				</script>";
	}

}

/* ================================================== *
 * Función buscarInformante()
 * Busca datos de un registro en la tabla rf_persona
 * ================================================== */

function buscarInformante(){
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
	
	$consulta = "SELECT * FROM rf_persona WHERE nom ilike '%$_POST[nom]%' or ape1 ilike '%$_POST[nom]%' or ape2 ilike '%$_POST[nom]%'";
	
	$resultado = pg_query($consulta);
	
	// Si hay almenos un registro, extraerlo, si no mandar mensaje de alerta
	if(pg_num_rows($resultado)>0){
		while($registro = pg_fetch_array($resultado)){
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
					<td><button class='btn' name='seleccionar' id='seleccionar' onclick='cargarInformante(" . json_encode($fila) . ");' data-dismiss='modal' ><i class='icon-ok'></i></button></td>
				</tr>";
		}
	} else {
		echo 	"<script type='text/javascript'>
				alert('No encontrado');
				</script>";
	}
}

/* ================================================== *
 * Función buscarTestigo1()
 * Busca datos de un registro en la tabla rf_persona
 * ================================================== */

function buscarTestigo1(){
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
	
	$consulta = "SELECT * FROM rf_persona WHERE nom ilike '%$_POST[nom]%' or ape1 ilike '%$_POST[nom]%' or ape2 ilike '%$_POST[nom]%'";
	
	$resultado = pg_query($consulta);
	
	// Si hay almenos un registro, extraerlo, si no mandar mensaje de alerta
	if(pg_num_rows($resultado)>0){
		while($registro = pg_fetch_array($resultado)){
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
					<td><button class='btn' name='seleccionar' id='seleccionar' onclick='cargarTestigo1(" . json_encode($fila) . ");' data-dismiss='modal' ><i class='icon-ok'></i></button></td>
				</tr>";
		}
	} else{
		echo 	"<script type='text/javascript'>
				alert('No encontrado');
				</script>";
	}

}

/* ================================================== *
 * Función buscarTestigo2()
 * Busca datos de un registro en la tabla rf_persona
 * ================================================== */
 
function buscarTestigo2(){
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
	
	$consulta = "SELECT * FROM rf_persona WHERE nom ilike '%$_POST[nom]%' or ape1 ilike '%$_POST[nom]%' or ape2 ilike '%$_POST[nom]%'";
	
	$resultado = pg_query($consulta);
	
	// Si hay almenos un registro, extraerlo, si no mandar mensaje de alerta
	if(pg_num_rows($resultado)>0){
		while($registro = pg_fetch_array($resultado)){
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
					<td><button class='btn' name='seleccionar' id='seleccionar' onclick='cargarTestigo2(" . json_encode($fila) . ");' data-dismiss='modal' ><i class='icon-ok'></i></button></td>
				</tr>";
		}
	} else {
		echo 	"<script type='text/javascript'>
				alert('No encontrado');
				</script>";
	}

}
?>