$(document).ready(function() { // Função que faz a tecla 'ENTER' servir como click do mouse
    status(0);
    $("#idlivro").keypress(function(event) {
        if (event.keyCode == 13) { // '13' = codigo da tecla 'ENTER'
            carregar($(this).val()); 
        }
    });

    grade();

    $("#idlivro").focus(); // Função 'focus()' faz o foco da caixa de texto ir para o elemento da tag '#idlivro'
});

$.ajaxSetup({ // '$.ajaxSetup' define valores padrão para serem válidos para todos os pedidos ajax.
	dataType: 'json',
	error: function(){ // Função que vai ser executada caso aconteça erro na execução
		alert("Houve uma falha de conexão.\nVerifique sua internet.");
	}
});

function cancelar() { // Função que cancela o cadastro e faz sumir o que estava inserindo nas campos de textos
    status(0); // Quando a função 'cancelar' for executada, a pagina passará a estar no status 0 
    limpar(); // chama a função limpar
    $("#idlivro").focus();
}

var _carregar_ajax = null;
function carregar(idlivro) {
	if(_carregar_ajax !== null){
		// Escolhe uma das duas opcoes abaixo:
		//_carregar_ajax.abort(); // Aborta o ajax anterior
		return false; // Nao deixa seguir enquanto nao finalizar o ajax anterior
	}
    _carregar_ajax = $.ajax({
        url: "../ajax/livro/carregar.php", // Arquivo que o ajax será enviado
        data: { // Dados que será passado para o ajax
            idlivro: idlivro
		},
		complete: function(){
			_carregar_ajax = null;
		},
        success: function(result) {
            switch (result.status) {
                case 0:
                    status(2);
                    for (let id in result.data) {
                        let valor = result.data[id];
                        $("#" + id).val(valor);
                    }
                    break;
                case 2:
                    alert(result.message);
                    break;
            }
        }
    });
}

function deletar() { // função que será realizada quando o usuário clicar no botaão 'DELETAR'
    if (!confirm("Tem certeza que dejesa dele o livro?")) { //'CONFIRM()' é como se fosse um alert pra o usuario confirmar se quer realizar essa ação mesmo
        return false;
    }
    $.ajax({
        url: "../ajax/livro/deletar.php", // Arquivo que o ajax será enviado
        data: { // Dados que será passado para o ajax
            idlivro: $("#idlivro").val() 
        },
        success: function(result) { // Quando o ajax for realizado ele executará o success
            switch (result.status) { 
                case 0: // caso o status do result for 0, faça:
                    cancelar();
                    alert("Livro deletado com sucesso");
                    break;
                case 2: // caso o status do result for 2, faça:
                    alert(result.message);
                    break;
            }
        }
    });
}

function grade() { // Função que será executada quando o usuário cadastrar um livro
    $.ajax({
        url: "../ajax/livro/grade.php", // Arquivo que o ajax será enviado
        success: function(result) {
            switch (result.status) {
                case 0:
                    $("#grade tbody").html(""); // será exibido no html
                    for (const livro of result.data) {
                        const datacriacao = livro.datacriacao.split("-").reverse().join("/"); // 'split()' -> sapara valores de um array // 'reverse()' -> inverte os valores do array // 'join()' -> junta os valores do array
                        const horacriacao = livro.horacriacao.substr(0, 8);
                        const preco = parseFloat(livro.preco).toLocaleString('pt-Br', { minimumFractionDigits: 2 });
                        const tds = [
                            `<td style='text-align: right'>${livro.idlivro}</td>`,
                            `<td>${livro.nome}</td>`,
                            `<td>${livro.biblioteca}</td>`,
                            `<td style='text-align: right'>R$ ${preco}</td>`,
                            `<td style='text-align: center'>${datacriacao} - ${horacriacao}</td>`
                        ].join("");
                        $("#grade tbody").append(`<tr onclick='carregar(${livro.idlivro})'>${tds}</tr>`);
                    }
                    break;
                case 2:
                    alert(result.message);
                    break;
            }
        }
    });
}

