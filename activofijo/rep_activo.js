$(function(){
	$("#reporte").click(function(){
		alert("hola");
		$.ajax
			({
					type : "POST",
					url : "proc_rep_activo.php",
				});
		
	});

});