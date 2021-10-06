<?php 

	include('config.php');

	if(isset($_SESSION['user'])){
		include('chat.php');
	}else{
		include('login.php');
	}

?>