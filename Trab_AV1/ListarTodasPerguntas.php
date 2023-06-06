<?php
$perguntasMultiplaEscolha = [];
$perguntasDiscursivas = [];

if (file_exists('perguntas.json')) {
    $perguntasMultiplaEscolha = json_decode(file_get_contents('perguntas.json'), true);
}

if (file_exists('perguntas_discursivas.json')) {
    $perguntasDiscursivas = json_decode(file_get_contents('perguntas_discursivas.json'), true);
}

$perguntas = [
    'perguntasMultiplaEscolha' => $perguntasMultiplaEscolha,
    'perguntasDiscursivas' => $perguntasDiscursivas
];

//retorna as perguntas no formato JSON
header('Content-Type: application/json');
echo json_encode($perguntas);
?>
