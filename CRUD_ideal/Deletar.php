<?php

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Recebe o número da linha a ser deletada
  $linha_deletada = $_POST["linha_deletada"];
  
  // Abre o arquivo original para leitura
  $arquivo_original = fopen("usuarios.txt", "r") or die("Não foi possível abrir o arquivo original!");
  
  // Abre um novo arquivo para escrita
  $arquivo_novo = fopen("usuarios_novo.txt", "w") or die("Não foi possível abrir o arquivo novo!");
  
  // Copia as linhas originais para o novo arquivo, exceto a linha que será deletada
  $linha_atual = 1;
  while (!feof($arquivo_original)) {
    $linha = fgets($arquivo_original);
    if ($linha_atual != $linha_deletada) {
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
  echo "Usuário deletado com sucesso!";
}

?>

<!-- Formulário para deleção de usuário -->
<form method="post">
  Número da linha a ser deletada: <input type="text" name="linha_deletada"><br>
  <input type="submit" value="Deletar">
</form>
