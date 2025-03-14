<?php
/**
 * Crear un script para mostrar la tabla de multiplicar de un número introducido
 * en un formulario.
 * Autor: José María Mayén Pérez
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej03</title>
</head>

<body>
    <h1>Tabla de Multiplicar</h1>
    <form action="" method="post">
        <label for="numero">Introduce un número:</label>
        <input type='number' name='numero' required>
        <input type="submit" name="enviar" value="Mostrar Tabla" />
    </form>

    <?php
    if (isset($_POST['numero'])) {
        $numero = intval($_POST['numero']);
        for ($i = 1; $i <= 10; $i++) {
            $resultado = $numero * $i;
            echo "$i * $numero  = $resultado";
            echo "<br>";
        }
    }
    ?>
</body>

</html>