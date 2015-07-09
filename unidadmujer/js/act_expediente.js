$(function(){
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
			$("#cuerpo").load("proc/proc_act_expediente.php",{radBusPer:$("#radBusPer:checked").val(),txtBusPer:$("#txtBusPer").val(),caso:2},function(responseText,textStatus,XMLHttpRequest){
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
			$("#cuerpo2").load("proc/proc_act_expediente.php",{radBusPer2:$("#radBusPer2:checked").val(),txtBusPer2:$("#txtBusPer2").val(),caso:4},function(responseText,textStatus,XMLHttpRequest){
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
		if ($(this).val()=="Si") {
			element.style.display="block";
		}else{
			element.style.display="none";
		}
	});
	$("input[name='suf_mal']").change(function(){
		element=document.getElementById("divMalqui");
		if ($(this).val()=="Si") {
			element.style.display="block";
		}else{
			element.style.display="none";
		}
	});
	$("input[name='suf_abu_sex']").change(function(){
		element=document.getElementById("divAbusex");
		if ($(this).val()=="Si") {
			element.style.display="block";
		}else{
			element.style.display="none";
		}
	});
	$("input[name='ame_rup']").change(function(){
		element=document.getElementById("divAmerup");
		if ($(this).val()=="Si") {
			element.style.display="block";
		}else{
			element.style.display="none";
		}
	});
	$("input[name='mal_men']").change(function(){
		element=document.getElementById("divTipmal");
		if ($(this).val()=="Si") {
			element.style.display="block";
		}else{
			element.style.display="none";
		}
	});

});

function cargaDatos(codigo){
	$.ajax({
		type: "post",
		url: "proc/proc_act_expediente.php",
		data : {
			cod_per	: codigo,
			caso 	: 3
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#cod_exp").val(dataJson[i].cod_exp);
				$("#cod_per").val(dataJson[i].cod_per);
				$("#nom").val(dataJson[i].nom);
				$("#ape1").val(dataJson[i].ape1);
				$("#ape2").val(dataJson[i].ape2);
				if (dataJson[i].sex=="M") {$("#sexM").prop("checked",true);}else{$("#sexF").prop("checked",true);}
				$("#fec_nac").val(dataJson[i].fec_nac);
				$("#dui").val(dataJson[i].dui);
				$("#nit").val(dataJson[i].nit);
				$("#tel1").val(dataJson[i].tel1);
				$("#tel2").val(dataJson[i].tel2);
				$("#dep option[value='"+dataJson[i].dep+"']").attr("selected",true);
				$("#mun option[value='"+dataJson[i].mun+"']").attr("selected",true);
				$("#dir").val(dataJson[i].dir);
				$("#est_civ option[value='"+dataJson[i].est_civ+"']").attr("selected",true);
				$("#niv_edu option[value='"+dataJson[i].niv_edu+"']").attr("selected",true);
				
				$("#oci_otr").val(dataJson[i].oci_otr);
				if (dataJson[i].tra_rem=="Si"){$("#tra_remS").prop("checked",true);}else{$("#tra_remN").prop("checked",true);}
				$("#tip_tra").val(dataJson[i].tip_tra);
				if (dataJson[i].baj_con=="Si"){$("#baj_conS").prop("checked",true);}else{$("#baj_conN").prop("checked",true);}
				$("#jor_tra").val(dataJson[i].jor_tra);
				$("#ing_med_men").val(dataJson[i].ing_med_men);
				$("#otr_tip_ing option[value='"+dataJson[i].otr_tip_ing+"']").attr("selected",true);
				$("#rec_fin option[value='"+dataJson[i].rec_fin+"']").attr("selected",true);
				if (dataJson[i].dep_eco_agr=="Si"){$("#dep_eco_agrS").prop("checked",true);}else{$("#dep_eco_agrN").prop("checked",true);}
				if (dataJson[i].rec_ayu=="Si"){$("#rec_ayuS").prop("checked",true);}else{$("#rec_ayuN").prop("checked",true);}
				$("#rec_ayu_ong").val(dataJson[i].rec_ayu_ong);
				if (dataJson[i].med_cab=="Si"){$("#med_cabS").prop("checked",true);}else{$("#med_cabN").prop("checked",true);}
				$("#acu_amb option[value='"+dataJson[i].acu_amb+"']").attr("selected",true);
				$("#tra_con").val(dataJson[i].tra_con);
				if (dataJson[i].com=="Regular"){$("#comS").prop("checked",true);}else{$("#comN").prop("checked",true);}
				$("#con_agr option[value='"+dataJson[i].con_agr+"']").attr("selected",true);
				$("#dur_rel_sen").val(dataJson[i].dur_rel_sen);
				if (dataJson[i].pri_con=="Si"){$("#pri_conS").prop("checked",true);}else{$("#pri_conN").prop("checked",true);}
				if (dataJson[i].suf_mal=="Si"){$("#suf_malS").prop("checked",true);}else{$("#suf_malN").prop("checked",true);}
				$("#mal_qui").val(dataJson[i].mal_qui);
				if (dataJson[i].suf_abu_sex=="Si"){$("#suf_abu_sexS").prop("checked",true);}else{$("#suf_abu_sexN").prop("checked",true);}
				$("#abu_qui_sex").val(dataJson[i].abu_qui_sex);
				if (dataJson[i].tra_sep=="Si"){$("#tra_sepS").prop("checked",true);}else{$("#tra_sepN").prop("checked",true);}
				$("#med_cau").val(dataJson[i].med_cau);
				if (dataJson[i].rup_ant=="Si"){$("#rup_antS").prop("checked",true);}else{$("#rup_antN").prop("checked",true);}
				$("#dur_mal").val(dataJson[i].dur_mal);
				if (dataJson[i].ame_rup=="Si"){$("#ame_rupS").prop("checked",true);}else{$("#ame_rupN").prop("checked",true);}
				if (dataJson[i].mal_men=="Si"){$("#mal_menS").prop("checked",true);}else{$("#mal_menN").prop("checked",true);}
				$("#tip_mal_men").val(dataJson[i].tip_mal_men);
				$("#num_hij").val(dataJson[i].num_hij);
				
				if (dataJson[i].apo_eco_fam=="de la familia de la mujer"){$("#apo_eco_famS").prop("checked",true);}else{$("#apo_eco_famN").prop("checked",true);}
				if (dataJson[i].apo_afe_fam=="de la familia de la mujer"){$("#apo_afe_famS").prop("checked",true);}else{$("#apo_afe_famN").prop("checked",true);}
				if (dataJson[i].apo_cri=="de la familia de la mujer"){$("#apo_criS").prop("checked",true);}else{$("#apo_criN").prop("checked",true);}
				if (dataJson[i].con_sit=="Si"){$("#con_sitS").prop("checked",true);}else{$("#con_sitN").prop("checked",true);}
				if (dataJson[i].con_apo=="Si"){$("#con_apoS").prop("checked",true);}else{$("#con_apoN").prop("checked",true);}
				if (dataJson[i].man_rel_agr=="Si"){$("#man_rel_agrS").prop("checked",true);}else{$("#man_rel_agrN").prop("checked",true);}
				if (dataJson[i].apo_efe_ami=="de amigos propios"){$("#apo_efe_amiS").prop("checked",true);}else{$("#apo_efe_amiN").prop("checked",true);}
				if (dataJson[i].apo_afe_ami=="de amigos propios"){$("#apo_afe_amiS").prop("checked",true);}else{$("#apo_afe_amiN").prop("checked",true);}
				if (dataJson[i].ent_con_agr=="Si"){$("#ent_con_agrS").prop("checked",true);}else{$("#ent_con_agrN").prop("checked",true);}
				if (dataJson[i].ent_apo_agr=="Si"){$("#ent_apo_agrS").prop("checked",true);}else{$("#ent_apo_agrN").prop("checked",true);}
				
				$("#obs").val(dataJson[i].obs);
				$("#cod_agr").val(dataJson[i].cod_agr);
				$("#nom_agr").val(dataJson[i].nom_agr);
				$("#ape1_agr").val(dataJson[i].ape1_agr);
				$("#ape2_agr").val(dataJson[i].ape2_agr);
				if (dataJson[i].sex_agr=="M") {$("#sex_agrM").prop("checked",true);}else{$("#sex_agrF").prop("checked",true);}
				$("#fec_nac_agr").val(dataJson[i].fec_nac_agr);
				$("#dui_agr").val(dataJson[i].dui_agr);
				$("#nit_agr").val(dataJson[i].nit_agr);
				$("#tel1_agr").val(dataJson[i].tel1_agr);
				$("#tel2_agr").val(dataJson[i].tel2_agr);
				$("#dep_agr option[value='"+dataJson[i].dep+"']").attr("selected",true);
				$("#mun_agr option[value='"+dataJson[i].mun+"']").attr("selected",true);
				$("#dir_agr").val(dataJson[i].dir_agr);
				$("#niv_edu_agr option[value='"+dataJson[i].niv_edu_agr+"']").attr("selected",true);
				$("#tra_agr").val(dataJson[i].tra_agr);
				verPadres(dataJson[i].cod_exp,dataJson[i].fec_nac);
				verObs(dataJson[i].cod_exp);
			}
			cargaCheckbox(dataJson[i].cod_exp);
		}
	});
}

function cargaCheckbox(cod_exp){
	$.ajax({
		type: "post",
		url: "proc/proc_act_expediente.php",
		data : {
			cod_exp	: cod_exp,
			caso 	: 7
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				if(dataJson[i].cat_chk=="oci_ded"){
					$("input[name='oci_ded[]']").each(function(){if($(this).val()==dataJson[i].sel_chk){$(this).attr("checked",true);}});
				}
				if(dataJson[i].cat_chk=="oci_lec"){
					$("input[name='oci_lec[]']").each(function(){if($(this).val()==dataJson[i].sel_chk){$(this).attr("checked",true);}});
				}
				if(dataJson[i].cat_chk=="per_hog"){
					$("input[name='per_hog[]']").each(function(){if($(this).val()==dataJson[i].sel_chk){$(this).attr("checked",true);}});
				}
				if(dataJson[i].cat_chk=="car_agr"){
					$("input[name='car_agr[]']").each(function(){if($(this).val()==dataJson[i].sel_chk){$(this).attr("checked",true);}});
				}
				if(dataJson[i].cat_chk=="dec_aba_hog"){
					$("input[name='dec_aba_hog[]']").each(function(){if($(this).val()==dataJson[i].sel_chk){$(this).attr("checked",true);}});
				}
				if(dataJson[i].cat_chk=="res_ame_rup"){
					$("input[name='res_ame_rup[]']").each(function(){if($(this).val()==dataJson[i].sel_chk){$(this).attr("checked",true);}});
				}
				if(dataJson[i].cat_chk=="abu_qui"){
					$("input[name='abu_qui[]']").each(function(){if($(this).val()==dataJson[i].sel_chk){$(this).attr("checked",true);}});
				}
				if(dataJson[i].cat_chk=="prob_agr"){
					$("input[name='prob_agr[]']").each(function(){if($(this).val()==dataJson[i].sel_chk){$(this).attr("checked",true);}});
				}
			}
		}
	});
}

