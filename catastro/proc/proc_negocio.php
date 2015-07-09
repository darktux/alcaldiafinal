<?php  
	session_start();
	include('./../../php/conexion.php');
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{ //Busca a una persona y carga las coincidencias
			if ($_POST['radBusPer']=="DUI") {
				if ($_POST['radTip']=="N") {
					$sql="SELECT * FROM rf_persona WHERE dui='$_POST[txtBusPer]'";
				}
			}
			if ($_POST['radBusPer']=="NIT") {
				if ($_POST['radTip']=="N") {
					$sql="SELECT * FROM rf_persona WHERE nit='$_POST[txtBusPer]'";
				}else{
					$sql="SELECT idSoc as cod_per,nom_jur as nom,nit_jur as nit FROM ca_sociedad WHERE nit_jur='$_POST[txtBusPer]'";
				}
			}
			if($_POST['radBusPer']=="Nombre"){
				if ($_POST['radTip']=="N") {
					$sql="SELECT * FROM rf_persona rp WHERE (rp.nom ilike '%$_POST[txtBusPer]%' or rp.ape1 ilike '%$_POST[txtBusPer]%' or rp.ape2 ilike '%$_POST[txtBusPer]%') and date_part('year',age(rp.fec_nac))>15";
				}else{
					$sql="SELECT idSoc as cod_per,nom_jur as nom,nit_jur as nit FROM ca_sociedad WHERE nom_jur ilike '%$_POST[txtBusPer]%'";
				}
			}
			if($_POST['radTip']=="N"){
				$rs=pg_query($sql) or die("Error en la busqueda");
				$numRow=pg_num_rows($rs);
				for ($i=0; $i < $numRow; $i++) { 
					$row=pg_fetch_array($rs,$i);
					$cod_per= $row['cod_per'];
					$nom= $row['nom'];
					$ape1= $row['ape1'];
					$ape2= $row['ape2'];
					$dui= $row['dui'];
					$nit= $row['nit'];
					echo "
						<tr>
							<td style='display:none'>".$cod_per."</td>
							<td>".$nom." ".$ape1." ".$ape2."</td>
							<td>".$dui."</td>
							<td>".$nit."</td>
							<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaPer('".$cod_per."','N')\"><i class='icon-ok'></i></a></td>
						</tr>
					";
				}
			}else{
				$rs=pg_query($sql) or die("Error en la busqueda");
				$numRow=pg_num_rows($rs);
				for ($i=0; $i < $numRow; $i++) { 
					$row=pg_fetch_array($rs,$i);
					$cod_per= $row['cod_per'];
					$nom= $row['nom'];
					$nit= $row['nit'];
					echo "
						<tr>
							<td style='display:none'>".$cod_per."</td>
							<td>".$nom."</td>
							<td>".$nit."</td>
							<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaPer('".$cod_per."','J')\"><i class='icon-ok'></i></a></td>
						</tr>
					";
				}
			}
			pg_close($conn);
		}break;

		case '2':{//Devuelve los datos de una persona seleccionada en la busqueda
			if ($_POST['tipo']=="N") {
				$sql="SELECT cod_per,nom,ape1,ape2 FROM rf_persona WHERE cod_per='$_POST[cod_per]'";
			}else{
				$sql="SELECT idSoc as cod_per,nom_jur as nom FROM ca_sociedad WHERE idSoc='$_POST[cod_per]'";
			}
			
			$rs2=pg_query($sql) or die("Error en la busqueda");
			$datper = array();
			while ($obj=pg_fetch_object($rs2)){
				$datper[]=array(
					'cod_per'=>$obj->cod_per,
					'nom'=>$obj->nom,
					'ape1'=>$obj->ape1,
					'ape2'=>$obj->ape2
				);
			}
			echo ''.json_encode($datper).'';
			pg_close($conn);
		}break;

		case '3':{//Guarda a la BD
			//Se obtiene el id del nuevo negocio para vincularlo con la imagen del local
			$rsbus=pg_query("SELECT MAX(cod_neg) as cod_neg FROM ca_negocio");
			$row=pg_fetch_array($rsbus,0);
			$cod_neg=$row['cod_neg'];
			if ($cod_neg==""||$cod_neg==null) {
				$cod_neg='1';
			}else{
				$cod_neg++;
			}
			//comprobamos si existe un directorio para subir el archivo
    		//si no es así, lo creamos
    		if(!is_dir("imagenes/")) {
        		mkdir("imagenes/", 0777);
        	}
        	$fecha=date("d/m/Y");
        	if ($_FILES[img_neg][name]!="") {
        		//Cambiamos nombre al archivo para guardarlo
				$file_name=$_FILES[img_neg][name];
				$ext=substr($file_name, strlen($file_name)-4);
				$new_name=$cod_neg.$ext;
        		if(move_uploaded_file($_FILES[img_neg][tmp_name], "imagenes/".$new_name)){
        			$sql="INSERT INTO ca_negocio(nom_neg,rub_neg,zon_neg,dep,mun,dir_neg,med_neg,img_neg,est_neg,tip_con,cod_con,fec_ins,puntos) VALUES('$_POST[nom_neg]','$_POST[rub_neg]','$_POST[zon_neg]','$_POST[dep]','$_POST[mun]','$_POST[dir_neg]','$_POST[med_neg]','$new_name','t','$_POST[tipoPer]','$_POST[cod_con]','$fecha','$_POST[pos]')";
				}else{echo "Error al subir el archivo";}
        	}else{
        		$sql="INSERT INTO ca_negocio(nom_neg,rub_neg,zon_neg,dep,mun,dir_neg,med_neg,img_neg,est_neg,tip_con,cod_con,fec_ins,puntos) VALUES('$_POST[nom_neg]','$_POST[rub_neg]','$_POST[zon_neg]','$_POST[dep]','$_POST[mun]','$_POST[dir_neg]','$_POST[med_neg]','','t','$_POST[tipoPer]','$_POST[cod_con]','$fecha','$_POST[pos]')";
        	}
			if(pg_query($sql)){
				$cod_imp=$_POST['imp'];
				for ($i=0; $i < count($cod_imp); $i++) { //Se registran los impuestos que se le cobraran al negocio
					pg_query("INSERT INTO co_neg_imp VALUES('$cod_neg','$cod_imp[$i]')");
				}
				//se abre el estado de cuenta del negocio
				pg_query("INSERT INTO co_estcta_neg(cod_neg,fec_imp,concepto,monto) VALUES('$cod_neg','$fecha','Inscripción de negocio','0')");
				$result=pg_query("SELECT MAX(cod_estcta) as cod_estcta FROM co_estcta_neg");
				$rowX=pg_fetch_array($result,0);
				$cod_estcta=$rowX['cod_estcta'];
				pg_query("INSERT INTO co_fecpag_neg VALUES('$cod_estcta','$fecha')");

				$respuesta[0]=array(
					'cod_neg'=>"$cod_neg",
					'exito'=>'1'
				);
				pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Registró un nuevo negocio',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				echo ''.json_encode($respuesta).'';
			}
			pg_close($conn);
		}break;

		case '4':
			$sql="INSERT INTO ca_rubro(rubro) VALUES('$_POST[nue_gir]')";
			pg_query($sql);
			pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Registró un nuevo rubro',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
			pg_close($conn);
		break;

		case '5':
			$sqlg="SELECT * FROM ca_rubro";
			$rs2=pg_query($sqlg);
			while ($row2=pg_fetch_array($rs2)) {
				echo "
				<option value='$row2[1]'>$row2[1]</option>
				";
			}
			pg_close($conn);
		break;

		case '6':
			$sql="UPDATE ca_negocio SET puntos='$_POST[puntos]' WHERE cod_neg='$_POST[cod_neg]'";
			if(pg_query($sql)){
				echo "Actualizado correctamente";
			}
			pg_close($conn);
		break;
	}
?>