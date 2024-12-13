<?php
/**
 * Formulario para crear un currículum que incluya: Campos de texto, grupo de botones de opción, casilla de verificación, lista de selección única, lista de selección múltiple, botón de validación, botón de imagen, botón de reset, etc.
 * @author Kike MJ 
 */
// Incluimos archivos de configuración
include("./config/config.php");
include("./lib/function.php");

// Inicializamos las variables
$nombre = $email = $telefono = $comentarios = $nivelEstudio = $imagenSeleccionada = "";
$nombreError = $emailError = $telefonoError = $idiomaError = $nivelEstudioError = $disponibilidadError = $claseError = $coloresError = $comentariosError = $generoError = $imagenError = "";
$genero = $aGenero[1];
$confirmado1 = $confirmado2 = $confirmado3 = $confirmado4 = $seleccionado1 = $seleccionado2 = "";
// Creo las variables que serán arrays proximamente
$idioma = array();
$disponibilidad = array();
$clases = array();
$colores = array();

// Iniciamos variables booleanas para procesar el formulario
$lProcesaFormulario = false;
$errorValidacion = false;

// Compruebo si el formulario se ha enviado
if (isset($_POST['enviar'])) {
    // Procesa lo paso a true y empiezo a leer variables y comprobar errores
    $lProcesaFormulario = true;
    $nombre = clearData($_POST['nombre']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $comentarios = clearData($_POST['comentarios']);

    // Validamos el género
    if (isset($_POST['genero'])) {
        $genero = $_POST['genero'];
    } else {
        $generoError = "El campo de género no puede estar vacío";
        $errorValidacion = true;
    }


    // Validación teléfono
    if (isset($_POST['telefono']) && preg_match('/^[0-9]{8,15}$/', $_POST['telefono'])) {
        $telefono = $_POST['telefono'];
    } else {
        $telefonoError = "El teléfono debe tener entre 8 y 15 dígitos.";
        $errorValidacion = true;
    }

    // Validamos el idioma
    if (isset($_POST["idioma"])) {
        $idioma = $_POST['idioma'];
    } else {
        $idiomaError = "El campo idioma no puede estar vacío";
        $errorValidacion = true;
    }


    // Validación nivel de estudio
    if (isset($_POST["nivel"])) {
        $nivelEstudio = $_POST['nivel'];
    } else {
        $nivelEstudioError = "El campo nivel de estudio no puede estar vacío";
        $errorValidacion = true;
    }

    // Validamos clase
    if (isset($_POST["clase"])) {
        $clases = $_POST["clase"]; // Guardar todas las clases seleccionadas en el array $clases
    } else {
        $claseError = "Debes seleccionar al menos una clase.";
        $errorValidacion = true;
    }

    // Validamos colores
    if (isset($_POST["colores"])) {
        $colores = $_POST["colores"];
    } else {
        $coloresError = "El campo colores no puede estar vacío";
        $errorValidacion = true;
    }

    // Validamos disponibilidad
    if (isset($_POST["disponibilidad"])) {
        $disponibilidad = $_POST['disponibilidad'];
    } else {
        $disponibilidadError = "El campo disponibilidad no puede estar vacío";
        $errorValidacion = true;
    }

    // Validamos nombre
    if (empty($nombre)) {
        $nombreError = "El campo noombre no puede estar vacío";
        $errorValidacion = true;
    }

    // Validamos el email
    if (empty($email)) {
        $emailError = "El campo email no puede estar vacío";
        $errorValidacion = true;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "El formato del email no es válido";
        $errorValidacion = true;
    }

    // Validamos los comentarios 
    if (empty($comentarios)) {
        $comentariosError = "El campo comentarios no puede estar vacío";
        $errorValidacion = true;
    }

    // Validación imagen
    if (isset($_POST['imagen'])) {
        // Obtener la imagen seleccionada
        $imagenSeleccionadaId = $_POST['imagen'];
        foreach ($aImagenes as $imagen) {
            if ($imagen['id'] == $imagenSeleccionadaId) {
                $imagenSeleccionada = $imagen;
                break;
            }
        }
    } else {
        $imagenError = "Debes seleccionar una imagen.";
    }
}

// Si tenemos algún error al validar no mostramos los datos y devolvemos al formulario
if ($errorValidacion) {
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
        .error {
            color: red;
        }

        .image-container img {
            width: 150px;
            /* Ajusta el tamaño de la imagen */
            height: auto;
            margin-right: 10px;
            /* Espaciado entre imágenes */
        }
    </style>
</head>

<body>
    <h1>Validación Formulario</h1>
    <?php
    // Proceso el formulario y muestro los datos
    if ($lProcesaFormulario) {
        echo "Nombre: $nombre<br>";
        echo "Email: $email<br>";
        echo "Teléfono: $telefono<br>";
        echo "Comentarios: $comentarios<br>";
        echo "Género: $genero<br>";
        echo "Nivel de estudios: $nivelEstudio<br>";

        // Disponibilidad en una línea
        echo "Disponibilidad: " . implode(", ", $disponibilidad) . "<br>";

        // Clases en una línea
        echo "Clases: " . implode(", ", $clases) . "<br>";

        // Colores en una línea
        echo "Colores: " . implode(", ", $colores) . "<br>";

        if ($imagenSeleccionada) {
            echo "<h2>Imagen seleccionada:</h2>";
            echo "<img src='{$imagenSeleccionada['ruta']}' alt='{$imagenSeleccionada['descripcion']}' style='width:300px; height:auto;'>";
        }
    } else {
        ?>
        <p class="error">* Campos requeridos</p>
        <form action="" method="post">
            <div>
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $nombre ?>" />
                <span class="error"><?php echo "* " . $nombreError ?></span>
            </div>

            <div>
                <label>Email:</label>
                <input type="text" name="email" value="<?php echo $email ?>" />
                <span class="error"><?php echo "* " . $emailError ?></span>
            </div>

            <div>
                <label>Teléfono:</label>
                <input type="text" name="telefono" value="<?php echo $telefono ?>" />
                <span class="error"><?php echo "* " . $telefonoError ?></span>
            </div>

            <div>
                <label>Comentarios:</label>
                <textarea name="comentarios"><?php echo $comentarios ?></textarea>
                <span class="error"><?php echo "* " . $comentariosError ?></span>
            </div>

            <div>
                <fieldset>
                    <legend>Género:</legend>
                    <?php
                    foreach ($aGenero as $key => $value) {
                        $confirmado1 = $value == $genero ? "checked" : "";
                        echo "<input type='radio' name='genero' value='$value' $confirmado1/> $value";
                    }
                    ?>
                    <span class="error"><?php echo $generoError ?></span>
                </fieldset>
            </div>

            <div>
                <label>Idioma:</label>
                <?php
                foreach ($aIdiomas as $key => $value) {
                    $confirmado2 = in_array($value, $idioma) ? "checked" : "";
                    echo "<input type='checkbox' name='idioma[]' value='$value' $confirmado2/> $value";
                }
                ?>
                <span class="error"><?php echo "* " . $idiomaError ?></span>
            </div>

            <div>
                <label>Nivel de estudios:</label>
                <?php
                foreach ($anivelEstudio as $key => $value) {
                    $confirmado3 = $value == $nivelEstudio ? "checked" : "";
                    echo "<input type='radio' name='nivel' value='$value' $confirmado3/> $value";
                }
                ?>
                <span class="error"><?php echo "* " . $nivelEstudioError ?></span>
            </div>

            <div>
                <label>Clases:</label>
                <select name="clase[]" multiple>
                    <?php
                    foreach ($aClase as $key => $value) {
                        foreach ($value as $clase => $value2) {
                            if ($clase != "codigo") {
                                $seleccionado1 = in_array($value2, $clases) ? "selected" : "";
                                echo "<option value='$value2' $seleccionado1>$value2</option>";
                            }
                        }
                    }
                    ?>
                </select>
                <span class="error"><?php echo "* " . $claseError ?></span>
            </div>

            <div>
                <label>Colores:</label>
                <select name="colores[]" multiple>
                    <?php
                    /*Recorro el array de colores del conf.php */
                    foreach ($aColores as $clave => $valor) {
                        foreach ($valor as $color => $valor2) {
                            if ($color != "codigo") {
                                $seleccionado2 = in_array($valor2, $colores) ? "selected" : "";
                                echo "<option value='$valor2' $seleccionado2> $valor2</option>";
                            }
                        }
                    }
                    ?>
                </select> <span class="error"><?php echo "* " . $coloresError ?></span></br>

            </div>

            <div>
                <label>Disponibilidad:</label>
                <?php
                foreach ($aDisponibilidad as $key => $value) {
                    $confirmado4 = in_array($value, $disponibilidad) ? "checked" : "";
                    echo "<input type='checkbox' name='disponibilidad[]' value='$value' $confirmado4/> $value";
                }
                ?>
            </div>

            <div>
                <label>Selecciona una imagen:</label><br>
                <?php
                // Mostrar las imágenes como radio buttons
                foreach ($aImagenes as $imagen) {
                    $checked = (isset($_POST['imagen']) && $_POST['imagen'] == $imagen['id']) ? "checked" : "";
                    echo "<input type='radio' name='imagen' value='{$imagen['id']}' $checked />";
                    echo "<img src='{$imagen['ruta']}' alt='{$imagen['descripcion']}' style='width:100px;height:auto; margin-right:10px;' />";
                }
                ?>
                <br>
                <span class="error"><?php echo $imagenError; ?></span>
            </div>

            <div>
                <button type="submit" name="enviar">Enviar</button>
            </div>
        </form>
        <?php
    }
    ?>
</body>

</html>