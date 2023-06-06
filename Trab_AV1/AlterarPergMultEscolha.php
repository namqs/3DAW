<?php
$jsonFile = 'perguntas.json';
$jsonData = file_get_contents($jsonFile);

$perguntas = json_decode($jsonData, true);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $perguntaSelecionada = $_GET['pergunta'];

    if (isset($perguntas[$perguntaSelecionada])) {
        $novasRespostas = explode(",", $_GET['novaResposta']);
        $perguntas[$perguntaSelecionada]['opcoes'] = $novasRespostas;
        $jsonData = json_encode($perguntas, JSON_PRETTY_PRINT);
        file_put_contents($jsonFile, $jsonData);

        echo 'Respostas atualizadas com sucesso!';
    } else {
        echo 'Pergunta não encontrada.';
    }
}
?>
