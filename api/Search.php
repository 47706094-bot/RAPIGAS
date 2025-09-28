<?php
require_once __DIR__ . '/search_functions.php';

if (isset($_GET['q'])) {
    try {
        $resultados = buscarUsuarios($_GET['q'], $pdo);
        header('Content-Type: application/json');
        echo json_encode($resultados);
    } catch (PDOException $e) {
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => 'Error en la búsqueda']);
    }
} else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Parámetro de búsqueda no proporcionado']);
}
