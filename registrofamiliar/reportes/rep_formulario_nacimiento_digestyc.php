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
	$consulta = "SELECT * FROM rf_nacimiento_digestyc WHERE (num_lib, num_par) = ($_GET[num_lib], $_GET[num_par])";
	$resultado = pg_query($consulta);
	$registro = pg_fetch_array($resultado);

	// crear una variable por cada campo encontrado
	foreach($registro as $clave => $valor){
			if(is_string($x = $clave)){
				$$clave = $valor;
			}
		}

	$consulta = "SELECT * FROM rf_nacimiento_partida WHERE (num_lib, num_par) = ($_GET[num_lib], $_GET[num_par])";
	$resultado = pg_query($consulta);
	$registro = pg_fetch_array($resultado);

	// crear una variable por cada campo encontrado
	foreach($registro as $clave => $valor){
			if(is_string($x = $clave)){
				$$clave = $valor;
			}
		}


	$hor_min = substr($hor_min, 0, 5);
	list($ano_nac, $mes_nac, $dia_nac) = explode("-", $fec_nac);
	$mes_nac = mesATexto($mes_nac);
	$sex = decodificarSexo($sex);

	list($ano_reg, $mes_reg, $dia_reg) = explode("-", $fec);
	$txt_mes_reg = mesATexto($mes_reg);
	$fec_reg = $dia_reg . " de " . $txt_mes_reg . " del " . $ano_reg;


		$PHPJasperXML->arrayParameter=array(
		"num_lib"=>$_GET[num_lib], 
		"num_par"=>$_GET[num_par],
		"hor_min"=>$hor_min,
		"dia_nac"=>$dia_nac,
		"mes_nac"=>$mes_nac,
		"ano_nac"=>$ano_nac,
		"loc_nac"=>$loc_nac,
		"can_nac"=>$can_nac,
		"sex"=>$sex,
		"pes_nac"=>$pes_nac,
		"tal"=>$tal,
		"cla_par"=>$cla_par,
		"tip_par"=>$tip_par,
		"nom_asi"=>$nom_asi,
		"car_asi"=>$car_asi,
		"dur_emb"=>$dur_emb,
		"est_fam"=>$est_fam,
		"alf_mad"=>$alf_mad,
		"can_res"=>$can_res,
		"are_res"=>$are_res,
		"hij_nac_viv"=>$hij_nac_viv,
		"hij_mue"=>$hij_mue,
		"hij_nac_mue"=>$hij_mue,
		"alf_pad"=>$alf_pad,
		"fec_reg"=>$fec_reg/*, 
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
		"txt_fec"=>$txt_fec*/);

			$archivo="../../reportes/registrofamiliar/rep_formulario_nacimiento_digestyc.jrxml";
			$PHPJasperXML->load_xml_file($archivo);
			$PHPJasperXML->transferDBtoArray("localhost","admin","admin","db_alcaldia","psql");
			$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
?>