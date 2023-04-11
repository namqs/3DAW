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
    <tr>

    </tr>
</body>
</html>