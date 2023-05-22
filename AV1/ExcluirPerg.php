<?php

$perguntasMultiplaEscolha = [];
$perguntasDiscursivas = [];
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $perguntaSelecionada = $_POST['pergunta'];

    // Procurar e excluir a pergunta selecionada
    $excluida = false;

    if (file_exists('perguntas.json')) {
        $perguntasMultiplaEscolha = json_decode(file_get_contents('perguntas.json'), true);
        foreach ($perguntasMultiplaEscolha as $index => $pergunta) {
            if ($pergunta['pergunta'] === $perguntaSelecionada) {
                unset($perguntasMultiplaEscolha[$index]);
                $excluida = true;
                break;
            }
        }
    }

    if (file_exists('perguntas_discursivas.json')) {
        $perguntasDiscursivas = json_decode(file_get_contents('perguntas_discursivas.json'), true);
        foreach ($perguntasDiscursivas as $index => $pergunta) {
            if ($pergunta['pergunta'] === $perguntaSelecionada) {
                unset($perguntasDiscursivas[$index]);
                $excluida = true;
                break;
            }
        }
    }

    // Salvar os arrays atualizados nos arquivos JSON
    file_put_contents('perguntas.json', json_encode(array_values($perguntasMultiplaEscolha), JSON_PRETTY_PRINT));
    file_put_contents('perguntas_discursivas.json', json_encode(array_values($perguntasDiscursivas), JSON_PRETTY_PRINT));

    if ($excluida) {
        $mensagem = "Pergunta e suas respostas foram excluídas com sucesso!";
    } else {
        $mensagem = "Pergunta não encontrada!";
    }
}

$perguntasMultiplaEscolha = json_decode(file_get_contents('perguntas.json'), true);
$perguntasDiscursivas = json_decode(file_get_contents('perguntas_discursivas.json'), true);
$perguntas = array_merge($perguntasMultiplaEscolha, $perguntasDiscursivas);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Excluir Pergunta</title>
</head>
<body>
    <form method="POST">
        <label>Selecione a pergunta que deseja excluir:</label>
        <br>
        <select name="pergunta">
            <?php foreach ($perguntas as $pergunta) : ?>
                <option value="<?php echo $pergunta['pergunta']; ?>"><?php echo $pergunta['pergunta']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <br>
        <button type="submit">Excluir</button>
    </form>
    <br>
    <p><?php echo $mensagem; ?></p>
    <br>
    <button><a href="Home.html">Voltar</a></button>
</body>
</html>