<?php  
	include ("../php/conexion.php");
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':
			if ($_POST['buspor']=="Codigo") {
				$sql="SELECT a.cod_act,b.nom, a.des, a.cos, a.emp, a.fec from af_mantenimiento a inner join af_activo b on a.cod_act=b.cod_act 
				WHERE b.act='t' and a.cod_act ilike '%$_POST[txtBusAct]%'";
			}
			if ($_POST['buspor']=="Nombre") {
				$sql="SELECT a.cod_act,b.nom, a.des, a.cos, a.emp, a.fec from af_mantenimiento a inner join af_activo b on a.cod_act=b.cod_act 
				WHERE b.act='t' and b.nom ilike '%$_POST[txtBusAct]%'";	
			}
			if ($_POST['buspor']=="Empresa") {
				$sql="SELECT a.cod_act,b.nom, a.des, a.cos, a.emp, a.fec from af_mantenimiento a inner join af_activo b on a.cod_act=b.cod_act 
				WHERE b.act='t' and a.emp ilike '%$_POST[txtBusAct]%'";	
			}
			if ($_POST['buspor']=="Fecha"){
				$sql="SELECT a.cod_act,b.nom, a.des, a.cos, a.emp, a.fec from af_mantenimiento a inner join af_activo b on a.cod_act=b.cod_act 
				WHERE b.act='t' and a.fec between '$_POST[txtBusAct1]' and '$_POST[txtBusAct2]'";	
			}
			if ($_POST['buspor']=="Costo"){
				$sql="SELECT a.cod_act,b.nom, a.des, a.cos, a.emp, a.fec from af_mantenimiento a inner join af_activo b on a.cod_act=b.cod_act WHERE b.act='t' and a.cos between '$_POST[txtBusAct1]' and '$_POST[txtBusAct2]'";	
			}
			
			enviaDatos($sql);
		break;

		case '2':
			$sql="select * from af_tfondo";
			$rs=pg_query($sql);
			if($rs){
				$numRow=pg_num_rows($rs);
				echo "<select name='tfondo' id='sel_tfondo' onchange='buscarDatos2()'>
						<option value='0'>Seleccione...</option>";

				for ($i=0; $i < $numRow; $i++) {
					$row=pg_fetch_array($rs,$i);
					$cod= $row['cod_tfondo'];
					$nom= $row['nom'];
					echo "<option value=".$cod.">".$nom."</option>";
				}
				echo "</select>
						<a href='#agregar_tfondo' class='btn' data-toggle='modal'><i class='icon-plus'></i></a>
					</div>";
			}
			pg_close($conn);
		break;

		case '3':

		break;

	}




	function enviaDatos($consulta){
		$rs=pg_query($consulta) or die("Error en la busqueda ".$consulta);
		$datAct = array();
		while ($obj=pg_fetch_object($rs)){
			$datAct[]=array(
				'cod_act'=>$obj->cod_act,
				'nom'=>$obj->nom,
				'fec'=>$obj->fec,
				'cos'=>$obj->cos,
				'ori'=>$obj->ori,
				'emp'=>$obj->emp,
				'des'=>$obj->des,
	
			);
		}
		echo ''.json_encode($datAct).'';
	}


?>