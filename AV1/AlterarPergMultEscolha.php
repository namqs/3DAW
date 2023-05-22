<?php
// Carrega o conteúdo do arquivo JSON
$jsonFile = 'perguntas.json';
$jsonData = file_get_contents($jsonFile);

// Decodifica o conteúdo JSON em um array associativo
$perguntas = json_decode($jsonData, true);

// Verifica se a requisição foi feita via método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém a pergunta selecionada pelo usuário
    $perguntaSelecionada = $_POST['pergunta'];

    // Verifica se a pergunta selecionada existe no array de perguntas
    if (isset($perguntas[$perguntaSelecionada])) {
        // Atualiza as respostas da pergunta selecionada com os valores fornecidos pelo usuário
        $novasRespostas = explode(",", $_POST['novaResposta']);
        $perguntas[$perguntaSelecionada]['opcoes'] = $novasRespostas;

        // Codifica o array de perguntas de volta para JSON
        $jsonData = json_encode($perguntas, JSON_PRETTY_PRINT);

        // Salva o JSON atualizado de volta no arquivo
        file_put_contents($jsonFile, $jsonData);

        echo 'Respostas atualizadas com sucesso!';
    } else {
        echo 'Pergunta não encontrada.';
    }
}
?>

<!-- Formulário para seleção da pergunta e inserção das novas respostas -->
<form method="POST" action="">
    <label for="pergunta">Selecione uma pergunta:</label>
    <select name="pergunta" id="pergunta">
        <?php foreach ($perguntas as $indice => $pergunta) { ?>
            <option value="<?php echo $indice; ?>"><?php echo $pergunta['pergunta']; ?></option>
        <?php } ?>
    </select>

    <br>

    <label for="novaResposta">Novas respostas (separadas por vírgula):</label>
    <textarea name="novaResposta" id="novaResposta"></textarea>

    <br>

    <input type="submit" value="Atualizar Respostas">
</form>
    <button><a href="Home.html">Voltar</a></button>
</body>
</html>



