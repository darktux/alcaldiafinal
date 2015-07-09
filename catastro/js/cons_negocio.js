$(function(){
	$("input[name='radBus']").click(function(){
		if ($(this).val()=="Zona") {
			html='';
			html += "<div class='control-group'>"
			html += "<label class='radio inline'><input type='radio' name='buspor' id='buspor' value='Rural' onChange='buscarDatos()'>Rural</label>"
			html += "<label class='radio inline'><input type='radio' name='buspor' id='buspor' value='Urbana' onChange='buscarDatos()'>Urbana</label>"
			html += "</div>"
			$("#filtros").html(html);
		}
		if ($(this).val()=="Giro") {
			html='';
			html += "<div class='controls'>"
			html += "<select name='rub_neg' id='rub_neg' onchange='buscarDatos()'>"
			html += "</select>"
			html += "</div>"
			$("#filtros").html(html);
			cargarGiro();
		}
		if ($(this).val()=="Contribuyente") {
			html='';		
			html += "<div class='control-group'>"
			html += "<strong>Buscar por:&nbsp;&nbsp; </strong>"
			html += "<label class='radio inline'><input type='radio' id='per' name='per' value='N' checked>Persona Natural</label>"
			html += "<label class='radio inline'><input type='radio' id='per' name='per' value='J' >Persona Jurídica</label>"
			html += "<br>"
			html += "<label class='radio inline'><input type='radio' name='buspor2' value='DUI' onchange='mascara()'>DUI</label>"
			html += "<label class='radio inline'><input type='radio' name='buspor2' value='NIT' onchange='mascara()'>NIT</label>"
			html += "<label class='radio inline'><input type='radio' name='buspor2' value='Nombre' onchange='mascara()' checked>Nombre</label>"
			html += "</div>"				
			html += "<input type='text' class='input-xlarge' style='width:250px;margin-right:20px;margin-top: 10px;' name='bus_proy' id='bus_proy'>"
			html += "<button class='btn' id='btnBusProy' onclick='buscarDatos()'><i class='icon-search'></i> Buscar</button>"		
			$("#filtros").html(html);
		}
	});

});

function buscarDatos(){
	if ($("input[name='radBus']:checked").val()=="Contribuyente") {
		$.ajax({
			type : "post",
			url  : "proc/proc_cons_negocio.php",
			data :{
				tipoper :$("#per:checked").val(),
				buspor  :$("input[name='buspor2']:checked").val(),
				bus_per: $("#bus_proy").val(),
				caso    : 1
			},
			success : function(responseText){
				var dataJson=eval(responseText);
				// $("#tablaR").bootstrapTable('showColumn','nom');
				// $("#tablaR").bootstrapTable('showColumn','ape1');
				// $("#tablaR").bootstrapTable('showColumn','ape2');
				$("#tablaR").bootstrapTable('load',dataJson);
			}
			
		});
	}
	if($("input[name='radBus']:checked").val()=="Giro"){
		$.ajax({
			type : "post",
			url  : "proc/proc_cons_negocio.php",
			data :{
				buspor : $("#rub_neg option:selected").val(),
				caso : 2
			},
			success : function(responseText){
				var dataJson=eval(responseText);
				$("#tablaR").bootstrapTable('load',dataJson);
				
			}
		});
	}
	if ($("input[name='radBus']:checked").val()=="Zona") {
		$.ajax({
			type : "post",
			url  : "proc/proc_cons_negocio.php",
			data :{
				buspor  : $("input[name='buspor']:checked").val(),
				caso : 3
			},
			success:function(responseText){
				var dataJson=eval(responseText);
				$("#tablaR").bootstrapTable('load',dataJson);
			}
		});
	}
	
	
}

function cargarGiro(){
	$("#rub_neg").load("proc/proc_cons_negocio.php",{caso:5},function(responseText,textStatus,XMLHttpRequest){
		if(textStatus=="success"){

		}
	});
}

function mascara(){
	if($("input[name='buspor2']:checked").val()=="NIT"){
			$("#bus_proy").unmask();
			$("#bus_proy").mask("9999-999999-999-9");
			$("#bus_proy").val("");
		}
		if($("input[name='buspor2']:checked").val()=="DUI"){
			$("#bus_proy").unmask();
			$("#bus_proy").mask("99999999-9");
			$("#bus_proy").val("");
		}
		if($("input[name='buspor2']:checked").val()=="Nombre"){
			$("#bus_proy").unmask();
			$("#bus_proy").val("");
		}
}