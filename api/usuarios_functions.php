<?php
function obtenerUsuarios($pdo) {
    $stmt = $pdo->query("SELECT * FROM usuarios");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertarUsuario($pdo, $data) {
    $stmt = $pdo->prepare("INSERT INTO usuarios
        (nombre, apellido, dni, direccion, telefono, cargo, responsabilidad, usuario)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    return $stmt->execute([
        $data['nombre'],
        $data['apellido'],
        $data['dni'],
        $data['direccion'],
        $data['telefono'],
        $data['cargo'],
        $data['responsabilidad'],
        $data['usuario']
    ]);
}
