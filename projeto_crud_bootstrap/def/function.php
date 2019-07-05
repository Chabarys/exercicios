<?php

function connection(){ // Função que faz conectar com o banco de dados
    return new PDO("pgsql:host=localhost dbname=controlware user=postgres password=postgres");
}