<?php
/**
 * Crear una pagina con un enlace y un contador que se autoincrementa cada vez que se pulsa el enlace, 
 * si estamos un minuto sin pulsar el enlace, se reiniciara el contador a 0
 * @author José María Mayén Pérez <a23mapejo@iesgrancapitan.orga>
 */

session_start();


if (!isset($_SESSION['inicioTime'])) {
    $_SESSION['inicioTime'] = time();
    $_SESSION['contador'] = 0;

}

// $hora_actual = time();
// echo $_SESSION["inicioTime"];
// echo "<br>";
// echo $hora_actual;

if($hora_actual - $_SESSION['inicioTime'] >= 60){
    header("Location: salida.php");
}

echo $_SESSION["contador"];
$_SESSION["contador"] ++;
?>
<br>
<a href="guiado2.php">Contar</a>
<br>
<br>
<a href="salida.php">Salida</a>


<!-- $_SESSION['intervaloTime'] = 1;
if (isset($_SESSION['inicioTime'])) {
    $tiempo_transcurrido = time();
    /*se multiplica por 60 segundos ya que se configura en minutos
    $tiempo_maximo = $_SESSION['inicioTime'] + ($_SESSION['intervaloTime'] * 60);
    if ($tiempo_transcurrido > $tiempo_maximo) {
        header(“Location: salir.php”);
    } else {
        /*se resetea el inicio
        $_SESSION['inicioTime'] = time();
    }
} else {
    /*Si no existe se crea o si lo prefiere destruya la sesión
    $_SESSION['inicioTime'] = time();
} -->


