<?php
/**
 *  Crear una cookie simple
 * Descripción: Crea una página en la que se guarde el nombre de usuario en una cookie. Cuando el usuario vuelva a visitar la página, 
 * debe mostrar un mensaje que le dé la bienvenida por su nombre si la cookie está presente.
 * 
 * Instrucciones:
 *  Crea un formulario para que el usuario pueda ingresar su nombre.
 * Cuando el formulario sea enviado, guarda el nombre en una cookie.
 * Si la cookie está presente, muestra un mensaje de bienvenida con el nombre del usuario.
 * Si la cookie no está presente, muestra el formulario.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="procesa_repaso1.php" method="post">
        Nombre: <input type="text" name="name" id="name">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>