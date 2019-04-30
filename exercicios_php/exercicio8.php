<?php
/*
Criar um algoritmos que leia um número e
imprima todos os número de 1 até ele e o seu
produto.
*/
$numero = $_GET["numero"];

for ($indice = 1; $indice <= $numero; $indice++) {
    $valorAtual = $indice;
    echo $valorAtual;
}
