var meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
var totalM=[];
var subt=[0,0,0,0,0,0,0,0,0,0,0,0,0];
$(function(){
	$('.selectpicker').selectpicker();
	cargaDesdeMapa($("#cod_neg").val(),$("#cod_con").val(),$("#tipoPer").val());	
	$("#btnBusNeg").click(function(){
		if ($("#txtBusNeg").val()!="") {
			$("#cuerpo_neg").load("proc/proc_estcta_negocio.php",{tipoPer:$("#radTip:checked").val(),radBusNeg:$("#radBusNeg:checked").val(),txtBusNeg:$("#txtBusNeg").val(),caso:1},function(responseText,textStatus,XMLHttpRequest){
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
});

function cargaNeg(codper,codneg,tipoPer){
	$.ajax({
		type: "post",
		url: "proc/proc_estcta_negocio.php",
		data : {
			cod_con	: codper,
			cod_neg : codneg,
			tipoPer : tipoPer,
			caso 	: 2
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#cod_neg").val(dataJson[i].cod_neg);
				$("#propietario").val(dataJson[i].propietario);
				$("#cod_con").val(dataJson[i].cod_per);
				$("#nom_neg").val(dataJson[i].nom_neg);
				$("#dir_neg").val(dataJson[i].dir_neg);
				$("#med_neg").val(dataJson[i].med_neg);
				// var f=new Date();
				// x=f.getMonth();
				// $("#mes_pag").prop('selectedIndex',x);	
			}
			//$("#tablaR").bootstrapTable('load',dataJson);
			//verCargos(dataJson[0].cod_neg,dataJson[0].med_neg);
			//miArray=dataJson[i].fecha.split('/');
			calcularCargos(dataJson[0].cod_neg);
			//verAbonos();
			//verCuenta(codneg);

		}
	});
}

function calcularCargos(codneg){
	$('.selectpicker').find('option').remove().end();
	fec=new Date();
	var month = fec.getMonth()+1;
	var day = fec.getDate();
	var year = fec.getFullYear();
	var xx=0;
	
	if(day<10)
		day="0"+day;
	if(month<10)
		month="0"+month;
	newdate = day + "/" + month + "/" + year;
	$.ajax({//Se obtienen los impuestos a cobrar
		type : "post",
		url : "proc/proc_estcta_negocio.php",
		data:{
			cod_neg:codneg,
			caso :4
		},
		success:function(responseText){
			var dataJson=eval(responseText);
			sumaC=0;
			cob_totxm=0;//cobro total X metro
			cobroMora=0;
			getRows = function (x) {
				var rows = [];
				x=parseInt(x);
				if(xx>3){//Se le cobra mora
					if(dataJson[0].tip_cobMora=="Porcentaje"){
						cobroMora=parseFloat((dataJson[0].cobroMora/100)*sumaC).toFixed(2);
						if(cobroMora<dataJson[0].cob_minMora){
							cobroMora=dataJson[0].cob_minMora;
						}
					}else{
						cobroMora=parseFloat(dataJson[0].cobroMora);
					}
					sumaC+=parseFloat(cobroMora);
					rows.push({
						fecha: meses[x-1],
						concepto: dataJson[0].cta,
						num_com: '-----',
						cargo:cobroMora,
						abono:"0",
						saldo:sumaC.toFixed(2)
					});
					for (var i in dataJson) {
						if(dataJson[i].cob_met=="t"){//Si el cobro es por metro lineal
							cob_totxm=parseFloat(dataJson[i].cob_fij)*$("#med_neg").val();
							cob_totxm=cob_totxm.toFixed(2);
						}else{
							cob_totxm=dataJson[i].cob_fij;
						}
						sumaC+=parseFloat(cob_totxm);
						
						rows.push({
							fecha: meses[x-1],
							concepto: dataJson[i].nom_cue,
							num_com: '-----',
							cargo:cob_totxm,
							abono:"0",
							saldo:sumaC.toFixed(2)
						});
						subt[x]=subt[x]+parseFloat(cob_totxm)+parseFloat(cobroMora);//se suma el cobro total x mes de cada impuesto
					}
					// xx=0;
				}else{//Cobro normal sin mora
					for (var i in dataJson) {
						if(dataJson[i].cob_met=="t"){//Si el cobro es por metro lineal
							cob_totxm=parseFloat(dataJson[i].cob_fij)*$("#med_neg").val();
							cob_totxm=cob_totxm.toFixed(2);
						}else{
							cob_totxm=dataJson[i].cob_fij;
						}
						sumaC+=parseFloat(cob_totxm);
						
						rows.push({
							fecha: meses[x-1],
							concepto: dataJson[i].nom_cue,
							num_com: '-----',
							cargo:cob_totxm,
							abono:"0",
							saldo:sumaC.toFixed(2)
						});
						subt[x]=subt[x]+parseFloat(cob_totxm);
					}
				}
				$("#tot_pag").val(sumaC);
				return rows;
			}
			//obtenemos el ultimos mes pagado
			if(dataJson[0].ult_fec.indexOf('/')!=-1)
			{
				ultimaFecha=dataJson[0].ult_fec.split('/');
				ultimoMes=ultimaFecha[1];//ultimo mes pagado
				ultimoMes=parseInt(ultimoMes);
			}else{
				ultimoMes=obtenerNumMes(dataJson[0].ult_fec);
			}
			month = fec.getMonth()+1;//mes actual
			
			if(ultimoMes>month){
				for(i=ultimoMes+1;i<=12;i++){
					xx++;
					$("#tablaR").bootstrapTable('append',getRows(i));
					$("#mesesX").append("<option value='"+i+"'>"+meses[i-1]+"</option>").selectpicker('refresh');
				}
				for(i=1;i<=month;i++){
					xx++;
					$("#tablaR").bootstrapTable('append',getRows(i));	
					$("#mesesX").append("<option value='"+i+"'>"+meses[i-1]+"</option>").selectpicker('refresh');
				}
			}else{
				for(i=ultimoMes+1;i<=month;i++){
					xx++;
					$("#tablaR").bootstrapTable('append',getRows(i));	
					$("#mesesX").append("<option value='"+i+"'>"+meses[i-1]+"</option>").selectpicker('refresh');
				}
			}
		}
	});
}

function verHistorico(){
	$.ajax({
		type:"post",
		url: "proc/proc_estcta_negocio.php",
		data:{
			cod_neg:$("#cod_neg").val(),
			caso: 5
		},success:function(responseText){
			dataJson=eval(responseText);
			$("#tablaH").bootstrapTable('load',dataJson);
		}
	});
}

function generarFactura(){
	cod_pro=$("#cod_con").val();
	propietario=$("#propietario").val();
	total=0;
	cod_neg=$("#cod_neg").val();
	nom_neg=$("#nom_neg").val();
	var mesesX=new Array();
	var nom_mes=new Array();
	fec_car=new Array();
	con_car=new Array();
	car_car=new Array();
	$("#mesesX option:selected").each(function(){
		mesesX.push($(this).val());
		nom_mes.push(meses[parseInt($(this).val())-1]);
	});
	var nmesesX=mesesX.length;
	for(j=0;j<nmesesX;j++){
		for(i=0;i<12;i++){
			if(parseInt(mesesX[j])==i-1){
				total=total+subt[i];
			}
		}
	}
	total=total.toFixed(2);
	mesesJson=JSON.stringify($("#tablaR").bootstrapTable('getData'));
	mesesJson=eval(mesesJson);
	for(var i in mesesJson){
		for(j=0;j<nmesesX;j++){
			if(mesesJson[i].fecha==meses[mesesX[j]-1]){
				fec_car.push(mesesJson[i].fecha);
				con_car.push(mesesJson[i].concepto);
				car_car.push(mesesJson[i].cargo);
			}
		}
	}
	$.ajax({
		type:"post",
		url:"proc/proc_estcta_negocio.php",
		data:{
			nom_neg:nom_neg,
			cod_con:cod_pro,
			cod_neg:cod_neg,
			total: total,
			nom_mes:nom_mes,
			fec_car:fec_car,
			con_car:con_car,
			car_car:car_car,
			caso:3
		},
		success: function(responseText){
			alert(responseText)
			location.parent="index_catastro.php";
		}
	});
	//window.open("form_factura.php?cod_pro="+cod_pro+"&propietario="+propietario+"&total="+total+"","_self");
}

function obtenerNumMes(mesJson){
	switch(mesJson){
		case "Enero":
			return 1;
		break;
		case "Febrero":
			return 2;
		break;
		case "Marzo":
			return 3;
		break;
		case "Abril":
			return 4;
		break;
		case "Mayo":
			return 5;
		break;
		case "Junio":
			return 6;
		break;
		case "Julio":
			return 7;
		break;
		case "Agosto":
			return 8;
		break;
		case "Septiembre":
			return 9;
		break;
		case "Octubre":
			return 10;
		break;
		case "Noviembre":
			return 11;
		break;
		case "Diciembre":
			return 12;
		break;
	}
}

function cargaDesdeMapa(codneg,codper,tipoPer){
	if(codneg!=""&&codper!=""&&tipoPer!="")
		cargaNeg(codper,codneg,tipoPer);
}

function limpiarCampos(){
	 $('.selectpicker').selectpicker("val",'');
	 // $('.selectpicker').selectpicker('deselectAll');
}

function verCuenta(cod_neg){
	$.ajax({
		type:"post",
		url :"proc/proc_estcta_negocio.php",
		data:{
			cod_neg:cod_neg,
			caso: 6
		},
		success:function(responseText){
			alert(responseText);
			
		}
	});
}

function cancela(){
	parent.location="index_catastro.php";

}
