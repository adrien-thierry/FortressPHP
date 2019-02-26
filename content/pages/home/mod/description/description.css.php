<?php 
	if(!defined("FORTRESSPHP")) header('Location: ../');
	class description_css
	{
		public function code()
		{
			addTag("#description");
				addStyle("background-color:#F7F7F7");
				addStyle("text-align:center");
				addStyle("margin:auto");
				addStyle("padding-bottom:20px");
				addStyle("width:100%");
				addStyle("color:#000");
			endTag();
			addTag("#description h1");
				addStyle("font-size:1.4em");
				addStyle("display:block");
			endTag();
			addTag("#description .zone");
				addStyle("width:300px");
				addStyle("padding-top:20px");
				addStyle("padding-bottom:20px");
			endTag();
			addTag("#description .justify");
				addStyle("text-align:justify");
			endTag();
			addTag("#description .float");
				addStyle("margin-auto");
				addStyle("vertical-align: top");
				addStyle("display:inline-block");
				addStyle("margin-left: 30px");
			endTag();
			addTag("#description .imgfloat");
				addStyle("float:left");
			endTag();
		}
	}
?>