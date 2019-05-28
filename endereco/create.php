<?php

require_once(__DIR__ . '/header.php');

$dadosEntradas = json_decode(file_get_contents(""));

if (!empty($dadosEntradas->id) && !empty($dadosEntradas->tipo) && !empty($dadosEntradas->cep) &&
    !empty($dadosEntradas->uf) && !empty($dadosEntradas->cidade) && !empty($dadosEntradas->bairro)
    && !empty($dadosEntradas->logradouro) && !empty($dadosEntradas->numero) && !empty($dadosEntradas->complemento)
    && !empty($dadosEntradas->donoendereco)) {

    $endereco->setId($dadosEntradas->id);
    $endereco->setTipo($dadosEntradas->tipo);
    $endereco->setCep($dadosEntradas->cep);
    $endereco->setUf($dadosEntradas->uf);
    $endereco->setCidade($dadosEntradas->cidade);
    $endereco->setBairro($dadosEntradas->bairro);
    $endereco->setLogradouro($dadosEntradas->logradouro);
    $endereco->setNumero($dadosEntradas->numero);
    $endereco->setComplemento($dadosEntradas->complemento);
    $endereco->setDonoendereco($dadosEntradas->donoendereco);

    if ($endereco->create()) {
        http_response_code(201);
        echo json_encode(array("mensagem" => "Endereço criado."));
    } else {
        http_response_code(503);
        echo json_encode(array("mensagem" => "Não foi possível criar endereço."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("mensagem" => "Não foi possível criar endereço. Dados de entrada incompletos."));
}


?>