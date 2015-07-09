<?php
	class Conexion extends PDO
	{
		private static $conexion = NULL;
		
		public function __construct(){
			parent::__construct("pgsql:host=localhost;dbname=db_alcaldia", "admin", "admin");	
		}
		
		public static function getConexion()
		{
			if(self::$conexion == NULL)
			{
				self::$conexion =  new self();
			}
			return self::$conexion;
		}
	}
	/*
	//Modo de uso
	// Obtener una instancia de la conexión a travéz del método estaatico crearConexion()
	$conexion = Conexion::getConexion();
	// Crear la consulta
	$consulta = "SELECT * FROM rf_persona WHERE cod_per = ?";
	// Preparar la consulta a travéz de la conexión
	$resultado = $conexion->prepare($consulta);
	// Ejecutar la consulta y pasarle los parametros si son necesarios
	$resultado->execute(array("250119970001"));
	// Obtener el registro, o los registros obtenidos
	$fila = $resultado->fetch();
	echo "<br>" . $fila["nom"];
	*/
?>