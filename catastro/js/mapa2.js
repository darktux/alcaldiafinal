var map="";
var creator ="";
var icono="";
var ico='';
var x="";
var auxx=0;
var marker = "";
var drag=true;

$(function(){//funcion que se ejecuta aL cargar el DOM
  if($("#ico").val()!=""){
    marker=new google.maps.Marker();
    cargarMapa();
  }else{
    auxx=1;
    var html='';
    html += "<div class='alert alert-info'>"
    html += "<h4>Información!</h4> Recuerde establecer la ubicación en el mapa más tarde."
    html += "</div>"
    $("#mapa").html(html);
   
  }
});

function cargarMapa() {
  //establece las opciones y crea el mapa
  var posicion= $("#pos").val();
  var aa=$("#tras").val();
  ico= $("#ico").val();
  if(aa=='true')
  {
    //alert("holaaaaaaaaa");
    drag=false;
  }

  posicion=posicion.replace("(","");
  posicion=posicion.replace(")",""); 
  posicion=posicion.trim(); 
  var post=posicion.split(',');

	var mapOptions = {
		center: new google.maps.LatLng(13.7004458,-88.9004982),//Coordenadas de San Cristobal
		zoom: 16,
    disableDefaultUI: true,
    mapTypeId: google.maps.MapTypeId.SATELLITE
	};
	map = new google.maps.Map(document.getElementById("mapa"),mapOptions);  
  if(ico=='1'){
    icono="../img/icon-neg.png";
  }
  if(ico=='2'){
    icono="../img/icon-home.png";
  }
  if(ico=='3'){
    if ($("input[name='alum_mun']:checked").val()=='Funcionando') {
           icono="../img/lamp-ok.png";
         }else{
            icono="../img/lamp-off.png";
        }
  }
  
  var npos=new google.maps.LatLng(post[0], post[1])
   marker = new google.maps.Marker({
    position: npos,
    map: map,
    draggable:drag,
    icon:icono
  });
   map.panTo(npos);//centra el mapa de acuerdo al marcador puesto
}
