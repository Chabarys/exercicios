<?php

require("../def/function.php");

$idLivro = $_REQUEST["idLivro"];

$connection = connection();

$result = $connection->query("SELECT * FROM livro WHERE idlivro = {$idLivro}");
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
    "idLivro" => $livro["idlivro"],
    "nomeLivro" => $livro["nome"],
    "idBiblioteca" => $livro["idbiblioteca"],
    "precoLivro" => number_format($livro["preco"], 2, ",", "."),
    "criadoEm" => $criadoEm
));