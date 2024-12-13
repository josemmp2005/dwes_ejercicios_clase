<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form action="" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?php if (isset($_COOKIE['nombre'])) { echo $_COOKIE['nombre']; } ?>">
        <br>
        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena" id="contrasena" value="<?php if (isset($_COOKIE['contrasena'])) { echo $_COOKIE['contrasena']; } ?>">
        <br>
        <label for="guardar">Deseas guardar la contraseña</label>
        <input type="checkbox" name="guardar" id="guardar">
        <br><br>
        <input type="submit" name="enviar" value="Enviar">
        <input type="submit" name="borrar" value="Borrar Datos">
    </form>

    <?php
      if (isset($_POST["enviar"])) {
          $nombre = htmlspecialchars($_POST['nombre']);
          $contrasena = htmlspecialchars($_POST['contrasena']);
          
          if (isset($_POST['guardar'])) {
              // Establece las cookies con duración de 1 minuto (60 segundos)
              setcookie("nombre", $nombre, time() + 60);
              setcookie("contrasena", $contrasena, time() + 60);
          }
      }

      if (isset($_POST["borrar"])) {
          // Elimina las cookies
          setcookie("nombre", "", time() - 3600);
          setcookie("contrasena", "", time() - 3600);
      }
    ?>
</body>

</html>
