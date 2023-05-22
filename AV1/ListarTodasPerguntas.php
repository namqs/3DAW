<?php

$perguntasMultiplaEscolha = [];
$perguntasDiscursivas = [];

if (file_exists('perguntas.json')) {
    $perguntasMultiplaEscolha = json_decode(file_get_contents('perguntas.json'), true);
}

if (file_exists('perguntas_discursivas.json')) {
    $perguntasDiscursivas = json_decode(file_get_contents('perguntas_discursivas.json'), true);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Perguntas e Respostas</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h2>Perguntas de Múltipla Escolha</h2>
    <table>
        <thead>
            <tr>
                <th>Pergunta</th>
                <th>Respostas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($perguntasMultiplaEscolha as $pergunta) : ?>
                <tr>
                    <td><?php echo $pergunta['pergunta']; ?></td>
                    <td>
                        <?php foreach ($pergunta['opcoes'] as $opcao) : ?>
                            <?php echo $opcao; ?><br>
                        <?php endforeach; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Perguntas Discursivas</h2>
    <table>
        <thead>
            <tr>
                <th>Pergunta</th>
                <th>Resposta</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($perguntasDiscursivas as $pergunta) : ?>
                <tr>
                    <td><?php echo $pergunta['pergunta']; ?></td>
                    <td><?php echo $pergunta['resposta']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
        <button><a href="Home.html">Voltar</a></button>
</body>
</html>
