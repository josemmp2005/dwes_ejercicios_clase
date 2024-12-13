<?php
/**
 * 1. Crea un sistema básico de autenticación en PHP. El objetivo es permitir que los
 *  usuarios se autentiquen con un nombre de usuario y una contraseña para acceder al
 *  área protegida.
 *  Utiliza un array de configuración para almacenar los usuarios registrados en el
 * sistema.
 * Si no estamos autenticados en el sistema, la página de inicio mostrará: formulario de
 * login, información pública de inicio y menú de navegación por la zona pública.
 * Si estamos autenticados en el sistema, la página de inicio mostrará: información de
 * usuario con opción de cierre de sesión, hora de inicio de sesión, información pública
 * de inicio y menú de navegación por la zona pública y privada.
 * Las páginas de la aplicación solo deben mostrar un mensaje indicando si son públicas
 * o privadas.
 * 
 */

require_once("conf/conf.php");

session_start();

// Configuración de usuarios registrados

// Función para verificar si el usuario está autenticado
function isAuthenticated() {
    return isset($_SESSION['username']);
}

// Procesar el formulario de login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($aUsuarios[$username]) && $aUsuarios[$username] === $password) {
        $_SESSION['username'] = $username;
        $_SESSION['login_time'] = date('Y-m-d H:i:s');
        header('Location: index.php');
        exit;
    } else {
        $error = 'Nombre de usuario o contraseña incorrectos.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Autenticación</title>
</head>
<body>
    <h1>Bienvenido al Sistema</h1>

    <?php if (isAuthenticated()): ?>
        <p>Hola, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        <p>Inicio de sesión: <?php echo $_SESSION['login_time']; ?></p>
        <a href="logout.php">Cerrar sesión</a>
        <nav>
            <ul>
                <li><a href="public.php">Página Pública</a></li>
                <li><a href="private.php">Página Privada</a></li>
            </ul>
        </nav>
    <?php else: ?>
        <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
        <form method="post" action="">
            <label for="username">Nombre de usuario:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Iniciar sesión</button>
        </form>
        <nav>
            <ul>
                <li><a href="public.php">Página Pública</a></li>
            </ul>
        </nav>
    <?php endif; ?>


</body>
</html>
