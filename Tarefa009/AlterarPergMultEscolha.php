<?php
$conexao = mysqli_connect('localhost', 'root', '', '3daw');

if ($conexao) {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $perguntaSelecionada = $_GET['pergunta'];

        $novasRespostas = explode(",", $_GET['novaResposta']);

        $query = "UPDATE perguntas SET opcoes = '" . mysqli_real_escape_string($conexao, implode(",", $novasRespostas)) . "' WHERE id = $perguntaSelecionada";

        $resultado = mysqli_query($conexao, $query);

        if ($resultado) {
            echo 'Respostas atualizadas com sucesso!';
        } else {
            echo 'Erro ao atualizar as respostas: ' . mysqli_error($conexao);
        }
    }
} else {
    echo "Erro na conexão com o banco de dados: " . mysqli_connect_error();
}
?>
