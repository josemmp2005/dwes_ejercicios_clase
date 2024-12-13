<?php
/**
 * Formulario básico de registro:
 * Crea un formulario con los campos nombre, email y contraseña. Valida
 * que los campos no estén vacíos y muestra un mensaje de éxito si todo es
 * correcto.
 */

$nombre = $email = $contrasena = "";
$nombreError = $emailError = $contrasenaError = "";


if (isset($_POST["enviar"])) {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contrasena = $_POST["constrasena"];

    if(empty($nombre)){
        $nombreError = "Debe introducirse nombre";
    }
    if(empty($email)){
        $emailError = "Debe introducirse email";
    }
    if(empty($contrasena)){
        $contrasenaError = "Debe introducirse contrasena";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        Nombre: <input type="text" name="nombre" id="" value="<?php echo $nombre ?>"><span class="error"><?php echo "* " . $nombreError ?></span></br>
        Email: <input type="text" name="email" id="" value="<?php echo $email ?>"><span class="error"><?php echo "* " . $emailError ?></span></br>
        contraseña: <input type="text" name="constrasena" id="" value="<?php echo $contrasena ?>"><span class="error"><?php echo "* " . $contrasenaError ?></span></br>
        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>

</html>