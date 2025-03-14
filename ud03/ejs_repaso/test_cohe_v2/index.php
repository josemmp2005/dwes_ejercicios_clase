<?php
/**
 * * Actividades 1.
 * Ejercicio 1.
 * Escenario: Desarrollo de un sistema de test online para una autoescuela.
 * Los test se encuentran almacenados en un array asociativo dentro de un directorio de configuración.
 * Cada test utiliza un directorio para almacenar las fotos que necesita. El nombre de la carpeta es la concatenación de la cadena img y el número de test. Por ejemplo, para el test 1 las imágenes se guardan en el directorio img1. El nombre de cada foto coincide con el número de pregunta.
 * T  areas.
 * ➢ Incorpora el array de test desde el directorio de configuración.
 * ➢ Genera dinámicamente un formulario para que los alumn@s puedan realizar el test.
 * ➢ El sistema debe detectar si existe imagen asociada a la pregunta para mostrarla.
 * ➢ Procesa el formulario de manera que la aplicación informe del número de aciertos y utilice un código de colores para indicar si se ha superado el examen. El test se considera superado si no se han cometido más de dos errores.
 * ➢ Cuando el alumn@ conecta con la aplicación el sistema le indicará el último test realizado y mostrará el siguiente para su realización.
 * ➢ Incorpora a la aplicación un botón que permita al alumn@ empezar a realizar los test desde el principio.
 * ➢ Aplica criterios de usabilidad en el diseño.
 */

include("./config/tests_cnf.php");

$testId = 0;
$correccion = array();

if (isset($_POST["seleccionar"])) {
    $testId = $_POST["testSeleccionado"];
}

$respuestasUsuario = array();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tests Coche</title>
</head>

<body>
    <h1>Tests Coche</h1>
    <form action="" method="post">
        <select name="testSeleccionado" id="">
            <?php
            foreach ($aTests as $test) {
                $idTest = $test["idTest"];
                $permiso = $test["Permiso"];
                $categoria = $test["Categoria"];
                echo "<option value='$idTest'> Test $idTest - $permiso - $categoria</option>";
            }
            ?>
        </select>
        <br><br>
        <button type="submit" name="seleccionar">Seleccionar</button>
        <br>
    </form>
    <br>
    <form action="" method="post">
        <?php
        if (isset($_POST["seleccionar"])) {
            foreach ($aTests as $test) {
                if ($test["idTest"] == $testId) {
                    $correccion = $test["Corrector"];
                    foreach ($test["Preguntas"] as $pregunta) {
                        echo $pregunta["Pregunta"] . "<br>" ;
                        echo "<br>";
                        $rutaImagen = "./dir_img_test" . $testId . "/img" . $pregunta["idPregunta"] . ".jpg";
                        
                        if(file_exists($rutaImagen)){
                            echo "<img src='$rutaImagen' alt=''>";
                        }
                        echo "<br>";
                        foreach ($pregunta["respuestas"] as $respuesta) {
                            echo "<input type='radio' name='" . $pregunta["idPregunta"] . "' value='" . $respuesta[0] . "'>" . $respuesta;
                            echo "<br>";
                        }
                        echo "<br>";
                    }
                    echo "<input type='hidden' name='testSeleccionado' value='$testId'>";
                    echo "<button type='submit' name='enviar'>Enviar</button>";
                    break;
                }
            }
        }
        ?>
    </form>

    <?php


     if (isset($_POST["enviar"])) {
     
         for ($i = 1; $i <= 10; $i++) {
             if (isset($_POST["$i"]) && $_POST["$i"] !== "") {
                 $respuesta = $_POST["$i"];
             } else {
                $respuesta = " ";
             }

             array_push($respuestasUsuario, $respuesta);
             // var_dump($respuesta);

         }

        
         var_dump($test["Corrector"]);
         // var_dump( $correccion);
         echo "<br>";
         var_dump($respuestasUsuario);
         echo  "<br>";

         for($i=0; $i< count($correccion); $i++){
             if($respuestasUsuario[$i] == $correccion[$i]){
                 $aciertos++;
             }else{
                 $fallos++;
             }
         }
         echo "Aciertos: " . $aciertos . "<br>";
         echo "Fallos: " . $fallos . "<br>";
     }
 
 ?>
    ?>
</body>

</html>
