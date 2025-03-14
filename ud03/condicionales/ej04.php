<!-- Modifica la página inicial realizada, incluyendo una imagen de cabecera en función
de la estación del año en la que nos encontremos y un color de fondo en función de
la hora del día.
Author: José María Mayén Pérez 
Date: 26/09/2024- -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style/style.css">
  <title>Portfolio</title>
    <style>
    <?php
      $hora_actual = date("H");

      if ($hora_actual >= 8 && $hora_actual < 20) {
          echo "body { background-color: #a9edf4; }";  
      } else {
          echo "body { background-color: #507a7e; }"; 
      }
    ?>
    </style>
</head>
<body>
  <header>
    <h1>Portfolio de José María Mayén Pérez</h1>
    <?php
        $dia_actual = date("j");
        $mes_actual = date("n");

        if (($mes_actual == 3 && $dia_actual >= 21) || ($mes_actual == 4) || ($mes_actual == 5) || ($mes_actual == 6 && $dia_actual <= 20)) {
            echo '<img src="img/primavera.jpg"  style="width:50%;">';
        } elseif (($mes_actual == 6 && $dia_actual >= 21) || ($mes_actual == 7) || ($mes_actual == 8) || ($mes_actual == 9 && $dia_actual <= 20)) {
            echo '<img src="img/verano.jpeg" style="width:50%;">';
        } elseif (($mes_actual == 9 && $dia_actual >= 21) || ($mes_actual == 10) || ($mes_actual == 11) || ($mes_actual == 12 && $dia_actual <= 20)) {
            echo '<img src="img/otoño.jpg" style="width:50%;">';
        } elseif (($mes_actual == 12 && $dia_actual >= 21) || ($mes_actual == 1) || ($mes_actual == 2) || ($mes_actual == 3 && $dia_actual <= 20)) 
            echo '<img src="img/ivierno.jpg"  style="width:50%;">';
    
    ?>
  </header>
  <main>
    <h3>Información Personal</h3>
    <p>Nombre: José María</p>
    <p>Edad: 19</p>
    <p>Formación: </p>
    <ul>
      <li>Técnico en SMR(Sistemas MicroInformaticos Y Redes)</li>
    </ul>
    <p>Contacto</p>
    <p>a23mapejo@iesgrancapitan.org</p>
  </main>
</body>
</html>
