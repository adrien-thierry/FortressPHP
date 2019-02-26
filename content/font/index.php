<?php
/*
	TODO LIST :
	- EASY FLIP BANNIERE MANAGER
	- WEBSITE AUDIT & PRODUCT DEMO
	- WEB CONTACT FORM

	c = css
	e = error
	p = page
		
*/
	if(!file_exists("config/start.conf.php")) die("No valid conf file found");
	include("config/start.conf.php");
	if(isset($_GET['c']) && strlen(htmlStrip(htmlentities($_GET['c']))) > 0) 
	{
		if(isset($_GET['p']) && strlen(htmlStrip(htmlentities($_GET['p']))) > 0) 
		{
			cssHeader();
			include CSS_PATH.htmlStrip(htmlentities($_GET['c'])).CSS_END;
			addCss($_GET['p']);
			hookCss(CONTENT_FOLDER.MOD_FOLDER);
		}
		exit;
	}
	else if(isset($_GET['e']) && strlen(htmlStrip(htmlentities($_GET['e']))) > 0){$page = htmlStrip(htmlentities($_GET['e'])); header("Location: ".MAIN_URL.BASE_SCRIPT."?p=$page");}
	else if(isset($_GET['p']) && strlen(htmlStrip(htmlentities($_GET['p']))) > 0) $page = htmlStrip(htmlentities($_GET['p']));
	else $page = HOME_PAGE;
	if(!pageExists($page))
	{
		if(pageExists(ERROR_PAGE)) $page = ERROR_PAGE;
		else $page = HOME_PAGE;
	}
	$GLOBALS['langage'] = createLangage();
	// DOCTYPE
	echoDoctype();
		// HTML
		echoHtmlStart();
		//HEAD META
		echoHeadStart();
				hookMod($hook_order[0]);
				linkCss(BASE_SCRIPT."?c=global&p=$page");
		echoHeadEnd();
		// BODY
		echoBodyStart();
		// HEADER
			addDiv("header");
				// HEADER
				hookMod($hook_order[1]);
				// MENU
				hookMod($hook_order[2]);
			endDiv();
		// PAGE
			addDiv("global");
				// ADD PAGE
				addDiv("background");
					addDiv("content");
						$hook_order[3];
							addDiv("page");
								addPage($page);
							endDiv();
						$hook_order[4];
					endDiv();
				endDiv();
			endDiv();
			// FOOTER
			addDiv("footer");
				// HOOK FOOTER
				hookMod($hook_order[5]);
				//
			endDiv();
			addDiv("hidden");
				// HOOK HIDDEN
				hookMod($hook_order[6]);
			endDiv();
		// BODY END
		echoBodyEnd();
	// HTML END
	echoHtmlEnd();
?>
