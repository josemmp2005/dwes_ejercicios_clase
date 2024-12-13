<?php
/**
 * @author = Jose María Mayen Pérez
 * @date = 31-10-2024 
 */

// Definición de constantes para la carpeta donde se almacenan los archivos subidos 
// y el tamaño máximo permitido para los archivos.
define("DIRUPLOAD", "./upload/"); // Carpeta donde se guardan los archivos subidos.
define("MAXSIZE", 200000); // Tamaño máximo del archivo en bytes (200 KB).

// Comprobación si se solicita la eliminación de un archivo a través del parámetro 'del' en la URL.
if (isset($_GET['del'])) {
    $fileToDelete = DIRUPLOAD . basename($_GET['del']); // Obtiene la ruta completa del archivo a eliminar.
    if (file_exists($fileToDelete)) { // Verifica si el archivo existe.
        unlink($fileToDelete); // Elimina el archivo del servidor.
        echo "El archivo " . htmlspecialchars($_GET['del']) . " ha sido eliminado.<br/>";
    } else {
        echo "El archivo no existe.<br/>"; // Mensaje si el archivo no se encuentra.
    }
}

// Declaración de extensiones y formatos de archivo permitidos para la subida.
$allowedExts = array("gif", "jpeg", "jpg", "png"); // Extensiones permitidas.
$allowedFormats = array("image/gif", "image/jpeg", "image/jpg", "image/x-png", "image/png"); // Tipos MIME permitidos.

// Comprobación si se ha enviado un archivo a través de un formulario.
if (isset($_FILES["file"])) {
    $temp = explode(".", $_FILES["file"]["name"]); // Divide el nombre del archivo por puntos para obtener la extensión.
    $extension = end($temp); // Obtiene la última parte como extensión.

    // Comprueba si el archivo cumple con las restricciones de tamaño, formato y extensión.
    if (($_FILES['file']['size'] < MAXSIZE) 
        && in_array($_FILES['file']['type'], $allowedFormats) 
        && in_array($extension, $allowedExts)) {

        if ($_FILES['file']['error'] > 0) { // Comprueba si ocurrió algún error al subir el archivo.
            echo "Return code: " . $_FILES['file']['error'] . "<br/>";
        } else {
            // Genera un nombre único para el archivo subido para evitar colisiones.
            $filename = $_FILES["file"]["name"];
            $filename = uniqid() . "." . pathinfo($filename, PATHINFO_EXTENSION);

            // Muestra información del archivo subido.
            echo "Upload: " . $_FILES["file"]["name"] . "<br/>";
            echo "Type: " . $_FILES["file"]["type"] . "<br/>";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . "kB <br/>";
            echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br/>";

            // Comprueba si el archivo ya existe en la carpeta de destino.
            if (file_exists(DIRUPLOAD . $filename)) {
                echo $_FILES["file"]["name"] . " already exists. ";
            } else {
                // Mueve el archivo desde la ubicación temporal a la carpeta de destino.
                move_uploaded_file($_FILES["file"]["tmp_name"], DIRUPLOAD . $filename);
                echo "Stored in: " . DIRUPLOAD . $filename;
            }

            echo "<br/>";
        }
    } else {
        echo "Invalid file"; // Mensaje si el archivo no cumple con las restricciones.
    }
}

// Mostrar las imágenes existentes en la carpeta de subida.
$imagenes = scandir(DIRUPLOAD); // Escanea el contenido de la carpeta de subida.
foreach ($imagenes as $clave => $valor) {
    $temp = explode(".", $valor); // Divide el nombre del archivo para obtener la extensión.
    $extension = end($temp); // Obtiene la extensión del archivo.
    if (in_array($extension, $allowedExts)) { // Comprueba si es una extensión permitida.
        echo "<div>"; // Contenedor para cada imagen.
        echo "<img src='upload/$valor' alt='$valor' style='width:100px;height:auto;'></img>"; // Muestra la imagen con tamaño reducido.
        echo " <a href=\"upload_file.php?del=$valor\">Eliminar</a>"; // Enlace para eliminar la imagen.
        echo "</div>";
    }
}

// Botón para volver a otro formulario o página.
echo "<form action='ejemplo2.php' method='post'>";
echo '<button type="submit" name="volver">Volver</button>'; // Botón con texto 'Volver'.
echo "</form>";
?>
