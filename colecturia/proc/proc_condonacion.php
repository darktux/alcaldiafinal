<?php 
	include('./../../php/conexion.php');
	$conn=conectar();
	switch ($_POST['caso']) {
			case '1':{
				$sql="";
				if ($_POST['buspor']=="Nombre") {
					$sql="SELECT * FROM co_impuesto WHERE nom_cue ilike '%$_POST[txtBusImp]%' ";
				}else{
					$sql="SELECT * FROM co_impuesto WHERE codigo ilike '%$_POST[txtBusImp]%' ";
				}
				$rs=pg_query($sql) or die("Error en la busqueda");
				$numRow=pg_num_rows($rs);
				for ($i=0; $i < $numRow; $i++) { 
					$row=pg_fetch_array($rs,$i);
					$codigo= $row['codigo'];
					$nom_cue= $row['nom_cue'];
					echo "
						<tr>
							<td>".$codigo."</td>
							<td>".$nom_cue."</td>
							<td><a href='#' class='btn' data-dismiss='modal' onclick=\"cargaImp('".$codigo."')\"><i class='icon-ok'></i></a></td>
						</tr>
					";
				}
				pg_close($conn);
			}break;

			case '2':{
				$sql="UPDATE co_impuesto SET condonado='$_POST[condonado]' WHERE codigo='$_POST[codigo]'";
				if(pg_query($sql)){
					$sql2=" INSERT INTO co_condonado VALUES('$_POST[codigo]','$_POST[fec_ini]','$_POST[fec_fin]','$_POST[num_acu]')";
					if (pg_query($sql2)) {
						echo "Guardado exitosamente";
					}
				}
			}break;
			
			
		}	
?>