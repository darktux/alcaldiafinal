<?php 
	include('./../../php/conexion.php');
	$conn=conectar();
	switch ($_POST['opcion']) {
		case 'pe':
			$sql="SELECT fec_ent as texto,count(*) as total FROM ca_enterrado group by fec_ent";
			enviarDatos($sql);
		break;
		
		case 'ne':
			$sql="SELECT date_part('year',fec_ins) as texto,count(*) as total FROM ca_negocio group by date_part('year',fec_ins)";
			enviarDatos($sql);
		break;
		
		case 'in':
			$sql="SELECT date_part('year',fec_ins) as texto,count(*) as total FROM ca_inmueble group by date_part('year',fec_ins)";
			enviarDatos($sql);
		break;

		case 'al':
			$sql="SELECT alum_mun as texto,count(*) as total FROM ca_alumbrado group by alum_mun";
			enviarDatos($sql);
		break;
	}

	function enviarDatos($consulta){
	 	$sth=pg_query($consulta) or die("Error en la busqueda");
	 	$rows = array();
		//flag is not needed
		$flag = true;
		$table = array();
		$table['cols'] = array(
		    array('label' => 'texto', 'type' => 'string'),
		    array('label' => 'total', 'type' => 'number')
		);
		 
		$rows = array();
		while($r = pg_fetch_assoc($sth)) {
		    $temp = array();
		    // the following line will be used to slice the Pie chart
		    $temp[] = array('v' => (string) $r['texto']); 
		 
		    // Values of each slice
		    $temp[] = array('v' => (int) $r['total']);
		    $rows[] = array('c' => $temp);
		}
		 
		$table['rows'] = $rows;
		$jsonTable = json_encode($table);
		echo $jsonTable;

	}
?>