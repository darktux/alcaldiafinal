$(function(){

	new PNotify({
		title: 'Información',
		text: 'Los campos con (*) son obligatorios.',
		type: 'info'
	});

	$("#nit").mask("9999-999999-999-9"); // Formato del NIT
	$("#tel").mask("9999-9999"); // Formato del telefono 

	$("#empre").load("proc_nuevo_mantenimiento.php",{caso:1},
		function(responseText){
			//alert(responseText);
		});

	$("#guardar_emp").click(function(){
		if($("#nit").val()=='' || $("#tel").val()=='' || $("#dire").val()=='' || $("#nom_emp").val()==''){
			alert("existen campos vacios");
		}
		else{
			$.ajax
				({
					type : "POST",
					url : "proc_actmantenimiento.php",
					data : { 
							
							nom_emp:$("#nom_emp").val() ,
							dire:$("#dire").val() ,  
							tel:$("#tel").val(), 
							nit:$("#nit").val() , 
							caso : 2 
						},
					success:function(data)
					{
						//alert(data);
						$("#empre").load("proc_actmantenimiento.php",{caso:1},
							function(responseText){
								//alert(responseText);
						});
						alert("Guardado exitosamente");
						$("#nom_emp").val("");
						$( "#dire" ).val( "" );
						$( "#tel" ).val( "" );
						$( "#nit" ).val( "" );
					}
				});
		}
		
	});

	$("#actualizar").click(function(){
		if($("#cod_act" ).val()=="" || $("#nom").val()=="" || $("#emp").val()=="" || $("#fec").val()=="" || $("#cos").val()=="" || $("#des").val()=="" || $("#cod_man").val()=="" ){
			
				alert("existen campos vacios");	
		}
		else{
///////////////////////////////////////////////////////////////////////////////////////
			if($("#tfondo").val()=="" && $("#don").val()==""){
				alert("existen campos vacios");
			}else{
				$.ajax
				({
					type : "POST",
					url : "proc_actmantenimiento.php",
					data : { 
							cod_act:$( "#cod_act" ).val() ,
							nom:$("#nom").val() ,
							emp:$("#emp").val() , 
							fec:$("#fec").val(), 
							cos:$("#cos").val(), 
							des:$("#des").val() , 
							cod_man:$("#cod_man").val() , 
							caso : 5 
						},
					success:function(data)
					{
						//alert(data);
						alert("Actualizado exitosamente");
						$( "#cod_act" ).val( "" );
						$( "#nom" ).val( "" );
						$( "#emp" ).val( "" );
						$( "#fec" ).val( "" );
						$( "#cos" ).val( "" );
						$( "#des" ).val( "" );
						$( "#cod_man" ).val( "" );						
					}
				});
			}
///////////////////////////////////////////////////////////////////////////////////////			
		}
	});



	$("#btnBusBen").click(function(){
		//alert("hola mono"+$( "#txtBusBen" ).val() );
		if($("#txtBusBen").val()!=""){
			//alert("entro");
			$("#cuerpo").load("proc_actmantenimiento.php",{txtBus:$( "#txtBusBen" ).val(),radBus:$("#radBusBen:checked").val(),caso:3},
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

});

function cargaDatos(cod){
	$.ajax({
		type:"post",
		url :"proc_actmantenimiento.php",
		data:{
			cod_man: cod,
			caso : 4
		},
		success:function(responseText){
			//alert(responseText);
			 var dataJson = eval(responseText);
			 for(var i in dataJson){
			 	$("#cod_act").val(dataJson[i].cod_act);
			 	$("#nom").val(dataJson[i].nombre);
			 	$("#des").val(dataJson[i].des);
			 	$("#cos").val(dataJson[i].cos);
			 	$("#fec").val(dataJson[i].fec);
			 	$("#emp").val(dataJson[i].emp);
			 	$("#cod_man").val(dataJson[i].cod_man);
			}
		}
	});
}