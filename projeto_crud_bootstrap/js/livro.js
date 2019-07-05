$(document).ready(function() { 
	status(0);
	$("#idLivro").keypress(function(event) {
        if (event.keyCode == 13) {
			status(1)//carregar($(this).val());
        }
    });
	$("#idLivro").focus();
	$(window).unbind('resize').bind('resize', () => {
		$('#div-cadastro').height(window.innerHeight - parseInt($("body").css("padding-bottom")));
	}).trigger('resize')
});

function criarLivro() {
	status(1);
	$("#nomeLivro").focus();
	$.ajax({
        url: "ajax/criarLivro.php", 
        data: { 
            idLivro: $('#idLivro').val(), 
            nomeLivro: $('#nomeLivro').val(),
            idBiblioteca: $('#idBiblioteca').val(),
            precoLivro: $('#precoLivro').val()
        },
        success: function(result) {
            switch (result.status) { 
                case 0: 
                    carregar(result.data.idlivro);
                    break;
                case 2: 
                    alert(result.message);
                    break;
            }
        }
    });
}

function cancelar() {
	status(0);
	$("#idLivro").focus();
}

function gravarLivro(){
	status(0);
	$("#idLivro").focus();
	$.ajax({
        url: "ajax/gravarLivro.php", 
        data: {
            idLivro: $('#idLivro').val(), 
            nomeLivro: $('#nomeLivro').val(),
            idbiBlioteca: $('#idBiblioteca').val(),
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

function deletarLivro(){
	status(0);
	$.ajax({
        url: "ajax/deletarLivro.php", 
        data: { 
            idLivro: $("#idLivro").val() 
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