<!DOCTYPE html>
<html>
<head>
	<style>
    	table, th, td {
 		 border: 1px solid;
         padding: 20px;
        }
    </style>
</head>
<body style="background-color: pink;">
<h1>Array</h1>
<table >
	<tr>
    	<th>Nome</th>
        <th>Nota</th>
        <th>Status</th>
    </tr>

<?php
	$nomes = array("jose", "neusa", "antonio", "erika", "tiago", "chico");
    $notas = array(7.5,7.0,7.1,8.8,8.5,7.7);
    
	for ($x =0;$x <=5; $x++) { //tr = linh, TH = coluna
	echo "<tr>"; //pula linha
    echo "<td>"; //a caixinha do nome
    echo $nomes[$x]; // preenche a caixinha do nome com o nome
    echo "<td>";
    echo $notas[$x]; //botando a nota
    echo "<td>";
    	if ($notas[$x] >= 8.0) {
        	echo "aprovado";
        } else {
        	echo "desaprovado";
          }
   } 
?>

</body>
</html>
