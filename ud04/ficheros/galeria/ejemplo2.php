<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario</title>
    </head>
    <body>
        <h1>Subida de archivos</h1>
        <form action="upload_file.php" method="POST" enctype="multipart/form-data"> <!-- Añadir el enctype -->
            <label>Fichero:</label>
            <input type="file" name="file"><br/>
            <button type="submit" name="enviar">Enviar</button>
        </form>
    </body>
</html>