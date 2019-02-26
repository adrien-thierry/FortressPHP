<?php
	if(!defined("FORTRESSPHP")) header('Location: ../');
	class firewall_conf
	{
		//standard
		var $state = false;
		var $pos = 1;
		
		// fw
		var $firewall = array("127.0.0.0","localhost");
		var $restricted = "*";
		// var $restricted = array("home", "manage" ...);
		var $message = "<center><h1>ERROR 404</h1></center>";
		var $error = "404 Not Found";
	}

?>
