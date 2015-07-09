<?php
	include("../conexion/conexion.php");
	$conexion = Conexion::getConexion();
	
	if($_POST["accion"] == "guardar-persona"){
		$consulta = "INSERT INTO rf_persona(nom, ape1, ape2, sex, fec_nac, dui, nit, tel1, tel2, dep, mun, dir, ocu, est_civ)" . 
		"VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$datos = array ($_POST["nom"], $_POST["ape1"], $_POST["ape2"], $_POST["sex"], $_POST["fec_nac"], $_POST["dui"], $_POST["nit"], $_POST["tel1"], $_POST["tel2"], $_POST["dep"], $_POST["mun"], $_POST["dir"], $_POST["ocu"], $_POST["est_civ"]);
		
		$resultado = $conexion->prepare($consulta);
		
		if($resultado->execute($datos))
		{
			echo 	"<script type='text/javascript'>" .
					"alert('¡El registro ha sido guardado correctamente!');" .
					"parent.centro.location.href='form_persona.php'" .
					"</script>";
		}
		else
		{
			echo 	"<script type='text/javascript'>" .
					"alert('¡Error, el registro no se pudo guardar!');" .
					"</script>";
		}
	}
?>