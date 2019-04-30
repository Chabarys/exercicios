<?php

/*
Ler 3 números, os possíveis lados de um
triângulo, e imprimir a classificação de
acordo com tamanho dos lados.
*/

$numero1 = $_GET["numero1"];
$numero2 = $_GET["numero2"];
$numero3 = $_GET["numero3"];

if ($numero1 + $numero2 == $numero3 && $numero1 + $numero3 == $numero2 && $numero2 + $numero3 == $numero1) {
    echo "Forma um triângulo equilátero";
} elseif ($numero1 + $numero2 == $numero3 && $numero1 + $numero3 == $numero2 && $numero2 + $numero3 != $numero1) {
    echo "Forma um triângulo Isósceles";
} elseif ($numero1 + $numero2 != $numero3 && $numero1 + $numero3 != $numero2 && $numero2 + $numero3 != $numero1) {
    echo "Forma um triângulo Escaleno";
}
