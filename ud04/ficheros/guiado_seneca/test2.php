<?php
$mActual = date("m");
$aActual = date("Y");

//$mActual = 9;
//$aActual = 2024;
$check = false;

include("./config/config.php");
$av_array = [];

for ($i = A_INICIO; $i <= A_FINAL; $i++) {
    $anno = $i . "/" . ($i + 1);
    if (($i == $aActual && $mActual >= 8) || ($i + 1 == $aActual && $mActual <= 8)) {
        $check = true;
        $av_array[] = [$anno, $check];
    } else {
        $check = false;
        $av_array[] = [$anno, $check];
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Curso</title>
</head>

<body>

    <h2>Formulario de Selección de formato y formato</h2>
    <form action="procesa_formulario.php" method="post" enctype="multipart/form-data">

        <!--Seleccionar grupo-->
        <label for="grupo">Selecciona el grupo:</label>
        <select name="grupo" id="grupo" required>
            <?php
            foreach ($cursos as $grupo) {
                echo "<option value=\"$grupo\">$grupo</option>";
            }
            ?>
        </select>
        <br><br>

        <!--Seleccionar formato-->
        <label for="formato">Selecciona el formato:</label>
        <select name="formato" id="formato" required>
            <?php
            foreach ($formatos as $formato) {
                echo "<option value=\"$formato\">$formato</option>";
            }
            ?>
        </select>
        <br><br>

        <!--Seleccionar curso -->
        <label for="curso">Selecciona el curso:</label>
        <select name="curso" id="curso" required>
            <?php foreach ($av_array as $curso): ?>
                <option value="<?php echo htmlspecialchars($curso[0]); ?>" <?php echo $curso[1] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($curso[0]); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <label for="csv"></label>
        <input type="file" name="file" id="file" value="Seleccionar el archivo">
        <br><br>

        <input type="submit" name="enviar" id="enviar" value="Enviar">
    </form>

</body>

</html>