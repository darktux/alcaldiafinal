<?php
	$datos[] = array(mes => '2015-01', F => 200, M => 90, L => 'Enero');
	$datos[] = array(mes => '2015-02', F => 75,  M => 65, L => 'Febrero');
	$datos[] = array(mes => '2015-03', F => 50,  M => 40, L => 'Marzo');
	$datos[] = array(mes => '2015-04', F => 75,  M => 65, L => 'Abril');
	$datos[] = array(mes => '2015-05', F => 50,  M => 40, L => 'Mayo');
	$datos[] = array(mes => '2015-06', F => 75,  M => 65, L => 'Junio');
	$datos[] = array(mes => '2015-08', F => 100, M => 90, L => 'Julio');
	
	echo json_encode($datos);
?>