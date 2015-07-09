<?
session_start();
include ("../php/conexion.php");
$conn=conectar();
switch ($_POST['caso']) {
case '1':
		$sql="select * from se_usuario";
		$rs=pg_query($sql);
		if($rs){
			$numRow=pg_num_rows($rs);
			echo "<select name='depto' id='sel_depto'>
					<option value='0'>Seleccione...</option>";

			for ($i=0; $i < $numRow; $i++) {
				$row=pg_fetch_array($rs,$i);
				$cod= $row['id'];
				$nom= $row['usu'];

				echo "<option value=".$cod.">".$nom."</option>";
			}
			echo "</select>";
		}
		pg_close($conn);
		break;

		case '2':
			//$sql=" select b.nom as nom,a.accion as accion,to_char(a.fecha,'DD/MM/YYYY') as fecha,a.hora as hora from se_bitacora a inner join se_usuario b on a.id_usuario=b.id where b.id='$_POST[usuario]' and b.act='t' order by b.nom";
			//$sql="select c.nom as nom, a.accion as accion, to_char(a.fecha,'DD/MM/YYYY') as fecha, a.hora as hora from se_bitacora a inner join af_depto b inner join se_usuario c on a.mod=b.cod on a.id_usuario=c.id where b.cod='$_POST[usuario]'";
			//$sql="select c.nom as nom, a.accion as accion, to_char(a.fecha,'DD/MM/YYYY') as fecha, to_char(a.hora,'HH24:MI:SS') as hora from se_bitacora a, af_depto b, se_usuario c where a.mod=b.cod and c.id=a.id_usuario and b.cod='$_POST[usuario]' order by a.fecha desc, a.hora asc";
			$sql="select su.usu as nom,sb.accion as accion,to_char(sb.fecha,'DD/MM/YYYY') as fecha,to_char(sb.hora,'HH24:MI:SS') as hora from se_bitacora sb,se_usuario su WHERE sb.id_usuario=su.id and niv='$_POST[usuario]' ORDER BY sb.fecha desc, sb.hora desc";
			$rs=pg_query($sql) or die("error en consulta");
			if($rs){
				$datAct = array();
				while ($obj=pg_fetch_object($rs)){
					$datAct[]=array(
					'nom'=>$obj->nom,
					'accion'=>$obj->accion,
					'fecha'=>$obj->fecha,
					'hora'=>$obj->hora
				);
				}
			echo ''.json_encode($datAct).'';
			}	
			else{
				echo "Error ".$consulta;
			}
		break;
	}
?>