<?php
/**
 * Descripción: Extiende el primer ejercicio para incluir una opción que permita al usuario borrar su cookie.

 * Instrucciones:

 * Modifica el código anterior para que muestre un enlace o botón que permita al usuario borrar su cookie de nombre.
 * Si la cookie se borra, redirige al usuario a la página principal para que vuelva a introducir su nombre.
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
    <form action="procesa_repaso2.php" method="post">
        Nombre: <input type="text" name="name" id="name" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>