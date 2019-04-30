<?php
    /*
        Na usina de Angra dos Reis, os técnicos
        analisam a perda de massa de um material
        radioativo. Sabendo-se que este perde 25%
        de sua massa a cada 30 segundos, criar um
        algoritmos que imprima o tempo necessário
        para que a massa desse material seja menor
        que 0.10
    */
    
    $massa = 500;//$_GET["massa"];
    $tempo = 0;

    $massaAtual = $massa;
    while($massaAtual > 0.10){
        $massaAtual = $massaAtual * 0.75;
        $tempo = $tempo + 30;
    }
    echo "O tempo necessário para que a massa de " . $massa . " seja menor que 0.10, é de " . $tempo . " segundos.";