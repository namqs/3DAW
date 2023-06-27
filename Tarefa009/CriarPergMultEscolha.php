<?php

$servidor = "localhost";
$user = "root";
$pass = "";
$banco = "3daw";

  if ($_SERVER['REQUEST_METHOD'] === 'GET') 
  {
    $pergunta = $_GET['pergunta'];
    $respostas = $_GET['respostas'];
 
    $conn = new mysqli($servidor, $user, $pass, $banco);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "INSERT INTO perguntas (pergunta) VALUES ('" . $conn->real_escape_string($pergunta) . "')";

    if ($conn->query($sql) === true) 
    {
        $perguntaId = $conn->insert_id;

        $opcoes = explode("\n", $respostas);
        foreach ($opcoes as $opcao) 
        {
            $sql = "INSERT INTO respostas (pergunta_id, opcao) VALUES ('$perguntaId', '" . $conn->real_escape_string($opcao) . "')";

            if ($conn->query($sql) !== true) {
                echo "Erro ao adicionar respostas: " . $conn->error;
                break;
            }
        }

        echo "Pergunta adicionada com sucesso!";
    } else {
        echo "Erro ao adicionar pergunta: " . $conn->error;
    }
    $conn->close();
}
?>
