$(function(){
	new PNotify({
		title: 'Información',
		text: 'Los campos con (*) son obligatorios.',
		type: 'info'
	});
	$("#btnGuardar").click(function(){
		if($("#nom_cem").val()==""||$("#sit_en").val()==""||$("#pre_nic").val()==""||$("#pre_nic2").val()==""){
			alert("No deje campos vacíos");
		}else{
			$.ajax({
				type :"post",
				url : "proc/proc_cementerio.php",
				data:{
					nom_cem:$("#nom_cem").val(),
					sit_en:$("#sit_en").val(),
					zon_cem:$("input[name='zon_cem']:checked").val(),
					pre_nicPC:$("#pre_nicPC").val(),
					pre_nic2PC:$("#pre_nic2PC").val(),
					pre_nicCE:$("#pre_nicCE").val(),
					pre_nic2CE:$("#pre_nic2CE").val(),
					pre_nicFC:$("#pre_nicFC").val(),
					pre_nic2FC:$("#pre_nic2FC").val(),
					caso : 1
				},
				success:function(responseText){
					alert(responseText);
					limpiarCampos();
					cargaCementerio();
				}
			});
		}
	});
});

function cargaCementerio(){
	$.ajax({
		type : "post",
		url : "proc/proc_cementerio.php",
		data :{
			caso : 2
		},
		success : function(responseText){
			var gasJson=eval(responseText);
			var html='';
			for(var i in gasJson){
				html += "<tr id='fila"+i+"'>"
				html += "<td style='display:none'>"+gasJson[i].cod_cem+"</td>"
				html += "<td>"+gasJson[i].nom_cem+"</td>"
				html += "<td>"+gasJson[i].sit_en+"</td>"
				html += "<td>"+gasJson[i].zon_cem+"</td>"
				html += "<td style='width:80px;'><button class='btn' onclick=\"editCol('"+i+"','"+gasJson[i].cod_cem+"')\"><i class='icon-edit'></i></button><button class='btn' onclick=\"remCol('"+i+"','"+gasJson[i].cod_cem+"')\"><i class='icon-remove'></i></button></td>"
				html += "</tr>"
			}
			$("#cuerpo_com").html(html);
		}
	});
}

function limpiarCampos(){
	$("#nom_cem").val("");
	$("#sit_en").val("");
	$("#pre_nicPC").val("0");
	$("#pre_nic2PC").val("0");
	$("#pre_nicCE").val("0");
	$("#pre_nic2CE").val("0");
	$("#pre_nicFC").val("0");
	$("#pre_nic2FC").val("0");
}

function cancela(){
	parent.location="index_catastro.php";
}

function remCol(i,cod_cem){
	if(confirm("¿Está seguro que desea eliminar este cementerio? esta acción no se puede deshacer")){
		$.ajax({
			type: "post",
			url: "proc/proc_cementerio.php",
			data:{
				cod_cem : cod_cem,
				caso : 3
			},
			success: function(responseText){
				$("#fila"+i+"").remove();
				alert(responseText);
			}
		});
	}
}

function editCol(i,cod_cem){
	$.ajax({
		type : "post",
		url : "proc/proc_cementerio.php",
		data:{
			cod_cem : cod_cem,
			caso : 4
		},
		success: function(responseText){
			var dataJson=eval(responseText);
			for(var i in dataJson){
				$("#nom_cem").val(dataJson[i].nom_cem);
				$("#sit_en").val(dataJson[i].sit_en);
				if (dataJson[i].zon_cem=="Rural") {
					$("#zon_cemR").prop("checked",true);
				}else{
					$("#zon_cemU").prop("checked",true);
				}
				pre_nicPC:$("#pre_nicPC").val(dataJson[i].pre_nicPC);
				pre_nic2PC:$("#pre_nic2PC").val(dataJson[i].pre_nic2PC);
				pre_nicCE:$("#pre_nicCE").val(dataJson[i].pre_nicCE);
				pre_nic2CE:$("#pre_nic2CE").val(dataJson[i].pre_nic2CE);
				pre_nicFC:$("#pre_nicFC").val(dataJson[i].pre_nicFC);
				pre_nic2FC:$("#pre_nic2FC").val(dataJson[i].pre_nic2FC);
				boton="";
				boton += "<div class='controls'>"
				boton += "<button class='btn' id='actCol' onclick=\"actDatos('"+dataJson[i].cod_cem+"')\"><i class='icon-refresh'></i> Actualizar datos</button>"
				boton += "</div>";
				$("#divAnadir").html(boton);
				e=document.getElementById("divActions");
				e.style.display="none";
			}
		}
	});
}

function actDatos(cod_cem){
	$.ajax({
		type : "post",
		url : "proc/proc_cementerio.php",
		data :{
			cod_cem:cod_cem,
			nom_cem:$("#nom_cem").val(),
			sit_en:$("#sit_en").val(),
			zon_cem:$("input[name='zon_cem']:checked").val(),
			pre_nicPC:$("#pre_nicPC").val(),
			pre_nic2PC:$("#pre_nic2PC").val(),
			pre_nicCE:$("#pre_nicCE").val(),
			pre_nic2CE:$("#pre_nic2CE").val(),
			pre_nicFC:$("#pre_nicFC").val(),
			pre_nic2FC:$("#pre_nic2FC").val(),
			caso:5
		},
		success:function(responseText){
			alert(responseText);
			limpiarCampos();
			e=document.getElementById("divActions");
			e.style.display="block";
			$("#divAnadir").html("");
			cargaCementerio();
		}
	});
}