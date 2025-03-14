<?php
$hobbies = array("futbol", "balonmano", "baloncesto", "tenis");
$paises = array("España", "Francia", "Portugal", "Italia");

if (isset($_POST["enviar"])) {
    // Mostrar hobbies seleccionados
    if (!empty($_POST["hobbies"])) {
        echo "Hobbies seleccionados:<br>";
        foreach ($_POST["hobbies"] as $hobbie) {
            echo htmlspecialchars($hobbie) . "<br>";
        }
    } else {
        echo "No se seleccionaron hobbies.<br>";
    }

    // Mostrar países seleccionados
    if (!empty($_POST["paises"])) {
        echo "Países seleccionados:<br>";
        foreach ($_POST["paises"] as $pais) {
            echo htmlspecialchars($pais) . "<br>";
        }
    } else {
        echo "No se seleccionaron países.<br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Checkboxes y Selección Múltiple</title>
</head>
<body>
    <form action="" method="post">
        <h3>Selecciona tus hobbies:</h3>
        <?php 
            foreach ($hobbies as $hobbie) {
                echo "<label><input type='checkbox' name='hobbies[]' value='" . htmlspecialchars($hobbie) . "'>" . htmlspecialchars($hobbie) . "</label><br>";
            }
        ?>
        <h3>Selecciona tus países preferidos:</h3>
        <select name="paises[]" multiple>
            <?php 
            foreach ($paises as $pais) {
                echo "<option value='" . htmlspecialchars($pais) . "'>" . htmlspecialchars($pais) . "</option>";
            }
            ?>            
        </select>
        <br><br>
        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>
</html>
