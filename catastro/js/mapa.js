var map="";
var creator ="";
var icono="";
var ico='';
var x="";
var marker="";
var markersArray = [];
var contenido="";
var img="";
var rutalinea="";
var polyline="";
var infowindow = new google.maps.InfoWindow({  
  content: ''
});
var polyline=[];

$(function(){//funcion que se ejecuta aL cargar el DOM
  cargarMapa();
  verificarN();
  verificarI();
});

function cargarMapa() {
  //establece las opciones y crea el mapa
	var mapOptions = {
		center: new google.maps.LatLng(13.7004458,-88.9004982),//Coordenadas de San Cristobal
		zoom: 16,
    mapTypeId: google.maps.MapTypeId.SATELLITE
	};
	map = new google.maps.Map(document.getElementById("mapa"),mapOptions);  
}

function ponerMarcador(position,map,icono){
  if(ico=='1'||ico=='5'){
    icono="../img/icon-neg.png";
  }
  if(ico=='2'||ico='6'){
    icono="../img/icon-home.png";
  }
  if(ico=='3'){
    icono="../img/lamp-ok.png";
  }
 marker = new google.maps.Marker({
    position: position,
    map: map,
    icon:icono
  });
  if(ico=='1'){
    parent.centro.location.href ="form_negocio.php?pos="+position+"&ico="+ico+"";
  }
  if(ico=='2'){
    parent.centro.location.href ="form_inmueble.php?pos="+position+"&ico="+ico+"";
  }
  if(ico=='3'){
    parent.centro.location.href ="form_alumbrado.php?pos="+position+"&ico="+ico+"";
  }
  //map.panTo(position);//centra el mapa de acuerdo al marcador puesto
}

function addP(){
  creator = new PolygonCreator(map);
}
function addN(){//Agrega negocio
   ico='1';
   google.maps.event.removeListener(x);
   x=google.maps.event.addListener(map,'click',function(e){
    ponerMarcador(e.latLng,map,icono);
  });
  new PNotify({
    title: 'Información',
    text:  "Haga click en el mapa donde se encuentra ubicado el negocio<br>",
    hide: true,
    type: "info",
    delay: 5000,
    confirm: {
      confirm: false,
    },
    buttons:{
      closer: true,
      sticker: false
    },
    history: {
      history: false
    }
  });
}
function addI(){//Agrega inmueble
   ico='2';
   google.maps.event.removeListener(x);
   x=google.maps.event.addListener(map,'click',function(e){
    ponerMarcador(e.latLng,map,icono);
  });
  new PNotify({
    title: 'Información',
    text:  "Haga click en el mapa donde se encuentra ubicado el inmueble<br>",
    hide: true,
    type: "info",
    delay: 5000,
    confirm: {
      confirm: false,
    },
    buttons:{
      closer: true,
      sticker: false
    },
    history: {
      history: false
    }
  });
}
function addL(){//Agrega lampara
  ico='3';
  google.maps.event.removeListener(x);
  x=google.maps.event.addListener(map,'click',function(e){
    ponerMarcador(e.latLng,map,icono);
  });
  new PNotify({
    title: 'Información',
    text:  "Haga click en el mapa donde se encuentra ubicada aproximadamente la lámpara<br>",
    hide: true,
    type: "info",
    delay: 5000,
    confirm: {
      confirm: false,
    },
    buttons:{
      closer: true,
      sticker: false
    },
    history: {
      history: false
    }
  });
}
function addC(){//agrega calle
  ico='4';

  // e=document.getElementById('btnGC');
  // e.style.display="block";
  $("#btnAC").hide();//Oculta boton Agregar
  //$("#btnGC").show();//Muestra boton Guardar
  $("#btnCC").show();//Muestra boton Cancelar
  $("#btnL").show();
  var routes = new google.maps.MVCArray();
  polyline = new google.maps.Polyline({
    rutalinea: routes,
    map: map,
    strokeColor: '#0018FF',
    strokeWeight: 7,
    strokeOpacity: 0.8,
    clickable: true
  });
  google.maps.event.addListener(map, 'click', function(e){
    rutalinea = polyline.getPath();
    rutalinea.push(e.latLng);
  });
  new PNotify({
    title: 'Información',
    text: "<h4>Paso 1:</h4>"+
    "Haga click en el mapa donde empieza el tramo de la calle<br>"+
    "<h4>Paso 2:</h4>"+
    "Puede seguir haciendo click hasta delimitar el tramo de la calle que desee<br>"+
    "<h4>Paso 3:</h4>"+    
    "Cuando haya terminado de marcar, presione el botón Listo<br>",
    hide: true,
    type: "info",
    delay: 20000,
    confirm: {
      confirm: false,
    },
    buttons:{
      closer: true,
      sticker: false
    },
    history: {
      history: false
    }
  });
}

