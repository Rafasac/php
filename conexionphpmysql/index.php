<?php
require_once 'pdoconfig.php';
 
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "Connectado $dbname a $host exitosamente.";
} catch (PDOException $pe) {
    die("No se pudo conectar a la base de datos $dbname :" . $pe->getMessage());
}
