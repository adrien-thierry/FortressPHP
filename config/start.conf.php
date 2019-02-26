<?php
	// define FORTRESSPHP
	define("FORTRESSPHP", 1);
	
	// CONFIGURATION
	
	// URL
	define("MAIN_URL", "/");
	
	// MAIN FOLDERS
	define("ROOT_FOLDER", realpath(dirname(__FILE__))."/");
	define("CORE_FOLDER", "core/");
	define("CONTENT_FOLDER", "content/");

	// MAIN PAGES
	define("BASE_SCRIPT", "");
	define("HOME_PAGE", "home");
	define("ERROR_PAGE", "home");
	define("ADMIN_PAGE", "admin123");
		
	// FOLDER
	define("PAGE_FOLDER", "pages/");
	define("MOD_FOLDER", "mod/");
	define("CSS_FOLDER", "css/");
	define("JS_FOLDER", "js/");
	define("IMG_FOLDER", "img/");
	define("DOWNLOAD_FOLDER", "d/");
	define("ADMIN_FOLDER", "admin/");
	define("TMP_FOLDER", "tmp/");
	define("SQUEL_FOLDER", "squel/");
	
	// PATH
	define("CSS_PATH", CONTENT_FOLDER.CSS_FOLDER);
	define("JS_PATH", CONTENT_FOLDER.JS_FOLDER);
	define("IMG_PATH", CONTENT_FOLDER.IMG_FOLDER);
	define("DOWNLOAD_PATH", CONTENT_FOLDER.DOWNLOAD_FOLDER);
	
	// CLASS END
	define("CLASS_PAGE", "_page");
	define("CLASS_MOD", "_mod");
	define("CLASS_CSS", "_css");
	define("CLASS_CONF", "_conf");
	
	// END
	define("PAGE_END", ".page.php");
	define("MOD_END", ".mod.php");
	define("CSS_END", ".css.php");
	define("JS_END", ".js.php");
	define("CONFIG_END", ".conf.php");
	
	// HOOK ORDER
	$hook_order = array( 
							0 => "meta",
							1 => "header",
							2 => "menu",
							3 => "body_left",
							4 => "body_rigth",
							5 => "footer",
							6 => "hidden",
						);
	
	// OTHERS
	define("END_LINE", ";");
	
	// REQUIRES
	require("user.conf.php");
	require(CORE_FOLDER."htmlfonctions.php");
	require(CORE_FOLDER."cssfonctions.php");
	require(CORE_FOLDER."svgfonctions.php");
	require(CORE_FOLDER."twitterfonctions.php");
	require(CORE_FOLDER."jsfonctions.php");
	require(CORE_FOLDER."translation.php");
	require(CORE_FOLDER."modFonctions.php");
	require(CORE_FOLDER."coreFonctions.php");
	require(CORE_FOLDER."adminFonctions.php");
?>