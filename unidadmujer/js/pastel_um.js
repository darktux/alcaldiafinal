			$(function(){
		$('.selectpicker').selectpicker();
		$("select[name='radBus']").change(function(){
			$.ajax({
				type:"post",
	         	url: "proc/proc_cons_expediente.php",
	          data:{
					opcion:$(this).val(),
				},
	          success:function(responseText){
	       
	          	var tit="";
	     		if($("select[name='radBus']").val()=="sx"){
			    	tit="Estadística por sexo de las personas con expediente";
			    }	
			    if($("select[name='radBus']").val()=="ec"){
			    	tit="Estado civil de personas con expediente";
			    }
			     if($("select[name='radBus']").val()=="ne"){
			    	tit="Nivel de educación de las personas con expediente";
			    }
			     if($("select[name='radBus']").val()=="ps"){
			    	tit="Pasatiempos de las personas con expediente ";
			    }
			    if($("select[name='radBus']").val()=="sl"){
			    	tit="¿Se encuentra trabajando bajo contrato?";
			    }
			    if($("select[name='radBus']").val()=="de"){
			    	tit="¿Depende económicamente con el presunto agresor?";
			    }  
			    if($("select[name='radBus']").val()=="ta"){
			    	tit="Tipo de alimentación";
			    }
			    if($("select[name='radBus']").val()=="ma"){
			    	tit="¿Sufre maltratos?";
			    }
			    if($("select[name='radBus']").val()=="as"){
			    	tit="¿Ha sufrido abuso sexual?";
			    }
			    if($("select[name='radBus']").val()=="ca"){
			    	tit="Carácter de las agresiones";
			    }
			    if($("select[name='radBus']").val()=="pa"){
			    	tit="Presunto agresor manifiesta";
			    }

	         var titulo ={
	         	title:tit,
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
	