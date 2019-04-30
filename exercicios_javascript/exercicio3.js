/*
Exercício 3
 Crie um botão em um ficheiro html, que ao ser clicado abre
uma janela nova com o site: http://www.imdb.com
*/
$(document).ready(function () {
    $("#botao").click(function (e) {
        if(e.ctrlKey){
            window.open("http://www.imdb.com");
        }else{
            window.location.href = "http://www.imdb.com";
        }
    });
});