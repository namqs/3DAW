<?php

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Recebe os dados do formulário
  $nome = $_POST["nome"];
  $cpf = $_POST["cpf"];
  $matricula = $_POST["matricula"];
  $linha_alterada = $_POST["linha_alterada"];
  
  // Abre o arquivo original para leitura
  $arquivo_original = fopen("usuarios.txt", "r") or die("Não foi possível abrir o arquivo original!");
  
  // Abre um novo arquivo para escrita
  $arquivo_novo = fopen("usuarios_novo.txt", "w") or die("Não foi possível abrir o arquivo novo!");
  
  // Copia as linhas originais para o novo arquivo, exceto a linha que será alterada
  $linha_atual = 1;
  while (!feof($arquivo_original)) {
    $linha = fgets($arquivo_original);
    if ($linha_atual == $linha_alterada) {
      fwrite($arquivo_novo, $nome . ";" . $cpf . ";" . $matricula . "\n");
    } else {
      fwrite($arquivo_novo, $linha);
    }
    $linha_atual++;
  }
  
  // Fecha os arquivos
  fclose($arquivo_original);
  fclose($arquivo_novo);
  
  // Renomeia o arquivo novo para "usuarios.txt" para substituir o original
  rename("usuarios_novo.txt", "usuarios.txt");
  
  // Exibe uma mensagem de sucesso
  echo "Usuário alterado com sucesso!";
}

?>

<!-- Formulário para alteração de usuário -->
<form method="post">
  Nome: <input type="text" name="nome"><br>
  CPF: <input type="text" name="cpf"><br>
  Matrícula: <input type="text" name="matricula"><br>
  Número da linha a ser alterada: <input type="text" name="linha_alterada"><br>
  <input type="submit" value="Alterar">
</form>