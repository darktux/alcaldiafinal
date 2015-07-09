$(function(){
	$("input[name='radBus']").click(function(){
		if ($(this).val()=="Codigo") {
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
		if ($(this).val()=="Nombre") {

		}
		if ($(this).val()=="Marca") {}
		if ($(this).val()=="Modelo") {}
		if ($(this).val()=="Serie") {}
		if ($(this).val()=="Adquisicion") {}
		if ($(this).val()=="Garantia") {}
	});
});