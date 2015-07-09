<?php 
	include_once("../php/class/tcpdf/tcpdf.php");
	include_once("../php/class/PHPJasperXML.inc.php");
	include('../php/conexion.php');
	$conn=conectar();

	$logoal="../img/logoal.jpg";
	$logoes="../img/logoes.jpg";
	date_default_timezone_set('America/El_Salvador');
	$dias=array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
	$meses=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

	$fecha=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]." de ".date("Y");
	$hora=date("H:i");
	$hora=$hora;
	$id=$_GET['cod_con'];
	$idneg=$_GET['cod_neg'];
	$tip_con=$_GET['tip_con'];
	$numRec=$_GET['num_rec'];
	$fec_rec=$_GET['fec_rec'];
	$mesPagado="";

	$sql="SELECT a.cod_estcta, a.fec_pag FROM co_fecpag_neg a,co_estcta_neg b WHERE a.cod_estcta=b.cod_estcta and b.cod_neg='$idneg' ORDER BY a.cod_estcta";
	$rsc=pg_query($sql);
	$ult_fec="";
	while($row=pg_fetch_array($rsc)){
		$ult_fec=$row['fec_pag'];
	}
	if(strstr($ult_fec, '/')){
		$ult_fec=substr($ult_fec, 3,4);
		$ult_fec=intval($ult_fec);
		$mesPagado=$meses[$ult_fec-1];
	}else{
		$mesPagado=$ult_fec;
	}

	$PHPJasperXML = new PHPJasperXML();
	$PHPJasperXML->debugsql=false;
	$PHPJasperXML->arrayParameter=array("idcon"=>$id,"idneg"=>$idneg,"fechaReporte"=>$fecha,"horaReporte"=>$hora,"mesPagado"=>$mesPagado,"numRec"=>$numRec,"fecRec"=>$fec_rec);
	if($tip_con=="N")
		$archivo="../reportes/catastro/form_cierre.jrxml";
	else
		$archivo="../reportes/catastro/form_cierre_jur.jrxml";
	$PHPJasperXML->load_xml_file($archivo);
	$PHPJasperXML->transferDBtoArray("localhost","postgres","root","db_alcaldia","psql");
	$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
?>