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
	$consulta = "SELECT * FROM rf_defuncion_partida WHERE (num_lib,num_par) = ($_GET[num_lib],$_GET[num_par])";
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

	// Primer columna
	// Primer bloque
	$reporte->SetXY(22,33);
	$reporte->Cell(117,50,"",1);

	// Segundo Bloque
	$reporte->SetXY(22,85);
	$reporte->Cell(117,92,"",1);

	// Tercer Bloque
	$reporte->SetXY(22,179);
	$reporte->Cell(117,14,"",1);

	// Segunda columna
	// Cuarto Bloque
	$reporte->SetXY(141,33);
	$reporte->Cell(117,50,"",1);

	// Quinto Bloque
	$reporte->SetXY(141, 85);
	$reporte->Cell(117,58,"",1);

	// Sexto Bloque
	$reporte->SetXY(141, 145);
	$reporte->Cell(117,32,"",1);

	// Septimo Bloque
	$reporte->SetXY(141,179);
	$reporte->Cell(117,14,"",1);

	/* ==================================================================================================== *
	 * Armar el encabezado
	/* ==================================================================================================== */

	$MARCO = 0;

	$reporte->SetFont("Arial","B",12);
	$reporte->SetXY(20,20);
	$reporte->Cell(0,13,utf8_decode("CERTIFICADO DE DEFUNCIÓN"),0,0,"C");

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

	// Titulos del primer bloque
	$reporte->SetXY(25,33);
	$reporte->Cell(48,6,"1. Nombre y apellido del difunto/a: ",$MARCO,1);

	$reporte->Ln(6);

	$reporte->SetX(25);
	$reporte->Cell(46,6,utf8_decode("2. Número de D.U.I. del difunto/a: "),$MARCO,1);

	$reporte->SetX(25);
	$reporte->Cell(36,6,utf8_decode("3. Fecha de la defunción: "),$MARCO,0);

	$reporte->SetFont("Arial", "");

	$reporte->Cell(77,6,utf8_decode("Horas:      Minutos:      Día:       Mes:                     Año:         "),$MARCO,1);

	$reporte->SetFont("Arial", "B");

	$reporte->SetX(25);
	$reporte->Cell(36,6,utf8_decode("4. Lugar de la defunción: "),$MARCO,1);

	$reporte->SetFont("Arial", "");

	$reporte->SetX(61);
	$reporte->Cell(23,6,"Departamento:",$MARCO,1);

	$reporte->SetX(61);
	$reporte->Cell(23,6,"Municipio: ",$MARCO,1);

	$reporte->SetX(61);
	$reporte->Cell(23,6,utf8_decode("Cantón"),$MARCO,1);

	$reporte->SetFont("Arial", "B");

	// Titulos del segundo bloque

	$reporte->SetXY(25,85);
	$reporte->Cell(35,6,utf8_decode("5. Local de la defunción: "),$MARCO,1);
	$reporte->SetX(30);
	$reporte->Cell(19,6,utf8_decode("Especifique: "),$MARCO,1);

	$reporte->SetX(25);
	$reporte->Cell(13,6,utf8_decode("6. Sexo: "),$MARCO,1);

	$reporte->SetX(25);
	$reporte->Cell(29,6,utf8_decode("7. Estado conyugal: "),$MARCO,1);

	$reporte->SetX(25);
	$reporte->Cell(13,6,utf8_decode("8. Edad: "),$MARCO,0);

	$reporte->SetFont("Arial", "");
	$reporte->Cell(67,6,utf8_decode("Para mayores de un 1 año y más (años cumplidos): "),$MARCO,1);
	$reporte->SetFont("Arial", "B");

	$reporte->SetX(25);
	$reporte->Cell(34,6,utf8_decode("Para menores de 1 año: "),$MARCO,1);

	$reporte->SetFont("Arial", "");
	$reporte->SetX(40);
	$reporte->Cell(61,6,utf8_decode("Horas:        Minutos:        Dias:        Meses:       "),$MARCO,1);
	$reporte->SetFont("Arial", "B");

	$reporte->SetX(25);
	$reporte->Cell(34,6,utf8_decode("Complete: "),$MARCO,1);

	$reporte->SetX(40);
	$reporte->Cell(22,6,utf8_decode("Madre casada: "),$MARCO,1);

	$reporte->SetX(40);
	$reporte->Cell(22,6,utf8_decode("Tipo de parto: "),$MARCO,1);

	$reporte->SetX(25);
	$reporte->Cell(26,6,utf8_decode("Edad de la madre: "),$MARCO,0);

	$reporte->SetX(70);
	$reporte->Cell(34,6,utf8_decode("Duración del embarazo: "),$MARCO,1);

	$reporte->SetX(25);
	$reporte->Cell(85,6,utf8_decode("Si en días esta entre 1 a 28 complete la siguiente información: "),$MARCO,1);

	$reporte->SetX(25);
	$reporte->Cell(21,6,utf8_decode("Peso al nacer: "),$MARCO,0);

	$reporte->SetX(70);
	$reporte->Cell(21,6,utf8_decode("Talla al nacer: "),$MARCO,1);

	$reporte->SetFont("Arial", "");
	$reporte->SetX(25);
	$reporte->Cell(37,6,utf8_decode("Cuantos ha tenido la madre: "),$MARCO,1);
	$reporte->SetFont("Arial", "B");

	$reporte->SetX(25);
	$reporte->Cell(18,6,utf8_decode("Embarazos: "),$MARCO,0);

	$reporte->SetX(60);
	$reporte->Cell(14,6,utf8_decode("Abortos: "),$MARCO,0);

	$reporte->SetX(90);
	$reporte->Cell(26,6,utf8_decode("Nacidos muertos: "),$MARCO,0);

	// Titulos del tercer bloque
	$reporte->SetXY(25,179);
	$reporte->Cell(32,6,utf8_decode("18. Fecha de Registro: "),$MARCO,0);

	$reporte->SetX(75);
	$reporte->Cell(60,6,utf8_decode("19. Firma y sello del médico/a responsable: "),$MARCO,1);

	// Titulos del cuarto bloque

	$reporte->SetXY(145,33);
	$reporte->Cell(49,6,utf8_decode("9. Ocupación última del fallecido/a: "),$MARCO,1);

	$reporte->SetX(145);
	$reporte->Cell(43,6,utf8_decode("10. Jubilado/a o pensionado/a: "),$MARCO,1);

	$reporte->SetX(145);
	$reporte->Cell(74,6,utf8_decode("11. Lugar de residencia actual de la persona fallecida: "),$MARCO,1);

	$reporte->SetFont("Arial", "");

	$reporte->SetX(150);
	$reporte->Cell(23,6,utf8_decode("Departamento: "),$MARCO,1);
	
	$reporte->SetX(150);
	$reporte->Cell(23,6,utf8_decode("Municipio: "),$MARCO,1);

	$reporte->SetX(150);
	$reporte->Cell(23,6,utf8_decode("Cantón: "),$MARCO,1);

	$reporte->SetFont("Arial", "B");

	$reporte->SetX(145);
	$reporte->Cell(35,6,utf8_decode("12. Nombre de la madre: "),$MARCO,1);

	$reporte->SetX(145);
	$reporte->Cell(27,6,utf8_decode("Nombre del padre: "),$MARCO,1);

	$reporte->SetXY(220,51);
	$reporte->Cell(9,6,utf8_decode("Área: "),$MARCO,1);

	// Titulos del quinto bloque
	$reporte->SetXY(145,85);
	$reporte->Cell(110,6,utf8_decode("13. CAUSA DE LA DEFUNCIÓN "),$MARCO,1,"C");

	$reporte->SetFontSize(6);
	$reporte->SetX(145);
	$reporte->Cell(110,3,utf8_decode("Anote solo una causa en cada una de las lineas a), b), c), d) "),$MARCO,1,"C");
	$reporte->Ln(2);
	$reporte->SetFontSize(8);

	$reporte->SetX(145);
	$reporte->Cell(5,6,utf8_decode("a) "),$MARCO,1);

	$reporte->SetFontSize(6);
	$reporte->SetX(145);
	$reporte->Cell(75,3,utf8_decode("Debido a (como consecuencia de)"),$MARCO,1,"C");
	$reporte->Ln(2);
	$reporte->SetFontSize(8);

	$reporte->SetX(145);
	$reporte->Cell(5,6,utf8_decode("b) "),$MARCO,1);

	$reporte->SetFontSize(6);
	$reporte->SetX(145);
	$reporte->Cell(75,3,utf8_decode("Debido a (como consecuencia de)"),$MARCO,1,"C");
	$reporte->Ln(2);
	$reporte->SetFontSize(8);

	$reporte->SetX(145);
	$reporte->Cell(5,6,utf8_decode("c) "),$MARCO,1);

	$reporte->SetFontSize(6);
	$reporte->SetX(145);
	$reporte->Cell(75,3,utf8_decode("Debido a (como consecuencia de)"),$MARCO,1,"C");
	$reporte->Ln(2);
	$reporte->SetFontSize(8);

	$reporte->SetX(145);
	$reporte->Cell(5,6,utf8_decode("d) "),$MARCO,1);

	$reporte->SetFontSize(6);
	$reporte->SetX(145);
	$reporte->Cell(75,3,utf8_decode("Causa básica"),$MARCO,1,"C");
	$reporte->Ln(2);

	$reporte->SetXY(240,100);
	$reporte->MultiCell(15,3,utf8_decode("14. Si la persona fallecida es una mujer  entre 10-54 años investigar si estaba embarazada:"),$MARCO,"L");
	$reporte->SetFontSize(8);

	// Titulos del sexto bloque
	$reporte->SetXY(145,145);
	$reporte->Cell(110,6,utf8_decode("15. MUERTE ACCIDENTAL O VIOLENTA "),$MARCO,1,"C");

	$reporte->SetX(145);
	$reporte->Cell(32,6,utf8_decode("16. Causas de muerte: "),$MARCO,1,"");

	$reporte->SetX(145);
	$reporte->Cell(110,6,utf8_decode("ASISTENCIA Y CERTIFICACIÓN MÉDICA "),$MARCO,1,"C");

	$reporte->SetX(145);
	$reporte->Cell(71,6,utf8_decode("17. Tuvo asistencia médica durente su enfermedad:"),$MARCO,1,"");

	$reporte->SetX(145);
	$reporte->Cell(48,6,utf8_decode("Defunción Certificada por Médico: "),$MARCO,1,"");

	// Titulos del septimo bloque
	$reporte->SetXY(145,179);
	$reporte->Cell(85,6,utf8_decode("20. Nombre, firma y sello del registrador/a del estado familiar: "),$MARCO,0);

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

	// Datos del primer bloque
	$reporte->SetFontSize(8);

	$reporte->SetXY(73,33);
	$reporte->MultiCell(65,6,utf8_decode($nom . " " . $ape1 . " " . $ape2),$MARCO,"L");

	$reporte->SetXY(71,45);
	$reporte->Cell(67,6,utf8_decode($dui),$MARCO,0);

	$reporte->SetXY(70,51);
	$reporte->Cell(5,6,utf8_decode(substr($hor_min, 0, 2)),$MARCO,0);

	$reporte->SetXY(85,51);
	$reporte->Cell(5,6,utf8_decode(substr($hor_min, 3, 2)),$MARCO,0);

	list($ano_def, $mes_def, $dia_def) = explode("-", $fec_def);

	$reporte->SetXY(96,51);
	$reporte->Cell(5,6,utf8_decode($dia_def),$MARCO,0);

	$reporte->SetXY(107,51);
	$reporte->Cell(16,6,utf8_decode(mesATexto($mes_def)),$MARCO,0);

	$reporte->SetXY(130,51);
	$reporte->Cell(8,6,utf8_decode($ano_def),$MARCO,0);

	$reporte->SetXY(84,63);
	$reporte->Cell(54,6,utf8_decode($dep_def),$MARCO,0);

	$reporte->SetXY(84,69);
	$reporte->Cell(54,6,utf8_decode($mun_def),$MARCO,0);

	$reporte->SetXY(84,75);
	$reporte->Cell(54,6,utf8_decode($canlug_def),$MARCO,0);

	$reporte->SetXY(60,85);
	$reporte->Cell(78,6,utf8_decode($loc_def),$MARCO,0);

	$reporte->SetXY(38,97);
	$reporte->Cell(100,6,utf8_decode(decodificarSexo($sex)),$MARCO,0);

	$reporte->SetXY(54,103);
	$reporte->Cell(84,6,utf8_decode($est_fam),$MARCO,0);

	$reporte->SetXY(105,109);
	$reporte->Cell(33,6,utf8_decode($eda),$MARCO,0);


	// Datos del tercer bloque
	list($ano_reg, $mes_reg, $dia_reg) = explode("-", $fec_reg);

	$reporte->SetXY(25,185);
	$reporte->Cell(50,6,utf8_decode($dia_reg . " de " . mesATexto($mes_reg) . " del " . $ano_reg),$MARCO,0);

	// Datos del cuarto bloque
	$reporte->SetXY(194,33);
	$reporte->Cell(63,6,utf8_decode($ocu),$MARCO,0);

