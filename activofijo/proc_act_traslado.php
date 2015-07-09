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
				$sql="SELECT a.cod_act,b.nom as nombre,a.fec,c.nom as depto,a.cod_tra FROM AF_TRASLADOS a, AF_ACTIVO b, AF_DEPTO c where a.cod_act=b.cod_act and c.cod=a.new_ubi and b.act='t' and b.cod_act ilike '%$_POST[txtBus]%' order by a.cod_act";				
			}
			else{
				$sql="SELECT a.cod_act,b.nom as nombre,a.fec,c.nom as depto,a.cod_tra FROM AF_TRASLADOS a, AF_ACTIVO b, AF_DEPTO c where a.cod_act=b.cod_act and c.cod=a.new_ubi and b.act='t' and b.nom ilike '%$_POST[txtBus]%' order by b.cod_act";	
			}
			$rs=pg_query($sql) or die("Error en la busqueda");
			$numRow=pg_num_rows($rs);

			for ($i=0; $i < $numRow; $i++) {
				$row=pg_fetch_array($rs,$i);
				$cod_tra=$row['cod_tra'];
				$cod= $row['cod_act'];
				$nom= $row['nombre'];
				$fec= $row['fec'];
				$dep= $row['depto'];
				echo "<tr>
						<td>".$cod."</td>
						<td>".$nom."</td>
						<td>".$fec."</td>
						<td>".$dep."</td>
						<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaDatos('".$cod_tra."')\"><i class='icon-ok'></i></a></td>
					</tr>";
			}		
			pg_close($conn);
		break;

		case '4':
			//$sql="SELECT a.*, b.nom as depto, c.nom as tfondo FROM af_tfondo c inner join af_activo a inner join af_depto b on a.cod_dep=b.cod on c.cod_tfondo=a.cod_tfondo WHERE cod_act='$_POST[cod_act]'";
			$sql="SELECT a.cod_act,b.nom as nombre,a.fec,a.des,a.new_ubi,a.cod_tra FROM AF_TRASLADOS a, AF_ACTIVO b, AF_DEPTO c where a.cod_act=b.cod_act and c.cod=a.new_ubi and b.act='t' and a.cod_tra='$_POST[cod_tra]' order by b.cod_act";
			$rs3=pg_query($sql) or die("Error en la búsqueda");
			$datper = array();
			while ($obj=pg_fetch_object($rs3)){
				$datper[]=array(
					'cod_act'=>$obj->cod_act,
					'nombre'=>$obj->nombre,
					'fec'=>$obj->fec,
					'des'=>$obj->des,
					'new_ubi'=>$obj->new_ubi,
					//'cod_dep'=>$obj->cod_dep,
					'cod_tra'=>$obj->cod_tra
				);
			}
			echo ''.json_encode($datper).'';
		break;

		case '5':
			$sql="update af_traslados set fec='$_POST[fec]', new_ubi='$_POST[depto_tra]', des='$_POST[new_ubi]' where cod_tra='$_POST[cod_tra]'";
			$rs=pg_query($sql)or die("Error en la búsqueda");
			if($rs){echo "Actualizacion exitosa";}
			else{ echo "Error al actualizar";}
		break;
	}
?>