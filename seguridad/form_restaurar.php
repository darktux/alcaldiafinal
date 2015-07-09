<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Restauración de la base de datos</title>
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/retoques.css">
		<link rel="stylesheet" href="../css/fileinput.css">
		<script src="../js/jquery.min-1.7.1-google.js"></script>
		<script src="../js/bootstrap-2.0.2.js"></script>
		<script src="../js/funciones.js"></script>
		<script src="../js/fileinput.js"></script>
	</head>

    <body style="text-align:center;">
        <input id="respaldo" name="respaldo" type="file" class="file" >
        <div id="avisos"></div>
         <script type="text/javascript">
            $("#respaldo").fileinput({
                allowedFileExtensions: ["sql"],
                showUpload: true,
                browseClass: "btn",
                browseLabel: "Seleccionar archivo.sql",
                browseIcon: "<i class=\"glyphicon glyphicon-list-alt\"></i> ",
                removeClass: "btn",
                removeLabel: "Cancelar",
                removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> ",
                uploadClass: "btn",
                uploadLabel: "Restaurar",
                uploadIcon: "<i class=\"glyphicon glyphicon-upload\"></i> ",
                uploadAsync: false,
                uploadUrl: "back_rest.php",
                uploadExtraData: function() {
                    return {
                        actionButton: 'Import'
                    }
                }
            });
         </script>
    </body>
</html>