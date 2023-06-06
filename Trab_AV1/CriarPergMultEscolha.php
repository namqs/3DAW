<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $pergunta = $_GET['pergunta'];
    $respostas = $_GET['respostas'];

    $perguntaObj = [
        'pergunta' => $pergunta,
        'opcoes' => explode("\n", $respostas),
        'resposta' => 0
    ];

    $perguntas = [];

    if (file_exists('perguntas.json')) {
        $perguntas = json_decode(file_get_contents('perguntas.json'), true);
    }

    $perguntas[] = $perguntaObj;

    file_put_contents('perguntas.json', json_encode($perguntas));

    echo "Pergunta adicionada com sucesso!";
}
?>
