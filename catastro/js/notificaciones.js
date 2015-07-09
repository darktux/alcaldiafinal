var hola=[];
var hola2=[];
function verificarN(){
	$.ajax({
		type: "post",
		url : "proc/proc_mapa.php",
		data:{
			caso:5
		},
		success:function(data){
			dataJson=eval(data);
			for(var i in dataJson){
				if(dataJson[i].puntos=="" || dataJson[i].puntos==null){
					hola[i]=new PNotify({
						title: 'Aviso',
						text: "El negocio "+dataJson[i].nom_neg+" no se encuentra en el mapa, ¿Desea agregarlo?"+
								"<p align='right'><a class='btn btn-ppal' onclick='verInfo("+dataJson[i].cod_neg+",\""+dataJson[i].nom_neg+"\","+i+")'>Sí</a>"+
								"&nbsp;&nbsp;<a class='btn' onclick='verCancel("+i+")'>Luego</a></p>",
						hide: false,
						type: "info",
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
			}
		}
	});
}

function verificarI(){
	$.ajax({
		type: "post",
		url : "proc/proc_mapa.php",
		data:{
			caso:2
		},
		success:function(data){
			dataJson=eval(data);
			for(var i in dataJson){
				if(dataJson[i].puntos=="" || dataJson[i].puntos==null){
					hola2[i]=new PNotify({
						title: 'Aviso',
						text: "El inmueble con código catastral "+dataJson[i].cod_inm+" no se encuentra en el mapa, ¿Desea agregarlo?"+
								"<p align='right'><a class='btn btn-ppal' onclick='verInfoInm(\""+dataJson[i].cod_inm+"\",\""+dataJson[i].dir_inm+"\","+i+")'>Sí</a>"+
								"&nbsp;&nbsp;<a class='btn' onclick='verCancelInm("+i+")'>Luego</a></p>",
						hide: false,
						type: "info",
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
			}
		}
	});
}

function verInfo(cod_neg,nom_neg,i){	
	hola[i].update({
		title: "Información",
		text: "Haga click sobre el mapa, justo donde se encuentra el negocio: "+nom_neg,
		type: 'success',
		hide:true,
		delay:4000
	});
	actualizaPuntoN(cod_neg);
}

function verInfoInm(cod_inm,dir_inm,i){
	hola2[i].update({
		title: "Información",
		text: "Haga click sobre el mapa, justo donde se encuentra el inmueble con dirección: "+dir_inm,
		type: 'success',
		hide:true,
		delay:4000
	});
	actualizaPuntoI(cod_inm);
}
function verCancel(i){
	hola[i].update({
		title: "Información",
		text: "Se le recordará nuevamente establecer este negocio en el mapa",
		type: 'notice',
		hide:true,
		delay:4000
	});
//	hola[i].remove();
}
function verCancelInm(i){
	hola2[i].update({
		title: "Información",
		text: "Se le recordará nuevamente establecer este inmueble en el mapa",
		type: 'notice',
		hide:true,
		delay:4000
	});
//	hola[i].remove();
}