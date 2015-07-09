<?php
	require_once("../php/fpdf17/fpdf.php");
	require_once("../php/conexion.php");

	/* TODO modificar las consultas para que busquen solo las facturas cobradas*/
	function generarConsulta(){

		/*	switch ($opc) {
				case 'dia':
					return "select d.cod_rub, sum(d.mon) tot from co_factura f, co_factura_detalle d where f.cod_fac = d.cod_fac and cast(fec as date) = '$par_bus' group by d.cod_rub";
					break;
				case 'men':
					return "select d.cod_rub, sum(d.mon) tot from co_factura f, co_factura_detalle d where f.cod_fac = d.cod_fac and TO_CHAR(fec, 'YYYY-MM') = '$par_bus' group by d.cod_rub";
					break;
				case 'anu':
					return "select d.cod_rub, sum(d.mon) tot from co_factura f, co_factura_detalle d where f.cod_fac = d.cod_fac and TO_CHAR(fec, 'YYYY') = '$par_bus' group by d.cod_rub";
					break;
				default:
					return "select d.cod_rub, sum(d.mon) tot from co_factura f, co_factura_detalle d where f.cod_fac = d.cod_fac and cast(fec as date) = current_date group by d.cod_rub";
					break;
			}
		*/
		if (isset($_GET[opc]) and isset($_GET[par_bus])){
			if($_GET[opc] == "dia"){
				return "select d.cod_rub, sum(d.mon) tot from co_factura f, co_factura_detalle d where f.cod_fac = d.cod_fac and cast(fec as date) = '$_GET[par_bus]' group by d.cod_rub";
			}
			else if($_GET[opc] == "men"){
				return "select d.cod_rub, sum(d.mon) tot from co_factura f, co_factura_detalle d where f.cod_fac = d.cod_fac and TO_CHAR(fec, 'YYYY-MM') = '$_GET[par_bus]' group by d.cod_rub";
			}
			else if($_GET[opc] == "anu"){
				return "select d.cod_rub, sum(d.mon) tot from co_factura f, co_factura_detalle d where f.cod_fac = d.cod_fac and TO_CHAR(fec, 'YYYY') = '$_GET[par_bus]' group by d.cod_rub";
			}
		} 
		else{
			return "select d.cod_rub, sum(d.mon) tot from co_factura f, co_factura_detalle d where f.cod_fac = d.cod_fac and cast(fec as date) = current_date group by d.cod_rub";
		}
	}

	function generarEncabezado(){
		if (isset($_GET[opc]) and isset($_GET[par_bus])){
			if($_GET[opc] == "dia"){
				list($ano, $mes, $dia) = explode("-", $_GET[par_bus]);
				return "Reporte de Ingresos Diario: " . $dia . "/" . $mes . "/" . $ano;
			}
			else if($_GET[opc] == "men"){
				list($ano, $mes) = explode("-", $_GET[par_bus]);
				$meses = array(
					"01" => "Enero", 
					"02" => "Febrero", 
					"03" => "Marzo", 
					"04" => "Abril", 
					"05" => "Mayo", 
					"06" => "Junio", 
					"07" => "Julio", 
					"08" => "Agosto", 
					"09" => "Septiembre", 
					"10" => "Octubre", 
					"11" => "Noviembre", 
					"12" => "Diciembre");

				return "Reporte de Ingresos Mensual: " . $meses[$mes] . " de " . $ano;
			}
			else if($_GET[opc] == "anu"){
				return "Reporte de Ingresos Anual: Año " . $_GET[par_bus];
			}
		} 
		else{
			return "Reporte de Ingresos Diario: " . date("d/m/Y");
		}
	}

	class ReportePDf extends FPDF{

		function Header(){

			// Dibujar las imagenes
			$this->Image("../img/logoes.jpg", 20, 10, 20); // Logo de El Salvador
			$this->Image("../img/logoal.jpg", 170, 10, 25); // Logo de la alcaldia

			//Dibujar la tres lineas de texto
			$this->setY(10);
			$this->SetFont("Arial", "B", 14); 
			$this->Cell(0, 6, "REGISTRO DEL ESTADO FAMILIAR", 0, 1, "C");

			$this->SetFont("Arial", "", 16);
			$this->SetTextColor(0,102,154);
			$this->Cell(0, 6, utf8_decode("ALCALDIA MUNICIPAL VILLA SAN CRISTÓBAL"), 0, 1, "C");

			$this->SetFont("Arial", "", 8);
			$this->SetTextColor(0, 0, 0);
			$this->Cell(0, 4, utf8_decode("DEPARTAMENTO DE CUSCATLÁN, TEL.: 2379-7131"), 0, 0, "C");

			// Dibujar las dos Lineas
			$this->SetLineWidth(0.5); // Establecer el grosor de las lineas a 0.5 milimetros
			$this->SetDrawColor(0, 0, 255); // Establecer el color de la primer linea a azul
			$this->Line(45,26,165,26); // Dibujar la primer linea
			//$this->SetDrawColor(255,0,0); // Establecer el color de la segunda linea a rojo
			$this->Line(45,28,165,28); // Dibujar la segunda linea

			$this->Ln(20);
		}
	}

	$reporte = new ReportePDF("P", "mm", "letter");
	$reporte->SetMargins(20,10);
	$reporte->AddPage();
	$reporte->SetFont("Arial", "", "12");
	//$reporte->SetMargins(20,40);

	// Encabezado de la tabla
	//$reporte->SetY(40);

	$encabezado = generarEncabezado();

	$reporte->Cell(80,8, utf8_decode($encabezado), 0, 0);	
	$reporte->Ln(16);

	$reporte->Cell(25, 8, utf8_decode("Código"), 1, 0, "C");
	$reporte->Cell(125, 8, "Concepto", 1, 0, "C");
	$reporte->Cell(25, 8, "Total", 1, 1, "C");

	// Datos de la tabla:

	// Consultar datos
	$conexion = conectar();
	$consulta = generarConsulta();
	
	$resultado = pg_query($consulta);

	$total = 0;
	while ($registro = pg_fetch_array($resultado)) {

		$resultado2 = pg_query("select nom_cue from co_impuesto where codigo = '$registro[cod_rub]'");
		$registro2 = pg_fetch_array($resultado2);
		$nom_cue = $registro2[nom_cue];

		$reporte->Cell(25, 8, $registro[cod_rub], 1, 0, "C");
		$reporte->Cell(125, 8, utf8_decode($nom_cue), 1, 0 , "L");
		$reporte->Cell(25, 8, "$ " . $registro[tot], 1, 1, "$ ");
		$total += $registro[tot];
	}

	// Dibujar las fila de totales
		//$reporte->Cell(25, 8, "", 1, 0, "C");
		$reporte->Cell(150, 8, "Total de ingresos diarios", 1, 0 , "C");
		$reporte->Cell(25, 8, "$ " . $total, 1, 1, "$ ");

	/*for ($i=1; $i < 40 ; $i++) { 
		$reporte->Cell(25, 8, $i, 1, 0, "C");
		$reporte->Cell(125, 8, utf8_decode("Concepto No. " . $i), 1, 0 , "L");
		$reporte->Cell(25, 8, "$ 2.00", 1, 1, "$ " . $i);
	}*/

	$reporte->Output();
?>