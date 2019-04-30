<?php
/*
        Entrar com 20 números e imprimir a soma
        dos positivos e o total de números negativos
    */
$numeros = array(
    7, -10, 13, 8, 4, -7.2, -12, -3.7, 3.5, -9.6, 6.5,
    -1.7, -6.2, 7, 55, 8.2, 41, 67, 21, 392
);
$positivos = array();
$negativos = array();
foreach ($numeros as $valor) {
    ($valor < 0) ?  $negativos[] = $valor : $positivos[] = $valor;
}
print_r($positivos);
print_r($negativos);

$somaPositivos = array_sum($positivos);
$quantidadeNegativos = count($negativos);

print_r($somaPositivos);
print_r($quantidadeNegativos);
