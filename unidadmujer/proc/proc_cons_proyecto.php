<?php  
	include ("../../php/conexion.php");
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{
			if ($_POST['buspor']=="Nombre") {
				$sql="SELECT * FROM um_proyecto WHERE nom_pro ilike '%$_POST[bus_proy]%' ";
			}else{
				$sql="SELECT * FROM um_proyecto WHERE cod_pro ilike '%$_POST[bus_proy]%' ";
			}
			enviaDatos($sql);
			pg_close($conn);
		}break;
		
		case '2':{
			$sql="SELECT * FROM um_proyecto WHERE est='$_POST[buspor]'";
			enviaDatos($sql);
			pg_close($conn);
		}break;

		case '3':{
			$sql="SELECT * FROM um_proyecto WHERE est='$_POST[buspor]' and fec_ini BETWEEN '$_POST[fec_ini]' and '$_POST[fec_fin]'";
			enviaDatos($sql);
			pg_close($conn);
		}break;

		case '4':{
			$sql="SELECT * FROM um_proyecto WHERE (mon_ext+mon_pro) BETWEEN '$_POST[mon_ini]' and '$_POST[mon_fin]'";
			enviaDatos($sql);
			pg_close($conn);
		}break;

		case '5':{
			$sql="SELECT * FROM um_proyecto WHERE tip_fon='$_POST[tip_fon]'";
			enviaDatos($sql);
			pg_close($conn);
		}break;
	}

	function enviaDatos($consulta){
		$rs=pg_query($consulta) or die("Error en la busqueda");
		$datproy = array();
		while ($obj=pg_fetch_object($rs)){
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
	}
?>