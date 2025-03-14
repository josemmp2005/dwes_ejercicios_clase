<?php
    $animales = $data;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Gestion de Animales</h1>
    <h2>Listado de Animales</h2>
    <form action="" method="post">
        <input type="text" name="input" id="">
        <input type="submit" value="Buscar">
    </form>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Raza</th>
            <th>Categoria</th>
            <th>Foto</th>
        </tr>
        <?php
            foreach ($animales as $animal) {
                echo "<tr>";
                echo "<td>" . $animal["id"] . "</td>";
                echo "<td>" . $animal["nombre"] . "</td>";
                echo "<td>" . $animal["raza"] . "</td>";
                echo "<td>" . $animal["categoria_id"] . "</td>";
                echo "<td>" . $animal["foto"] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>