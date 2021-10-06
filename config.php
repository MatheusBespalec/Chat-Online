<?php
	
	session_start();
	date_default_timezone_set('America/Sao_Paulo');

	// Path
	define('INCLUDE_PATH', 'http://localhost/Back-End/14%20-%20chat_online/');
	define('BASE_DIR', __DIR__.'/');


	// AutoLoad
	$autoload = function($class){
		$class = str_replace('\\', '/', $class);
		if(file_exists(BASE_DIR.'class/'.$class.'.php'))
			include(BASE_DIR.'class/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	// DB
	define('HOST', 'localhost');
	define('DB', 'chat');
	define('USER', 'root');
	define('PASS', '');

?>