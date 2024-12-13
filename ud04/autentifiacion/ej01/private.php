<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Privada</title>
</head>
<body>
    <h1>Página Privada</h1>
    <p>Solo los usuarios autenticados pueden ver esta página.</p>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>
