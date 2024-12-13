<?php
function conectaDB()
{
    try {
        // Conexión con la base de datos
        $dsn = 'mysql:host=localhost;dbname=mascotas';
        $db = new PDO($dsn, 'root', 'root');

        // Configuración de atributos para la conexión PDO
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Modo de fetch predeterminado
        $db->exec('SET NAMES utf8'); // Configuración de codificación UTF-8

        return $db;
    } catch (PDOException $e) {
        // Manejo de errores y salida
        echo "Error de conexión: " . $e->getMessage();
        exit();
    }
}


function clearData($dato){

return $dato;

}
?>