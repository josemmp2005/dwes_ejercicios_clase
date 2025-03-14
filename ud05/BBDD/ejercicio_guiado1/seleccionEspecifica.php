<?php
include("lib/function.php");

/***
 * 
 * Listado de perros con  busqueda por inicial por cada campo y opcion de borrado
 * 
 */

// Probar la conexión
$db = conectaDB();



// Dos condiciones de busqueda

$nombre = $_POST['nombre'] ?? 'C%';
$peso = $_POST['peso'] ?? 3;
$sql = "SELECT * FROM perros where nombre LIKE :nombre AND peso > :peso";
$consulta = $db -> prepare($sql);
$consulta -> execute(array(
                            ":nombre" => $nombre,
                            ":peso" => $peso));
$resultado = $consulta->fetchAll();
$numerosRegistros = $consulta -> rowCount();


/** Recorremos los valores de la tabla y mostramos la columna nombre */

if(!$resultado){
    echo "Error en la consulta";
}
else{
    echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Peso</th>
    </tr>";
   
    foreach ($resultado as $valor) {
        
        echo "<tr>"; // Apertura de la fila
        echo "<td>" . $valor["id"] . "</td>";
        echo "<td>" . $valor["nombre"] . "</td>";
        echo "<td>" . $valor["peso"] . "</td>";
        echo "</tr>"; // Cierre de la fila
    }
    
    echo "</table>"; // Cierre de la tabla
    
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br/>
    <form action="" method="post">

    <input type="text" name="nombre" id="nombre">
    <input type="text" name="peso" id="peso">
    <input type="submit" name="busqueda" id="busqueda">


    </form>
</body>
</html>

