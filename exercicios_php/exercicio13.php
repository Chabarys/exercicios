<?php
/*
        Ler vários números e informar quantos
        números entre 100 e 200 foram digitados. Se
        o valor 0 for lido encerrar a execução
    */
$numeros = $_GET["numeros"];
$contador = 0;

foreach ($numeros as $numero) {
    if ($numero == 0) {
        break;
    }
    if ($numero >= 100 && $numero <= 200) {
        $contador = $contador + 1;
    }
}

echo "Total de números digitados entre 100 e 200 é de: " . $contador;
