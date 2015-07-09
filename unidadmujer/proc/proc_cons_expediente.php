<?php 
	include('./../../php/conexion.php');
	$conn=conectar();
	switch ($_POST['opcion']) {
		case 'sx':
			$sql="SELECT sex as texto,count(*) as total FROM rf_persona,um_expediente WHERE rf_persona.cod_per=um_expediente.cod_per group by sex";
			enviarDatos($sql);
		break;
		
		case 'ec':
			$sql="SELECT est_civ as texto,count(*) as total FROM rf_persona group by est_civ";
			enviarDatos($sql);
		break;
		
		case 'ne':
			$sql="SELECT niv_edu as texto,count(*) as total FROM um_expediente group by niv_edu";
			enviarDatos($sql);
		break;

		case 'ps':
			$sql="SELECT sel_chk as texto,count(*) as total FROM um_checkbox WHERE cat_chk='oci_ded' group by sel_chk";
			enviarDatos($sql);
		break;

		case 'sl':
			$sql="SELECT baj_con as texto,count(*) as total FROM um_expediente group by baj_con";
			enviarDatos($sql);
		break;

		case 'de':
			$sql="SELECT dep_eco_agr as texto,count(*) as total FROM um_expediente group by dep_eco_agr";
			enviarDatos($sql);
		break;

		case 'ta':
			$sql="SELECT com as texto,count(*) as total FROM um_expediente group by com";
			enviarDatos($sql);
		break;

		case 'ma':
			$sql="SELECT suf_mal as texto,count(*) as total FROM um_expediente group by suf_mal";
			enviarDatos($sql);
		break;

		case 'as':
			$sql="SELECT suf_abu_sex as texto,count(*) as total FROM um_expediente group by suf_abu_sex";
			enviarDatos($sql);
		break;

		case 'ca':
			$sql="SELECT sel_chk as texto,count(*) as total FROM um_checkbox WHERE cat_chk='car_agr' group by sel_chk";
			enviarDatos($sql);
		break;

		case 'pa':
			$sql="SELECT sel_chk as texto,count(*) as total FROM um_checkbox WHERE cat_chk='prob_agr' group by sel_chk";
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