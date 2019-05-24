<?php

function connection(){ // Função que faz conectar com o banco de dados
    return new PDO("pgsql:host=localhost dbname=codification user=postgres password=postgres");
}

function pre($var){
	print("<pre>");
	print_r($var);
	print("</pre>");
}