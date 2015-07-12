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

		$fec_hor=date("Y-m-d H:i:s");
				$msj="Cobro certificación de partida de nacimiento: ". $nom;
				if(pg_query("INSERT INTO co_notificacion(mensaje,fec_hor,status) VALUES('$msj','$fec_hor','t')") or die("Error al ingresar")){
					//echo "Guardado exitosamente";
				}

	// Transformar los campos necesarios
	$num_par = numeroATexto($num_par);
	$sex = decodificarSexo($sex);

	$hor_nac = horaATexto(substr($hor_min, 0, 2));
	$min_nac = minutoATexto(substr($hor_min, 3, 2));

	list($ano_nac, $mes_nac, $dia_nac) = explode("-", $fec_nac);
	$dia_nac = diaATexto($dia_nac);
	$mes_nac = mesATexto($mes_nac);
	$ano_nac = numeroATexto($ano_nac);

	$eda_mad = numeroATexto($eda_mad);
	$num_doc_mad = duiATexto($num_doc_mad);

	$eda_pad = numeroATexto($eda_pad);
	$num_doc_pad = duiATexto($num_doc_pad);

	$num_doc_inf = duiATexto($num_doc_inf);

	list($ano_reg, $mes_reg, $dia_reg) = explode("-", $registro[fec]);
	$dia_reg = diaATexto($dia_reg);
	$mes_reg = mesATexto($mes_reg);
	$ano_reg = numeroATexto($ano_reg);

	list($ano_act, $mes_act, $dia_act) = explode("-", date("Y-m-d"));
	$dia_act = diaATexto($dia_act);
	$mes_act = mesATexto($mes_act);
	$ano_act = numeroATexto($ano_act);



	$cuerpo = 
	// Titulo
	"EL INFRASCRITO JEFE DEL REGISTRO DEL ESTADO FAMILIAR." .

	// Datos del Registro
	"\n\nCERTIFICA: Que en la página $num_pag, del libro No. $num_lib, de PARTIDAS DE NACIMIENTOS, " .
	"tomo 1, del año, $ano_lib, se encuentra la que literalmente dice:::::::::::::::::::::::::::::::::::" .

	// Datos del recien Nacido
	"\n\nPartida número $num_par: $nom; sexo $sex, nació en: $lug_nac, " . 
	"municipo de: $mun_nac, departamento de: $dep_nac, a las $hor_nac horas y $min_nac minutos, " .
	"del día $dia_nac del mes de $mes_nac del año $ano_nac, siendo hijo, de $nom_mad $ape1_mad " .
	"$ape2_mad de $eda_mad años de edad, de profesión $ocu_mad originaria del municipio " .
	"de $mun_ori_mad, departamento de $dep_ori_mad, del domicilio de $mun_res_mad, " .
	"departamento de $dep_res_mad, de nacionalidad $nac_mad, quien se identifica por medio de " .
	"$doc_mad número $num_doc_mad; " .
	// Datos del Padre
	"y de $nom_pad $ape1_pad " .
	"$ape2_pad, de $eda_pad años de edad de profesión $ocu_pad, originario del " .
	"municipio de $mun_ori_pad, departamento de $dep_ori_pad, del domicilio de " .
	"$mun_res_pad, departamento de $dep_res_pad, de nacionalidad $nac_pad quien se ".
	"identifica por medio de $doc_pad número $num_doc_pad. ".
	// Datos del Informante
	"Dio estos datos $nom_inf $ape1_inf $ape2_inf, quien se identifica por medio de " .
	"$doc_inf número $num_doc_inf, manifestando ser $par_inf del recien nacido " .
	"y para constancia firma. Alcaldía Municipal, Villa San Cristóbal, Cuscatlán $dia_reg de $mes_reg de $ano_reg.";
	
	
	// verificar si hay marginaciones
	$consulta2 = "SELECT * FROM rf_marginacion WHERE (num_lib,num_par,tip) = ('$_GET[num_lib]','$_GET[num_par]','nacimiento')";
	$resultado2 = pg_query($consulta2);
	if(pg_num_rows($resultado2)>0){
		
		$cuerpo .= "\n\nAl margen de la partida se lee: "; 
		while ($registro2 = pg_fetch_array($resultado2)) {
			$cuerpo .= "\n" . $registro2[cue];
		}
	}

	$cuerpo .="\n\nEs conforme con su original, la que se confrontó y para efectos legales, se extiende la presente, en la Alcaldía " .
	"Municipal, Villa San Cristóbal, $dia_act de $mes_act del año $ano_act.";


	$PHPJasperXML->arrayParameter=array("logoes"=>$logoes,"logoal"=>$logoal,"fechaReporte"=>$fecha, 
	"num_lib"=>$_GET[num_lib], "num_par"=>$_GET[num_par], "cuerpo"=>$cuerpo);
	
			$archivo="../../reportes/registrofamiliar/nacimiento_partida.jrxml";
			$PHPJasperXML->load_xml_file($archivo);
			$PHPJasperXML->transferDBtoArray("localhost","admin","admin","db_alcaldia","psql");
			$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file

			
?>