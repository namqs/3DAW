<?php
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $perguntaSelecionada = $_GET['pergunta'];

    $conexao = mysqli_connect('localhost', 'root', '', '3daw');

    if ($conexao) {
        $query = "DELETE FROM perguntas WHERE id = $perguntaSelecionada";
        $resultado = mysqli_query($conexao, $query);

        if ($resultado) {
            $mensagem = 'Pergunta excluída com sucesso!';
        } else {
            $mensagem = 'Erro ao excluir a pergunta: ' . mysqli_error($conexao);
        }

        mysqli_close($conexao);
    } else {
        $mensagem = 'Erro na conexão com o banco de dados: ' . mysqli_connect_error();
    }
}

echo $mensagem;
?>
