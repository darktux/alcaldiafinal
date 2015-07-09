<?php
	class Persona
	{
		protected $conexion;
		
		public function __construct()
		{
			$this->conexion = Conexion::getConexion();
		}
		
		/*
		Función: guardar()
		Parametros:
			$_POST[]: Array que contiene los valores de los campos del formulario
		Accion: Guarda un regisro en la tabla persona
		Resultado: mensaje de alerta indicando si la acción se realizó con exito o no
		
		
		*/
		public function guardar()
		{/*
			// Verificar si la persona registrada ya existe en la base de datos
			$consulta = "SELECT fec_nac, nom FROM rf_persona WHERE fec_nac = ? AND nom = ?";	
			$resultado = $this->conexion->prepare($consulta);
			$resultado->execute(array($_POST["fec_nac"], $_POST["nom"]));
			$fila = $resultado->fetch();
			if($fila["nom"] == $_POST["nom"])
			{
				$fec_nac = explode("-", $fila["fec_nac"]);
				$fec_nac = $fec_nac[2] . "-" . $fec_nac[1] . "-" . $fec_nac[0];
			
				echo 	"<script type='text/javascript'>" .
						"alert('La persona con el nombre: $fila[nom] y fecha de nacimiento $fec_nac ya existe en la base de datos!');" .
						"</script>";
				return 0;
			}
			else
			{*/
				/*
				//verificar cuantas personas registradas nacierón el mismo dia
				$consulta = "SELECT COUNT(*) AS total FROM rf_persona WHERE fec_nac = ?";
				$resultado = $this->conexion->prepare($consulta);
				$resultado->execute(array($_POST['fec_nac']));
				$fila = $resultado->fetch();
				$total = $fila["total"]; 
		
				// Armar el código de la persona
				// Primero armar el correlativo
				if($total < 9) //Si hay menos de 9 coincidencias agregar tres ceros a la izquierda en el correlativo
					$relleno = "0";
				else 
					$relleno = "";
		
				//aumentar en una unidad el numero total para armar el correlativo
				$total = $total + 1;
		
				// Armar el correlativo dia + mes + año + relleno + (total + 1)
				$cod_per = explode("-", $_POST["fec_nac"]);
				$cod_per = $cod_per[2] . $cod_per[1] . $cod_per[0] . $relleno . $total;
				*/
		
				$consulta = "INSERT INTO rf_persona(nom, ape1, ape2, sex, fec_nac, dui, nit, tel1, tel2, dir)" . 
				"VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$datos = array ($_POST["nom"], $_POST["ape1"], $_POST["ape2"], $_POST["sex"], $_POST["fec_nac"], $_POST["dui"], $_POST["nit"], $_POST["tel1"], $_POST["tel2"], $_POST["dir"]);
				 
				//$consulta ="INSERT INTO rf_persona(nom, ape1, ape2, sex, fec_nac, dui) values(?, ?, ?, ?, ?, ?)";
				//$datos = array ($_POST["nom"], $_POST["ape1"], $_POST["ape2"], $_POST["sex"], $_POST["fec_nac"], $_POST["dui"]);
				 
				$resultado = $this->conexion->prepare($consulta);
				
				//foreach($_POST as $clave => $valor)
				//	echo "<br>" . $clave . ": " . $valor; 
				
				if($resultado->execute($datos))
				{
					echo 	"<script type='text/javascript'>" .
							"alert('¡El registro ha sido guardado correctamente!');" .
							"parent.formulario.location.href='form_persona.php'" .
							"</script>";
				}
				else
				{
					echo 	"<script type='text/javascript'>" .
							"alert('¡Error, el registro no se pudo guardar!');" .
							"</script>";
				}
			//}
		}
		
		/*
		Función:buscarPorCodigo($cod_per)
		Parametros:
			$cod_per: código de la persona que se desea buscar
		Acción: busca un unico registro en la tabla persona, a partir de su código de persona
		Respuesta:
		*/
		public function buscarPorCodigo($cod_per)
		{
			$consulta = "SELECT * FROM rf_persona WHERE cod_per = ?";
			$resultado = $this->conexion->prepare($consulta);
			$resultado->execute(array($cod_per));
			$filaPersona = $resultado->fetch();
			return $filaPersona;
		}
		
		/*
		Función: buscarPorNombre($nom)
		Acción: busca varios registro en la tabla persona, a partir del nombre
		Respuesta: Retorna una tabla con las filas que coinciden con la búsqueda
		*/
		public function buscarPorNombre($nom)
		{
			$consulta = "SELECT * FROM rf_persona WHERE nom like '%" . $nom . "%' limit 10";
			$resultado = $this->conexion->prepare($consulta);
			$resultado->execute();
			return $resultado;
		}
	}
?>