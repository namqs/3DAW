<!DOCTYPE html>
<html>
    <head>
        <title>Tarefa 001</title>
    </head>
    <body>
        <?php
            $carros = array("Fusca", "Opala", "Dodge", "Corcel");  
            $j = sizeof($carros); //de forma que o J guarda a quantidade de itens no array
            $i;
                
            for($i = 0; $i < $j; $i++){ //i começa com 0 e termina ao 
                echo  "Meu carro é um $carros[$i]";
                echo "<br>";
            }
        ?>
    </body>


<html>