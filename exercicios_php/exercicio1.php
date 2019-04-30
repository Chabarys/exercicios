<?php   
/*
    Construir um algoritmo que leia 2 números e
    efetue a adição. Caso o valor somado seja
    maior que 20, este deverá ser apresentando
    somando-se a ele mais 8; caso o valor
    somado seja menor ou igual a 20, este deverá
    ser apresentado subtraindo-se 5.
*/
$valor1 = $_GET["valor1"];
$valor2 = $_GET["valor2"];

$valor1 + $valore2 = $soma;

if($soma > 20){
    $soma = $soma + 8;
}
if ( $soma < 20){
    $soma = $soma - 5;
}

echo ($soma);