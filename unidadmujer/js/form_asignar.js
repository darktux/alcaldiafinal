$(function(){
	new PNotify({
		title: 'Información',
		text: 'Los campos con (*) son obligatorios.',
		type: 'info'
	});
	
	$("#tel1").mask("9999-9999"); // Formato del telefono 1
	$("#tel2").mask("9999-9999"); // Formato del telefono 2
	$("#dui").mask("99999999-9"); // Formato del DUI
	$("#nit").mask("9999-999999-999-9"); // Formato del NIT
	cargarDepartamentos("dep");
	cargarMunicipios("dep","mun");
	$("#btnBusProy").click(function(){
		if ($("#bus_proy").val()!="") {
			$("#cuerpoProy").load("proc/proc_asignar.php",{buspor:$("#buspor:checked").val(),bus_proy:$("#bus_proy").val(),caso:1},function(responseText,textStatus,XMLHttpRequest){
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

	$("#btnBusPer").click(function(){
		if ($("#txtBusPer").val()!="") {
			$("#cuerpo").load("proc/proc_asignar.php",{radBusPer:$("#radBusPer:checked").val(),txtBusPer:$("#txtBusPer").val(),caso:3},function(responseText,textStatus,XMLHttpRequest){
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
		url: "proc/proc_asignar.php",
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
			}
			cargaBen(codigo);
		}
	});
}

function cargaPer(codigo){
	$.ajax({
		type: "post",
		url: "proc/proc_asignar.php",
		async: true,
		data : {
			cod_per	: codigo,
			caso 	: 4
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#cod_per").val(dataJson[i].cod_per);
				$("#nom").val(dataJson[i].nom);
				$("#ape1").val(dataJson[i].ape1);
				$("#ape2").val(dataJson[i].ape2);
				if (dataJson[i].sex=="M") {
					$("#sexM").prop("checked",true);
				}else{
					$("#sexF").prop("checked",true);
				}
				$("#fec_nac").val(dataJson[i].fec_nac);
				$("#dui").val(dataJson[i].dui);
				$("#nit").val(dataJson[i].nit);
				$("#tel1").val(dataJson[i].tel1);
				$("#tel2").val(dataJson[i].tel2);
				$("#dep option[value='"+dataJson[i].dep+"']").attr("selected",true);
				$("#mun option[value='"+dataJson[i].mun+"']").attr("selected",true);
				$("#dir").val(dataJson[i].dir);
			}
		}
	});
}

function asignar(){
	if ($("#cod_pro").text()!=""){
		if ($("#cod_per").val()!="") {
			$.ajax({
				type: "post",
				url : "proc/proc_asignar.php",
				async: true,
				data:{
					cod_per:$("#cod_per").val(),
					cod_pro:$("#cod_pro").text(),
					caso : 5
				},
				success:function(){
					cargaBen($("#cod_pro").text());
					limpiarCampos();
				}
			});
		}else{
			if ($("#nom").val()!=""){
				if ($("#ape1").val()!="") {
					$.ajax({
						type: "post",
						url : "proc/proc_asignar.php",
						async: true,
						data:{
							cod_pro:$("#cod_pro").text(),
							nom:$("#nom").val(),
							ape1:$("#ape1").val(),
							ape2:$("#ape2").val(),
							sex : $("input[name='sex']:checked").val(),
							fec_nac:$("#fec_nac").val(),
							dui:$("#dui").val(),
							nit:$("#nit").val(),
							tel1:$("#tel1").val(),
							tel2:$("#tel2").val(),
							dep :$("#dep").val(),
							mun :$("#mun").val(),
							dir:$("#dir").val(),
							caso : 9
						},
						success:function(){
							cargaBen($("#cod_pro").text());
							limpiarCampos();
						}
					});
				}else{
					alert("Ingrese el primer apellido");
				}
			}else{
				alert("Ingrese un nombre");
			}
			
		}
		
	}else{
		alert("Debe seleccionar un proyecto");
	}
	
}

function cargaBen(codigopro){
	$.ajax({
		type: "post",
		url : "proc/proc_asignar.php",
		async: true,
		data:{
			cod_pro: codigopro,
			caso: 8
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			var html='';
			for(var i in dataJson){
				html += "<tr id='fila"+i+"'>"
				html += "<td style='display:none'>"+dataJson[i].cod_per+"</td>"
				html += "<td>"+dataJson[i].nom+"</td>"
				html += "<td>"+dataJson[i].ape1+" "+dataJson[i].ape2+"</td>"
				html += "<td>"+dataJson[i].dui+"</td>"
				html += "<td style='width:80px;'><button class='btn' onclick=\"editCol('"+i+"','"+dataJson[i].cod_per+"','"+$("#cod_pro").text()+"')\"><i class='icon-edit'></i></button><button class='btn' onclick=\"remCol('"+i+"','"+dataJson[i].cod_per+"','"+$("#cod_pro").text()+"')\"><i class='icon-remove'></i></button></td>"
				html += "</tr>"
			}
			$("#cuerpo_asignar").html(html);
		}
	});
}

function limpiarCampos(){
	$("#cod_per").val("");
	$("#nom").val("");
	$("#ape1").val("");
	$("#ape2").val("");
	$("#dui").val("");
	$("#nit").val("");
	$("#tel1").val("");
	$("#tel2").val("");
	$("#dir").val("");
	$("#fec_nac").val("");
}

function remCol(id,codper,codpro){
	//$("#tabla_col tbody tr:eq("+id+")").remove();
	$.ajax({
		type: "post",
		url: "proc/proc_asignar.php",
		data:{
			cod_per : codper,
			cod_pro : codpro,
			caso : 6
		},
		success: function(){
			$("#fila"+id+"").remove();
		}
	});
}

function editCol(id,codper,codpro){
	cargaPer(codper);
	boton="";
	boton += "<div class='controls'>"
	boton += "<button class='btn' id='actCol' onclick=\"actDatos('"+codper+"')\"><i class='icon-refresh'></i> Actualizar datos</button>"
	boton += "</div>";
	$("#divAnadir").html(boton);
}

function actDatos(codper){
	$.ajax({
		type:"post",
		url: "proc/proc_asignar.php",
		data:{
			cod_per : $("#cod_per").val(),
			nom : $("#nom").val(),
			ape1 : $("#ape1").val(),
			ape2 :$("#ape2").val(),
			sex : $("input[name='sex']:checked").val(),
			fec_nac:$("#fec_nac").val(),
			dui : $("#dui").val(),
			nit : $("#nit").val(),
			tel1 : $("#tel1").val(),
			tel2 : $("#tel2").val(),
			dep : $("#dep option:selected").val(),
			mun : $("#mun option:selected").val(),
			dir : $("#dir").val(),
			caso : 7
		},
		success:function(){
			cargaBen($("#cod_pro").text());
			boton="";
			boton += "<div class='controls'>"
			boton += "<button class='btn' onclick='asignar()'><i class='icon-plus'></i> Añadir</button>"
			boton += "</div>";
			$("#divAnadir").html(boton);
			limpiarCampos();
		}
	});
}

function vermsj(){
	new PNotify({
		title: 'Información',
		text: 'Si no encontró coincidencias, puede llenar los campos manualmente para ingresar a la persona deseada',
		type: 'info'
	});
}