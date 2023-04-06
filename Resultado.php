<?php
    $v1 = "";
    $v2 = "";
    $operacao = "";
    $resultado = 0;

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $v1 = $_GET["valor1"];
        $v2 = $_GET["valor2"];
        $operacao = $_GET["op"];

        switch ($operacao) {
            case '+':
                $resultado = $v1 + $v2;
                break;
            case '-':
                $resultado = $v1 - $v2;
                break;
            case '/':
                $resultado = $v1 / $v2;
                break;
            case '*':
                $resultado = $v1 * $v2;
                break;
            default:
                $resultado = sqrt($v1);
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
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div id="form">
    <h1>Calculadora</h1>
    <form  action="Resultado.php" method="Get">
        <input size="5" type="text" name="valor1">
        <input size="5" name="op" type="text"/> <!-- +, -, /, *, raiz-->
        <input size="5" type="text" name="valor2">
        <br>
        <br>
        <input type="submit" name="calcular">
        <p>Resultado = <?php echo $resultado ?></p>
    </form>
    </div>
</body>
</html>
