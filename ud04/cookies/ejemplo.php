<?php
/**
 * Añadir un formulario de login y passsword y casilla de verificacion
 * @author = Raúl Bermúdez González
 * @date = 17-10-2024
 */
// Inicializacion de variables
$usuario = "";
$contrasena = "";
$guardar = false;
$lProcesaFormulario = false;
$error="";

// Compruebo que el formulario se ha enviado
if (isset($_POST['enviar'])){
    $lProcesaFormulario = true;
}

// Compruebo que la cookie esta creada
if ((isset($_COOKIE['cUsuario'])) && (isset($_COOKIE['cContrasena'])) && (!$lProcesaFormulario)){
    $usuario = $_COOKIE['cUsuario'];
    $contrasena = $_COOKIE['cContrasena'];
    $guardar = $_COOKIE['cCookie'];
}


// Si se ha enviado recojo los datos
if ($lProcesaFormulario){
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Compruebo que no haya ningun campo vacio
    if (($usuario == "") || ($contrasena == "")){
        $lProcesaFormulario = false;
        $error = "Campo requerido";
    }

    // Compruebo la casilla de checkbox(la que sera la cookie)
    if ($_POST['guardar']){
        $guardar = true;
        setcookie("cUsuario", $usuario, time()+3600);
        setcookie("cContrasena", $contrasena, time()+3600);
    }else{
        setcookie("cUsuario", $usuario, time()-3600);
        setcookie("cContrasena", $contrasena, time()-3600);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 3 - Cookies</title>
    </head>
    <body>
<!-- Creación del formulario -->
<?php
if ($lProcesaFormulario){
echo "Usuario: " . $usuario . "<br/>Contrasena: " . $contrasena;
}else{
?>
<form action="" method="post">
    <label>Usuario :< /labe1>
    <input type="text" name="usuario" value=" <?php echo $usuario ?>"/> <?php echo $error; ?><br/>
    <label>Contraseña :< /label>
    <input type="text" name="contrasena" value=" <?php echo $contrasena ?>"/> <?php echo $error; ?><br/>
    <input type="checkbox" name="guardar" <?php if ($guardar) echo "checked"?>>¿Quieres guardar los datos?
    <br/><button type="submit" name="enviar">Enviar</button>
<?php
}
?>
    </body>
</html>