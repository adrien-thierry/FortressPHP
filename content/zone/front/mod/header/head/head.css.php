<?php
	class head_css
	{
		public function code()
		{
			WF::Css()->tag("#head");
				//WF::Css()->style("border-bottom:solid 1px #fff");
				//WF::Css()->style("background-image:url(".IMG_PATH."background.jpg)");
				//WF::Css()->style("background-image:url(".IMG_PATH."bg8.jpg)");
				WF::Css()->style("height: 250px");
				WF::Css()->style("background-color:#F7F7F7");
				//WF::Css()->style("margin-bottom:1px");
				//WF::Css()->style("border-color:black");
			WF::Css()->endtag();
		}
	}
?>