function guardarC(){
  var ruta=[];
  for (var i=0;i<rutalinea.length;i++) {
    // ruta[i]=rutalinea.getAt(i).toString();
    ruta.push(rutalinea.getAt(i).toString());
  };

  $.ajax({
    type: "post",
    url : "proc/proc_mapa.php",
    data:{
      est_call:$("#estado_calle").val(),
      tip_call:$("#tip_call").val(),
      concepto:$("#concepto").val(),
      puntos:ruta,
      caso: 6
    },
    success:function(responseText){
      alert(responseText);
    }
  });
  $("#modalC").modal("hide");
  $("#btnAC").show();//Oculta boton Agregar
  $("#btnCC").hide();//Muestra boton Cancelar
  $("#btnL").hide();
  //cargarMapa();
  clearOverlays();
  ver(4);
}

function actualizaPuntoN(cod_neg){//Actualiza los puntos del negocio cuando no fueron ingresados con anteriorirdad
  ico='5';
  google.maps.event.removeListener(x);
  x=google.maps.event.addListener(map,'click',function(e){
    ponerMarcador(e.latLng,map,icono);
    markersArray.push(marker);
    var posicion=marker.getPosition().toString();
    $.ajax({
      type: "post",
      url : "proc/proc_negocio.php",
      data:{
        cod_neg: cod_neg,
        puntos:posicion,
        caso:6
      },
      success:function(responseText){
        alert(responseText);
        google.maps.event.removeListener(x);//evita que siga poniendo mas marcadores de los necesarion en el mapa
      }
    });
  });
}
function actualizaPuntoI(cod_inm){//Actualiza los puntos del negocio cuando no fueron ingresados con anteriorirdad
  ico='6';
  google.maps.event.removeListener(x);
  x=google.maps.event.addListener(map,'click',function(e){
    ponerMarcador(e.latLng,map,icono);
    markersArray.push(marker);
    var posicion=marker.getPosition().toString();
    $.ajax({
      type: "post",
      url : "proc/proc_inmueble.php",
      data:{
        cod_inm: cod_inm,
        puntos:posicion,
        caso:4
      },
      success:function(responseText){
        alert(responseText);
        google.maps.event.removeListener(x);//evita que siga poniendo mas marcadores de los necesarion en el mapa
      }
    });
  });
}


function ver(opcion){
  //cargarMapa();

  $.ajax({
    type: "post",
    url: "proc/proc_mapa.php",
    data:{
      caso: opcion
    },
    success:function(responseText){
      var dataJson = eval(responseText);
      if(opcion<=3){
        cargaAll(dataJson,opcion);
      }
      if(opcion==4){
        clearOverlays();
        cargaCalles(dataJson,1);
      }
    }
  });
}

function remP(){
  creator.destroy();//destruye todos los poligonos
}

