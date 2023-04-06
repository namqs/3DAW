<?php
    $v1 = "";
    $operacao = "";
    $resultado = 0;

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $v1 = $_GET["valor1"];
        $operacao = $_GET["op"];

        switch ($operacao) {
            case 'Cosseno':
                $resultado = cos($v1);
                break;
            case 'Seno':
                $resultado = sin($v1);
                break;
            case 'Tangente':
                $resultado = tan($v1);
                break;
            default:
                $resultado = 'Por favor, insira dados válidos.';
        }
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
             }
        h1{
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div id="form">
    <h1>Calculadora de Cos, Sin e Tan (Cosseno, Seno e Tangente)</h1>
    <form  action="Tarefa004.php" method="Get">
        <p><strong>Insira o valor:</strong></p>
        <br>
        <input size="5" type="text" name="valor1">
        <p><strong>Insira o nome da operação (Cosseno, Seno, Tangente):</strong></p>
        <br>
        <input size="8" name="op" type="text"/> <!-- Cos, Sin, Tan-->
        <br>
        <br>
        <input type="submit" name="calcular">
        <p>Resultado = <?php echo $resultado ?></p>
    </form>
    </div>
</body>
</html>