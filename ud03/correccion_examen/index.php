<?php

require_once('conf.php');
require_once('function.php');

$procesaFormulario = false;

$preguntasAcertadas = array();

if (isset($_POST['send'])){
    $procesaFormulario = true;
    $indExamen = $_POST['indExamen'];
} else {
    $indExamen = array_rand($aExamenes);
}

$examen = $aExamenes[$indExamen];
$numeroPreguntas = count($examen['preguntas']);

$valExamen = array();

foreach($examen['preguntas']as $key=>$item){
    $valExamen[$key] = $item['tipo'] == 'cb' ? array() : '';
}

// if ($procesaFormulario){
//     $valExamen = clearData($_POST['pregunta']);
//     $nota = 0;

//     foreach($examen['preguntas'] as $key=>$item){
//         switch($item['tipo']){
//             case "text":
//                 $respuestas = explode(';',$item['respuesta']);
//                 $respuestas = array_map(function($cadena){return strtoupper(trim($cadena))});
//         }
//     }
// }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/css.css">
</head>
<body>
    <h1>Ejercicio</h1>
    <h2><?php echo $examen['titulo']?></h2>
    <form action="" method="post">
        <?php
            echo "<br/>";
            foreach ($examen['preguntas'] as $key=>$item){
                $resultadoPregunta='';
                if($procesaFormulario){
                    $resultadoPregunta = in_array($key, $preguntasAcertadas);
                }
            echo ($key+1) . ".-" . $item['pregunta']." ".$resultadoPregunta;
                echo "<br/>";
                switch ($item['tipo']){
                    case 'text':
                        // $feedBack = (!$procesaFormulario)?'':$item['respuesta'];
                        echo "<input type=\"text\" name=\"pregunta[$key]\" value=\"$valExamen[$key]\"/> <br/>";
                        break;
                    case 'cb':
                        foreach ($item['opciones'] as $value) {
                            echo "<input type=\"checkbox\" name=\"pregunta[$key][]\" value=\"".$value."\">" . $value . "<br/>";
                        }
                        break;

                    case 'vf':
                        foreach(['Verdadero','Falso'] as $value){
                            echo "<input type=\"radio\" name=\"pregunt[$key]\" value=\"$value\" >".$value."<br/>";
                        }
                        break;
                }
            }
        ?>
        <br>
        <button type="submit"> Enviar</button>
    </form>

</body>
</html>
