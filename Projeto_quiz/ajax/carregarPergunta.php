<?php

require_once("../def/function.php"); 

$numeroPergunta = $_GET["numeroPergunta"]; //pega o numero da pergunta que ta na variavel passada pelo ajax

$connection = connection(); // função que faz a coneção com o banco de dados
 
$query = implode(" ", [ // query que mostra a pergunta do banco no html
	"SELECT *",
	"FROM pergunta",
	"ORDER BY idpergunta",
	"LIMIT 1",
	"OFFSET {$numeroPergunta} - 1"
]);

$res = $connection->query($query);
$pergunta = $res->fetch(2);

$query = implode(" ", [ // query que mostra as respostas do banco de dados no html
	"SELECT texto, correto",
	"FROM resposta",
	"WHERE idpergunta = {$pergunta["idpergunta"]}",
	"ORDER BY random()"
]);

$res = $connection->query($query);
$respostas = $res->fetchAll(2);

$jsonFinal = [ // json exibindo as perguntas e respostas juntas
	"pergunta" => $pergunta["texto"],
	"respostas" => $respostas 
];

echo json_encode($jsonFinal);
