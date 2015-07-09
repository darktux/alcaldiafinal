<?php
function conectar(){
	$conn = pg_connect("user=admin port='5432' dbname='db_alcaldia' host='localhost' password='admin' ") or die("No se pudo realizar la conexi&oacute;n: ".pg_last_error());
	return $conn;
}

?>