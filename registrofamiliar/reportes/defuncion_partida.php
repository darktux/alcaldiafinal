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
	$consulta = "SELECT * FROM rf_defuncion_partida WHERE (num_lib, num_par) = ($_GET[num_lib], $_GET[num_par])";
	$resultado = pg_query($consulta);
	$registro = pg_fetch_array($resultado);

	// crear una variable por cada campo encontrado
	foreach($registro as $clave => $valor){
			if(is_string($x = $clave)){
				$$clave = $valor;
			}
		}

	// Transformar los campos necesarios
	$num_par = numeroATexto($num_par);
	$sex = decodificarSexo($sex);
	$eda = numeroATexto($eda);

	$hor_def = horaATexto(substr($hor_min, 0, 2));
	$min_def = minutoATexto(substr($hor_min, 3, 2));

	$dui = duiATexto($dui);

	list($ano_def, $mes_def, $dia_def) = explode("-", $fec_def);
	$dia_def = diaATexto($dia_def);
	$mes_def = mesATexto($mes_def);
	$ano_def = numeroATexto($ano_def);

	$dui_inf = duiATexto($dui_inf);

	list($ano_reg, $mes_reg, $dia_reg) = explode("-", $fec_reg);
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
	"\n\nCERTIFICA: Que en la página $num_pag, del libro No. $num_lib, de PARTIDAS DE DEFUNCIONES, " .
	"tomo $num_tom, del año, $ano_lib, se encuentra la que literalmente dice:::::::::::::::::::::::::::::::::::" .

	// Datos del Difunto
	"\n\nPartida número $num_par Nombre del fallecido: $nom $ape1 $ape2 sexo $sex de $eda años de edad. Estado " .
	"familiar $est_fam ";

	if ($nom_con != "") {
		$cuerpo .= "Nombre del cónyugue: $nom_con ";
	}

	$cuerpo .= "profesión u oficio del fallecido: $ocu ";

	if ($sex == "F"  or $sex == "femenino") {
		$cuerpo .= "Originaria ";
	} else{
		$cuerpo .= "Originario ";
	}

	$cuerpo .= "de $mun_org Departamento de $dep_org Domicilio $mun_res Departamento de $dep_res Residente en " .
	"$canlug_res jurisdicción de $jur Y de Nacionalidad $nac. Documento Unico de Identidad del fallecido, número " .
	"$dui Falleció en $loc_def, $canlug_def Municipio de $mun_def Departamento de $dep_def a las $hor_def horas  y " .
	"$min_def Minutos del día $dia_def de $mes_def del año $ano_def. ";

	if ($asi_med == "f") {
		$cuerpo .= "sin ";
	}else{
		$cuerpo .= "con ";
	}

	$cuerpo .= "asistencia médica, a consecuencia de $cau_def ";

	if ($nom_pro != "") {
		$cuerpo .= "Nombre del profesional que determinó la causa: $nom_pro Cargo: $car_pro J.V.P.M. No. $jvpm ";
	}

	if ($nom_mad) {
		$cuerpo .= "Nombre de la madre: $nom_mad. ";
	}

	if ($nom_pad) {
		$cuerpo .= "Nombre del padre: $nom_pad. ";
	}

	$cuerpo .= "Fue sepultado en Cementerio $cem Dio los datos $inf con Documento Unico de Identidad número " .
	"$dui_inf manifestando ser $par_inf ";
	
	if ($sex == "F"  or $sex == "femenino") {
		$cuerpo .= "de la fallecida. ";
	}else{
		$cuerpo .= "del fallecido. ";
	}

	$cuerpo .= "Y firmó.- Firman los testigos de su conocimiento: $nom_tes1 con Documento Unico de Identidad " .
	"número $dui_tes1 Y $nom_tes2 con Documento Unico de Identidad número $dui_tes2 Alcaldia Municipal Villa San" .
	"Cristóbal, Departamento de Cuscatlán, $dia_reg de $mes_reg del año $ano_reg.";

	if ($enm != "") {
		$cuerpo .= " $enm.";
	}

	$cuerpo .= "\n\nEs conforme con su original, la que se confrontó y para efectos legales, se extiende la " .
	"presente, en la Alcaldía Municipal, Villa San Cristóbal, $dia_act de $mes_act del año $ano_act.";




	$PHPJasperXML->arrayParameter=array("logoes"=>$logoes,"logoal"=>$logoal,"fechaReporte"=>$fecha, 
		"num_lib"=>$_GET[num_lib], "num_par"=>$_GET[num_par], "cuerpo"=>$cuerpo);

			$archivo="../../reportes/registrofamiliar/defuncion_partida.jrxml";
			$PHPJasperXML->load_xml_file($archivo);
			$PHPJasperXML->transferDBtoArray("localhost","admin","admin","db_alcaldia","psql");
			$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
?>