function verPadres(codexp,fec_nac){
	$.ajax({
		type: "post",
		url: "proc/proc_act_expediente.php",
		data:{
			cod_exp: codexp,
			caso: 5
		} ,
		success:function(responseText){
			var dataJson=eval(responseText);
			element = document.getElementById("menorEdad");
			element2= document.getElementById("divDUI");
			nac=new Date(fec_nac);
			hoy=new Date();
			edad = parseInt((hoy -nac)/365/24/60/60/1000);
			if (edad<18) {
				element.style.display="block";
				element2.style.display="none";
				$("#cod_mad").val(dataJson[0].cod_mad);
				$("#cod_pad").val(dataJson[0].cod_pad);
				$("#nom_mad").val(dataJson[0].nom_mad+" "+dataJson[0].ape1_mad+" "+dataJson[0].ape2_mad);
				$("#nom_pad").val(dataJson[0].nom_pad+" "+dataJson[0].ape1_pad+" "+dataJson[0].ape2_pad);
			}else{
				element.style.display="none";
				element2.style.display="block";
			}
		}
	});
}

function verObs(codexp){
	$.ajax({
		type: "post",
		url: "proc/proc_act_expediente.php",
		data:{
			cod_exp: codexp,
			caso: 6
		} ,
		success:function(responseText){
			var dataJson=eval(responseText);
			var html='';
			for(var i in dataJson){
				html += "<div class='control-group span5'>"
				html += "<label class='control-label'>Observaciones según fecha: </label>"
				html += "<div class='controls'>"
				html += "<input type='date' value='"+dataJson[i].fec_obs+"' class='input-medium' readonly>"
				html += "</div>"
				html += "</div>"
				html += "<div class='control-group'>"
				html += "<div class='controls'>"
				html += "<textarea class='input-xlarge' rows='5' readonly>"+dataJson[i].obs+"</textarea>"
				html += "</div>"
				html += "</div>"
			}
			$("#divObs").html(html);
		}
	});
}


