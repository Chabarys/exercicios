<?php
/*
Entrar com o número de vezes que se deseja
imprimir a palavra SOL e imprimir
*/
$imprimir = "SOL";
$numeroDeVezes = 5; //$_GET["numero"];

for ($indice = 0; $indice < $numeroDeVezes; $indice++) {
    echo $imprimir;
    if($indice != $numeroDeVezes - 1){
        echo " - ";
    }
}
