<?php
/**
 * Crear y validar un formulario, teniendo arrays de los que salen los campos
 * @author = José María Mayén Pérez
 * @date = 14-11-2024
 */

// Incluimos archivo de configuracion con los arrays y el archivo con las funciones
include("./config/conf.php");
include("./lib/function.php");

// Inicialización de las variables
$nombre = $email = $comentarios = $url = $idioma = "";
$nombreError = $emailError = $generoError = $comentariosError = $urlError = $cocheError= $vehiculosError = $idiomaError = $coloresError = "";
$genero = $aGenero[1];
$confirmado1 = $confirmado2 = $seleccionado1 = $seleccionado2 = "";
/* Creo las variables qeu seran arrays proximamente */
$coche = array();
$vehiculos = array();
$colores = array();

// Inicializo variables booleanas para procesar el formulario
$lProcesaFormulario = false;
$errorValidacion = false;

// Compruebo que el formulario se ha enviado
if (isset($_POST['enviar'])){
    // El procesa lo paso a true y empiezo a leer variables y comprobar errores
    $lProcesaFormulario = true;
    $nombre = clearData($_POST['nombre']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $comentarios = clearData($_POST['comentarios']);
    $url = clearData($_POST['url']);


    // Validamos el genero
    if (isset($_POST['genero'])){
        $genero = $_POST['genero'];
    } else{
        $generoError = "El campo de genero no puede estar vacio";
        $errorValidacion = true;
    }

    // Validamos el idioma
    if (isset($_POST['idioma'])){
        $idioma = $_POST['idioma'];
    } else{
        $generoError = "El campo de idioma no puede estar vacio";
        $errorValidacion = true;
    }

    // Validamos el vehiculos
    if (isset($_POST['vehiculos'])){
        $vehiculos = $_POST['vehiculos'];
    } else{
        $vehiculosError = "El campo de vehiculos no puede estar vacio";
        $errorValidacion = true;
    }

    // Validamos los colores
    if (isset($_POST['colores'])){
        $colores = $_POST['colores'];
    } else{
        $coloresError = "El campo de colores no puede estar vacio";
        $errorValidacion = true;
    }

    // Validamos los coches
    if (isset($_POST['coches'])){
        $coche = $_POST['coches'];
    } else{
        $cocheError = "El campo de coches no puede estar vacio";
        $errorValidacion = true;
    }

    // Validamos el nombre
    if (empty($nombre)){
        $nombreError = "El campo nombre no puede estar vacio";
        $errorValidacion = true;
    }

    // Validamos el email
    if (empty($email)){
        $emailError = "El campo email no puede estar vacio";
        $errorValidacion = true;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailError = "El formato del email no es valido";
        $errorValidacion = true;
    }

    // Validamos la url
    if (empty($url)){
        $urlError = "El campo de url no puede estar vacio";
        $errorValidacion = true;
    }

    // Validamos los comentarios
    if (empty($comentarios)){
        $comentariosError = "El campo de comentarios no puede estar vacio";
        $errorValidacion = true;
    }
}

// Si hemos tenido algun error al validar no mostraremos los datos y le devolveremos al formulario
if($errorValidacion){
    $lProcesaFormulario = false;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario</title>
        <style>
            .error{
                color: red;
            }
        </style>
    </head>
    <body>
        <h1>Validación Formularios</h1>
        <?php
            /*Proceso el formulario y muestro los datos */
            if ($lProcesaFormulario){
                echo "Nombre: $nombre </br>";
                echo "Email: $email </br>";
                echo "Url: $url </br>";
                echo "Comentarios: $comentarios </br>";
                echo "Genero: $genero </br>";
                echo "Vehiculos:";
                foreach ($coche as $clave => $valor){
                    echo "$valor ";
                }
                echo "</br>Colores:";
                foreach ($colores as $clave => $valor){
                    echo "$valor ";
                }
            } else{
        ?>
        <p class="error">* Campos requeridos</p>
        <form action="" method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $nombre ?>"/><span class="error"><?php echo "* " . $nombreError ?></span></br>
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $email ?>"/><span class="error"><?php echo "* " . $emailError ?></span></br>
            <label>Url:</label>
            <input type="text" name="url" value="<?php echo $url ?>"/><span class="error"><?php echo "* " . $urlError ?></span></br>
            <label>Comentarios:</label>
            <textarea name="comentarios"><?php echo $comentarios ?></textarea><span class="error"><?php echo "* " . $comentariosError ?></span></br>
            <fieldset>
                <legend>Género <span class="error"><?php  echo "*" ?></span></legend>
            <?php
                /*Recorro el array de generos del conf.php */
                foreach ($aGenero as $clave => $valor){
                    $confirmado1 = $valor == $genero?"checked":"";
                    echo "<input type='radio' name='genero' value='$valor' $confirmado1/>$valor";
                }
            ?>
            </fieldset>
            <span class="error"><?php echo " " . $generoError ?></span></br>
            <label>Vehiculos:</label>
            <?php
                /*Recorro el array de vehiculos del conf.php */
                foreach($aVehiculos as $clave => $valor){
                    $confirmado2 = in_array($valor, $vehiculos)?"checked":"";
                    echo "<input type='checkbox' name='vehiculos[]' value='$valor' $confirmado2/> $valor";
                }
            ?><span class="error"><?php echo "* " . $vehiculosError ?></span></br>
            <label>Coches:</label>
            <?php
                /*Recorro el array de coches del conf.php */
                foreach($aCoches as $clave => $valor){
                    $confirmado3 = in_array($valor, $coche)?"checked":"";
                    echo "<input type='checkbox' name='coches[]' value='$valor' $confirmado3/> $valor";
                }
            ?><span class="error"><?php echo "* " . $cocheError ?></span></br>

            <label>Nivel ingles:</label>
            <select name="idioma">
                <?php
                    /*Recorro el array de vehiculos del conf.php */
                    foreach($aIdiomas as $clave => $valor){
                        $seleccionado2 = $idioma == $valor?"selected":"";
                        echo "<option value='$valor' $seleccionado2/> $valor";
                    }
                ?>
            </select><span class="error"><?php echo "* " . $idiomaError ?></span></br>

            <label>Colores:</label>
            <select name="colores[]" multiple>
                <?php
                    /*Recorro el array de colores del conf.php */
                    foreach ($aColores as $clave => $valor) {
                        foreach ($valor as $color => $valor2) {
                            if ($color != "codigo") {
                                $seleccionado1 = in_array($valor2, $colores)?"selected":"";
                                echo "<option value='$valor2' $seleccionado1> $valor2</option>";
                            }
                        }
                    }
                ?>
            </select> <span class="error"><?php echo "* " . $coloresError ?></span></br>
            <button type="submit" name="enviar">Enviar</button>
        </form>
        <?php
            }
        ?>
    </body>
</html>