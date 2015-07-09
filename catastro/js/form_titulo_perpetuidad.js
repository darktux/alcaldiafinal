$(function(){
	new PNotify({
		title: 'Información',
		text: 'Los campos con (*) son obligatorios.',
		type: 'info'
	});
	nichos();
	$("#btnBusPer").click(function(){
		if ($("#txtBusPer").val()!="") {
			$("#cuerpo").load("proc/proc_titulo_perpetuidad.php",{radBusPer:$("#radBusPer:checked").val(),txtBusPer:$("#txtBusPer").val(),caso:1},function(responseText,textStatus,XMLHttpRequest){
				if (textStatus=="success") {
					if (responseText=="") {
						alert("No encontrado");
					}
				};
			});

		}else{
			alert("Ingrese un parámetro de búsqueda");
		};
	});

	$("#btnGuardar").click(function(){
		if ($("#cod_per").val()!="") {
			$.ajax({
				type: "POST",
				url : "proc/proc_titulo_perpetuidad.php",
				data:{
					cod_per:$("#cod_per").val(),
					cem:$("#cem option:selected").val(),
					ancho : $("#ancho").val(),
					largo : $("#largo").val(),
					lim_nor:$("#lim_nor").val(),
					lim_sur:$("#lim_sur").val(),
					lim_est:$("#lim_est").val(),
					lim_oes:$("#lim_oes").val(),
					nic_aut:$("#nic_aut").val(),
					clase : $("#clase option:selected").val(),
					valor : $("#valor").val(),
					num_rec:$("#num_rec").val(),
					fec_rec:$("#fec_rec").val(),
					fall1 : $("#fall1").val(),
					fall2 : $("#fall2").val(),
					fall3 : $("#fall3").val(),
					fall4 : $("#fall4").val(),
					fall5 : $("#fall5").val(),
					fec_fall1 : $("#fec_fall1").val(),
					fec_fall2 : $("#fec_fall2").val(),
					fec_fall3 : $("#fec_fall3").val(),
					fec_fall4 : $("#fec_fall4").val(),
					fec_fall5 : $("#fec_fall5").val(),
					nom   : $("#nom").val(),
					caso : 3
				},
				success:function(responseText){
					alert("Guardado exitosamente");
					window.open("rep_titulo.php?cod_tit="+responseText+"","_blank");
					limpiarCampos();
				}
			});
		}else{
			alert("Debe elegir un propietario para el título");
		}
	});
});


function cargaPer(codigo){
	$.ajax({
		type: "post",
		url: "proc/proc_titulo_perpetuidad.php",
		data : {
			cod_per	: codigo,
			caso 	: 2
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#cod_per").val(dataJson[i].cod_per);
				$("#nom").val(dataJson[i].nom+" "+dataJson[i].ape1+" "+dataJson[i].ape2);
				$("#dui").val(dataJson[i].dui);
			}
		}
	});
}

function limpiarCampos(){
	$("#formulario")[0].reset();
	nichos();
}

function cancela(){
	parent.location="index_catastro.php";
}

