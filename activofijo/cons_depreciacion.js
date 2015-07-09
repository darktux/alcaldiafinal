$(function(){
	$("#btnBusBen").click(function(){
		//alert("hola mono"+$( "#txtBusBen" ).val() );
		if($("#txtBusBen").val()!=""){
			//alert("entro");
			$("#cuerpo").load("proc_depreciacion.php",{txtBus:$( "#txtBusBen" ).val(),radBus:$("#radBusBen:checked").val(),caso:1},
				function(responseText,textStatus,XMLHttoRequest){
					if(textStatus=="success"){
						if(responseText==""){
							alert("No encontrado");
						}
					}
					//alert(responseText);
				});
		}
		else{
			alert("ingrese parametro");
		}
	});	
});

// function titulo(cod, nom){
// 	$("#cabecera").load("proc_depreciacion.php",{codigo:cod, nombre:nom,caso:3});
// }


function cargaDatos(cod){
	$("#cabecera").load("proc_depreciacion.php",{codigo:cod, caso:3});
	$.ajax({
		type:"post",
		url :"proc_depreciacion.php",
		data:{
			cod_act: cod,
			caso : 2
		},
		success:function(responseText){
				//alert(responseText);

				var dataJson=eval(responseText);

				// $("#tablaR").bootstrapTable('hideColumn','nom');
				// $("#tablaR").bootstrapTable('hideColumn','ape1');
				// $("#tablaR").bootstrapTable('hideColumn','ape2');
				$("#tablaR").bootstrapTable('load',dataJson);
			}
	});
}