function gravar() { // Função que será executada quando o usuário cliacar no botão 'GRAVAR'
    let arquivo = (status() === 1 ? 'inserir_novo.php' : 'alterar.php'); // ? === {} (TRUE) // : === else (FALSE)
 
    $.ajax({
        url: "../ajax/livro/" + arquivo, // Página que o ajax irá enviar
        data: { // Dados que será passado para o ajax 
            idlivro: $('#idlivro').val(), 
            nome: $('#nome').val(),
            idbiblioteca: $('#idbiblioteca').val(),
            preco: $('#preco').val()
        },
        success: function(result) { // Quando o ajax der certo entra no sucess e executa função
            switch (result.status) { 
                case 0: // caso p status do result for 0 faça:
                    carregar(result.data.idlivro);
                    break;
                case 2: // caso p status do result for 2 faça:
                    alert(result.message);
                    break;
            }
        }
    });
}

function inserir_novo() { // Função que será executada quando o usuário clicar no botão 'CRIAR NOVO'
    status(1); // a pagina ficará no status 1
    limpar(); // função 'limpar()' será executada
    $("#nome").focus(); // foco será jogado para o campo 'NOME'
}

function limpar() { // Função que limpa todos os inputs (botões)
    $("input, select").val(""); // atribui valor para para as tags inputs e selects
}

var _status = null;

function status(status) { // Função que mostra o status da pagina
    /*
    * status 0 - tela em branco (esperando inserir novo ou carregar)
    * status 1 - Criando novo
    * status 2 - Alterando um existente
    */
    if (status === undefined) {
        return _status;
    } else {
        _status = status;
        switch (status) {
            case 0: // caso o status for 0
                $('#btn-novo').attr('disabled', false); // Botão 'CRIAR NOVO' NÃO desabilita
                $('#btn-gravar').attr('disabled', true); // Botão 'GRAVAR' desabilita
                $('#btn-cancelar').attr('disabled', true); // Botão 'CANCELAR' desabilita
                $('#btn-deletar').attr('disabled', true); // Botão 'DELETAR' desabilita
                $('#idlivro').attr('disabled', false); // Campo 'ID' NÃO desabilita
                $('#nome').attr('disabled', true); // Campo 'NOME' desabilita
                $('#idbiblioteca').attr('disabled', true); // Campo 'BIBLIOTECA' desabilita
                $('#preco').attr('disabled', true); // Campo 'PREÇO' desabilita
                break;
            case 1:
                $('#btn-novo').attr('disabled', true); // Botão 'CRIAR NOVO' desabilita
                $('#btn-gravar').attr('disabled', false); // Botão 'GRAVAR' NÃO desabilita
                $('#btn-cancelar').attr('disabled', false); // Botão 'CANCELAR' NÃO desabilita
                $('#btn-deletar').attr('disabled', true); // Botão 'DELETAR' desabilita
                $('#idlivro').attr('disabled', true); // Campo 'ID' desabilita
                $('#nome').attr('disabled', false); // Campo 'NOME' NÃO desabilita
                $('#idbiblioteca').attr('disabled', false); // Campo 'BIBLIOTECA' NÃO desabilita
                $('#preco').attr('disabled', false); // Campo 'PREÇO' NÃO desabilita
                break;
            case 2:
                $('#btn-novo').attr('disabled', true); // Botão 'CRIAR NOVO' desabilita
                $('#btn-gravar').attr('disabled', false); // Botão 'GRAVAR' NÃO desabilita
                $('#btn-cancelar').attr('disabled', false); // Botão 'CANCELAR' NÃO desabilita
                $('#btn-deletar').attr('disabled', false); // Botão 'DELETAR' NÃO desabilita
                $('#idlivro').attr('disabled', true); // Campo 'ID' desabilita
                $('#nome').attr('disabled', false); // Campo 'NOME' NÃO desabilita
                $('#idbiblioteca').attr('disabled', false); // Campo 'BIBLIOTECA' NÃO desabilita
                $('#preco').attr('disabled', false); // Campo 'PREÇO' NÃO desabilita
                break;
        }
    }
} 