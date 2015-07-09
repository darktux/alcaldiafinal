<?php 
	include('./../../php/conexion.php');
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{//Busca coincidencias de negocio
			if ($_POST['radBusNeg']=="Nombre") { //nombre de negocio
				if($_POST['tipoPer']=="N")
					$sql="SELECT rp.cod_per,rp.nom,rp.ape1,rp.ape2,cn.cod_neg,cn.nom_neg,cn.dir_neg FROM rf_persona rp,ca_negocio cn WHERE cn.cod_con=rp.cod_per and cn.nom_neg ilike '%$_POST[txtBusNeg]%' and cn.est_neg='t' and cn.tip_con='N'";
				else
					$sql="SELECT cs.idsoc as cod_per,cs.nom_jur,cn.cod_neg,cn.nom_neg,cn.dir_neg FROM ca_sociedad cs,ca_negocio cn WHERE cn.cod_con=cs.idsoc and cn.nom_neg ilike '%$_POST[txtBusNeg]%' and cn.est_neg='t' and cn.tip_con='J'";
			}else{ //contribuyente
				if($_POST['tipoPer']=="N")
					$sql="SELECT rp.cod_per,rp.nom,rp.ape1,rp.ape2,cn.cod_neg,cn.nom_neg,cn.dir_neg FROM rf_persona rp,ca_negocio cn WHERE (rp.nom ilike '%$_POST[txtBusNeg]%' or rp.ape1 ilike '%$_POST[txtBusNeg]%' or rp.ape2 ilike '%$_POST[txtBusNeg]%') and (cn.cod_con=rp.cod_per) and cn.est_neg='t' and cn.tip_con='N'";
				else
					$sql="SELECT cs.idsoc as cod_per,cs.nom_jur,cn.cod_neg,cn.nom_neg,cn.dir_neg FROM ca_sociedad cs,ca_negocio cn WHERE cs.nom_jur ilike '%$_POST[txtBusNeg]%' and (cn.cod_con=cs.idsoc) and cn.est_neg='t' and cn.tip_con='J'";
			}
			$rs=pg_query($sql) or die("Error en la busqueda");
			$numRow=pg_num_rows($rs);
			$propietario="";
			for ($i=0; $i < $numRow; $i++) { 
				$row=pg_fetch_array($rs,$i);
				if($_POST['tipoPer']=="N"){
					$propietario=$row['nom']." ".$row['ape1']." ".$row['ape2'];
				}else{
					$propietario=$row['nom_jur'];
				}
				$cod_per= $row['cod_per'];
				$cod_neg= $row['cod_neg'];
				$nom_neg= $row['nom_neg'];
				$dir_neg= $row['dir_neg'];
				echo "
					<tr>
						<td>".$nom_neg."</td>
						<td>".$propietario."</td>
						<td>".$dir_neg."</td>
						<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaNeg('".$cod_per."','".$cod_neg."','$_POST[tipoPer]');limpiarCampos()\"><i class='icon-ok'></i></a></td>
					</tr>
				";
			}
			pg_close($conn);
		}break;

		case '2':{//Devuelve los valores del negocio seleccionado
			if($_POST['tipoPer']=="N")
				$sql="SELECT rp.cod_per,rp.nom,rp.ape1,rp.ape2,cn.cod_neg,cn.nom_neg,cn.dir_neg,cn.med_neg,cn.fec_ins,cn.tip_con,cen.fec_imp FROM ca_negocio cn,rf_persona rp,co_estcta_neg cen WHERE cn.cod_con='$_POST[cod_con]' and cn.cod_neg='$_POST[cod_neg]' and cn.cod_con=rp.cod_per and cn.tip_con='N' and cen.cod_neg=cn.cod_neg";
			else
				$sql="SELECT cs.idsoc as cod_per,cs.nom_jur,cn.cod_neg,cn.nom_neg,cn.dir_neg,cn.med_neg,cn.fec_ins,cn.tip_con,cen.fec_imp FROM ca_negocio cn,ca_sociedad cs,co_estcta_neg cen WHERE cn.cod_con='$_POST[cod_con]' and cn.cod_neg='$_POST[cod_neg]' and cn.cod_con=cs.idsoc and cn.tip_con='J' and cen.cod_neg=cn.cod_neg";

			$rs=pg_query($sql) or die("Error en la busqueda");
			$datneg = array();
			$propietario="";
			while ($obj=pg_fetch_object($rs)){
				if($obj->tip_con=="N"){
					$propietario=$obj->nom." ".$obj->ape1." ".$obj->ape2;
				}else{
					$propietario=$obj->nom_jur;
				}
				$datneg[]=array(
					'cod_per'=>$obj->cod_per,
					'propietario'=>$propietario,
					'cod_neg'=>$obj->cod_neg,
					'nom_neg'=>$obj->nom_neg,
					'dir_neg'=>$obj->dir_neg,
					'med_neg'=>$obj->med_neg,
					'fecha'=>$obj->fec_imp
				);
			}
			echo ''.json_encode($datneg).'';
			pg_close($conn);
		}break;

		case '3':
			$fecha=date("d/m/Y");
			$fec_hor=date("Y-m-d H:i:s");
			$msj="Cobro al negocio: ". $_POST[nom_neg];
			//pg_query("BEGIN");
			pg_query("INSERT INTO co_factura(fec,nom_con,cod_con,mon,est,des) VALUES('$fecha','$_POST[nom_neg]','$_POST[cod_con]','$_POST[total]','f','Pago de impuestos')");
			$rs=pg_query("SELECT MAX(cod_fac) as cod_fac FROM co_factura");
			$row=pg_fetch_array($rs);
			$cod_fac=$row['cod_fac'];
			pg_query("INSERT INTO co_factura_detalle(det,mon,can,cod_fac,cod_rub) VALUES('Impuestos al Comercio','$_POST[total]','1','$cod_fac','11801')");
			pg_query("INSERT INTO co_notificacion(mensaje,fec_hor,status,cod_fac) VALUES('$msj','$fec_hor','t','$cod_fac')");
			$fec_car=$_POST['fec_car'];
			$con_car=$_POST['con_car'];
			$car_car=$_POST['car_car'];
			for($i=0;$i<count($fec_car);$i++){
				pg_query("INSERT INTO co_estcta_neg(cod_neg,fec_imp,concepto,monto) VALUES('$_POST[cod_neg]','$fec_car[$i]','$con_car[$i]','$car_car[$i]')");
			}
			pg_query("INSERT INTO co_estcta_neg(cod_neg,fec_imp,concepto,monto) VALUES('$_POST[cod_neg]','$fecha','Abono a estado de cuenta','$total')");
			$rs=pg_query("SELECT MAX(cod_estcta) as cod_estcta FROM co_estcta_neg");
			$row=pg_fetch_array($rs);
			$cod_estcta=$row['cod_estcta'];
			$nom_mes=$_POST['nom_mes'];
			for($i=0;$i<count($nom_mes);$i++){
				pg_query("INSERT INTO co_fecpag_neg VALUES('$cod_estcta','$nom_mes[$i]')");
			}
			if($rs){
				echo "Factura enviada a la Unidad de Colecturia";
			}
			//pg_query("COMMIT");
			
		break;

		case '4':{//Devuelve los impuestos que se le cobran a un negocio especifico
			//se obtiene la ultima fecha de pago
			$sql="SELECT a.cod_estcta, a.fec_pag FROM co_fecpag_neg a,co_estcta_neg b WHERE a.cod_estcta=b.cod_estcta and b.cod_neg=$_POST[cod_neg] ORDER BY a.cod_estcta";
			$rsc=pg_query($sql);
			$ult_fec="";
			while($row=pg_fetch_array($rsc)){
				$ult_fec=$row['fec_pag'];
			}
			//se obtiene los datos de la mora
			$sql="SELECT * FROM co_impuesto WHERE codigo='15302'";
			$rsc=pg_query($sql);
			$row=pg_fetch_array($rsc);
			$cobro=0;
			$cobromin=$row['cob_min'];
			$tip_cobMora=$row['tip_cob'];
			$cta=$row['nom_cue'];
			if($row['tip_cob']=="Porcentaje"){
				$cobro=$row['cob_por'];
			}else{
				$cobro=$row['cob_fij'];
			}
			//se obtiene los impuestos asociados al negocio
			$sql="SELECT ci.codigo,ci.nom_cue,ci.tip_cob,ci.cob_por,ci.cob_fij,ci.cob_min,ci.cob_met FROM co_neg_imp cni,co_impuesto ci WHERE ci.codigo=cni.cod_imp and cni.cod_neg='$_POST[cod_neg]'";
			$rs=pg_query($sql);
			$datimp=array();
			while($obj=pg_fetch_object($rs)){
				$datimp[]=array(
					'codigo'=>$obj->codigo,
					'nom_cue'=>$obj->nom_cue,
					'tip_cob'=>$obj->tip_cob,
					'cob_por'=>$obj->cob_por,
					'cob_fij'=>$obj->cob_fij,
					'cob_min'=>$obj->cob_min,
					'cob_met'=>$obj->cob_met,
					'ult_fec'=>$ult_fec,
					'tip_cobMora'=>$tip_cobMora,
					'cobroMora'=>$cobro,
					'cob_minMora'=>$cobromin,
					'cta'=>$cta
				);
			}
			echo ''.json_encode($datimp).'';
			pg_close($conn);
		}break;

		case '5':
			$sql="SELECT fec_imp as fecha,concepto,monto FROM co_estcta_neg WHERE cod_neg='$_POST[cod_neg]'";
			$rs=pg_query($sql);
			$datos=array();
			$suma=0;
			while($obj=pg_fetch_object($rs)){
				$desicion=substr($obj->concepto, 0,5);
				if($desicion=="Abono"){
					$abono=$obj->monto;
					$cargo="0";
					$suma=$suma-$abono;
				}else{
					$abono="0";
					$cargo=$obj->monto;
					$suma=$suma+$cargo;
				}
				$datos[]=array(
					'fecha'=>$obj->fecha,
					'concepto'=>$obj->concepto,
					'cargo'=>$cargo,
					'abono'=>$abono,
					'saldo'=>$suma
				);
			}
			echo ''.json_encode($datos).'';
			pg_close($conn);
		break;

		case '14':{ //devuelve toda la informacion de los impuestos asociados a un negocio, para calcular cobro
			$sql="SELECT cn.med_neg,ci.* FROM co_neginm_imp cni,ca_negocio cn,co_impuesto ci WHERE cni.cod_imp=ci.codigo and cni.cod_neginm='$_POST[cod_neg]'";
			$rs=pg_query($sql);
			$datos=array();
			while($obj=pg_fetch_object($rs)){
				$datos[]=array(
					'med_neg'=>$obj->med_neg,
					'codigo'=>$obj->codigo,
					'nom_cue'=>$obj->nom_cue,
					'tip_cob'=>$obj->tip_cob,
					'cob_por'=>$obj->cob_por,
					'cob_fij'=>$obj->cob_fij,
					'cob_min'=>$obj->cob_min,
					'condonado'=>$obj->condonado
				);
			}
			echo ''.json_encode($datos).'';
			pg_close($conn);
		}break;


		case '15'://Envia notificacion a colecturia
			$fec_hor=date("Y-m-d H:i:s");
			$msj=$_POST['msj'];
			if(pg_query("INSERT INTO co_notificacion(mensaje,fec_hor,status) VALUES('$msj','$fec_hor','t')") or die("Error al ingresar")){
				echo "Guardado exitosamente";
			}
			pg_close($conn);
		break;

		case '16':
			$sql="SELECT * FROM co_estcta WHERE cod_neg='$_POST[cod_neg]'";
			/*$rs=pg_query($sql);
			$datos=array();
			while($obj=pg_fetch_object($rs)){
				$datos[]=array(
					'cod_neg'=>$obj->cod_fac,
					'cod_car'=>$obj->fec,
					'cod_abo'=>$obj->nom_con,
					'fec_imp'=>$obj->cod_con
					
				);
			}
			echo ''.json_encode($datos).'';
			pg_close($conn);*/
		break;
		
		default:
			# code...
		break;
	}

	
?>