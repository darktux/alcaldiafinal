<?php 
	include('./../../php/conexion.php');
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{//Busca coincidencias de inmueble
			if ($_POST['radBusInm']=="Codigo") { 
				$sql="SELECT rp.cod_per,rp.nom,rp.ape1,rp.ape2,ci.cod_inm,ci.dir_inm FROM rf_persona rp,ca_inmueble ci WHERE ci.cod_pro=rp.cod_per and ci.cod_inm='$_POST[txtBusInm]'";
			}else{ //contribuyente
				$sql="SELECT rp.cod_per,rp.nom,rp.ape1,rp.ape2,ci.cod_inm,ci.dir_inm FROM rf_persona rp,ca_inmueble ci WHERE (rp.nom ilike '%$_POST[txtBusInm]%' or rp.ape1 ilike '%$_POST[txtBusInm]%' or rp.ape2 ilike '%$_POST[txtBusInm]%') and (ci.cod_pro=rp.cod_per)";
			}
			$rs=pg_query($sql) or die("Error en la busqueda");
			$numRow=pg_num_rows($rs);
			for ($i=0; $i < $numRow; $i++) { 
				$row=pg_fetch_array($rs,$i);
				$cod_per= $row['cod_per'];
				$nom= $row['nom'];
				$ape1= $row['ape1'];
				$ape2= $row['ape2'];
				$cod_inm= $row['cod_inm'];
				$dir_inm= $row['dir_inm'];
				echo "
					<tr>
						<td>".$cod_inm."</td>
						<td>".$nom." ".$ape1." ".$ape2."</td>
						<td>".$dir_inm."</td>
						<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaInm('".$cod_per."','".$cod_inm."')\"><i class='icon-ok'></i></a></td>
					</tr>
				";
			}
			pg_close($conn);
		}break;

		case '2':{//Devuelve los valores del inmueble seleccionado
			$sql="SELECT rp.cod_per,rp.nom,rp.ape1,rp.ape2,ci.* FROM ca_inmueble ci,rf_persona rp WHERE ci.cod_pro='$_POST[cod_pro]' and ci.cod_inm='$_POST[cod_inm]' and ci.cod_pro=rp.cod_per";
			$rs2=pg_query($sql) or die("Error en la busqueda");
			$datneg = array();
			while ($obj=pg_fetch_object($rs2)){
				$datneg[]=array(
					'cod_per'=>$obj->cod_per,
					'nom'=>$obj->nom,
					'ape1'=>$obj->ape1,
					'ape2'=>$obj->ape2,
					'cod_inm'=>$obj->cod_inm,
					'dir_inm'=>$obj->dir_inm,
					'med_inm'=>$obj->med_inm
				);
			}
			echo ''.json_encode($datneg).'';
			pg_close($conn);
		}break;

		case '3':
			$fecha=date("d/m/Y");
			$fec_hor=date("Y-m-d H:i:s");
			$msj="Cobro al inmueble a nombre de: ". $_POST[propietario];
			//pg_query("BEGIN");
			pg_query("INSERT INTO co_factura(fec,nom_con,cod_con,mon,est,des) VALUES('$fecha','$_POST[propietario]','$_POST[cod_con]','$_POST[total]','f','Pago de impuestos')");
			$rs=pg_query("SELECT MAX(cod_fac) as cod_fac FROM co_factura");
			$row=pg_fetch_array($rs);
			$cod_fac=$row['cod_fac'];
			pg_query("INSERT INTO co_factura_detalle(det,mon,can,cod_fac,cod_rub) VALUES('Impuestos a inmueble','$_POST[total]','1','$cod_fac','31306')");
			pg_query("INSERT INTO co_notificacion(mensaje,fec_hor,status,cod_fac) VALUES('$msj','$fec_hor','t','$cod_fac')");
			$fec_car=$_POST['fec_car'];
			$con_car=$_POST['con_car'];
			$car_car=$_POST['car_car'];
			for($i=0;$i<count($fec_car);$i++){
				pg_query("INSERT INTO co_estcta_inm(cod_inm,fec_imp,concepto,monto) VALUES('$_POST[cod_inm]','$fec_car[$i]','$con_car[$i]','$car_car[$i]')");
			}
			pg_query("INSERT INTO co_estcta_inm(cod_inm,fec_imp,concepto,monto) VALUES('$_POST[cod_inm]','$fecha','Abono a estado de cuenta','$total')");
			$rs=pg_query("SELECT MAX(cod_estcta) as cod_estcta FROM co_estcta_inm");
			$row=pg_fetch_array($rs);
			$cod_estcta=$row['cod_estcta'];
			$nom_mes=$_POST['nom_mes'];
			for($i=0;$i<count($nom_mes);$i++){
				pg_query("INSERT INTO co_fecpag_inm VALUES('$cod_estcta','$nom_mes[$i]')");
			}
			if($rs){
				echo "Factura enviada a la Unidad de Colecturia";
			}
			//pg_query("COMMIT");
			
		break;

		case '4':{//Devuelve los impuestos que se le cobran a un inmueble especifico
			//se obtiene la ultima fecha de pago
			$sql="SELECT a.cod_estcta, a.fec_pag FROM co_fecpag_inm a,co_estcta_inm b WHERE a.cod_estcta=b.cod_estcta and b.cod_inm='$_POST[cod_inm]' ORDER BY a.cod_estcta";
			$rsc=pg_query($sql);
			$ult_fec="";
			while($row=pg_fetch_array($rsc)){
				$ult_fec=$row['fec_pag'];
			}
			//se obtiene los datos de la mora
			$sql="SELECT * FROM co_impuesto WHERE codigo='31306'";
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
			//se obtiene los impuestos asociados al inmueble
			$sql="SELECT ci.codigo,ci.nom_cue,ci.tip_cob,ci.cob_por,ci.cob_fij,ci.cob_min,ci.cob_met FROM co_inm_imp cni,co_impuesto ci WHERE ci.codigo=cni.cod_imp and cni.cod_inm='$_POST[cod_inm]'";
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
			$sql="SELECT fec_imp as fecha,concepto,monto FROM co_estcta_inm WHERE cod_inm='$_POST[cod_inm]'";
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
	}

	
?>