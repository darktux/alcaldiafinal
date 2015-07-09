$(function(){
	$("#cod_inm").mask("99999999-9999-99");
	cargaDesdeMapa($("#cod_inm").val(),$("#cod_per").val());
	$("#btnBusPer").click(function(){
		if ($("#txtBusPer").val()!="") {
			$("#cuerpo").load("proc/proc_act_inmueble.php",{radBusPer:$("#radBusPer:checked").val(),txtBusPer:$("#txtBusPer").val(),caso:1},function(responseText,textStatus,XMLHttpRequest){
				if (textStatus=="success") {
					if (responseText=="") {
						alert("No encontrado");
					}
				};
			});

		}else{
			alert("Ingrese un parámetro de búsqueda");
		};
	});

	$("#btnBusInm").click(function(){
		if ($("#txtBusInm").val()!="") {
			$("#cuerpo_inm").load("proc/proc_act_inmueble.php",{radBusInm:$("#radBusInm:checked").val(),txtBusInm:$("#txtBusInm").val(),caso:3},function(responseText,textStatus,XMLHttpRequest){
				if (textStatus=="success") {
					if (responseText=="") {
						alert("No encontrado");
					}
				};
			});

		}else{
			alert("Ingrese un parámetro de búsqueda");
		};
	});

	$("#btnActualizar").click(function(){
		var imp=new Array();
		$("#imp option:selected").each(function(){
			imp.push($(this).val());
		});
		$.ajax({
			type : "post",
			url	 : "proc/proc_act_inmueble.php",
			data :{
				cod_inm:$("#cod_inm").val(),
				cod_pro:$("#cod_per").val(),
				zon_inm:$("#input[name='zon_inm']:checked").val(),
				dir_inm:$("#dir_inm").val(),
				med_inm:$("#med_inm").val(),
				lim_nor:$("#lim_nor").val(),
				lim_sur:$("#lim_sur").val(),
				lim_est:$("#lim_est").val(),
				lim_oes:$("#lim_oes").val(),
				imp : imp,
				caso : 5
			},
			success:function(responseText){
				alert(responseText);
				limpiarCampos();
			}
		});
	});


});

function cargaDesdeMapa(codinm,codper){
	if(codinm!=""&&codper!="")
		cargaInm(codper,codinm);
}

function cargaPer(codigo){
	$.ajax({
		type: "post",
		url: "proc/proc_act_inmueble.php",
		async: true,
		data : {
			cod_per	: codigo,
			caso 	: 3
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#cod_per").val(dataJson[i].cod_per);
				$("#nom_per").val(dataJson[i].nom+" "+dataJson[i].ape1+" "+dataJson[i].ape2);
			}
		}
	});
}

function cargaInm(codper,codinm){
	$.ajax({
		type: "post",
		url: "proc/proc_act_inmueble.php",
		data : {
			cod_pro	: codper,
			cod_inm : codinm,
			caso 	: 4
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#cod_inm").val(dataJson[i].cod_inm);
				$("#cod_per").val(dataJson[i].cod_per);
				$("#nom_per").val(dataJson[i].nom+" "+dataJson[i].ape1+" "+dataJson[i].ape2);
				if (dataJson[i].zon_inm=="Rural") {
					$("#zon_inmR").prop("checked",true);
				 }else{
					$("#zon_inmU").prop("checked",true);
				}
				$("#dir_inm").val(dataJson[i].dir_inm);
				$("#med_inm").val(dataJson[i].med_inm);
				$("#lim_nor").val(dataJson[i].lim_nor);
				$("#lim_sur").val(dataJson[i].lim_sur);
				$("#lim_est").val(dataJson[i].lim_est);
				$("#lim_oes").val(dataJson[i].lim_oes);
			}
			cargaImp(codinm);
		}
	});
}

function cargaImp(codinm){
	$.ajax({
		type: "post",
		url: "proc/proc_act_inmueble.php",
		data:{
			cod_inm:codinm,
			caso:6
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			var m=new Array();
			for(var i in dataJson){
				m[i]=dataJson[i].cod_imp;
			}
			$('.selectpicker').selectpicker('val',m);
		}
	});
}

function limpiarCampos(){
	$("#cod_inm").val("");
	$("#cod_per").val("");
	$("#nom_per").val("");
	$("#dir_inm").val("");
	$("#med_inm").val("0");
	$("#lim_nor").val("");
	$("#lim_sur").val("");
	$("#lim_est").val("");
	$("#lim_oes").val("");
	$('.selectpicker').selectpicker('val','');
}