$(function(){
//	$("").mask("{1,20}@{1,20}.{3}[.{2}]")

	$("#pre").load("proc_nuevo_usuario.php",{caso:2});

	$("#guardar").click(
		function(){
			if( $("#nom").val()=="" || $("#cor").val()=="" || $("#niv").val()=="0" || $("#usu").val()=="" || $("#contra").val()=="" || $("#contra2").val()==""){
			
				alert("existen campos vacios");	
			}
			else{

				if(validarEmail($("#cor").val()) && validarContra($("#contra").val(),$("#contra2").val())){
					$.ajax
					({
						type : "POST",
						url : "proc_nuevo_usuario.php",
						data : { 
								nom:$( "#nom" ).val() ,
								cor:$("#cor").val() ,
								niv:$("#niv").val() , 
								usu:$("#usu").val(), 
								contra:$("#contra").val(),  
								pre:$("#pre").val(),
								res:$("#res").val(),
								caso : 1 
							},
						success:function(data)
						{
							//alert(data);
							alert("Guardado exitosamente");
							$("#nom").val("");
							$( "#cor" ).val( "" );
							$( "#niv" ).val( "" );
							$( "#usu" ).val( "" );
							$( "#contra" ).val( "" );
							$( "#contra2" ).val( "" );
						}
					});		
				}
					
			}
	});
});

function validarContra(contra,contra2){
	//alert("contra="+contra+"contra2="+contra2);
	var bandera=false;
	if (contra==contra2) { 
		//alert("contra iguales");
		bandera=true;
	}
	else{
		alert("Error las contraseñas NO coinciden");
		bandera=false;
	}	
	return bandera;

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