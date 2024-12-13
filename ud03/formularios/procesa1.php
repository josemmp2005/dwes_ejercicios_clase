<?php

// Control de acceso al formulario´

if(!isset($_POST["enviar"])){
    header("location: guiado1.php");
};

echo"datos del dormulario: <br>";


foreach($_POST as $clave => $valor){
    if(($clave == "email") && (!filter_var($valor, FILTER_VALIDATE_EMAIL))){
        echo "Formato Incorrecto";
         echo "<br>";
        }else{
            echo $valor;
            echo "<br>";
        }

};
?>