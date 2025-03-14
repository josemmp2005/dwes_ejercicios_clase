<?php
/**
 * Ejemplo de uso de sesiones para manejo de una agenda de contactos.
 * @author José María Mayén Pérez
 */

session_start();

// Inicializamos la sesión de contactos si no existe
if (!isset($_SESSION["contacts"])) {
    $_SESSION["contacts"] = [];
}

// Eliminamos un contacto si se envía la solicitud
if (isset($_GET['eliminar'])) {
    $indice = $_GET['eliminar'];
    if (isset($_SESSION["contacts"][$indice])) {
        unset($_SESSION["contacts"][$indice]);
        $_SESSION["contacts"] = array_values($_SESSION["contacts"]); // Reindexar el array
    }
}

// Añadimos un nuevo contacto si se envía el formulario
if (isset($_POST["enviar"])) {
    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $tfno = trim($_POST["tfno"]);

    // Validaciones
    if (!empty($nombre) && !empty($email) && !empty($tfno) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["contacts"][] = [
            "nombre" => $nombre,
            "email" => $email,
            "tfno" => $tfno,
        ];
    }
}

$data = $_SESSION["contacts"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contactos</title>
</head>
<body>
    <h1>Agenda</h1>
    <h2>Nuevo Contacto</h2>
    <form action="" method="post">
        Nombre: <input type="text" name="nombre" required><br>
        Email: <input type="email" name="email" required><br>
        Teléfono: <input type="text" name="tfno" required><br>
        <input type="submit" value="Añadir Contacto" name="enviar">
    </form>
    <h2>Lista de Contactos</h2>
    <ul>
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $key => $contact): ?>
                <li>
                    <?php echo htmlspecialchars($contact["nombre"]); ?> - 
                    <?php echo htmlspecialchars($contact["email"]); ?> - 
                    <?php echo htmlspecialchars($contact["tfno"]); ?>
                    <a href="?eliminar=<?php echo $key; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este contacto?');">Eliminar</a>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay contactos en la agenda.</p>
        <?php endif; ?>
    </ul>
    <br>
    <a href="cierre.php">Cerrar sesión</a>
</body>
</html>
