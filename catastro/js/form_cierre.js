$(function(){
	cargarDepartamentos("dep");
	cargarMunicipios("dep","mun");
	cargaDesdeMapa($("#cod_neg").val(),$("#cod_con").val(),$("#tipoPer").val());
	$("input[name='per']").click(function(){
		element=document.getElementById("thd");
		if($(this).val()=="J"){
			element.style.display="none";
			$("#radBusPerD").prop("disabled",true);
			$("#tabla_col").find("tr:gt(0)").remove();
		}else{
			element.style.display="block";
			$("#radBusPerD").removeAttr("disabled");
			$("#tabla_col").find("tr:gt(0)").remove();
		}
	});
	//////////////////
	$("input[name='radBusPer']").change(function(){
		if($(this).val()=="NIT"){
			$("#txtBusPer").unmask();
			$("#txtBusPer").mask("9999-999999-999-9");
			$("#txtBusPer").val("");
		}
		if($(this).val()=="DUI"){
			$("#txtBusPer").unmask();
			$("#txtBusPer").mask("99999999-9");
			$("#txtBusPer").val("");
		}
		if($(this).val()=="Nombre"){
			$("#txtBusPer").unmask();
			$("#txtBusPer").val("");
		}
	});
	$("#btnBusNeg").click(function(){
		if ($("#txtBusNeg").val()!="") {
			$("#cuerpo_neg").load("proc/proc_cierre.php",{tipoPer:$("#radTip:checked").val(),radBusNeg:$("#radBusNeg:checked").val(),txtBusNeg:$("#txtBusNeg").val(),caso:1},function(responseText,textStatus,XMLHttpRequest){
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
		if ($("#cod_neg").val()=="") {
			alert("Debe seleccionar un negocio");
		}else{
			$.ajax({
				type: "post",
				url : "proc/proc_cierre.php",
				data : {
					cod_neg : $("#cod_neg").val(),
					fec_cie : $("#fec_cie").val(),
					mot_cie : $("#mot_cie").val(),
					caso : 3
				},
				success : function(responseText){
					var num_rec="";
					var fec_rec="";
					num_rec=prompt("Ingrese el número de recibo de último pago");
					fec_rec=prompt("Ingrese la fecha del recibo");
					if (num_rec=="") {
						alert("No puede dejar el número de recibo vacío");
						num_rec=prompt("Ingrese el número de recibo de último pago");
					}else{};//poner alguna validacion en el else
					if (fec_rec=="") {
						alert("No puede dejar la fecha de recibo vacío");
						fec_rec=prompt("Ingrese la fecha del recibo");
					}else{};//poner alguna validacion en el else
					alert(responseText);
					window.open("rep_cierre_negocio.php?cod_con="+$("#cod_con").val()+"&cod_neg="+$("#cod_neg").val()+"&tip_con="+$("#tipoPer").val()+"&num_rec="+num_rec+"&fec_rec="+fec_rec+"","_self");
					limpiarCampos();
				}
			});
		}
	});

});

function cargaNeg(codper,codneg,tipoPer){
	$.ajax({
		type: "post",
		url: "proc/proc_traspaso.php",
		async: true,
		data : {
			cod_con	: codper,
			cod_neg : codneg,
			tipoPer : tipoPer,
			caso 	: 2
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#cod_neg").val(dataJson[i].cod_neg);
				$("#cod_con").val(dataJson[i].cod_per);
				if(tipoPer=="N")
					$("#nom_per").val(dataJson[i].nom+" "+dataJson[i].ape1+" "+dataJson[i].ape2);
				else
					$("#nom_per").val(dataJson[i].nom);
				$("#nom_neg").val(dataJson[i].nom_neg);
				$("#rub_neg").val(dataJson[i].rub_neg);
				if (dataJson[i].zon_neg=="Rural") {
					$("#zon_negR").prop("checked",true);
				 }else{
					$("#zon_negU").prop("checked",true);
				}
				$("#dep option[value='"+dataJson[i].dep+"']").attr("selected",true);
				$("#mun option[value='"+dataJson[i].mun+"']").attr("selected",true);
				$("#dir_neg").val(dataJson[i].dir_neg);
				$("#med_neg").val(dataJson[i].med_neg);
				$("#cod_con").val(dataJson[i].cod_per);
				$("#tipoPer").val(tipoPer);
				$("#img_neg").remove();
				$("#miniatura").html("<input type='file' id='img_neg' class='file' data-show-upload='false'>");
				if(dataJson[i].img_neg==""){
					$("#img_neg").fileinput({
						initialPreview:["<img src='./../img/no_imagen.png' class='file-preview-image'>"],
						showCaption:false,
						showRemove:false,
						allowedFileExtensions: ["jpg"]
					});
					$("#img_neg").fileinput("disable");
				}else{
					$("#img_neg").fileinput({
						initialPreview:["<img src='proc/imagenes/"+dataJson[i].img_neg+"' class='file-preview-image'>"],
						showCaption:false,
						showRemove:false,
						allowedFileExtensions: ["jpg"]
					});	
					$("#img_neg").fileinput("disable");
				}
			}
		}
	});
}

function cargaDesdeMapa(codneg,codper,tipoPer){
	if(codneg!=""&&codper!=""&&tipoPer!="")
		cargaNeg(codper,codneg,tipoPer);
}


function limpiarCampos(){
	$("#cod_neg").val("");
	$("#nom_neg").val("");
	$("#rub_neg").val("");
	$("#dir_neg").val("");
	$("#med_neg").val("0");
	$("#img_neg").val("");
	$("#cod_con").val("");
	$("#cod_pnu").val("");
	$("#nom_per").val("");
	$("#nom_nue").val("");
	$("#fec_cie").val("");
	$("#mot_cie").val("");
	$("#img_neg").remove();
	$("#miniatura").html("<input type='file' id='img_neg' class='file' data-show-upload='false'>");
	$("#img_neg").fileinput({
		initialPreview:["<img src='./../img/no_imagen.png' class='file-preview-image'>"],
		showCaption:false,
		allowedFileExtensions: ["jpg"],
	});
	$("#img_neg").fileinput("disable");
}

function cancela(){
	parent.location="index_catastro.php";
}
