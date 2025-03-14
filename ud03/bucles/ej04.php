<!-- Mostrar paleta de colores. Utilizar una tabla que muestre el color y el valor
hexadecimal que le corresponde. Cada celda será un enlace a una página que
mostrará un fondo de pantalla con el color seleccionado. ¿Puedes hacerlo con los
conocimientos que tienes?
Author: Jose Maria Mayen Perez
Date: 27/09/2024-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paleta de Colores</title>
</head>
<body>
    <h1>Paleta de Colores</h1>
    <table>

    <?php
            $counter = 0; 
    
            for ($x = 0; $x <= 255; $x += 32) {
                for ($y = 0; $y <= 255; $y += 32) { 
                    for ($z = 0; $z <= 255; $z += 32) {
                        $color = sprintf("#%02x%02x%02x", $x, $y, $z); 
                        echo "<td style='background-color: $color;'>$color</td>";
                        
                        $counter++;
                        if ($counter % 8 == 0) { 
                            echo "</tr><tr>"; 
                        }
                    }
                }
            }
        ?>

    </table>
</body>

</html>


