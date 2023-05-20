<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: 404.html');
    exit;
}

$dbHost = 'mysql8-container';
$port = '3306';
$dbName = 'Test_Audax';
$dbUser = 'root';
$dbPass = 'secret';

try {
    $dsn = "mysql:host=$dbHost;port=$port;dbname=$dbName;charset=utf8mb4";
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Conexión exitosa a la base de datos';
} catch (PDOException $e) {
    die('Error al conectarse a la base de datos: ' . $e->getMessage());
}

try {
    $searchTerm = $_POST['searchInput'];
} catch (JsonException $e) {
    die('Error al recuperar parametro POST enviado: ' . $e->getMessage());
}

$sql = "INSERT INTO historial_busquedas (termino_busqueda) VALUES (:searchTerm)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':searchTerm', $searchTerm);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo 'El término de búsqueda se ha guardado en el historial';
} else {
    echo 'Error al guardar el término de búsqueda en el historial';
}

