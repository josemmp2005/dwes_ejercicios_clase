<?php
/** 
 * Autor: José María Mayén Pérez
 */

$aGrupos = array("1ºDAW", "2ºDAW", "1ºASIR", "2ºASIR");
$lProcesaFormulario = false;

if (isset($_POST["enviar"])) {
    $lProcesaFormulario = true;
    if ($lProcesaFormulario) {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $grupo = $_POST['grupos'];

        echo "Nombre: $nombre<br>";
        echo "Apellidos: $apellidos<br>";
        echo "Email: $email<br>";
        echo "Grupo: $grupo<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inscripción</title>
</head>
<body>
    <form action="procesa1.php" method="post">
        Nombre: <input type="text" name="nombre" id=""><br/>
        Apellidos: <input type="text" name="apellidos" id=""><br/>
        Email: <input type="text" name="email" id=""><br/>
        <select name="grupos" id="">
            <?php
                foreach ($aGrupos as $curso) {
                    echo '<option value="' . $curso . '">' . $curso . '</option>';
                }
            ?>
        </select>
        <br/>
        <input type="submit" name="enviar">  
    </form>
</body>
</html>
