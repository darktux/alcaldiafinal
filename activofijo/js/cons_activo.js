$(function(){

	$("input[name='radBus']").click(function(){
		if ($(this).val()=="Codigo" || $(this).val()=="Nombre" || $(this).val()=="Marca" || $(this).val()=="Modelo") {
			html='';
			html += "<div class='row-fluid'>"

				html += "<div class='control-group span3'>"
					html += "<label class='control-label'>&nbsp;</label>"
					html += "<div class='controls'>"
						html += "<input type='text' id='txtBusAct' name='txtBusAct'>"
					html += "</div>"
				html += "</div>"

				html += "<div class='control-group'>"
					html += "<label class='control-label'>&nbsp;</label>"
					html += "<div class='controls'>"
						html += "<button class='btn' onclick='buscarDatos1()'><i class='icon-search'></i> Buscar</button>"
					html += "</div>"
				html += "</div>"

			html += "</div>"
			$("#filtros").html(html);
		}
		if ($(this).val()=="Tipo") {
			html='';
			html += "<div class='row-fluid'>"

				html += "<div class='control-group'>"
					html += "<label class='control-label'>&nbsp;</label>"
					html += "<div class='controls'>"
						html += "<select name='tfondo' id='sel_tfondo' onchange='buscarDatos2()'></select>"
					html += "</div>"
				html += "</div>"

			html += "</div>"
			$("#filtros").html(html);
			$("#sel_tfondo").load("proc/proc_cons_activo.php",{caso:2});
		}
		if ($(this).val()=="Adquisicion" || $(this).val()=="Garantia") {
			html='';
			html += "<div class='row-fluid'>"
			html += "<div class='control-group span3'>"
			html += "<label class='control-label' for='fec_ini' >Desde</label>"
			html += "<div class='controls'>"
			html += "<input type='date' name='fec_ini' id='fec_ini' style='width:130px;' onChange='compararFechaI()'>"
			html += "</div>"
			html += "</div>"
			html += "<div class='control-group span3'>"
			html += "<label class='control-label' for='fec_fin'>Hasta</label>"
			html += "<div class='controls'>"
			html += "<input type='date' name='fec_fin' id='fec_fin' style='width:130px;' onChange='compararFechaF()'>"
			html += "</div>"
			html += "</div>"
			html += "<div class='control-group'>"
			html += "<label class='control-label'>&nbsp;</label>"
			html += "<button class='btn' onclick='buscarDatos2()'><i class='icon-search'></i> Buscar</button>"
			html += "</div>"
			html += "</div>"
			$("#filtros").html(html);
		}
	}

	);
});

function buscarDatos1(){
	if($("#txtBusAct").val()!=''){
		$.ajax({
			type : "post",
			url  : "proc/proc_cons_activo.php",
			data :{
				buspor  : $("input[name='radBus']:checked").val(),
				txtBusAct: $("#txtBusAct").val(),
				caso    : 1
			},
			success : function(responseText){
				//alert(responseText);
				var dataJson=eval(responseText);
				$("#tablaR").bootstrapTable('load',dataJson);
			}
			
		});
	}
	else{
		alert("Por Favor, Rellene el campo de busqueda");
	}
}


function buscarDatos2(){
	
	if ($("input[name='radBus']:checked").val()=="Tipo") {
		if($("#sel_tfondo").val()!=''){
				$.ajax({
				type : "post",
				url  : "proc/proc_cons_activo.php",
				data :{
					buspor  : $("input[name='radBus']:checked").val(),
					txtBusAct: $("#sel_tfondo").val(),
					caso : 1
				},
				success:function(responseText){
					//alert(responseText);
					var dataJson=eval(responseText);
					$("#tablaR").bootstrapTable('load',dataJson);
				}
			});	
		}
		else{
			alert("Por Favor, Rellene el campo de busqueda");
		}
		
	}
	if ($("input[name='radBus']:checked").val()=="Adquisicion") {
		if($("#fec_ini").val()!='' && $("#fec_fin").val()){}
		$.ajax({
			type : "post",
			url  : "proc/proc_cons_activo.php",
			data :{
				buspor  : $("input[name='radBus']:checked").val(),
				txtBusAct1:$("#fec_ini").val(),
				txtBusAct2:$("#fec_fin").val(),
				caso : 1
			},
			success:function(responseText){
				var dataJson=eval(responseText);
				$("#tablaR").bootstrapTable('load',dataJson);
			}
		});
	}
	if ($("input[name='radBus']:checked").val()=="Garantia") {
		$.ajax({
			type : "post",
			url  : "proc/proc_cons_activo.php",
			data :{
				buspor  : $("input[name='radBus']:checked").val(),
				txtBusAct1:$("#fec_ini").val(),
				txtBusAct2:$("#fec_fin").val(),
				caso : 1
			},
			success:function(responseText){
				//alert(responseText);
				var dataJson=eval(responseText);
				// $("#tablaR").bootstrapTable('hideColumn','nom');
				// $("#tablaR").bootstrapTable('hideColumn','ape1');
				// $("#tablaR").bootstrapTable('hideColumn','ape2');
				$("#tablaR").bootstrapTable('load',dataJson);
			}
		});
	}
	
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
