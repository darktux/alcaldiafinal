$(function(){
	
	new PNotify({
		title: 'Información',
		text: 'Los campos con (*) son obligatorios.',
		type: 'info'
	});
	
	$("#guardar").click(function(){


		if($("#cod_act" ).val()=="" || $("#nom").val()=="" || $("#mar").val()=="" || $("#mod").val()=="" || $("#ser").val()=="" || $("#depto").val()=="" || $("#can").val()=="" || $("#ubi").val()=="" || $("#cos_adq").val()=="" || $("#fec_adq").val()=="" || $("#fec_gar").val()==""){
			
				alert("existen campos vacios");	
		}
		else{
			if($("#tfondo").val()=="" && $("#don").val()==""){
				alert("existen campos vacios");
			}else{
				$.ajax
				({
					type : "POST",
					url : "proc_nuevo_activo.php",
					data : { 
							cod_act:$( "#cod_act" ).val() ,
							nom:$("#nom").val() ,
							mar:$("#mar").val() , 
							mod:$("#mod").val(), 
							ser:$("#ser").val(), 
							depto:$("#depto").val() , 
							can:$("#can").val() , 
							ubi:$("#ubi").val() , 
							don:$("#don").val() , 
							cos_adq:$("#cos_adq").val() , 
							tfondo:$("#tfondo").val() , 
							ori:$("#ori:checked").val(), 
							fec_adq:$("#fec_adq").val(), 
							fec_gar:$("#fec_gar").val(), 
							tactivo:$("#tactivo").val(), 
							caso : 3 
						},
					success:function(data)
					{
						alert(data);
						alert("Guardado exitosamente");
						$( "#nom" ).val( "" );
						$( "#mar" ).val( "" );
						$( "#mod" ).val( "" );
						$( "#ser" ).val( "" );
						$( "#don" ).val( "" );
						$( "#cos_adq" ).val( "" );
						$( "#fec_adq" ).val( "" );
						$( "#depto" ).val( "" );
						$( "#tfondo" ).val( "" );
						$( "#ori" ).val( "" );
						$( "#fec_gar" ).val( "" );
						$( "#can" ).val( "" );
						$( "#ubi" ).val( "" );							
						
					}
				});
			}
		}
		
	});	

	$("#guardar_depto").click(function(){
		// alert("hola"+$("#nombre").val());
		$.ajax({
			type: "POST",
			url: "proc_nuevo_activo.php",
			data: {nombre:$("#nombre").val(), caso: 4},
			success:function(data){
				//alert(data);
				$("#nombre").val("");
				alert("Departamento guardado satifactoriamente");
				$("#cancelar_depto").click();
				cargar_sel();
			}
		});
		cargar_sel();
	});

	$("#guardar_tfondo").click(function(){
		$.ajax({
			type: "POST",
			url: "proc_nuevo_activo.php",
			data: {nombre_tfondo:$("#nombre_tfondo").val(), descripcion:$("#descripcion").val(),caso:5},
			success:function(){
				$("#nombre_tfondo").val("");
				$("#descripcion").val("");
				alert("Guardado satifactoriamente");
				cargar_sel();
			}
		});
		cargar_sel();
	});

	$("#guardar_tactivo").click(function(){
		$.ajax({
			type: "POST",
			url: "proc_nuevo_activo.php",
			data: {nombre_tactivo:$("#nombre_tactivo").val(), tdescripcion:$("#tdescripcion").val(),tcantidad:$("#tcantidad").val(),caso:7},
			success:function(data){
				//alert(data);
				$("#nombre_tactivo").val("");
				$("#tdescripcion").val("");
				$("#tcantidad").val("");
				alert("Guardado satifactoriamente");
				cargar_sel();
				$("#cancelar_tactivo").click();
			}
		});
		cargar_sel();
	});

	$("#tfondo").change(function(){
		var texto=$("#cod_act").val();
		var origen=$("#ori:checked").val();
		if (origen=="donado"){
			//alert("donado");
		}
		else{
			
			valorCambiar= $("#tfondo").val();
			if(valorCambiar<=9){
				valorCambiar="0"+valorCambiar;
			}
			texto=substr_replace(texto, valorCambiar, 7,2);
		}
		$("#cod_act").val(texto);

		var w;
		miArray=$( "#cod_act" ).val().split("-");
		w=miArray[0]+"-"+miArray[1];

		$.ajax
		({
			type : "POST",
			url : "proc_nuevo_activo.php",
			data : { 
					cod_act: w,
					caso : 6
				},
			success:function(responseText)
			{
				var x;
				var s='';
				var entero;
				//alert(""+responseText);
				if(responseText=="[]"){
					s="000000";
				}else{
					var dataJson=eval(responseText);
					var n=dataJson.length;
				
					miArray=dataJson[n-1].cod_act.split("-");
					x=miArray[2];
					entero=parseInt(x);
					entero++;
				}
				
				if (entero>=0 && entero<=9) {
					s="00000"+entero;
				}
				if(entero>=10 && entero<=99){
					s="0000"+entero;
				}
				if(entero>=100 && entero<=999){
					s="000"+entero;
				}
				if(entero>=1000 && entero<=9999){
					s="00"+entero;
				}
				if(entero>=10000 && entero<=99999){
					s="0"+entero;
				}
				if(entero>=100000 && entero<=999999){
					s=''+entero;
				}
				//alert(entero);
				//alert(s);
				w=w+'-'+s;
				$("#cod_act").val(w);
				// for(var i in dataJson){
				// 	dataJson[i].cod_act;
				// }					
				
			}
		});		
	});

$("#ori").change(function(){
	//alert ("hola");
	var texto=$("#cod_act").val();
	var origen=$("#ori:checked").val();
	var w;
	if (origen=="donado"){
	 	valorCambiar= "00";
	 	texto=substr_replace(texto, valorCambiar,7,2);
	 	$("#cod_act").val(texto);
	}
	miArray=$("#cod_act").val().split("-");
	w=miArray[0]+"-"+miArray[1];
	$.ajax({
		type: "POST",
		url: "proc_nuevo_activo.php",
		data:{ cod_act: w, caso:6},
		success: function(responseText){
			var x;
			var s='';
			var entero;
			//alert(responseText);
			if(responseText=="[]"){
					s="000000";
			}else{
				var dataJson=eval(responseText);
				var n=dataJson.length;
				
				miArray=dataJson[n-1].cod_act.split("-");
				x=miArray[2];
				entero=parseInt(x);
				entero++;

				if (entero>=0 && entero<=9) {
					s="00000"+entero;
				}
				if(entero>=10 && entero<=99){
					s="0000"+entero;
				}
				if(entero>=100 && entero<=999){
					s="000"+entero;
				}
				if(entero>=1000 && entero<=9999){
					s="00"+entero;
				}
				if(entero>=10000 && entero<=99999){
					s="0"+entero;
				}
				if(entero>=100000 && entero<=999999){
					s=''+entero;
				}
			}
			w=w+'-'+s;
			//alert(w);
			$("#cod_act").val(w);
		}
	});
});

$("#depto").change(function(){
	var valorCambiar = $("#depto").val();
	var texto = $("#cod_act").val();
	if(valorCambiar<9){
		valorCambiar="0"+valorCambiar.toString();
	}
	if(texto.length>=4){
	 	texto=substr_replace(texto, valorCambiar, 4,2);
	 	texto=correlativo(texto);
	 	$("#cod_act").val(texto);
	}

	var w;
	miArray=$( "#cod_act" ).val().split("-");
	w=miArray[0]+"-"+miArray[1];

	$.ajax
		({
			type : "POST",
			url : "proc_nuevo_activo.php",
			data : { 
					cod_act: w,
					caso : 6
				},
			success:function(responseText)
			{
				var x;
				var s='';
				var entero;
				//alert(""+responseText);
				if(responseText=="[]"){
					s="000000";
				}else{
					var dataJson=eval(responseText);
					var n=dataJson.length;
				
					miArray=dataJson[n-1].cod_act.split("-");
					x=miArray[2];
					entero=parseInt(x);
					entero++;

					if (entero>=0 && entero<=9) {
						s="00000"+entero;
					}
					if(entero>=10 && entero<=99){
						s="0000"+entero;
					}
					if(entero>=100 && entero<=999){
						s="000"+entero;
					}
					if(entero>=1000 && entero<=9999){
						s="00"+entero;
					}
					if(entero>=10000 && entero<=99999){
						s="0"+entero;
					}
					if(entero>=100000 && entero<=999999){
						s=''+entero;
					}
				}
				
				
				//alert(entero);
				//alert(s);
				w=w+'-'+s;
				//alert(w);
				$("#cod_act").val(w);
				// for(var i in dataJson){
				// 	dataJson[i].cod_act;
				// }					
				
			}
		});	
	
});

});

