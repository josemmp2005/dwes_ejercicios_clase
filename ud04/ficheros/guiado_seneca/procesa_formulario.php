<?php
/**


*/
include "./config/config.php";


if (!isset($_POST["enviar"])) {
    header("Location: test2.php");
} else {
    $temp = explode(".", $_FILES["file"]["name"]); // file es el nombre del input
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
            $filename = uniqid() . '.' . pathinfo($filename, PATHINFO_EXTENSION); // Codificamos el nombre del fichero en el servidor

            if (file_exists(DIRUPLOAD . $filename)) {
                echo $_FILES["file"]["name"] . " already exists. ";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], DIRUPLOAD . $filename);
            }
            echo "<br/>";
            //Volver desde PHP
            echo "<a href=\"" . $_SERVER['HTTP_REFERER'] . "\">Volver</a>"; // No se recomienda.
            //Volver desde JavaScript
            echo '<a href="javascript:history.back()">Volver</a>';
        }
    }
}

$grupo = $_POST['grupo'];
$curso = $_POST['curso'];
$formato = $_POST['formato'];

echo $grupo . '<br/>';
echo $curso . '<br/>';
echo $formato . '<br/>';

?>