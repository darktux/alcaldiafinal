$(function(){
	$("#btnActualizar").click(function(){
		$.ajax({
			type: "post",
			url: "proc/proc_act_impuesto.php",
			data:{
				codigo: $("#codigo").val(),
				nom_cue:$("#nom_cue").val(),
				des_cue:$("#des_cue").val(),
				tip_cob:$("input[name=tip_cob]:checked").val(),
				cob_por:$("#cob_por").val(),
				cob_fij:$("#cob_fij").val(),
				cob_min:$("#cob_min").val(),
				cob_met:$("#cob_met").val(),
				caso:1
			},
			success:function(responseText){
				alert(responseText);
				limpiarCampos();
			}
		});
	});

	$("#btnBusImp").click(function(){
		if ($("#txtBusImp").val()!="") {
			$("#cuerpo").load("proc/proc_act_impuesto.php",{buspor:$("#radBusImp:checked").val(),txtBusImp:$("#txtBusImp").val(),caso:2},function(responseText,textStatus,XMLHttpRequest){
				if (responseText=="") {
					alert("No encontrado");
				};
			});			
		}else{
			alert("Ingrese un parámetro de búsqueda");
		}
	});

	$("input[name='radBusImp']").change(function(){
		if($(this).val()=="Codigo"){
			$("#txtBusImp").unmask();
			$("#txtBusImp").mask("99999");
			$("#txtBusImp").val("");
		}
		if($(this).val()=="Nombre"){
			$("#txtBusImp").unmask();
			$("#txtBusImp").val("");
		}
	});
});

function muestraTipo(){
	divMinimo = document.getElementById("divMinimo");
	divMaximo= document.getElementById("divMaximo");
	divTarifa= document.getElementById("divTarifa");
	if ($("input[name=tip_cob]:checked").val()=="Porcentaje") {
		divMinimo.style.display="none";
		divMaximo.style.display="block";
		divTarifa.style.display="block";
		$("#cob_por").val("0");
		$("#cob_fij").val("0");
		$("#cob_min").val("2.86");
	}
	if ($("input[name=tip_cob]:checked").val()=="Fijo") {
		divMinimo.style.display="block";
		divMaximo.style.display="none";
		divTarifa.style.display="none";
		$("#cob_fij").val("0");
		$("#cob_min").val("2.86");
		$("#cob_por").val("0");
	}
	
}

function cargaImp(codigo){
	$.ajax({
		type:"post",
		url :"proc/proc_act_impuesto.php",
		data:{
			codigo:codigo,
			caso:3
		},
		success:function(responseText){
			divMinimo = document.getElementById("divMinimo");
			divMaximo= document.getElementById("divMaximo");
			divTarifa= document.getElementById("divTarifa");
			
			var dataJson=eval(responseText);
			$("#codigo").val(dataJson[0].codigo);
			$("#nom_cue").val(dataJson[0].nom_cue);
			$("#des_cue").val(dataJson[0].des_cue);
			if(dataJson[0].tip_cob=="Porcentaje"){
				$("#tip_cobP").attr("checked",true);
				divMinimo.style.display="none";
				divMaximo.style.display="block";
				divTarifa.style.display="block";
			}else{
				$("#tip_cobF").attr("checked",true);
				divMinimo.style.display="block";
				divMaximo.style.display="none";
				divTarifa.style.display="none";
			}
			if(dataJson[0].cob_met=="t"){
				$("#cob_met").attr("checked",true);
			}else{
				$("#cob_met").attr("checked",false);
			}
			
			$("#cob_por").val(dataJson[0].cob_por);
			$("#cob_fij").val(dataJson[0].cob_fij);
			$("#cob_min").val(dataJson[0].cob_min);
		}
	});
}


function limpiarCampos(){
	$("#formImpuesto")[0].reset();
}

function cancela(){
	parent.location="index_colecturia.php";
}