<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Cadastros</title>
    <style>
        body {
            background-color: #d6a5fa;
        }
        h1{
            text-align: center;
            margin-bottom: 20px;
            color: white;
            padding-top: 100px;
        }
        #table {
            display: grid;
            justify-content: center;
            margin-top: 10px;
             }
             table{
                 background-color: white;
             }
    </style>
</head>
<body>
    <h1>Listar Discilinas</h1>
    <?php
    $arqDisc = fopen("dados.txt", "r") or die("erro ao criar arquivo");
    echo fgets($arqDisc);
    $cabecalho = explode(";", fgets($arqDisc));
    echo $cabecalho[0];
    echo "<br>";
    echo fgets($arqDisc);
    ?>
<br>
<div id="table">
<table style="border: 3px solid">
    <tr>
        <th style="border: 1px solid"><?php echo  $cabecalho[0] ?></th>
        <th style="border: 1px solid"><?php echo  $cabecalho[1] ?></th>
        <th style="border: 1px solid"><?php echo  $cabecalho[2] ?></th>
    </tr>
    <?php
        while (!feof($arqDisc)) //enquanto nao chegar ao fim do arquivo...
        { 
            $linha = fgets($arqDisc); //le linha por linha e atribui à variavel
            $dado = explode(";", $linha); // pega a linha e divide em um array de 3 itens
            echo "<tr>"; //começa outra linha da tabela
            echo "<td style='border: 1px solid'>" . $dado[0] . "</td>"; //coloca o primeiro dado, o nome
            echo "<td style='border: 1px solid'>" . $dado[1] . "</td>"; // coloca o segundo dado, o cpf
            echo "<td style='border: 1px solid'>" . $dado[2] . "</td>"; //coloca o terceiro dado, a matricula
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    fclose($arqDisc);
    ?>
    </div>
    <button style="margin-letf= 200px"><a href="Home.html">Voltar para o menu</a></button>
</body>
</html>
