
<div>
    <table>
    <tr>
        <th>Nombre</th>
        <th>Raza</th>
        <th>Categoria</th>
        <th>Foto</th>
    </tr>
    <?php
    foreach ($data as $animal) {
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
</div>
