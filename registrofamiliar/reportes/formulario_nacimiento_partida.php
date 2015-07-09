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
?>