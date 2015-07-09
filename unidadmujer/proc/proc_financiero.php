<?php  
	session_start();
	include ("../../php/conexion.php");
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{  //Buscar proyecto y cargarlo en la tabla de coincidencias
			$sql="";
			if ($_POST['buspor']=="Nombre") {
				$sql="SELECT * FROM um_proyecto WHERE nom_pro ilike '%$_POST[bus_proy]%' ";
			}else{
				$sql="SELECT * FROM um_proyecto WHERE cod_pro ilike '%$_POST[bus_proy]%' ";
			}
			$rs=pg_query($sql) or die("Error en la busqueda");
			$numRow=pg_num_rows($rs);
			for ($i=0; $i < $numRow; $i++) { 
				$row=pg_fetch_array($rs,$i);
				$cod_pro= $row['cod_pro'];
				$nom_pro= $row['nom_pro'];
				$fec_ini= $row['fec_ini'];
				$fec_fin= $row['fec_fin'];
				echo "
					<tr>
						<td>".$cod_pro."</td>
						<td>".$nom_pro."</td>
						<td>".$fec_ini."</td>
						<td>".$fec_fin."</td>
						<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaProy('".$cod_pro."')\"><i class='icon-ok'></i></a></td>
					</tr>
				";
			}
			pg_close();
		}break;

		case '2':{ //Devuelve los datos del proyecto seleccionado en la busqueda
			$sql="SELECT * FROM um_proyecto WHERE cod_pro='$_POST[cod_pro]' ";
			$rs2=pg_query($sql) or die("Error en la busqueda");
			$datproy = array();
			while ($obj=pg_fetch_object($rs2)){
				$datproy[]=array(
					'cod_pro'=>$obj->cod_pro,
					'nom_pro'=>$obj->nom_pro,
					'des'=>$obj->des,
					'ubi'=>$obj->ubi,
					'fec_ini'=>$obj->fec_ini,
					'fec_fin'=>$obj->fec_fin,
					'tip_fon'=>$obj->tip_fon,
					'mon_pro'=>$obj->mon_pro,
					'mon_ext'=>$obj->mon_ext,
					'pat'=>$obj->pat,
					'est'=>$obj->est,
				);
			}
			echo ''.json_encode($datproy).'';
			pg_close();
		}break;

		case '3':{ //Devuelve los datos de los gastos del proyecto seleccionado
			$rs=pg_query("SELECT * FROM um_gas_proy WHERE cod_pro='$_POST[cod_pro]'");
			$datgas=array();
			while($obj=pg_fetch_object($rs)){
				$datgas[]=array(
					'cod_com'=>$obj->cod_com,
					'fec_com'=>$obj->fec_com,
					'num_com'=>$obj->num_com,
					'con_com'=>$obj->con_com,
					'mon_com'=>$obj->mon_com,
					'cod_pro'=>$obj->cod_pro,
				);
			}
			echo ''.json_encode($datgas).'';
			pg_close();
		}break;

		case '4':{ //Agrega gastos al proyecto seleccionado
			$sql="INSERT INTO um_gas_proy(fec_com,num_com,con_com,mon_com,cod_pro) VALUES('$_POST[fec_com]','$_POST[num_com]','$_POST[con_com]','$_POST[mon_com]','$_POST[cod_pro]')";
			$rs=pg_query($sql);
			if($rs){
				pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Registró nuevo proyecto',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				echo "Guardado exitosamente";
			}
			pg_close();
		}break;

		case '5':{ //Elimina un gasto
			pg_query("DELETE FROM um_gas_proy WHERE cod_com='$_POST[cod_com]'");
			pg_close();
		}break;

		case '6':{ //Actualiza un gasto
			$sql="UPDATE um_gas_proy SET fec_com='$_POST[fec_com]', num_com='$_POST[num_com]', con_com='$_POST[con_com]',mon_com='$_POST[mon_com]' WHERE cod_com='$_POST[cod_com]' ";
			pg_query($sql);
			pg_close();
		}break;
	
	}

?>