function nichos(){
	e1=document.getElementById("divfa1");
	e2=document.getElementById("divfa2");
	e3=document.getElementById("divfa3");
	e4=document.getElementById("divfa4");
	e5=document.getElementById("divfa5");
	fe1=document.getElementById("divfec_fa1");
	fe2=document.getElementById("divfec_fa2");
	fe3=document.getElementById("divfec_fa3");
	fe4=document.getElementById("divfec_fa4");
	fe5=document.getElementById("divfec_fa5");
		if ($("#nic_aut").val()=="0") {
			e1.style.display="none";
			e2.style.display="none";
			e3.style.display="none";
			e4.style.display="none";
			e5.style.display="none";
			fe1.style.display="none";
			fe2.style.display="none";
			fe3.style.display="none";
			fe4.style.display="none";
			fe5.style.display="none";
			$("#fall1").val("");
			$("#fall2").val("");
			$("#fall3").val("");
			$("#fall4").val("");
			$("#fall5").val("");
			// $("#fec_fall1").val("");
			// $("#fec_fall2").val("");
			// $("#fec_fall3").val("");
			// $("#fec_fall4").val("");
			// $("#fec_fall5").val("");
		}
		if ($("#nic_aut").val()=="1") {
			e1.style.display="block";
			e2.style.display="none";
			e3.style.display="none";
			e4.style.display="none";
			e5.style.display="none";
			fe1.style.display="block";
			fe2.style.display="none";
			fe3.style.display="none";
			fe4.style.display="none";
			fe5.style.display="none";
			$("#fall2").val("");
			$("#fall3").val("");
			$("#fall4").val("");
			$("#fall5").val("");
			// $("#fec_fall2").val("");
			// $("#fec_fall3").val("");
			// $("#fec_fall4").val("");
			// $("#fec_fall5").val("");
		}
		if ($("#nic_aut").val()=="2") {
			e1.style.display="block";
			e2.style.display="block";
			e3.style.display="none";
			e4.style.display="none";
			e5.style.display="none";
			fe1.style.display="block";
			fe2.style.display="block";
			fe3.style.display="none";
			fe4.style.display="none";
			fe5.style.display="none";
			$("#fall3").val("");
			$("#fall4").val("");
			$("#fall5").val("");
			// $("#fec_fall3").val("");
			// $("#fec_fall4").val("");
			// $("#fec_fall5").val("");
		}
		if ($("#nic_aut").val()=="3") {
			e1.style.display="block";
			e2.style.display="block";
			e3.style.display="block";
			e4.style.display="none";
			e5.style.display="none";
			fe1.style.display="block";
			fe2.style.display="block";
			fe3.style.display="block";
			fe4.style.display="none";
			fe5.style.display="none";
			$("#fall4").val("");
			$("#fall5").val("");
			// $("#fec_fall4").val("");
			// $("#fec_fall5").val("");
		}
		if ($("#nic_aut").val()=="4") {
			e1.style.display="block";
			e2.style.display="block";
			e3.style.display="block";
			e4.style.display="block";
			e5.style.display="none";
			fe1.style.display="block";
			fe2.style.display="block";
			fe3.style.display="block";
			fe4.style.display="block";
			fe5.style.display="none";
			$("#fall5").val("");
			// $("#fec_fall5").val("");
		}
		if ($("#nic_aut").val()=="5") {
			e1.style.display="block";
			e2.style.display="block";
			e3.style.display="block";
			e4.style.display="block";
			e5.style.display="block";
			fe1.style.display="block";
			fe2.style.display="block";
			fe3.style.display="block";
			fe4.style.display="block";
			fe5.style.display="block";
		}
		$.ajax({
			type:"post",
			url :"proc/proc_titulo_perpetuidad.php",
			data:{
				cod_cem:$("#cem option:selected").val(),
				caso:4
			},
			success:function(responseText){
				var dataJson=eval(responseText);
				if($("#clase option:selected").val()=="Primera"){
					if($("#nic_aut").val()==1){
						total=parseFloat(dataJson[0].pre_nicPC);
						$("#valor").val(total.toFixed(2));
					}
					if($("#nic_aut").val()>1){
						nic1=parseFloat(dataJson[0].pre_nicPC);
						nic2=parseFloat(dataJson[0].pre_nic2PC);
						subt=nic2*($("#nic_aut").val()-1);
						total=subt+nic1;
						$("#valor").val(total.toFixed(2));
					}
				}
				if($("#clase option:selected").val()=="Económica"){
					if($("#nic_aut").val()==1){
						total=parseFloat(dataJson[0].pre_nicCE);
						$("#valor").val(total.toFixed(2));
					}
					if($("#nic_aut").val()>1){
						nic1=parseFloat(dataJson[0].pre_nicCE);
						nic2=parseFloat(dataJson[0].pre_nic2CE);
						subt=nic2*($("#nic_aut").val()-1);
						total=subt+nic1;
						$("#valor").val(total.toFixed(2));
					}
				}
				if($("#clase option:selected").val()=="Fosa Común"){
					if($("#nic_aut").val()==1){
						total=parseFloat(dataJson[0].pre_nicFC);
						$("#valor").val(total.toFixed(2));
					}
					if($("#nic_aut").val()>1){
						nic1=parseFloat(dataJson[0].pre_nicFC);
						nic2=parseFloat(dataJson[0].pre_nic2FC);
						subt=nic2*($("#nic_aut").val()-1);
						total=subt+nic1;
						$("#valor").val(total.toFixed(2));
					}
				}
			}
		});
}