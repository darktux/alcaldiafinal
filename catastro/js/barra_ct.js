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
          var options = {
            width: 800,
            height: 500,
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
  