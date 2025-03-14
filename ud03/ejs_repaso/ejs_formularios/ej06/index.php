        <?php 
/**
 * Crea un formulario que actúe como una calculadora básica (suma, resta,
 * multiplicación y división). El usuario debe ingresar dos números y seleccionar la
 * operación que desea realizar. Cuando el formulario se envíe, muestra el
 * resultado en la misma página.
 * 
 * @author José María Mayén Pérez <email>
 */

$operaciones = array("+", "-", "*", "/");

$resultado = "";

if (isset($_POST["enviar"])) {
    $numero1 = (float)$_POST["numero1"];
    $numero2 = (float)$_POST["numero2"];
    $operacion = $_POST["operation"];

    if ($operacion == "+") {
        $resultado = $numero1 + $numero2;
    } else if ($operacion == "-") {
        $resultado = $numero1 - $numero2;
    } else if ($operacion == "*") {
        $resultado = $numero1 * $numero2;
    } else if ($operacion == "/") {
        if ($numero2 != 0) {
            $resultado = $numero1 / $numero2;
        } else {
            $resultado = "Error: División por cero no permitida.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Básica</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="numero1" required>
        <select name="operation" required>
            <?php
                foreach ($operaciones as $operacion) {
                    echo "<option value=\"$operacion\">$operacion</option>";
                }         
            ?>
        </select>
        <input type="number" name="numero2" required>
        <button type="submit" name="enviar">Calcular</button>
    </form>

    <?php if ($resultado !== ""): ?>
        <p>Resultado: <?= htmlspecialchars($resultado) ?></p>
    <?php endif; ?>
</body>
</html>
