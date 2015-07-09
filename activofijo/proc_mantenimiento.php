<?php
	include ("../php/conexion.php");
	$conn=conectar();
	$sql="";
	if ($_POST[buspor]=="Nombre") {
		$sql="SELECT a.nom,m.* FROM af_mantenimiento m inner join af_activo a on a.cod_act=m.cod_act WHERE a.nom='$_POST[bus_act]' and a.act='1' order by a.cod_act, m.fec";
	}else{
		$sql="SELECT a.nom,m.* FROM af_mantenimiento m inner join af_activo a on a.cod_act=m.cod_act WHERE m.cod_act='$_POST[bus_act]' and a.act='1' order by a.cod_act,m.fec";
	}
	$rs=pg_query($sql) or die("Error en la busqueda");
	if($rs){
		$numRow=pg_num_rows($rs);
		for ($i=0; $i < $numRow; $i++) { 
			$row=pg_fetch_array($rs,$i);
			echo "<tr id='fila".$i."'>";
			echo "<td>".$row['cod_act']."</td>";
			echo "<td>".$row['nom']."</td>";
			echo "<td>".$row['cos']."</td>";
			echo "<td>".$row['fec']."</td>";
			echo "<td>".$row['emp']."</td>";
			
			echo "</tr>";
		}
	}
	
	pg_close($conn);
?>