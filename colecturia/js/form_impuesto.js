$(function(){
	new PNotify({
		title: 'Información',
		text: 'Los campos con (*) son obligatorios.',
		type: 'info'
	});
	$("#codigo").mask("99999");
	$("#btnGuardar").click(function(){
	var data=$("#formImpuesto").serialize();
		$.ajax({
			type: "post",
			url: "proc/proc_impuesto.php",
			data:data,
			// data:{
			// 	codigo: $("#codigo").val(),
			// 	nom_cue:$("#nom_cue").val(),
			// 	des_cue:$("#des_cue").val(),
			// 	tip_cob:$("#tip_cob").val(),
			// 	cob_por:$("#cob_por").val(),
			// 	cob_fij:$("#cob_fij").val(),
			// 	cob_min:$("#cob_min").val(),
			// 	caso:1
			// },
			success:function(responseText){
				alert(responseText);
				limpiarCampos();
			}
		});
	});
});

function muestraTipo(){
	divMinimo = document.getElementById("divMinimo");
	divMaximo= document.getElementById("divMaximo");
	divTarifa= document.getElementById("divTarifa");

	if ($("#tip_cob:checked").val()=="Porcentaje") {
		divMinimo.style.display="none";
		divMaximo.style.display="block";
		divTarifa.style.display="block";
		$("#cob_por").val("0");
		$("#cob_fij").val("0");
		$("#cob_min").val("2.86");
	}
	if ($("#tip_cob:checked").val()=="Fijo") {
		divMinimo.style.display="block";
		divMaximo.style.display="none";
		divTarifa.style.display="none";
		$("#cob_fij").val("0");
		$("#cob_min").val("2.86");
		$("#cob_por").val("0");
	}
	
}

function limpiarCampos(){
	$("#formImpuesto")[0].reset();
	muestraTipo();
}

function cancela(){
	parent.location="index_colecturia.php";
}