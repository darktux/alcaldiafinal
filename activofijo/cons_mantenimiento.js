$(function(){
	$("#btn_buscar").click(function(){
		$("#cuerpo").load("proc_mantenimiento.php",{buspor:$("#buspor:checked").val(),bus_act:$("#bus_act").val()});
	});

});