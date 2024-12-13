<?php
require_once("conf/conf.php");
session_start();

// Eliminar productos del carrito
if (isset($_POST['eliminar'])) {
    unset($_SESSION['carrito'][$_POST['producto']]);
}
// Tramitar pedido
if (isset($_POST['tramitar'])) {
    $fecha_hora = date('Ymd_His');
    $ticket_file = "ticket_{$fecha_hora}.txt";
    $comanda_file = "comanda_{$fecha_hora}_pendiente.txt";

    $ticket = "TICKET DE COMPRA\n\n";
    $comanda = "COMANDA DE PEDIDO\n\n";
    $total = 0;

    foreach ($_SESSION['carrito'] as $producto) {
        $nombre = $producto['nombre'];
        $cantidad = $producto['cantidad'];
        $precio = $producto['precio'];
        $subtotal = $precio * $cantidad;
        $total += $subtotal;

        $ticket .= "{$nombre} x{$cantidad} - {$subtotal} €\n";
        $comanda .= "{$nombre} x{$cantidad}\n";
    }

    $ticket .= "\nTOTAL: {$total} €";
    $comanda .= "\nTOTAL: {$total} €";

    // Crear y escribir en el archivo de ticket
    $ticket_path = __DIR__ . "/tickets/{$ticket_file}";
    $ticket_handle = fopen($ticket_path, 'w');
    fwrite($ticket_handle, $ticket);
    fclose($ticket_handle);

    // Crear y escribir en el archivo de comanda
    $comanda_path = __DIR__ . "/comandas/{$comanda_file}";
    $comanda_handle = fopen($comanda_path, 'w');
    fwrite($comanda_handle, $comanda);
    fclose($comanda_handle);

    // Vaciar el carrito
    $_SESSION['carrito'] = [];

    echo "<p>Pedido tramitado correctamente. Descarga tu <a href='tickets/{$ticket_file}' download>ticket</a>.</p>";
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
    <form method="post" action="">
        <input type="submit" value="pizzas" name="categoria"> | 
        <input type="submit" value="bebidas" name="categoria"> | 
        <input type="submit" value="postres" name="categoria"> :: 
        <input type="submit" value="carrito" name="categoria">
    </form>
    <?php
    if (isset($_POST['categoria'])) {
        if (in_array($_POST['categoria'], ['pizzas', 'bebidas', 'postres'])) {
            header("Location: index.php");
        } elseif ($_POST['categoria'] === 'carrito') {
            header("Location: carrito.php");
        }
    }
    ?>
    <ul>
        <?php
        if (empty($_SESSION['carrito'])) {
            echo "<p>El carrito está vacío.</p>";
        } else {
            foreach ($_SESSION['carrito'] as $producto => $detalle) {
                echo "<li>";
                echo "<strong>{$detalle['nombre']}</strong> - {$detalle['cantidad']} x {$detalle['precio']} € = " . ($detalle['cantidad'] * $detalle['precio']) . " €";
                echo "<form method='post'>";
                echo "<input type='hidden' name='producto' value='{$producto}'>";
                echo "<button type='submit' name='eliminar'>Eliminar</button>";
                echo "</form>";
                echo "</li>";
            }
            echo "<form method='post'>";
            echo "<button type='submit' name='tramitar'>Tramitar Pedido</button>";
            echo "</form>";
        }
        ?>
    </ul>
</body>
</html>
