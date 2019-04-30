<?php
/*
        Chico tem 1,50m e cresce 2 centímetros por
        ano, enquanto Juca tem 1,10m e cresce 3
        centímetros por ano. Construir um algoritmos
        que calcule e imprima quantos anos serão
        necessários para que Juca seja maior que
        Chico
    */
$alturaChico = 1.50;
$alturajuca = 1.10;
$anos = 0;

while ($alturajuca < $alturaChico) {
    $alturaChico = $alturaChico + 0.02;
    $alturaChico += 0.02;
    $alturajuca = $alturajuca + 0.03;
    $anos = $anos + 1;
}
echo "Serão necessários " . $anos . " anos para que Juca seja maior que Chico.";
