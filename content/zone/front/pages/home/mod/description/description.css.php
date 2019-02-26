<?php 
	if(!defined("FORTRESSPHP")) header('Location: ../');
	class description_css
	{
		public function code()
		{
			WF::Css()->tag("#description");
				WF::Css()->style("background-color:#F7F7F7");
				WF::Css()->style("text-align:center");
				WF::Css()->style("margin:auto");
				WF::Css()->style("padding-bottom:20px");
				WF::Css()->style("width:100%");
				WF::Css()->style("color:#000");
			WF::Css()->endtag();
		}
	}
?>