<?php
     $ehGET = true;
     $servidor = "localhost";
     $user = "root";
     $pass = "";
     $banco = "AV2_Fiscal";
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {    
        $nome = $_GET["nome"];
        $cpf= $_GET["cpf"];
        $sala= $_GET["sala"];
        
        $conn = new mysqli ($servidor, $user, $pass, $banco);
        $sql="INSERT INTO `selecao`(`nome`, `cpf`, `sala`) VALUES ('$nome', '$cpf', '$sala')";
        $result=$conn->query($sql);
    } else {
        $ehGET = false;
    }
?>
