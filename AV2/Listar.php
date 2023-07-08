<?php
$servidor = "localhost";
$user = "root";
$pass = "";
$banco = "AV2";
$retorno = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $conn = new mysqli($servidor, $user, $pass, $banco);
    $sql = "SELECT * FROM `candidatos`";

    $result = $conn->query($sql);
    $vetCandidatos = array(); 

    $i = 0;

    while ($linha = $result->fetch_assoc()) {
        $vetCandidatos[$i] = $linha;
        $i++;
    }

    if ($result == true) { // Correção: alterado de $result=true para $result == true
        $retorno = json_encode($vetCandidatos);
    } else {
        $retorno = json_encode("Houve um erro.");
    }
}

echo $retorno;
?>
?>
