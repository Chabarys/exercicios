<?php
/*
    Entrar com 3 números e imprimi-los em
    ordem decrescente (suponha números
    diferentes).

*/
$numero1 = $_GET["numero1"];
$numero2 = $_GET["numero2"];
$numero3 = $_GET["numero3"];


$numeros = array($numero1, $numero2, $numero3);
rsort($numeros);
$decrescente = $numeros;

print_r($decrescente);
