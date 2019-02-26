<?php
	if(!defined("FORTRESSPHP")) header('Location: ../');
	addTag("#menu");
		addStyle("max-width:1000px");
		addStyle("margin:auto");
		addStyle("height:50px");
		addStyle("width:100%");
		addStyle("border-bottom:solid 1px #fff");
		addStyle("background-image:url(".IMG_PATH."bg8.jpg)");
	endTag();
	addTag("#tab");
		addStyle("margin-left:30px");
		addStyle("overflow:hidden");
	endTag();
	addTag('#tab a');
		addStyle("float:left");
		addStyle("color:#014571");
		addStyle("margin-top:10px");
		addStyle("text-decoration:none");
		addStyle("font-size:1.5em");
		addStyle("font-weight:bold");
		addStyle("margin-left:50px");
	endTag();
	addTag("#tab a:hover");
		addStyle("color:white");
	endTag();
?>