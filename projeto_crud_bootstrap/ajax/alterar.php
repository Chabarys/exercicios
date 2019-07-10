<?php

require("../def/function.php");

$idLivro = $_REQUEST["idLivro"];
$nomeLivro = $_REQUEST["nomeLivro"];
$idBiblioteca = $_REQUEST["idBiblioteca"];
$precoLivro = $_REQUEST["precoLivro"];

$precoLivro = value_number($precoLivro);

$connection = connection();

$result = $connection->query("UPDATE livro SET nome = '{$nomeLivro}', idbiblioteca = '{$idBiblioteca}', preco = '{$precoLivro}' WHERE idlivro = {$idLivro}");

if ($result) {
    json_success(array(
        "idlivro" => $idLivro
    ));
} else {
    $erro = $connection->errorInfo();
    json_error($erro[2]);
}
