<?php
/**
 * 
 * @author Jose María Mayén Pérez <a23mapejo@iesgrancapitan.org>
 */

require_once("conf/conf.php");
session_start();

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

if (isset($_POST['añadir'])) {
    $idProducto = $_POST['producto'];  // ID del producto (ahora se pasa como id)
    $cantidad = intval($_POST['cantidad']);
    $categoria = $_POST['categoria'];
    $producto = $aProductos[$categoria][$idProducto];  // Acceder al producto usando el id
    $precio = is_array($producto['precio']) 
               ? $producto['precio'][$_POST['tamaño']] 
               : $producto['precio'];

    // Añadir al carrito o actualizar cantidad
    if (isset($_SESSION['carrito'][$idProducto])) {
        $_SESSION['carrito'][$idProducto]['cantidad'] += $cantidad;
    } else {
        $_SESSION['carrito'][$idProducto] = [
            'nombre' => $producto['nombre'],  // Usar el nombre desde el array de productos
            'cantidad' => $cantidad,
            'precio' => $precio,
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>faMia</title>
</head>
<body>
    <h1><i>faMia</i></h1>
    <p><a href="limpiar_carro.php">Borrar</a></p>
    <p><a href="login.php">Log</a></p>
    <a href="logout.php">Cerrar sesión</a>
    <?php
        if(isset($_SESSION['username'])){
            echo "<a href='comandas.php'>comandas</a>";

        }
    ?>
    <form method="post" action="">
        <input type="submit" value="pizzas" name="categoria"> | 
        <input type="submit" value="bebidas" name="categoria"> | 
        <input type="submit" value="postres" name="categoria"> :: 
        <input type="submit" value="carrito" name="categoria">
    </form>

    <?php
    if (isset($_POST['categoria'])) {
        if (in_array($_POST['categoria'], ['pizzas', 'bebidas', 'postres'])) {
            $categoria = $_POST["categoria"];
            echo "<h2>" . $categoria . "</h2>";
            echo "<ul>";
            foreach ($aProductos[$categoria] as $id => $producto) {
                echo "<li>";

                echo "<img src='img/{$producto['imagen']}' alt='{$id}' width='100'>";
                echo "<strong>" . htmlspecialchars($producto["nombre"]) . "</strong><br>";

                if (is_array($producto['precio'])) {
                    echo "<form method='post'>";
                    echo "<label for='tamaño'>Tamaño:</label>";
                    echo "<select name='tamaño'>";
                    foreach ($producto['precio'] as $tamaño => $precio) {
                        echo "<option value='{$tamaño}'>{$tamaño} - {$precio} €</option>";
                    }
                    echo "</select>";
                } else {
                    echo "Precio: " . $producto['precio'] . " €<br>";
                }

                echo "<form method='post'>";
                echo "<input type='hidden' name='categoria' value='{$categoria}'>";
                echo "<input type='hidden' name='producto' value='{$id}'>";
                echo "<label>Cantidad: <input type='number' name='cantidad' value='1' min='1'></label>";
                echo "<button type='submit' name='añadir'>Añadir al carrito</button>";
                echo "</form>";
                echo "</li>";
            }
            echo "</ul>";
        } elseif ($_POST['categoria'] === 'carrito') {
            header("Location: carrito.php");
        }
    }
    ?>


</body>
</html>
