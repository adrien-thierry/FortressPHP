<?php
	if(!defined("FORTRESSPHP")) header('Location: ../');
	class fw_conf
	{
		//standard
		var $state = false;
		var $pos = 0;
		
		// fw
		var $firewall = array("127.0.0.1","localhost");
		var $restricted = "*";
		// var $restricted = array("home", "manage" ...);
		var $message = "<center><h1>ERROR 500</h1></center>";
	}

?>
