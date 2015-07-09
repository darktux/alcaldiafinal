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

	$("#btnBusBen").click(function(){
		//alert("hola mono"+$( "#txtBusBen" ).val() );
		if($("#txtBusBen").val()!=""){
			//alert("entro");
			$("#cuerpo").load("proc_nuevo_mantenimiento.php",{txtBus:$( "#txtBusBen" ).val(),radBus:$("#radBusBen:checked").val(),caso:3},
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

	$("#guardar_emp").click(function(){
		if($("#nit").val()=='' || $("#tel").val()=='' || $("#dire").val()=='' || $("#nom_emp").val()==''){
			alert("existen campos vacios");
		}
		else{
			$.ajax
				({
					type : "POST",
					url : "proc_nuevo_mantenimiento.php",
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
						$("#empre").load("proc_nuevo_mantenimiento.php",{caso:1},
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

	$("#guardar").click(function(){
		//alert("guardar");alert
		if($("#cod_act" ).val()=="" || $("#nom").val()=="" || $("#fec").val()=="" || $("#des").val()=="" || $("#cos").val()=="" || $("#emp").val()==""){
			
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
					url : "proc_nuevo_mantenimiento.php",
					data : { 
							cod_act:$( "#cod_act" ).val() ,
							nom:$("#nom").val() ,
							fec:$("#fec").val() , 
							des:$("#des").val(), 
							cos:$("#cos").val(), 
							emp:$("#emp").val() , 
							caso : 5 
						},
					success:function(data)
					{
						//alert(data);
						alert("Guardado exitosamente");
						$("#cod_act").val("");
						$( "#nom" ).val( "" );
						$( "#fec" ).val( "" );
						$( "#des" ).val( "" );
						$( "#cos" ).val( "" );
						$( "#emp" ).val( "" );						
					}
				});
			}
///////////////////////////////////////////////////////////////////////////////////////			
		}
	});
});

function cargaDatos(cod){
	$.ajax({
		type:"post",
		url :"proc_act_activo.php",
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
			}
		}
	});
}