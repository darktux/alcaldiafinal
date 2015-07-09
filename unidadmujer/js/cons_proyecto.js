$(function(){
	$("input[name='radBus']").click(function(){
		if ($(this).val()=="Proyecto") {
			html='';
			html += "<div class='control-group'>"
			html += "<strong>Buscar por:&nbsp;&nbsp; </strong>"
			html += "<label class='radio inline'><input type='radio' name='buspor' id='buspor' value='Código'>Código</label>"
			html += "<label class='radio inline'><input type='radio' name='buspor' id='buspor' value='Nombre' checked>Nombre</label>"
			html += "</div>"				
			html += "<input type='text' class='input-xlarge' style='width:250px;margin-top: 10px;margin-right:20px;' name='bus_proy' id='bus_proy'>"
			html += "<button class='btn' id='btnBusProy' onclick='buscarDatos()'><i class='icon-search'></i> Buscar</button>"		
			$("#filtros").html(html);
		}
		if ($(this).val()=="Estado") {
			html='';
			html += "<div class='control-group'>"
			html += "<label class='control-label'>Estado</label>"
			html += "<div class='controls'>"
			html += "<select name='est' id='est' onChange='buscarDatos()'>"
			html += "<option>Seleccione...</option>"
			html += "<option value='En espera'>En espera</option>"
			html += "<option value='En ejecución'>En ejecución</option>"
			html += "<option value='Pausado'>Pausado</option>"
			html += "<option value='Finalizado'>Finalizado</option>"	
			html += "</select>"
			html += "</div>"
			$("#filtros").html(html);
		}
		if ($(this).val()=="Fecha") {
			html='';
			html += "<div class='control-group'>"
			html += "<label class='control-label'>Estado</label>"
			html += "<div class='controls'>"
			html += "<select name='est2' id='est2'>"
			html += "<option>Seleccione...</option>"
			html += "<option value='En espera'>En espera</option>"
			html += "<option value='En ejecución'>En ejecución</option>"
			html += "<option value='Pausado'>Pausado</option>"
			html += "<option value='Finalizado'>Finalizado</option>"	
			html += "</select>"
			html += "</div>"
			html += "<div class='row-fluid'>"
			html += "<div class='control-group span3'>"
			html += "<label class='control-label' for='fec_ini' >Desde</label>"
			html += "<div class='controls'>"
			html += "<input type='date' name='fec_ini' id='fec_ini' style='width:130px;'>"
			html += "</div>"
			html += "</div>"
			html += "<div class='control-group span3'>"
			html += "<label class='control-label' for='fec_fin'>Hasta</label>"
			html += "<div class='controls'>"
			html += "<input type='date' name='fec_fin' id='fec_fin' style='width:130px;'>"
			html += "</div>"
			html += "</div>"
			html += "<div class='control-group'>"
			html += "<label class='control-label'>&nbsp;</label>"
			html += "<button class='btn' onclick='buscarDatos()'><i class='icon-search'></i> Buscar</button>"
			html += "</div>"
			html += "</div>"

			$("#filtros").html(html);
		}
		if ($(this).val()=="Monto") {
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
			html += "<button class='btn' onclick='buscarDatos()'><i class='icon-search'></i> Buscar</button>"
			html += "</div>"
			html += "</div>"
			$("#filtros").html(html);
		}
		if ($(this).val()=="Fondos") {
			html='';
			html += "<div class='control-group'>"
			html += "<label class='control-label'>Tipo de Fondos</label>"
			html += "<div class='controls'>"
			html += "<select name='tip_fon' id='tip_fon' onChange='buscarDatos()'>"
			html += "<option>Seleccione...</option>"
			html += "<option value='Propios'>Propios</option>"
			html += "<option value='Externos'>Externos</option>"
			html += "<option value='Combinados'>Combinados</option>"
			html += "</select>"
			html += "</div>"
			$("#filtros").html(html);
		}
	});

});

function buscarDatos(){
	if ($("input[name='radBus']:checked").val()=="Proyecto") {
		$.ajax({
			type : "post",
			url  : "proc/proc_cons_proyecto.php",
			data :{
				buspor  : $("input[name='buspor']:checked").val(),
				bus_proy: $("#bus_proy").val(),
				caso    : 1
			},
			success : function(responseText){
				var dataJson=eval(responseText);
				$("#tablaR").bootstrapTable('load',dataJson);
			}
			
		});
	}
	if($("input[name='radBus']:checked").val()=="Estado"){
		$.ajax({
			type : "post",
			url  : "proc/proc_cons_proyecto.php",
			data :{
				buspor : $("#est option:selected").val(),
				caso : 2
			},
			success : function(responseText){
				var dataJson=eval(responseText);
				$("#tablaR").bootstrapTable('load',dataJson);
			}
		});
	}
	if ($("input[name='radBus']:checked").val()=="Fecha") {
		$.ajax({
			type : "post",
			url  : "proc/proc_cons_proyecto.php",
			data :{
				buspor : $("#est2 option:selected").val(),
				fec_ini:$("#fec_ini").val(),
				fec_fin:$("#fec_fin").val(),
				caso : 3
			},
			success:function(responseText){
				var dataJson=eval(responseText);
				$("#tablaR").bootstrapTable('load',dataJson);
			}
		});
	}
	if ($("input[name='radBus']:checked").val()=="Monto") {
		$.ajax({
			type : "post",
			url : "proc/proc_cons_proyecto.php",
			data :{
				mon_ini : $("#mon_ini").val(),
				mon_fin : $("#mon_fin").val(),
				caso : 4
			},
			success:function(responseText){
				var dataJson=eval(responseText);
				$("#tablaR").bootstrapTable('load',dataJson);
			}
		});
	}
	if($("input[name='radBus']:checked").val()=="Fondos"){
		$.ajax({
			type: "post",
			url : "proc/proc_cons_proyecto.php",
			data:{
				tip_fon:$("#tip_fon option:selected").val(),
				caso:5
			},
			success:function(responseText){
				var dataJson=eval(responseText);
				$("#tablaR").bootstrapTable('load',dataJson);
			}
		});
	}
	
}
