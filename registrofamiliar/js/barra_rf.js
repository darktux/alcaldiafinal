$(function(){
    $('.selectpicker').selectpicker();
    $("select[name='radBus']").change(function(){
      $.ajax({
        type:"post",
            url: "proc/proc_cons_registrofamiliar2.php",
            data:{
                inicio:$("#inicio").val(),
            fin:$("#fin").val(),
          opcion:$(this).val(),
        },
             success:function(responseText){
         
                 var titulo="";
                 var subtitulo="";
         if($("select[name='radBus']").val()=="nc"){
            titulo="Estadisticas de Nacimiento";
            subtitulo="Taza de natalidad en el  periodo "+$("#inicio").val() +"-"+ $("#fin").val();
          } 
          if($("select[name='radBus']").val()=="et"){
            titulo="Estadisticas de Enterrados";
             subtitulo="Taza de mortalidad en el  periodo "+$("#inicio").val() +"-"+ $("#fin").val();
          }
           if($("select[name='radBus']").val()=="mt"){
            titulo="Estadisticas de Matrimonio";
            subtitulo="Taza de Matrimonio en el periodo "+$("#inicio").val() +"-"+ $("#fin").val();
          }
           if($("select[name='radBus']").val()=="po"){
            titulo="Estadisticas de Población";
            subtitulo="Taza poblacional en el  periodo "+$("#inicio").val() +"-"+ $("#fin").val();
          }
          //alert(responseText);
   var options = {
          width: 800,
          chart: {
            title: titulo,
            subtitle: subtitulo
          },
      
          
        };

       var data = new google.visualization.DataTable(responseText);
         //   var data = google . visualization . arrayToDataTable (responseText);
        var chart = new google.charts.Bar(document.getElementById('migrafica2'));
        chart.draw(data, options);

  
    
        }
      });
      
    });
  });
  