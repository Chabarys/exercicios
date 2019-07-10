<?php

require("../def/function.php");

$idLivro = $_GET["idLivro"];

$connection = connection();

$result = $connection->query("SELECT * FROM livro WHERE idlivro = {$idlivro}");
$arr = $result->fetchAll(2);
if(count($arr) === 0){
    json_error("Livro não encontrado!");
}
$livro = $arr[0];

$dataCriacao = $livro["datacriacao"];
$dataCriacao = explode("-", $dataCriacao);
$dataCriacao = array_reverse($dataCriacao);
$dataCriacao = implode("/", $dataCriacao);

$horaCriacao = $livro["horacriacao"];
$horaCriacao = substr($horaCriacao, 0, 8);

$criadoEm = $dataCriacao." ".$horaCriacao; 
 
json_success(array(
    "idlivro" => $livro["idlivro"],
    "nome" => $livro["nome"],
    "idbiblioteca" => $livro["idbiblioteca"],
    "preco" => number_format($livro["preco"], 2, ",", "."),
    "criadoem" => $criadoEm
));