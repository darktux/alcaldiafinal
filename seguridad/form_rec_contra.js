$(function(){
//	$("").mask("{1,20}@{1,20}.{3}[.{2}]")

	//$("#btn_enviar").hide();
	$("#pregunta").load("proc_rec_contra.php",{caso:2});

	$("#btn_buscar").click(function(){
		//alert("hola");
		if($("#txt_buscar").val()!=''){
		//	alert("hola"+$("#txt_buscar").val());
			$.ajax
					({
						type : "POST",
						url : "proc_rec_contra.php",
						data : { 
								txt_buscar:$( "#txt_buscar" ).val() ,
								caso : 3
							},
						success:function(data)
						{
							
							//alert(data);
							//alert("buscado exitosamente");
							if(data=="El usuario digitado no se encuentra."){
								$("#txt_buscar").val("");

							}
							var dataJson = eval(data);
							for(var i in dataJson){
							 	$("#txt_pregunta").val("¿"+dataJson[i].pre);
							 	$("#txt_buscar").prop('disabled',true);
							 	$("#txt_pregunta").prop('disabled',true);
							 	$("#txt_res").prop('disabled',false);
							 	$("#btn_enviar").prop('disabled',false);
							 	$("#btn_buscar").prop('disabled',true);
							}

						}
					});	
		}
		else{alert("Por favor digite un usuario valido.");}
	});

	$("#btn_enviar").click(function(){
		//alert("hola");
		if($("#txt_res").val()!=''){
		//	alert("hola"+$("#txt_buscar").val());
			$.ajax
					({
						type : "POST",
						url : "proc_rec_contra.php",
						data : { 
								txt_res:$( "#txt_res" ).val() ,
								txt_buscar:$( "#txt_buscar" ).val() ,
								caso : 4
							},
						success:function(data)
						{
							
							//alert(data);
							if(data=="son iguales"){
								$("#contra1").prop("disabled",false);
								$("#contra2").prop("disabled", false);
								$("#txt_res").val("");
								$("#txt_res").prop("disabled",true);
								$("#cambiar").prop("disabled",false);
								$("#btn_enviar").prop("disabled",true);
							}else{
								alert("error al buscar respuesta de seguridad")
								$("#txt_res").val("");
							}
							

						}
					});	
		}
		else{alert("Por favor digite un respuesta valida.");}
	});

	$("#cambiar").click(function(){
		if($("#contra1").val()==$("#contra2").val()){
			$.ajax({
				type:"POST",
				url: "proc_rec_contra.php",
				data:{txt_buscar: $("#txt_buscar").val(),contra1: $("#contra1").val(),caso: 5},
				success: function(data){
					alert(data);
					$("#cambiar").prop("disabled",true);
					$("#btn_enviar").prop("disabled",true);
					$("#btn_buscar").prop("disabled",false);
					$("#txt_buscar").prop("disabled",false);
					$("#txt_buscar").val("");
					$("#txt_res").prop("disabled",true);
					$("#txt_res").val("");
					$("#txt_pregunta").prop("disabled",true);
					$("#txt_pregunta").val("");
					$("#contra1").prop("disabled",true);
					$("#contra1").val("");
					$("#contra2").prop("disabled",true);
					$("#contra2").val("");
				}
			});
		}
		else{
			alert("Las contraseñas no coinciden.");
			$("#contra1").val("");
			$("#contra2").val("");
		}
	});

});