<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

session_start();

// Verifica si la sesión está activa
if (isset($_SESSION['id_cli'])) {
    // Destruye todas las variables de sesión
    session_unset();
    // Destruye la sesión
    session_destroy();

    http_response_code(200);
    echo json_encode(array("message" => "Sesión cerrada exitosamente."));
} else {
    http_response_code(400);
    echo json_encode(array("message" => "No hay sesión activa."));
}
?>