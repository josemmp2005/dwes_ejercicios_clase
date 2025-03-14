<?php
include "./config/tests_cnf.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tests Coche</title>
</head>
<body>
    <h1>Tests Coche</h1>
    <form action="procesa_test.php" method="post">
        <select name="test" id="test">
        <?php
            foreach ($aTests as $test) {
                $testId = $test["idTest"];
                $permiso = $test["Permiso"];
                $categoria = $test["Categoria"];
                echo "<option value='$testId'>$permiso - Test $testId - $categoria</option>";
            }
        ?>
        </select>
        <br><br>
        <button type="submit" name="enviar" id="enviar">Enviar</button>
    </form>
</body>
</html>
