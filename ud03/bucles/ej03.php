<!-- Tablas de multiplicar del 1 al 10. Aplicar estilos en filas/columnas
Author: Jose Maria Mayen Perez
Date: 27/09/2024 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de Multiplicar</title>
    <link rel="stylesheet" href="./styles/ej03_style.css">
</head>
<body>
    <h1>Tablas de Multiplicar</h1>
    <table>
        <?php
        $i = 1;
        while ($i <= 10) {
            $j = 1;
            echo "<tr>";
            while ($j <= 10) {
                echo "<td>" . ($i * $j) . "</td>";
                $j++;
            }
            echo "</tr>";
            $i++;
        }
        ?>
    </table>
</body>

</html>