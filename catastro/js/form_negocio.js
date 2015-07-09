$(function(){
	new PNotify({
		title: 'Información',
		text: 'Los campos con (*) son obligatorios.',
		type: 'info'
	});
	cargarDepartamentos("dep");
	cargarMunicipios("dep","mun");
	cargarGiro();
	//consume_alert();
	$('.selectpicker').selectpicker();
	$("input[name='radTip']").click(function(){
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
	$("#btnBusPer").click(function(){
		if ($("#txtBusPer").val()!="") {
			$("#cuerpo").load("proc/proc_negocio.php",{radTip:$("#radTip:checked").val(),radBusPer:$("input[name='radBusPer']:checked").val(),txtBusPer:$("#txtBusPer").val(),caso:1},function(responseText,textStatus,XMLHttpRequest){
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

	$("#addG").click(function(){
		if($("#nue_gir").val()==""){
			alert("Ingrese un nombre para el giro o rubro");
		}else{
			$.ajax({
				type: "post",
				url: "proc/proc_negocio.php",
				data:{
					nue_gir:$("#nue_gir").val(),
					caso:4
				},
				success:function(responseText){
					cargarGiro();
					$("#div_addG").modal('hide');
					$("#rub_neg option[value='"+$("#nue_gir").val()+"']").attr("selected",true);
					$("#nue_gir").val("");
				}
			});
		}
	});

	
});

function cargaPer(codigo,tipoPer){
	$.ajax({
		type: "post",
		url: "proc/proc_negocio.php",
		async: true,
		data : {
			tipo : tipoPer,
			cod_per	: codigo,
			caso 	: 2
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#cod_con").val(dataJson[i].cod_per);
				$("#tipoPer").val(tipoPer);
				if (tipoPer=="N") {
					$("#nom_per").val(dataJson[i].nom+" "+dataJson[i].ape1+" "+dataJson[i].ape2);
				}else{
					$("#nom_per").val(dataJson[i].nom);
				}
				
			}
		}
	});
}

function cargarGiro(){
	$("#rub_neg").load("proc/proc_negocio.php",{caso:5},function(responseText,textStatus,XMLHttpRequest){
		if(textStatus=="success"){

		}
	});
}

function limpiarCampos(){
	$("#formulario")[0].reset();
	$('.selectpicker').selectpicker('val','');
}

function cancela(){
	parent.location="index_catastro.php";
}

function consume_alert(_alert) {
    if (_alert) return;
    _alert = window.alert;
    window.alert = function(message) {
        new PNotify({
            title: 'Alert',
            text: message
        });
    };
}

function guardarN(){
	if ($("#nom_neg").val()!="") {
		if ($("#cod_con").val()!="") {
			if ($("#med_neg").val()=="") {
				alert("Metros a calle debe tener un valor");
				$("#med_neg").focus();
			}else{
				var inputFileImage = document.getElementById("img_neg");
				var file = inputFileImage.files[0];
				if($("#pos").val()!=null||$("#pos").val()!=""){
					if(auxx==0){
						$("#pos").val(marker.getPosition());
					}
				}
				var data = new FormData($("#formulario")[0]);
				data.append('img_neg',file);
				data.append('caso',3);
       							
				$.ajax({
					type : "post",
					url  : "proc/proc_negocio.php",
					async: true,
           			//necesario para subir archivos via ajax
           			cache: false,
		            contentType: false,
           			processData: false,
           			data:data,
					success:function(responseText){
						var dataJson=eval(responseText);
						if(dataJson[0].exito==1){
							alert("Guardado exitosamente");	
							window.open("rep_apertura_negocio.php?cod_con="+$("#cod_con").val()+"&cod_neg="+dataJson[0].cod_neg+"&tip_con="+$("#tipoPer").val()+"","_self");
						}
					}
				});
			}
		}else{
			alert("Debe escoger un contribuyente");
		}
	}else{
		alert("Debe proporcionar un nombre para la empresa");
		$("#nom_neg").focus();
		//consume_alert(alert("Debe proporcionar un nombre para la empresa"));
	}
}