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

    if (!empty($data->correo) && !empty($data->contrasena)) {
        $cliente->correo_cli = $data->correo;
        $cliente->contrasena_cli = $data->contrasena;
        $stmt = $cliente->login();
        $num = $stmt->rowCount();

        if ($num > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['id_cli'] = $row['id_cli'];
            $_SESSION['nombres_cli'] = $row['nombres_cli'];

            http_response_code(200);
            echo json_encode(array(
                "message" => "Login exitoso.",
                "id_cli" => $row['id_cli'],
                "nombres_cli" => $row['nombres_cli']
            ));
        } else {
            http_response_code(401);
            echo json_encode(array("message" => "Correo o contraseña incorrectos."));
        }
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "No se puede iniciar sesión. Datos incompletos."));
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(array("message" => "Error en el servidor: " . $e->getMessage()));
}
?>