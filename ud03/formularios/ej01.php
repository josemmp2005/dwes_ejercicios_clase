<?php
/**
 *  Formulario para crear un currículum que incluya: Campos de texto, grupo de 
 * botones de opción, casilla de verificación, lista de selección única, lista de
 * selección múltiple, botón de validación, botón de imagen, botón de reset, etc.
 * autor: José María Mayén Pérez
 */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej01</title>
</head>

<body>
    <h1>Currículum</h1>
    <!-- Campos de texto -->
    <form action="" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" placeholder="" value="" />
        <br><br>

        <label for="apellido1">Apellido1: </label>
        <input type="text" id="apellido1" name="apellido1" placeholder="" value="" />
        <br><br>

        <label for="apellido2">Apellido2: </label>
        <input type="text" id="apellido2" name="apellido2" placeholder="" value="" />
        <br><br>

        <label for="edad">Edad: </label>
        <input type="number" id="edad" name="edad" placeholder="" value="" />
        <br><br>

        <label for="localidad">Localidad: </label>
        <input type="text" id="localidad" name="localidad" placeholder="" value="" />
        <br><br>

        <label>Género: </label>
        <br><br>
        <input type="radio" id="masculino" name="genero" value="masculino">
        <label for="masculino">Masculino</label>
        <br><br>

        <input type="radio" id="femenino" name="genero" value="femenino">
        <label for="femenino">Femenino</label>
        <br><br>

        <!-- Casilla de verificación -->
        <label>Tecnologías:</label>
        <br><br>
        <input type="checkbox" id="php" name="tecnologia" value="php">
        <label for="php">PHP</label>
        <br><br>

        <input type="checkbox" id="js" name="tecnologia" value="js">
        <label for="js">JS</label>
        <br><br>

        <input type="checkbox" id="html" name="tecnologia" value="html">
        <label for="html">HTML</label>
        <br><br>

        <input type="checkbox" id="css" name="tecnologia" value="css">
        <label for="css">CSS</label>
        <br><br>

        <input type="checkbox" id="python" name="tecnologia" value="python">
        <label for="python">PYTHON</label>
        <br><br>

        <!-- Lista de selección única -->
        <label for="educacion">Nivel de educación: </label>
        <select id="educacion" name="educacion">
            <option value="secundaria">Secundaria</option>
            <option value="licenciatura">Licenciatura</option>
            <option value="maestria">Maestría</option>
            <option value="doctorado">Doctorado</option>
        </select>
        <br><br>

        <!-- Lista de selección múltiple -->
        <label for="idiomas">Idiomas: </label>
        <select id="idiomas" name="idiomas" multiple>
            <option value="espanol">Español</option>
            <option value="ingles">Inglés</option>
            <option value="frances">Francés</option>
            <option value="aleman">Alemán</option>
            <option value="italiano">Italiano</option>
        </select>
        <br><br>
        <br><br>

        <!-- Botón de validación -->
        <input type="submit" value="Enviar">
        <br><br>

        <!-- Botón de imagen -->
        <input type="image" src="./ej02_banderas/españa.png" alt="Enviar" width="30">
        <br><br>

        <!-- Botón de reset -->
        <input type="reset" value="Restablecer">
    </form>
</body>

</html>