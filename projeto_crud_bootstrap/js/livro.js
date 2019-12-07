$(document).ready(()  => { 
	
	status(0)
	
	$('#cadastro').css('background-color', '#6c757d')

	$('#idLivro').focus()

	$('#pesquisar').click(() => carregar($('#idLivro').val()))

	$('#idLivro').keypress(event (event.keyCode == 13 ? carregar($(this).val()) : null))

	grade()

	$(window).unbind('resize').bind('resize', () => {
		let largura_sm = 767
		if(window.innerWidth <= largura_sm){
			if ($('#div-cadastro').is(':visible') && $('#div-grade').is(':visible')) {
				$('#div-grade').hide()
			}
		} else {
			$('#div-cadastro, #div-grade').show()
		}
	}).trigger('resize')

	$('#precoLivro').maskMoney({
		prefix: 'R$ ',
		allowNegative: true,
		thousands: '.',
		decimal: ','
	})

	$('#lista').click(() => status(3))

	$('#cadastro').click(() => status(4))
})

$.ajaxSetup({ 
	dataType: 'json',
	error: () => console.log('Houve uma falha de conexão.\n	Verifique sua internet.')
})

const cancelar = () => {
    status(0)
    limpar()
	$('#idLivro').focus()
}

let _carregar_ajax = null
const carregar = idLivro => {
	if (_carregar_ajax !== null) return false
    _carregar_ajax = $.ajax({
        url: 'ajax/carregar.php', 
        data: { idLivro	},
		complete: () => _carregar_ajax = null,
        success: result => {
            switch (result.status) {
                case 0:
                    status(2)
                    for (let id in result.data) {
                        let valor = result.data[id]
                        $('#' + id).val(valor)
                    }
                    break
                case 2: alert(result.message); break
            }
        }
	})
	grade()

}

const deletarLivro = () => {
    $.ajax({
        url: 'ajax/deletarLivro.php', 
        data: { 
            idLivro: $('#idLivro').val() 
        },
        success: result => { 
            switch (result.status) { 
                case 0: 
                    cancelar()
					carregar()
                    break
                case 2: alert(result.message); break
			}
			$.notify({
				icon: 'fas fa-trash-alt',
				message: 'Livro deletado com sucesso!' 
			},{
				type: 'danger',
				onShow: function () {
					this.css({'width': '300'})
				}
			})
			grade()
        }
	})
	
}

const grade = () => { 
    $.ajax({
        url: 'ajax/grade.php', 
        success: result => {
            switch (result.status) {
                case 0:
                    $('#grade tbody').html('') 
                    for (const livro of result.data) {
                        const dataCriacao = livro.datacriacao.split('-').reverse().join('/')
                        const horaCriacao = livro.horacriacao.substr(0, 8)
                        const precoLivro = parseFloat(livro.preco).toLocaleString('pt-Br', { minimumFractionDigits: 2 })
                        const tds = [
                            `<td class='d-none d-lg-block' style='text-align: right'>${livro.idlivro}</td>`,
                            `<td>${livro.nome}</td>`,
                            `<td class='td'>${livro.biblioteca}</td>`,
                            `<td style='text-align: right'>R$${precoLivro}</td>`,
                            `<td class='d-none d-xl-block' style='text-align: center'>${dataCriacao} - ${horaCriacao}</td>`
                        ].join('')
                        $('#grade tbody').append(`<tr style='cursor: pointer' onclick='carregar(${livro.idlivro})'>${tds}</tr>`)
                    }
                    break
                case 2:
                    alert(result.message)
                    break
            }
        }
    })
}

const gravarLivro  = () => {
	let arquivo = (status() === 1 ? 'inserirNovo.php' : 'alterar.php')
	
	$('#idLivro').focus()
	$.ajax({
        url: `ajax/${arquivo}`, 
        data: {
            idLivro: $('#idLivro').val(), 
            nomeLivro: $('#nomeLivro').val(),
            idBiblioteca: $('#idBiblioteca').val(),
            precoLivro: $('#precoLivro').val().replace('R$ ', '')
        },
        success: result => { 
            switch (result.status) { 
                case 0: carregar(result.data.idLivro); break
                case 2: alert(result.message); break
			}
			$.notify({
				icon: 'fas fa-check-circle',
				message: 'Livro cadastrado com sucesso!' 
			},{
				type: 'success',
				onShow: function(){
					this.css({'width': '300'})
				}
			})
        }
	})
	grade()
}

const inserirNovo = () => { 
    status(1) 
    limpar()
    $('#nomeLivro').focus() 
}

const limpar = () => $('input, select').val('')

const mostrarModalDeletar = () => $('#mensagemDeletar').modal('show')

const fecharModalDeletar = () => $('#mensagemDeletar').modal('hide')

var _status = null
const status = status => {
	if (status === undefined) {
		return _status
	} else {
		_status = status
		switch (status) {
			case 0:
				$('#btnCriarNovo').attr('disabled', false)
				$('#btnGravar').attr('disabled', true)
				$('#btnCancelar').attr('disabled', true)
				$('#btnDeletar').attr('disabled', true)
				$('#idLivro').attr('disabled', false)
				$('#criadoEm').attr('disabled', true)
				$('#nomeLivro').attr('disabled', true)
				$('#idBiblioteca').attr('disabled', true)
				$('#precoLivro').attr('disabled', true)
			break
			case 1:
				$('#btnCriarNovo').attr('disabled', true)
				$('#btnGravar').attr('disabled', false)
				$('#btnCancelar').attr('disabled', false)
				$('#btnDeletar').attr('disabled', true)
				$('#idLivro').attr('disabled', true)
				$('#criadoEm').attr('disabled', true)
				$('#nomeLivro').attr('disabled', false)
				$('#idBiblioteca').attr('disabled', false)
				$('#precoLivro').attr('disabled', false)
			break
			case 2:
				$('#btnCriarNovo').attr('disabled', true)
				$('#btnGravar').attr('disabled', false)
				$('#btnCancelar').attr('disabled', false)
				$('#btnDeletar').attr('disabled', false)
				$('#idLivro').attr('disabled', true)
				$('#criadoEm').attr('disabled', true)
				$('#nomeLivro').attr('disabled', false)
				$('#idBiblioteca').attr('disabled', false)
				$('#precoLivro').attr('disabled', false)
			break
			case 3:
				$('#cadastro').css('background-color', '#343a40')
				$('#lista').css('background-color', '#6c757d')
			break
			case 4:
				$('#cadastro').css('background-color', '#6c757d')
				$('#lista').css('background-color', '#343a40')
			break
		}
	}
}

const trocarTelaCadastro = () => {
	$('#div-grade').hide()
	$('#div-cadastro').show()
}

const trocarTelaGrade = () => {
	$('#div-cadastro').hide()
	$('#div-grade').show()
}

