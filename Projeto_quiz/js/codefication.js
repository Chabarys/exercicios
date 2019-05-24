var temporizador_segundos_max = 15;
var temporizador_segundos = null;
var temporizador_interval = null;

var pontos = 0;
var numeroPergunta = 0;
var _pergunta = null;

$(document).ready(function() {
	trocar_pagina('pagina-login');
});

$.ajaxSetup({ 
	dataType: 'json',
	error: function(){ 
		alert("Houve uma falha de conexão.\nVerifique sua internet.");
	}
});

function atualizar_elementos() {
	$("#texto-pergunta").html(htmlEntities(_pergunta.pergunta));
	$("#resposta-a").html(htmlEntities(_pergunta.respostas[0].texto));
	$("#resposta-b").html(htmlEntities(_pergunta.respostas[1].texto));
	$("#resposta-c").html(htmlEntities(_pergunta.respostas[2].texto));
	$("#resposta-d").html(htmlEntities(_pergunta.respostas[3].texto));
}

function carregar_pergunta(numeroPergunta) {
	$.ajax({
		url: "../ajax/carregarPergunta.php",
		data: {
			numeroPergunta: numeroPergunta
		},
		success: function(result) {
			_pergunta = result;
			atualizar_elementos();
		}
	});
} 

function comecar() {
	if($("#campo-nome").val().trim() == "") {
		alert("É obrigatório informar seu nome!");
	}else{
		pontos = 0;
		numeroPergunta = 0;
		_pergunta = null;

		trocar_pagina('pagina-perguntas');
		proxima_pergunta();
	}
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

function iniciar_temporizador() {
	temporizador_segundos = temporizador_segundos_max;
	$("#temporizador-progresso").width("100%");
	$("#temporizador-progresso").stop().animate({
		width: "0%"
	}, temporizador_segundos_max * 1050);
	temporizador_interval = setInterval(function(){
		temporizador_segundos--;
		$("#temporizador").html(`00:${String(temporizador_segundos).padStart(2, "0")}`);
		if(temporizador_segundos === 0){
			pausar_temporizador();
			// mudar de tela
			trocar_pagina('pagina-respostas');
		}
	}, 1000);
}

function mostrarRanking() {
	preencherRanking();
	trocar_pagina('pagina-ranking');
}

function trocar_pagina(id){
	$('.bloco-pagina').hide(); // hide -> esconde o elemento do id 'bloco pagina'
	$(`#${id}`).show(); // show -> mostra o elemento do id que será passado por parâmetro
}

function pausar_temporizador() {
	clearInterval(temporizador_interval);
	$("#temporizador-progresso").stop();
}

function preencherRanking() {
	$.ajax({
		url: "../ajax/preencher.php",
		data: {
			pontos: pontos,
			nome: $("#campo-nome").val().trim()
		},
		success: function(){
			ranking();
		}
	})
}

function proxima_pergunta() {
	pausar_temporizador();
	numeroPergunta++;
	if(numeroPergunta > 10) {
		mostrarRanking();
	}else{
		carregar_pergunta(numeroPergunta);
		iniciar_temporizador();
	}
}

function ranking() { 
    $.ajax({
        url: "../ajax/carregarRanking.php", // Arquivo que o ajax será enviado
        success: function(result) {
			$("#grade tbody").html(result.tbody);
        }
    });
}

function responder(i) {
	if(_pergunta.respostas[i].correto){
		pontos += 10;
	}
	trocar_pagina('pagina-perguntas');
	proxima_pergunta();
}
