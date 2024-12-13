<?php
// Directorio donde están las comandas
$directory = "comandas/";
$pendingFiles = [];

// Abrir el directorio y leer archivos
if ($handle = opendir($directory)) {
    while (($file = readdir($handle)) !== false) {
        if (is_file($directory . $file) && strpos($file, "_elaborada") === false) {
            $pendingFiles[] = $file;
        }
    }
    closedir($handle);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['file'])) {
    // Renombrar el archivo seleccionado
    $file = $_POST['file'];
    $timestamp = date("Ymd_His"); // Fecha y hora actual
    $newName = "comanda_{$timestamp}_elaborada.txt";
    rename($directory . $file, $directory . $newName);
    header("Location: " . $_SERVER['PHP_SELF']); // Recargar la página
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Comandas</title>
</head>
<body>
    <h1>Gestión de Comandas</h1>
    <h2>Comandas Pendientes</h2>
    <ul>
        <?php foreach ($pendingFiles as $file): ?>
            <li>
                <?= htmlspecialchars($file) ?>
                <form action="" method="post" style="display:inline;">
                    <input type="hidden" name="file" value="<?= htmlspecialchars($file) ?>">
                    <button type="submit">Marcar como Elaborada</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