function cargar_sel(){
	$("#depto").load("proc_nuevo_activo.php",{caso:1});
	$("#tfondo").load("proc_nuevo_activo.php",{caso:2});
	$("#tactivo").load("proc_nuevo_activo.php",{caso:8});
	ocultar();
}

function cargar_sel2(){
	alert("nada");
	// $("#depto").load("proc_nuevo_activo.php",{caso:1});
	// $("#tfondo").load("proc_nuevo_activo.php",{caso:2});
	// ocultar();
}

function ocultar(){
	tfondo = document.getElementById("div_tfondo");
	donado= document.getElementById("div_donado");


	if ($("#ori:checked").val() == "comprado") {
		tfondo.style.display="block";
		donado.style.display="none";
		//$("#tfondo option[value='1']").attr("selected",true);
	}
	if ($("#ori:checked").val() == "donado") {	
		tfondo.style.display="none";
		donado.style.display="block";
	}
	//agre2();
}

function substr_replace(str, replace, start, length){
	if(start<0){
		start=start+str.length;
	}
	length=length!= undefined ? length: str.length;
	if(length<0){
		length=length+str.length-start;		
	}
	return str.slice(0,start)+replace.substr(0,length)+replace.slice(length)+str.slice(start+length);
}

function agre(){
	var valorCambiar = $("#depto").val();
	var texto = $("#cod_act").val();
	if(valorCambiar<9){
		valorCambiar="0"+valorCambiar.toString();
	}
	if(texto.length>=4){
	 	texto=substr_replace(texto, valorCambiar, 4,2);
	 	texto=correlativo(texto);
	 	$("#cod_act").val(texto);
	}
}

function agre2(){
	var texto=$("#cod_act").val();
	var origen=$("#ori:checked").val();
	if (origen=="donado"){
		alert("donado");
		valorCambiar= "00";
		texto=substr_replace(texto, valorCambiar,7,2);
		alert(""+texto);
	}
	else{
		alert("comprado");
		valorCambiar= $("#tfondo").val();
		if(valorCambiar<=9){
			valorCambiar="0"+valorCambiar;
		}
		texto=substr_replace(texto, valorCambiar, 7,2);
	}
	texto=correlativo(texto);
	$("#cod_act").val(texto);
}

function correlativo(cod_act){


	return cod_act;
	
}