<?php

/*
        Criar um algoritmo com uma matriz 5x5 e
        imprima: toda a matriz, a matriz gerada só
        com números ímpares e outra só com
        números pares
    */

$matriz = array();
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 5; $j++) {
        $matriz[$i][$j] = rand(0, 100);
    }
}

imprimir_matriz($matriz);

$matrizImpar = array();
$matrizPar = array();

for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 5; $j++) {
        $valor = $matriz[$i][$j];
        if ($valor % 2 === 0) {
            $matrizPar[$i][$j] = $valor;
        } else {
            $matrizImpar[$i][$j] = $valor;
        }
    }
}

imprimir_matriz($matrizImpar);
imprimir_matriz($matrizPar);

function imprimir_matriz($matriz){
    echo "<code>";
    for ($i = 0; $i < 5; $i++) {
        for ($j = 0; $j < 5; $j++) {
            if (isset($matriz[$i][$j])) {
                echo str_pad($matriz[$i][$j], 3, '0', STR_PAD_LEFT) . " ";
            } else {
                echo "--- ";
            }
        }
        echo "<br>";
    }
    echo "</code><br>";
}
