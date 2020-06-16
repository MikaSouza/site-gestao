/**
* Classe para gerenciar paginações
* @author Jonatan Colussi <jontan.colussi@teraware.com.br>
* @since 2016-09-15
*/
function Paginacao(seletorPaginacao){
	//Atributos
	var pagina;
	var seletor;
	var url;
	var reading;
	var pesquisa;
	var seletorPaginacao;
	var itensPorPagina;
	var ancora;
	var callback;

	//Visibilidade
	var self = this;

	//Setando a primeira pagina como 1
	this.pagina = 1;

	//Setando o seletor de paginação padrão
	this.seletorPaginacao = (seletorPaginacao == undefined) ? ".paginacao > li > a" : seletorPaginacao;

	//Setando a quantidade padrão de itens por página
	this.itensPorPagina = 6;

	//Metodo set pagína
	this.setPagina = function(pagina){
		this.pagina = pagina;
		//remove todos os 'actives'
		$(self.seletorPaginacao).removeClass('active');
		//marca a página selecionada
		$(self.seletorPaginacao+"[rel="+self.pagina+"]").addClass('active');
	}

	//Metodo set seletor
	this.setSeletor = function(seletor){
		this.seletor = seletor;
	}

	//Metodo set callback
	this.setCallback = function(callback){
		this.callback = callback;
	}

	//Metodo set url
	this.setUrl = function(url){
		this.url = url;
	}

	//Metodo set reading
	this.setReading = function(reading){
		this.reading = reading;
	}

	//Metodo set pesquisa
	this.setPesquisa = function(pesquisa){
		this.pesquisa = pesquisa;
	}

	//Metodo set seletor de paginacao
	this.setSeletorPaginacao = function(seletorPaginacao){
		this.seletorPaginacao = seletorPaginacao;
	}

	//Metodo set quantidade de itens por página
	this.setItensPorPagina = function(itensPorPagina){
		this.itensPorPagina = itensPorPagina;
	}

	//Metodo set âncora
	this.setAncora = function(ancora){
		this.ancora = ancora;
	}

	//Metodo marcar página -> marca o número da página que foi selecionada
	this.marcarPagina = function(){
		//remove todos os 'actives'
		$(self.seletorPaginacao).removeClass('active');
		//marca a página selecionada
		$(self.seletorPaginacao+"[rel="+self.pagina+"]").addClass('active');

		//se a chegou na ultima página, desabilita o botão "Próximo"
		if(self.pagina == $(self.seletorPaginacao).length-2) $(self.seletorPaginacao+"[rel=next]").css('cursor', 'no-drop');
		else $(self.seletorPaginacao+"[rel=next]").css('cursor', 'pointer');

		//Se chegou na primeira página, desabilita o botão "Anterior";
		if(self.pagina == 1) $(self.seletorPaginacao+"[rel=prev]").css('cursor', 'no-drop');
		else $(self.seletorPaginacao+"[rel=prev]").css('cursor', 'pointer');

		//atribui falso para o atributo reading, ativando assim o scroll automático, caso a página utilizar o seletor padrão
		this.reading = (seletorPaginacao == undefined) ? false : true;

		//busca os itens de acordo com a página selecionada
		$(this.seletorPaginacao).off('click');
		this.buscarItens();
	}

	//Inabilita o cursor para o botão "anterior", após o carregamento da página
	$(this.seletorPaginacao+"[rel=prev]").css('cursor', 'no-drop');

	//Inabilita o cursor para o botão "próximo", se houver somente uma página
	if($(self.seletorPaginacao).length == 3) $(self.seletorPaginacao+"[rel=next]").css('cursor', 'no-drop');

	//se for escolhida uma página numericamente
	$(self.seletorPaginacao+"[rel!=prev][rel!=next]").on('click', function(event) {
		event.preventDefault();
		if($.isNumeric($(this).attr('rel'))){
			self.pagina = $(this).attr('rel');
			self.marcarPagina();
		}
	});


	//Opção "Página anterior"
	$(self.seletorPaginacao+"[rel=prev]").on('click', function(event) {
		event.preventDefault();
		if(self.pagina > 1){
			self.pagina--;
			self.marcarPagina();
		}
	});

	//Opção "Próxima página"
	$(self.seletorPaginacao+"[rel=next]").on('click', function(event) {
		event.preventDefault();
		if(self.pagina < $(self.seletorPaginacao).length-2){
			self.pagina++;
			self.marcarPagina();
		}
	});

	//Método para buscar os ítens
	this.buscarItens = function(){
		$(self.seletorPaginacao).on('click');
		$.ajax({
			url: self.url,
			type: 'GET',
			data: {
				paginaAtual    : self.pagina,
				pesquisa       : self.pesquisa,
				itensPorPagina : self.itensPorPagina
			},
			beforeSend: function(){
				$(self.seletor).hide();
			},
			success: function(result){
				$(self.seletor).html(result);
				if(!self.reading){
					$(self.seletor).fadeIn('slow');
					$('html, body').animate({
						scrollTop: $(".container > h1").offset().top
					}, 1000);
				}
				else
					$(self.seletor).show();

				//se for escolhida uma página numericamente
				$(self.seletorPaginacao+"[rel!=prev][rel!=next]").on('click', function(event) {
					event.preventDefault();
					if($.isNumeric($(this).attr('rel'))){
						self.pagina = $(this).attr('rel');
						self.marcarPagina();
					}
				});

				//Opção "Página anterior"
				$(self.seletorPaginacao+"[rel=prev]").on('click', function(event) {
					event.preventDefault();
					if(self.pagina > 1){
						self.pagina--;
						self.marcarPagina();
					}
				});

				//Opção "Próxima página"
				$(self.seletorPaginacao+"[rel=next]").on('click', function(event) {
					event.preventDefault();
					if(self.pagina < $(self.seletorPaginacao).length-2){
						self.pagina++;
						self.marcarPagina();
					}
				});
			},
			error: function(result){
				sweetAlert("Oops...", "Ocorreu um erro inesperado!", "error");
				console.log(result);
			}
		}).done(function(){
			if(self.callback != undefined)
				window[self.callback]();
		});
	}

	//método para busca de itens para a listagem contínua
	this.paginacaoContinua = function(){
		$("img.loader").hide();
		$.ajax({
			url: self.url,
			type: 'GET',
			data: {
				paginaAtual: self.pagina,
				pesquisa: self.pesquisa
			},
			beforeSend: function(){
				$("img.loader").css('display', 'table');
			},
			success: function(result){
				$("img.loader").hide();
				if(result != ''){
					if(self.pagina == 1)
						$(self.seletor).html(result);
					else
						$(self.seletor).append(result);
					if(self.pagina == 1){
						$("#carregarMais").show();
						if(self.ancora != undefined){
							$('html, body').animate({
								scrollTop: $(self.ancora).offset().top
							}, 1000);
						}
					}
					self.verificarProximo();
				}
			},
			error: function(result){
				sweetAlert("Oops...", "Ocorreu um erro inesperado!", "error");
				console.log(result);
			}
		}).done(function(){
			if(self.callback != undefined)
				window[self.callback]();
		});
	}

	this.verificarProximo = function(){
		$("img.loader").hide();
		$.ajax({
			url: self.url,
			type: 'GET',
			data: {
				paginaAtual: self.pagina+1,
				pesquisa: self.pesquisa
			},
			success: function(result){
				if(result == ''){
					$("img.loader").remove();
				}
			}
		});
	}
}