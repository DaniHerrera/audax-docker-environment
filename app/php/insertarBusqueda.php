<?php
require_once './../vendor/autoload.php';
use App\Database\DatabaseConnexion;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: 404.html');
    exit;
}

$database = DatabaseConnexion::getInstance();
$pdo = $database->getConnection();

try {
    $searchTerm = $_POST['searchInput'];
}catch (\InvalidArgumentException $ex) {
    echo 'Se ha producido el error '.$ex;
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

