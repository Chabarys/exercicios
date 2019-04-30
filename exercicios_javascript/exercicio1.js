/*
Exercício 1
 Crie um botão em html que ao ser clicado, chama uma função
em JavaScript que abre uma janela com a mensagem “AIA”
 O código em Javascript deverá ser criado em um ficheiro
externo
 No ficheiro em JavaScript, insira o seguinte comentário:
“Função criada em um ficheiro externo que mostra uma
mensagem
*/
$(document).ready(function () {
    $("#botao").click(function () {
        //alert("AIA");
    });
});

function clique(texto = 'Nenhum texto informado') {
    alert(texto);
}
