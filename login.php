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

		<title>Login</title>

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
		<?php 

			if (isset($_POST['action'])) {
				$_SESSION['user'] = $_POST['user'];
				header('Location: '.INCLUDE_PATH);
			}

		?>
		<div class="wraper-content">
			<form method="post">
				<div class="form-group">
					<label>Insira um nome de usuário:</label>
					<input type="text" name="user" />
				</div><!--form-group-->
				<input type="submit" name="action"  value="Entrar!" />
			</form>
		</div><!--wraper-content-->

		<!-- Scripts -->
		<script src="js/jquery.js"></script>
		<script src="js/functions.js"></script>
		<script src="https://kit.fontawesome.com/4053268ba0.js" crossorigin="anonymous"></script>
		<!--  -->
	</body>
</html>