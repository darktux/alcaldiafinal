// $(function(){
// 	$("input[name='radBus']").click(function(){
// 		if ($(this).val()=="Nombre") {
// 			html='';
// 			html += "<div class='control-group'>"
// 			html += "<strong>Buscar por:&nbsp;&nbsp; </strong>"
// 			html += "<label class='radio inline'><input type='radio' name='buspor' id='buspor' value='DUI'>DUI</label>"
// 			html += "<label class='radio inline'><input type='radio' name='buspor' id='buspor' value='Nombre' checked>Nombre</label>"
// 			html += "</div>"				
// 			html += "<input type='text' class='input-xlarge' style='width:250px;margin-right:20px;margin-top: 10px;' name='bus_proy' id='bus_proy'>"
// 			html += "<button class='btn' id='btnBusProy' onclick='buscarDatos()'><i class='icon-search'></i> Buscar</button>"		
// 			$("#filtros").html(html);
// 		}
// 		if ($(this).val()=="Negocio") {
// 			html='';
// 			html += "<div class='control-group'>"
// 			html += "<label class='control-label'>Nombre de Negocio</label>"
// 			html += "<div class='controls'>"
// 			html += "<input type='text' id='txtNeg' class='input-xlarge' style='margin-right:20px;margin-top: 10px;'>"
// 			html += "<button class='btn' id='btnBusNeg' onclick='buscarDatos()'><i class='icon-search'></i> Buscar</button>"
// 			html += "</div>"
// 			html += "</div>"
// 			$("#filtros").html(html);
// 		}
// 		if ($(this).val()=="Inmueble") {
// 			html='';
// 			html += "<div class='control-group'>"
// 			html += "<label class='control-label'>Código Catastral</label>"
// 			html += "<div class='controls'>"
// 			html += "<input type='text' id='txtInm' class='input-xlarge' style='margin-right:20px;margin-top: 10px;'>"
// 			html += "<button class='btn' id='btnBusInm' onclick='buscarDatos()'><i class='icon-search'></i> Buscar</button>"
// 			html += "</div>"
// 			html += "</div>"
// 			$("#filtros").html(html);
// 		}
// 		if ($(this).val()=="Este no lo uso") {
// 			html='';
// 			html += "<div class='row-fluid'>"
// 			html += "<div class='control-group span3'>"
// 			html += "<label class='control-label'>Desde</label>"
// 			html += "<div class='controls'>"
// 			html += "<div class='input-prepend'>"
// 			html += "<span class='add-on'>$</span>"
// 			html += "<input type='text' name='mon_ini' id='mon_ini' style='width:130px;' value='0'>"
// 			html += "</div>"
// 			html += "</div>"
// 			html += "</div>"
// 			html += "<div class='control-group span3'>"
// 			html += "<label class='control-label'>Hasta</label>"
// 			html += "<div class='controls'>"
// 			html += "<div class='input-prepend'>"
// 			html += "<span class='add-on'>$</span>"
// 			html += "<input type='text' name='mon_fin' id='mon_fin' style='width:130px;' value='0'>"
// 			html += "</div>"
// 			html += "</div>"
// 			html += "</div>"
// 			html += "<div class='control-group'>"
// 			html += "<label class='control-label'>&nbsp;</label>"
// 			html += "<button class='btn' onclick='buscarDatos()'><i class='icon-search'></i> Buscar</button>"
// 			html += "</div>"
// 			html += "</div>"
// 			$("#filtros").html(html);
// 		}
// 		if ($(this).val()=="tipocon") {
// 			html='';
// 			html += "<div class='control-group'>"
// 			html += "<label class='radio inline'><input type='radio' name='bustipcon' id='bustipcon' value='N' onchange='buscarDatos()'>Persona Natural</label>"
// 			html += "<label class='radio inline'><input type='radio' name='bustipcon' id='bustipcon' value='J' onchange='buscarDatos()'>Persona Jurídica</label>"
// 			html += "</div>"
// 			$("#filtros").html(html);
// 		}
// 	});

// });

function buscarDatos(){
	// if ($("input[name='radBus']:checked").val()=="Nombre") {
	// 	$.ajax({
	// 		type : "post",
	// 		url  : "proc/proc_cons_contribuyente.php",
	// 		data :{
	// 			buspor  : $("input[name='buspor']:checked").val(),
	// 			bus_proy: $("#bus_proy").val(),
	// 			caso    : 1
	// 		},
	// 		success : function(responseText){
	// 			var dataJson=eval(responseText);
	// 			$("#tablaR").bootstrapTable('hideColumn', 'nom_neg');
	// 			$("#tablaR").bootstrapTable('hideColumn', 'cod_inm');
	// 			$("#tablaR").bootstrapTable('load',dataJson);
	// 		}
			
	// 	});
	// }
	// if($("input[name='radBus']:checked").val()=="Negocio"){
	// 	$.ajax({
	// 		type : "post",
	// 		url  : "proc/proc_cons_contribuyente.php",
	// 		data :{
	// 			buspor : $("#txtNeg").val(),
	// 			caso : 2
	// 		},
	// 		success : function(responseText){
	// 			var dataJson=eval(responseText);
	// 			$("#tablaR").bootstrapTable('showColumn', 'nom_neg');
	// 			$("#tablaR").bootstrapTable('hideColumn', 'cod_inm');
	// 			$("#tablaR").bootstrapTable('load',dataJson);
				
	// 		}
	// 	});
	// }
	// if ($("input[name='radBus']:checked").val()=="Inmueble") {
	// 	$.ajax({
	// 		type : "post",
	// 		url  : "proc/proc_cons_contribuyente.php",
	// 		data :{
	// 			buspor : $("#txtInm").val(),
	// 			caso : 3
	// 		},
	// 		success:function(responseText){
	// 			var dataJson=eval(responseText);
	// 			$("#tablaR").bootstrapTable('showColumn', 'cod_inm');
	// 			$("#tablaR").bootstrapTable('hideColumn', 'nom_neg');
	// 			$("#tablaR").bootstrapTable('load',dataJson);
	// 		}
	// 	});
	// }
	// if ($("input[name='radBus']:checked").val()=="Sorry") {
	// 	$.ajax({
	// 		type : "post",
	// 		url : "proc/proc_cons_contribuyente.php",
	// 		data :{
	// 			mon_ini : $("#mon_ini").val(),
	// 			mon_fin : $("#mon_fin").val(),
	// 			caso : 4
	// 		},
	// 		success:function(responseText){
	// 			var dataJson=eval(responseText);
	// 			$("#tablaR").bootstrapTable('load',dataJson);
	// 		}
	// 	});
	// }
	//if($("#input[name='radBus']:checked").val()=="tipocon"){
		//Buscar tipo de contribuyente
		$.ajax({
			type:"post",
			url :"proc/proc_cons_contribuyente.php",
			data:{
				caso:$("#bustipcon:checked").val()
			},
			success:function(data){
				var dataJson=eval(data);
				$("#tablaR").bootstrapTable('load',dataJson);
			}
		});
	//}
	
}
