<?php 
	if(!defined("FORTRESSPHP")) header('Location: ../');
	class example_css
	{
		public function code()
		{
			addTag("#main");
				addStyle("background-color:#FFF");
				addStyle("text-align:center");
				addStyle("margin:auto");
				addStyle("padding-bottom:20px");
				addStyle("width:100%");
				addStyle("color:#000");
			endTag();
		}
	}
?>