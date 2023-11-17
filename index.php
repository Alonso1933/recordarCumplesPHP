<?php
require_once "./funciones.php";

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los valores del formulario
    $nombre = $_POST["nombre"];
    $celular = $_POST["celular"];
    $cumple = $_POST["cumple"];

    // Llamar a la función registrarAmigo
    registrarAmigo($nombre, $celular, $cumple);

    // Redirige a la misma página después de procesar el formulario
    header("Location: index.php");
    exit(); // Asegura que el script se detenga después de la redirección
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Amigos</title>
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/128/1441/1441180.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cumpleaños de amigos</h1>

    <form method="post">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre">
        <input type="text" name="celular" id="celular" placeholder="Celular">
        <label for="cumple">Fecha de Nacimiento:</label>
        <input type="date" name="cumple" id="cumple">
        <input type="submit" value="Guardar">
    </form>

    <h2>
        Amigos que cumplen años hoy <?php echo date("d/m/Y") ?> 🎉🎂🎁
    </h2>

    <?php echo cumplesHoy(); ?>
</body>
</html>