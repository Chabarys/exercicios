<?php

require_once("../def/function.php");

$nome = $_GET["nome"];
$pontos = $_GET["pontos"];

$connection = connection();
$query = "INSERT INTO ranking (nome, pontos) VALUES ('{$nome}',{$pontos})";
$connection->query($query);

echo json_encode(array());