<?php

/**
 * @author Daniel
 * 
 */

 include("lib/function.php");

 session_start();

/**
 * if (isset($_POST['enviar'])){
 *  $busqueda = $_POST['busqueda']; 
 * }else{
 *  $busqueda = '%';
 * }
 * 
 */
// Probar la conexión
$data["usuarios"] = ["auth" => false, "nombreUs" => "invitado" ];

 $db = conectaDB();
 $busqueda = $_POST['busqueda'] ?? '';
 $valBusqueda = $busqueda;
 $sql = "SELECT * FROM perros where Nombre LIKE :nombre OR Raza LIKE :raza";
 $consulta = $db -> prepare($sql);
 $consulta -> execute(array(
                             ":nombre" => $busqueda.'%',
                             ":raza" => $busqueda.'%'));
 $resultado = $consulta->fetchAll();
 $numerosRegistros = $consulta -> rowCount();
 $data = $resultado;

//  $data["auth"] = true;
//  $data["usuario"] ["nombreUs"] = "Jose M";

if(isset($_POST["login"])){
    $usuario = clearData($_POST["usuario"] ?? '');
    $contrasenia = clearData($_POST["paswwd"] ?? '');
    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND contrasenia = : contrasenia;";
    $consulta = $db -> prepare($sql);
    $aParametros -> execute(array(
                                ":usuario" => $usuario.'%',
                                ":contrasenia" => $contrasenia.'%'));
    $consulta -> execute(params: $aParametros);
    $data["auth"] = $consulta -> fetchAll();
    $RegistroUsuario = $consulta -> rowCount();
    echo $RegistroUsuario;
    exit;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br/>
    <h1>GESTIÓN MASCOTAS</h1>

    <div>
        <?php 
        if($data["usuarios"]){
            echo "<h2>Bienvenido " . $data["usuarios"]["nombreUs"] . "</h2>";
        }else{

        }
         ?>
    </div>


    <form action="" method="post">

    <input type="text" name="busqueda" id="busqueda" value="<?php echo $valBusqueda?>">
    <input type="submit" name="buscar" id="buscar" value="Buscar">
    </form>
    
    <form action="nuevo.php" method="post">
        <input type="submit" value="+" id="anadir" name='anadir'>
    </form>


    <h2>Listado de mascotas</h2>
    
    <?php
        // $data-> array cargado con los datos a mostrar
        foreach($data as $valor){
            echo "". $valor['Nombre']. "-" . $valor['Peso'] . "-" . $valor['Raza'] . "<a href=\"borrar.php?id= ". $valor['ID'] ."\">Del</a>" ."<br/>";
        }

    ?>
</body>
</html>
