<?php
	session_start();
	
	if($_POST["accion"] == "inicializar"){
		inicializar();	
	}

	if($_POST["accion"] == "agregar_detalle"){
		agregarDetalle();
	}

	if($_POST["accion"] == "guardar_factura"){
		guardarFactura();
	}

	if($_POST["accion"] == "obtener_total"){
		obtenerTotal();
	}

	if($_POST["accion"] == "buscar_contribuyente"){
		buscarContribuyente();
	}

	function inicializar(){
		// Limpiar(Borrar) los arrays a utilizar
		unset($_SESSION["factura"]);
		unset($_SESSION["contador"]);
		unset($_SESSION["detalle"]);

		// Inicializar el encabezado de la factura
		//$_SESSION["factura"]["nombre"] = $_POST["nom_con"];
		$_SESSION["factura"]["monto"] = 0;

		// Inicializar el contador en 0, indicando que se agregará la primer fila de detalle en en indice cero
		$_SESSION["contador"] = 0;

		// Agregar la primer fila del detalle que es el impuesto de fiestas patronales
		$_SESSION["detalle"][0]["codigo"] = "12114";
		$_SESSION["detalle"][0]["descripcion"] = "5% FIESTAS PATRONALES";
		$_SESSION["detalle"][0]["total"] = 0;

		echo json_encode($_SESSION["detalle"]);
	}

	function agregarDetalle(){

		// Aumentar el contador en 1 indicando que se agregará una nueva fila de detalle
		$_SESSION["contador"]++;

		// Mover la fila de fiestas patronales a la ultima posicion
		$_SESSION["detalle"][$_SESSION["contador"]]["codigo"] = $_SESSION["detalle"][$_SESSION["contador"]-1]["codigo"];
		$_SESSION["detalle"][$_SESSION["contador"]]["descripcion"] = $_SESSION["detalle"][$_SESSION["contador"]-1]["descripcion"];
		$_SESSION["detalle"][$_SESSION["contador"]]["total"] = $_SESSION["detalle"][$_SESSION["contador"]-1]["total"];

		// Agregar una fila de detalle en la penultima posición
		$_SESSION["detalle"][$_SESSION["contador"]-1]["codigo"] = $_POST["codigo"];
		$_SESSION["detalle"][$_SESSION["contador"]-1]["descripcion"] = $_POST["descripcion"];
		$_SESSION["detalle"][$_SESSION["contador"]-1]["total"] = $_POST["total"];

		// Actualizar el valor de fiestas patronales
		$_SESSION["detalle"][$_SESSION["contador"]]["total"] += round($_POST["total"] * 0.05, 2);

		//actualizar el monto total (sumar el monto del detalle y el impuesto de fiestas patronales)
		$_SESSION["factura"]["monto"] += $_POST["total"];
		$_SESSION["factura"]["monto"] += round($_POST["total"] * 0.05, 2);

		echo json_encode($_SESSION["detalle"]);
	}

	function obtenerTotal(){
		echo $_SESSION["factura"]["monto"];
	}

	function guardarFactura(){
		require_once("../php/conexion.php");
		$conexion = conectar();
		if($_POST["cod_con"] == "") $_POST["cod_con"] = "null";
		
		$consulta = "INSERT INTO co_factura (fec, nom_con, cod_con, mon, est, des) 
		values('". date("Y-m-d H:i:s") ."', '$_POST[nom_con]', $_POST[cod_con], '". 
		$_SESSION["factura"]["monto"] ."', '$_POST[est]', '$_POST[des]')";
		
		//Si la factura se guarda correctamente, entonces guardar los detalles
		if(pg_query($consulta)){
			$consulta = "SELECT max(cod_fac) FROM co_factura";
			$resultado = pg_query($consulta);
			$fila = pg_fetch_array($resultado);
			$id_factura = $fila["max"];

			for ($i=0; $i <= $_SESSION["contador"]; $i++){ 

				$det = $_SESSION["detalle"][$i]["descripcion"];
				$mon = $_SESSION["detalle"][$i]["total"];
				$cod_rub = $_SESSION["detalle"][$i]["codigo"];
				$consulta = "INSERT INTO co_factura_detalle(det, mon, cod_fac, cod_rub)
				values('$det', $mon, $id_factura, $cod_rub)";

				pg_query($consulta);
			}

			if ($_POST[est] == "false") {
				// Factura generada desde afuera de colecturia, mandar notificación
				$fec_hor=date("Y-m-d H:i:s");
				$msj="Cobro del contribuyente: ". $_POST[nom_con];
				if(pg_query("INSERT INTO co_notificacion(mensaje,fec_hor,status, cod_fac) VALUES('$msj','$fec_hor', 't', '$id_factura')") or die("Error al ingresar")){
				}

				echo "<script type='text/javascript'>" .
				"alert('Factura enviada a la Unidad de Colecturia');" .
				"parent.centro.location.reload();" .
				"</script>";
			} else {
				// Factura generada desde dentro de colecturia, generar pdf de la factura
				echo "<script type='text/javascript'>" .
				"alert('Guardado exitosamente');" .
				"window.open('pdf_factura.php?cod_fac=" . $id_factura . "', '_blank');" .
				"parent.centro.location.reload();" .
				"</script>";

			}
					}
		else{
			echo "<script type='text/javascript'>" .
				 "alert('Error al guardar');" .
				 "</script>";
		}		
	}

	/* ================================================== *
 	* Función buscarMadre()
 	* Busca datos de un registro en la tabla rf_persona
 	* ================================================== */

function buscarContribuyente(){		
	require_once("../php/conexion.php");
	$conexion = conectar();

	if($_POST[tip_bus] == "nombre"){
		$consulta = "SELECT * FROM rf_persona WHERE (nom ilike '%$_POST[par_bus]%' or ape1 ilike '%$_POST[par_bus]%' or ape2 ilike '%$_POST[par_bus]%')";
	} else if($_POST[tip_bus] == "dui"){
		$consulta = "SELECT * FROM rf_persona WHERE dui = '$_POST[par_bus]'";
	}
	
	$resultado = pg_query($consulta);
	if(pg_num_rows($resultado)>0){
		echo "entro";
		while($registro = pg_fetch_array($resultado)) {
			$registros[] = $registro;
		}
		
		foreach($registros as $registro){
			foreach($registro as $clave => $valor){
				if(is_string($x = $clave)){
					$fila[$clave] = $valor;
				}
			}
			list($ano, $mes, $dia) = explode("-", $fila[fec_nac]);
			//$fila[fec_for] = $dia . "-" . $mes . "-" . $ano;
			$fila[nom_com] = $fila[nom] . " " . $fila[ape1] . " " . $fila[ape2];
			
			echo "<tr>
					<td>$fila[nom_com]</<td>
					<td>$fila[dui]</td>
					<td><button class='btn' name='seleccionar' id='seleccionar' onclick='cargarContribuyente(" . json_encode($fila) . ");' data-dismiss='modal' ><i class='icon-ok'></i></button></td>
				</tr>";
		}
	}else{
		echo 	"<script type='text/javascript'>
				alert('No encontrado');
			</script>";

	}
}
?>