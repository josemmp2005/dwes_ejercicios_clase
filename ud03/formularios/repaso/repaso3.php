<?php
/**
 *  Formulario para seleccionar un color favorito
 * Ejercicio: Crea un formulario en HTML que permita al usuario seleccionar su color favorito de una lista desplegable. 
 * Luego, procesa esa información en PHP y cambia el color de fondo de la página al color seleccionado.
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
    <form action="" method="post">
        <select name="color" id="color">
            <option value=""></option>
            <option value="red">Rojo</option>
            <option value="green">Verde</option>
            <option value="blue">Azul</option>
            <option value="purple">Morado</option>
            <option value="yellow">Amarillo</option>
        </select>
        <button type="submit">Cambiar</button>

        <?php
            if(isset($_POST)){
                echo "<style>
                        body{
                            background-color:" .  $_POST["color"] . 
                            "}
                       </style>";
            }
        ?>
    </form>
</body>
</html>