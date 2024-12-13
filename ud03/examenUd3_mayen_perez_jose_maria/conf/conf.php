<?php

$aExamenes = array(
    array(
        "idTest" => 1,
        "Correccion" => array(array("Brasil", "Argentina"), array("Atlantico", "Indico"), array("Africa", "Oceania"), "Falso"),
        "Preguntas" => array(
            array(
                "idPregunta" => 1,
                "Tipo" => "checkbox",
                "Pregunta" => "1. ¿Cuales de los siguientes paises estan en America del Sur ?",
                "respuestas" => array("a) Brasil", "b) Mexico.", "c) Argentina", "d) España")
            ),
            array(
                "idPregunta" => 2,
                "Tipo" => "checkbox",
                "Pregunta" => "2. ¿Que oceanos rodean el contiente africano?",
                "respuestas" => array("a) Atlantico", "b) Indico", "c) Pacifico", "d) Artico")
            ),
            array(
                "idPregunta" => 3,
                "Tipo" => "checkbox",
                "Pregunta" => "3. ¿Cuales de los siguientes son montañas o sistemas montañosos?",
                "respuestas" => array("a) Himalaya.", "b) Amazonas.", "c) Andes.", "d) Rio Nilo")
            ),
            array(
                "idPregunta" => 4,
                "Tipo" => "checkbox",
                "Pregunta" => "4. ¿Que continentes cruzan la linea del ecuador?",
                "respuestas" => array("a) America del norte.", "b) Africa", "c) Asia.", "d) Oceania")
            ),
            array(
                "idPregunta" => 5,
                "Tipo" => "radio",
                "Pregunta" => "5. El Rio Amazonas es el más largo del mundo",
                "respuestas" => array("a) Verdadero.", "b) Falso")
            )
        )
    ),
    array(
        "idTest" => 2,
        "Correccion" => array("Falso", "Verdadero", "Verdadero", "Tokio", "Pais Vasco; Euskadi"),
        "Preguntas" => array(
            array(
                "idPregunta" => 1,
                "Tipo" => "radio",
                "Pregunta" => "1. El desierto del Sahara es el mas grande del mundo",
                "respuestas" => array("a) Verdadero.", "b) Falso")
            ),
            array(
                "idPregunta" => 2,
                "Tipo" => "radio",
                "Pregunta" => "2. Australia es tanto un pais como continente",
                "respuestas" => array("a) Verdadero.", "b) Falso")
            ),
            array(
                "idPregunta" => 3,
                "Tipo" => "radio",
                "Pregunta" => "3. El monte Everest es la montaña mas alta del mundo",
                "respuestas" => array("a) Verdadero.", "b) Falso")
                
            ),
            array(
                "idPregunta" => 4,
                "Tipo" => "text",
                "Pregunta" => "4. ¿Cual es la capital de Japon?",
                "respuestas" => array("")


            ),
            array(
                "idPregunta" => 5,
                "Tipo" => "text",
                "Pregunta" => "5. ¿Cual es la comunidad autonoma de España que tiene como lengua cooficial es euskera?",
                "respuestas" => array("")

                )
        )


    )
)
    ?>