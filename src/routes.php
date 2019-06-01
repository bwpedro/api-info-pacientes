<?php
use Pecee\SimpleRouter\SimpleRouter;
use function GuzzleHttp\json_encode;

SimpleRouter::get('/', function() {
    echo "API PACIENTES - ON......... Realizado por: Pedro Warmling Botelho e Felipe Duckeiko.";
});

SimpleRouter::get('/paciente/{id?}', function($id = 'all') {
    require('paciente/read.php');
});

SimpleRouter::get('/telefone/{id?}', function($id = 'all') {
    require('telefone/read.php');
});

SimpleRouter::get('/endereco/{id?}', function($id = 'all') {
    require('endereco/read.php');
});

SimpleRouter::post('/paciente/criar/', function() {
    require('paciente/create.php');
});

SimpleRouter::delete('/paciente/deletar/', function() {
    require('paciente/delete.php');
});


SimpleRouter::put('/paciente/atualizar/', function() {
    require('paciente/update.php');
});

SimpleRouter::get('/erro', function() {
    echo "API PACIENTES - Rota inválida......... Realizado por: Pedro Warmling Botelho e Felipe Duckeiko.";
});

SimpleRouter::error(function() {
    SimpleRouter::response()->redirect('/erro');
});

?>