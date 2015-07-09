<?php
	
	/*echo "<!DOCTYPE html>";
	echo "<html lang='es'>";
	echo "<head>";
	echo "<meta charset='utf-8'>";
	echo "</head>";
	echo "<body>";
	for ($i=9900; $i < 10000 ; $i++) { 
		echo numeroATexto($i) . "<br>";
	}
	echo "</body>";
	echo "</html>";
	*/

	function decodificarSexo($sexo){
		if ($sexo == "M") {
			$sexo = "masculino";
		}
		elseif ($sexo == "F") {
			$sexo = "femenino";
		}
		elseif ($sexo == "I") {
			$sexo == "indefinido";
		}

		return $sexo;
	}

	function numeroATexto($numero){



		$unidades = array(
			//"0"=>"cero",
			"1"=>"uno", 
			"2"=>"dos", 
			"3"=>"tres", 
			"4"=>"cuatro", 
			"5"=>"cinco", 
			"6"=>"seis", 
			"7"=>"siete", 
			"8"=>"ocho", 
			"9"=>"nueve", 
			"10"=>"diez", 
			"11"=>"once", 
			"12"=>"doce", 
			"13"=>"trece", 
			"14"=>"catorce", 
			"15"=>"quince", 
			"16"=>"dieciséis", 
			"17"=>"diecisiete", 
			"18"=>"dieciocho", 
			"19"=>"diecinueve", 
			"20"=>"veinte", 
			"21"=>"veintiuno", 
			"22"=>"veintidós", 
			"23"=>"veintitrés", 
			"24"=>"veinticuatro", 
			"25"=>"veinticinco", 
			"26"=>"veintiséis", 
			"27"=>"veintisiete", 
			"28"=>"veintiocho", 
			"29"=>"veintinueve"
		);

		$decenas = array(
			"3"=>"treinta",
			"4"=>"cuarenta",
			"5"=>"cincuenta",
			"6"=>"sesenta",
			"7"=>"setenta",
			"8"=>"ochenta",
			"9"=>"noventa"
			);

		$centenas = array(
			"1"=>"ciento", 
			"2"=>"doscientos", 
			"3"=>"trescientos", 
			"4"=>"cuatrocientos", 
			"5"=>"quinientos", 
			"6"=>"seiscientos", 
			"7"=>"setecientos", 
			"8"=>"ochocientos", 
			"9"=>"novecientos"
			);

		$milenas = array(
			"1"=>"mil", 
			"2"=>"dos mil", 
			"3"=>"tres mil", 
			"4"=>"cuatro mil", 
			"5"=>"cinco mil", 
			"6"=>"seis mil", 
			"7"=>"siete mil", 
			"8"=>"ocho mil", 
			"9"=>"nueve mil"
			);


		if ($numero < 30) {
			$texto = $unidades[$numero];
		}

		elseif ($numero < 100) {
			$decena = substr($numero, 0, 1);
			$unidad = substr($numero, 1, 1);
			$texto = $decenas[$decena];
			if ($unidad != 0) {
				$texto .= " y " . $unidades[$unidad];
			}
		}

		elseif ($numero < 101) {
			$texto = "cien";
		}

		elseif ($numero < 1000) {
			$centena = substr($numero, 0, 1);
			$numero = substr($numero, 1, 2);
			$texto = $centenas[$centena];
			if ($numero < 30) {
				if ($numero < 10) {
					$unidad = substr($numero, 1, 1);
					$texto .= " " . $unidades[$unidad];
				}
				else{
					$texto .= " " . $unidades[$numero];
				}
			}
			else{
				$decena = substr($numero, 0, 1);
				$unidad = substr($numero, 1, 1);
				$texto .= " " . $decenas[$decena];
				if ($unidad != 0) {
					$texto .= " y " . $unidades[$unidad];
				}
			}
		}

		elseif ($numero < 10000) {
			$milena = substr($numero, 0, 1);
			$numero = substr($numero, 1, 3);
			$texto = $milenas[$milena] . " ";
			/**/
				if ($numero ==100) {
					$texto .= "cien";
				}
				else{
					$centena = substr($numero, 0, 1);
					$numero = substr($numero, 1, 2);
					$texto .= $centenas[$centena];
				}

				if ($numero < 30) {
					if ($numero < 10) {
						$unidad = substr($numero, 1, 1);
						$texto .= " " . $unidades[$unidad];
					}
					else{
						$texto .= " " . $unidades[$numero];
					}
				}
				else{
					$decena = substr($numero, 0, 1);
					$unidad = substr($numero, 1, 1);
					$texto .= " " . $decenas[$decena];
					if ($unidad != 0) {
						$texto .= " y " . $unidades[$unidad];
					}
				}
			/**/
		}


		return trim($texto);
	}

	

	function diaATexto($dia){
		$valores = array( 
			"01"=>"primero", 
			"02"=>"dos", 
			"03"=>"tres", 
			"04"=>"cuatro", 
			"05"=>"cinco", 
			"06"=>"seis", 
			"07"=>"siete", 
			"08"=>"ocho", 
			"09"=>"nueve", 
			"10"=>"diez", 
			"11"=>"once", 
			"12"=>"doce", 
			"13"=>"trece", 
			"14"=>"catorce", 
			"15"=>"quince", 
			"16"=>"dieciséis", 
			"17"=>"diecisiete", 
			"18"=>"dieciocho", 
			"19"=>"diecinueve", 
			"20"=>"veinte", 
			"21"=>"veintiuno", 
			"22"=>"veintidós", 
			"23"=>"veintitrés", 
			"24"=>"veinticuatro", 
			"25"=>"veinticinco", 
			"26"=>"veintiséis", 
			"27"=>"veintisiete", 
			"28"=>"veintiocho", 
			"29"=>"veintinueve", 
			"30"=>"treinta", 
			"31"=>"treinta y uno"
		);

		$texto = $valores[$dia];
		return $texto;
	}


	function diasATexto($dia){
		$valores = array( 
			"01"=>"un", 
			"02"=>"dos", 
			"03"=>"tres", 
			"04"=>"cuatro", 
			"05"=>"cinco", 
			"06"=>"seis", 
			"07"=>"siete", 
			"08"=>"ocho", 
			"09"=>"nueve", 
			"10"=>"diez", 
			"11"=>"once", 
			"12"=>"doce", 
			"13"=>"trece", 
			"14"=>"catorce", 
			"15"=>"quince", 
			"16"=>"dieciséis", 
			"17"=>"diecisiete", 
			"18"=>"dieciocho", 
			"19"=>"diecinueve", 
			"20"=>"veinte", 
			"21"=>"veintiun", 
			"22"=>"veintidós", 
			"23"=>"veintitrés", 
			"24"=>"veinticuatro", 
			"25"=>"veinticinco", 
			"26"=>"veintiséis", 
			"27"=>"veintisiete", 
			"28"=>"veintiocho", 
			"29"=>"veintinueve", 
			"30"=>"treinta", 
			"31"=>"treinta y un"
		);

		$texto = $valores[$dia];
		return $texto;
	}

	function mesATexto($mes){
		$valores = array(
			"01"=>"enero", 
			"02"=>"febrero", 
			"03"=>"marzo", 
			"04"=>"abril", 
			"05"=>"mayo", 
			"06"=>"junio", 
			"07"=>"julio", 
			"08"=>"agosto", 
			"09"=>"septiembre", 
			"10"=>"octubre", 
			"11"=>"noviembre", 
			"12"=>"diciembre"
		);

		$texto = $valores[$mes];
		return $texto;
	}

	function duiATexto($dui){
		$valores = array(
			"0"=>"cero", 
			"1"=>"uno", 
			"2"=>"dos", 
			"3"=>"tres", 
			"4"=>"cuatro", 
			"5"=>"cinco", 
			"6"=>"seis", 
			"7"=>"siete", 
			"8"=>"ocho", 
			"9"=>"nueve", 
			"-"=>"-"
		);

		$texto = "";
		$l = strlen($dui);
		for($i=0; $i < $l ; $i++){
			$texto .= $valores[substr($dui, $i, 1)] . " ";
		}
		$texto = trim($texto);
		return $texto;
	}

	function horaATexto($hora){
		$valores = array(
			"00"=>"cero", 
			"01"=>"una", 
			"02"=>"dos", 
			"03"=>"tres", 
			"04"=>"cuatro", 
			"05"=>"cinco", 
			"06"=>"seis", 
			"07"=>"siete", 
			"08"=>"ocho", 
			"09"=>"nueve", 
			"10"=>"diez", 
			"11"=>"once", 
			"12"=>"doce", 
			"13"=>"trece", 
			"14"=>"catorce", 
			"15"=>"quince", 
			"16"=>"dieciséis", 
			"17"=>"diecisiete", 
			"18"=>"dieciocho", 
			"19"=>"diecinueve", 
			"20"=>"veinte", 
			"21"=>"veintiun", 
			"22"=>"veintidós", 
			"23"=>"veintitrés", 
			"24"=>"veinticuatro"
		);

		$texto = $valores[$hora];
		return $texto;
	}

	function minutoATexto($minuto){
		$valores = array( 
			"00"=>"cero",
			"01"=>"un", 
			"02"=>"dos", 
			"03"=>"tres", 
			"04"=>"cuatro", 
			"05"=>"cinco", 
			"06"=>"seis", 
			"07"=>"siete", 
			"08"=>"ocho", 
			"09"=>"nueve", 
			"10"=>"diez", 
			"11"=>"once", 
			"12"=>"doce", 
			"13"=>"trece", 
			"14"=>"catorce", 
			"15"=>"quince", 
			"16"=>"dieciséis", 
			"17"=>"diecisiete", 
			"18"=>"dieciocho", 
			"19"=>"diecinueve", 
			"20"=>"veinte", 
			"21"=>"veintiun", 
			"22"=>"veintidós", 
			"23"=>"veintitrés", 
			"24"=>"veinticuatro", 
			"25"=>"veinticinco", 
			"26"=>"veintiséis", 
			"27"=>"veintisiete", 
			"28"=>"veintiocho", 
			"29"=>"veintinueve", 
			"30"=>"treinta", 
			"31"=>"treinta y un",
			"32"=>"treinta y dos",
			"33"=>"treinta y tres",
			"34"=>"treinta y cuatro",
			"35"=>"treinta y cinco",
			"36"=>"treinta y seis",
			"37"=>"treinta y siete",
			"38"=>"treinta y ocho",
			"39"=>"treinta y nueve",
			"40"=>"cuarenta",
			"41"=>"cuarenta y un",
			"42"=>"cuarenta y dos",
			"43"=>"cuarenta y tres",
			"44"=>"cuarenta y cuatro",
			"45"=>"cuarenta y cinco",
			"46"=>"cuarenta y seis",
			"47"=>"cuarenta y siete",
			"48"=>"cuarenta y ocho",
			"49"=>"cuarenta y nueve",
			"50"=>"cincuenta",
			"51"=>"cincuenta y un",
			"52"=>"cincuenta y dos",
			"53"=>"cincuenta y tres",
			"54"=>"cincuenta y cuatro",
			"55"=>"cincuenta y cinco",
			"56"=>"cincuenta y seis",
			"57"=>"cincuenta y siete",
			"58"=>"cincuenta y ocho",
			"59"=>"cincuenta y nueve"
		);

		$texto = $valores[$minuto];
		return $texto;
	}
?>