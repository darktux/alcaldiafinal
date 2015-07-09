<?php
	include('./../php/conexion.php');
	$conn=conectar();
	set_time_limit(0); //Establece el número de segundos que se permite la ejecución de un script.
	$fecha_ac = isset($_POST['timestamp']) ? $_POST['timestamp']:0;

	$fecha_bd = $row['fec_hor'];

	while( $fecha_bd <= $fecha_ac )
		{	
			$query3    = "SELECT fec_hor FROM co_notificacion ORDER BY fec_hor DESC LIMIT 1";
			$con       = pg_query($query3);
			$ro        = pg_fetch_array($con);
			
			usleep(100000);//anteriormente 10000
			clearstatcache();
			$fecha_bd  = strtotime($ro['fec_hor']);
		}

	$query       = "SELECT * FROM co_notificacion ORDER BY fec_hor DESC LIMIT 1";
	$datos_query = pg_query($query);
	while($row = pg_fetch_array($datos_query))
	{
		$ar["fec_hor"] = strtotime($row['fec_hor']);	
		$ar["mensaje"] = $row['mensaje'];	
		$ar["id_not"]  = $row['id_not'];	
		$ar["status"]  = $row['status'];	
	}
	$dato_json   = json_encode($ar);
	echo $dato_json;
	pg_close($conn);
?>