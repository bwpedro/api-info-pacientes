<?php

require_once(__DIR__ . '/header.php');

$array_resposta = [];
$array_resposta["respostas"] = array();
$query = $telefone->read($id);

while ($tel = $query->fetchObject("Telefone")) {
    $item = array(
        "id"           => $tel->getId(),
        "numero"       => $tel->getNumero(),
        "tipo"         => $tel->getTipo(),
        "donotelefone" => $tel->getDonotelefone(),
    );

    array_push($array_resposta["respostas"], $item);
}

if (empty($array_resposta["respostas"])) {
    http_response_code(404);
    echo json_encode(
        array("mensagem" => "Não há telefones cadastrados."), JSON_UNESCAPED_UNICODE
    );
} else {
    http_response_code(200);
    echo json_encode($array_resposta);
}

?>