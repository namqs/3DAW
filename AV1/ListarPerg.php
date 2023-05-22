<?php

$perguntasMultiplaEscolha = [];
$perguntasDiscursivas = [];

if (file_exists('perguntas.json')) {
    $perguntasMultiplaEscolha = json_decode(file_get_contents('perguntas.json'), true);
}

if (file_exists('perguntas_discursivas.json')) {
    $perguntasDiscursivas = json_decode(file_get_contents('perguntas_discursivas.json'), true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $perguntaSelecionada = $_POST['pergunta'];

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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Exibir Pergunta Específica</title>
</head>
<body>
    <form method="POST">
        <label>Selecione a pergunta que deseja exibir:</label>
        <br>
        <select name="pergunta">
            <?php foreach ($perguntasMultiplaEscolha as $pergunta) : ?>
                <option value="<?php echo $pergunta['pergunta']; ?>"><?php echo $pergunta['pergunta']; ?></option>
            <?php endforeach; ?>
            <?php foreach ($perguntasDiscursivas as $pergunta) : ?>
                <option value="<?php echo $pergunta['pergunta']; ?>"><?php echo $pergunta['pergunta']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <br>
        <button type="submit">Exibir</button>
    </form>
    <br>
    <button><a href="Home.html">Voltar</a></button>
</body>
</html>
