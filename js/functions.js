$(function(){
	const include_path = $('base').attr('base');
	
	var chat = $('.chat');
	chat.scrollTop(chat[0].scrollHeight);

	function enviarMensagem(){
		var mensagem = $('textarea').val();
		$('textarea').val('');
		$.ajax({
			url: include_path+'ajax/mensagemAjax.php',
			method: 'POST',
			data: {mensagem}
		}).done(function(data){
			atualizarMensagens();
		})
	}

	function atualizarMensagens(){
		var attMensagens = true;
		$.ajax({
			url: include_path+'ajax/mensagemAjax.php',
			method: 'POST',
			data: {attMensagens}
		}).done(function(data){
			$('.chat').append(data);
			chat.scrollTop(chat[0].scrollHeight);
		})
	}

	setInterval(function(){
		atualizarMensagens();
	}, 1000);

	$('textarea').keypress(function(e) {
	    if(e.which == 13){
	    	enviarMensagem();
	    }
	});

	$('.enviar-mensagem span').click(function(){
		enviarMensagem();
	})
})