<?php

	class css_app
	{
		public function code()	
		{
			if(isset($_GET[CSS_GET]) && strlen(htmlStrip(htmlentities($_GET[CSS_GET]))) > 0)
		    {
		                WF::Css()->cssheader();
		                require CSS_PATH.htmlStrip(htmlentities($_GET[CSS_GET])).CSS_END;
		                if(isset($_GET[CSS_TARGET]) && strlen(htmlStrip(htmlentities($_GET[CSS_TARGET]))) > 0)
		                {
							hookZoneCss(ZONE_FOLDER, WF::TPL()->zone);
				            addCss($_GET[CSS_TARGET]);
				            hookCss(CONTENT_FOLDER . ZONE_FOLDER . WF::TPL()->zone . '/' . MOD_FOLDER);
		                }
				//WF::TPL()->show();
				//die();
			}
		}
    }
?>
