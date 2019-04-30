<?php
/*
Criar um algoritmos que imprima a tabuada
de um número.
*/
$numero = 5;//$_GET["numero"];


$tabuada = 0;
for ($indice = 0; $indice <= $tabuada; $indice++) {
    while ($tabuada <= 9) {
        $tabuada = $tabuada + 1;
        echo $numero . " x " . $tabuada . " = " . ($numero * $tabuada) . "<br>";
    }
}

echo "<hr />";

for($i = 0; $i <= 100; $i++){
    echo $numero . " x " . $i. " = " . ($numero * $i) . "<br>";
}
