<?php
// Paso 1: Definir los horarios disponibles
$horarios = [
    "09:00 - 10:00",
    "10:00 - 11:00",
    "11:00 - 12:00",
    "13:00 - 14:00",
    "14:00 - 15:00",
    "15:00 - 16:00"
];

// Array para almacenar los horarios reservados temporalmente (sin persistencia)
$reservas = [];

// Paso 2: Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($horarios as $index => $horario) {
        if (isset($_POST["reserva_$index"])) {
            // Agregar el horario al array de reservas
            $reservas[] = $horario;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reserva de Sala de Reuniones</title>
</head>
<body>
    <h1>Sistema de Reservas para Sala de Reuniones</h1>

    <?php if ($_SERVER["REQUEST_METHOD"] !== "POST") : ?>
        <!-- Mostrar el formulario de reservas si no se ha enviado aún -->
        <form method="post">
            <p>Seleccione los horarios que desea reservar:</p>
            <?php foreach ($horarios as $index => $horario) : ?>
                <label>
                    <input type="checkbox" name="reserva_<?php echo $index; ?>" value="1">
                    <?php echo $horario; ?>
                </label><br>
            <?php endforeach; ?>
            <input type="submit" value="Reservar">
        </form>
    <?php else : ?>
        <!-- Mostrar los resultados de la reserva -->
        <h2>Resumen de la Reserva</h2>
        <p>Horarios reservados:</p>
        <ul>
            <?php foreach ($reservas as $reserva) : ?>
                <li><?php echo $reserva; ?></li>
            <?php endforeach; ?>
        </ul>

        <p>Horarios aún disponibles:</p>
        <ul>
            <?php foreach ($horarios as $horario) : ?>
                <?php if (!in_array($horario, $reservas)) : ?>
                    <li><?php echo $horario; ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
