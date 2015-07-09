<?php 	
	session_start();
	if($_SESSION['ta02_nivel']!="1"){//deja entrar si es catastro
		echo'
			<script language="javascript1.5" type="text/javascript">
				window.location="identificacion.php";
		  	</script>
	  	';
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registrar Usuario</title>
	</head>
	<body>
		<div style="margin:auto; background-color:#ddaaff; width:300px; padding:10px;">
			<h2 align="center">Registro de usuarios</h2>
			<table align="center">
				<tr>
					<td>
						<label for="nombre">Nombre: </label>
					</td>
					<td>
						<input type="text" id="nombre" name="nombre">
					</td>
				</tr>
				<tr>
					<td>
						<label for="correo">Correo: </label>
					</td>
					<td>
						<input type="text" id="correo" name="correo">
					</td>
				</tr>
				<tr>
					<td>
						<label for="usuario">Usuario: </label>
					</td>
					<td>
						<input type="text" id="usuario" name="usuario">
					</td>
				</tr>
				<tr>
					<td>
						<label for="contrasena">Contraseña: </label>
					</td>
					<td>
						<input type="password" id="contrasena" name="contrasena">
					</td>
				</tr>
				<tr>
					<td>
						<label for="contrasena2">Confirmar Contraseña: </label>
					</td>
					<td>
						<input type="password" id="contrasena2" name="contrasena2">
					</td>
				</tr>
				<tr>
					<td>
						<label for="nivel">Nivel: </label>
					</td>
					<td>
						<select id="nivel" name="nivel">
							<option value="0">Seleccione</option>
							<option value="1">Catastro</option>
							<option value="2">Unidad de la mujer</option>
							<option value="3">Colecturia</option>
							<option value="4">Activo Fijo</option>
							<option value="5">Registro Familiar</option>
							<option value="6">Seguridad</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><button onclick="registrar();">Registrar</button></td>
				</tr>
			</table>
		</div>
		<div id="avisos">
			
		</div>
		<script type="text/javascript">
			function registrar(){
				var nombre=document.getElementById('nombre').value;
				var correo=document.getElementById('correo').value;
				var usuario=document.getElementById('usuario').value;
				var contrasena=document.getElementById('contrasena').value;	
				var contrasena2=document.getElementById('contrasena2').value;
				var nivel=document.getElementById('nivel').value;

				var error="Error, en los siguientes campos: ";
				var v=false;

				if(nombre==""){error=error+"\n Nombre";v=true;}
				if(correo==""){error=error+"\n Correo";v=true;}
				if(usuario==""){error=error+"\n Usuario";v=true;}
				if(contrasena==""){error=error+"\n Contraseña";v=true;}
				if(contrasena!=contrasena2){error=error+"\n Confirmar Contraseña";v=true;}

				if(v){
                	alert(error);//imprime mensaje de campos vacios
                }
                else{
					var xmlhttp = new XMLHttpRequest();
		            xmlhttp.onreadystatechange=function(){
		                if(xmlhttp.readyState==4 && xmlhttp.status==200){
		                	if(/exito/.test(xmlhttp.responseText)){
		                		document.getElementById('nombre').value="";
								document.getElementById('correo').value="";
								document.getElementById('usuario').value="";
								document.getElementById('contrasena').value="";
								document.getElementById('contrasena2').value="";
								document.getElementById('nivel').value="";
		                		alert(xmlhttp.responseText);
		                	}
		                	else{
		                		document.getElementById('avisos').innerHTML=xmlhttp.responseText;
		                	}
		                }
		            }
		            xmlhttp.open('GET','ajaxseguridad.php?caso=registrar&nombre='+nombre+' &correo='+correo+'&usuario='+usuario+'&contrasena='+contrasena+"&nivel="+nivel,true);
		            xmlhttp.send();
		        }
	        }
		</script>
	</body>
</html>