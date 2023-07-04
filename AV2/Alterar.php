<?php
     $ehGET = true;
     $servidor = "localhost";
     $user = "root";
     $pass = "";
     $banco = "AV2";
     $retorno = "";

    if($_SERVER["REQUEST_METHOD"]=="GET")
    {   
        $nome = $_GET["nome"];
        $cpf = $_GET["cpf"];
        $id = $_GET["id"]; 
        $email = $_GET["email"]; 
        $cargo = $_GET["cargo"]; 
        $sala = $_GET["sala"]; 
        $salaAlt = $_GET["salaAlt"]

        $conn = new mysqli ($servidor, $user, $pass, $banco);
        $sql="UPDATE `selecao` SET `nome`='$nome',`cpf`='$cpf',`id`='$id',`email`=$email,`cargo`='$cargo',`sala`='$salaAlt', WHERE `sala` = '$sala'";
        
        $result=$conn->query($sql);
        echo $sql;
    } else {
        $ehGET = false;
    }
?>