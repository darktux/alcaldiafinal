<?php
	// include("../php/conexion.php");
	// $con=conectar();
	// $sql="INSERT INTO af_mantenimiento(des,cos,emp,fec,cod_act) VALUES('$_POST[des]','$_POST[cos]','$_POST[emp]','$_POST[fec]','$_POST[cod_act]')";
	// $rs=pg_query($sql) or die("Error al Actualizar");
	// if($rs){
	// 	echo "<script>";
	// 	echo "alert('Insertado')";
	// 	echo "</script>";
	// }else{
	// 	echo "<script>";
	// 	echo "alert('No Insertado)";
	// 	echo "</script>";
	// }
	// pg_close($con);
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
			$sql="SELECT * FROM af_activo a WHERE cod_act='$_POST[cod_act]'";
			$rs3=pg_query($sql) or die("Error en la búsqueda");
			$datper = array();
			while ($obj=pg_fetch_object($rs3)){
				$datper[]=array(
					'cod_act'=>$obj->cod_act,
					'nom'=>$obj->nom
				);
			}
			echo ''.json_encode($datper).'';
		break;

		case '5':
			$sql="insert into af_mantenimiento(cod_act,des,cos,emp,fec) values('$_POST[cod_act]','$_POST[des]','$_POST[cos]','$_POST[emp]','$_POST[fec]')";
			$rs=pg_query($sql)or die("Error en la búsqueda");
			if($rs){echo "Insertado";}
			else{ echo "Error";}
		break;
	}
?>