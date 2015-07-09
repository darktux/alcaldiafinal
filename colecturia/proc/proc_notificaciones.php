<?php  
	/* TODO obtener solo las notiicaciones activas status = true*/
	include('./../../php/conexion.php');
	$conn=conectar();
	$sql="SELECT * FROM co_notificacion where status = 't'";
	$rs=pg_query($sql);
	$lista=array();
	while ($obj=pg_fetch_object($rs)) {
		$lista[]=array(
			'id_not'=>$obj->id_not,
			'mensaje'=>$obj->mensaje,
			'fec_hor'=>$obj->fec_hor,
			'status'=>$obj->status,
			'cod_fac'=>$obj->cod_fac
		);
	}
	echo ''.json_encode($lista).'';
	pg_close($conn);
?>