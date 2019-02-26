<?php
	if(!defined("FORTRESSPHP")) header('Location: ../');
	class menu_css
	{
		public function code()
		{
			addTag("#menu");
				//addStyle("max-width:1000px");
				//addStyle("margin:auto");
				addStyle("height:50px");
				addStyle("width:90%");
				addStyle("float:left");
				addStyle("padding:0px");
				addStyle("margin-top:-70px");
				addStyle("margin-left:60px");
				//addStyle("border-bottom:solid 1px #fff");
				//addStyle("background-color:#FFF");
				//addStyle("background-image:url(".IMG_PATH."bg8.jpg)");
			endTag();
			addTag("#tab");
				//addStyle("margin-left:30px");
				//addStyle("background-color:grey");
				addStyle("overflow:hidden");
				addStyle("padding-bottom:10px");
			endTag();
			addTag('#tab a');
				addStyle("float:left");
				addStyle("color:#0A71B3");
				addStyle("margin-top:10px");
				addStyle("text-decoration:none");
				addStyle("font-size:1.5em");
				addStyle("font-weight:bold");
				addStyle("margin-left:25px");
				addStyle("margin-right:25px");
			endTag();
			addTag("#tab a:hover");
				addStyle("color:#014571");
			endTag();
		}
	}
?>