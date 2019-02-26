<?php
	class page_app
	{
		function code()
		{
			if(isset($_GET['p']))
			{
		        if(isset($_GET['p']) && strlen(htmlStrip(htmlentities($_GET['p']))) > 0)
				{
					WF::TPL()->name = htmlStrip(htmlentities($_GET['p']));
				}
		        else 
				{
					WF::TPL()->name = HOME_PAGE;
				}
		
		        if(WF::TPL()->name == ADMIN_PAGE) 
				{ 
					require(CONTENT_FOLDER . ADMIN_FOLDER . "admin.php"); $adm = new admin; $adm->getAccess(); exit; 
				}
		        if(!pageExists(WF::TPL()->name))
		        {
		                if(pageExists(ERROR_PAGE)) WF::TPL()->name = ERROR_PAGE;
		                else WF::TPL()->name = HOME_PAGE;
		        }
			}
		}
	}
?>
