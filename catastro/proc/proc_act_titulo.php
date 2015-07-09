<?php 
	session_start();
	include('./../../php/conexion.php');
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{
			if ($_POST['radBusPer']=="DUI") {
				$sql="SELECT rp.* FROM rf_persona rp, ca_perpetuidad cp WHERE rp.dui='$_POST[txtBusPer]' and rp.cod_per=cp.cod_pro";
			}else{
				$sql="SELECT rp.* FROM rf_persona rp, ca_perpetuidad cp WHERE (rp.nom ilike '%$_POST[txtBusPer]%' or rp.ape1 ilike '%$_POST[txtBusPer]%' or rp.ape2 ilike '%$_POST[txtBusPer]%') and rp.cod_per=cp.cod_pro";
			}
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
						<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaPer('".$cod_per."')\"><i class='icon-ok'></i></a></td>
					</tr>
				";
			}
			pg_close($conn);
		}break;

		case '2':{
			$sql="SELECT rp.cod_per,rp.nom,rp.ape1,rp.ape2,rp.dui,cm.nom_cem,cp.* FROM rf_persona rp,ca_cementerio cm,ca_perpetuidad cp WHERE rp.cod_per='$_POST[cod_per]' and rp.cod_per=cp.cod_pro and cm.cod_cem=cp.cod_cem";
			$rs2=pg_query($sql) or die("Error en la busqueda");
			$datper = array();
			while ($obj=pg_fetch_object($rs2)){
				$datper[]=array(
					'cod_per'=>$obj->cod_per,
					'nom'=>$obj->nom,
					'ape1'=>$obj->ape1,
					'ape2'=>$obj->ape2,
					'dui'=>$obj->dui,
					'cod_tit'=>$obj->cod_tit,
					'nom_cem'=>$obj->nom_cem,
					'ancho'=>$obj->ancho,
					'largo'=>$obj->largo,
					'lim_nor'=>$obj->lim_nor,
					'lim_sur'=>$obj->lim_sur,
					'lim_est'=>$obj->lim_est,
					'lim_oes'=>$obj->lim_oes,
					'nic_aut'=>$obj->nic_aut,
					'clase'=>$obj->clase,
					'valor'=>$obj->valor,
					'num_rec'=>$obj->num_rec,
					'fec_rec'=>$obj->fec_rec,
					'cod_cem'=>$obj->cod_cem
				);
			}
			echo ''.json_encode($datper).'';
			pg_close($conn);
		}break;

		case '3':{
			$sql="UPDATE ca_perpetuidad SET lim_nor='$_POST[lim_nor]',lim_sur='$_POST[lim_sur]',lim_est='$_POST[lim_est]',lim_oes='$_POST[lim_oes]' WHERE cod_tit='$_POST[cod_tit]'";
			if (pg_query($sql)) {
				if($_POST['nic_aut']>=1){
					pg_query("UPDATE ca_enterrado SET fec_ent='$_POST[fec_fall1]',nom_fall='$_POST[fall1]' WHERE cod_per='$_POST[cod_per]' and cod_tit='$_POST[cod_tit]' and cod_ent=1");
					if($_POST['nic_aut']>=2){
						pg_query("UPDATE ca_enterrado SET fec_ent='$_POST[fec_fall2]',nom_fall='$_POST[fall2]' WHERE cod_per='$_POST[cod_per]' and cod_tit='$_POST[cod_tit]' and cod_ent=2");
						if($_POST['nic_aut']>=3)	{
							pg_query("UPDATE ca_enterrado SET fec_ent='$_POST[fec_fall3]',nom_fall='$_POST[fall3]' WHERE cod_per='$_POST[cod_per]' and cod_tit='$_POST[cod_tit]' and cod_ent=3");
							if($_POST['nic_aut']>=4){
								pg_query("UPDATE ca_enterrado SET fec_ent='$_POST[fec_fall4]',nom_fall='$_POST[fall4]' WHERE cod_per='$_POST[cod_per]' and cod_tit='$_POST[cod_tit]' and cod_ent=4");
								if($_POST['nic_aut']>=5){
									pg_query("UPDATE ca_enterrado SET fec_ent='$_POST[fec_fall5]',nom_fall='$_POST[fall5]' WHERE cod_per='$_POST[cod_per]' and cod_tit='$_POST[cod_tit]' and cod_ent=5");
								}
							}
						}
					}
				}
				pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Actualizó datos de título de perpetuidad',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
				echo "Actualizado exitosamente";
			}
			pg_close($conn);
		}break;

		case '4':{
			$sql="SELECT * FROM ca_enterrado WHERE cod_per='$_POST[cod_per]' and cod_tit='$_POST[cod_tit]'";
			$rs=pg_query($sql);
			$datfall=array();
			while ($obj=pg_fetch_object($rs)) {
				$datfall[]=array(
					'nom_fall'=>$obj->nom_fall,
					'fec_ent'=>$obj->fec_ent
				);
			}
			echo ''.json_encode($datfall).'';
			pg_close($conn);
		}break;
	}
?>