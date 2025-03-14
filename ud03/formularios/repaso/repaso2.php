<?php
/**
 * Formulario de suma de dos números 
 * Ejercicio: Crea un formulario en HTML que permita al usuario ingresar dos números. Luego, procesa esos datos en PHP para mostrar la suma de ambos números.
 * Se procesa en distinto archivo
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
        <label for="">Numero 1 <input type="number" name="numero1">
        </label>
       <br>
       <br>
       <label for="">Numero 2 <input type="number" name="numero2">
       </label> 
       <br>
       <br>
        <button type="submit">Enviar</button>
        

    </form>
</body>

</html>