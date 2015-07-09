///////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////  PARA dep y mun  //////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
var selectDepto;
var selectMunicipio;
function fillDep(){ 
	selectDepto=document.getElementById("dep");
	addOption(selectDepto, "Ahuachapán", "Ahuachapán");
	addOption(selectDepto, "Cabañas", "Cabañas");
	addOption(selectDepto, "Chalatenango", "Chalatenango");
	addOption(selectDepto, "Cuscatlán", "Cuscatlán");
	addOption(selectDepto, "La Libertad", "La Libertad");
	addOption(selectDepto, "La Paz", "La Paz");
	addOption(selectDepto, "La Unión", "La Unión");
	addOption(selectDepto, "Morazán", "Morazán");
	addOption(selectDepto, "San Miguel", "San Miguel");
	addOption(selectDepto, "San Salvador", "San Salvador");
	addOption(selectDepto, "San Vicente", "San Vicente");
	addOption(selectDepto, "Santa Ana", "Santa Ana");
	addOption(selectDepto, "Sonsonate", "Sonsonate");
	addOption(selectDepto, "Usulután", "Usulután");
	$("#dep option[value='Cuscatlán']").attr("selected",true);
	selectMun();
}

function selectMun(){
	// ON selection of dep_def this function will work
	selectMunicipio=document.getElementById("mun");
	removeAllOptions(selectMunicipio);
	addOption(selectMunicipio, "", "--MUNICIPIO--", "");
	if(selectDepto.value == "Ahuachapán"){
		addOption(selectMunicipio,"Ahuachapán", "Ahuachapán");
		addOption(selectMunicipio,"Jujutla", "Jujutla");
		addOption(selectMunicipio,"Atiquizaya", "Atiquizaya");
		addOption(selectMunicipio,"Concepción de Ataco", "Concepción de Ataco");
		addOption(selectMunicipio,"El Refugio", "El Refugio");
		addOption(selectMunicipio,"Guaymango", "Guaymango");
		addOption(selectMunicipio,"Apaneca", "Apaneca");
		addOption(selectMunicipio,"San Francisco Menéndez", "San Francisco Menéndez");
		addOption(selectMunicipio,"San Lorenzo", "San Lorenzo");
		addOption(selectMunicipio,"San Pedro Puxtla", "San Pedro Puxtla");
		addOption(selectMunicipio,"Tacuba", "Tacuba");
		addOption(selectMunicipio,"Turín", "Turín");
	}
	if(selectDepto.value == "Cabañas"){
		addOption(selectMunicipio,"Cinquera", "Cinquera");
		addOption(selectMunicipio,"Villa Dolores", "Villa Dolores");
		addOption(selectMunicipio,"Guacotecti", "Guacotecti");
		addOption(selectMunicipio,"Ilobasco", "Ilobasco");
		addOption(selectMunicipio,"Jutiapa", "Jutiapa");
		addOption(selectMunicipio,"San Isidro", "San Isidro");
		addOption(selectMunicipio,"Sensuntepeque", "Sensuntepeque");
		addOption(selectMunicipio,"Ciudad de Tejutepeque", "Ciudad de Tejutepeque");
		addOption(selectMunicipio,"Victoria", "Victoria");
	}
	if(selectDepto.value == "Chalatenango"){
		addOption(selectMunicipio,"Agua Caliente", "Agua Caliente");
		addOption(selectMunicipio,"Arcatao", "Arcatao");
		addOption(selectMunicipio,"Azacualpa", "Azacualpa");
		addOption(selectMunicipio,"Chalatenango", "Chalatenango");
		addOption(selectMunicipio,"Citalá", "Citalá");
		addOption(selectMunicipio,"Comalapa", "Comalapa");
		addOption(selectMunicipio,"Concepción Quezaltepeque", "Concepción Quezaltepeque");
		addOption(selectMunicipio,"Dulce Nombre de María", "Dulce Nombre de María");
		addOption(selectMunicipio,"El Carrizal", "El Carrizal");
		addOption(selectMunicipio,"El Paraíso", "El Paraíso");
		addOption(selectMunicipio,"La Laguna", "La Laguna");
		addOption(selectMunicipio,"La Palma", "La Palma");
		addOption(selectMunicipio,"La Reina", "La Reina");
		addOption(selectMunicipio,"Las Vueltas", "Las Vueltas");
		addOption(selectMunicipio,"Nombre de Jesús", "Nombre de Jesús");
		addOption(selectMunicipio,"Nueva Concepción", "Nueva Concepción");
		addOption(selectMunicipio,"Nueva Trinidad", "Nueva Trinidad");
		addOption(selectMunicipio,"Ojos de Agua", "Ojos de Agua");
		addOption(selectMunicipio,"Potonico", "Potonico");
		addOption(selectMunicipio,"San Antonio de la Cruz", "San Antonio de la Cruz");
		addOption(selectMunicipio,"San Antonio Los Ranchos", "San Antonio Los Ranchos");
		addOption(selectMunicipio,"San Fernando", "San Fernando");
		addOption(selectMunicipio,"San Francisco Lempa", "San Francisco Lempa");
		addOption(selectMunicipio,"San Francisco Morazán", "San Francisco Morazán");
		addOption(selectMunicipio,"San Ignacio", "San Ignacio");
		addOption(selectMunicipio,"San Isidro Labrador", "San Isidro Labrador");
		addOption(selectMunicipio,"San José Cancasque", "San José Cancasque");
		addOption(selectMunicipio,"San José Las Flores", "San José Las Flores");
		addOption(selectMunicipio,"San Luis del Carmen", "San Luis del Carmen");
		addOption(selectMunicipio,"San Miguel de Mercedes", "San Miguel de Mercedes");
		addOption(selectMunicipio,"San Rafael", "San Rafael");
		addOption(selectMunicipio,"Santa Rita", "Santa Rita");
		addOption(selectMunicipio,"Tejutla", "Tejutla");
	}
	if(selectDepto.value == "Cuscatlán"){
		addOption(selectMunicipio,"Candelaria", "Candelaria");
		addOption(selectMunicipio,"Cojutepeque", "Cojutepeque");
		addOption(selectMunicipio,"El Carmen", "El Carmen");
		addOption(selectMunicipio,"El Rosario", "El Rosario");
		addOption(selectMunicipio,"Monte San Juan", "Monte San Juan");
		addOption(selectMunicipio,"Oratorio de Concepción", "Oratorio de Concepción");
		addOption(selectMunicipio,"San Bartolomé Perulapía", "San Bartolomé Perulapía");
		addOption(selectMunicipio,"San Cristóbal", "San Cristóbal");
		addOption(selectMunicipio,"San José Guayabal", "San José Guayabal");
		addOption(selectMunicipio,"San Pedro Perulapán", "San Pedro Perulapán");
		addOption(selectMunicipio,"San Rafael Cedros", "San Rafael Cedros");
		addOption(selectMunicipio,"San Ramón", "San Ramón");
		addOption(selectMunicipio,"Santa Cruz Analquito", "Santa Cruz Analquito");
		addOption(selectMunicipio,"Santa Cruz Michapa", "Santa Cruz Michapa");
		addOption(selectMunicipio,"Suchitoto", "Suchitoto");
		addOption(selectMunicipio,"Tenancingo", "Tenancingo");
	}
	if(selectDepto.value == "La Libertad"){
		addOption(selectMunicipio,"Antiguo Cuscatlán", "Antiguo Cuscatlán");
		addOption(selectMunicipio,"Chiltiupán", "Chiltiupán");
		addOption(selectMunicipio,"Ciudad Arce", "Ciudad Arce");
		addOption(selectMunicipio,"Colón", "Colón");
		addOption(selectMunicipio,"Comasagua", "Comasagua");
		addOption(selectMunicipio,"Huizúcar", "Huizúcar");
		addOption(selectMunicipio,"Jayaque", "Jayaque");
		addOption(selectMunicipio,"Jicalapa", "Jicalapa");
		addOption(selectMunicipio,"La Libertad", "La Libertad");
		addOption(selectMunicipio,"Nueva San Salvador", "Nueva San Salvador");
		addOption(selectMunicipio,"Nuevo Cuscatlán", "Nuevo Cuscatlán");
		addOption(selectMunicipio,"Opico", "Opico");
		addOption(selectMunicipio,"Quezaltepeque", "Quezaltepeque");
		addOption(selectMunicipio,"Sacacoyo", "Sacacoyo");
		addOption(selectMunicipio,"San José Villanueva", "San José Villanueva");
		addOption(selectMunicipio,"San Matías", "San Matías");
		addOption(selectMunicipio,"San Pablo Tacachico", "San Pablo Tacachico");
		addOption(selectMunicipio,"Talnique", "Talnique");
		addOption(selectMunicipio,"Tamanique", "Tamanique");
		addOption(selectMunicipio,"Teotepeque", "Teotepeque");
		addOption(selectMunicipio,"Tepecoyo", "Tepecoyo");
		addOption(selectMunicipio,"Zaragoza", "Zaragoza");
	}
	if(selectDepto.value == "La Paz"){
		addOption(selectMunicipio,"Cuyultitán", "Cuyultitán");
		addOption(selectMunicipio,"El Rosario", "El Rosario");
		addOption(selectMunicipio,"Jerusalén", "Jerusalén");
		addOption(selectMunicipio,"Mercedes La Ceiba", "Mercedes La Ceiba");
		addOption(selectMunicipio,"Olocuilta", "Olocuilta");
		addOption(selectMunicipio,"Paraíso de Osorio", "Paraíso de Osorio");
		addOption(selectMunicipio,"San Antonio Masahuat", "San Antonio Masahuat");
		addOption(selectMunicipio,"San Emigdio", "San Emigdio");
		addOption(selectMunicipio,"San Francisco Chinameca", "San Francisco Chinameca");
		addOption(selectMunicipio,"San Juan Nonualco", "San Juan Nonualco");
		addOption(selectMunicipio,"San Juan Talpa", "San Juan Talpa");
		addOption(selectMunicipio,"San Juan Tepezontes", "San Juan Tepezontes");
		addOption(selectMunicipio,"San Luis La Herradura", "San Luis La Herradura");
		addOption(selectMunicipio,"San Luis Talpa", "San Luis Talpa");
		addOption(selectMunicipio,"San Miguel Tepezontes", "San Miguel Tepezontes");
		addOption(selectMunicipio,"San Pedro Masahuat", "San Pedro Masahuat");
		addOption(selectMunicipio,"San Pedro Nonualco", "San Pedro Nonualco");
		addOption(selectMunicipio,"San Rafael Obrajuelo", "San Rafael Obrajuelo");
		addOption(selectMunicipio,"Santa María Ostuma", "Santa María Ostuma");
		addOption(selectMunicipio,"Santiago Nonualco", "Santiago Nonualco");
		addOption(selectMunicipio,"Tapalhuaca", "Tapalhuaca");
		addOption(selectMunicipio,"Zacatecoluca", "Zacatecoluca");
	}
	if(selectDepto.value == "La Unión"){
		addOption(selectMunicipio,"Anamorós", "Anamorós");
		addOption(selectMunicipio,"Bolívar", "Bolívar");
		addOption(selectMunicipio,"Concepción de Oriente", "Concepción de Oriente");
		addOption(selectMunicipio,"Conchagua", "Conchagua");
		addOption(selectMunicipio,"El Carmen", "El Carmen");
		addOption(selectMunicipio,"El Sauce", "El Sauce");
		addOption(selectMunicipio,"Intipucá", "Intipucá");
		addOption(selectMunicipio,"La Unión", "La Unión");
		addOption(selectMunicipio,"Lislique", "Lislique");
		addOption(selectMunicipio,"Meanguera del Golfo", "Meanguera del Golfo");
		addOption(selectMunicipio,"Nueva Esparta", "Nueva Esparta");
		addOption(selectMunicipio,"Pasaquina", "Pasaquina");
		addOption(selectMunicipio,"Polorós", "Polorós");
		addOption(selectMunicipio,"San Alejo", "San Alejo");
		addOption(selectMunicipio,"San José", "San José");
		addOption(selectMunicipio,"Santa Rosa de Lima", "Santa Rosa de Lima");
		addOption(selectMunicipio,"Yayantique", "Yayantique");
		addOption(selectMunicipio,"Yucuayquín", "Yucuayquín");
	}
	if(selectDepto.value == "Morazán"){
		addOption(selectMunicipio,"Arambala", "Arambala");
		addOption(selectMunicipio,"Cacaopera", "Cacaopera");
		addOption(selectMunicipio,"Chilanga", "Chilanga");
		addOption(selectMunicipio,"Corinto", "Corinto");
		addOption(selectMunicipio,"Delicias de Concepción", "Delicias de Concepción");
		addOption(selectMunicipio,"El Divisadero", "El Divisadero");
		addOption(selectMunicipio,"El Rosario", "El Rosario");
		addOption(selectMunicipio,"Gualococti", "Gualococti");
		addOption(selectMunicipio,"Guatajiagua", "Guatajiagua");
		addOption(selectMunicipio,"Joateca", "Joateca");
		addOption(selectMunicipio,"Jocoaitique", "Jocoaitique");
		addOption(selectMunicipio,"Jocoro", "Jocoro");
		addOption(selectMunicipio,"Lolotiquillo", "Lolotiquillo");
		addOption(selectMunicipio,"Meanguera", "Meanguera");
		addOption(selectMunicipio,"Osicala", "Osicala");
		addOption(selectMunicipio,"Perquín", "Perquín");
		addOption(selectMunicipio,"San Carlos", "San Carlos");
		addOption(selectMunicipio,"San Fernando", "San Fernando");
		addOption(selectMunicipio,"San Francisco Gotera", "San Francisco Gotera");
		addOption(selectMunicipio,"San Isidro", "San Isidro");
		addOption(selectMunicipio,"San Simón", "San Simón");
		addOption(selectMunicipio,"Sensembra", "Sensembra");
		addOption(selectMunicipio,"Sociedad", "Sociedad");
		addOption(selectMunicipio,"Torola", "Torola");
		addOption(selectMunicipio,"Yamabal", "Yamabal");
		addOption(selectMunicipio,"Yoloaiquín", "Yoloaiquín");
	}
	if(selectDepto.value == "San Miguel"){
		addOption(selectMunicipio,"Carolina", "Carolina");
		addOption(selectMunicipio,"Chapeltique", "Chapeltique");
		addOption(selectMunicipio,"Chinameca", "Chinameca");
		addOption(selectMunicipio,"Chirilagua", "Chirilagua");
		addOption(selectMunicipio,"Ciudad Barrios", "Ciudad Barrios");
		addOption(selectMunicipio,"Comacarán", "Comacarán");
		addOption(selectMunicipio,"El Tránsito", "El Tránsito");
		addOption(selectMunicipio,"Lolotique", "Lolotique");
		addOption(selectMunicipio,"Moncagua", "Moncagua");
		addOption(selectMunicipio,"Nueva Guadalupe", "Nueva Guadalupe");
		addOption(selectMunicipio,"Nuevo Edén de San Juan", "Nuevo Edén de San Juan");
		addOption(selectMunicipio,"Quelepa", "Quelepa");
		addOption(selectMunicipio,"San Antonio", "San Antonio");
		addOption(selectMunicipio,"San Gerardo", "San Gerardo");
		addOption(selectMunicipio,"San Jorge", "San Jorge");
		addOption(selectMunicipio,"San Luis de la Reina", "San Luis de la Reina");
		addOption(selectMunicipio,"San Miguel", "San Miguel");
		addOption(selectMunicipio,"San Rafael", "San Rafael");
		addOption(selectMunicipio,"Sesori", "Sesori");
		addOption(selectMunicipio,"Uluazapa", "Uluazapa");
	}
	if(selectDepto.value == "San Salvador"){
		addOption(selectMunicipio,"Aguilares", "Aguilares");
		addOption(selectMunicipio,"Apopa", "Apopa");
		addOption(selectMunicipio,"Ayutuxtepeque", "Ayutuxtepeque");
		addOption(selectMunicipio,"Cuscatancingo", "Cuscatancingo");
		addOption(selectMunicipio,"Delgado", "Delgado");
		addOption(selectMunicipio,"El Paisnal", "El Paisnal");
		addOption(selectMunicipio,"Guazapa", "Guazapa");
		addOption(selectMunicipio,"Ilopango", "Ilopango");
		addOption(selectMunicipio,"Mejicanos", "Mejicanos");
		addOption(selectMunicipio,"Nejapa", "Nejapa");
		addOption(selectMunicipio,"Panchimalco", "Panchimalco");
		addOption(selectMunicipio,"Rosario de Mora", "Rosario de Mora");
		addOption(selectMunicipio,"San Marcos", "San Marcos");
		addOption(selectMunicipio,"San Martín", "San Martín");
		addOption(selectMunicipio,"San Salvador", "San Salvador");
		addOption(selectMunicipio,"Santiago Texacuangos", "Santiago Texacuangos");
		addOption(selectMunicipio,"Santo Tomás", "Santo Tomás");
		addOption(selectMunicipio,"Soyapango", "Soyapango");
		addOption(selectMunicipio,"Tonacatepeque", "Tonacatepeque");
	}
	if(selectDepto.value == "San Vicente"){
		addOption(selectMunicipio,"Apastepeque", "Apastepeque");
		addOption(selectMunicipio,"Guadalupe", "Guadalupe");
		addOption(selectMunicipio,"San Cayetano Istepeque", "San Cayetano Istepeque");
		addOption(selectMunicipio,"San Esteban Catarina", "San Esteban Catarina");
		addOption(selectMunicipio,"San Ildefonso", "San Ildefonso");
		addOption(selectMunicipio,"San Lorenzo", "San Lorenzo");
		addOption(selectMunicipio,"San Sebastián", "San Sebastián");
		addOption(selectMunicipio,"Santa Clara", "Santa Clara");
		addOption(selectMunicipio,"Santo Domingo", "Santo Domingo");
		addOption(selectMunicipio,"San Vicente", "San Vicente");
		addOption(selectMunicipio,"Tecoluca", "Tecoluca");
		addOption(selectMunicipio,"Tepetitán", "Tepetitán");
		addOption(selectMunicipio,"Verapaz", "Verapaz");
	}
	if(selectDepto.value == "Santa Ana"){
		addOption(selectMunicipio,"Candelaria de la Frontera", "Candelaria de la Frontera");
		addOption(selectMunicipio,"Chalchuapa", "Chalchuapa");
		addOption(selectMunicipio,"Coatepeque", "Coatepeque");
		addOption(selectMunicipio,"El Congo", "El Congo");
		addOption(selectMunicipio,"El Porvenir", "El Porvenir");
		addOption(selectMunicipio,"Masahuat", "Masahuat");
		addOption(selectMunicipio,"Metapán", "Metapán");
		addOption(selectMunicipio,"San Antonio Pajonal", "San Antonio Pajonal");
		addOption(selectMunicipio,"San Sebastián Salitrillo", "San Sebastián Salitrillo");
		addOption(selectMunicipio,"Santa Ana", "Santa Ana");
		addOption(selectMunicipio,"Santa Rosa Guachipilín", "Santa Rosa Guachipilín");
		addOption(selectMunicipio,"Santiago de la Frontera", "Santiago de la Frontera");
		addOption(selectMunicipio,"Texistepeque", "Texistepeque");
	}
	if(selectDepto.value == "Sonsonate"){
		addOption(selectMunicipio,"Acajutla", "Acajutla");
		addOption(selectMunicipio,"Armenia", "Armenia");
		addOption(selectMunicipio,"Caluco", "Caluco");
		addOption(selectMunicipio,"Cuisnahuat", "Cuisnahuat");
		addOption(selectMunicipio,"Izalco", "Izalco");
		addOption(selectMunicipio,"Juayúa", "Juayúa");
		addOption(selectMunicipio,"Nahuizalco", "Nahuizalco");
		addOption(selectMunicipio,"Nahulingo", "Nahulingo");
		addOption(selectMunicipio,"Salcoatitán", "Salcoatitán");
		addOption(selectMunicipio,"San Antonio del Monte", "San Antonio del Monte");
		addOption(selectMunicipio,"San Julián", "San Julián");
		addOption(selectMunicipio,"Santa Catarina Masahuat", "Santa Catarina Masahuat");
		addOption(selectMunicipio,"Santa Isabel Ishuatán", "Santa Isabel Ishuatán");
		addOption(selectMunicipio,"Santo Domingo", "Santo Domingo");
		addOption(selectMunicipio,"Sonsonate", "Sonsonate");
		addOption(selectMunicipio,"Sonzacate", "Sonzacate");
	}
	if(selectDepto.value == "Usulután"){
		addOption(selectMunicipio,"Alegría", "Alegría");
		addOption(selectMunicipio,"Berlín", "Berlín");
		addOption(selectMunicipio,"California", "California");
		addOption(selectMunicipio,"Concepción Batres", "Concepción Batres");
		addOption(selectMunicipio,"El Triunfo", "El Triunfo");
		addOption(selectMunicipio,"Ereguayquín", "Ereguayquín");
		addOption(selectMunicipio,"Estanzuelas", "Estanzuelas");
		addOption(selectMunicipio,"Jiquilisco", "Jiquilisco");
		addOption(selectMunicipio,"Jucuapa", "Jucuapa");
		addOption(selectMunicipio,"Jucuarán", "Jucuarán");
		addOption(selectMunicipio,"Mercedes Umaña", "Mercedes Umaña");
		addOption(selectMunicipio,"Nueva Granada", "Nueva Granada");
		addOption(selectMunicipio,"Ozatlán", "Ozatlán");
		addOption(selectMunicipio,"Puerto El Triunfo", "Puerto El Triunfo");
		addOption(selectMunicipio,"San Agustín", "San Agustín");
		addOption(selectMunicipio,"San Buenaventura", "San Buenaventura");
		addOption(selectMunicipio,"San Dionisio", "San Dionisio");
		addOption(selectMunicipio,"San Francisco Javier", "San Francisco Javier");
		addOption(selectMunicipio,"Santa Elena", "Santa Elena");
		addOption(selectMunicipio,"Santa María", "Santa María");
		addOption(selectMunicipio,"Santiago de María", "Santiago de María");
		addOption(selectMunicipio,"Tecapán", "Tecapán");
		addOption(selectMunicipio,"Usulután", "Usulután");
	}
	$("#mun option[value='San Cristóbal']").attr("selected",true);
}
////////////////// 

function removeAllOptions(selectbox)
{
	var i;
	for(i=selectbox.options.length-1;i>=0;i--)
	{
		//selectbox.options.remove(i);
		selectbox.remove(i);
	}
}


function addOption(selectbox, value, text )
{
	var optn = document.createElement("OPTION");
	optn.text = text;
	optn.value = value;

	selectbox.options.add(optn);
}


function getDepa(){
	// for (var i = 14 - 1; i >= 0; i--) {
	// 	window.alert("este es"+selectDepto.options[selectDepto.(i)].value);
	// };
	window.alert(selectDepto.options[selectDepto.Index('4')].value);
	//window.alert("prueba");
	

}