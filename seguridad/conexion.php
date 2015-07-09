<?php
	function conectar(){
		$conn = pg_connect("user='postgres' port='5432' dbname='db_alcaldia' host='localhost' password='root' ") or die("No se pudo realizar la conexi&oacute;n: ".pg_last_error());
		return $conn;
	}
?>