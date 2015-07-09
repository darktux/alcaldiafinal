$(function(){
	// $("#usuario").load("proc_bitacora.php",{caso:1});


});

function buscarDatos2(){
		
		if($("#usuario").val()!='' && $("#fecha").val()!=''){
			//alert("hola"+$("#usuario").val());
				$.ajax({
				type : "post",
				url  : "proc_bitacora.php",
				data :{
					usuario  : $("#usuario").val(),//$("input[name='radBus']:checked").val(),
					fecha: $("#fecha").val(),
					caso : 2
				},
				success:function(responseText){
				//alert(responseText);
					var dataJson=eval(responseText);
					$("#tablaR").bootstrapTable('load',dataJson);
				}
			});	
		}
		else{
			alert("Por Favor, Rellene el campo de busqueda");
		}
	}