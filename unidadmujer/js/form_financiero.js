$(function(){
	new PNotify({
		title: 'Información',
		text: 'Los campos con (*) son obligatorios.',
		type: 'info'
	});
	$("#btnBusProy").click(function(){
		if ($("#bus_proy").val()!="") {
			$("#cuerpoProy").load("proc/proc_financiero.php",{buspor:$("#buspor:checked").val(),bus_proy:$("#bus_proy").val(),caso:1},function(responseText,textStatus,XMLHttpRequest){
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

});

function cargaProy(codigo){
	$.ajax({
		type: "post",
		url: "proc/proc_financiero.php",
		async: true,
		data : {
			cod_pro	: codigo,
			caso 	: 2
		},
		success: function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#cod_pro").html(dataJson[i].cod_pro);
				$("#nom_pro").html(dataJson[i].nom_pro);
				// $("#des").val(dataJson[i].des);
				// $("#ubi").val(dataJson[i].ubi);
				$("#fec_ini").val(dataJson[i].fec_ini);
				$("#fec_fin").val(dataJson[i].fec_fin);
				// if (dataJson[i].tip_fon=="Propios") {
				// 	$("#tip_fon_p").prop("checked",true);
				// 	mostrarTipoMonto();
				// };
				// if (dataJson[i].tip_fon=="Externos") {
				// 	$("#tip_fon_e").prop("checked",true);
				// 	mostrarTipoMonto();
				// };
				// if (dataJson[i].tip_fon=="Combinados") {
				// 	$("#tip_fon_c").prop("checked",true);
				// 	mostrarTipoMonto();
				// };
				// $("#mon_pro").val(dataJson[i].mon_pro);
				// $("#mon_ext").val(dataJson[i].mon_ext);
				// $("#pat").val(dataJson[i].pat);
				// $("#est option[value='"+dataJson[i].est+"']").attr("selected",true);
			};
			cargaGastos(dataJson[0].cod_pro);
		}
	});
}

function cargaGastos(codigopro){
	$.ajax({
		type : "post",
		url : "proc/proc_financiero.php",
		async: true,
		data :{
			cod_pro : codigopro,
			caso : 3
		},
		success : function(responseText){
			var gasJson=eval(responseText);
			var html='';
			for(var i in gasJson){
				html += "<tr id='fila"+i+"'>"
				html += "<td style='display:none'>"+gasJson[i].cod_com+"</td>"
				html += "<td>"+gasJson[i].fec_com+"</td>"
				html += "<td>"+gasJson[i].num_com+"</td>"
				html += "<td>"+gasJson[i].con_com+"</td>"
				html += "<td>"+gasJson[i].mon_com+"</td>"
				html += "<td style='width:80px;'><button class='btn' onclick=\"editCol('"+i+"','"+gasJson[i].cod_com+"','"+codigopro+"')\"><i class='icon-edit'></i></button><button class='btn' onclick=\"remCol('"+i+"','"+gasJson[i].cod_com+"','"+codigopro+"')\"><i class='icon-remove'></i></button></td>"
				html += "</tr>"

			}
			$("#cuerpo_com").html(html);
		}
	});
}

function remCol(id,codgas,codpro){
	//$("#tabla_col tbody tr:eq("+id+")").remove();
	$.ajax({
		type: "post",
		url: "proc/proc_financiero.php",
		data:{
			cod_com : codgas,
			cod_pro : codpro,
			caso : 5
		},
		success: function(){
			$("#fila"+id+"").remove();
		}
	});
}

function editCol(id,codgas,codpro){
	$.ajax({
		type : "post",
		url : "proc/proc_financiero.php",
		data:{
			cod_com : codgas,
			cod_pro : codpro,
			caso : 3
		},
		success: function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				if (codgas==dataJson[i].cod_com) {
					$("#fec_com").val(dataJson[i].fec_com);
					$("#num_com").val(dataJson[i].num_com);
					$("#con_com").val(dataJson[i].con_com);
					$("#mon_com").val(dataJson[i].mon_com);
					boton="";
					boton += "<div class='controls'>"
					boton += "<button class='btn' id='actCol' onclick=\"actDatos('"+dataJson[i].cod_com+"')\"><i class='icon-refresh'></i> Actualizar datos</button>"
					boton += "</div>";
					$("#divAnadir").html(boton);
				}
			}
		}
	});
}

function actDatos(codigo){
	$.ajax({
		type : "post",
		url : "proc/proc_financiero.php",
		data:{
			cod_com : codigo,
			fec_com : $("#fec_com").val(),
			num_com : $("#num_com").val(),
			con_com : $("#con_com").val(),
			mon_com : $("#mon_com").val(),
			caso : 6
		},
		success:function(){
			cargaGastos($("#cod_pro").text());
			boton="";
			boton += "<div class='controls'>"
			boton += "<button class='btn' id='add_com' onclick='anadirComprobante()'><i class='icon-plus'></i> Agregar</button>"
			boton += "</div>";
			$("#divAnadir").html(boton);
			limpiarCampos();
		}
	});
}

function anadirComprobante(){
	if ($("#cod_pro").text()!="") {
		if ($("#fec_com").val()!="") {
			$.ajax({
				type: "post",
				url: "proc/proc_financiero.php",
				async: true,
				data : {
					cod_pro	: $("#cod_pro").text(),
					fec_com : $("#fec_com").val(),
					num_com : $("#num_com").val(),
					con_com : $("#con_com").val(),
					mon_com : $("#mon_com").val(),
					caso 	: 4
				},
				success:function(responseText){
					cargaGastos($("#cod_pro").text());
					limpiarCampos();
				}
			});
		}else{
			alert("Se necesita la fecha del comprobante");
		}
	}else{
			alert("Necesita seleccionar un proyecto");
	}
}

function limpiarCampos(){
	fec_com : $("#fec_com").val("");
	num_com : $("#num_com").val("");
	con_com : $("#con_com").val("");
	mon_com : $("#mon_com").val("0");
}