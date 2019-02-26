<?php
	if(!defined("FORTRESSPHP")) header('Location: ../');
	class menu_css
	{
		public function code()
		{
			WF::Css()->tag("#menu");
				//WF::Css()->style("max-width:1000px");
				//WF::Css()->style("margin:auto");
				WF::Css()->style("height:50px");
				WF::Css()->style("width:90%");
				WF::Css()->style("float:left");
				WF::Css()->style("padding:0px");
				WF::Css()->style("margin-top:-70px");
				WF::Css()->style("margin-left:60px");
				//WF::Css()->style("border-bottom:solid 1px #fff");
				//WF::Css()->style("background-color:#FFF");
				//WF::Css()->style("background-image:url(".IMG_PATH."bg8.jpg)");
			WF::Css()->endtag();
			WF::Css()->tag("#tab");
				//WF::Css()->style("margin-left:30px");
				//WF::Css()->style("background-color:grey");
				WF::Css()->style("overflow:hidden");
				WF::Css()->style("padding-bottom:10px");
			WF::Css()->endtag();
			WF::Css()->tag('#tab a');
				WF::Css()->style("float:left");
				WF::Css()->style("color:#0A71B3");
				WF::Css()->style("margin-top:10px");
				WF::Css()->style("text-decoration:none");
				WF::Css()->style("font-size:1.5em");
				WF::Css()->style("font-weight:bold");
				WF::Css()->style("margin-left:25px");
				WF::Css()->style("margin-right:25px");
			WF::Css()->endtag();
			WF::Css()->tag("#tab a:hover");
				WF::Css()->style("color:#014571");
			WF::Css()->endtag();
		}
	}
?>