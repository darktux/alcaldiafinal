$(function(){
	$("#btnBusBen").click(function(){
		//alert("hola mono"+$( "#txtBusBen" ).val() );
		if($("#txtBusBen").val()!=""){
			//alert("entro");
			$("#cuerpo").load("proc_act_traslado.php",{txtBus:$( "#txtBusBen" ).val(),radBus:$("#radBusBen:checked").val(),caso:3},
				function(responseText,textStatus,XMLHttoRequest){
					if(textStatus=="success"){
						if(responseText==""){
							alert("No encontrado");
						}
					}
				});
		}
		else{
			alert("ingrese parametro");
		}
	});

	$("#guardar_depto").click(function(){
		// alert("hola"+$("#nombre").val());
		$.ajax({
			type: "POST",
			url: "proc_act_traslado.php",
			data: {nombre:$("#nombre").val(), caso: 2},
			success:function(data){
				//alert(data);
				$("#nombre").val("");
				alert("Departamento guardado satifactoriamente");
				cargar_sel();
			}
		});
		cargar_sel();
	});

	$("#actualizar").click(function(){
		//alert("guardar");
		if($("#cod_act" ).val()=="" || $("#nom").val()=="" || $("#fec").val()=="" || $("#depto").val()=="" || $("#new_ubi").val()=="" ){
			
				alert("existen campos vacios");	
		}
		else{
///////////////////////////////////////////////////////////////////////////////////////
			$.ajax
				({
					type : "POST",
					url : "proc_act_traslado.php",
					data : { 
							cod_act:$("#cod_act").val() ,
							nom:$("#nom").val() , 
							fec:$("#fec").val(), 
							depto_tra:$("#depto_tra").val(), 
							new_ubi:$("#new_ubi").val() , 
							cod_tra:$("#cod_tra").val() , 
							caso : 5 
						},
					success:function(data)
					{
						//alert(data);
						alert("Actualizado exitosamente");
						$("#cod_act").val("");
						$( "#nom" ).val( "" );
						$( "#fec" ).val( "" );
						$( "#depto" ).val( "" );
						$( "#new_ubi" ).val( "" );
					}
				});
///////////////////////////////////////////////////////////////////////////////////////			
		}
	});
});

function cargar_sel(){
	$("#depto_act").load("proc_act_traslado.php",{caso:1});
	$("#depto_tra").load("proc_act_traslado.php",{caso:1});
}

function cargaDatos(cod){
	$.ajax({
		type:"post",
		url :"proc_act_traslado.php",
		data:{
			cod_tra: cod,
			caso : 4
		},
		success:function(responseText){
			//alert(responseText);
			 var dataJson = eval(responseText);
			 for(var i in dataJson){
			 	$("#cod_act").val(dataJson[i].cod_act);
			 	$("#nom").val(dataJson[i].nombre);
			 	$("#fec").val(dataJson[i].fec);
			 	$("#depto_tra option[value="+dataJson[i].new_ubi+"]").attr("selected",true);
			 	$("#new_ubi").val(dataJson[i].des);
			 	$("#cod_tra").val(dataJson[i].cod_tra);
			 	//$("#depto_act option[value="+dataJson[i].cod_dep+"]").attr("selected",true);
			}
		}
	});
}	