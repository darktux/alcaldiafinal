<?php
	include ("../php/conexion.php");
	$conn=conectar();
	switch ($_POST['caso']) {


		case '1':
		 $sql="select cod_emp,nom from af_empresa";
		 $rs=pg_query($sql) or die("Error en la busquesa");
		 $numRow=pg_num_rows($rs);
		 echo "<select name='emp' id='emp'> <option value=''>seleccione...</option>";
		 for ($i=0; $i < $numRow; $i++) { 
		 	$row=pg_fetch_array($rs,$i);
		 	$cod_emp=$row['cod_emp'];
		 	$nom=$row['nom'];
		 	echo "<option value=".$cod_emp.">".$nom."</option>";
		 }
		 echo "</select><a href='#agregar_emp' class='btn' data-toggle='modal'><i class='icon-plus'></i></a>";
		break;


		case '2':
		echo "".$_POST['nom_emp'].$_POST['dire'].$_POST['tel'].$_POST['nit'];
		$sql="insert into af_empresa(nom,dir,tel,nit) values('".$_POST['nom_emp']."','".$_POST['dire']."','".$_POST['tel']."','".$_POST['nit']."')";
		$rs=pg_query($sql) or die ("Error al ingresar");
		if($rs){echo "Insertado";}
		else{echo "Error";}
		break;


		case '3':
			if($_POST['radBus']=='codigo'){
				$sql="select m.*,a.nom as nombre from af_mantenimiento m inner join af_activo a on m.cod_act=a.cod_act where m.cod_act ilike '%$_POST[txtBus]%' and a.act='t' order by m.cod_act";				
			}
			else{
				$sql="select m.*,a.nom as nombre from af_mantenimiento m inner join af_activo a on m.cod_act=a.cod_act where a.nom ilike '%$_POST[txtBus]%' and a.act='t' order by m.cod_act";	
			}
			$rs=pg_query($sql) or die("Error en la busqueda");
			$numRow=pg_num_rows($rs);

			for ($i=0; $i < $numRow; $i++) {
				$row=pg_fetch_array($rs,$i);
				$cod= $row['cod_act'];
				$des= $row['des'];
				$cos= $row['cos'];
				$emp= $row['emp'];
				$fec= $row['fec'];
				$cod_man= $row['cod_man'];
				$nom=$row['nombre'];
				echo "<tr>
						<td>".$cod."</td>
						<td>".$nom."</td>
						<td>".$fec."</td>
						<td>".$emp."</td>
						<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaDatos('".$cod_man."')\"><i class='icon-ok'></i></a></td>
					</tr>";
			}		
			pg_close($conn);
		break;

		case '4':
			//$sql="SELECT a.*, b.nom as depto, c.nom as tfondo FROM af_tfondo c inner join af_activo a inner join af_depto b on a.cod_dep=b.cod on c.cod_tfondo=a.cod_tfondo WHERE cod_act='$_POST[cod_act]'";
			$sql="SELECT m.*,a.nom as nombre FROM af_mantenimiento m inner join af_activo a on a.cod_act=m.cod_act WHERE a.act='t' and cod_man='$_POST[cod_man]'";
			$rs3=pg_query($sql) or die("Error en la búsqueda");
			$datper = array();
			while ($obj=pg_fetch_object($rs3)){
				$datper[]=array(
					'cod_act'=>$obj->cod_act,
					'nombre'=>$obj->nombre,
					'cos'=>$obj->cos,
					'fec'=>$obj->fec,
					'emp'=>$obj->emp,
					'des'=>$obj->des,
					'cod_man'=>$obj->cod_man,
				);
			}
			echo ''.json_encode($datper).'';
		break;

		case '5':
		
			$sql="update af_mantenimiento set cos='$_POST[cos]', fec='$_POST[fec]', emp='$_POST[emp]', des='$_POST[des]' where cod_man='$_POST[cod_man]'";
			$rs=pg_query($sql)or die("Error en la búsqueda");
			if($rs){echo "Actualizado";}
			else{ echo "Error";}
		
	break;
	}


	// $sql="";
	// if ($_POST[buspor]=="Nombre") {
	// 	$sql="SELECT a.nom,m.* FROM af_mantenimiento m inner join af_activo a on a.cod_act=m.cod_act WHERE a.nom='$_POST[bus_act]' and a.act='1' order by m.fec";
	// }else{
	// 	$sql="SELECT a.nom,m.* FROM af_mantenimiento m inner join af_activo a on a.cod_act=m.cod_act WHERE m.cod_act='$_POST[bus_act]' and a.act='1' order by m.fec";
	// }
	// $rs=pg_query($sql) or die("Error en la busqueda");
	// if($rs){
	// 	$numRow=pg_num_rows($rs);
	// 	for ($i=0; $i < $numRow; $i++) { 
	// 		$row=pg_fetch_array($rs,$i);
	// 		echo "<tr id='fila".$i."'>";
	// 		echo "<td>".$row['cod_act']."</td>";
	// 		echo "<td>".$row['nom']."</td>";
	// 		echo "<td>".$row['fec']."</td>";
	// 		echo "<td>".$row['emp']."</td>";
	// 		echo "<td style='display:none'>".$row['cos']."</td>";
	// 		echo "<td style='display:none'>".$row['des']."</td>";
	// 		echo "<td><button class='btn ver' id=".$i." onClick=cargaDatos('fila".$i."')><i class='icon-edit'></i></button></td>";
	// 		echo "</tr>";
	// 	}
	// }
	
	// pg_close($conn);
?>