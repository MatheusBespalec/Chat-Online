<?php
		 
	if(!isset($_SESSION['user'])){
		header('Location: '.INCLUDE_PATH);
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		header('Location: '.INCLUDE_PATH);
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Links -->
			<!-- CSS -->
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<!-- Google Fonts -->
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
		<!--  -->

		<title>Chat Global</title>

		<!-- Meta Tags -->
			<!-- UTF-8 -->
			<meta charset="utf-8">
			<!-- Responsivo -->
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<!-- SEO -->
			<meta name="keywords" content="" />
			<meta name="description" content="" />
			<meta name="author" content="Matheus Bespalec - matheusbespalec@gmail.com">
			<meta http-equiv="X-UA-Compatible" content="IE=Edge">
			<meta name="robots" content="index,follow">
		<!--  -->

		<!-- Icone -->
		<link rel="icon" href="" type="image/x-icon" />
	</head>
	<body>
		<base base="<?php echo INCLUDE_PATH; ?>" />
		<header>
			<h2>Chat Online</h2>
			<a href="?logout">Sair <i class="fas fa-sign-out-alt"></i></a>
		</header>

		<div class="wraper-content">
			<h3>Seu Usuario: <span style="font-size:22px;color:#311b92;"><?php echo $_SESSION['user']; ?></span></h3>

			<section class="chat">
				<?php 
					$mensagens = MySql::selectAll('tb_site.chat','ORDER BY data');
					foreach ($mensagens as $key => $value) {
				?>
							<div class="mensagem <?php echo ($value['user_name'] == $_SESSION['user']) ? 'my' : ''; ?>">
								<div class="author"><?php echo $value['user_name'] ?>:</div><!--author-->
								<p><?php echo $value['mensagem'] ?></p>
								<span><?php echo date('H:i', strtotime($value['data'])); ?></span>
							</div><!--mensagem-->
							<div class="clear"></div><!--clear-->
				<?php 
						$_SESSION['lastMessage'] = $value['id'];
					} 
				?>
			</section><!--chat-->

			<div class="enviar-mensagem">
				<textarea></textarea>
				<span><i class="fas fa-paper-plane"></i></span>
			</div><!--mensagem-->
		</div><!--wraper-content-->

		<!-- Scripts -->
		<script src="js/jquery.js"></script>
		<script src="js/functions.js"></script>
		<script src="https://kit.fontawesome.com/4053268ba0.js" crossorigin="anonymous"></script>
		<!--  -->
	</body>
</html>