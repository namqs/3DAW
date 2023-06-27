<?php
    $servidor = "localhost"; 
    $user = "root"; 
    $pass = ""; 
    $banco = "3daw";

    if ($_SERVER['REQUEST_METHOD'] === 'GET') 
    {
      $pergunta = $_GET['pergunta'];
      $resposta = $_GET['resposta'];
      
      $conn = new mysqli($servidor, $user, $pass, $banco);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "INSERT INTO `perguntas` (`pergunta`, `resposta`) VALUES ('" . $conn->real_escape_string($pergunta) . "', '" . $conn->real_escape_string($resposta) . "')";

    if ($conn->query($sql) === true) {
        echo "Pergunta adicionada com sucesso!";
    } else {
        echo "Erro ao adicionar pergunta: " . $conn->error;
    }
    $conn->close();
}
?>
