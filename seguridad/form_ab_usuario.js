$(function(){
	var x="activo"
	$("a[href='#activo']").on('shown', function (){
					x="activo";
				});

	$("a[href='#inactivo']").on('shown', function (){
					x="inactivo"
				});

	$("#btnBusBen").click(function(){
		//alert("entro="+x);
		
		if($("#txtBusBen").val()!=""){
			if(x=="activo"){
				$("#cuerpo1").load("proc_ab_usuario.php",{txtBus:$( "#txtBusBen" ).val(),radBus:$("#radBusBen:checked").val(),caso:1,activo:x},
				function(responseText,textStatus,XMLHttoRequest){
					if(textStatus=="success"){
						if(responseText==""){
							alert("No encontrado");
						}
					}
				});
			}
			else{
				$("#cuerpo2").load("proc_ab_usuario.php",{txtBus:$( "#txtBusBen" ).val(),radBus:$("#radBusBen:checked").val(),caso:1,activo:x},
				function(responseText,textStatus,XMLHttoRequest){
					if(textStatus=="success"){
						if(responseText==""){
							alert("No encontrado");
						}
					}
				});
			}
			
		}
		else{
			alert("ingrese parametro");
		}
	});


	$("#guardar").click(function(){
///////////////////////////////////////////////////////////////////////////////////////
			
				$.ajax
				({
					type : "POST",
					url : "proc_ab_usuario.php",
					data : { 
							cod:$( "#cod" ).val() ,
							nom:$("#nom").val() ,
							usu:$("#usu").val() , 
							niv:$("#niv").val(), 
							cor:$("#cor").val(), 
							act:$("#act").val(),
							caso : 3
						},
					success:function(data)
					{
						//alert(data);
						alert("Actualizado exitosamente");
						$( "#cod" ).val( "" );
						$( "#nom" ).val( "" );
						$( "#niv option[value=0]" ).attr( "selected","selected" );
						$( "#cor" ).val( "" );
						$( "#contra2" ).val( "" );
						$( "#contra" ).val( "" );
						$( "#usu" ).val( "" );						
					}
				});
			
///////////////////////////////////////////////////////////////////////////////////////			
	});

});

function cargaDatos(cod){
	$.ajax({
		type:"post",
		url :"proc_ab_usuario.php",
		data:{
			cod_man: cod,
			caso : 2
		},
		success:function(responseText){
			//alert(responseText);
			 var dataJson = eval(responseText);
			 for(var i in dataJson){
			 	$("#nom").val(dataJson[i].nom);
			 	$("#cor").val(dataJson[i].cor);
			 	$("#usu").val(dataJson[i].usu);
			 	$("#contra").val(dataJson[i].contra);
			 	$("#contra2").val(dataJson[i].contra);
			 	$("#cod").val(dataJson[i].cod);
			 	$("#niv option[value="+dataJson[i].niv+"]").attr('selected', 'selected');
			 	$("#txtBusBen").val("");
			 	$("#act").val(dataJson[i].act);
			 	if(dataJson[i].act=='t'){
			 		$("#guardar").html("<i class='icon-arrow-down'></i> Dar de baja");	
			 	}
			 	else{
			 		$("#guardar").html("<i class='icon-arrow-up'></i> Dar de alta");
			 	}
			 	
			}
		}
	});
}