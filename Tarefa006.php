<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Listar Discilinas</h1>
    <?php
    $arqDisc = fopen("disciplina.txt", "r") or die("erro ao criar arquivo");
    echo fgets($arqDisc);
    $cabecalho = explode(";", fgets($arqDisc));
    echo $cabecalho[0];
    echo "<br>";
    echo fgets($arqDisc);
    ?>
<br>
<table style="border: 3px solid">
    <tr>
        <th style="border: 3px solid"><?php echo  $cabecalho[0] ?></th>
        <th style="border: 3px solid"><?php echo  $cabecalho[1] ?></th>
        <th style="border: 3px solid"><?php echo  $cabecalho[2] ?></th>
    </tr>
    <?php
        while (!feof($arqDisc)) //enquanto nao chegar ao fim do arquivo...
        { 
            $linha = fgets($arqDisc); //le linha por linha e atribui à variavel
            $dado = explode(";", $linha); // pega a linha e divide em um array de 3 itens
            echo "<tr>"; //começa outra linha da tabela
            echo "<td style='border: 3px solid'>" . $dado[0] . "</td>"; //coloca o primeiro dado, o nome
            echo "<td style='border: 3px solid'>" . $dado[1] . "</td>"; // coloca o segundo dado, a sigla
            echo "<td style='border: 3px solid'>" . $dado[2] . "</td>"; //coloca o terceiro dado, a carga
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    fclose($arqDisc);
    ?>
</body>
</html>
