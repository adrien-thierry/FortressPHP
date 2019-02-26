<?php
	class zone_app
	{
		function code()
		{
			if(isset($_GET[ZONE_GET]))
			{
			    if(strlen(htmlStrip(htmlentities($_GET[ZONE_GET]))) > 0)
				{
					if(is_dir(MAIN_PATH . CONTENT_FOLDER . ZONE_FOLDER . $_GET[ZONE_GET]))
					{
						WF::TPL()->zone = htmlStrip(htmlentities($_GET[ZONE_GET]));
					}
				}
		        /*if(!pageExists(WF::TPL()->name))
		        {
		                if(pageExists(ERROR_PAGE)) WF::TPL()->name = ERROR_PAGE;
		                else WF::TPL()->name = HOME_PAGE;
		        }*/
			}
		}
	}
?>
