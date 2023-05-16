<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pergunta = $_POST['pergunta'];
    $resposta = $_POST['resposta'];

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
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Criar Pergunta Discursiva</title>
</head>
<body>
    <form method="POST">
        <label>Digite a pergunta:</label>
        <br>
        <input type="text" name="pergunta" size="20px">
        <br>
        <br>
        <label>Resposta Correta</label>
        <br>
        <textarea name="resposta" placeholder="Digite aqui a resposta" minlength="20"></textarea>
        <br>
        <button type="submit">Enviar</button>
        <br>
        <br>
        <button><a href="Home.html">Voltar</a></button>
    </form>
</body>
</html>
