<?php
session_start();
include ("../php/conexion.php");
$conn=conectar();
switch ($_POST['caso']) {
	case '1':
		if($_POST['radBus']=='codigo'){
			$sql="select a.cod_act,a.nom,a.mar,a.fec_adq from af_activo a  where a.act='t' and a.cod_act ilike '%$_POST[txtBus]%' order by a.cod_act";				
		}
		else{
			$sql="select a.cod_act,a.nom,a.mar,a.fec_adq from af_activo a  where a.act='t' and a.nom ilike '%$_POST[txtBus]%' order by a.cod_act";	
		}
		$rs=pg_query($sql) or die("Error en la busqueda");
		$numRow=pg_num_rows($rs);

		for ($i=0; $i < $numRow; $i++) {
			$row=pg_fetch_array($rs,$i);
			$cod= $row['cod_act'];
			$nom= $row['nom'];
			$mar= $row['mar'];
			$dep= $row['fec_adq'];
			echo "<tr>
					<td>".$cod."</td>
					<td>".$nom."</td>
					<td>".$mar."</td>
					<td>".$dep."</td>
					<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaDatos('".$cod."')\"><i class='icon-ok'></i></a></td>
				</tr>";
		}		
		pg_close($conn);
	break;

	case '2':
			//$sql="SELECT a.*, b.nom as depto, c.nom as tfondo FROM af_tfondo c inner join af_activo a inner join af_depto b on a.cod_dep=b.cod on c.cod_tfondo=a.cod_tfondo WHERE cod_act='$_POST[cod_act]'";
			$sql="select a.cod_act,a.nom,extract(year from a.fec_adq) as anio_adq,a.cos_adq,a.tact,b.nom as nombre,b.anio from af_activo a inner join af_tactivo b on a.tact=b.cod  where a.act='t' and cod_act='$_POST[cod_act]'";	
			$rs=pg_query($sql) or die("Error en la búsqueda");
			$numRow=pg_num_rows($rs);

				for ($i=0; $i < $numRow; $i++) {
					$row=pg_fetch_array($rs,$i);

					$cod_act= $row['cod_act'];
				 	$nom= $row['nom'];
				 	$anio_adq= $row['anio_adq'];
				 	$cos_adq= $row['cos_adq'];
				 	$tact= $row['tact'];
				 	$nombre= $row['nombre'];
				 	$anio= $row['anio'];
			 	}		

				//echo "hola".$cod_act.$nom.$anio_adq.$cos_adq.$tact.$nombre.$anio;
			  $depre_anual=0;
			  $depre_acu=0;
			  $anio_fin=$anio_adq+$anio;
			  $depre_ca=$cos_adq/$anio;
			  $datAct = array();
			  while ($anio_adq<=$anio_fin){
			  	$datAct[]=array(
			  		$anio_adq,$depre_anual,$depre_acu,$cos_adq,
			  	);
			  	//echo $anio_adq."-".$depre_anual."-".$depre_acu."-".$cos_adq;
			  	$depre_anual=$depre_ca;
			  	$cos_adq=$cos_adq-$depre_anual;
			  	$depre_acu=$depre_acu+$depre_anual;
			  	$anio_adq=$anio_adq+1;
			  }
			echo ''.json_encode($datAct).'';
		break;

		case '3':
			$sql="select a.cod_act, a.nom from af_activo a where a.act='t' and a.cod_act='$_POST[cod_act]'";
			$rs=pg_query($sql) or die("Error en la búsqueda");
			$numRow=pg_num_rows($rs);

			for ($i=0; $i < $numRow; $i++) {
				$row=pg_fetch_array($rs,$i);
				$cod= $row['cod_act'];
				$nom= $row['nom'];

				echo "<h4>".$cod." ".$nom."<h4>";
			}		
		pg_close($conn);

		break;
}


?>