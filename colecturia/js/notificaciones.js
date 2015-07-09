alertas=[];
$(document).ready(function(){
	cargar_push();
});

var timestamp = null;
function cargar_push(){ 
	$.ajax({
		async:	true, 
		type: "POST",
		url: "httpush.php",
		data: "&timestamp="+timestamp,
		dataType:"html",
		success: function(data){	
			var json    	   = eval("(" + data + ")");
			timestamp 		   = json.fec_hor;
			mensaje     	   = json.mensaje;
			id        		   = json.id_not;
			status      	   = json.status;
			if(timestamp == null)
			{
				
			}else{
				$.ajax({
					async:	true, 
					type: "POST",
					url: "proc/proc_notificaciones.php",
					data: "",
					dataType:"html",
					success: function(data){	
						html='';
						var dataJson=eval(data);
						for(var i in dataJson){
							//html += "<li><a onclick='generaRecibo("+dataJson[i].id_not+")' target='centro'><i class='icon-envelope'></i> "+dataJson[i].mensaje+"</a></li>"
							html += "<li id='" + dataJson[i].cod_fac + "' class='not'><a href='pdf_factura.php?cod_fac=" + dataJson[i].cod_fac + "' target='centro' onclick='eliminar(" + dataJson[i].cod_fac + ")'><i class='icon-envelope'></i> "+dataJson[i].mensaje+"</a></li>"
						}
						$('#divX').html(html);
						x=dataJson.length;
						$("#num_not").text(x);
						muestraAlerta(dataJson);
					}
				});	
			}
		setTimeout('cargar_push()',1000);
				
	}
	});		
}

function muestraAlerta(dataJson){
	for(var i in dataJson){
		PNotify.desktop.permission();
		alertas[i]=new PNotify({
			title:"Aviso",
			text: dataJson[i].mensaje,
			//text: "" + dataJson[i].mensaje + "<p><a class='btn' onclick='factura(" + dataJson[i].cod_fac + ")'>Imprimir</a></p>",
			hide: false,
			type:"info",
			desktop:{
				desktop:true
			}
		});

		//alertas[i].get().click(factura(e));

		alertas[i].get().click(function(e){
			//alert("clikeaste XDXD: " + i + " : " + this.id);
			parent.centro.location="pdf_factura.php?cod_fac=" + dataJson[i].cod_fac;
		});
	}
	/*for(var i in dataJson){
		alertas[i].get().click(function(e){
			//if ($('.ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer*, ui-pnotify-sticker*').is(e.target))
			//	return;
			//generaRecibo(dataJson,i,alertas);
			alert("clikeaste XD: " + i);
		});
	}*/
}

function factura(e){
	parent.centro.location="pdf_factura.php?cod_fac=" + cod_fac;
	//alert("XD");
}

function generaRecibo(dataJson,i,alertas){
	//alert(dataJson[i].id_not);
	//alert(dataJson[i].id_not);
	alert("clikeaste");
}