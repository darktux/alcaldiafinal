<?php 
	include_once("../../php/class/tcpdf/tcpdf.php");
	include_once("../../php/class/PHPJasperXML.inc.php");
	$logoal="../img/logoal.jpg";
	$logoes="../img/logoes.jpg";
	$fecha=date("d/m/Y");
	$PHPJasperXML = new PHPJasperXML();
	$PHPJasperXML->debugsql=false;
	
	/* ==================================================================================================== *
	 * Armar el cuerpo de la partida
	 * ==================================================================================================== */
	require_once("../../php/conexion.php");
	require_once("../php/funciones.php");
	$conexion =  conectar();
	$consulta = "SELECT * FROM rf_nacimiento_partida WHERE (num_lib, num_par) = ($_GET[num_lib], $_GET[num_par])";
	$resultado = pg_query($consulta);
	$registro = pg_fetch_array($resultado);

	// crear una variable por cada campo encontrado
	foreach($registro as $clave => $valor){
			if(is_string($x = $clave)){
				$$clave = $valor;
			}
		}

	// Transformar los campos necesarios
	/*$num_par = numeroATexto($num_par);
	$sex = decodificarSexo($sex);

	

	
	
	

	list($ano_reg, $mes_reg, $dia_reg) = explode("-", $registro[fec]);
	$dia_reg = diaATexto($dia_reg);
	$mes_reg = mesATexto($mes_reg);
	$ano_reg = numeroATexto($ano_reg);

	list($ano_act, $mes_act, $dia_act) = explode("-", date("Y-m-d"));
	$dia_act = diaATexto($dia_act);
	$mes_act = mesATexto($mes_act);
	$ano_act = numeroATexto($ano_act);
	*/
	$txt_num_lib = numeroATexto($num_lib);
	$txt_ano_lib = numeroATexto($ano_lib);
	$txt_num_pag = numeroATexto($num_pag);
	$txt_num_par = numeroATexto($num_par);
	$txt_sex = decodificarSexo($sex);
	$txt_hor_nac = horaATexto(substr($hor_min, 0, 2));
	$txt_min_nac = minutoATexto(substr($hor_min, 3, 2));
	list($ano_nac, $mes_nac, $dia_nac) = explode("-", $fec_nac);
	$txt_dia_nac = diaATexto($dia_nac);
	$txt_mes_nac = mesATexto($mes_nac);
	$txt_ano_nac = numeroATexto($ano_nac);
	$txt_eda_mad = numeroATexto($eda_mad);
	$txt_num_doc_mad = duiATexto($num_doc_mad);
	$txt_eda_pad = numeroATexto($eda_pad);
	$txt_num_doc_pad = duiATexto($num_doc_pad);
	$txt_num_doc_inf = duiATexto($num_doc_inf);

	list($ano_vir, $mes_vir, $dia_vir) = explode("-", $registro[fec_vir_ase]);
	$txt_dia_vir = diaATexto($dia_vir);
	$txt_mes_vir = mesATexto($mes_vir);
	$txt_ano_vir = numeroATexto($ano_vir);

	list($ano_reg, $mes_reg, $dia_reg) = explode("-", $registro[fec]);
	$dia_reg = diaATexto($dia_reg);
	$mes_reg = mesATexto($mes_reg);
	$ano_reg = numeroATexto($ano_reg);

	$txt_fec = $dia_reg . " de " . $mes_reg . " de " . $ano_reg;

	/* ==================================================================================================== *
	 * Crear pdf con fpdfDF
	/* ==================================================================================================== */

	require_once("../../php/fpdf17/fpdf.php");

	$reporte = new FPDF("P","mm","letter");
	$reporte->SetMargins(20,20,20);
	$reporte->AddPage();
	$reporte->SetFont("Arial","",10);
	$reporte->SetAutoPageBreak(false);

	/* ==================================================================================================== *
	 * Armar los cuadros del formulario
	/* ==================================================================================================== */
	
	$MARGEN = 0;
	$DEFACE = -3;
	
	// linea 1
	$reporte->SetXY(83,28 + $DEFACE);
	$reporte->Cell(110,5,utf8_decode("Villa San Cristóbal"),$MARGEN);

	// linea 2
	$reporte->SetXY(45,35 + $DEFACE);
	$reporte->Cell(50,5,utf8_decode("Cuscatlán"),$MARGEN);

	$reporte->SetXY(122,35 + $DEFACE);
	$reporte->Cell(75,5,utf8_decode($txt_num_lib),$MARGEN);

	// linea 3
	$reporte->SetXY(25,41 + $DEFACE);
	$reporte->Cell(90,5,utf8_decode($txt_ano_lib),$MARGEN);

	$reporte->SetXY(129,41 + $DEFACE);
	$reporte->Cell(70,5,utf8_decode($txt_num_pag),$MARGEN);

	// linea 4
	$reporte->SetXY(43,46 + $DEFACE);
	$reporte->Cell(150,5,utf8_decode($txt_num_par),$MARGEN);

	// linea 5
	$reporte->SetXY(65,52 + $DEFACE);
	$reporte->Cell(90,5,utf8_decode($nom),$MARGEN);

	$reporte->SetXY(175,52 + $DEFACE);
	$reporte->Cell(25,5,utf8_decode($txt_sex),$MARGEN);

	// linea 6
	$reporte->SetXY(32,59 + $DEFACE);
	$reporte->Cell(165,5,utf8_decode($lug_nac),$MARGEN);

	// linea 7
	$reporte->SetXY(38,66 + $DEFACE);
	$reporte->Cell(90,5,utf8_decode($mun_nac),$MARGEN);

	$reporte->SetXY(164,66 + $DEFACE);
	$reporte->Cell(25,5,utf8_decode($dep_nac),$MARGEN);

	// linea 8
	$reporte->SetXY(27,73 + $DEFACE);
	$reporte->Cell(25,5,utf8_decode($txt_hor_nac),$MARGEN);

	$reporte->SetXY(70,73 + $DEFACE);
	$reporte->Cell(40,5,utf8_decode($txt_min_nac),$MARGEN);

	$reporte->SetXY(139,73 + $DEFACE);
	$reporte->Cell(60,5,utf8_decode($txt_dia_nac),$MARGEN);

	// linea 9
	$reporte->SetXY(35,79 + $DEFACE);
	$reporte->Cell(40,5,utf8_decode($txt_mes_nac),$MARGEN);

	$reporte->SetXY(93,79 + $DEFACE);
	$reporte->Cell(105,5,utf8_decode($txt_ano_nac),$MARGEN);

	//#####
	//##### Datos de la madre
	//#####

	// linea 10
	$reporte->SetXY(20,89 + $DEFACE);
	$reporte->Cell(65,5,utf8_decode($nom_mad),$MARGEN);

	$reporte->SetXY(88,89 + $DEFACE);
	$reporte->Cell(50,5,utf8_decode($ape1_mad),$MARGEN);

	$reporte->SetXY(144,89 + $DEFACE);
	$reporte->Cell(50,5,utf8_decode($ape2_mad),$MARGEN);

	// linea 11
	$reporte->SetXY(23,95 + $DEFACE);
	$reporte->Cell(40,5,utf8_decode($txt_eda_mad),$MARGEN);

	$reporte->SetXY(117,95 + $DEFACE);
	$reporte->Cell(80,5,utf8_decode($ocu_mad),$MARGEN);

	// linea 12
	$reporte->SetXY(47,102 + $DEFACE);
	$reporte->Cell(90,5,utf8_decode($mun_ori_mad),$MARGEN);

	$reporte->SetXY(145,102 + $DEFACE);
	$reporte->Cell(50,5,utf8_decode($dep_ori_mad),$MARGEN);

	// linea 13
	$reporte->SetXY(47,109 + $DEFACE);
	$reporte->Cell(90,5,utf8_decode($mun_res_mad),$MARGEN);

	$reporte->SetXY(145,109 + $DEFACE);
	$reporte->Cell(50,5,utf8_decode($dep_res_mad),$MARGEN);

	// linea 14
	$reporte->SetXY(47,115 + $DEFACE);
	$reporte->Cell(90,5,utf8_decode($nac_mad),$MARGEN);

	$reporte->SetXY(145,115 + $DEFACE);
	$reporte->Cell(50,5,utf8_decode($doc_mad),$MARGEN);

	// linea 15
	$reporte->SetXY(33,122 + $DEFACE);
	$reporte->Cell(160,5,utf8_decode($txt_num_doc_mad),$MARGEN);

	//#####
	//##### Datos del padre
	//#####

	// linea 16
	$reporte->SetXY(20,132 + $DEFACE);
	$reporte->Cell(65,5,utf8_decode($nom_pad),$MARGEN);

	$reporte->SetXY(88,132 + $DEFACE);
	$reporte->Cell(50,5,utf8_decode($ape1_pad),$MARGEN);

	$reporte->SetXY(144,132 + $DEFACE);
	$reporte->Cell(50,5,utf8_decode($ape2_pad),$MARGEN);

	// linea 17
	$reporte->SetXY(23,138 + $DEFACE);
	$reporte->Cell(40,5,utf8_decode($txt_eda_pad),$MARGEN);

	$reporte->SetXY(117,138 + $DEFACE);
	$reporte->Cell(80,5,utf8_decode($ocu_pad),$MARGEN);

	// linea 18
	$reporte->SetXY(47,146 + $DEFACE);
	$reporte->Cell(90,5,utf8_decode($mun_ori_pad),$MARGEN);

	$reporte->SetXY(145,146 + $DEFACE);
	$reporte->Cell(50,5,utf8_decode($dep_ori_pad),$MARGEN);

	// linea 19
	$reporte->SetXY(47,152 + $DEFACE);
	$reporte->Cell(90,5,utf8_decode($mun_res_pad),$MARGEN);

	$reporte->SetXY(145,152 + $DEFACE);
	$reporte->Cell(50,5,utf8_decode($dep_res_pad),$MARGEN);

	// linea 20
	$reporte->SetXY(47,159 + $DEFACE);
	$reporte->Cell(90,5,utf8_decode($nac_pad),$MARGEN);

	$reporte->SetXY(145,159 + $DEFACE);
	$reporte->Cell(50,5,utf8_decode($doc_pad),$MARGEN);

	// linea 21
	$reporte->SetXY(33,165 + $DEFACE);
	$reporte->Cell(160,5,utf8_decode($txt_num_doc_pad),$MARGEN);

	//#####
	//##### Datos del informante
	//#####

	// linea 22
	$reporte->SetXY(20,177 + $DEFACE);
	$reporte->Cell(65,5,utf8_decode($nom_inf),$MARGEN);

	$reporte->SetXY(88,177 + $DEFACE);
	$reporte->Cell(50,5,utf8_decode($ape1_inf),$MARGEN);

	$reporte->SetXY(144,177 + $DEFACE);
	$reporte->Cell(50,5,utf8_decode($ape2_inf),$MARGEN);

	// linea 23
	$reporte->SetXY(70,186 + $DEFACE);
	$reporte->Cell(55,5,utf8_decode($doc_inf),$MARGEN);

	// linea 24
	$reporte->SetXY(20,192 + $DEFACE);
	$reporte->Cell(100,5,utf8_decode($txt_num_doc_inf),$MARGEN);

	$reporte->SetXY(155,192 + $DEFACE);
	$reporte->Cell(45,5,utf8_decode($par_inf),$MARGEN);

	// linea 25
	$reporte->SetXY(70,201 + $DEFACE);
	$reporte->Cell(20,5,utf8_decode($fir),$MARGEN);

	$reporte->SetXY(167,201 + $DEFACE);
	$reporte->Cell(30,5,utf8_decode($ded),$MARGEN);

	// linea 26
	$reporte->SetXY(37,208 + $DEFACE);
	$reporte->Cell(30,5,utf8_decode($man),$MARGEN);

	$reporte->SetXY(110,208 + $DEFACE);
	$reporte->Cell(80,5,utf8_decode($vir_ase),$MARGEN);
