			$(function(){
		$('.selectpicker').selectpicker();
		$("select[name='radBus']").change(function(){
			$.ajax({
				type:"post",
	         	url: "proc/proc_cons_catastro.php",
	          data:{
					opcion:$(this).val(),
				},
	          success:function(responseText){
	          	var titulo="";
	          	if($("select[name='radBus']").val()=="pe"){
			    	titulo="Personas enterradas por año (Según títulos de perpetuidad)";
			    }	
			    if($("select[name='radBus']").val()=="ne"){
			    	titulo="Negocios inscritos por año";
			    }
			     if($("select[name='radBus']").val()=="in"){
			    	titulo="Inmuebles registrados por año";
			    }
			     if($("select[name='radBus']").val()=="al"){
			    	titulo="Estado de lámparas de la municipalidad";
			    }
			    
	         var titulo ={
	         	title:titulo,
				is3D: true,
				width: 800,
                height: 400
			};
	      	var data = new google.visualization.DataTable(responseText);
	      	var chart = new google.visualization.PieChart(document.getElementById('migrafica'));
	      		chart.draw(data,titulo);
	
		
				}
			});
			
		});
	});
	