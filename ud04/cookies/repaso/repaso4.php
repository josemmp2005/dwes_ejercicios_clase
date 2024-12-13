<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <form action="" method="post">
        Usuario: <input type="text" name="name" id="name" value=<?php if(isset($_COOKIE["name"])){echo $_COOKIE["name"];}?>>
        <br>
        <br>
        Contraseña: <input type="password" name="password" id="password" value= <?php if(isset($_COOKIE["password"])){echo $_COOKIE["password"];}?>>
        <br>
        <br>
        Recordar Contraseña <input type="checkbox" name="save" id="save" >
        <br>
        <br>
        <input type="submit" name="send" id="send" value="enviar">
        <input type="submit" name="delete" id="delete" value="borrar">
    </form>
    <?php
        if(isset($_POST["send"])){
            if(isset($_POST["save"])){
                setcookie("name", $_POST["name"], time() + 3600);
                setcookie("password", $_POST["password"], time() + 3600);
            }
        }
        if(isset($_POST["delete"])){
            setcookie("name", "", time() - 3600);
                setcookie("password", "", time() - 3600);
        }
    ?>
</body>
</html>