<?php
/**
 * Definir un array que permita almacenar y mostrar la siguiente información.
 *    a. Meses del año.
 *    b. Tablero para jugar al juego de los barcos.
 *    c. Nota de los alumnos de 2o DAW para el módulo DWES.
 *    d. Verbos irregulares en inglés.
 *    e. Información sobre continentes, países, capitales y banderas. 
 */

$aMeses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

$aTablero = array(
    "A" => array(1, 2, 3, 4, 5),
    "B" => array(1, 2, 3, 4, 5),
    "C" => array(1, 2, 3, 4, 5),
    "D" => array(1, 2, 3, 4, 5),
    "E" => array(1, 2, 3, 4, 5),
);

$notaAlumno = array(
    "UD01" => array(
        "Bermúdez González, Raúl" => "",
        "Cañas González, Álvaro" => "10",
        "Carmona Cicchetti, Miguel" => "10",
        "Carrasco Castellano, Alejandro" => "10",
        "Cherif Mouaki Almabouada, Mostafa" => "10",
        "Coronado Ortega, Alejandro" => "10",
        "Delgado Morente, Juan Diego" => "10",
        "Escoto García, Marlon Jafet" => "10",
        "Fernández Ariza, Ángel" => "10",
        "Fernández Arrayás, Alejandro" => "10",
        "Fernández Balsera, Daniel" => "10",
        "Ferrer López, Jesús" => "10",
        "Frías Rojas, Jesús" => "10",
        "Galán Navas, Manuel" => "10",
        "García Báez, Víctor" => "10",
        "García Díaz, Lucía" => "10",
        "González Martínez, Adrián" => "10",
        "Mariño Jiménez, Enrique" => "10",
        "Martín-Castaño Carrillo, Oscar" => "10",
        "Mayén Pérez, José María" => "10",
        "Mérida Velasco, Pablo" => "10",
        "Mora Sánchez, Héctor" => "10",
        "Pérez Cantarero, Luis" => "10",
        "Romero Romero, Carlos" => "10",
        "Ruiz Molero, Javier" => "10",
        "Vaquero Abad, Alejandro" => "10",
        "Villén Moyano, Luís Miguel" => "10"
    ),
    "UD02" => array(
        "Bermúdez González, Raúl" => "10",
        "Cañas González, Álvaro" => "10",
        "Carmona Cicchetti, Miguel" => "10",
        "Carrasco Castellano, Alejandro" => "10",
        "Cherif Mouaki Almabouada, Mostafa" => "10",
        "Coronado Ortega, Alejandro" => "10",
        "Delgado Morente, Juan Diego" => "10",
        "Escoto García, Marlon Jafet" => "10",
        "Fernández Ariza, Ángel" => "10",
        "Fernández Arrayás, Alejandro" => "10",
        "Fernández Balsera, Daniel" => "10",
        "Ferrer López, Jesús" => "10",
        "Frías Rojas, Jesús" => "10",
        "Galán Navas, Manuel" => "10",
        "García Báez, Víctor" => "10",
        "García Díaz, Lucía" => "10",
        "González Martínez, Adrián" => "10",
        "Mariño Jiménez, Enrique" => "10",
        "Martín-Castaño Carrillo, Oscar" => "10",
        "Mayén Pérez, José María" => "10",
        "Mérida Velasco, Pablo" => "10",
        "Mora Sánchez, Héctor" => "10",
        "Pérez Cantarero, Luis" => "10",
        "Romero Romero, Carlos" => "10",
        "Ruiz Molero, Javier" => "10",
        "Vaquero Abad, Alejandro" => "10",
        "Villén Moyano, Luís Miguel" => "10"
    )
);
$aVerbos = array(
    array('infinitive' => 'be', 'past_simple' => 'was/were', 'past_participle' => 'been'),
    array('infinitive' => 'begin', 'past_simple' => 'began', 'past_participle' => 'begun'),
    array('infinitive' => 'break', 'past_simple' => 'broke', 'past_participle' => 'broken'),
    array('infinitive' => 'bring', 'past_simple' => 'brought', 'past_participle' => 'brought')
,
);

$aInfo = array(
    "Europa" => [
        "España" => [
            "colores_bandera" => ["amarillo", "rojo"],
            "capital" => "París"
        ],
        "Alemania" => [
            "colores_bandera" => ["negro", "rojo", "amarillo"],
            "capital" => "Berlín"
        ],
    ],
    "África" => [
        "Nigeria" => [
            "colores_bandera" => ["verde", "blanco"],
            "capital" => "Abuya"
        ],
        "Egipto" => [
            "colores_bandera" => ["rojo", "blanco", "negro"],
            "capital" => "El Cairo"
        ],
    ],
    "Asia" => [
        "Japón" => [
            "colores_bandera" => ["blanco", "rojo"],
            "capital" => "Tokio"
        ],
        "India" => [
            "colores_bandera" => ["naranja", "blanco", "verde", "azul"],
            "capital" => "Nueva Delhi"
        ],
    ],
    "América" => [
        "Estados Unidos" => [
            "colores_bandera" => ["rojo", "blanco", "azul"],
            "capital" => "Washington, D.C."
        ], 
            "Brasil" => [
                "colores_bandera" => ["verde", "amarillo", "azul", "blanco"],
                "capital" => "Brasilia"
            ],
    ],
    "Oceanía" => [
        "Australia" => [
            "colores_bandera" => ["azul", "rojo", "blanco"],
            "capital" => "Canberra"
        ],
        "Nueva Zelanda" => [
            "colores_bandera" => ["azul", "rojo", "blanco"],
            "capital" => "Wellington"
        ],

    ],
);
?>