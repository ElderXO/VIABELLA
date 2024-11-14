<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");

require_once '../Conexiondb/database.php';
require_once '../Modelo/Cliente.php';

try {
    $database = new Database();
    $db = $database->getConnection();
    $cliente = new Cliente($db);

    $data = json_decode(file_get_contents("php://input"));

    if (!empty($data->nombres) && !empty($data->correo) && 
        !empty($data->contrasena) && !empty($data->telefono)) {

        $cliente->nombres_cli = $data->nombres;
        $cliente->correo_cli = $data->correo;
        $cliente->contrasena_cli = $data->contrasena;
        $cliente->telefono_cli = $data->telefono;

        if($cliente->register()) {
            http_response_code(201);
            echo json_encode(array("message" => "Cliente registrado exitosamente."));
        } else {
            http_response_code(503);
            echo json_encode(array("message" => "No se pudo registrar el cliente."));
        }
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "No se puede registrar. Datos incompletos."));
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(array("message" => "Error en el servidor: " . $e->getMessage()));
}
?>