//
	// linea 27
	$reporte->SetXY(34,214 + $DEFACE);
	$reporte->Cell(45,5,utf8_decode($txt_dia_vir),$MARGEN);

	$reporte->SetXY(87,214 + $DEFACE);
	$reporte->Cell(40,5,utf8_decode($txt_mes_vir),$MARGEN);

	$reporte->SetXY(132,214 + $DEFACE);
	$reporte->Cell(65,5,utf8_decode($txt_ano_vir),$MARGEN);

	//#####
	//##### Testigos
	//#####

	// linea 28
	$reporte->SetXY(84,221 + $DEFACE);
	$reporte->Cell(45,5,utf8_decode($dec_tes),$MARGEN);

	// linea 29
	$reporte->SetXY(20,228 + $DEFACE);
	$reporte->Cell(45,5,utf8_decode($nom_tes1),$MARGEN);

	$reporte->SetXY(88,228 + $DEFACE);
	$reporte->Cell(40,5,utf8_decode($ape1_tes1),$MARGEN);

	$reporte->SetXY(144,228 + $DEFACE);
	$reporte->Cell(65,5,utf8_decode($ape2_tes1),$MARGEN);

	// linea 30
	$reporte->SetXY(71,237 + $DEFACE);
	$reporte->Cell(50,5,utf8_decode($doc_tes1),$MARGEN);

	$reporte->SetXY(146,237 + $DEFACE);
	$reporte->Cell(50,5,utf8_decode($num_doc_tes1),$MARGEN);

	// linea 31
	$reporte->SetXY(20,243 + $DEFACE);
	$reporte->Cell(45,5,utf8_decode($nom_tes2),$MARGEN);

	$reporte->SetXY(88,243 + $DEFACE);
	$reporte->Cell(40,5,utf8_decode($ape1_tes2),$MARGEN);

	$reporte->SetXY(144,243 + $DEFACE);
	$reporte->Cell(65,5,utf8_decode($ape2_tes2),$MARGEN);

	// linea 32
	$reporte->SetXY(71,251 + $DEFACE);
	$reporte->Cell(50,5,utf8_decode($doc_tes2),$MARGEN);

	$reporte->SetXY(146,251 + $DEFACE);
	$reporte->Cell(50,5,utf8_decode($num_doc_tes2),$MARGEN);

	//#####
	//##### otros
	//#####

	// linea 33
	$reporte->SetXY(43,261 + $DEFACE);
	$reporte->Cell(150,5,utf8_decode($txt_fec),$MARGEN);



	/*
		"txt_eda_mad"=>$txt_eda_mad, 
		"txt_num_doc_mad"=>$txt_num_doc_mad, 
		"txt_eda_pad"=>$txt_eda_pad, 
		"txt_num_doc_pad"=>$txt_num_doc_pad, 
		"txt_num_doc_inf"=>$txt_num_doc_inf, 
		"txt_dia_vir"=>$txt_dia_vir, 
		"txt_mes_vir"=>$txt_mes_vir, 
		"txt_ano_vir"=>$txt_ano_vir, 
		"txt_fec"=>$txt_fec);*/








	$reporte->Output();




