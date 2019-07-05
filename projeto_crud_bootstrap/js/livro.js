$(document).ready(function() { 
    status(0);
	$("#idLivro").focus();
	$(window).unbind('resize').bind('resize', () => {
		$('#div-cadastro').height(window.innerHeight - parseInt($("body").css("padding-bottom")));
	}).trigger('resize')
});

function criarNovoLivro() {
	status(1);
	$("#nomeLivro").focus();
}

function cancelar() {
	status(0);
	$("#idLivro").focus();
}

function gravarNovoLivro(){
	status(0);
	$("#idLivro").focus();
}

function deletarLivro(){
	status(0);

}
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