$(function(){
	new PNotify({
		title: 'Información',
		text: 'Los campos con (*) son obligatorios.',
		type: 'info'
	});
	$("#tel1").mask("9999-9999"); // Formato del telefono 1
	$("#tel2").mask("9999-9999"); // Formato del telefono 2
	$("#tel_jur").mask("9999-9999"); // Formato del telefono entidad juridica
	$("#dui").mask("99999999-9"); // Formato del DUI
	$("#nit").mask("9999-999999-999-9"); // Formato del NIT
	$("#nit_jur").mask("9999-999999-999-9"); // Formato del NIT
	cargarDepartamentos("dep");
	cargarMunicipios("dep","mun");
	$("#btnBusPer").click(function(){
		if ($("#txtBusPer").val()!="") {
			$("#cuerpo").load("proc/proc_contribuyente.php",{radBusPer:$("#radBusPer:checked").val(),txtBusPer:$("#txtBusPer").val(),caso:1},function(responseText,textStatus,XMLHttpRequest){
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
		if ($("#nom").val()!=""){
			if ($("#ape1").val()!="") {
				$.ajax({
					type: "post",
					url : "proc/proc_contribuyente.php",
					data:{
						nom:$("#nom").val(),
						ape1:$("#ape1").val(),
						ape2:$("#ape2").val(),
						sex : $("input[ name='sex']:checked").val(),
						fec_nac:$("#fec_nac").val(),
						dui:$("#dui").val(),
						nit:$("#nit").val(),
						tel1:$("#tel1").val(),
						tel2:$("#tel2").val(),
						dep:$("#dep option:selected").val(),
						mun:$("#mun option:selected").val(),
						dir:$("#dir").val(),
						ocu:$("#ocu").val(),
						est_civ:$("#est_civ option:selected").val(),
						caso: 1
					},
					success:function(responseText){
						alert(responseText);
						limpiarCampos();
					}
				});
			}else{
				alert("Ingrese el primer apellido");
			}
		}else{
			alert("Ingrese un nombre");
		}
	});

	$("input[name='per']").click(function(){
		element=document.getElementById("form1");
		element2=document.getElementById("form2");
		if($(this).val()=="N"){
			element.style.display="block";
			element2.style.display="none";
		}else{
			element.style.display="none";
			element2.style.display="block";
		}
	});

	$("#btnGuardar2").click(function(){
		if ($("#nom_jur").val()!=""){
			if ($("#nit_jur").val()!="") {
				$.ajax({
					type: "post",
					url : "proc/proc_contribuyente.php",
					data:{
						nom_jur:$("#nom_jur").val(),
						fec_cons : $("#fec_cons").val(),
						gir_jur:$("#gir_jur").val(),
						nit_jur:$("#nit_jur").val(),
						tel_jur:$("#tel_jur").val(),
						dir_jur:$("#dir_jur").val(),
						tip_con:$("#per:checked").val(),
						rep_jur:$("#rep_jur").val(),
						caso:2
					},
					success:function(responseText){
						alert(responseText);
						limpiarCampos();
					}
				});
			}else{
				alert("Ingrese el NIT del ente jurídico");
			}
		}else{
			alert("Ingrese el nombre del ente jurídico");
		}
	});
});

function limpiarCampos(){
	$("#cod_per").val("");
	$("#nom").val("");
	$("#ape1").val("");
	$("#ape2").val("");
	$("#fec_nac").val("");
	$("#dui").val("");
	$("#nit").val("");
	$("#tel1").val("");
	$("#tel2").val("");
	$("#dir").val("");
	$("#ocu").val("");
	$("#nom_jur").val("");
	$("#fec_cons").val("");
	$("#gir_jur").val("");
	$("#nit_jur").val("");
	$("#tel_jur").val("");
	$("#dir_jur").val("");
	$("#rep_jur").val("");
}

function cancela(){
	parent.location="index_catastro.php";

}