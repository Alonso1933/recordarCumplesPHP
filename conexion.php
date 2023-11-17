<?php
$host = 'db_mysql:3306';  // Puede ser 'localhost' o la dirección IP del servidor MySQL
$dbname = 'db_prueba';
$user = 'root';
$pass = 'notSecureChangeMe';

try {
    // Crear una instancia de la clase PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    // Configurar el modo de error para que PDO lance excepciones en caso de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Conexión exitosa a la base de datos";
} catch (PDOException $e) {
    // Manejar errores de conexión
    echo "Error de conexión: " . $e->getMessage();
}
?>