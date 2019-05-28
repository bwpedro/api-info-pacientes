<?php

require_once(__DIR__ . '/header.php');

$array_resposta = [];
$array_resposta["respostas"] = array();
$query = $paciente->read($id);

while ($pac = $query->fetchObject("Paciente")) {
    $item = array(
        "id"            => $pac->getId(),
        "nomecompleto"  => $pac->getNomecompleto(),
        "nomesocial"    => $pac->getNomesocial(),
        "nomemae"       => $pac->getNomemae(),
        "nomepai"       => $pac->getNomepai(),
        "nascimento"    => $pac->getNascimento(),
        "sexo"          => $pac->getSexo(),
        "rg"            => $pac->getRg(),
        "ufrg"          => $pac->getUfrg(),
        "cpf"           => $pac->getCpf(),
        "email"         => $pac->getEmail(),
        "datacriacao"   => $pac->getDatacriacao(),
        "dataalteracao" => $pac->getDataalteracao()
    );

    array_push($array_resposta["respostas"], $item);
}

if (empty($array_resposta["respostas"])) {
    http_response_code(404);
    echo json_encode(
        array("mensagem" => "Não há pacientes cadastrados."), JSON_UNESCAPED_UNICODE
    );
} else {
    http_response_code(200);
    echo json_encode($array_resposta);
}

?>