<?php
    /*
        Criar 2 vetores com 10 números inteiros
        cada. Gerar e imprimir um vetor dos números
        não comuns aos e vetores
    */
    $vetor1 = array(1,2,3,4,5,6,7,8,9,10);
    $vetor2 = array(1,2,3,4,6,8,48,1,45,65);
    
    $incomuns = array_diff($vetor1, $vetor2);
    $incomuns2 = array_diff($vetor2, $vetor1);
    
    print_r(array_merge($incomuns, $incomuns2));

    