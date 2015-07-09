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
	$consulta = "SELECT * FROM rf_divorcio_partida AS p, rf_divorcio_digestyc AS d WHERE ((p.num_lib,p.num_par)=($_GET[num_lib],$_GET[num_par])) and ((p.num_lib,p.num_par)=(d.num_lib,d.num_par))";
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
	$reporte->MultiCell(20,6,"Lugar y Fecha del Divorcio",0,"L");

	// 1. Lugar del divorcio
	$reporte->SetXY(46,35);
	$reporte->Cell(115,20,"",1,1);

	// 2. Fecha del divorcio
	$reporte->SetXY(163,35);
	$reporte->Cell(93,20,"",1,1);

	/* ==================================================================================================== *
	 * Armar el segundo bloque
	/* ==================================================================================================== */

	// Segundo bloque
	$reporte->SetXY(22,59);
	$reporte->Cell(236,44,"",1,1);

	// Cuadro de titulo
	$reporte->SetXY(24,61);
	$reporte->Cell(20,40,"",1,1);

	$reporte->SetXY(24,78);
	$reporte->MultiCell(20,6,"Del Esposo",0,"L");

	// 3. Nombre y apellido del esposo:
	$reporte->SetXY(46,61);
	$reporte->Cell(95,14,"",1,1);

	// 4. Edad
	$reporte->SetXY(141,61);
	$reporte->Cell(20,14,"",1,1);

	// 5. Sabe leer y escribir
	$reporte->SetXY(46,77);
	$reporte->Cell(115,8,"",1,1);

	// 6. Ocupación actual
	$reporte->SetXY(46,87);
	$reporte->Cell(115,14,"",1,1);

	// 7. Lugar de residencia actual
	$reporte->SetXY(163,61);
	$reporte->Cell(93,40,"",1,1);

	/* ==================================================================================================== *
	 * Armar el tercer bloque
	/* ==================================================================================================== */

	// Tercer bloque
	$reporte->SetXY(22,105);
	$reporte->Cell(236,44,"",1,1);

	// Cuadro de titulo del tercer bloque
	$reporte->SetXY(24,107);
	$reporte->Cell(20,40,"",1,1);

	$reporte->SetXY(24,124);
	$reporte->MultiCell(20,6,"De la Esposa",0,"L");

	// 8. Nombre y apellido del esposa:
	$reporte->SetXY(46,107);
	$reporte->Cell(95,14,"",1,1);

	// 9. Edad
	$reporte->SetXY(141,107);
	$reporte->Cell(20,14,"",1,1);

	// 10. Sabe leer y escribir
	$reporte->SetXY(46,123);
	$reporte->Cell(115,8,"",1,1);

	// 11. Ocupación actual
	$reporte->SetXY(46,133);
	$reporte->Cell(115,14,"",1,1);

	// 12. Lugar de residencia actual
	$reporte->SetXY(163,107);
	$reporte->Cell(93,40,"",1,1);
	
	/* ==================================================================================================== *
	 * Armar el cuarto bloque
	/* ==================================================================================================== */

	// Cuarto bloque
	$reporte->SetXY(22,151);
	$reporte->Cell(236,18,"",1,1);

	// Cuadro de titulo
	$reporte->SetXY(24,153);
	$reporte->Cell(20,14,"",1,1);

	$reporte->SetXY(24,157);
	$reporte->MultiCell(20,6,"Divorcio",0,"C");

	// 13. Causal del divorcio
	$reporte->SetXY(46,153);
	$reporte->Cell(115,14,"",1,1);

	// 14. Fecha del matrimonio
	// 15. Número de hijos
	$reporte->SetXY(163,153);
	$reporte->Cell(93,14,"",1,1);

	/* ==================================================================================================== *
	 * Armar el quinto bloque
	/* ==================================================================================================== */

	// Quinto bloque
	$reporte->SetXY(22,171);
	$reporte->Cell(236,22,"",1,1);

	// Cuadro de titulo
	$reporte->SetXY(24,173);
	$reporte->Cell(20,18,"",1,1);

	$reporte->SetXY(24,179);
	$reporte->MultiCell(20,6,"Otros",0,"C");

	// 16. fecha del registro
	// 17. Observaciones
	$reporte->SetXY(46,173);
	$reporte->Cell(115,18,"",1,1);

	// 18. Nombre, firma y sello del Registrador/a del Estado Familiar
	$reporte->SetXY(163,173);
	$reporte->Cell(93,18,"",1,1);

	/* ==================================================================================================== *
	 * Armar el encabezado
	/* ==================================================================================================== */

	$MARCO = 0;

	$reporte->SetFont("Arial","B",12);
	$reporte->SetXY(20,20);
	$reporte->Cell(0,13,utf8_decode("CERTIFICADO DE DIVORCIO"),0,0,"C");

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
	
	// 1. Lugar del Divorcio
	$reporte->SetXY(48,35);
	$reporte->Cell(34,6,"1. Lugar del Divorcio: ",$MARCO,1);

	$reporte->setfont("Arial","");

	$reporte->SetX(51);
	$reporte->Cell(25,6,"Departamento: ",$MARCO,1,1);

	$reporte->SetX(51);
	$reporte->Cell(25,6,"Municipio: ",$MARCO,1,1);

	// 2. Fecha del fallo
	$reporte->setfont("Arial","B");

	$reporte->SetXY(165,35);
	$reporte->Cell(34,6,"2. Fecha del fallo: ",$MARCO,1,1);

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

	// 3. Nombre y apellido del esposo
	$reporte->SetXY(48,61);
	$reporte->Cell(45,6,"3. Nombre y apellido del esposo: ",$MARCO,1);

	// 4. Edad
	$reporte->SetXY(143,61);
	$reporte->Cell(16,6,"4. Edad: ",$MARCO,1);

	// 5. Sabe leer y escribir
	$reporte->SetXY(48,77);
	$reporte->Cell(31,6,utf8_decode("5. Sabe leer y escribir: "),$MARCO,1);

	// 6. Ocupación actual
	$reporte->SetXY(48,87);
	$reporte->Cell(29,6,utf8_decode("6. Ocupación actual: "),$MARCO,1);

	// 7. Lugar de residencia actual
	$reporte->SetXY(165,61);
	$reporte->Cell(41,6,"7. Lugar de residencia actual: ",$MARCO,1);

	$reporte->setfont("Arial","");

	$reporte->SetX(168);
	$reporte->Cell(25,6,"Departamento: ",$MARCO,1);

	$reporte->SetX(168);
	$reporte->Cell(25,6,"Municipio: ",$MARCO,1);

	$reporte->SetX(168);
	$reporte->Cell(25,6,utf8_decode("Cantón: "),$MARCO,1);

	$reporte->setfont("Arial","B");

	$reporte->SetXY(168,92);
	$reporte->Cell(16,6,utf8_decode("Área: "),$MARCO,1);

	

	/* ==================================================================================================== *
	 * Encabezados del tercer bloque
	/* ==================================================================================================== */

	$reporte->setfont("Arial","B");

	// 8. Nombre y apellido de la esposa
	$reporte->SetXY(48,107);
	$reporte->Cell(48,6,"8. Nombre y apellido de la esposa: ",$MARCO,1);

	// 9. Edad
	$reporte->SetXY(143,107);
	$reporte->Cell(16,6,"9. Edad: ",$MARCO,1);

	// 10. Sabe leer y escribir
	$reporte->SetXY(48,123);
	$reporte->Cell(31,6,utf8_decode("10. Sabe leer y escribir: "),$MARCO,1);

	// 11. Ocupación actual
	$reporte->SetXY(48,133);
	$reporte->Cell(29,6,utf8_decode("11. Ocupación actual: "),$MARCO,1);

	// 12. Lugar de residencia actual
	$reporte->SetXY(165,107);
	$reporte->Cell(41,6,"12. Lugar de residencia actual: ",$MARCO,1);

	$reporte->setfont("Arial","");

	$reporte->SetX(168);
	$reporte->Cell(25,6,"Departamento: ",$MARCO,1);

	$reporte->SetX(168);
	$reporte->Cell(25,6,"Municipio: ",$MARCO,1);

	$reporte->SetX(168);
	$reporte->Cell(25,6,utf8_decode("Cantón: "),$MARCO,1);

	$reporte->setfont("Arial","B");

	$reporte->SetXY(168,138);
	$reporte->Cell(16,6,utf8_decode("Área: "),$MARCO,1);

	/* ==================================================================================================== *
	 * Encabezados del tercer bloque
	/* ==================================================================================================== */

	// 13. Causal del divorcio
	$reporte->SetXY(48,153);
	$reporte->Cell(33,6,utf8_decode("13. Causal del divorcio: "),$MARCO,1);

	// 14. Fecha del matrimonio
	$reporte->SetXY(165,153);
	$reporte->Cell(37,6,utf8_decode("14. Fecha del matrimonio: "),$MARCO,1);

	// 15. Número de hijos
	$reporte->SetX(165);
	$reporte->Cell(30,6,utf8_decode("15. Número de hijos: "),$MARCO,1);

	/* ==================================================================================================== *
	 * Encabezados del cuarto bloque
	/* ==================================================================================================== */

	// 16. Fecha del registro
	$reporte->SetXY(48,173);
	$reporte->Cell(31,6,utf8_decode("16. Fecha de registro: "),$MARCO,1);

	// 17. Observaciones
	$reporte->SetXY(48,179);
	$reporte->Cell(28,6,utf8_decode("17. Observaciones: "),$MARCO,1);

	// 18. Nombre, firma, sello del registrador/a del estado familiar
	$reporte->SetXY(165,173);
	$reporte->Cell(86,6,utf8_decode("18. Nombre, firma y sello del Registrador/a del Estado Familiar: "),$MARCO,1);


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

	// 	1. Lugar del Divorcio
	$reporte->SetXY(76,41);
	$reporte->Cell(83,6,utf8_decode($dep_div),$MARCO,1);

	$reporte->SetXY(76,47);
	$reporte->Cell(83,6,utf8_decode($mun_div),$MARCO,1);

	// 2. Fecha del fallo
	list($ano_div, $mes_div, $dia_div) = explode("-", $fec_div);

	$reporte->SetXY(174,41);
	$reporte->Cell(19,6,utf8_decode($dia_div),$MARCO,0);
	$reporte->SetX(200);
	$reporte->Cell(18,6,utf8_decode(mesATexto($mes_div)),$MARCO,0);
	$reporte->SetX(225);
	$reporte->Cell(18,6,utf8_decode($ano_div),$MARCO,0);

	/* ==================================================================================================== *
	 * Imprimir los datos del segundo bloque
	/* ==================================================================================================== */

	// 3. Nombre y apellido del esposo
	$reporte->SetXY(48,67);
	$reporte->Cell(91,6,utf8_decode($nom_eso . " " . $ape1_eso . " " . $ape2_eso),$MARCO,1);

	// 4. Edad
	$reporte->SetXY(143,67);
	$reporte->Cell(16,6,utf8_decode($eda_eso),$MARCO,1);

	// 7. Sabe leer y escribir
	if ($alf_eso = "S") $alf_eso = "Si";
	else if ($alf_eso = "N") $alf_eso = "No";
	$reporte->SetXY(79,77);
	$reporte->Cell(25,6,utf8_decode($alf_eso),$MARCO,1);

	// 8. Ocupación actual
	$reporte->SetXY(48,93);
	$reporte->Cell(111,6,utf8_decode($ocu_eso),$MARCO,1);

	// // 5. Lugar de residencia
	$reporte->SetXY(193,67);
	$reporte->Cell(61,6,utf8_decode($dep_res_eso),$MARCO,1);

	$reporte->SetX(193);
	$reporte->Cell(61,6,utf8_decode($mun_res_eso),$MARCO,1);

	$reporte->SetX(193);
	$reporte->Cell(61,6,utf8_decode($can_res_eso),$MARCO,1);

	// 5b. Area
	if($are_res_eso = "R")$are_res_eso = "Rural";
	else if($are_res_eso ="U")$are_res_eso = "Urbana";
	$reporte->SetXY(184,92);
	$reporte->Cell(16,6,utf8_decode($are_res_eso),$MARCO,1);

	

	/* ==================================================================================================== *
	 * Imprimir los datos del tercer bloque
	/* ==================================================================================================== */

	// 3. Nombre y apellido del esposo
	$reporte->SetXY(48,113);
	$reporte->Cell(91,6,utf8_decode($nom_esa . " " . $ape1_esa . " " . $ape2_esa),$MARCO,1);

	// 4. Edad
	$reporte->SetXY(143,113);
	$reporte->Cell(16,6,utf8_decode($eda_esa),$MARCO,1);

	// 7. Sabe leer y escribir
	if ($alf_esa = "S") $alf_esa = "Si";
	else if ($alf_esa = "N") $alf_esa = "No";
	$reporte->SetXY(79,123);
	$reporte->Cell(25,6,utf8_decode($alf_esa),$MARCO,1);

	// 8. Ocupación actual
	$reporte->SetXY(48,139);
	$reporte->Cell(111,6,utf8_decode($ocu_esa),$MARCO,1);

	// // 5. Lugar de residencia
	$reporte->SetXY(193,113);
	$reporte->Cell(61,6,utf8_decode($dep_res_esa),$MARCO,1);

	$reporte->SetX(193);
	$reporte->Cell(61,6,utf8_decode($mun_res_esa),$MARCO,1);

	$reporte->SetX(193);
	$reporte->Cell(61,6,utf8_decode($can_res_esa),$MARCO,1);

	// 5b. Area
	if($are_res_esa = "R")$are_res_esa = "Rural";
	else if($are_res_esa ="U")$are_res_esa = "Urbana";
	$reporte->SetXY(184,138);
	$reporte->Cell(16,6,utf8_decode($are_res_esa),$MARCO,1);
	
	/* ==================================================================================================== *
	 * Imprimir los datos del cuarto bloque
	/* ==================================================================================================== */

	// 13. Causal del divorcio
	$reporte->SetXY(48,159);
	$reporte->Cell(111,6,utf8_decode($cau_div),$MARCO,1);

	// 14. Fecha del matrimonio
	list($ano_mat, $mes_mat, $dia_mat) = explode("-", $fec_mat);
	$reporte->SetXY(202,153);
	$reporte->Cell(52,6,utf8_decode($dia_mat . " de " . mesATexto($mes_mat) . " del " . $ano_mat),$MARCO,1);

	// 15. Número de hijos
	$reporte->SetXY(195,159);
	$reporte->Cell(59,6,utf8_decode($num_hij),$MARCO,1);

	/* ==================================================================================================== *
	 * Imprimir los datos del quinto bloque
	/* ==================================================================================================== */

	// 16. Causal del divorcio
	list($ano_reg, $mes_reg, $dia_reg) = explode("-", $fec_reg);
	$reporte->SetXY(79,173);
	$reporte->Cell(80,6,utf8_decode($dia_reg . " de " . mesATexto($mes_reg) . " del " . $ano_reg),$MARCO,1);

	// 17. Observaciones
	$reporte->SetXY(76,179);
	$reporte->MultiCell(83,6,utf8_decode($obs),$MARCO,1);

	// 18. Nombre, firma y sello del Registrador/a del Estado Familiar:
	$reporte->SetXY(165,179);
	$reporte->Cell(89,6,utf8_decode($nom_reg),$MARCO,1);


	$reporte->Output();

?>