<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $perguntaSelecionada = $_GET['pergunta'];

    $perguntasMultiplaEscolha = [];
    $perguntasDiscursivas = [];
    $mensagem = '';

    if (file_exists('perguntas.json')) {
        $perguntasMultiplaEscolha = json_decode(file_get_contents('perguntas.json'), true);
        foreach ($perguntasMultiplaEscolha as $index => $pergunta) {
            if ($pergunta['pergunta'] === $perguntaSelecionada) {
                unset($perguntasMultiplaEscolha[$index]);
                $mensagem = 'Pergunta excluída com sucesso!';
                break;
            }
        }
        file_put_contents('perguntas.json', json_encode(array_values($perguntasMultiplaEscolha), JSON_PRETTY_PRINT));
    }

    if (file_exists('perguntas_discursivas.json')) {
        $perguntasDiscursivas = json_decode(file_get_contents('perguntas_discursivas.json'), true);
        foreach ($perguntasDiscursivas as $index => $pergunta) {
            if ($pergunta['pergunta'] === $perguntaSelecionada) {
                unset($perguntasDiscursivas[$index]);
                $mensagem = 'Pergunta excluída com sucesso!';
                break;
            }
        }
        file_put_contents('perguntas_discursivas.json', json_encode(array_values($perguntasDiscursivas), JSON_PRETTY_PRINT));
    }

    if ($mensagem === '') {
        $mensagem = 'Pergunta não encontrada!';
    }

    echo $mensagem;
}
?>
