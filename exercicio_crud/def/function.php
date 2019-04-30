<?php

function connection(){ // Função que faz conectar com o banco de dados
    return new PDO("pgsql:host=localhost dbname=controlware user=postgres password=postgres");
}

function json_error($message = ""){ // Função que faz o erro de código aparecer em forma de Alert
    $json = ["status" => 2, "message" => $message]; // jason = variavel
    die(json_encode($json)); // 'Die' faz a função parar 'morrer' 
}

function json_success($data = []){ // Função que faz o sucesso de uma ação no cadastro aparecer em forma de cadastro
    $json = ["status" => 0, "data" => $data];
    die(json_encode($json)); // 'Die' faz a função parar 'morrer'
}

function value_number($value){ // Função que converte o numero do formato brasileiro para o formato de sistema
    $pos_virgula = strpos($value, ","); // 'strpos()' é uma função que procura a virgula
    $pos_ponto = strpos($value, "."); // 'strpos()' é uma função que procura o ponto
	// Esses "if else" são a lógica para tratar os numeros...
    if($pos_virgula === FALSE && $pos_ponto === FALSE) { // Se não tiver vírgula nem ponto
        // NÃO FAZ NADA
    }elseif($pos_virgula === FALSE && $pos_ponto !== FALSE) { // Se não tiver vírgula, e tiver ponto
        // NÃO FAZ NADA
    }elseif($pos_virgula !== FALSE && $pos_ponto === FALSE){ // Se tiver vírgula e não tiver ponto
        $value = str_replace(",", ".", $value);  // 'str_replace' faz trocar o ponto por vírgula
    }elseif($pos_virgula < $pos_ponto) { // Se a vírgula estiver na posição na frente do ponto
        $value = str_replace(",", "", $value); // 'Str_repalce' faz trocar a vírgula por nada
    }elseif($pos_virgula > $pos_ponto) { // Se a posição da vírgula estiver na atrás do botão
        $value = str_replace(".", "", $value); // 'str_replace' faz trocar o ponto por nada 
        $value = str_replace(",", ".", $value); // str_replace faz trocar a vírgula por ponto
    }
    return $value; // Retorna o valor tratado
}