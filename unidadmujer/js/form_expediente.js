$(function(){
	new PNotify({
		title: 'Información',
		text: 'Los campos con (*) son obligatorios.',
		type: 'info'
	});
	$("#tel1").mask("9999-9999"); // Formato del telefono 1
	$("#tel2").mask("9999-9999"); // Formato del telefono 2
	$("#dui").mask("99999999-9"); // Formato del DUI
	$("#nit").mask("9999-999999-999-9"); // Formato del NIT
	$("#tel1_agr").mask("9999-9999"); // Formato del telefono 1
	$("#tel2_agr").mask("9999-9999"); // Formato del telefono 2
	$("#dui_agr").mask("99999999-9"); // Formato del DUI
	$("#nit_agr").mask("9999-999999-999-9"); // Formato del NIT
	cargarDepartamentos("dep");
	cargarMunicipios("dep","mun");
	cargarDepartamentos("dep_agr");
	cargarMunicipios("dep_agr","mun_agr");

	$("#btnBusPer").click(function(){
		if ($("#txtBusPer").val()!="") {
			$("#cuerpo").load("proc/proc_expediente.php",{radBusPer:$("#radBusPer:checked").val(),txtBusPer:$("#txtBusPer").val(),caso:2},function(responseText,textStatus,XMLHttpRequest){
				if (textStatus=="success") {
					if (responseText=="") {
						alert("No encontrado");
					}
				}
			});
		}else{
			alert("Ingrese un parámetro de búsqueda");
		};
	});

	$("#btnBusPer2").click(function(){
		if ($("#txtBusPer2").val()!="") {
			$("#cuerpo2").load("proc/proc_expediente.php",{radBusPer2:$("#radBusPer2:checked").val(),txtBusPer2:$("#txtBusPer2").val(),caso:4},function(responseText,textStatus,XMLHttpRequest){
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

	$("#btnBusMad").click(function(){
		if ($("#txtBusMad").val()!="") {
			$("#cuerpoMad").load("proc/proc_expediente.php",{radBusMad:$("#radBusMad:checked").val(),txtBusMad:$("#txtBusMad").val(),caso:5},function(responseText,textStatus,XMLHttpRequest){
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
	$("#btnBusPad").click(function(){
		if ($("#txtBusPad").val()!="") {
			$("#cuerpoPad").load("proc/proc_expediente.php",{radBusPad:$("#radBusPad:checked").val(),txtBusPad:$("#txtBusPad").val(),caso:6},function(responseText,textStatus,XMLHttpRequest){
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

	$("input[name='rec_ayu']").change(function(){
		element=document.getElementById("rec_ayu_ong");
		if ($(this).val()=="t") {
			element.style.display="block";
		}else{
			element.style.display="none";
		}
	});
	$("input[name='suf_mal']").change(function(){
		element=document.getElementById("divMalqui");
		if ($(this).val()=="t") {
			element.style.display="block";
		}else{
			element.style.display="none";
		}
	});
	$("input[name='suf_abu_sex']").change(function(){
		element=document.getElementById("divAbusex");
		if ($(this).val()=="t") {
			element.style.display="block";
		}else{
			element.style.display="none";
		}
	});
	$("input[name='ame_rup']").change(function(){
		element=document.getElementById("divAmerup");
		if ($(this).val()=="t") {
			element.style.display="block";
		}else{
			element.style.display="none";
		}
	});
	$("input[name='mal_men']").change(function(){
		element=document.getElementById("divTipmal");
		if ($(this).val()=="t") {
			element.style.display="block";
		}else{
			element.style.display="none";
		}
	});

});

function cargaDatos(codigo){
	$.ajax({
		type: "post",
		url: "proc/proc_expediente.php",
		async: true,
		data : {
			cod_per	: codigo,
			caso 	: 3
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#cod_per").val(dataJson[i].cod_per);
				$("#nom").val(dataJson[i].nom);
				$("#ape1").val(dataJson[i].ape1);
				$("#ape2").val(dataJson[i].ape2);
				if (dataJson[i].sex=="M") {
					$("#sexM").prop("checked",true);
				}else{
					$("#sexF").prop("checked",true);
				}
				$("#fec_nac").val(dataJson[i].fec_nac);
				$("#dui").val(dataJson[i].dui);
				$("#nit").val(dataJson[i].nit);
				$("#tel1").val(dataJson[i].tel1);
				$("#tel2").val(dataJson[i].tel2);
				$("#dep option[value='"+dataJson[i].dep+"']").attr("selected",true);
				$("#mun option[value='"+dataJson[i].mun+"']").attr("selected",true);
				$("#dir").val(dataJson[i].dir);
				$("#est_civ option[value='"+dataJson[i].est_civ+"']").attr("selected",true);
			}
			verMinoridad();
		}
	});
}


function cargaDatos2(codigo){
	$.ajax({
		type: "post",
		url: "proc/proc_expediente.php",
		async: true,
		data : {
			cod_per	: codigo,
			caso 	: 3
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#cod_agr").val(dataJson[i].cod_per);
				$("#nom_agr").val(dataJson[i].nom);
				$("#ape1_agr").val(dataJson[i].ape1);
				$("#ape2_agr").val(dataJson[i].ape2);
				if (dataJson[i].sex=="M") {
					$("#sex_agrM").prop("checked",true);
				}else{
					$("#sex_agrF").prop("checked",true);
				}
				$("#fec_nac_agr").val(dataJson[i].fec_nac);
				$("#dui_agr").val(dataJson[i].dui);
				$("#nit_agr").val(dataJson[i].nit);
				$("#tel1_agr").val(dataJson[i].tel1);
				$("#tel2_agr").val(dataJson[i].tel2);
				$("#dep_agr option[value='"+dataJson[i].dep+"']").attr("selected",true);
				$("#mun_agr option[value='"+dataJson[i].mun+"']").attr("selected",true);
				$("#dir_agr").val(dataJson[i].dir);
			}
		}
	});
}

function verMinoridad(){
	element = document.getElementById("menorEdad");
	element2= document.getElementById("divDUI");
	nac=new Date($("#fec_nac").val());
	hoy=new Date();
	edad = parseInt((hoy -nac)/365/24/60/60/1000);
	if (edad<18) {
		element.style.display="block";
		element2.style.display="none";
	}else{
		element.style.display="none";
		element2.style.display="block";
	}
}

function guardar(){
	var oci_ded=new Array();
	$("input[name='oci_ded[]']:checked").each(function(){oci_ded.push($(this).val());});
	var oci_lec = new Array();
	$("input[name='oci_lec[]']:checked").each(function(){oci_lec.push($(this).val());});
	var car_agr = new Array();
	$("input[name='car_agr[]']:checked").each(function(){car_agr.push($(this).val());});
	var dec_aba_hog = new Array();
	$("input[name='dec_aba_hog[]']:checked").each(function(){dec_aba_hog.push($(this).val());});
	var res_ame_rup = new Array();
	$("input[name='res_ame_rup[]']:checked").each(function(){res_ame_rup.push($(this).val());});
	var per_hog = new Array();
	$("input[name='per_hog[]']:checked").each(function(){per_hog.push($(this).val());});
	var abu_qui = new Array();
	$("input[name='abu_qui[]']:checked").each(function(){abu_qui.push($(this).val());});
	var prob_agr = new Array();
	$("input[name='prob_agr[]']:checked").each(function(){prob_agr.push($(this).val());});

	$.ajax({
		type: "post",
		url: "proc/proc_expediente.php",
		data : {
			cod_per : $("#cod_per").val(),
			nom : $("#nom").val(),
			ape1: $("#ape1").val(),
			ape2: $("#ape2").val(),
			sex : $("input[name='sex']:checked").val(),
			fec_nac : $("#fec_nac").val(),
			dui : $("#dui").val(),
			nit : $("#nit").val(),
			tel1 : $("#tel1").val(),
			tel2 : $("#tel2").val(),
			dep : $("#dep option:selected").val(),
			mun : $("#mun option:selected").val(),
			dir : $("#dir").val(),
			est_civ : $("#est_civ option:selected").val(),
			cod_mad:$("#cod_mad").val(),
			cod_pad:$("#cod_pad").val(),

			niv_edu : $("#niv_edu option:selected").val(),
				
			oci_ded : oci_ded,
			oci_lec : oci_lec,
			oci_otr : $("#oci_otr").val(),

			tra_rem : $("#tra_rem:checked").val(),
			tip_tra : $("#tip_tra").val(),
			baj_con : $("#baj_con:checked").val(),
			jor_tra : $("#jor_tra").val(),
			ing_med_men : $("#ing_med_men").val(),
			otr_tip_ing : $("#otr_tip_ing option:selected").val(),
			dep_eco_agr : $("#dep_eco_agr:checked").val(),
			rec_ayu : $("#rec_ayu:checked").val(),
			rec_ayu_ong : $("#rec_ayu_ong").val(),

			med_cab : $("#med_cab:checked").val(),
			acu_amb : $("#acu_amb option:selected").val(),
			tra_con : $("#tra_con").val(),
			com : $("#com:checked").val(),
			con_agr : $("#con_agr option:selected").val(),
			dur_rel_sen : $("#dur_rel_sen").val(),
			pri_con : $("#pri_con:checked").val(),

			suf_mal : $("#suf_mal:checked").val(),
			mal_qui : $("#mal_qui").val(),
			suf_abu_sex : $("#suf_abu_sex:checked").val(),
			abu_qui_sex : $("#abu_qui_sex").val(),
				
			tra_sep : $("#tra_sep:checked").val(),
			med_cau : $("#med_cau").val(),
			rup_ant : $("#rup_ant:checked").val(),
			dur_mal : $("#dur_mal").val(),
				
			ame_rup : $("#ame_rup:checked").val(),
				
			mal_men : $("#mal_men:checked").val(),
			tip_mal_men : $("#tip_mal_men").val(),
			num_hij : $("#num_hij").val(),
			per_hog:per_hog,
				
			apo_eco_fam : $("#apo_eco_fam:checked").val(),
			apo_afe_fam : $("#apo_afe_fam:checked").val(),
			apo_cri : $("#apo_cri:checked").val(),
			con_sit : $("#con_sit:checked").val(),
			con_apo : $("#con_apo:checked").val(),
			man_rel_agr : $("#man_rel_agr:checked").val(),

			apo_efe_ami : $("#apo_efe_ami:checked").val(),
			apo_afe_ami : $("#apo_afe_ami:checked").val(),
			ent_con_agr : $("#ent_con_agr:checked").val(),
			ent_apo_agr : $("#ent_apo_agr:checked").val(),

			cod_agr : $("#cod_agr").val(),
			nom_agr : $("#nom_agr").val(),
			ape1_agr: $("#ape1_agr").val(),
			ape2_agr: $("#ape2_agr").val(),
			sex_agr : $("input[name='sex_agr']:checked").val(),
			fec_nac_agr:$("#fec_nac_agr").val(),
			dui_agr : $("#dui_agr").val(),
			nit_agr : $("#nit_agr").val(),
			tel1_agr: $("#tel1_agr").val(),
			tel2_agr: $("#tel2_agr").val(),
			dep_agr :$("#dep_agr option:selected").val(),
			mun_agr :$("#mun_agr option:selected").val(),
			dir_agr : $("#dir_agr").val(),
			ano_res:$("#ano_res_agr").val(),
			niv_edu_agr:$("#niv_edu_agr option:selected").val(),
			tra_agr : $("#tra_agr").val(),
			ant_pen_agr:$("#ant_pen_agr").val(),
						
			car_agr : car_agr,
			dec_aba_hog : dec_aba_hog,
			res_ame_rup : res_ame_rup,
			abu_qui : abu_qui,
			prob_agr : prob_agr,
			
			obs : $("#obs").val(),
			caso : 1 
		},
		success: function (responseText) {
			alert(responseText);
			limpiarCampos();
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
	$("#cod_mad").val("");
	$("#cod_pad").val("");
	$("#nom_mad").val("");
	$("#nom_pad").val("");
	$("#lug_nac").val("");
	$("#dir").val("");
	$("input:checkbox").removeAttr("checked");
	$("#oci_otr").val("");
	$("#tip_tra").val("");
	$("#jor_tra").val("0");
	$("#ing_med_men").val("0");
	$("#tra_con").val("");
	$("#dur_rel_sen").val("");
	$("#mal_qui").val("");
	$("#abu_qui_sex").val("");
	$("#med_cau").val("");
	$("#dur_mal").val("");
	$("#tip_mal_men").val("");
	$("#num_hij").val("0");
	$("#cod_agr").val("");
	$("#nom_agr").val("");
	$("#ape1_agr").val("");
	$("#ape2_agr").val("");
	$("#fec_nac_agr").val("");
	$("#dui_agr").val("");
	$("#nit_agr").val("");
	$("#tel1_agr").val("");
	$("#tel2_agr").val("");
	$("#dir_agr").val("");
	$("#ano_res_agr").val("0");
	$("#tra_agr").val("");
	$("#ant_pen_agr").val("");
	$("#ant_vio_otr").val("");
	$("#obs").val("");
}

function cargaDatosMad(codigo){
	$.ajax({
		type: "post",
		url: "proc/proc_expediente.php",
		async: true,
		data : {
			cod_per	: codigo,
			caso 	: 3
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#cod_mad").val(dataJson[i].cod_per);
				$("#nom_mad").val(dataJson[i].nom+" "+dataJson[i].ape1+" "+dataJson[i].ape2);
			}
		}
	});
}

function cargaDatosPad(codigo){
	$.ajax({
		type: "post",
		url: "proc/proc_expediente.php",
		async: true,
		data : {
			cod_per	: codigo,
			caso 	: 3
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#cod_pad").val(dataJson[i].cod_per);
				$("#nom_pad").val(dataJson[i].nom+" "+dataJson[i].ape1+" "+dataJson[i].ape2);
			}
		}
	});
}

function vermsj(){
	new PNotify({
		title: 'Información',
		text: 'Si no encontró coincidencias, puede llenar los campos manualmente para ingresar a la persona deseada',
		type: 'info'
	});
}