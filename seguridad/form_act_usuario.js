$(function(){

	$("#nit").mask("9999-999999-999-9"); // Formato del NIT
	$("#tel").mask("9999-9999"); // Formato del telefono 
	 //$("#cor").mask("a[2]");

	$("#btnBusBen").click(function(){
		//alert("hola mono"+$( "#txtBusBen" ).val() );
		if($("#txtBusBen").val()!=""){
			//alert("entro");
			$("#cuerpo").load("proc_act_usuario.php",{txtBus:$( "#txtBusBen" ).val(),radBus:$("#radBusBen:checked").val(),caso:1},
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


	$("#actualizar").click(function(){
		if($("#nom" ).val()=="" || $("#cor").val()=="" || $("#niv").val()=="" || $("#contra").val()=="" || $("#contra2").val()=="" || $("#cod").val()=="" || $("#usu").val()=="" ){
			
				alert("existen campos vacios");	
		}
		else{
			if(validarEmail($("#cor").val()) ){
///////////////////////////////////////////////////////////////////////////////////////
			
				$.ajax
				({
					type : "POST",
					url : "proc_act_usuario.php",
					data : { 
							cod:$( "#cod" ).val() ,
							nom:$("#nom").val() ,
							usu:$("#usu").val() , 
							niv:$("#niv").val(), 
							cor:$("#cor").val(), 
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
			}
		}
	});


});

function cargaDatos(cod){
	$.ajax({
		type:"post",
		url :"proc_act_usuario.php",
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
			}
		}
	});
}

function validarEmail( email ) {
	//alert("email="+email);
	var bandera= false;
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) ){
        alert("Error: La dirección de correo " + email + " es incorrecta.");
    	bandera= false;
    }
    else{
    	//alert("correo exitoso");
    	bandera=true;
	}
	return bandera;
}