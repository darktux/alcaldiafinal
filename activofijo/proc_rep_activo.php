<?
include_once('../php/class/tcpdf/tcpdf.php');
include_once("../php/class/PHPJasperXML.inc.php");

$logoalurl="../img/logoal.jpg";
$logoesurl="../img/logoes.jpg";

$PHPJasperXML = new PHPJasperXML();
//$PHPJasperXML->debugsql=false;
$PHPJasperXML->arrayParameter=array("logoal"=>$logoalurl, "logoes"=>$logoesurl);
$PHPJasperXML->load_xml_file("../reportes/activo/report2.jrxml");

$PHPJasperXML->transferDBtoArray("localhost","postgres","root","db_alcaldia","psql");
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file

?>