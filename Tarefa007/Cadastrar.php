<?php
 $nome = "";
 $cpf = "";
 $mat = "";
 $linha = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $mat = $_POST["mat"];
if(!file_exists("dados.txt"))
{
    $arqDisc = fopen("dados.txt", "w") or die("erro ao criar arquivo");
    $linha = "nome; cpf;matricula\n";
    fwrite($arqDisc, $linha);
    fclose($arqDisc);
}
    $arqDisc = fopen("dados.txt", "a") or die("erro ao criar arquivo");
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
    </style>
</head>
<body>
    <div id="form">
    <h1>Cadastrar Aluno</h1>
    <fieldset>
     <form action="Cadastrar.php" method="POST">
       Nome: <input size="10" type="text" name="nome">
       <br>
       <br>
       CPF: <input size="30" type="text" name="cpf">
       <br>
       <br>
       Matrícula: <input size="15" type="text" name="mat">
       <br>
       <br>
       <input type="submit" value="Cadastrar">
       <br>
       <br>
       <button><a href="Home.html">Voltar pro Menu</a></button>
     </form>
    </fieldset>
    <br>
    <br>
    </div>
    <br>
</body>
</html>
