<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // requisitando as infos e salvando nas variaveis
    $pergunta = $_POST['pergunta'];
    $respostas = $_POST['respostas'];

    $perguntaObj = [ //cria objeto com a pergunta e as respostas
        'pergunta' => $pergunta,
        'opcoes' => explode("\n", $respostas), //transforma em array
        'resposta' => 0 // Índice da resposta correta na lista de opções (começando em 0)
    ]; //

    $perguntas = []; //esvaziando

    if (file_exists('perguntas.json')) { //se o arquivo existir
        $perguntas = json_decode(file_get_contents('perguntas.json'), true); //le o arquivo e salva o conteudo na variavel
    }

    $perguntas[] = $perguntaObj;

    file_put_contents('perguntas.json', json_encode($perguntas));
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Criar Pergunta Múltipla Escolha</title>
</head>
<body>
    <form method="POST">
        <label>Digite a pergunta:</label>
        <br>
        <input type="text" name="pergunta" size="20px">
        <br>
        <br>
        <label>Respostas</label>
        <br>
        <textarea name="respostas" placeholder="a)Resposta a (Opção Correta)
                               b)Resposta b" minlength="20"></textarea>
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
