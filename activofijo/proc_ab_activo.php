<?php
include ("../php/conexion.php");
$conn=conectar();
switch ($_POST['caso']) {

	case '3':
		if($_POST['radBus']=='codigo'){
			$sql="select a.cod_act,a.nom,a.mar,a.fec_adq from af_activo a where a.act='t' and a.cod_act ilike '%$_POST[txtBus]%' order by a.cod_act";
		}
		else{
			$sql="select a.cod_act,a.nom,a.mar,a.fec_adq from af_activo a where a.act='t' and a.nom ilike '%$_POST[txtBus]%' order by a.cod_act";
			//inner join af_depto b on b.cod=a.cod_dep
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

		case '4':
			//$sql="SELECT a.*, b.nom as depto, c.nom as tfondo FROM af_tfondo c inner join af_activo a inner join af_depto b on a.cod_dep=b.cod on c.cod_tfondo=a.cod_tfondo WHERE cod_act='$_POST[cod_act]'";
			$sql="SELECT * FROM af_activo a WHERE cod_act='$_POST[cod_act]'";
			$rs3=pg_query($sql) or die("Error en la búsqueda");
			$datper = array();
			while ($obj=pg_fetch_object($rs3)){
				$datper[]=array(
					'cod_act'=>$obj->cod_act,
					'nom'=>$obj->nom,
					'mar'=>$obj->mar,
					'mod'=>$obj->mod,
					'ser'=>$obj->ser,
					'cos_adq'=>$obj->cos_adq,
					'fec_adq'=>$obj->fec_adq,
					'cod_dep'=>$obj->cod_dep,
					'cod_tfondo'=>$obj->cod_tfondo,
					'ori'=>$obj->ori,
					'fec_gar'=>$obj->fec_gar,
					'don'=>$obj->don
				);
			}
			echo ''.json_encode($datper).'';
		break;

		case '5':
			$sql="Update af_activo set act='0' where cod_act='$_POST[cod_act]'";
			$rs=pg_query($sql) or die("Error en la busqueda");
			if($rs){ echo "actualizado";
				$sql="insert into af_descargo(des,cod_act,fec) values('".$_POST['mot']."','".$_POST['cod_act']."','".$_POST['fec_des']."')";
				pg_query($sql) or die("Error al ingresar motivo");
			}		
			else{echo "error al actualizar";}
		break;
}
?>