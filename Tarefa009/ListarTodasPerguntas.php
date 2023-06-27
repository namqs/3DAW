<?php
$mensagem = '';
$perguntasMultiplaEscolha = [];
$perguntasDiscursivas = [];

$conexao = mysqli_connect('localhost', 'root', '', '3daw');

if (!$conexao) {
    $mensagem = 'Erro na conexão com o banco de dados: ' . mysqli_connect_error();
} else {

    $consultaMultiplaEscolha = "SELECT p.pergunta, GROUP_CONCAT(o.opcao SEPARATOR '|') AS opcoes
                               FROM perguntas p
                               INNER JOIN opcoes o ON p.id = o.pergunta_id
                               WHERE p.tipo = 'multiplaEscolha'
                               GROUP BY p.id";

    $resultadoMultiplaEscolha = mysqli_query($conexao, $consultaMultiplaEscolha);

    if ($resultadoMultiplaEscolha) {
        while ($row = mysqli_fetch_assoc($resultadoMultiplaEscolha)) {
            $pergunta = [
                'pergunta' => $row['pergunta'],
                'opcoes' => explode('|', $row['opcoes'])
            ];
            $perguntasMultiplaEscolha[] = $pergunta;
        }
    } else {
        $mensagem = 'Erro ao buscar perguntas de múltipla escolha: ' . mysqli_error($conexao);
    }

    $consultaDiscursivas = "SELECT pergunta, resposta FROM perguntas WHERE tipo = 'discursiva'";
    $resultadoDiscursivas = mysqli_query($conexao, $consultaDiscursivas);

    if ($resultadoDiscursivas) {
        while ($row = mysqli_fetch_assoc($resultadoDiscursivas)) {
            $perguntaDiscursiva = [
                'pergunta' => $row['pergunta'],
                'resposta' => $row['resposta']
            ];
            $perguntasDiscursivas[] = $perguntaDiscursiva;
        }
    } else {
        $mensagem = 'Erro ao buscar perguntas discursivas: ' . mysqli_error($conexao);
    }

    $perguntas = [
        'perguntasMultiplaEscolha' => $perguntasMultiplaEscolha,
        'perguntasDiscursivas' => $perguntasDiscursivas
    ];

    mysqli_close($conexao);
    header('Content-Type: application/json');
    echo json_encode($perguntas);
}
?>