/*
	$PHPJasperXML->arrayParameter=array(
		"num_lib"=>$_GET[num_lib], 
		"num_par"=>$_GET[num_par], 
		"txt_num_lib"=>$txt_num_lib, 
		"txt_ano_lib"=>$txt_ano_lib, 
		"txt_num_par"=>$txt_num_par, 
		"txt_sex"=>$txt_sex, 
		"txt_hor_nac"=>$txt_hor_nac, 
		"txt_min_nac"=>$txt_min_nac, 
		"txt_dia_nac"=>$txt_dia_nac, 
		"txt_mes_nac"=>$txt_mes_nac, 
		"txt_ano_nac"=>$txt_ano_nac, 
		"txt_eda_mad"=>$txt_eda_mad, 
		"txt_num_doc_mad"=>$txt_num_doc_mad, 
		"txt_eda_pad"=>$txt_eda_pad, 
		"txt_num_doc_pad"=>$txt_num_doc_pad, 
		"txt_num_doc_inf"=>$txt_num_doc_inf, 
		"txt_dia_vir"=>$txt_dia_vir, 
		"txt_mes_vir"=>$txt_mes_vir, 
		"txt_ano_vir"=>$txt_ano_vir, 
		"txt_fec"=>$txt_fec);

			$archivo="../../reportes/registrofamiliar/formulario_nacimiento_partida.jrxml";
			$PHPJasperXML->load_xml_file($archivo);
			$PHPJasperXML->transferDBtoArray("localhost","admin","admin","db_alcaldia","psql");
			$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
*/
?>