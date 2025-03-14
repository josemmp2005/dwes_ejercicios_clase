<?php
/**
 * 2. Formulario de conversión de temperaturas:
 * Crea un formulario que permita ingresar una temperatura en grados
 * Celsius y que al enviarlo, muestre la temperatura convertida a
 * Fahrenheit.
 * 
 */

$celsius = "";
$inputError = "";

if(isset($_POST["enviar"])){
    if(!empty($_POST["grados"])){
        $celsius = $_POST["grados"];
        $fahrenheit = ($celsius * 9 / 5) + 32;
        echo $celsius . "º Celsius  == " . $fahrenheit . "º Farenheit";
    }else{
        $inputError = "Debe Introducirse Cantidad";
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
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        Celsius: <input type="number" name="grados" id=""><span class="error"><?php echo $inputError?></span><br>
        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>
</html>