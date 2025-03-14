<?php
/**
 * Escenario: Puzles infantiles.
 * Se debe crear una aplicación que permita resolver puzles infantiles de tres
 * piezas. Se adjunta fichas de ejemplo, pero es necesario que personalices las
 * fichas del rompecabezas.
 * 
 * @author José María Mayén Pérez <email>
 */

require_once("conf/conf.php");
session_start();

// Inicializar piezas si no existen en la sesión
if (!isset($_SESSION['cabeza'], $_SESSION['cuerpo'])) {
    $_SESSION['cabeza'] = array_rand($aPuzzle);
    $_SESSION['cuerpo'] = $aPuzzle[$_SESSION['cabeza']];
}

// Procesar clic en las imágenes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cambiar_cabeza'])) {
        // Cambiar cabeza aleatoriamente
        $_SESSION['cabeza'] = array_rand($aPuzzle);
    }
    if (isset($_POST['cambiar_cuerpo'])) {
        // Cambiar cuerpo aleatoriamente
        $cuerpos = array_values($aPuzzle);
        $_SESSION['cuerpo'] = $cuerpos[array_rand($cuerpos)];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolución de Puzzles</title>
</head>
<body>
    <h1>Resolución de Puzzles</h1>
    <form action="" method="post">
        <button type="submit" name="cambiar_cabeza">
            <img src="img/<?php echo $_SESSION['cabeza']; ?>" alt="Cabeza">
        </button>
        <br>

        <button type="submit" name="cambiar_cuerpo">
            <img src="img/<?php echo $_SESSION['cuerpo']; ?>" alt="Cuerpo">
        </button>
        <br>

        <input type="submit" value="Resolver" name="resolver">
    </form>

    <?php
    // Validar si la combinación es correcta al presionar "Resolver"
    if (isset($_POST['resolver'])) { 
        if ($_SESSION['cabeza'] === array_search($_SESSION['cuerpo'], $aPuzzle)) {
            echo "<p>¡Correcto! Has resuelto el puzle.</p>";
            session_unset(); // Reiniciar juego
        } else {
            echo "<p>¡Incorrecto! Intenta de nuevo.</p>";
        }
    }
    ?>
</body>
</html>
