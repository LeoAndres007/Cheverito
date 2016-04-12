<?php

	define("VER", "1.0 (Cheverito)");
	date_default_timezone_set('UTC');
	
	/* Algun dia estas definiciones irán en otro archivo.. */
	define("CUSTOMPRIV", 5000);
	
	require("config.php");
	require("lib/idiorm/idiorm.php");
	require("lib/SmartIRC/SmartIRC.php");
	require("cheverito.core.php");
	
	$cheverito = new Cheverito($conf);
	
	require("modules.php");
	try{
		$cheverito->connect();
	}catch(Exception $e){
		$cheverito->irc->send("QUIT :CALL NINE ONE ONE, PHP Fatal Error D:", SMARTIRC_CRITICAL);
		sleep(1); // >:D
		exec("php cheverito.php > log/cheverito.log &");
	}
