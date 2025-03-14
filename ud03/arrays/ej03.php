<?php
/**
 * Crear un array con los alumnos de clase y permitir la selección aleatoria de uno de
 * ellos. El resultado debe mostrar nombre y fotografía.
 * 
 * coloco la misma foto en todos para una posible ampliacion
 */

 $alumnado = array(
    "Bermúdez González, Raúl" => "image.png",
    "Cañas González, Álvaro" => "image.png",
    "Carmona Cicchetti, Miguel" => "image.png",
    "Carrasco Castellano, Alejandro" => "image.png",
    "Cherif Mouaki Almabouada, Mostafa" => "image.png",
    "Coronado Ortega, Alejandro" => "image.png"
    ,
    "Delgado Morente, Juan Diego" => "image.png",
    "Escoto García, Marlon Jafet" => "image.png",
    "Fernández Ariza, Ángel" => "image.png",
    "Fernández Arrayás, Alejandro" => "image.png",
    "Fernández Balsera, Daniel" => "image.png",
    "Ferrer López, Jesús" => "image.png",
    "Frías Rojas, Jesús" => "image.png",
    "Galán Navas, Manuel" => "image.png",
    "García Báez, Víctor" => "image.png",
    "García Díaz, Lucía" => "image.png",
    "González Martínez, Adrián" => "image.png",
    "Mariño Jiménez, Enrique" => "image.png",
    "Martín-Castaño Carrillo, Oscar" => "image.png",
    "Mayén Pérez, José María" => "image.png",
    "Mérida Velasco, Pablo" => "image.png",
    "Mora Sánchez, Héctor" => "image.png",
    "Pérez Cantarero, Luis" => "image.png",
    "Romero Romero, Carlos" => "image.png",
    "Ruiz Molero, Javier" => "image.png",
    "Vaquero Abad, Alejandro" => "image.png",
    "Villén Moyano, Luís Miguel" => "image.png"
);

$random_number = random_int(0, count($alumnado) -1);
$contador = 0;
foreach ($alumnado as $nombre => $foto) {
    if ($contador === $random_number) {
        $random_alumno = $nombre;
        $random_alumno_foto = $foto;
        break;
    }
    $contador++;
}
echo "<p>$random_alumno</p>";
echo "<img src='./ej03_imgs/$random_alumno_foto' alt='$random_alumno'  width='200'>";

?>
