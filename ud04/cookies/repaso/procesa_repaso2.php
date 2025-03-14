<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])) {
    setcookie('username', $_POST['name'], time() + 60); 
    $_COOKIE['username'] = $_POST['name']; 
}


if (isset($_GET['logout'])) {
    setcookie('username', '', time() - 60); 
    unset($_COOKIE['username']); // Borrar de la variable global
    header("Location: repaso2.php"); 
    exit();
}

// Si la cookie está presente, mostrar el saludo y el botón para borrar la cookie
if (isset($_COOKIE['username'])) {
    echo "¡Bienvenido de nuevo, " . htmlspecialchars($_COOKIE['username']) . "!";
    echo '<br><a href="?logout=true">Borrar cookie</a>';
}else{
    header("Location: repaso2.php"); 
}
?>
