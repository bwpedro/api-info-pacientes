<?php

require_once(__DIR__ . '/header.php');

$dadosEntradas = json_decode(file_get_contents(""));

if (!empty($dadosEntradas->id)) {
    $paciente->setId($dadosEntradas->id);

    if ($paciente->delete()) {
        http_response_code(200);
        echo json_encode(array("mensagem" => "Paciente deletado."));
    } else {
        http_response_code(503);
        echo json_encode(array("mensagem" => "Não foi possível deletar paciente."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("mensagem" => "Não foi possível deletar paciente. Dado(s) de entrada incompletos."));
}


?>