/*
Exercício 6
Crie duas caixas de texto em html
Crie código em Javascript que mostra a mensagem “primeira
caixa activada” quando clica na primeira caixa
Crie código em Javascript que mostra uma mensagem “perdeu o
foco” quando clica em outro local sem ser a primeira caixa de
texto
*/
$(document).ready(function () {
    $("#caixa1").focus(function(){
        $("#mensagem").html("primeira caixa activada");
    }).blur(function(){
        $("#mensagem").html("perdeu o foco");
    });
});
   