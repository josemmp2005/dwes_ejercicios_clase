<?php
/**
 * Crear un formulario que permita al usuario seleccionar productos y cantidades para agregarlos a una lista de compras. 
 * Al enviar el formulario, se muestra el total de la compra, y un mensaje si supera un límite de gasto.
 * @author José María Mayén Pérez <a23mapejo@iesgrancapitan.org>
 */

session_start(); // Iniciar la sesión al principio

$aProductos = array(
    "Manzanas" => 1.5,
    "Plátanos" => 0.8,
    "Leche" => 1.2,
    "Pan" => 0.5,
    "Huevos (docena)" => 2.0,
    "Queso" => 3.5
);

// Si hay un carrito en la sesión, úsalo; si no, crea uno vacío
$aCarrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
$precioTotal = isset($_SESSION['precioTotal']) ? $_SESSION['precioTotal'] : 0;

if (isset($_POST["submit"])) {
    $cantidad = $_POST["cantidad"];
    $producto = $_POST["producto"];
    $precioUnidad = $aProductos[$producto];
    $subtotal = $precioUnidad * $cantidad;

    // Añadir el producto al carrito
    $aCarrito[] = array(
        "producto" => $producto,
        "cantidad" => $cantidad,
        "precioUnidad" => $precioUnidad,
        "subtotal" => $subtotal
    );

    // Actualizar el precio total
    $precioTotal += $subtotal;

    // Guardar el carrito y el total en la sesión
    $_SESSION['carrito'] = $aCarrito;
    $_SESSION['precioTotal'] = $precioTotal;
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
    <a href="./cierre.php">Borrar Carrito</a>
    <h1>Lista de la compra</h1>
    <table border="2">
        <?php
        foreach ($aProductos as $producto => $precio) {
            echo "<tr>";
            echo "<td>" . $producto . "</td>";
            echo "<td>" . $precio . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <form action="" method="post">
        Producto: <select name="producto" id="producto">
            <?php
            foreach ($aProductos as $producto => $precio) {
                echo "<option value='" . $producto . "'> " . $producto . "</option>";
            }
            ?>
        </select>
        <br>
        Cantidad: <input type="number" name="cantidad" id="cantidad" required>
        <button type="submit" name="submit" id="submit">Añadir</button>
    </form>

    <table border="2">
        <tr><th>Producto</th><th>Cantidad</th><th>Precio Unitario</th><th>Subtotal</th></tr>
        <?php
        foreach ($aCarrito as $item) {
            echo "<tr>";
            echo "<td>" . $item["producto"] . "</td>";
            echo "<td>" . $item["cantidad"] . "</td>";
            echo "<td>" . $item["precioUnidad"] . "</td>";
            echo "<td>" . $item["subtotal"] . "</td>";
            echo "</tr>";
        }
        ?>
        <tr>
            <td colspan="3">Total</td>
            <td><?php echo $precioTotal; ?></td>
        </tr>
    </table>
</body>
</html>
