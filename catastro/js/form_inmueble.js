$(function(){
	new PNotify({
		title: 'Información',
		text: 'Los campos con (*) son obligatorios.',
		type: 'info'
	});
	$("#cod_inm").mask("99999999-9999-99");
	$("#btnBusPer").click(function(){
		if ($("#txtBusPer").val()!="") {
			$("#cuerpo").load("proc/proc_inmueble.php",{radBusPer:$("#radBusPer:checked").val(),txtBusPer:$("#txtBusPer").val(),caso:1},function(responseText,textStatus,XMLHttpRequest){
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

	$("#btnGuardar").click(function(){
		var imp=new Array();
		$("#imp option:selected").each(function(){
			imp.push($(this).val());
		});
		$.ajax({
			type:"post",
			url :"proc/proc_inmueble.php",
			data:{
				cod_inm:$("#cod_inm").val(),
				cod_pro:$("#cod_per").val(),
				zon_inm:$("input[name='zon_inm']:checked").val(),
				dir_inm:$("#dir_inm").val(),
				med_inm:$("#med_inm").val(),
				lim_nor:$("#lim_nor").val(),
				lim_sur:$("#lim_sur").val(),
				lim_est:$("#lim_est").val(),
				lim_oes:$("#lim_oes").val(),
				imp:imp,
				pos:$("#pos").val(),
				caso : 3
			},
			success:function(responseText){
				alert(responseText);
				limpiarCampos();
			}
		});
	});
});

function cargaPer(codigo){
	$.ajax({
		type: "post",
		url: "proc/proc_inmueble.php",
		async: true,
		data : {
			cod_per	: codigo,
			caso 	: 2
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