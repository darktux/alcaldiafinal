
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Ejemplo de graficos</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../../css/morris.css">
		<link rel="stylesheet" href="../../css/bootstrap.css">
		<script type="text/javascript" src="../../js/jquery.min-1.7.1-google.js"></script>
		<script type="text/javascript" src="../../js/raphael-min.js"></script>
		<script type="text/javascript" src="../../js/morris.min.js"></script>
	</head>
	<body>

	<h2 style="text-align:center;">Taza de natalidad, Periodo 2006-2012</h2>
	
	<div class="well span10 offset1">
		<div id="area" style="height: 300px;"></div>
	</div>
	
		<script type="text/javascript" >
			function graficar(dataJson){
				Morris.Area({
				element: 'area',
				data: dataJson,
				hideHover : 'always',
				xkey: 'mes',
				ykeys: ['F', 'M'],
				labels: ['Niñas', 'Niños'],
				xLabels: "month"
				});
			}
			
			$(function(){
				$.ajax({
						type : "post",
						url : "proc_graf_nacimiento_partida.php",
						data : {
							"fec" : $("#fec").val()
							},
						success : function(responseText){
							var dataJson = eval(responseText);
							graficar(dataJson);
						}
					});
			});
		</script>
	</body>
</html>
