<?php
$maioresValores = array();
$menoresValores = array();

public function calcularMaiorValor($valores){
    $maiorValor;
    $maiorValor = $valores=array(0);
    for($indice=0; $indice<$valores.length; $indice++){
        if($valores=array($indice) > $maiorValor){
            $maiorValor = $valores=array($indice);
        }
    }
    return $maiorValor;
}
public function calcularMenorValor($valores){
    $menorValor;
    $menorValor = $valores=array(0);
    for($indice=0; $indice<$valores.length; $indice++){
        if($valores=array($indice) < $menorValor){
            $menorValor = $valores=array($indice);
        }
    }
    return $menorValor;
}
//Nome mudado de menor para Menores
public function mostrarMenores($menoresValores){
    $ordenarEmOrdemCrescente = sort($menoresValores);
}
//nome mudade de maior para Maiores
public function mostrarMaiores($maioresValores){
    $orndenarEmOrdemDecrescente = rsort($menoresValores);
}
public function guardarValores(){
    // REVISAR DEPOIS
}
public function clicarNoBotaoRadioMaior(){
    $radioMenoresValores = // REVISAR DEPOIS
}
public function clicaNoBotaoRadioMenor(){
    // REVISAR DEPOIS
}

?>