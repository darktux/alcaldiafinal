$(function(){
	$("#btnGuardar").click(function(){
		if ($("#codigo").val()=="") {
			alert("Debe seleccionar un impuesto");
		}else{
			$.ajax({
				type:"post",
				url:"proc/proc_condonacion.php",
				data:{
					codigo:$("#codigo").val(),
					fec_ini:$("#fec_ini").val(),
					fec_fin:$("#fec_fin").val(),
					num_acu:$("#num_acu").val(),
					condonado:$("input[name='con']:checked").val(),
					caso: 2
				},
				success:function(responseText){
					alert(responseText);
					limpiar();
				}
			});
		}
	});

	$("#btnBusImp").click(function(){
		if ($("#txtBusImp").val()!="") {
			$("#cuerpo").load("proc/proc_condonacion.php",{buspor:$("#radBusImp:checked").val(),txtBusImp:$("#txtBusImp").val(),caso:1},function(responseText,textStatus,XMLHttpRequest){
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

function cargaImp(codigo){
	$.ajax({
		type:"post",
		url :"proc/proc_act_impuesto.php",
		data:{
			codigo:codigo,
			caso:3
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			$("#codigo").val(dataJson[0].codigo);
			$("#nom_cue").val(dataJson[0].nom_cue);
		}
	});
}

function compararFechaF() {
	var fech1 = $("#fec_ini").val();
	var fech2 = $("#fec_fin").val();

	if((Date.parse(fech2)) < (Date.parse(fech1))){
		alert("La fecha de finalización no puede ser menor que la fecha de inicio");
		$("#fec_fin").val("");
	}

}

function compararFechaI() {
	var fech1 = $("#fec_ini").val();
	var fech2 = $("#fec_fin").val();

	if((Date.parse(fech1)) > (Date.parse(fech2))){
		alert("La fecha de inicio no puede ser mayor a la fecha de finalización");
		$("#fec_ini").val("");
	}
}

function limpiar(){
	$("#codigo").val("");
	$("#nom_cue").va("");
	$("#fec_ini").val("");
	$("#fec_fin").val("");
	$("#num_acu").val("");
	$("#nom").val("");
}

function cancela(){
	parent.location="index_colecturia.php";
}