function cargaAll(dataJson,ico){
 clearOverlays();
  for(var i in dataJson){
    if(dataJson[i].puntos!=null){
      dataJson[i].puntos=dataJson[i].puntos.replace("(","");
      dataJson[i].puntos=dataJson[i].puntos.replace(")",""); 
      dataJson[i].puntos=dataJson[i].puntos.trim(); 
      var post=dataJson[i].puntos.split(',');
      var npos=new google.maps.LatLng(post[0], post[1]);
      if(ico=='1'){

        icono="../img/icon-neg.png";
        if(dataJson[i].img_neg==null||dataJson[i].img_neg==""){
          img="../img/no_imagen.png";
        }else{
          img="proc/imagenes/"+dataJson[i].img_neg;
        }
        contenido=""+
        "<div class='span7' style='width:410px'>"+
        "<div class='span3'>"+
        "<h4>"+dataJson[i].nom_neg+"</h4>"+
        "<h5>"+dataJson[i].dir_neg+"</h5>"+
        "<h5>Metros a Calle: "+dataJson[i].med_neg+"m</h5>"+
        "<h5>"+dataJson[i].propietario+"</h5>"+
        "</div>"+
        "<div class='span3' style='width:150px'>"+
        "<img src='"+img+"' style='width:150px; height:100px'>"+
        "</div>"+
        "</div>"+
        "<div class='well'>"+
        "<a class='btn' title='Actualizar Datos' href='act_negocio.php?pos="+dataJson[i].puntos+"&ico=1&cod_neg="+dataJson[i].cod_neg+"&tip_neg="+dataJson[i].tip_con+"&cod_con="+dataJson[i].cod_con+"' target='centro'><i class='icon-refresh'></i></a>"+
        "<a class='btn' title='Traspaso' href='form_traspaso.php?pos="+dataJson[i].puntos+"&ico=1&cod_neg="+dataJson[i].cod_neg+"&tip_neg="+dataJson[i].tip_con+"&cod_con="+dataJson[i].cod_con+"' target='centro'><img src='./../img/icon-transfer.png' width='14px' height='14px'></a>"+
        "<a class='btn' title='Cierre' href='form_cierre.php?pos="+dataJson[i].puntos+"&ico=1&cod_neg="+dataJson[i].cod_neg+"&tip_neg="+dataJson[i].tip_con+"&cod_con="+dataJson[i].cod_con+"' target='centro'><i class='icon-ban-circle'></i></a>"+
        "<a class='btn' title='Estado de cuenta' href='form_estado_cuenta_negocio.php?cod_neg="+dataJson[i].cod_neg+"&tip_neg="+dataJson[i].tip_con+"&cod_con="+dataJson[i].cod_con+"' target='centro'><img src='./../img/icon-money.png' width='14px' height='14px'></a>"+
        "</div>";
      }
      if(ico=='2'){
        icono="../img/icon-home.png";
        contenido=""+
        "<div class='span7' style='width:410px'>"+
        "<div class='span3'>"+
        "<h4>"+dataJson[i].cod_inm+"</h4>"+
        "<h5>"+dataJson[i].dir_inm+"</h5>"+
        "<h5>Metros a Calle: "+dataJson[i].med_inm+"m</h5>"+
        "</div>"+
        "</div>"+
        "<div class='well'>"+
        "<a class='btn' title='Actualizar Datos' href='act_inmueble.php?cod_inm="+dataJson[i].cod_inm+"&cod_pro="+dataJson[i].cod_pro+"' target='centro'><i class='icon-refresh'></i></a>"+
        "<a class='btn' title='Estado de cuenta' href='form_estado_cuenta_inmueble.php?cod_inm="+dataJson[i].cod_inm+"&cod_pro="+dataJson[i].cod_pro+"' target='centro'><img src='./../img/icon-money.png' width='14px' height='14px'></a>"+
        "</div>";
      }
      if(ico=='3'){
        if (dataJson[i].alum_mun=='Inhabilitada'){
          icono="../img/lamp-off.png";
        }else{
            icono="../img/lamp-ok.png";
         }
         contenido=""+
         "<div class='well'>"+
         "<div class=''>"+
         "<div class=''>"+
         "<h5> Correlativo: "+dataJson[i].cod_alumbrado+"</h5>"+
         "<h5>Ubicación: "+dataJson[i].sit_en+"</h5>"+
         "<h5>Estado: "+dataJson[i].alum_mun+"</h5>"+
         "</div>"+
         "</div>"+
         "<div class=''>"+
         "<a class='btn' title='Actualizar Datos' href='form_alumbrado.php?cod_alumbrado="+dataJson[i].cod_alumbrado+"&ico=3' target='centro'><i class='icon-refresh'></i></a>"+
         "<a class='btn' title='Cambiar Estado' onClick='actualizaEstado("+dataJson[i].cod_alumbrado+",\""+dataJson[i].alum_mun+"\")'><i class='icon-random'></i></a>"+
         "</div>"+
         "</div>";
      }
      
      marker = new google.maps.Marker({
        position: npos,
        map: map,
        icon:icono
      });
      markersArray.push(marker);
      (function(marker, contenido) {
        google.maps.event.addListener(marker, 'click', function(){
          infowindow.setContent(contenido);
          infowindow.open(map, marker);
        });
      })(marker, contenido);
    }
  }
}

function clearOverlays() {
  for (var i = 0; i < markersArray.length; i++ ) {
    markersArray[i].setMap(null);
  }
  //alert(polyline.length);
 for (var i = 0; i < polyline.length; i++ ) {
    polyline[i].setMap(null);
 }
  polyline.length = 0;
  markersArray.length = 0;
}

function actualizaEstado(cod_alumbrado,estado){
    if (estado=="Funcionando") {
          estado="Inhabilitada";
        }else{
          estado="Funcionando";
        }
        $.ajax({
             type : "post",
             url : "proc/proc_alumbrado.php",
             data :{
                  cod_alumbrado:cod_alumbrado,
                  alum_mun:estado,
                  caso : 6
            }
        });
        //clearOverlays();
        cargarMapa();
        ver(3);
  }

function cancelarC(){
  cargarMapa();
  $("#btnAC").show();//Oculta boton Agregar
  $("#btnCC").hide();//Muestra boton Cancelar
  $("#btnL").hide();
}

