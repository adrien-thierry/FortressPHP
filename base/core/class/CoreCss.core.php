<?php
	class Core_Css extends Overrider
	{
		function base_cssheader()
		{
			header("Content-type: text/css");
		}
		function base_tag($t, $e=null)
		{
			WF::TPL()->inner .= "$t $e{";
		}
		function base_endtag()
		{
			WF::TPL()->inner .= "} ";
		}
		function base_style($s)
		{
			WF::TPL()->inner .= "$s;";
		}
	}
?>
