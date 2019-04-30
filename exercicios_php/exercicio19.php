<?php 

    /*
        Criar um algoritmo com uma matriz 5x5 e
        escreva os elementos da diagonal principal
    */

    $matriz = array();
    for($i = 0; $i < 5; $i++){
      for($j = 0; $j < 5; $j++){
        $matriz[$i][$j] = rand(0, 100);
      }
    }

    for($i = 0; $i < 5; $i++){
      echo $matriz[$i][$i]." - ";
    }
    echo "<br>";

    for($i = 0; $i < 5; $i++){
      for($j = 0; $j < 5; $j++){
        echo str_pad($matriz[$i][$j], 3, '0', STR_PAD_LEFT)." ";
      }
      echo "<br>";
    }

    /*
    

    $matriz = array(
		array(1,2,3,4,5),
		array(2,3,4,5,6),		
		array(3,4,5,6,7),
		array(4,5,6,7,8),
		array(5,6,7,8,9),
    );
    */

    for ($indice = 1; $indice < 10; $indice++) {
        for ($outroIndice = 1; $outroIndice < 10; $outroIndice++) {
          if ($indice == $outroIndice) {
            $vetDP[$indice] = $mat[$indice][$outroIndice];
            $mat[$indice][$outroIndice] = $vetDP[$indice];
          }
        }
      }
    echo "Diagonal Principal: " . $vetDP[$i];
    for ($i = 1; $i < 10; $i++) {
        echo "&nbsp;&nbsp" . $vetDP[$i];
    }
       