<?php
	class contact_css
	{
		public function code()
		{
			addTag("#background");
				addStyle("background-color:#fff");
			endTag();
			addTag("#page");
				//addStyle("background-image:url(".IMG_PATH."bg8.jpg)");
				addStyle("background-color:#fff");
			endTag();
		}
	}
?>