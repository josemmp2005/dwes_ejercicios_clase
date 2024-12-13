<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios UD04</title>
</head>
<style>
    body {
        display: flex;
        align-items: center; /* Centrar el contenido verticalmente (opcional) */
        margin: 0; /* Eliminar márgenes predeterminados */
        flex-direction: column; /* Apilar los elementos en columna */
    }

    table {
        width: 50%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    th {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
    }

    td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<body>

    <h1>Ejercicios UD04</h1>
    <table>
        <tr>
            <th>Categoría</th>
            <th>Ejercicios</th>
        </tr>
        <?php
        include('../../conf/conf.php');

        // Recorrer las unidades didácticas
        foreach ($aEj as $unidad => $categorias) {
            if ($unidad == "ud04") {
                // Recorrer las categorías dentro de la unidad
                foreach ($categorias as $categoria => $ejercicios) {
                    echo "<tr>";
                    echo "<td>$categoria</td>";
                    echo "<td>";
                    echo "<ul>"; // Iniciar la lista no ordenada

                    // Recorrer los ejercicios dentro de la categoría
                    foreach ($ejercicios as $ejercicio) {
                        echo "<li><a href='$categoria/$ejercicio' target='_blank'>$ejercicio</a></li>";
                    }

                    echo "</ul>"; // Cerrar la lista no ordenada
                    echo "</td>";
                    echo "</tr>"; // Cerrar la fila
                }
            }
        }
        ?>
    </table>
</body>

</html>
        