<?php
    /*
        Criar um vetor com 20 elementos inteiros.
        Imprimir o maior e o menor, sem ordenar, o
        percentual de números pares e média dos
        elementos do vetor
    */

    $elementos = array();
    for($i = 0; $i < 20; $i++){
        $elementos[] = rand(0, 1000);
    }

    $maiorAtual = null;
    $menorAtual = null;
    $percentual;
    $media;
    $contador = 0;
    $soma = 0;

    foreach($elementos as $elemento){
        if(is_null($maiorAtual) || $elemento > $maiorAtual){
            $maiorAtual = $elemento; 
        }
        if(is_null($menorAtual) || $elemento < $menorAtual){
            $menorAtual = $elemento;
        }
        if(($elemento % 2) == 0){
            $contador = $contador + 1;
        }
        $soma += $elemento;
    }

    $percentual = $contador / count($elementos) * 100;
    $media = $soma / count($elementos);

    echo "Maior valor -> $maiorAtual .<br/>";
    echo "Menor valor -> $menorAtual .<br/>";
    echo "Percentual de números pares -> $percentual .<br/>";
    echo "Média dos elementos do vetor -> $media.<br>";
    var_dump($elementos);