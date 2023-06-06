<?php
$perguntasMultiplaEscolha = [];
$perguntasDiscursivas = [];

if (file_exists('perguntas.json')) {
    $perguntasMultiplaEscolha = json_decode(file_get_contents('perguntas.json'), true);
}

if (file_exists('perguntas_discursivas.json')) {
    $perguntasDiscursivas = json_decode(file_get_contents('perguntas_discursivas.json'), true);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $perguntaSelecionada = $_GET['pergunta'];

    $encontrada = false;

    // Procurar na lista de perguntas de múltipla escolha
    foreach ($perguntasMultiplaEscolha as $pergunta) {
        if ($pergunta['pergunta'] === $perguntaSelecionada) {
            echo "Pergunta: " . $pergunta['pergunta'] . "<br>";
            echo "Respostas:<br>";
            foreach ($pergunta['opcoes'] as $opcao) {
                echo "- " . $opcao . "<br>";
            }
            $encontrada = true;
            break;
        }
    }

    // Se a pergunta não foi encontrada nas perguntas de múltipla escolha, procurar nas perguntas discursivas
    if (!$encontrada) {
        foreach ($perguntasDiscursivas as $pergunta) {
            if ($pergunta['pergunta'] === $perguntaSelecionada) {
                echo "Pergunta: " . $pergunta['pergunta'] . "<br>";
                echo "Resposta: " . $pergunta['resposta'] . "<br>";
                $encontrada = true;
                break;
            }
        }
    }

    if (!$encontrada) {
        echo "Pergunta não encontrada!";
    }
}
?>
