<?php
/**
 * Subida de un archivo al servidor.
 *
 * Script respuesta al formulario de carga de archivo al servidor.
 * @author dwes
 *
 **/
define("DIRUPLOAD", 'upload/');
define("MAXSIZE", 200000);
$allowedExts = array("gif", "jpeg", "jpg", "png");
$allowedFormat =
    array(
        "image/gif",
        "image/jpeg",
        "image/jpg",
        "image/jpeg",
        "image/x-png", 
        "image/png"
    );
//Obtenemos la extensión, podriamos hacerlo tambien con pathinfo() más adelante .
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (
    ($_FILES["file"]["size"] < MAXSIZE) &&
    in_array($_FILES["file"]["type"], $allowedFormat) &&
    in_array($extension, $allowedExts)
) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br/>";
    } else {
        $filename = $_FILES["file"]["name"];
        /* Conviene renombrar la imagen bien con el id de una base de datos
        o con un identificador único*/
        // $filename = time() . $filename;
        $filename = uniqid() . '.' . pathinfo($filename, PATHINFO_EXTENSION);
        echo "Upload: " . $_FILES["file"]["name"] . "<br/>";
        echo "Type: " . $_FILES["file"]["type"] . "<br/>";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . "kB <br/>";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br/>";
        if (file_exists(DIRUPLOAD . $filename)) {
            echo $_FILES["file"]["name"] . " already exists. ";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], DIRUPLOAD .$filename);

            echo "Stored in: " . DIRUPLOAD . $filename;
        }
        echo "<br/>";
        echo "<a href=\"" . $_SERVER['HTTP_REFERER'] . "\">Volver</a>"; // No se recomienda.

        echo '<a href="javascript:history.back()">Volver</a>'; // Mejor.
    }
} else {
    echo "Invalid file";
}
?>