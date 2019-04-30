<?php
/*
        Armazenar 15 números inteiros em um vetor
        e imprimir uma mensagem contendo o
        número e uma das mensagens: par ou ímpar.
    */
$numeros = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);

for ($indice = 0; $indice <= 15; $indice++) {
    if (($indice % 2) == 0) {
        echo "O número $indice é par";
        echo "<br/>";
    } else {
        echo "O número $indice é ímpar";
        echo "<br/>";
    }
}