// TODO, dato de la tabla de digestyc
	$reporte->SetXY(190,39);
	$reporte->Cell(63,6,utf8_decode($jub_pen),$MARCO,0);

	$reporte->SetXY(173,51);
	$reporte->Cell(45,6,utf8_decode($dep_res),$MARCO,0);

	$reporte->SetXY(173,57);
	$reporte->Cell(45,6,utf8_decode($mun_res),$MARCO,0);

	$reporte->SetXY(173,63);
	$reporte->Cell(45,6,utf8_decode($canlug_res),$MARCO,0);

// TODO, dato de la tabla de digestyc
	$reporte->SetXY(229,51);
	$reporte->Cell(20,6,utf8_decode($are),$MARCO,0);

	$reporte->SetXY(180,69);
	$reporte->Cell(77,6,utf8_decode($nom_mad),$MARCO,0);

	$reporte->SetXY(172,75);
	$reporte->Cell(85,6,utf8_decode($nom_pad),$MARCO,0);

// TODO, Sacar de la tabla digestyc y no de la partida
	$reporte->SetXY(150,96);
	$reporte->Cell(90,6,utf8_decode($cau_def),$MARCO,0);

// TODO, Agregar a la tabla de digestyc y sacarlo de ahi
	$reporte->SetXY(150,107);
	$reporte->Cell(90,6,utf8_decode(""),$MARCO,0);

// TODO, Agregar a la tabla de digestyc y sacarlo de ahi
	$reporte->SetXY(150,118);
	$reporte->Cell(90,6,utf8_decode(""),$MARCO,0);

// TODO, Agregar a la tabla de digestyc y sacarlo de ahi
	$reporte->SetXY(150,129);
	$reporte->Cell(90,6,utf8_decode($cau_def),$MARCO,0);

// TODO, Sacar de la tabla digestyc
	$reporte->SetXY(177,151);
	$reporte->Cell(80,6,utf8_decode(""),$MARCO,0);

// TODO, Convertir a si y no
	$reporte->SetXY(216,163);
	$reporte->Cell(41,6,utf8_decode($asi_med),$MARCO,0);

// TODO, Convertir a si y no y sacar de la tabla digestyc
	$reporte->SetXY(193,169);
	$reporte->Cell(64,6,utf8_decode($cer_med),$MARCO,0);

// TODO, Sacar de la tabla de digestyc
	$reporte->SetXY(145,185);
	$reporte->Cell(85,6,utf8_decode(""),$MARCO,0);

	$reporte->Output();

?>