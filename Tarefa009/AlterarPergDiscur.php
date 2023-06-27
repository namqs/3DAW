<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $perguntaSelecionada = $_GET['pergunta'];
    $novaResposta = $_GET['novaResposta'];

    $conexao = mysqli_connect('localhost', 'root', '', '3daw');

    if ($conexao) 
    {
        $consulta = "UPDATE perguntas_discursivas SET resposta = '$novaResposta' WHERE id = $perguntaSelecionada";
        $resultado = mysqli_query($conexao, $consulta);

        if ($resultado) {
            echo 'Resposta atualizada com sucesso!';
        } else {
            echo 'Ocorreu um erro ao atualizar a resposta.';
        }
        mysqli_close($conexao);
    } else {
        echo 'Erro ao conectar ao banco de dados.';
    }
}
?>
