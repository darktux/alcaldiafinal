<?php
	session_start();
	include ("conexion.php");
	$conn=conectar();
	switch($_REQUEST['caso']){
		case 'identificar':
			$rs=pg_query($conn,"SELECT id,nom,usu,contra,niv FROM se_usuario su WHERE su.usu='".trim($_REQUEST['usuario'])."';") or die("Error en la identificación");
			if($fila = pg_fetch_array($rs, null, PGSQL_ASSOC)){
				if($fila['contra']==sha1(md5(trim($_REQUEST['usuario']).trim($_REQUEST['contrasena']))) and ($fila['niv']==$_REQUEST['mod'] or $fila['niv']=="7")){
					$_SESSION['ta02_nombre']  = $fila['nom'];
					$_SESSION['ta02_usuario'] = $fila['usu'];
					$_SESSION['ta02_nivel']   = $fila['niv'];
					$_SESSION['ta02_cod']   = $fila['id'];
					pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Inició sesión en el sistema',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
					if($fila['niv']=="7"){
						echo "exito-".$_REQUEST['mod'];
					}
					else{
						echo "exito-".$fila['niv'];	
					}
					
				}
				else{
					echo "Error: Usuario o contraseña invalidos, por favor verifique.1";
				}
			}
			else{
				echo "Error: Usuario o contraseña invalidos, por favor verifique.2";
			}
			break;
		case 'registrar':
			$rs=pg_query($conn,"INSERT INTO se_usuario(nombre,email,usuario,contrasena,nivel) VALUES('".$_REQUEST['nombre']."','".$_REQUEST['correo']."','".trim($_REQUEST['usuario'])."','".sha1(md5(trim($_REQUEST['usuario']).trim($_REQUEST['contrasena'])))."','".$_REQUEST['nivel']."');");
			if($rs){
				echo "exito";
			}else{
				echo "Error, al guardar el usuario";
			}
			break;
		case 'borrar':
			pg_query($conn,"INSERT INTO se_bitacora(accion,id_usuario,fecha,hora) VALUES('Cerro sesión en el sistema',".$_SESSION['ta02_cod'].",CURRENT_DATE,CURRENT_TIME)");
			unset($_SESSION['ta02_nombre']);
			unset($_SESSION['ta02_usuario']);
			unset($_SESSION['ta02_nivel']);
			echo "borrado con exito";
			break;

		case 'modificar':
			echo 'ok4';
			break;
	}
?>