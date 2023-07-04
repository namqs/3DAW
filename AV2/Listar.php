<?php
     $servidor = "localhost";
     $user = "root";
     $pass = "";
     $banco = "AV2";
     $retorno = "";
    
    if($_SERVER["REQUEST_METHOD"]=="GET")
    {    
        $conn = new mysqli ($servidor, $user, $pass, $banco);
        $sql="SELECT * FROM `candidatos`";
        
        $result=$conn->query($sql);
        $vetJogos[] = array();
        
        $i = 0;
        
        While ($linha = $result->fetch_assoc())
        {
            $vetJogos[$i] = $linha;
            $i++;
        }

        if ($result=true)
        {
            $retorno=json_encode($vetCandidatos);

        } else 
        {
            $retorno=json_encode("Houve um erro.");
        }
    }
echo $retorno;
?>