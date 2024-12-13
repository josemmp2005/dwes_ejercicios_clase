<?php
/**
 * @author = Jose María Mayen Pérez
 * @date = 31-10-2024 
 */
// Defino la carpeta donde se guarda y el maximo de tamaño del archivo
define("DIRUPLOAD", "./upload/");
define("MAXSIZE", 200000);

// Compruebo que se ha mandado el eliminar
if (isset($_GET['del'])) {
    $fileToDelete = DIRUPLOAD . basename($_GET['del']);
    if (file_exists($fileToDelete)) {
        unlink($fileToDelete);
        echo "El archivo " . htmlspecialchars($_GET['del']) . " ha sido eliminado.<br/>";
    } else {
        echo "El archivo no existe.<br/>";
    }
}

// Declaro las extensiones y formatos válidos
$allowedExts = array("gif", "jpeg", "jpg", "png");
$allowedFormats = array("image/gif", "image/jpeg", "image/jpg", "image/x-png", "image/png");

// Obtenemos la extension del archivo   
if (isset($_FILES["file"])) {
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);

    if (($_FILES['file']['size'] < MAXSIZE) && in_array($_FILES['file']['type'], $allowedFormats) && in_array($extension, $allowedExts)) {
        if ($_FILES['file']['error'] > 0) {
            echo "Return code: " . $_FILES['file']['error'] . "<br/>";
        } else {
            $filename = $_FILES["file"]["name"];
            $filename = uniqid() . "." . pathinfo($filename, PATHINFO_EXTENSION);

            echo "Upload: " . $_FILES["file"]["name"] . "<br/>";
            echo "Type: " . $_FILES["file"]["type"] . "<br/>";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . "kB <br/>";
            echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br/>";

            if (file_exists(DIRUPLOAD . $filename)) {
                echo $_FILES["file"]["name"] . " already exists. ";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], DIRUPLOAD . $filename);
                echo "Stored in: " . DIRUPLOAD . $filename;
            }

            echo "<br/>";
        }
    } else {
        echo "Invalid file";
    }
}

// Mostrar las imágenes existentes
$imagenes = scandir(DIRUPLOAD);
foreach ($imagenes as $clave => $valor) {
    $temp = explode(".", $valor);
    $extension = end($temp);
    if (in_array($extension, $allowedExts)) {
        echo "<div>";
        echo "<img src='upload/$valor' alt='$valor' style='width:100px;height:auto;'></img>";
        echo " <a href=\"upload_file.php?del=$valor\">Eliminar</a>";
        echo "</div>";
    }
}

echo "<form action='prueba2.php' method='post'>";
echo '<button type="submit" name="volver">Volver</a>'; // Mejor.
echo "</form>";
?>
