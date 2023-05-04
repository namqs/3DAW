<?php

// Abre o arquivo para leitura
$arquivo = fopen("usuarios.txt", "r") or die("Não foi possível abrir o arquivo!");

// Cria uma tabela para exibir os usuários
echo "<table>";
echo "<tr><th>Nome</th><th>CPF</th><th>Matrícula</th></tr>";

// Lê cada linha do arquivo e exibe os dados do usuário em uma nova linha da tabela
while (!feof($arquivo)) {
  $linha = fgets($arquivo);
  $usuario = explode(";", $linha);
  if (count($usuario) == 3) {
    echo "<tr><td>".$usuario[0]."</td><td>".$usuario[1]."</td><td>".$usuario[2]."</td></tr>";
  }
}

// Fecha o arquivo
fclose($arquivo);

// Fecha a tabela
echo "</table>";

?>