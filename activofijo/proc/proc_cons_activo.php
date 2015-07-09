<?php  
	include ("../../php/conexion.php");
	$conn=conectar();

	switch ($_POST['caso']) {
		case '1':
			if ($_POST['buspor']=="Codigo") {
				//$sql="SELECT a.cod_act, a.nom, a.mar, a.mod, a.ser,a.ori,a.cos_adq, b.nom as depto,a.fec_adq,a.fec_gar FROM af_activo a inner join af_depto b on a.cod_dep=b.cod WHERE act='t' and a.cod_act ilike '%$_POST[txtBusAct]%'";	
				$sql="SELECT a.cod_act, a.nom, a.mar, a.mod, a.ser,a.ori,a.cos_adq, c.nom as depto,a.fec_adq,a.fec_gar FROM af_activo a, af_traslados b, af_depto c where a.cod_act=b.cod_act and b.new_ubi=c.cod and act='t' and a.cod_act ilike '%$_POST[txtBusAct]%' and b.cod_tra in (select max(cod_tra) from af_traslados group by cod_act)";
			}
			if ($_POST['buspor']=="Nombre") {
				//$sql="SELECT a.cod_act, a.nom, a.mar, a.mod, a.ser,a.ori,a.cos_adq, b.nom as depto,a.fec_adq,a.fec_gar FROM af_activo a inner join af_depto b on a.cod_dep=b.cod WHERE act='t' and a.nom ilike '%$_POST[txtBusAct]%'";	
				$sql="SELECT a.cod_act, a.nom, a.mar, a.mod, a.ser,a.ori,a.cos_adq, c.nom as depto,a.fec_adq,a.fec_gar FROM af_activo a, af_traslados b, af_depto c where a.cod_act=b.cod_act and b.new_ubi=c.cod and act='t' and a.nom ilike '%$_POST[txtBusAct]%' and b.cod_tra in (select max(cod_tra) from af_traslados group by cod_act)";
			}
			if ($_POST['buspor']=="Marca") {
				//$sql="SELECT a.cod_act, a.nom, a.mar, a.mod, a.ser,a.ori,a.cos_adq, b.nom as depto,a.fec_adq,a.fec_gar FROM af_activo a inner join af_depto b on a.cod_dep=b.cod WHERE act='t' and a.mar ilike '%$_POST[txtBusAct]%'";	
				$sql="SELECT a.cod_act, a.nom, a.mar, a.mod, a.ser,a.ori,a.cos_adq, c.nom as depto,a.fec_adq,a.fec_gar FROM af_activo a, af_traslados b, af_depto c where a.cod_act=b.cod_act and b.new_ubi=c.cod and act='t' and a.mar ilike '%$_POST[txtBusAct]%' and b.cod_tra in (select max(cod_tra) from af_traslados group by cod_act)";
			}
			if ($_POST['buspor']=="Modelo") {
				//$sql="SELECT a.cod_act, a.nom, a.mar, a.mod, a.ser,a.ori,a.cos_adq, b.nom as depto,a.fec_adq,a.fec_gar FROM af_activo a inner join af_depto b on a.cod_dep=b.cod WHERE act='t' and a.mod ilike '%$_POST[txtBusAct]%'";	
				$sql="SELECT a.cod_act, a.nom, a.mar, a.mod, a.ser,a.ori,a.cos_adq, c.nom as depto,a.fec_adq,a.fec_gar FROM af_activo a, af_traslados b, af_depto c where a.cod_act=b.cod_act and b.new_ubi=c.cod and act='t' and a.mod ilike '%$_POST[txtBusAct]%' and b.cod_tra in (select max(cod_tra) from af_traslados group by cod_act)";
			}
			if ($_POST['buspor']=="Tipo"){
				//$sql="SELECT a.cod_act, a.nom, a.mar, a.mod, a.ser,a.ori,a.cos_adq, b.nom as depto,a.fec_adq,a.fec_gar FROM af_activo a inner join af_depto b on a.cod_dep=b.cod WHERE act='t' and a.cod_tfondo='$_POST[txtBusAct]'";
				$sql="SELECT a.cod_act, a.nom, a.mar, a.mod, a.ser,a.ori,a.cos_adq, c.nom as depto,a.fec_adq,a.fec_gar FROM af_activo a, af_traslados b, af_depto c where a.cod_act=b.cod_act and b.new_ubi=c.cod and act='t' and a.cod_tfondo='$_POST[txtBusAct]' and b.cod_tra in (select max(cod_tra) from af_traslados group by cod_act)";
			}
			if ($_POST['buspor']=="Adquisicion"){
				//$sql="SELECT a.cod_act, a.nom, a.mar, a.mod, a.ser,a.ori,a.cos_adq, b.nom as depto,a.fec_adq,a.fec_gar FROM af_activo a inner join af_depto b on a.cod_dep=b.cod WHERE act='t' and a.fec_adq between '$_POST[txtBusAct1]' and '$_POST[txtBusAct2]'";
				$sql="SELECT a.cod_act, a.nom, a.mar, a.mod, a.ser,a.ori,a.cos_adq, c.nom as depto,a.fec_adq,a.fec_gar FROM af_activo a, af_traslados b, af_depto c where a.cod_act=b.cod_act and b.new_ubi=c.cod and act='t' and a.fec_adq between '$_POST[txtBusAct1]' and '$_POST[txtBusAct2]' and b.cod_tra in (select max(cod_tra) from af_traslados group by cod_act)";
			}
			if ($_POST['buspor']=="Garantia"){
				//$sql="SELECT a.cod_act, a.nom, a.mar, a.mod, a.ser,a.ori,a.cos_adq, b.nom as depto,a.fec_adq,a.fec_gar FROM af_activo a inner join af_depto b on a.cod_dep=b.cod WHERE act='t' and a.fec_gar between '$_POST[txtBusAct1]' and '$_POST[txtBusAct2]'";
				$sql="SELECT a.cod_act, a.nom, a.mar, a.mod, a.ser,a.ori,a.cos_adq, c.nom as depto,a.fec_adq,a.fec_gar FROM af_activo a, af_traslados b, af_depto c where a.cod_act=b.cod_act and b.new_ubi=c.cod and act='t' and a.fec_gar between '$_POST[txtBusAct1]' and '$_POST[txtBusAct2]'  and b.cod_tra in (select max(cod_tra) from af_traslados group by cod_act)";
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
		$rs=pg_query($consulta) or die("Error en la busqueda");
		if($rs){
			$datAct = array();
			while ($obj=pg_fetch_object($rs)){
				$datAct[]=array(
					'cod_act'=>$obj->cod_act,
					'nom'=>$obj->nom,
					'mar'=>$obj->mar,
					'mod'=>$obj->mod,
					'ser'=>$obj->ser,
					'cos_adq'=>$obj->cos_adq,
					'fec_adq'=>$obj->fec_adq,
					'act'=>$obj->act,
					'depto'=>$obj->depto,
					'cod_tfondo'=>$obj->cod_tfondo,
					'ori'=>$obj->ori,
					'fec_gar'=>$obj->fec_gar,
					'don'=>$obj->don,
				);
			}
			echo ''.json_encode($datAct).'';
		}
		else{
			echo "Error ".$consulta;
		}
		
	}


?>