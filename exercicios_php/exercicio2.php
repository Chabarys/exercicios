<?php
/*
    Entrar com um número e informar se ele é
    divisível por 10, por 5, por 2 ou se não é
    divisível por nenhum destes.
*/
$valor1 = $_GET["valor"];

if(($valor1 % 10) == 0){
    echo "{$valor1} é divisível por 10!";
}elseif (($valor1 % 5) == 0){
    echo ($valor1 . " é divisível por 5!");
}elseif (($valor1 % 2) == 0){
    echo ($valor1 . " é divisível por 2!");
}else{
    echo "Não é divisivel por nenhum destes";
}
