<?php
	require_once("../../php/fpdf17/fpdf.php");
	require_once("../../php/conexion.php");
	require_once("../php/funciones.php");
	$logoal = "../../img/logoal.jpg";
	$logoes = "../../img/logoes.jpg";
	$logodi = "../../img/logo_digestyc.jpg";

	/* ==================================================================================================== *
	 * Armar la Consulta
	/* ==================================================================================================== */

	$conexion = conectar();
	//$consulta = "SELECT * FROM rf_divorcio_partida WHERE (num_lib,num_par) = ($_GET[num_lib],$_GET[num_par])";
	$consulta = "SELECT * FROM rf_matrimonio_partida AS p, rf_matrimonio_digestyc AS d WHERE ((p.num_lib,p.num_par)=($_GET[num_lib],$_GET[num_par])) and ((p.num_lib,p.num_par)=(d.num_lib,d.num_par))";
	$resultado = pg_query($consulta);

	if(pg_num_rows($resultado)>0){
		$registro = pg_fetch_array($resultado);

		// Crear una variable por cada campo
		foreach ($registro as $clave => $valor) {
			if (is_string($x = $clave)) {
				$$clave = $valor;
			}
		}
	}


	/* ==================================================================================================== *
	 * Configurar el documento PDF
	/* ==================================================================================================== */

	$reporte = new FPDF("l","mm","letter");
	$reporte->SetMargins(20,20,20);
	$reporte->AddPage();
	$reporte->SetFont("Arial","",12);

	/* ==================================================================================================== *
	 * Armar los cuadros del formulario
	/* ==================================================================================================== */

	// Cuadro principal
	$reporte->Cell(0,175,"",1);

	$reporte->SetFont("Arial","B",8);

	/* ==================================================================================================== *
	 * Armar el primer Bloque
	/* ==================================================================================================== */

	// Primer bloque
	$reporte->SetXY(22,33);
	$reporte->Cell(236,24,"",1,1);

	// Cuadro de titulo
	$reporte->SetXY(24,35);
	$reporte->Cell(20,20,"",1,1);

	$reporte->SetXY(24,35);
	$reporte->MultiCell(20,6,"Lugar y Fecha del Matrimonio",0,"L");

	// Bloque de datos 1
	$reporte->SetXY(46,35);
	$reporte->Cell(115,20,"",1,1);

	// Bloque de datos 2
	$reporte->SetXY(163,35);
	$reporte->Cell(93,20,"",1,1);

	/* ==================================================================================================== *
	 * Armar el segundo bloque
	/* ==================================================================================================== */

	// Segundo bloque
	$reporte->SetXY(22,59);
	$reporte->Cell(236,50,"",1,1);

	// Cuadro de titulo
	$reporte->SetXY(24,61);
	$reporte->Cell(20,46,"",1,1);

	$reporte->SetXY(24,80);
	$reporte->MultiCell(20,6,"Del Esposo",0,"L");

	// Bloque de datos 3
	$reporte->SetXY(46,61);
	$reporte->Cell(95,14,"",1,1);

	// Bloque de datos 4
	$reporte->SetXY(141,61);
	$reporte->Cell(20,14,"",1,1);

	// Bloque de datos 4b
	$reporte->SetXY(141,77);
	$reporte->Cell(20,30,"",1,1);

	// Bloque de datos 5
	$reporte->SetXY(46,77);
	$reporte->Cell(95,30,"",1,1);

	// Bloque de datos 5b
	$reporte->SetXY(141,77);
	$reporte->Cell(20,30,"",1,1);

	// Bloque de datos 6
	$reporte->SetXY(163,61);
	$reporte->Cell(93,14,"",1,1);

	// Bloque de datos 7
	$reporte->SetXY(163,77);
	$reporte->Cell(93,14,"",1,1);

	// Bloque de datos 8
	$reporte->SetXY(163,93);
	$reporte->Cell(93,14,"",1,1);

	/* ==================================================================================================== *
	 * Armar el tercer bloque
	/* ==================================================================================================== */

	// Tercer bloque
	$reporte->SetXY(22,111);
	$reporte->Cell(236,50,"",1,1);

	// Cuadro de titulo del tercer bloque
	$reporte->SetXY(24,113);
	$reporte->Cell(20,46,"",1,1);

	$reporte->SetXY(24,132);
	$reporte->MultiCell(20,6,"De la Esposa",0,"L");

	// Bloque de datos 9
	$reporte->SetXY(46,113);
	$reporte->Cell(95,14,"",1,1);

	// Bloque de datos 10
	$reporte->SetXY(141,113);
	$reporte->Cell(20,14,"",1,1);

	// Bloque de datos 11
	$reporte->SetXY(46,129);
	$reporte->Cell(95,30,"",1,1);

	// Bloque de datos 11b
	$reporte->SetXY(141,129);
	$reporte->Cell(20,30,"",1,1);

	// Bloque de datos 12
	$reporte->SetXY(163,113);
	$reporte->Cell(93,14,"",1,1);

	// Bloque de datos 13
	$reporte->SetXY(163,129);
	$reporte->Cell(93,14,"",1,1);

	// Bloque de datos 14
	$reporte->SetXY(163,145);
	$reporte->Cell(93,14,"",1,1);


	/* ==================================================================================================== *
	 * Armar el cuarto bloque
	/* ==================================================================================================== */

	// Cuarto bloque
	$reporte->SetXY(22,163);
	$reporte->Cell(236,30,"",1,1);

	// Cuadro de titulo
	$reporte->SetXY(24,165);
	$reporte->Cell(20,26,"",1,1);

	$reporte->SetXY(24,174);
	$reporte->MultiCell(20,6,"Otros",0,"C");

	// Bloque de datos 15 y 16
	$reporte->SetXY(46,165);
	$reporte->Cell(115,26,"",1,1);

	// Bloque de datos 17
	$reporte->SetXY(163,165);
	$reporte->Cell(93,26,"",1,1);

	/* ==================================================================================================== *
	 * Armar el encabezado
	/* ==================================================================================================== */

	$MARCO = 0;

	$reporte->SetFont("Arial","B",12);
	$reporte->SetXY(20,20);
	$reporte->Cell(0,13,utf8_decode("CERTIFICADO DE MATRIMONIO"),0,0,"C");

	$reporte->Image($logodi,22,22,10);

	$reporte->SetFontSize(10);

	$reporte->SetXY(35,20);
	$reporte->Cell(12,10,"Libro: ",$MARCO,0);

	$reporte->SetXY(65,20);
	$reporte->Cell(12,10,"Tomo: ",$MARCO,0);

	$reporte->SetXY(190,20);
	$reporte->Cell(20,10,"Partida No: ",$MARCO,0);

	$reporte->SetXY(220,20);
	$reporte->Cell(12,10,"Folio: ",$MARCO,0);

	$reporte->SetFontSize(8);

	/* ==================================================================================================== *
	 * Encabezados del primer Bloque
	/* ==================================================================================================== */
	
	// Bloque de datos 1
	$reporte->SetXY(48,35);
	$reporte->Cell(34,6,"1. Lugar del Matrimonio: ",$MARCO,1);

	$reporte->setfont("Arial","");

	$reporte->SetX(51);
	$reporte->Cell(25,6,"Departamento: ",$MARCO,1,1);

	$reporte->SetX(51);
	$reporte->Cell(25,6,"Municipio: ",$MARCO,1,1);

	// Bloque de datos 2
	$reporte->setfont("Arial","B");

	$reporte->SetXY(165,35);
	$reporte->Cell(34,6,"2. Fecha del Matrimonio: ",$MARCO,1,1);

	$reporte->setfont("Arial","");
	
	$reporte->SetX(168);
	$reporte->Cell(25,6,utf8_decode("Día: "),$MARCO,0);
	$reporte->SetX(193);
	$reporte->Cell(25,6,"Mes: ",$MARCO,0);
	$reporte->SetX(218);
	$reporte->Cell(25,6,utf8_decode("Año: "),$MARCO,0);

	/* ==================================================================================================== *
	 * Encabezados del segundo bloque
	/* ==================================================================================================== */

	$reporte->setfont("Arial","B");

	// Bloque de datos 3
	$reporte->SetXY(48,61);
	$reporte->Cell(45,6,"3. Nombre y apellido del esposo: ",$MARCO,1);

	// Bloque de datos 4
	$reporte->SetXY(143,61);
	$reporte->Cell(16,6,"4. Edad: ",$MARCO,1);

	// Bloque de datos 5a
	$reporte->SetXY(48,77);
	$reporte->Cell(41,6,"5. Lugar de residencia actual: ",$MARCO,1);

	$reporte->setfont("Arial","");

	$reporte->SetX(51);
	$reporte->Cell(25,6,"Departamento: ",$MARCO,1);

	$reporte->SetX(51);
	$reporte->Cell(25,6,"Municipio: ",$MARCO,1);

	$reporte->SetX(51);
	$reporte->Cell(25,6,utf8_decode("Cantón: "),$MARCO,1);

	// Bloque de datos 5b
	$reporte->setfont("Arial","B");

	$reporte->SetXY(143,77);
	$reporte->Cell(16,6,utf8_decode("Área: "),$MARCO,1);

	// Bloque de datos 6
	$reporte->SetXY(165,61);
	$reporte->Cell(21,6,utf8_decode("6. Estado civil: "),$MARCO,1);

	// Bloque de datos 7
	$reporte->SetXY(165,77);
	$reporte->Cell(31,6,utf8_decode("7. Sabe leer y escribir: "),$MARCO,1);

	// Bloque de datos 8
	$reporte->SetXY(165,93);
	$reporte->Cell(29,6,utf8_decode("8. Ocupación actual: "),$MARCO,1);

	/* ==================================================================================================== *
	 * Encabezados del tercer bloque
	/* ==================================================================================================== */

	// Bloque de datos 9
	$reporte->SetXY(48,113);
	$reporte->Cell(48,6,"9. Nombre y apellido de la esposa: ",$MARCO,1);

	// Bloque de datos 10
	$reporte->SetXY(143,113);
	$reporte->Cell(16,6,"10. Edad: ",$MARCO,1);

	// Bloque de datos 11a
	$reporte->SetXY(48,129);
	$reporte->Cell(43,6,"11. Lugar de residencia actual: ",$MARCO,1);

	$reporte->setfont("Arial","");

	$reporte->SetX(51);
	$reporte->Cell(25,6,"Departamento: ",$MARCO,1);

	$reporte->SetX(51);
	$reporte->Cell(25,6,"Municipio: ",$MARCO,1);

	$reporte->SetX(51);
	$reporte->Cell(25,6,utf8_decode("Cantón: "),$MARCO,1);

	// Bloque de datos 11b
	$reporte->setfont("Arial","B");

	$reporte->SetXY(143,129);
	$reporte->Cell(16,6,utf8_decode("Área: "),$MARCO,1);

	// Bloque de datos 12
		$reporte->SetXY(165,113);
	$reporte->Cell(23,6,utf8_decode("12. Estado civil: "),$MARCO,1);

	// Bloque de datos 13
	$reporte->SetXY(165,129);
	$reporte->Cell(33,6,utf8_decode("13. Sabe leer y escribir: "),$MARCO,1);

	// Bloque de datos 14
	$reporte->SetXY(165,145);
	$reporte->Cell(31,6,utf8_decode("14. Ocupación actual: "),$MARCO,1);

	/* ==================================================================================================== *
	 * Encabezados del tercer bloque
	/* ==================================================================================================== */

	// Bloque de datos 15 y 16
	$reporte->SetXY(48,165);
	$reporte->Cell(31,6,utf8_decode("15. Fecha de registro: "),$MARCO,1);
	$reporte->SetX(48);
	$reporte->Cell(86,6,utf8_decode("16. Nombre, firma y sello del Registrador/a del Estado Familiar: "),$MARCO,1);
	//$reporte->SetXY(46,165);
	//$reporte->Cell(115,26,"",1,1);

	// Bloque de datos 17
	$reporte->SetXY(165,165);
	$reporte->Cell(28,6,utf8_decode("17. Observaciones: "),$MARCO,1);
	//$reporte->SetXY(163,165);
	//$reporte->Cell(93,26,"",1,1);


	/* ==================================================================================================== *
	 * Imprimir los datos
	/* ==================================================================================================== */

	// Datos del Encabezado
	$reporte->SetFont("Arial","U",10);
	$reporte->SetXY(47,20);
	$reporte->Cell(18,10,utf8_decode($num_lib),$MARCO,0);

	$reporte->SetXY(77,20);
	$reporte->Cell(18,10,utf8_decode($num_tom),$MARCO,0);

	$reporte->SetXY(210,20);
	$reporte->Cell(10,10,utf8_decode($num_par),$MARCO,0);

	$reporte->SetXY(232,20);
	$reporte->Cell(18,10,utf8_decode($num_pag),$MARCO,0);

	/* ==================================================================================================== *
	 * Imprimir los datos del primer bloque
	/* ==================================================================================================== */

	$reporte->SetFontSize(8);

	// 	1. Lugar del Matrimonio
	$reporte->SetXY(76,41);
	$reporte->Cell(83,6,utf8_decode($dep_mat),$MARCO,1);

	$reporte->SetXY(76,47);
	$reporte->Cell(83,6,utf8_decode($mun_mat),$MARCO,1);

	// 2. Fecha del Matrimonio
	list($ano_mat, $mes_mat, $dia_mat) = explode("-", $fec_mat);

	$reporte->SetXY(174,41);
	$reporte->Cell(19,6,utf8_decode($dia_mat),$MARCO,0);
	$reporte->SetX(200);
	$reporte->Cell(18,6,utf8_decode(mesATexto($mes_mat)),$MARCO,0);
	$reporte->SetX(225);
	$reporte->Cell(18,6,utf8_decode($ano_mat),$MARCO,0);

	/* ==================================================================================================== *
	 * Imprimir los datos del segundo bloque
	/* ==================================================================================================== */

	// 3. Nombre y apellido del esposo
	$reporte->SetXY(48,67);
	$reporte->Cell(91,6,utf8_decode($nom_eso . " " . $ape1_eso . " " . $ape2_eso),$MARCO,1);

	// 4. Edad
	$reporte->SetXY(143,67);
	$reporte->Cell(16,6,utf8_decode($eda_eso),$MARCO,1);

	// 5. Lugar de residencia
	$reporte->SetXY(76,83);
	$reporte->Cell(63,6,utf8_decode($dep_eso),$MARCO,1);

	$reporte->SetX(76);
	$reporte->Cell(63,6,utf8_decode($mun_eso),$MARCO,1);

	$reporte->SetX(76);
	$reporte->Cell(63,6,utf8_decode($can_eso),$MARCO,1);

	// 5b. Area
	$reporte->SetXY(143,83);
	$reporte->Cell(16,6,utf8_decode($zon_eso),$MARCO,1);

	// 3. Estado civil
	$reporte->SetXY(165,67);
	$reporte->Cell(89,6,utf8_decode($est_civ_eso),$MARCO,1);

	// 7. Sabe leer y escribir
	$reporte->SetXY(165,83);
	$reporte->Cell(25,6,utf8_decode($alf_eso),$MARCO,1);

	// 8. Ocupación actual
	$reporte->SetXY(165,99);
	$reporte->Cell(89,6,utf8_decode($ocu_eso),$MARCO,1);

	/* ==================================================================================================== *
	 * Imprimir los datos del tercer bloque
	/* ==================================================================================================== */

	// 9. Nombre y apellido de la esposa
	$reporte->SetXY(48,119);
	$reporte->Cell(91,6,utf8_decode($nom_esa . " " . $ape1_esa . " " . $ape2_esa),$MARCO,1);

	// 10. Edad
	$reporte->SetXY(143,119);
	$reporte->Cell(16,6,utf8_decode($eda_esa),$MARCO,1);

	// 11. Lugar de residencia
	$reporte->SetXY(76,135);
	$reporte->Cell(63,6,utf8_decode($dep_esa),$MARCO,1);

	$reporte->SetX(76);
	$reporte->Cell(63,6,utf8_decode($mun_esa),$MARCO,1);

	$reporte->SetX(76);
	$reporte->Cell(63,6,utf8_decode($can_esa),$MARCO,1);

	// 11b. Area
	$reporte->SetXY(143,135);
	$reporte->Cell(16,6,utf8_decode($zon_esa),$MARCO,1);

	// 12. Estado civil
	$reporte->SetXY(165,119);
	$reporte->Cell(89,6,utf8_decode($est_civ_esa),$MARCO,1);	

	// 13. Sabe leer y escribir
	$reporte->SetXY(165,135);
	$reporte->Cell(25,6,utf8_decode($alf_esa),$MARCO,1);

	// 14. Ocupación actual
	$reporte->SetXY(165,151);
	$reporte->Cell(89,6,utf8_decode($ocu_esa),$MARCO,1);

	/* ==================================================================================================== *
	 * Imprimir los datos del cuarto bloque
	/* ==================================================================================================== */

	// 15. Fecha del registro
	$reporte->SetXY(79,165);
	$reporte->Cell(80,6,utf8_decode($fec_reg),$MARCO,1);

	// 16. Nombre, firma y sello del Registrador/a del Estado Familiar
	$reporte->SetXY(48,177);
	$reporte->Cell(111,6,utf8_decode($nom_reg),$MARCO,1);

	// 17. Observaciones
	$reporte->SetXY(165,171);
	$reporte->MultiCell(89,6,utf8_decode($obs),$MARCO,1);


	$reporte->Output();

?>