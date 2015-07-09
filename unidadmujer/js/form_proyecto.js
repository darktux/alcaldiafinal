$(function(){
	new PNotify({
		title: 'Información',
		text: 'Los campos con (*) son obligatorios.',
		type: 'info'
	});
	$("#tel1_col").mask("9999-9999"); // Formato del telefono 1
	$("#tel2_col").mask("9999-9999"); // Formato del telefono 2
	$("#dui_col").mask("99999999-9"); // Formato del DUI
	$("#nit_col").mask("9999-999999-999-9"); // Formato del NIT
	cargarDepartamentos("dep");
	cargarMunicipios("dep","mun");
	limpiartemp();
	//Accion para el boton guardar proyecto
	$("#btnGuardar").click(function(){
		if ($("#cod_pro").val()!="" ) {
			if ($("#nom_pro").val()!="") {
				if($("#mon_pro").val()!="" && $("#mon_ext")!=""){
					var $objCuerpoTabla=$("#tabla_col").children().prev().parent();
					objDatosColumna= new Array();
					$objCuerpoTabla.find("tbody tr").each(function(){
						var cod_col = $(this).find('td').eq(0).html();
						var nom_col = $(this).find('td').eq(1).html();
						var car_col = $(this).find('td').eq(2).html();
						var sal_col = $(this).find('td').eq(3).html();
						valor = new Array(cod_col,nom_col,car_col,sal_col);
						objDatosColumna.push(valor);
					});

					$.ajax({
					type: "post",
					url: "proc/proc_proyecto.php",
					data : { 
						cod_pro : $( "#cod_pro" ).val(), 
						nom_pro : $( "#nom_pro" ).val(), 
						des : $( "#des" ).val(), 
						ubi : $("#ubi").val(), 
						fec_ini : $("#fec_ini").val(),
						fec_fin : $("#fec_fin").val(), 
						tip_fon : $("input[name='tip_fon']:checked").val(),
						mon_pro : $("#mon_pro").val(),
						mon_ext : $("#mon_ext").val(),
						pat : $("#pat").val(),
						est : $("#est option:selected").val(),
						
						"objDatosColumna": objDatosColumna,	

						caso : 1 
					},
					success: function (responseText) {
						alert(responseText);
						limpiarCampos();
						parent.location="index_unidadmujer.php";
					}
					});
				}else{
					alert("No deje el campo monto vacío");
				}
			}else{
				alert("Es necesario proporcionar un nombre para el proyecto");
			};
		}else{
			alert("Es necesario un código de proyecto");
		};
	});
	
	//Accion para buscar persona sin recargar pagina
	$("#btnBusPer2").click(function(){
		if ($("#txtBusPer2").val()!="") {
			$("#cuerpo2").load("proc/proc_proyecto.php",{radBusPer2:$("#radBusPer2:checked").val(),txtBusPer2:$("#txtBusPer2").val(),caso:4},function(responseText,textStatus,XMLHttpRequest){
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

function mostrarTipoMonto(){
	element = document.getElementById("div_montoe");
	element2= document.getElementById("div_montop");
	if ($("#tip_fon:checked").val()=="Propios") {
		element.style.display="none";
		element2.style.display="block";
		$("#labelmp").html("Monto (*)");
		$("#mon_ext").val("0");
	}
	if ($("#tip_fon:checked").val()=="Externos") {
		element.style.display="block";
		element2.style.display="none";
		$("#labelme").html("Monto (*)");
		$("#mon_pro").val("0");
	}
	if ($("#tip_fon:checked").val()=="Combinados") {
		element.style.display="block";
		element2.style.display="block";
		$("#labelmp").html("Monto Propio (*)");
		$("#labelme").html("Monto Externo (*)");
		$("#mon_ext").val("0");
		$("#mon_pro").val("0");
	}
}



function cargaDatos2(codigo){
	$.ajax({
		type:"post",
		url :"proc/proc_proyecto.php",
		data:{
			cod_per:codigo,
			caso : 5
		},
		success:function(responseText){
			var dataJson = eval(responseText);
			for(var i in dataJson){
				$("#cod_col").val(dataJson[i].cod_per);
				$("#nom_col").val(dataJson[i].nom);
				$("#ape1_col").val(dataJson[i].ape1);
				$("#ape2_col").val(dataJson[i].ape2);
				if (dataJson[i].sex=="M") {
					$("#sex_colM").prop("checked",true);
				}else{
					$("#sex_colF").prop("checked",true);
				}
				$("#fec_nac").val(dataJson[i].fec_nac);
				$("#dui_col").val(dataJson[i].dui);
				$("#nit_col").val(dataJson[i].nit);
				$("#tel1_col").val(dataJson[i].tel1);
				$("#tel2_col").val(dataJson[i].tel2);
				$("#dep option[value='"+dataJson[i].dep+"']").attr("selected",true);
				$("#mun option[value='"+dataJson[i].mun+"']").attr("selected",true);
				$("#dir_col").val(dataJson[i].dir);
			}
		}
	});
}

function remCol(id){
	// $("#tabla_col tbody tr:eq("+id+")").remove();
	$("#fila"+id+"").remove();
}

function agregar(){
	if ($("#cod_pro").val()!=""){
		if ($("#cod_col").val()!="") {
			$.ajax({
				type: "post",
				url : "proc/proc_proyecto.php",
				data:{
					cod_per:$("#cod_col").val(),
					cod_pro:$("#cod_pro").val(),
					car:$("#car_col").val(),
					sal:$("#sal_col").val(),
					caso : 2
				},
				success:function(responseText){
					cargaBen($("#cod_pro").val());
					limpiarPer();
				}
			});
		}else{
			if ($("#nom_col").val()!=""){
				if ($("#ape1_col").val()!="") {
					$.ajax({
						type: "post",
						url : "proc/proc_proyecto.php",
						data:{
							cod_pro:$("#cod_pro").val(),
							nom:$("#nom_col").val(),
							ape1:$("#ape1_col").val(),
							ape2:$("#ape2_col").val(),
							sex : $("input[name='sex_col']:checked").val(),
							fec_nac:$("#fec_nac").val(),
							dui:$("#dui_col").val(),
							nit:$("#nit_col").val(),
							tel1:$("#tel1_col").val(),
							tel2:$("#tel2_col").val(),
							dep :$("#dep option:selected").val(),
							mun :$("#mun option:selected").val(),
							dir:$("#dir_col").val(),
							car:$("#car_col").val(),
							sal:$("#sal_col").val(),
							caso : 3
						},
						success:function(responseText){
							cargaBen($("#cod_pro").val());
							limpiarPer();
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
		alert("Debe ingresar los datos de proyecto");
	}
	
}

function cargaBen(codigopro){
	$.ajax({
		type: "post",
		url : "proc/proc_proyecto.php",
		data:{
			cod_pro: codigopro,
			caso: 6
		},
		success:function(responseText){
			//alert(responseText)
			var dataJson=eval(responseText);
			//$("#cuerpo_col").html("");
			var html='';
			for(var i in dataJson){
				html += "<tr>"
				html += "<td style='display:none'>"+dataJson[i].cod_per+"</td>"
				html += "<td>"+dataJson[i].nom+" "+dataJson[i].ape1+" "+dataJson[i].ape2+"</td>"
				html += "<td>"+dataJson[i].car+"</td>"
				html += "<td>"+dataJson[i].sal+"</td>"
				html += "</tr>"
			}
			$("#cuerpo_col").html(html);
		}
	});
}

function limpiarCampos(){
	$("#cod_pro").val("");
	$("#nom_pro").val("");
	$("#des").val("");
	$("#ubi").val("");
	$("#fec_ini").val("");
	$("#fec_fin").val("");
	$("#tip_fon").val("");
	$("#mon_pro").val("0");
	$("#mon_ext").val("0");
	$("#pat").val("");
	$("#est").val("");
	$("#cod_col").val("");
	$("#nom_col").val("");
	$("#ape1_col").val("");
	$("#ape2_col").val("");
	$("#fec_nac").val("");
	$("#dui_col").val("");
	$("#nit_col").val("");
	$("#tel1_col").val("");
	$("#tel2_col").val("");
	$("#dir_col").val("");
	$("#sal_col").val("");
	$("#tabla_col").find("tr:gt(0)").remove();
}

function limpiarPer(){
	$("#cod_col").val("");
	$("#nom_col").val("");
	$("#ape1_col").val("");
	$("#ape2_col").val("");
	$("#fec_nac").val("");
	$("#dui_col").val("");
	$("#nit_col").val("");
	$("#tel1_col").val("");
	$("#tel2_col").val("");
	$("#dir_col").val("");
	$("#car_col").val("");
	$("#sal_col").val("0");
}

function cancela(){
	$.ajax({
		type:"post",
		url:"proc/proc_proyecto.php",
		data:{
			caso : 7
		},
		success:function(){
			limpiarCampos();
			parent.location="index_unidadmujer.php";
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

function vermsj(){
	new PNotify({
		title: 'Información',
		text: 'Agregue personas que colaborarán con el proyecto. (opcional)',
		type: 'info'
	});
}

function vermsj2(){
	new PNotify({
		title: 'Información',
		text: 'Si no encontró coincidencias, puede llenar los campos manualmente para ingresar a la persona deseada',
		type: 'info'
	});
}

function limpiartemp(){
	$.ajax({
		type:"post",
		url:"proc/proc_proyecto.php",
		data:{
			caso:7
		}
	});
}