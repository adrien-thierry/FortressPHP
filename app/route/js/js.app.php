<?php

	class js_app
	{
		function override()
		{
			Tools::OverrideMethod("JS", "createjs", "new_createjs");
			Tools::OverrideMethod("JS", "getjs", "new_getjs");
		}

		function code()
		{
			if(isset($_GET[JS_GET]))
			{
				if(JS_PACK) TWF::TPL()->inner .= JsPacker::Pack(WF::JS()->getjs($_GET[JS_GET]));
				else WF::TPL()->inner .= WF::JS()->getjs($_GET[JS_GET]);
				WF::TPL()->show();
				die();
			}	
		}
	}
?>
