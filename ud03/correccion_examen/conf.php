<?php
$aExamenes = 
array(
    array(
        "id"=>1,
        "titulo"=>"PRIMER EXAMEN",
        "preguntas"=> array(
                          array ("pregunta" => "¿Cuáles de los siguientes países están en América del Sur?",
                                 "tipo"=>"cb",
                                 "opciones"=>array("Brasil","México","Argentina","España"),
                                 "respuesta"=>array("Brasil","Argentina")
                                ),
                          array ("pregunta" => "¿Qué océanos rodean al continente africano?",
                                 "tipo"=>"cb",
                                 "opciones"=>array("Atlántico","Índico","Pacífico","Ártico"),
                                 "respuesta"=>array("Atlántico", "Índico")
                                ),
                          array ("pregunta" => "El desierto del Sahara es el más grande del mundo.",
                                "tipo"=>"vf",
                                "respuesta"=>'Falso'
                               ),
                          array ("pregunta" => "¿Cuál es la capital de Japón?",
                               "tipo"=>"text",
                               "respuesta"=>"Tokio"
                              ),
                         
                          array ("pregunta" => "¿Qué continentes cruzan la línea del Ecuador?",
                                 "tipo"=>"cb",
                                 "opciones"=>array("América del Norte", "África", "Asia", "Oceanía"),
                                 "respuesta"=>array("África","Oceanía")
                                ),
                          array ("pregunta" => "El río Amazonas es el más largo del mundo.",
                                 "tipo"=>"vf",
                                 "respuesta"=>'Falso'
                            )
                     )
              ),
    array(
        "id"=>2,
        "titulo"=>"SEGUNDO EXAMEN",
        "preguntas"=> array(
                          array ("pregunta" => "El desierto del Sahara es el más grande del mundo.",
                                 "tipo"=>"vf",
                                 "respuesta"=>'Falso'
                                ),
                          array ("pregunta" => "Australia es tanto un país como un continente.",
                                "tipo"=>"vf",
                                "respuesta"=>'Verdadero'
                               ),
                          
                          array ("pregunta" => "¿Cuáles de las siguientes son montañas o sistemas montañosos?",
                               "tipo"=>"cb",
                               "opciones"=>array("Himalaya","Amazonas","Andes","Río Nilo"),
                               "respuesta"=>array("Himalaya","Andes")
                              ),
                          array ("pregunta" => "El Monte Everest es la montaña más alta del mundo.",
                               "tipo"=>"vf",
                               "respuesta"=>'Verdadero'
                              ),
                          array ("pregunta" => "¿Cuál es la comunidad autónoma de España que tiene como lengua cooficial el euskera?",
                                 "tipo"=>"text",
                                 "respuesta"=>"País Vasco;Euskadi"
                                )
                       )
    )
                     
);