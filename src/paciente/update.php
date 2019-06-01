<?php

require_once(__DIR__ . '/header.php');

$dadosEntrada = json_decode(file_get_contents("php://input"));

if (true) {
    $paciente->setId($dadosEntrada->id);
    $paciente->setNomecompleto($dadosEntrada->nomecompleto);
    $paciente->setNomesocial($dadosEntrada->nomesocial);
    $paciente->setNomemae($dadosEntrada->nomemae);
    $paciente->setNomepai($dadosEntrada->nomepai);
    $paciente->setNascimento($dadosEntrada->nascimento);
    $paciente->setSexo($dadosEntrada->sexo);
    $paciente->setRg($dadosEntrada->rg);
    $paciente->setUfrg($dadosEntrada->ufrg);
    $paciente->setCpf($dadosEntrada->cpf);
    $paciente->setEmail($dadosEntrada->email);

    for($i=0; $i < 2; $i++){
        $endereco = new Endereco($db);
        $endereco->setTipo($dadosEntrada->endereco[$i]->tipo);
        $endereco->setCep($dadosEntrada->endereco[$i]->cep);
        $endereco->setUf($dadosEntrada->endereco[$i]->uf);
        $endereco->setCidade($dadosEntrada->endereco[$i]->cidade);
        $endereco->setBairro($dadosEntrada->endereco[$i]->bairro);
        $endereco->setLogradouro($dadosEntrada->endereco[$i]->logradouro);
        $endereco->setNumero($dadosEntrada->endereco[$i]->numero);
        $endereco->setComplemento($dadosEntrada->endereco[$i]->complemento);
        $endereco->setDonoEndereco($dadosEntrada->cpf);

        if($endereco->update()){
            http_response_code(201);
            echo json_encode(array("mensagem" => "Endereço atualizado."));
        } else {
            http_response_code(503);
            echo json_encode(array("mensagem" => "Não foi possível atualizar endereço."));
        }
    }

    for ($i=0; $i < sizeof($dadosEntrada->telefone); $i++) { 
        $telefone = new Telefone($db);
        $telefone->setNumero($dadosEntrada->telefone[$i]->numero);
        $telefone->setTipo($dadosEntrada->telefone[$i]->tipo);
        $telefone->setDonoTelefone($dadosEntrada->cpf);

        if($telefone->update()){
            http_response_code(201);
            echo json_encode(array("mensagem" => "Telefone criado."));
        } else {
            http_response_code(503);
            echo json_encode(array("mensagem" => "Não foi possível criar telefone."));
        }
    }

    if ($paciente->update()) {
        http_response_code(201);
        echo json_encode(array("mensagem" => "Paciente atualizado."));
    } else {
        http_response_code(503);
        echo json_encode(array("mensagem" => "Não foi possível atualizar paciente."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("mensagem" => "Não foi possível atualizar paciente. Dado(s) de entrada incompletos."));
}


?>