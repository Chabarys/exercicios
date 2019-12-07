<?php

require("../def/function.php");

$idLivro = $_REQUEST["idLivro"];

$connection = connection();

$result = $connection->query("DELETE FROM livro WHERE idlivro = {$idLivro}");

if ($result) {
    json_success();
} else {
    $erro = $connection->errorInfo();
    json_error($erro[2]);
}