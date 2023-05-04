<?php

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Recebe os dados do formulário
  $nome = $_POST["nome"];
  $cpf = $_POST["cpf"];
  $matricula = $_POST["matricula"];
  
  // Abre o arquivo para escrita
  $arquivo = fopen("usuarios.txt", "a") or die("Não foi possível abrir o arquivo!");
  
  // Escreve os dados do usuário no arquivo
  fwrite($arquivo, $nome . ";" . $cpf . ";" . $matricula . "\n");
  
  // Fecha o arquivo
  fclose($arquivo);
  
  // Exibe uma mensagem de sucesso
  echo "Usuário cadastrado com sucesso!";
}

?>

<!-- Formulário para cadastro de usuário -->
<form method="post">
  Nome: <input type="text" name="nome"><br>
  CPF: <input type="text" name="cpf"><br>
  Matrícula: <input type="text" name="matricula"><br>
  <input type="submit" value="Cadastrar">
</form>