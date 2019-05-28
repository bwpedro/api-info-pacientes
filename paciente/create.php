<?php

require_once(__DIR__ . '/header.php');

$dadosEntradas = json_decode(file_get_contents(""));

if (!empty($dadosEntradas->id) && !empty($dadosEntradas->nomecompleto) && !empty($dadosEntradas->nomesocial) &&
    !empty($dadosEntradas->nomemae) && !empty($dadosEntradas->nomepai) && !empty($dadosEntradas->nascimento)
    && !empty($dadosEntradas->sexo) && !empty($dadosEntradas->rg) && !empty($dadosEntradas->ufrg)
    && !empty($dadosEntradas->cpf) && !empty($dadosEntradas->email) && !empty($dadosEntradas->datacriacao)
    && !empty($dadosEntradas->dataalteracao)) {

    $paciente->setId($dadosEntradas->id);
    $paciente->setNomecompleto($dadosEntradas->nomecompleto);
    $paciente->setNomesocial($dadosEntradas->nomesocial);
    $paciente->setNomemae($dadosEntradas->nomemae);
    $paciente->setNomepai($dadosEntradas->nomepai);
    $paciente->setNascimento($dadosEntradas->nascimento);
    $paciente->setSexo($dadosEntradas->sexo);
    $paciente->setRg($dadosEntradas->rg);
    $paciente->setUfrg($dadosEntradas->ufrg);
    $paciente->setCpf($dadosEntradas->cpf);
    $paciente->setEmail($dadosEntradas->email);
    $paciente->setDatacriacao($dadosEntradas->datacriacao);
    $paciente->setDataalteracao($dadosEntradas->dataalteracao);

    if ($paciente->create()) {
        http_response_code(201);
        echo json_encode(array("mensagem" => "Paciente criado."));
    } else {
        http_response_code(503);
        echo json_encode(array("mensagem" => "Não foi possível criar paciente."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("mensagem" => "Não foi possível criar paciente. Dados de entrada incompletos."));
}


?>