<?php
$nome = "";
$cpfBuscar = "";
$cpf = "";
$mat = "";
$linha = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
   $nome = $_POST["nome"];
   $cpfBuscar = $_POST["cpfBuscar"];
   $cpf = $_POST["cpf"];
   $mat = $_POST["mat"];
if(!file_exists("dado2s.txt")) // se nao existir o novo arq
{
   $arqDisc = fopen("dados2.txt", "w") or die("erro ao criar arquivo"); //crie o novo arq
   $linha = "nome; cpf;matricula\n";
   if($) //SE O CPF NAO FOR IGUAL...
   fwrite($arqDisc, $linha);
   fclose($arqDisc);
}
   $arqDisc = fopen("dados.txt", "a") or die("erro ao criar arquivo"); //se ja existir
   $linha = $nome . ";" . $cpf . ";" . $mat . "\n";
   fwrite($arqDisc,$linha);
   fclose($arqDisc);
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar</title>
    <style>
        body {
            background-color: #d6a5fa;
        }
        #form {
            display: grid;
            justify-content: center;
            margin-top: 200px;
            color: white;
            background-color: 
             }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        fieldset{
            background-color:#ed9fe0;
        }
    </style>
</head>
<body>
    <div id="form">
    <h1>Alterar Cadastro</h1> <!-- Precisa pegar o arq, encontrar o aluno imformado e alterar-->
    <fieldset>
     <form action="Alterar007.php" method="POST">
        <br>
       CPF do cadastro a ser alterado:
       <br>
       <br>
       <input size="30" type="text" name="cpfBuscar">
       <br>
       <br>
       *Dados nova versão:
       <br>
       <br>
       Nome: <input size="10" type="text" name="nome">
       <br>
       <br>
       CPF: <input size="30" type="text" name="cpf">
       <br>
       <br>
       Matrícula: <input size="15" type="text" name="mat">
       <br>
       <br>
      
     </form>
    </fieldset>
    </div>
</body>
</html>
