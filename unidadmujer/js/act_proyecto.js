$(function(){
	$("#tel1_col").mask("9999-9999"); // Formato del telefono 1
	$("#tel2_col").mask("9999-9999"); // Formato del telefono 2
	$("#dui_col").mask("99999999-9"); // Formato del DUI
	$("#nit_col").mask("9999-999999-999-9"); // Formato del NIT
	cargarDepartamentos("dep");
	cargarMunicipios("dep","mun");
	//Accion boton buscar proyecto
	$("#btnBusProy").click(function(){
		if ($("#bus_proy").val()!="") {
			$("#cuerpoProy").load("proc/proc_act_proyecto.php",{buspor:$("#buspor:checked").val(),bus_proy:$("#bus_proy").val(),caso:1},function(responseText,textStatus,XMLHttpRequest){
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

	//	Accion para buscar persona sin recargar pagina
	$("#btnBusPer2").click(function(){
		if ($("#txtBusPer2").val()!="") {
			$("#cuerpo2").load("proc/proc_act_proyecto.php",{radBusPer2:$("#radBusPer2:checked").val(),txtBusPer2:$("#txtBusPer2").val(),caso:8},function(responseText,textStatus,XMLHttpRequest){
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

	//Actualizar datos de proyecto
	$("#btnActualizar").click(function(){
		if ($("#cod_pro").val()!="") {
			if($("#mon_pro").val()!="" && $("#mon_ext")!=""){
				$.ajax({
				type : "post",
				url : "proc/proc_act_proyecto.php",
				data :{
					cod_pro : $("#cod_pro").val(),
					nom_pro : $("#nom_pro").val(),
					des 	: $("#des").val(),
					ubi 	: $("#ubi").val(),
					fec_ini : $("#fec_ini").val(),
					fec_fin : $("#fec_fin").val(),
					tip_fon : $("input[name='tip_fon']:checked").val(),
					mon_pro : $("#mon_pro").val(),
					mon_ext : $("#mon_ext").val(),
					pat 	: $("#pat").val(),
					est		: $("#est option:selected").val(),
					caso	: 9
				},
				success: function(responseText){
					alert(responseText);
					limpiarPer();
					limpiarProy();
					parent.location="index_unidadmujer.php";
				}
				});
			}else{
				alert("No deje el campo monto vacío");
			}
		}else{
			alert("Escoga un proyecto");
		}
	});
});

function cargaProy(codigo){
	$.ajax({
		type: "post",
		url: "proc/proc_act_proyecto.php",
		async: true,
		data : {
			cod_pro	: codigo,
			caso 	: 2
		},
		success: function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#cod_pro").val(dataJson[i].cod_pro);
				$("#nom_pro").val(dataJson[i].nom_pro);
				$("#des").val(dataJson[i].des);
				$("#ubi").val(dataJson[i].ubi);
				$("#fec_ini").val(dataJson[i].fec_ini);
				$("#fec_fin").val(dataJson[i].fec_fin);
				if (dataJson[i].tip_fon=="Propios") {
					$("#tip_fon_p").prop("checked",true);
					mostrarTipoMonto();
				};
				if (dataJson[i].tip_fon=="Externos") {
					$("#tip_fon_e").prop("checked",true);
					mostrarTipoMonto();
				};
				if (dataJson[i].tip_fon=="Combinados") {
					$("#tip_fon_c").prop("checked",true);
					mostrarTipoMonto();
				};
				$("#mon_pro").val(dataJson[i].mon_pro);
				$("#mon_ext").val(dataJson[i].mon_ext);
				$("#pat").val(dataJson[i].pat);
				$("#est option[value='"+dataJson[i].est+"']").attr("selected",true);
			};
			cargaPerProy(dataJson[0].cod_pro);
		}
	});
}

function mostrarTipoMonto(){
	element = document.getElementById("div_montoe");
	element2= document.getElementById("div_montop");
	if ($("#tip_fon_p").prop("checked")) {
		element.style.display="none";
		element2.style.display="block";
		$("#labelmp").html("Monto (*)");
	}
	if ($("#tip_fon_e").prop("checked")) {
		element.style.display="block";
		element2.style.display="none";
		$("#labelme").html("Monto (*)");
	}
	if ($("#tip_fon_c").prop("checked")) {
		element.style.display="block";
		element2.style.display="block";
		$("#labelmp").html("Monto Propio (*)");
		$("#labelme").html("Monto Externo (*)");
	}
}

function cargaPerProy(cod_pro){
	$.ajax({
		type: "post",
		url: "proc/proc_act_proyecto.php",
		async: true,
		data : {
			cod_pro	: cod_pro,
			caso 	: 3
		},
		success: function(responseText){
			var dataJson=eval(responseText);
			var html='';
			for(var i in dataJson){
					html += "<tr id='fila"+i+"'>"
					html += "<td style='display:none'>"+dataJson[i].cod_per+"</td>"
					html += "<td>"+dataJson[i].nom+"</td>"
					html += "<td>"+dataJson[i].car+"</td>"
					html += "<td>"+dataJson[i].sal+"</td>"
					html += "<td style='width:80px;'><button class='btn' onclick=\"editCol('"+i+"','"+dataJson[i].cod_per+"','"+cod_pro+"')\"><i class='icon-edit'></i></button><button class='btn' onclick=\"remCol('"+i+"','"+dataJson[i].cod_per+"','"+cod_pro+"')\"><i class='icon-remove'></i></button></td>"
					html += "</tr>"
			};
			$("#cuerpo_col").html(html);
		}
	});
}

function remCol(id,codper,codpro){
	//$("#tabla_col tbody tr:eq("+id+")").remove();
	$.ajax({
		type: "post",
		url: "proc/proc_act_proyecto.php",
		data:{
			cod_per : codper,
			cod_pro : codpro,
			caso : 4
		},
		success: function(){
			$("#fila"+id+"").remove();
		}
	});
}

function editCol(id,codper,codpro){
	limpiarPer();

	$.ajax({
		type : "post",
		url : "proc/proc_act_proyecto.php",
		data:{
			cod_per : codper,
			cod_pro : codpro,
			caso : 5
		},
		success: function(responseText){
			var dataJson=eval(responseText);
			$("#cod_col").val(dataJson[0].cod_per);
			$("#nom_col").val(dataJson[0].nom);
			$("#ape1_col").val(dataJson[0].ape1);
			$("#ape2_col").val(dataJson[0].ape2);
			if (dataJson[0].sex=="M") {
				$("#sex_colM").prop("checked",true);
			}else{
				$("#sex_colF").prop("checked",true);
			};
			$("#fec_nac").val(dataJson[0].fec_nac);
			$("#dui_col").val(dataJson[0].dui);
			$("#nit_col").val(dataJson[0].nit);
			$("#tel1_col").val(dataJson[0].tel1);
			$("#tel2_col").val(dataJson[0].tel2);
			$("#dep option[value='"+dataJson[0].dep+"']").attr("selected",true);
			$("#mun option[value='"+dataJson[0].mun+"']").attr("selected",true);
			$("#dir_col").val(dataJson[0].dir);
			$("#car_col").val(dataJson[0].car);
			$("#sal_col").val(dataJson[0].sal);
			boton="";
			boton += "<div class='controls'>"
			boton += "<a href='#' class='btn' id='actCol' onclick=\"actDatos('"+dataJson[0].cod_per+"')\"><i class='icon-refresh'></i> Actualizar datos</a>"
			boton += "</div>";
			$("#divAnadir").html(boton);
		}
	});
}

function actDatos(codper){
	$.ajax({
		type : "post",
		url : "proc/proc_act_proyecto.php",
		data:{
			cod_col: codper,
			cod_pro:$("#cod_pro").val(),
			nom: $("#nom_col").val(),
			ape1:$("#ape1_col").val(),
			ape2:$("#ape2_col").val(),
			sex :$("sex_col").val(),
			fec_nac:$("#fec_nac").val(),
			dui :$("#dui_col").val(),
			nit :$("#nit_col").val(),
			tel1:$("#tel1_col").val(),
			tel2:$("#tel2_col").val(),
			dep :$("#dep option:selected").val(),
			mun :$("#mun option:selected").val(),
			dir :$("#dir_col").val(),
			car :$("#car_col").val(),
			sal :$("#sal_col").val(),
			caso : 6
		},
		success: function(){
			alert("Datos de Persona Actualizados");
			boton="";
			boton += "<div class='controls'>"
			boton += "<a href='#' class='btn' id='addCol' onclick='addColaborador()'><i class='icon-plus'></i> Añadir</a>"
			boton += "</div>";
			$("#divAnadir").html(boton);
			limpiarPer();
			cargaPerProy($("#cod_pro").val());
		}
	});	
}

function addColaborador(){
	if ($("#cod_pro").val()!="") {
		if ($("#nom_col").val()!="") {
			if ($("#ape1_col").val()!="") {
				$.ajax({
					type : "post",
					url : "proc/proc_act_proyecto.php",
					data:{
						cod_pro: $("#cod_pro").val(),
						cod_col: $("#cod_col").val(),
						cod_pro:$("#cod_pro").val(),
						nom_col: $("#nom_col").val(),
						ape1_col:$("#ape1_col").val(),
						ape2_col:$("#ape2_col").val(),
						sex_col :$("#sex_col:checked").val(),
						fec_nac :$("#fec_nac").val(),
						dui_col :$("#dui_col").val(),
						nit_col :$("#nit_col").val(),
						tel1_col:$("#tel1_col").val(),
						tel2_col:$("#tel2_col").val(),
						dep :$("#dep option:selected").val(),
						mun :$("#mun option:selected").val(),
						dir_col :$("#dir_col").val(),
						car_col :$("#car_col").val(),
						sal_col :$("#sal_col").val(),
						caso : 7
					},
					success: function(responseText){
						limpiarPer();
						cargaPerProy($("#cod_pro").val());
					}
				});
			}else{
				alert("Ingrese un apellido");
			}
		}else{
			alert("Ingrese el nombre de una persona");
		}
	}else{
		alert("Escoga un proyecto");
	}
}

function limpiarPer(){
	$("#cod_col").val("");
	$("#nom_col").val("");
	$("#ape1_col").val("");
	$("#ape2_col").val("");
	$("#dui_col").val("");
	$("#nit_col").val("");
	$("#tel1_col").val("");
	$("#tel2_col").val("");
	$("#dir_col").val("");
	$("#car_col").val("");
	$("#sal_col").val("0");
}

function limpiarProy(){
	$("#cod_pro").val("");
	$("#nom_pro").val("");
	$("#des").val("");
	$("#ubi").val("");
	$("#fec_ini").val("");
	$("#fec_fin").val("");
	$("#mon_pro").val("");
	$("#mon_ext").val("");
	$("#pat").val("");
	$("#est").val("");
}

function cargaDatos2(codigo){
	$.ajax({
		type: "post",
		url: "proc/proc_act_proyecto.php",
		data : {
			cod_per	: codigo,
			caso 	: 10
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			$("#cod_col").val(dataJson[0].cod_per);
			$("#nom_col").val(dataJson[0].nom);
			$("#ape1_col").val(dataJson[0].ape1);
			$("#ape2_col").val(dataJson[0].ape2);
			if (dataJson[0].sex=="M") {
				$("#sex_colM").prop("checked",true);
			}else{
				$("#sex_colF").prop("checked",true);
			};
			$("#fec_nac").val(dataJson[0].fec_nac);
			$("#dui_col").val(dataJson[0].dui);
			$("#nit_col").val(dataJson[0].nit);
			$("#tel1_col").val(dataJson[0].tel1);
			$("#tel2_col").val(dataJson[0].tel2);
			$("#dep option[value='"+dataJson[0].dep+"']").attr("selected",true);
			$("#mun option[value='"+dataJson[0].mun+"']").attr("selected",true);
			$("#dir_col").val(dataJson[0].dir);
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

function vermsj2(){
	new PNotify({
		title: 'Información',
		text: 'Si no encontró coincidencias, puede llenar los campos manualmente para ingresar a la persona deseada',
		type: 'info'
	});
}