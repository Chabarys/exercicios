<?php

function connection () { 
    return new PDO("pgsql:host=localhost dbname=controlware user=postgres password=postgres");
}

function json_error ($message = "") { 
    $json = ["status" => 2, "message" => $message]; 
    die(json_encode($json));
}

function json_success ($data = []) { 
    $json = ["status" => 0, "data" => $data];
    die(json_encode($json)); 
}

function value_number ($value) { 
    $pos_virgula = strpos($value, ","); 
    $pos_ponto = strpos($value, "."); 
	
    if ($pos_virgula === false && $pos_ponto === false) {
        
    } elseif ($pos_virgula === false && $pos_ponto !== false) {
        
    } elseif ($pos_virgula !== false && $pos_ponto === false) { 
        $value = str_replace(",", ".", $value);  
    } elseif ($pos_virgula < $pos_ponto) { 
        $value = str_replace(",", "", $value); 
    } elseif ($pos_virgula > $pos_ponto) { 
        $value = str_replace(".", "", $value); 
        $value = str_replace(",", ".", $value); 
    }
    return $value; 
}