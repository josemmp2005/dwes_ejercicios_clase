<?php
/**
 * 5. Formulario de validación de email:
 * • Realiza un formulario que solicite el email del usuario. Valida si el email
 * tiene un formato correcto antes de enviarlo y muestra un mensaje de
 * error si es inválido.
 * 
 */
$email = "";
$emailError = "";

if (isset($_POST["enviar"])) {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Email No Valido";
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
        <input type="text" name="email" id=""><span class="error"><?php echo $emailError ?></span>
        <br>
        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>

</html>