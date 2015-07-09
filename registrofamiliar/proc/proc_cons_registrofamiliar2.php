<?php 
include('./../../php/conexion.php');
$conn=conectar();
switch ($_POST['opcion']) {

	case 'nc':
	nacimientos();
	break;

	case 'et':
	muertes();
	break;

	case 'mt':
	matrimonio();
	//$sql="SELECT EXTRACT(YEAR FROM fec_mat) as fecha,count(*) as total FROM rf_matrimonio_partida where   EXTRACT(YEAR FROM fec_mat) between '$_POST[inicio]' and '$_POST[fin]' group by EXTRACT(YEAR FROM fec_mat)";
	//enviarDatos($sql);
	break;

	case 'po':
	personas();
	break;


	
}

function enviarDatos($consulta){

	$sth=pg_query($consulta) or die("Error en la busqueda");
	$rows = array();
		//flag is not needed
	$flag = true;
	$table = array();
	$table['cols'] = array(
		array('label' => 'fecha', 'type' => 'string'),
		array('label' => 'total', 'type' => 'number')
		
		
		);

	$rows = array();
	while($r = pg_fetch_assoc($sth)) {
		$temp = array();
		$temp[] = array('v' => (string) $r['fecha']); 
		$temp[] = array('v' => (int) $r['total']);
	
		$rows[] = array('c' => $temp);
	}

	$table['rows'] = $rows;
	$jsonTable = json_encode($table);

	
	echo $jsonTable;
	
}

