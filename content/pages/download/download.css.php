<?php
	class download_css
	{
		public function code()
		{
			addTag("#background");
				addStyle("background-color:#FFF");
				//addStyle("background-image:url(".IMG_PATH."bg8.jpg)");
			endTag();
			addTag("#page");
				//addStyle("background-image:url(".IMG_PATH."bg8.jpg)");
			endTag();
			addTag("#sc");
				addStyle("color:#0A71B3");
			endTag();
			addTag("#un");
			endTag();
			addTag("#un table");
				addStyle("margin:auto");
			endTag();
			addTag("#un img");
				addStyle("display:block"); 
				addStyle("margin: 0 auto"); 
				addStyle("height:200px");
				addStyle("width:200px");
			endTag();
			addTag("#un h2");
				addStyle("text-align:center");
				addStyle("font-size:1.7em");
				addStyle("color:#0A71B3");
			endTag();
			addTag("#un h3");
				addStyle("font-size:1.5em");
				addStyle("margin-left:20px");
			endTag();
			addTag(".download");
			endTag();
			addTag(".download a");
				addStyle("text-decoration:none");
				addStyle("color:#000");
				addStyle("text-align:center");
				addStyle("display:block");
				addStyle("font-size:1.4em");
			endTag();
			addTag(".download a:hover");
				addStyle("text-decoration:underline");
			endTag();
		}
	}
?>