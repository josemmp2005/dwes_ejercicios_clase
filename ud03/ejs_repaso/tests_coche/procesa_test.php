<?php
include "./config/tests_cnf.php";

$preguntas = []; // Declara la variable fuera del bloque if para que esté disponible en el HTML

if (isset($_POST["enviar"])) {
    $testId = $_POST["test"];
    $rutaImagen = 'dir_img_test' . $aTests[$testId]['idTest'] . "/";

    foreach ($aTests as $test) {
        if ($test["idTest"] == $testId) {
            $preguntas = $test["Preguntas"]; // Asigna todas las preguntas para su uso posterior
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <h1><?php echo  " Test " . $_POST["test"]; ?></h1>
    <form action="" method="post">
        <?php 
        if (!empty($preguntas)) {
            foreach ($preguntas as $pregunta) {                
                echo "<p><strong>" . htmlspecialchars($pregunta["Pregunta"]) . "</strong></p>";
                $img = $rutaImagen . 'img' . $pregunta['idPregunta'] . '.jpg';

                if (file_exists($img)) {
                    echo '<img src="' . $img . '" alt="imagen de pregunta"><br>';
                }

                foreach ($pregunta["respuestas"] as $respuesta) {
                    echo '<input type="radio" name="respuesta[' . htmlspecialchars($pregunta["Pregunta"]) . ']" value="' . htmlspecialchars($respuesta) . '">';
                    echo htmlspecialchars($respuesta) . "<br>";
                }
            }
        }
        ?>
        <button type="submit" name="corregir">corregir</button>
    </form>

<?php
    if(isset($_POST["corregir"])){
       $a = $_POST["respuesta"];
       echo $a;
    }
?>



</body>
</html>
