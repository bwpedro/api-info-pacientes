<?php

require_once(__DIR__ . '/header.php');

$dadosEntrada = json_decode(file_get_contents("php://input"));

if (!empty($dadosEntrada->id)) {
    $paciente->setId($dadosEntrada->id);

    $endereco = new Endereco($db);
    $endereco->setId($dadosEntrada->id);
    if($endereco->delete()){
        http_response_code(201);
        echo json_encode(array("mensagem" => "Endereço deletado."));
    } else {
        http_response_code(503);
        echo json_encode(array("mensagem" => "Não foi possível deletar endereço."));
    }

    $telefone = new Telefone($db);
    $telefone->setId($dadosEntrada->id);
    if($telefone->delete()){
        http_response_code(201);
        echo json_encode(array("mensagem" => "Telefone deletado."));
    } else {
        http_response_code(503);
        echo json_encode(array("mensagem" => "Não foi possível deletar telefone."));
    }

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