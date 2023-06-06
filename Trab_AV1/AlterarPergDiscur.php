<?php
// Carrega o conteúdo do arquivo JSON
$jsonFile = 'perguntas_discursivas.json';
$jsonData = file_get_contents($jsonFile);

$perguntas = json_decode($jsonData, true);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $perguntaSelecionada = $_GET['pergunta'];
    if (isset($perguntas[$perguntaSelecionada])) {
        $novaResposta = $_GET['novaResposta'];
        $perguntas[$perguntaSelecionada]['resposta'] = $novaResposta;

        $jsonData = json_encode($perguntas, JSON_PRETTY_PRINT);
        file_put_contents($jsonFile, $jsonData);
        echo 'Resposta atualizada com sucesso!';
    } else {
        echo 'Pergunta não encontrada.';
    }
}
?>
