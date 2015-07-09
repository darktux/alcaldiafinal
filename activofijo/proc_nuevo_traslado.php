<?php	
	include ("../php/conexion.php");
	$conn=conectar();
	switch ($_POST['caso']) {

		case '1':
			$sql="select * from af_depto";
			$rs=pg_query($sql);
			if($rs){
				$numRow=pg_num_rows($rs);
				echo "<select name='depto' id='depto'>
						<option value='0'>Seleccione...</option>";

				for ($i=0; $i < $numRow; $i++) {
					$row=pg_fetch_array($rs,$i);
					$cod= $row['cod'];
					$nom= $row['nom'];

					echo "<option value=".$cod.">".$nom."</option>";
				}
				echo "</select>";
			}
			pg_close($conn);
		break;

		case '2':
			$sql="insert into af_depto(nom) values('$_POST[nombre]')";
			$hecho=pg_query($sql);
			if($hecho){
				echo "Insertado";
			}else{
				echo "Ha sucedido un Error ".pg_last_error();
			}	
			pg_close($conn);
		break;

		case '3':
			if($_POST['radBus']=='codigo'){
				$sql="select a.cod_act,a.nom,a.mar,a.fec_adq from af_activo a where a.act='t' and a.cod_act ilike '%$_POST[txtBus]%' order by a.cod_act";				
			}
			else{
				$sql="select a.cod_act,a.nom,a.mar,a.fec_adq from af_activo a where a.act='t' and a.nom ilike '%$_POST[txtBus]%' order by a.cod_act";	
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
			$sql="SELECT a.cod_act,a.nom,b.new_ubi FROM af_activo a inner join af_traslados b on a.cod_act=b.cod_act WHERE a.cod_act='$_POST[cod_act]'";
			$rs3=pg_query($sql) or die("Error en la búsqueda");
			$datper = array();
			while ($obj=pg_fetch_object($rs3)){
				$datper[]=array(
					'cod_act'=>$obj->cod_act,
					'nom'=>$obj->nom,
					'new_ubi'=>$obj->new_ubi
				);
			}
			echo ''.json_encode($datper).'';
		break;

		case '5':
			$sql="insert into af_traslados(cod_act,fec,des,new_ubi) values('$_POST[cod_act]','$_POST[fec]','$_POST[new_ubi]',$_POST[depto_tra])";
			$rs=pg_query($sql)or die("Error en la búsqueda");
			if($rs){echo "Guardado exitosamente";}
			else{ echo "Error";}
		break;
	}
?>