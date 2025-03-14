<?php
/**
 * Desarrolla una aplicación que genere un script para la creación de usuarios a partir
 *de un fichero.
 *Opción A: MYSQL
 *Usuario: AAaan_1daw
 *BD: bdAAaann_1daw
 *AA: Dos primeras letras del primer apellido.
 *aa: Dos primeras letras del segundo apellido.
 *n: Inicial del nombre.
 *Ayuda:
 *BD: CREATE DATABASE bdejemplo
 *Usuarios: GRANT ALL PRIVILEGES ON bdejemplo.* TO ‘usuario’@’localhost’
 *IDENTIFIED BY ‘clave’;
 *Opción B: ORACLE
 *Opción C: LINUX
 *Crear un formulario para parametrizar la generación del fichero.
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
    <h1>Formulario Usuario</h1>
    <form action="" method="post">
        Nombre: <input type="text" name="name" id="name">
        <br>
        Primer Apellido: <input type="text" name="first-surname" id="first-surname">
        <br>
        Segundo Apellido: <input type="text" name="second-surname" id="second-surname">
            <select name="course" id="course" required>
            <option value="bd">BD</option>
            <option value="linux">Linux</option>
        </select>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>