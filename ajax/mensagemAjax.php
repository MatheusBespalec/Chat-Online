<?php 
	
	include('../config.php');

	if (!isset($_SESSION['user']) || !isset($_SESSION['lastMessage'])) {
		die();
	}

	$data = '';

	if (isset($_POST['mensagem'])) {
		$mensagem = $_POST['mensagem'];
		$user = $_SESSION['user'];

		MySql::insert('tb_site.chat',[$mensagem,$user,date('Y-m-d H:i:s')]);
		die($data);
	}

	if (isset($_POST['attMensagens'])) {
		$lastId = $_SESSION['lastMessage'];
		$mensagens = MySql::selectAll('tb_site.chat','WHERE id > ?',[$lastId]);
		foreach ($mensagens as $key => $value) {
			$minhaMensagem = ($value['user_name'] == $_SESSION['user']) ? 'my' : '';
			echo '<div class="mensagem '.$minhaMensagem.'">
				<div class="author">'.$value['user_name'].':</div><!--author-->
				<p>'.$value['mensagem'].'</p>
				<span>'.date('H:i', strtotime($value['data'])).'</span>
			</div><!--mensagem-->
			<div class="clear"></div><!--clear-->';
			$_SESSION['lastMessage'] = $value['id'];
		}
	}

?>