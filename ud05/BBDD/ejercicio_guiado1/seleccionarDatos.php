<?php
include("lib/function.php");

// Probar la conexión
$db = conectaDB();
$sql = "SELECT * FROM perros";
$consulta = $db -> prepare($sql);
$consulta -> execute();
$resultado = $consulta->fetchAll();

/** Recorremos los valores de la tabla y mostramos la columna nombre */

    
    echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
    </tr>";
    
    foreach ($resultado as $valor) {
        echo "<tr>"; // Apertura de la fila
        echo "<td>" . $valor["id"] . "</td>";
        echo "<td>" . $valor["nombre"] . "</td>";
        echo "</tr>"; // Cierre de la fila
    }
    
    echo "</table>"; // Cierre de la tabla
    



?>
