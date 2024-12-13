<?php
/**
 * Crear una aplicación que almacene información de países: nombre, capital y
 * bandera. Diseñar un formulario que permita seleccionar un país y nos muestre el
 * nombre de la capital y la bandera.
 * Autor: José María Mayén Pérez  
 */
$a_paises = array(
    "España" => array("Madrid", "españa.png"),
    "Francia" => array("Paris", "francia.png"),
    "Italia" => array("Roma", "italia.png"),
    "Portugal" => array("Lisboa", "portugal.png")
);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej02</title>
</head>

<body>
    <form action="" method="post">
        <select name="pais">
            <?php
            foreach ($a_paises as $key => $value) {
                echo '<option value="' . $key . '">' . $key . '</option>';
            }
            ?>
        </select>
        <input type='submit' name='cargar' value='Cargar'>
    </form>

    <?php
    if (isset($_POST['pais'])) {
        $pais = $_POST['pais'];
        $capital = $a_paises[$pais][0];
        $bandera = $a_paises[$pais][1];

        echo '<p>Capital: ' . $capital . '</p>';
        echo "<img src='./ej02_banderas/$bandera' alt='$pais' width='200'>";
    }
    ?>
</body>

</html>