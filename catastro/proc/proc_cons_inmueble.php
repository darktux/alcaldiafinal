<?php  
	include ("../../php/conexion.php");
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':{
			if ($_POST['buspor']=="Nombre") {
				$sql="SELECT * FROM rf_persona rp,ca_inmueble cn WHERE rp.cod_per=cn.cod_pro and (rp.nom ilike '%$_POST[bus_per]%' or rp.ape1 ilike '%$_POST[bus_per]%' or rp.ape2 ilike '%$_POST[bus_per]%')";
			}if($_POST['buspor']=="DUI"){
				$sql="SELECT * FROM rf_persona rp,ca_inmueble cn WHERE rp.cod_per=cn.cod_pro and rp.dui='$_POST[bus_per]' ";
			}if($_POST['buspor']=="NIT"){
				$sql="SELECT * FROM rf_persona rp,ca_inmueble cn WHERE rp.cod_per=cn.cod_pro and rp.nit='$_POST[bus_per]' ";
			}
			enviaDatos($sql);
		}break;
		
		case '2':{
			$sql="SELECT * FROM ca_inmueble cn WHERE cn.med_inm BETWEEN '$_POST[mon_ini]' and '$_POST[mon_fin]'";
			enviaDatos($sql);
		}break;

		case '3':{
			$sql="SELECT * FROM ca_inmueble WHERE zon_inm='$_POST[buspor]'";
			enviaDatos($sql);
		}break;
	}

	function enviaDatos($consulta){
		$rs=pg_query($consulta) or die("Error en la busqueda");
		$datproy = array();
		$propietario="";
		while ($obj=pg_fetch_object($rs)){
			$propietario=$obj->nom." ".$obj->ape1." ".$obj->ape2;
			$datproy[]=array(
				'propietario'=>$propietario,
				'cod_inm'=>$obj->cod_inm,
				'zon_inm'=>$obj->zon_inm,
				'dir_inm'=>$obj->dir_inm,
				'med_inm'=>$obj->med_inm
			);
		}
		echo ''.json_encode($datproy).'';
		pg_close();
	}

	
?>