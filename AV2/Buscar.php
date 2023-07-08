<?php
$ehGET = true;
$servidor = "localhost";
$user = "root";
$pass = "";
$banco = "AV2";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cpf = $_GET["cpf"];
    $conn = new mysqli($servidor, $user, $pass, $banco);
    $sql = "SELECT * FROM `selecao` WHERE `cpf` = '$cpf'";
    $result = $conn->query($sql);
    
    $discp = $result->fetch_assoc();
    
    if ($result->num_rows > 0) {
        $retorno = json_encode($discp);
    } else {
        $retorno = json_encode("Erro");
    }
} else {
    $ehGET = false;
}

echo $retorno;
?>
