<?php
function generarNombreUsuario($nombre, $apellido) {
    // Normalizar y quitar espacios
    $nombre = trim($nombre);
    $apellido = trim($apellido);

    // Primera letra del nombre
    $inicial = mb_substr($nombre, 0, 1, 'UTF-8');

    // Unir con apellido en minúsculas
    $usuario = mb_strtolower($inicial . $apellido, 'UTF-8');

    return $usuario;
}
