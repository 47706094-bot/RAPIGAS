<?php
// api/search_functions.php

require_once __DIR__ . '/../conexion.php';

function buscarUsuarios($busqueda, $pdo)
{
    $busqueda = "%$busqueda%";
    $stmt = $pdo->prepare("SELECT * FROM usuarios 
                           WHERE nombre LIKE ? 
                           OR apellido LIKE ?
                           OR dni LIKE ?");
    $stmt->execute([$busqueda, $busqueda, $busqueda]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
