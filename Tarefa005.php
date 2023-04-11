<?php
 $nome = "";
 $carga = "";
 $sigla = "";
 $linha = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];
    $carga = $_POST["carga"];

    echo "nome: " . $nome . " sigla: " . $sigla . " carga" . $carga;
if(!file_exists("disciplinas.txt"))
{
    $arqDisc = fopen("disciplinas.txt", "w") or die("erro ao criar arquivo");
    $linha = "nome;sigla;carga\n";
    fwrite($arqDisc, $linha);
    fclose($arqDisc);
}
    $arqDisc = fopen("disciplinas.txt", "a") or die("erro ao criar arquivo");
    $linha = $nome . ";" . $sigla . ";" . $carga . "\n";
    fwrite($arqDisc,$linha);
    fclose($arqDisc);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
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
    <h1>Criar Nova Disciplina</h1>
    <fieldset>
     <form action="Tarefa005.php" method="POST">
       Nome: <input size="10" type="text" name="nome">
       <br>
       <br>
       Sigla: <input size="3" typr="text" name="sigla">
       <br>
       <br>
       Carga horaria <input size="2" type="text" name="carga">
       <br>
       <br>
       <input type="submit" value="Criar nova disciplina">
      
     </form>
    </fieldset>
    </div>
</body>
</html>


?>
