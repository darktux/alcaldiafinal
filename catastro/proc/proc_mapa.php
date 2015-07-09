<?php 
	session_start();
	include('./../../php/conexion.php');
	$conn=conectar();
	switch ($_POST['caso']) {
		case '1'://Ver Negocios
			$sql="SELECT * FROM ca_negocio WHERE est_neg='t'";//Buscar una manera de mostrar los negocios q aun no han sido puestos en el mapa
			$rs=pg_query($sql) or die("Error en la busqueda");
			$rsx=pg_query($sql);
			$datneg = array();
			$x=0;
			while ($obj=pg_fetch_object($rs)){
				$propietario="";
				$row=pg_fetch_array($rsx);
				if($row['tip_con']=="N"){
					$sql2="SELECT nom,ape1,ape2 FROM rf_persona WHERE cod_per=".$row['cod_con'];
					$rs2=pg_query($sql2);
					$row2=pg_fetch_array($rs2);
					$propietario=$row2['nom']." ".$row2['ape1']." ".$row2['ape2'];
					
				}
				if($row['tip_con']=="J"){
					$sql2="SELECT nom_jur FROM ca_sociedad WHERE idSoc='$row[cod_con]'";
					$rs2=pg_query($sql2);
					$row2=pg_fetch_array($rs2);
					$propietario=$row2['nom_jur'];
				}
				
				$datneg[]=array(
					'cod_neg'=>$obj->cod_neg,
					'nom_neg'=>$obj->nom_neg,
					'rub_neg'=>$obj->rub_neg,
					'zon_neg'=>$obj->zon_neg,
					'dep'=>$obj->dep,
					'mun'=>$obj->mun,
					'dir_neg'=>$obj->dir_neg,
					'med_neg'=>$obj->med_neg,
					'img_neg'=>$obj->img_neg,
					'est_neg'=>$obj->est_neg,
					'tip_con'=>$obj->tip_con,
					'cod_con'=>$obj->cod_con,
					'propietario'=>$propietario,
					'puntos'=>$obj->puntos
				);
				$x++;
			}
			echo ''.json_encode($datneg).'';
			pg_close($conn);
		break;

		case '2'://Ver Inmuebles
			$sql="SELECT * FROM ca_inmueble";
			$rs=pg_query($sql) or die("Error en la busqueda");
			$datInm = array();
			while ($obj=pg_fetch_object($rs)){
				$datInm[]=array(
					'cod_inm'=>$obj->cod_inm,
					'cod_pro'=>$obj->cod_pro,
					'zon_inm'=>$obj->zon_inm,
					'dir_inm'=>$obj->dir_inm,
					'med_inm'=>$obj->med_inm,
					'lim_nor'=>$obj->lim_nor,
					'lim_sur'=>$obj->lim_sur,
					'lim_est'=>$obj->lim_est,
					'lim_oes'=>$obj->lim_oes,
					'puntos'=>$obj->puntos
				);
			}
			echo ''.json_encode($datInm).'';
			pg_close($conn);
		break;

		case '3'://Ver lamparas
			$sql="SELECT * FROM ca_alumbrado";
			$rs=pg_query($sql) or die("Error en la busqueda");
			$datLamp = array();
			while ($obj=pg_fetch_object($rs)){
				$datLamp[]=array(
					'cod_alumbrado'=>$obj->cod_alumbrado,
					'sit_en'=>$obj->sit_en,
					'alum_mun'=>$obj->alum_mun,
					'puntos'=>$obj->puntos
				);
			}
			echo ''.json_encode($datLamp).'';
			pg_close($conn);
		break;
		
		case '4'://Ver calles
			$sql="SELECT * FROM ca_calle";
			$rs=pg_query($sql) or die("Error en la búsqueda");
			$datcalle=array();
			while ($obj=pg_fetch_object($rs)) {
				$datcalle[]=array(
					'cod_call'=>$obj->cod_call,
					'est_call'=>$obj->est_call,
					'tip_call'=>$obj->tip_call,
					'concepto'=>$obj->concepto,
					'puntos'=>$obj->puntos
				);
			}
			echo ''.json_encode($datcalle).'';
			pg_close($conn);
		break;

		case '5'://Ver negocios que no se han agregado al mapa
			$sql="SELECT * FROM ca_negocio WHERE est_neg='t'";
			$rs=pg_query($sql);
			$datneg = array();
			while ($obj=pg_fetch_object($rs)){
				$datneg[]=array(
					'cod_neg'=>$obj->cod_neg,
					'nom_neg'=>$obj->nom_neg,
					'puntos'=>$obj->puntos
				);
			}
			echo ''.json_encode($datneg).'';
			pg_close($conn);
		break;

		case '6'://Ingresar calle
			$puntos = '';
			$x=count($_POST['puntos']);
			for($i=0;$i<$x;$i++){
				$s = '|';
				if($puntos == ''){
					$puntos =$_POST['puntos'][$i];
				}else{
					$puntos .= $s.$_POST['puntos'][$i]; 
				}
			}

			$sql="INSERT INTO ca_calle(est_call,tip_call,concepto,puntos) VALUES('$_POST[est_call]','$_POST[tip_call]','$_POST[concepto]','$puntos')";
			$rs=pg_query($sql);
			if($rs){
				pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Agregó un registro de calle',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				echo "Guardado exitosamente";
			}
		break;

		case '7'://Ver negocios que estan a punto de caer en mora
			$sql="SELECT * FROM ca_negocio WHERE est_neg='t' and co_estcta";
			# code...
		break;
	}
?>