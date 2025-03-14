<!-- 5. Script que muestre una lista de enlaces en función del perfil de usuario:
Perfil Administrador: Pagina1, Pagina2, Pagina3, Pagina4
Perfil Usuario: Pagina1, Pagina2
Author: José María Mayén Pérez 
Date: 26/09/2024- -->
<?php
$perfil = "Usuario";

switch ($perfil) {
    case "Administrador":
        echo '<a href="">Página 1</a><br>';
        echo '<a href="">Página 2</a><br>';
        echo '<a href="">Página 3</a><br>';
        echo '<a href="">Página 4</a><br>';
        break;
    
    case "Usuario":
        echo '<a href="">Página 1</a><br>';
        echo '<a href="">Página 2</a><br>';
        break;

    default:
        echo "Perfil Incorrecto";
        break;
}
?>
