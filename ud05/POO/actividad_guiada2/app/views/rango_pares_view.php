<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Números Pares</title>
</head>
<body>
    <?php
        foreach($data["numerosPares"] as $numero  => $valor){
            echo $valor;
            echo "<br>";
        }
    ?>
</body>
</html>
