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
        var titulo="";
        if($("select[name='radBus']").val()=="sx"){
            titulo="Estadística por sexo de las personas con expediente";
          } 
          if($("select[name='radBus']").val()=="ec"){
            titulo="Estado civil de personas con expediente";
          }
           if($("select[name='radBus']").val()=="ne"){
            titulo="Nivel de educación de las personas con expediente";
          }
           if($("select[name='radBus']").val()=="ps"){
            titulo="Pasatiempos de las personas con expediente ";
          }
          if($("select[name='radBus']").val()=="sl"){
            titulo="¿Se encuentra trabajando bajo contrato?";
          }
          if($("select[name='radBus']").val()=="de"){
            titulo="¿Depende económicamente con el presunto agresor?";
          }  
          if($("select[name='radBus']").val()=="ta"){
            titulo="Tipo de alimentación";
          }
          if($("select[name='radBus']").val()=="ma"){
            titulo="¿Sufre maltratos?";
          }
          if($("select[name='radBus']").val()=="as"){
            titulo="¿Ha sufrido abuso sexual?";
          }
          if($("select[name='radBus']").val()=="ca"){
            titulo="Carácter de las agresiones";
          }
          if($("select[name='radBus']").val()=="pa"){
            titulo="Presunto agresor manifiesta";
          }
        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: { title: titulo},
          // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
          },
          bar: { groupWidth: "40%" },
          isStacked: true
        };
        var data = new google.visualization.DataTable(responseText);
        var chart = new google.charts.Bar(document.getElementById('migrafica2'));
        chart.draw(data, options);
      }
    });
  });
});
  