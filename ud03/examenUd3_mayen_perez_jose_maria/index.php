<?php
/**
 * Examen UD03
 * 
 * 
 * @author José María Mayén Pérez <a23mapejo@gmail.com>
 */

require_once "./conf/conf.php";

$testId = 0;
$correccion = array();
$numeroPreguntas = 5;


if (isset($_POST["seleccionar"])) {
    $testId = $_POST["testSeleccionado"];
    // echo $testId;
}

$respuestasUsuario = array();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Tests Geografia</h1>
    <form action="" method="post">
        <select name="testSeleccionado" id="">
            <?php
            foreach ($aExamenes as $examen) {
                $idTest = $examen["idTest"];
                echo "<option value='$idTest'> Test " . $idTest . "</option>";
            }

            ?>
        </select>
        <br>
        <br>
        <button type="submit" name="seleccionar">Seleccionar</button>
    </form>
    <br>
    <form action="" method="post">
        <?php
        if (isset($_POST["seleccionar"])) {
            foreach ($aExamenes as $examen) {
                if ($examen["idTest"] == $testId) {
                    $correccion = $examen["Correccion"];
                    // var_dump(value: $correccion);
        
                    foreach ($examen["Preguntas"] as $pregunta) {
                        echo $pregunta["Pregunta"] . "<br>";
                        foreach ($pregunta["respuestas"] as $respuesta) {
                            if ($pregunta["Tipo"] == "checkbox") {
                                echo "<input type='checkbox' name=" . $pregunta["idPregunta"] . "[] value='$respuesta' /> $respuesta";
                                echo "<br/>";
                            } else if ($pregunta["Tipo"] == "radio") {
                                echo "<input type='radio' name='" . $pregunta["idPregunta"] . "' value='" . $respuesta[0] . "'>" . $respuesta;
                                echo "<br/>";
                            } else if ($pregunta["Tipo"] == "text") {
                                echo "<input type='text' name='" . $pregunta["idPregunta"] . "' value=''>";
                                echo "<br/>";
                            }
                        }
                    }
                }
            }
        }
        echo "<br/>";
        echo "<input type='hidden' name='testSeleccionado' value='$testId'>";
        echo "<button type='submit' name='enviar'>Enviar</button>";

     echo "</form>";

    $aciertos = 0;
    $fallos = 0;
    echo $_POST["testSeleccionado"];
    if (isset($_POST["enviar"])) {
        for ($i = 0; $i <= $numeroPreguntas; $i++) {
            if (isset($_POST["$i"]) && $_POST["$i"] !== "") {
                $respuesta = $_POST["$i"];
            } else {
               $respuesta = " ";
            }

            array_push($respuestasUsuario, $respuesta);

            // var_dump($respuesta);
    
        }
        // var_dump($respuestasUsuario);
        var_dump($respuestasUsuario);
        echo "<br/>";
        echo "<br/>";
        echo "<br/>";
        echo "<br/>";
        var_dump($correccion);
        for($i=0; $i <= $numeroPreguntas; $i++){

            // if($respuestasUsuario[$i] == $correccion[$i]){
            //     $aciertos++;
            // }else{
            //     $fallos++;
            // }
        }
        echo "Aciertos: " . $aciertos . "<br>";
        echo "Fallos: " . $fallos . "<br>";
    }
    ?>
</body>

</html>