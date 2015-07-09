$(function(){
	$("#tel1").mask("9999-9999"); // Formato del telefono 1
	$("#tel2").mask("9999-9999"); // Formato del telefono 2
	$("#tel_jur").mask("9999-9999"); // Formato del telefono entidad juridica
	$("#dui").mask("99999999-9"); // Formato del DUI
	$("#nit").mask("9999-999999-999-9"); // Formato del NIT
	$("#nit_jur").mask("9999-999999-999-9"); // Formato del NIT
	cargarDepartamentos("dep");
	cargarMunicipios("dep","mun");
	/////
	$("input[name='per']").click(function(){
		element=document.getElementById("thd");
		if($(this).val()=="J"){
			element.style.display="none";
			$("#radBusPerD").prop("disabled",true);
			$("#tabla_col").find("tr:gt(0)").remove();
		}else{
			element.style.display="block";
			$("#radBusPerD").removeAttr("disabled");
			$("#tabla_col").find("tr:gt(0)").remove();
		}
	});
	//////
	$("input[name='radBusPer']").change(function(){
		if($(this).val()=="NIT"){
			$("#txtBusPer").unmask();
			$("#txtBusPer").mask("9999-999999-999-9");
			$("#txtBusPer").val("");
		}
		if($(this).val()=="DUI"){
			$("#txtBusPer").unmask();
			$("#txtBusPer").mask("99999999-9");
			$("#txtBusPer").val("");
		}
		if($(this).val()=="Nombre"){
			$("#txtBusPer").unmask();
			$("#txtBusPer").val("");
		}
	});
	/////
	$("#btnBusPer").click(function(){
		if ($("#txtBusPer").val()!="") {
			$("#cuerpo").load("proc/proc_act_contribuyente.php",{per:$("#per:checked").val(),radBusPer:$("#radBusPer:checked").val(),txtBusPer:$("#txtBusPer").val(),caso:1},function(responseText,textStatus,XMLHttpRequest){
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
					url : "proc/proc_act_contribuyente.php",
					data:{
						cod_per:$("#cod_per").val(),
						nom:$("#nom").val(),
						ape1:$("#ape1").val(),
						ape2:$("#ape2").val(),
						sex : $("input[name='sex']:checked").val(),
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
						caso : 3
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

	$("#btnGuardar2").click(function(){
		if ($("#nom_jur").val()!=""){
			if ($("#nit_jur").val()!="") {
				$.ajax({
					type: "post",
					url : "proc/proc_act_contribuyente.php",
					data:{
						idSoc : $("#idSoc").val(),
						nom_jur:$("#nom_jur").val(),
						fec_cons:$("#fec_cons").val(),
						gir_jur:$("#gir_jur").val(),
						nit_jur:$("#nit_jur").val(),
						tel_jur:$("#tel_jur").val(),
						dir_jur:$("#dir_jur").val(),
						rep_jur:$("#rep_jur").val(),
						caso : 4
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
		limpiarCampos();
	});
});

function cargaPer(codigo,tipoPer){
	$.ajax({
		type: "post",
		url: "proc/proc_act_contribuyente.php",
		data : {
			cod_per	: codigo,
			per : tipoPer,
			caso 	: 2
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			if (tipoPer=="N") {
				for(var i in dataJson){
					$("#cod_per").val(dataJson[i].cod_per);
					$("#nom").val(dataJson[i].nom);
					$("#ape1").val(dataJson[i].ape1);
					$("#ape2").val(dataJson[i].ape2);
					if (dataJson[i].sex=="M") {
						$("#sexM").prop("checked",true);
						//estadoCivil("est_civ","M");
					}else{
						$("#sexF").prop("checked",true);
						//estadoCivil("est_civ","F");
					}
					$("#fec_nac").val(dataJson[i].fec_nac);
					$("#dui").val(dataJson[i].dui);
					$("#nit").val(dataJson[i].nit);
					$("#tel1").val(dataJson[i].tel1);
					$("#tel2").val(dataJson[i].tel2);
					$("#dep option[value='"+dataJson[i].dep+"']").attr("selected",true);
					$("#mun option[value='"+dataJson[i].mun+"']").attr("selected",true);
					$("#dir").val(dataJson[i].dir);
					$("#ocu").val(dataJson[i].ocu);
					$("#est_civ option[value='"+dataJson[i].est_civ+"']").attr("selected",true);
				}
			}else{
				for(var i in dataJson){
					$("#idSoc").val(dataJson[i].idSoc);
					$("#nom_jur").val(dataJson[i].nom_jur);
					$("#fec_cons").val(dataJson[i].fec_cons);
					$("#gir_jur").val(dataJson[i].gir_jur);
					$("#nit_jur").val(dataJson[i].nit_jur);
					$("#tel_jur").val(dataJson[i].tel_jur);
					$("#dir_jur").val(dataJson[i].dir_jur);
					$("#rep_jur").val(dataJson[i].rep_jur);
				}
			}
		}
	});
}

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