function cargaDatos2(codigo){
	$.ajax({
		type: "post",
		url: "proc/proc_act_expediente.php",
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
		url: "proc/proc_act_expediente.php",
		data : {
			cod_exp : $("#cod_exp").val(),
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
			cod_mad:$("#cod_mad").val(),
			cod_pad:$("#cod_pad").val(),

			nom_mad : $("#nom_mad").val(),
			nom_pad : $("#nom_pad").val(),
			est_civ : $("#est_civ option:selected").val(),
			niv_edu : $("#niv_edu option:selected").val(),
				
			oci_ded : oci_ded,
			oci_lec : oci_lec,
			oci_otr : $("#oci_otr").val(),

			tra_rem : $("input[name='tra_rem']:checked").val(),
			tip_tra : $("#tip_tra").val(),
			baj_con : $("input[name='baj_con']:checked").val(),
			jor_tra : $("#jor_tra").val(),
			ing_med_men : $("#ing_med_men").val(),
			otr_tip_ing : $("#otr_tip_ing option:selected").val(),
			rec_fin : $("#rec_fin option:selected").val(),
			dep_eco_agr : $("input[name='dep_eco_agr']:checked").val(),
			rec_ayu : $("input[name='rec_ayu']:checked").val(),
			rec_ayu_ong : $("#rec_ayu_ong").val(),

			med_cab : $("input[name='med_cab']:checked").val(),
			acu_amb : $("#acu_amb option:selected").val(),
			tra_con : $("#tra_con").val(),
			com : $("input[name='com']:checked").val(),
			con_agr : $("#con_agr option:selected").val(),
			dur_rel_sen : $("#dur_rel_sen").val(),
			pri_con : $("input[name='pri_con']:checked").val(),

			suf_mal : $("input[name='suf_mal']:checked").val(),
			mal_qui : $("#mal_qui").val(),
			suf_abu_sex : $("input[name='suf_abu_sex']:checked").val(),
			abu_qui_sex : $("#abu_qui_sex").val(),
				
			tra_sep : $("input[name='tra_sep']:checked").val(),
			med_cau : $("#med_cau").val(),
			rup_ant : $("input[name='rup_ant']:checked").val(),
			dur_mal : $("#dur_mal").val(),
				
			ame_rup : $("input[name='ame_rup']:checked").val(),
				
			mal_men : $("input[name='mal_men']:checked").val(),
			tip_mal_men : $("#tip_mal_men").val(),
			num_hij : $("#num_hij").val(),
			per_hog:per_hog,
				
			apo_eco_fam : $("input[name='apo_eco_fam']:checked").val(),
			apo_efe_fam : $("input[name='apo_efe_fam']:checked").val(),
			apo_cri : $("input[name='apo_cri']:checked").val(),
			con_sit : $("input[name='con_sit']:checked").val(),
			con_apo : $("input[name='con_apo']:checked").val(),
			man_rel_agr : $("input[name='man_rel_agr']:checked").val(),

			apo_efe_ami : $("input[name='apo_efe_ami']:checked").val(),
			apo_afe_ami : $("input[name='apo_afe_ami']:checked").val(),
			ent_con_agr : $("input[name='ent_con_agr']:checked").val(),
			ent_apo_agr : $("input[name='ent_apo_agr']:checked").val(),

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
			ant_vio_otr:$("#ant_vio_otr").val(),
			
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
	$("#divObs").empty();
}

function vermsj(){
	new PNotify({
		title: 'Información',
		text: 'Si no encontró coincidencias, puede llenar los campos manualmente para ingresar a la persona deseada',
		type: 'info'
	});
}