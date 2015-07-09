			$(function(){
		$('.selectpicker').selectpicker();
		$("select[name='radBus']").change(function(){
			$.ajax({
				type:"post",
	         	url: "proc/proc_cons_registrofamiliar.php",
	          data:{
	          		inicio:$("#inicio").val(),
        		fin:$("#fin").val(),
					opcion:$(this).val(),
				},
	          success:function(responseText){
	       
	            var titulo="";
         if($("select[name='radBus']").val()=="nc"){
            titulo="Estadisticas de Nacimiento";
          } 
          if($("select[name='radBus']").val()=="et"){
            titulo="Estadisticas de Enterrados";
          }
           if($("select[name='radBus']").val()=="mt"){
            titulo="Estadisticas de Matrimonio";
          }
           if($("select[name='radBus']").val()=="po"){
            titulo="Estadisticas de Población";
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
	