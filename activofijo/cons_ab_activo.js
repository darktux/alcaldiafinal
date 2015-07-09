$(function(){
	$("#btnBusBen").click(function(){
		//alert("hola mono"+$( "#txtBusBen" ).val() );
		if($("#txtBusBen").val()!=""){
			//alert("entro");
			$("#cuerpo").load("proc_ab_activo.php",{txtBus:$( "#txtBusBen" ).val(),radBus:$("#radBusBen:checked").val(),caso:3},
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


	$("#descargo").click(function(){
		$.ajax
				({
					type : "POST",
					url : "proc_ab_activo.php",
					data : { 
							cod_act:$( "#cod_act" ).val() ,
							mot: $("#mot").val(),
							fec_des: $("#fec_des").val(),
							caso : 5 
						},
					success:function(data)
					{
						//alert(data);
						$( "#nom" ).val( "" );
						$( "#mar" ).val( "" );
						$( "#mod" ).val( "" );
						$( "#ser" ).val( "" );
						$( "#don" ).val( "" );
						$( "#cos_adq" ).val( "" );
						$( "#fec_adq" ).val( "" );
						$( "#depto" ).val( "" );
						$( "#tfondo" ).val( "" );
						$( "#ori" ).val( "" );
						$( "#fec_gar" ).val( "" );
						$( "#can" ).val( "" );
						$( "#ubi" ).val( "" );
						$( "#mot" ).val( "" );							
						$("#can_mot").click();
						alert("Activo descargado exitosamente");
					}
				});

	});

});

function cargar_sel(){
	$("#depto").load("proc_act_activo.php",{caso:1});
	$("#tfondo").load("proc_act_activo.php",{caso:2});
	ocultar();
}

function ocultar(){
	//alert("hola");
	tfondo = document.getElementById("div_tfondo");
	donado= document.getElementById("div_donado");


	if ($("#ori_c:checked").val() == "comprado") {
		//alert("c");
		tfondo.style.display="block";
		donado.style.display="none";
		//$("#tfondo option[value='1']").attr("selected",true);
	}
	if ($("#ori_d:checked").val() == "donado") {	
		//alert("d");
		tfondo.style.display="none";
		donado.style.display="block";
	}
	//agre2();
}

function cargaDatos(cod){
	$.ajax({
		type:"post",
		url :"proc_ab_activo.php",
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
			 	$("#mar").val(dataJson[i].mar);
			 	$("#mod").val(dataJson[i].mod);
			 	$("#ser").val(dataJson[i].ser);
			 	$("#depto option[value="+dataJson[i].cod_dep+"]").attr("selected",true);
			 	if (dataJson[i].ori=="donado") {
			 	 	$("#ori_d").prop("checked",true);
			 	}else{
			 	  	$("#ori_c").prop("checked",true);
			 	}
			 	ocultar();
			 	$("#cos_adq").val(dataJson[i].cos_adq);
			 	$("#tfondo option[value="+dataJson[i].cod_tfondo+"]").attr("selected",true);
			 	$("#fec_adq").val(dataJson[i].fec_adq);
			 	$("#fec_gar").val(dataJson[i].fec_gar);
			 	$("#don").val(dataJson[i].don);
			}
		}
	});
}