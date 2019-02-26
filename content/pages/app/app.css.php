<?php
	class app_css
	{
		public function code()
		{
			addTag("#background");
				addStyle("background-color:#FFF");
			endTag();
			addTag("#page");
				//addStyle("background-image:url(".IMG_PATH."bg8.jpg)");
				addStyle("background-color:#FFF");
			endTag();
			addTag("#app");
				//addStyle("padding-top:20px");
				//addStyle("padding-bottom:120px");
			endTag();
		}
	}
?>