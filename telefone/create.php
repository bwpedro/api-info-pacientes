<?php

require_once(__DIR__ . '/header.php');

$dadosEntradas = json_decode(file_get_contents(""));

if (!empty($dadosEntradas->id) && !empty($dadosEntradas->numero) && !empty($dadosEntradas->tipo) && !empty($dadosEntradas->donotelefone)) {

    $telefone->setId($dadosEntradas->id);
    $telefone->setNumero($dadosEntradas->numero);
    $telefone->setTipo($dadosEntradas->tipo);
    $telefone->setDonotelefone($dadosEntradas->donotelefone);

    if ($telefone->create()) {
        http_response_code(201);
        echo json_encode(array("mensagem" => "Telefone criado."));
    } else {
        http_response_code(503);
        echo json_encode(array("mensagem" => "Não foi possível criar telefone."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("mensagem" => "Não foi possível criar telefone. Dados de entrada incompletos."));
}


?>