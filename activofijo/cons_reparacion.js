$(function(){
	$("input[name='radBus']").click(function(){
		//alert("hola");
		//alert('entro '+$(this).val());
		if ($(this).val()=="Codigo" || $(this).val()=="Nombre" || $(this).val()=="Empresa") {
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

		if($(this).val()=="Fecha"){
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
						html += "<button class='btn' onclick='buscarDatos1()'><i class='icon-search'></i> Buscar</button>"
					html += "</div>"
				html += "</div>"

			$("#filtros").html(html);
		}

		if($(this).val()=="Costo"){
			html='';
			html += "<div class='row-fluid'>"
			html += "<div class='control-group span3'>"
			html += "<label class='control-label'>Desde</label>"
			html += "<div class='controls'>"
			html += "<div class='input-prepend'>"
			html += "<span class='add-on'>$</span>"
			html += "<input type='text' name='mon_ini' id='mon_ini' style='width:130px;' value='0'>"
			html += "</div>"
			html += "</div>"
			html += "</div>"
			html += "<div class='control-group span3'>"
			html += "<label class='control-label'>Hasta</label>"
			html += "<div class='controls'>"
			html += "<div class='input-prepend'>"
			html += "<span class='add-on'>$</span>"
			html += "<input type='text' name='mon_fin' id='mon_fin' style='width:130px;' value='0'>"
			html += "</div>"
			html += "</div>"
			html += "</div>"
			html += "<div class='control-group'>"
			html += "<label class='control-label'>&nbsp;</label>"
			html += "<button class='btn' onclick='buscarDatos1()'><i class='icon-search'></i> Buscar</button>"
			html += "</div>"
			html += "</div>"
			$("#filtros").html(html);
		}

	});
});

function buscarDatos1(){
	if ($("input[name='radBus']:checked").val()=="Codigo" || $("input[name='radBus']:checked").val()=="Nombre" || $("input[name='radBus']:checked").val()=="Empresa" ){
		if($("#txtBusAct").val()!=''){
			$.ajax({
				type : "post",
				url  : "proc_cons_reparacion.php",
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
	if ($("input[name='radBus']:checked").val()=="Fecha") {
		if($("#fec_ini").val()!='' && $("#fec_fin").val()!=''){
			$.ajax({
				type : "post",
				url  : "proc_cons_reparacion.php",
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
		else{alert("Por Favor, Rellene el campo de busqueda");}
	}
	if ($("input[name='radBus']:checked").val()=="Costo") {
		if($("#mon_ini").val()!='' && $("#mon_fin").val()!=''){
			$.ajax({
				type : "post",
				url  : "proc_cons_reparacion.php",
				data :{
					buspor  : $("input[name='radBus']:checked").val(),
					txtBusAct1:$("#mon_ini").val(),
					txtBusAct2:$("#mon_fin").val(),
					caso : 1
				},
				success:function(responseText){
					//alert(responseText);
					var dataJson=eval(responseText);
					$("#tablaR").bootstrapTable('load',dataJson);
				}
			});
		}
		else{alert("Por Favor, Rellene el campo de busqueda");}	
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

/*function compararMontoI(){
	var fech1 = $("#mon_ini").val();
	var fech2 = $("#mon_fin").val();

	if(fech2 <= fech1){
		alert("El monto inicial no puede ser mayor o igual al monto de final "+fech1+fech2);
		$("#mon_ini").val("");
	}
}*/

/*function compararMontoF(){
	var fech1 = $("#mon_ini").val();
	var fech2 = $("#mon_fin").val();

	if((fech1) > (fech2)){
		alert("2El monto final no puede ser mayor al monto de finalización");
		$("#fec_ini").val("");
	}
}*/