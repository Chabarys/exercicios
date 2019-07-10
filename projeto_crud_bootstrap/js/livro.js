$(document).ready(function() { 
	status(0);
	$("#idLivro").keypress(function(event) {
        if (event.keyCode == 13) {
			carregar($(this).val());
        }
	});
	

	$("#idLivro").focus();
	$(window).unbind('resize').bind('resize', () => {
		$('#div-cadastro').height(window.innerHeight - parseInt($("body").css("padding-bottom")));
	}).trigger('resize')
});

$.ajaxSetup({ 
	dataType: 'json',
	error: function(){ 
		alert("Houve uma falha de conexão.\n	Verifique sua internet.");
	}
});

function cancelar() {
    status(0);
    limpar();
	$("#idLivro").focus();
}

var _carregar_ajax = null;
function carregar(idLivro) {
	if(_carregar_ajax !== null){
		return false; 
	}
    _carregar_ajax = $.ajax({
        url: "ajax/carregar.php", 
        data: {
            idLivro: idLivro
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

function deletarLivro(){
	if (!confirm("Tem certeza que dejesa dele o livro?")) {
        return false;
    }
    $.ajax({
        url: "ajax/deletarLivro.php", 
        data: { 
            idlivro: $("#idLivro").val() 
        },
        success: function(result) { 
            switch (result.status) { 
                case 0: 
                    cancelar();
                    alert("Livro deletado com sucesso");
                    break;
                case 2: 
                    alert(result.message);
                    break;
            }
        }
    });
}

/*function grade() {
	$.ajax({
        url: "ajax/grade.php", 
        success: function(result) {
            switch (result.status) {
                case 0:
                    $("#grade tbody").html(""); 
                    for (const livro of result.data) {
                        const dataCriacao = livro.datacriacao.split("-").reverse().join("/"); 
                        const horaCriacao = livro.horacriacao.substr(0, 8);
                        const precoLivro = parseFloat(livro.preco).toLocaleString('pt-Br', { minimumFractionDigits: 2 });
                        const tds = [
                            `<td style='text-align: right'>${livro.idlivro}</td>`,
                            `<td>${livro.nome}</td>`,
                            `<td>${livro.biblioteca}</td>`,
                            `<td style='text-align: right'>R$ ${precoLivro}</td>`,
                            `<td style='text-align: center'>${dataCriacao} - ${horaCriacao}</td>`
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
}*/

function gravarLivro() {
	let arquivo = (status() === 1 ? 'inserirNovo.php' : 'alterar.php');
	
	$("#idLivro").focus();
	$.ajax({
        url: "ajax/" + arquivo, 
        data: {
            idLivro: $('#idLivro').val(), 
            nomeLivro: $('#nomeLivro').val(),
            idBiblioteca: $('#idBiblioteca').val(),
            precoLivro: $('#precoLivro').val()
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


function limpar() { 
    $("input, select").val("");
}

$(function(){
	$("#precoLivro").maskMoney({
	   prefix: 'R$ ',
	   allowNegative: true,
	   thousands: '.',
	   decimal: ','
	});
 });
var _status = null;
function status(status){
	if (status === undefined) {
		return _status;
	} else {
		_status = status;
		switch (status) {
			case 0:
				$("#btnCriarNovo").attr("disabled", false);
				$("#btnGravar").attr("disabled", true);
				$("#btnCancelar").attr("disabled", true);
				$("#btnDeletar").attr("disabled", false);
				$("#idLivro").attr("disabled", false);
				$("#criadoEm").attr("disabled", true);
				$("#nomeLivro").attr("disabled", true);
				$("#nomeBiblioteca").attr("disabled", true);
				$("#precoLivro").attr("disabled", true);
			break;
			case 1:
				$("#btnCriarNovo").attr("disabled", true);
				$("#btnGravar").attr("disabled", false);
				$("#btnCancelar").attr("disabled", false);
				$("#btnDeletar").attr("disabled", true);
				$("#idLivro").attr("disabled", true);
				$("#criadoEm").attr("disabled", true);
				$("#nomeLivro").attr("disabled", false);
				$("#nomeBiblioteca").attr("disabled", false);
				$("#precoLivro").attr("disabled", false);
			break;
			case 2:
				$("#btnCriarNovo").attr("disabled", false);
				$("#btnGravar").attr("disabled", true);
				$("#btnCancelar").attr("disabled", true);
				$("#btnDeletar").attr("disabled", true);
				$("#idLivro").attr("disabled", true);
				$("#criadoEm").attr("disabled", true);
				$("#nomeLivro").attr("disabled", false);
				$("#nomeBiblioteca").attr("disabled", false);
				$("#precoLivro").attr("disabled", false);
			break;
		}
		
	}
}