<?php

require_once(__DIR__ . '/header.php');

$array_resposta = [];
$array_resposta["dadosEndereco"] = array();
$query = $endereco->read($id);

while ($end = $query->fetchObject("Endereco")) {
    $item = array(
        "id"           => $end->getId(),
        "tipo"         => $end->getTipo(),
        "cep"          => $end->getCep(),
        "uf"           => $end->getUf(),
        "cidade"       => $end->getCidade(),
        "bairro"       => $end->getBairro(),
        "logradouro"   => $end->getLogradouro(),
        "numero"       => $end->getNumero(),
        "complemento"  => $end->getComplemento(),
        "donoendereco" => $end->getDonoendereco()
    );

    array_push($array_resposta["dadosEndereco"], $item);
}

if (empty($array_resposta["dadosEndereco"])) {
    http_response_code(404);
    echo json_encode(
        array("mensagem" => "Não há endereços cadastrados."), JSON_UNESCAPED_UNICODE
    );
} else {
    http_response_code(200);
    echo json_encode($array_resposta);
}

?>