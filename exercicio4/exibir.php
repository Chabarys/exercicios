<?php

session_start();

$tipo = $_GET["tipo"];

$valores = $_SESSION["valores"];

if($tipo === "maior"){
    foreach($valores as $itens){
        echo "  ". max($itens);
    }
}    
if($tipo === "menor"){
    foreach($valores as $itens){
        echo "  ". min($itens);
    }
}
   


