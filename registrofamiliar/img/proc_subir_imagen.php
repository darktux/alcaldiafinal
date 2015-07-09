<?php
if($_POST["accion"] == "guardar-nacimiento-partida"){
	$url = "nac_par/" . $_POST[esc_lib];
	move_uploaded_file ($_FILES[esc_libx][tmp_name], $url);
}

elseif($_POST["accion"] == "guardar-matrimonio-acta"){
	$url = "mat_act/" . $_POST[esc_lib];
	move_uploaded_file ($_FILES[esc_libx][tmp_name], $url);
}

elseif($_POST["accion"] == "guardar-matrimonio-partida"){
	$url = "mat_par/" . $_POST[esc_lib];
	move_uploaded_file ($_FILES[esc_libx][tmp_name], $url);
}

elseif($_POST["accion"] == "guardar-divorcio-partida"){
	$url = "div_par/" . $_POST[esc_lib];
	move_uploaded_file ($_FILES[esc_libx][tmp_name], $url);
}

elseif($_POST["accion"] == "guardar-defuncion-partida"){
	$url = "def_par/" . $_POST[esc_lib];
	move_uploaded_file ($_FILES[esc_libx][tmp_name], $url);
}
?>