<?php

require_once(__DIR__ . '/header.php');

$dadosEntradas = json_decode(file_get_contents(""));

if (!empty($dadosEntradas->id)) {
    $telefone->setId($dadosEntradas->id);

    if ($telefone->delete()) {
        http_response_code(200);
        echo json_encode(array("mensagem" => "Telefone deletado."));
    } else {
        http_response_code(503);
        echo json_encode(array("mensagem" => "Não foi possível deletar telefone."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("mensagem" => "Não foi possível deletar telefone. Dado(s) de entrada incompletos."));
}


?>