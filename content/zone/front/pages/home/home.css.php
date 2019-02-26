<?php 
	if(!defined("FORTRESSPHP")) header('Location: ../');
	class home_css
	{
		public function code()
		{
			WF::Css()->tag("#background");
						WF::Css()->style("background-color:#FFF");
			WF::Css()->endtag();
		}
	}
?>