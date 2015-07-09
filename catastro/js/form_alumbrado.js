$(function(){
	if($("#cod").val()!=""||$("#cod").val()!=null){
		var aux=$("#cod").val();
		editCol(aux);
	}
	
	$("#btnGuardar").click(function(){
		if($("#sit_en").val()==""){
			alert("Ingrese la dirección donde esta situada la lámpara");
		}else{
			$("#pos").val(marker.getPosition());
			$.ajax({
				type :"post",
				url : "proc/proc_alumbrado.php",
				data:{
					sit_en:$("#sit_en").val(),
					alum_mun:$("input[name='alum_mun']:checked").val(),
					puntos:$("#pos").val(),
					caso : 1
				},
				success:function(responseText){
					alert(responseText);
					limpiarCampos();
					cargaAlumbrado();
				}
			});
		}
	});
});

function cargaAlumbrado(){
	$.ajax({
		type : "post",
		url : "proc/proc_alumbrado.php",
		data :{
			caso : 2
		},
		success : function(responseText){
			var gasJson=eval(responseText);
			var html='';
			$("#tablaR").bootstrapTable('load',gasJson);
		}
	});
}

function limpiarCampos(){
	$("#sit_en").val("");
}

function cancela(){
	parent.location="index_catastro.php";
}

function remCol(cod_alumbrado){
	if(confirm("¿Está seguro que desea eliminar esta lámpara? esta acción no se puede deshacer")){
		$.ajax({
			type: "post",
			url: "proc/proc_alumbrado.php",
			data:{
				cod_alumbrado : cod_alumbrado,
				caso : 3
			},
			success: function(responseText){
				//$("#fila"+i+"").remove();
				cargaAlumbrado();
				alert(responseText);
			}
		});
	}
}

function editCol(cod_alumbrado){
	$.ajax({
		type : "post",
		url : "proc/proc_alumbrado.php",
		data:{
			cod_alumbrado : cod_alumbrado,
			caso : 4
		},
		success: function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#pos").val(dataJson[i].posicion);
				$("#ico").val(3);
				$("#sit_en").val(dataJson[i].sit_en);
				if (dataJson[i].alum_mun=="Funcionando") {
					$("#alum_bueno").prop("checked",true);
				}else{
					$("#alum_malo").prop("checked",true);
				}
			
				
				cargarMapa();
				//cargaAll(dataJson[i],3){
				boton="";
				boton += "<div class='controls'>"
				boton += "<button class='btn' id='actCol' onclick=\"actDatos('"+dataJson[i].cod_alumbrado+"')\"><i class='icon-refresh'></i> Actualizar datos</button>"
				boton += "</div>";
				$("#divAnadir").html(boton);
				e=document.getElementById("divActions");
				e.style.display="none";
			}
		}
	});
}

function actDatos(cod_alumbrado){
	$("#pos").val(marker.getPosition());
	$.ajax({
		type : "post",
		url : "proc/proc_alumbrado.php",
		data :{
			cod_alumbrado:cod_alumbrado,
			sit_en:$("#sit_en").val(),
			alum_mun:$("input[name='alum_mun']:checked").val(),
			puntos:$("#pos").val(),
			caso:5
		},
		success:function(responseText){
			alert(responseText);
			limpiarCampos();
			e=document.getElementById("divActions");
			e.style.display="block";
			$("#divAnadir").html("");
			cargaAlumbrado();
		}
	});



}