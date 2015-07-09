<?php 
	include('./../../php/conexion.php');
	$conn=conectar();
	switch ($_POST['opcion']) {

		case 'nc':

			$sql="SELECT ano_lib,sex as texto,count(*) as total FROM rf_nacimiento_partida where ano_lib between '$_POST[inicio]' and '$_POST[fin]' group by  ano_lib,sex";
			
			enviarDatos($sql);
		break;
		
		case 'et':
			$sql="SELECT fec_ent as texto,count(*) as total FROM ca_enterrado group by fec_ent";
			enviarDatos($sql);
		break;

		case 'mt':
			$sql="SELECT fec_mat as texto,count(*) as total FROM rf_matrimonio_partida group by fec_mat";
			enviarDatos($sql);
		break;
		
		case 'po':
			$sql="SELECT sex as texto,count(*) as total FROM rf_persona group by sex";
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
			$temp[] = array('v' => (string) $r['texto']); 
		    $temp[] = array('v' => (int) $r['total']);
		    $rows[] = array('c' => $temp);
		}
		 
		$table['rows'] = $rows;
		$jsonTable = json_encode($table);
		
	
	echo $jsonTable;
	
}
?>