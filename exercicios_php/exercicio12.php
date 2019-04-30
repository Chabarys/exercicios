<?php
    /*
        Criar um algoritmos que entre com uma
        palavra e imprima conforme o exemplo
        ◦ Palavra: sonho
        ◦ SONHO
        ◦ SONHO SONHO
        ◦ SONHO SONHO SONHO
        ◦ SONHO SONHO SONHO SONHO
    */

    $palavra = "SONHO";
    $vezes = 20;
    
    echo "Palavra: sonho<br><br>";

    for($i = 1; $i <= $vezes; $i++){
        for($j = 1; $j <= $i; $j++){
            echo $palavra." ";    
        }
        echo "<br>";
    }