function cargaCalles(dataJson,tipo){
   //cargarMapa();
   //clearOverlays();
   
  for(var i in dataJson){
    var routes = [];
    var contenido="<div class='well'>"+
    "<div class=''>"+
         "<div class=''>"+
           "<h4>Tipo de Calle: "+dataJson[i].tip_call+"</h4>"+
           "<h4>Estado: "+dataJson[i].est_call+"</h4>"+
           "<h4>Descripci&oacute;n: "+dataJson[i].concepto+"</h4>"+
          "</div>"+
         "</div>"+
         "<div class=''>"+
            "<a class='btn' title='Actualizar Datos' href='form_alumbrado.php?cod_alumbrado="+dataJson[i].cod_alumbrado+"&ico=3' target='centro'><i class='icon-refresh'></i></a>"+
            "<a class='btn' title='Cambiar Estado' onClick='actualizaEstado("+dataJson[i].cod_alumbrado+",\""+dataJson[i].alum_mun+"\")'><i class='icon-random'></i></a>"+
         "</div>"+
    "</div>";
    var color;
    if(dataJson[i].est_call=="En mantenimiento"){
        icono="../img/icon-man.png";
        color="#FF9600";
    }
    if(dataJson[i].est_call=="Cerrada"){
        icono="../img/icon-cer.png";
        color="#FF0000";
    }
    if(dataJson[i].est_call=="En construcción"){
        icono="../img/icon-con.png";
        color="#FFFF00";
    }

    if(dataJson[i].puntos!=null){
      miArray=dataJson[i].puntos.split('|');
      for (j=0;j<miArray.length;j++) {
        miArray[j]=miArray[j].replace("(","");
        miArray[j]=miArray[j].replace(")","");
        miArray[j]=miArray[j].trim();
        var post=miArray[j].split(',');
        var npos=new google.maps.LatLng(post[0], post[1]);
        var aux=miArray[miArray.length-1].split(',');
        var npos2=new google.maps.LatLng(aux[0], aux[1]);
        //var inBetween = google.maps.geometry.spherical.interpolate(npos, npos2, 0.5);  
        routes.push(npos);
      }
      if(tipo==2&&dataJson[i].est_call=="En mantenimiento"){
        polyline[i] = new google.maps.Polyline({
          path: routes,
          geodesic: true,
          strokeColor: color,
          strokeWeight: 7,
          strokeOpacity: 0.8,
          clickable: true
        });
        marker = new google.maps.Marker({
          position: npos,
          map: map,
          icon:icono
        });
        markersArray.push(marker);
        (function(marker, contenido) {
          google.maps.event.addListener(marker, 'click', function(){
            infowindow.setContent(contenido);
            infowindow.open(map, marker);
          });
        })(marker, contenido);
        polyline[i].setMap(map);
      }
      if(tipo==3&&dataJson[i].est_call=="Cerrada"){
        polyline[i] = new google.maps.Polyline({
          path: routes,
          geodesic: true,
          strokeColor: color,
          strokeWeight: 7,
          strokeOpacity: 0.8,
          clickable: true
        });
        marker = new google.maps.Marker({
          position: npos,
          map: map,
          icon:icono
        });
        markersArray.push(marker);
        (function(marker, contenido) {
          google.maps.event.addListener(marker, 'click', function(){
            infowindow.setContent(contenido);
            infowindow.open(map, marker);
          });
        })(marker, contenido);
        polyline[i].setMap(map);
      }
      if(tipo==4&&dataJson[i].est_call=="En construcción"){
        polyline[i] = new google.maps.Polyline({
          path: routes,
          geodesic: true,
          strokeColor: color,
          strokeWeight: 7,
          strokeOpacity: 0.8,
          clickable: true
        });
        marker = new google.maps.Marker({
          position: npos,
          map: map,
          icon:icono
        });
        markersArray.push(marker);
        (function(marker, contenido) {
          google.maps.event.addListener(marker, 'click', function(){
            infowindow.setContent(contenido);
            infowindow.open(map, marker);
          });
        })(marker, contenido);
        polyline[i].setMap(map);
      }
    }
  }
}

function cambio(){
  cargarMapa();
  //clearOverlays();
 var hi=new Array();
    $("#est_call option:selected").each(function(){
      hi.push($(this).val());
    });
  //alert(hi);
  $.ajax({
    type: "post",
    url: "proc/proc_mapa.php",
    data:{
      caso: 4
    },
    success:function(responseText){
      var dataJson = eval(responseText);
      for(i=0;i<hi.length;i++){
        if(hi[i]==2)
          cargaCalles(dataJson,2);
        if(hi[i]==3)
          cargaCalles(dataJson,3);
        if(hi[i]==4)
          cargaCalles(dataJson,4);
      } 
    }
  });
}