function nacimientos(){
	$table = array();
	$rows = array();
	$table['cols'] = array(
		array('label' => 'Fecha', 'type' => 'string'),
		array('label' => 'Masculino', 'type' => 'number'),
		array('label' => 'Femenino', 'type' => 'number')
		);

	
	
	for ($i=$_POST[inicio]; $i <=$_POST[fin] ; $i++) { 
	$row = array();
	$row[] = array('v' => $i);
		$masculino=0;
		$sth=pg_query("SELECT EXTRACT(YEAR FROM fec_nac) as fecha, COUNT(sex) as masculino 
			FROM rf_nacimiento_partida WHERE sex like 'M' and EXTRACT(YEAR FROM fec_nac) = $i 
			group by  EXTRACT(YEAR FROM fec_nac)") 
		or die("Error en la busqueda");
		
		while($r = pg_fetch_assoc($sth)) {
			
			$masculino=$r['masculino'];

			
		}
		$row[] = array('v' => $masculino);
		$femenino=0;
		$sth=pg_query("SELECT EXTRACT(YEAR FROM fec_nac) as fecha, COUNT(sex) as femenino 
			FROM rf_nacimiento_partida WHERE sex like 'F' and EXTRACT(YEAR FROM fec_nac) = $i 
			group by  EXTRACT(YEAR FROM fec_nac)") 
		or die("Error en la busqueda");
		
		while($r = pg_fetch_assoc($sth)) {
			
			$femenino=$r['femenino'];
			
		}
		$row[] = array('v' => $femenino);
		$rows[] = array('c' => $row);
	}
	$table['rows'] = $rows;
	$jsonTable = json_encode($table);
	echo $jsonTable;
}
function muertes(){
	$table = array();
	$rows = array();
	$table['cols'] = array(
		array('label' => 'Fecha', 'type' => 'string'),
		array('label' => 'Masculino', 'type' => 'number'),
		array('label' => 'Femenino', 'type' => 'number')
		);

	
	
	for ($i=$_POST[inicio]; $i <=$_POST[fin] ; $i++) { 
	$row = array();
	$row[] = array('v' => $i);
		$masculino=0;
		$sth=pg_query("SELECT EXTRACT(YEAR FROM fec_def) as fecha, COUNT(sex) as masculino 
			FROM rf_defuncion_partida WHERE sex like 'M' and EXTRACT(YEAR FROM fec_def) = $i 
			group by  EXTRACT(YEAR FROM fec_def)") 
		or die("Error en la busqueda");
		
		while($r = pg_fetch_assoc($sth)) {
			
			$masculino=$r['masculino'];

			
		}
		$row[] = array('v' => $masculino);
		$femenino=0;
		$sth=pg_query("SELECT EXTRACT(YEAR FROM fec_def) as fecha, COUNT(sex) as femenino 
			FROM rf_defuncion_partida WHERE sex like 'F' and EXTRACT(YEAR FROM fec_def) = $i 
			group by  EXTRACT(YEAR FROM fec_def)") 
		or die("Error en la busqueda");
		
		while($r = pg_fetch_assoc($sth)) {
			
			$femenino=$r['femenino'];
			
		}
		$row[] = array('v' => $femenino);
		$rows[] = array('c' => $row);
	}
	$table['rows'] = $rows;
	$jsonTable = json_encode($table);
	echo $jsonTable;
}


function matrimonio(){
	$table = array();
	$rows = array();
	$table['cols'] = array(
		array('label' => 'fecha', 'type' => 'string'),
		array('label' => 'Matrimonio', 'type' => 'number'),
		array('label' => 'Divorcio', 'type' => 'number')
		);

	
	
	for ($i=$_POST[inicio]; $i <=$_POST[fin] ; $i++) { 
	$row = array();
	$row[] = array('v' => $i);
		$matrimonio=0;
		$sth=pg_query("SELECT EXTRACT(YEAR FROM fec_mat) as fecha, count(*) as Matrimonio 
			FROM rf_matrimonio_partida WHERE  EXTRACT(YEAR FROM fec_mat) = $i 
			group by  EXTRACT(YEAR FROM fec_mat)") 
		or die("Error en la busqueda");
		
		while($r = pg_fetch_assoc($sth)) {
			
			$matrimonio=$r['Matrimonio'];

			
		}
		$row[] = array('v' => $matrimonio);
		$divorcio=0;
		$sth=pg_query("SELECT EXTRACT(YEAR FROM fec_div) as fecha, count(*) as Divorcio 
			FROM rf_divorcio_partida WHERE  EXTRACT(YEAR FROM fec_div) = $i 
			group by  EXTRACT(YEAR FROM fec_div)") 
		or die("Error en la busqueda");
		
		while($r = pg_fetch_assoc($sth)) {
			
			$divorcio=$r['Divorcio'];
			
		}
		$row[] = array('v' => $divorcio);
		$rows[] = array('c' => $row);
	}
	$table['rows'] = $rows;
	$jsonTable = json_encode($table);
	echo $jsonTable;
}




function personas(){
	$table = array();
	$rows = array();
	$table['cols'] = array(
		array('label' => 'Fecha', 'type' => 'string'),
		array('label' => 'Masculino', 'type' => 'number'),
		array('label' => 'Femenino', 'type' => 'number')
		);

	
	
	for ($i=$_POST[inicio]; $i <=$_POST[fin] ; $i++) { 
	$row = array();
	$row[] = array('v' => $i);
		$masculino=0;
		$sth=pg_query("SELECT EXTRACT(YEAR FROM fec_nac) as fecha, COUNT(sex) as masculino 
			FROM rf_persona WHERE sex like 'M' and EXTRACT(YEAR FROM fec_nac) = $i 
			group by  EXTRACT(YEAR FROM fec_nac)") 
		or die("Error en la busqueda");
		
		while($r = pg_fetch_assoc($sth)) {
			
			$masculino=$r['masculino'];

			
		}
		$row[] = array('v' => $masculino);
		$femenino=0;
		$sth=pg_query("SELECT EXTRACT(YEAR FROM fec_nac) as fecha, COUNT(sex) as femenino 
			FROM rf_persona WHERE sex like 'F' and EXTRACT(YEAR FROM fec_nac) = $i 
			group by  EXTRACT(YEAR FROM fec_nac)") 
		or die("Error en la busqueda");
		
		while($r = pg_fetch_assoc($sth)) {
			
			$femenino=$r['femenino'];
			
		}
		$row[] = array('v' => $femenino);
		$rows[] = array('c' => $row);
	}
	$table['rows'] = $rows;
	$jsonTable = json_encode($table);
	echo $jsonTable;
}
?>