<?php

/*
FortressPHP
Copyright (C) 2019  Adrien THIERRY

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/


	if(!file_exists("config/start.conf.php")) die("No valid conf file found");
	include("config/start.conf.php");
	if(isset($_GET['c']) && strlen(htmlStrip(htmlentities($_GET['c']))) > 0) 
	{
		cssHeader();
		require CSS_PATH.htmlStrip(htmlentities($_GET['c'])).CSS_END;
		if(isset($_GET['p']) && $_GET['p'] != ADMIN_PAGE && strlen(htmlStrip(htmlentities($_GET['p']))) > 0) 
		{
			addCss($_GET['p']);
			hookCss(CONTENT_FOLDER.MOD_FOLDER);
		}
		exit;
	}
	else if(isset($_GET['e']) && strlen(htmlStrip(htmlentities($_GET['e']))) > 0){$page = htmlStrip(htmlentities($_GET['e'])); header("Location: ".MAIN_URL.BASE_SCRIPT."?p=$page");}
	else if(isset($_GET['p']) && strlen(htmlStrip(htmlentities($_GET['p']))) > 0) $page = htmlStrip(htmlentities($_GET['p']));
	else $page = HOME_PAGE;
	if($page == ADMIN_PAGE) { require(CONTENT_FOLDER . ADMIN_FOLDER . "admin.php"); $adm = new admin; $adm->getAccess(); exit; }
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
