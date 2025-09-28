<?php
require_once "../conexion.php"; // este ya incluye R::setup

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Listar todos los usuarios
        $usuarios = R::findAll('usuarios');
        echo json_encode(R::exportAll($usuarios));
        break;

    case 'POST':
        // Insertar nuevo usuario
        $data = json_decode(file_get_contents("php://input"), true);

        $usuario = R::dispense('usuarios');
        $usuario->nombre          = $data['nombre'];
        $usuario->apellido        = $data['apellido'];
        $usuario->dni             = $data['dni'];
        $usuario->direccion       = $data['direccion'];
        $usuario->telefono        = $data['telefono'];
        $usuario->cargo           = $data['cargo'];
        $usuario->responsabilidad = $data['responsabilidad'];
        $usuario->usuario         = $data['usuario'];

        R::store($usuario);
        echo json_encode(["status" => "success"]);
        break;

    case 'PUT':
        // Actualizar usuario
        $data = json_decode(file_get_contents("php://input"), true);

        $usuario = R::load('usuarios', $data['id']);
        if ($usuario->id) {
            $usuario->nombre          = $data['nombre'];
            $usuario->apellido        = $data['apellido'];
            $usuario->dni             = $data['dni'];
            $usuario->direccion       = $data['direccion'];
            $usuario->telefono        = $data['telefono'];
            $usuario->cargo           = $data['cargo'];
            $usuario->responsabilidad = $data['responsabilidad'];
            $usuario->usuario         = $data['usuario'];

            R::store($usuario);
            echo json_encode(["status" => "updated"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Usuario no encontrado"]);
        }
        break;

    case 'DELETE':
        // Eliminar usuario
        parse_str(file_get_contents("php://input"), $data);

        $usuario = R::load('usuarios', $data['id']);
        if ($usuario->id) {
            R::trash($usuario);
            echo json_encode(["status" => "deleted"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Usuario no encontrado"]);
        }
        break;
}
