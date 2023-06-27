<?php
$conexao = mysqli_connect('localhost', 'root', '', '3daw');
$mensagem = '';

if ($conexao) {
    $perguntaSelecionada = $_GET['pergunta'];

    $query = "SELECT * FROM perguntas WHERE id = $perguntaSelecionada";
    $resultado = mysqli_query($conexao, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $pergunta = mysqli_fetch_assoc($resultado);
        $perguntaTipo = $pergunta['tipo'];

        if ($perguntaTipo === 'multipla_escolha') {
            $queryOpcoes = "SELECT * FROM opcoes WHERE pergunta_id = $perguntaSelecionada";
            $resultadoOpcoes = mysqli_query($conexao, $queryOpcoes);

            if ($resultadoOpcoes && mysqli_num_rows($resultadoOpcoes) > 0) {
                echo 'Pergunta: ' . $pergunta['pergunta'] . '<br>';
                echo 'Respostas:<br>';

                while ($opcao = mysqli_fetch_assoc($resultadoOpcoes)) {
                    echo '- ' . $opcao['opcao'] . '<br>';
                }
            } else {
                $mensagem = 'Nenhuma opção encontrada para essa pergunta.';
            }
        } elseif ($perguntaTipo === 'discursiva') {
            echo 'Pergunta: ' . $pergunta['pergunta'] . '<br>';
            echo 'Resposta: ' . $pergunta['resposta'] . '<br>';
        } else {
            $mensagem = 'Tipo de pergunta inválido.';
        }
    } else {
        $mensagem = 'Pergunta não encontrada!';
    }

    mysqli_close($conexao);
} else {
    $mensagem = 'Erro na conexão com o banco de dados: ' . mysqli_connect_error();
}

echo $mensagem;
?>
