<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $pergunta = $_GET['pergunta'];
    $resposta = $_GET['resposta'];

    $perguntaObj = [
        'pergunta' => $pergunta,
        'resposta' => $resposta
    ];

    $perguntas = [];

    if (file_exists('perguntas_discursivas.json')) {
        $perguntas = json_decode(file_get_contents('perguntas_discursivas.json'), true);
    }

    $perguntas[] = $perguntaObj;

    file_put_contents('perguntas_discursivas.json', json_encode($perguntas));
    echo "Pergunta adicionada com sucesso!";
}
?>
