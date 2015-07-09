$(function(){
	
	new PNotify({
		title: 'Información',
		text: 'Los campos con (*) son obligatorios.',
		type: 'info'
	});

	$("#btnBusBen").click(function(){
		//alert("hola mono"+$( "#txtBusBen" ).val() );
		if($("#txtBusBen").val()!=""){
			//alert("entro");
			$("#cuerpo").load("proc_nuevo_traslado.php",{txtBus:$( "#txtBusBen" ).val(),radBus:$("#radBusBen:checked").val(),caso:3},
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
			url: "proc_nuevo_traslado.php",
			data: {nombre:$("#nombre").val(), caso: 2},
			success:function(data){
				//alert(data);
				$("#nombre").val("");
				alert("Guardado exitosamente");
				cargar_sel();
			}
		});
		cargar_sel();
	});

	$("#guardar").click(function(){
		//alert("guardar");
		if($("#cod_act" ).val()=="" || $("#nom").val()=="" || $("#fec").val()=="" || $("#depto").val()=="" || $("#new_ubi").val()=="" ){
			
				alert("existen campos vacios");	
		}
		else{
///////////////////////////////////////////////////////////////////////////////////////
			$.ajax
				({
					type : "POST",
					url : "proc_nuevo_traslado.php",
					data : { 
							cod_act:$("#cod_act").val() ,
							nom:$("#nom").val() , 
							fec:$("#fec").val(), 
							depto_act:$("#depto_act").val(), 
							depto_tra:$("#depto_tra").val(), 
							new_ubi:$("#new_ubi").val() , 
							caso : 5 
						},
					success:function(data)
					{
						alert(data);
						alert("Guardado exitosamente");
						$("#cod_act").val("");
						$( "#nom" ).val( "" );
						$( "#fec" ).val( "" );
						$( "#depto_act" ).val( "" );
						$( "#depto_tra" ).val( "" );
						$( "#new_ubi" ).val( "" );
					}
				});
///////////////////////////////////////////////////////////////////////////////////////			
		}
	});
});

function cargar_sel(){
	$("#depto_act").load("proc_nuevo_traslado.php",{caso:1});
	$("#depto_tra").load("proc_nuevo_traslado.php",{caso:1});
}

function cargaDatos(cod){
	$.ajax({
		type:"post",
		url :"proc_nuevo_traslado.php",
		data:{
			cod_act: cod,
			caso : 4
		},
		success:function(responseText){
			//alert(responseText);
			 var dataJson = eval(responseText);
			 for(var i in dataJson){
			 	$("#cod_act").val(dataJson[i].cod_act);
			 	$("#nom").val(dataJson[i].nom);
			 	$("#depto_act option[value="+dataJson[i].new_ubi+"]").attr("selected",true);
			}
		}
	});
}	