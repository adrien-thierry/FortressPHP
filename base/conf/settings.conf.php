<?php

        // CONFIGURATION

        // URL
        define("MAIN_URL", "/");

        // MAIN FOLDERS
        define("ROOT_FOLDER", realpath(dirname(__FILE__))."/");
	define ("APP_PATH", MAIN_PATH . "app/");
        define("CORE_FOLDER", "core/");
        define("CONTENT_FOLDER", "content/");
        define("GLOBAL_FOLDER", "global/");

        // ZONES FOLDER
        define("ZONE_FOLDER", "zone/");
        define("DEFAULT_ZONE", "front");

        // MAIN PAGES
        define("BASE_SCRIPT", "");
        define("HOME_PAGE", "home");
        define("ERROR_PAGE", "home");
        
        // GET REQUEST
        define("PAGE_GET", "p");

	// ON PAGE CONF : IS_ADMIN true || false
        define("ADMIN_PAGE", "admin123");

	// FUNCTION
	define("CODE_FUNCTION", "code");
	define("INSTALL_FUNCTION", "install");
	define("DEFINE_FUNCTION", "def");


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
	define("SCRIPT_FOLDER", "script/");
	define("APP_FOLDER", "app/");

        // PATH
        define("CSS_PATH", CONTENT_FOLDER.GLOBAL_FOLDER.CSS_FOLDER);
        define("JS_PATH", CONTENT_FOLDER.GLOBAL_FOLDER.JS_FOLDER);
        define("IMG_PATH", CONTENT_FOLDER.GLOBAL_FOLDER.IMG_FOLDER);
        define("DOWNLOAD_PATH", CONTENT_FOLDER.GLOBAL_FOLDER.DOWNLOAD_FOLDER);

        // CLASS END
        define("CLASS_PAGE", "_page");
        define("CLASS_MOD", "_mod");
        define("CLASS_CSS", "_css");
        define("CLASS_CONF", "_conf");
	define("CLASS_SCRIPT", "_script");
	define("CLASS_APP", "_app");

        // END
        define("PAGE_END", ".page.php");
        define("MOD_END", ".mod.php");
        define("CSS_END", ".css.php");
        define("JS_END", ".js.php");
        define("CONFIG_END", ".conf.php");	
	define("SCRIPT_END", ".script.php");
	define("APP_END", ".app.php");
	define("CODE_END", ".code.php");

        // OTHERS
        define("END_LINE", ";");

?>
