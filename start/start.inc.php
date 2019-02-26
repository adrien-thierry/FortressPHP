<?php

if(!defined("FORTRESSPHP")) header('Location: ../');
$conf_file = dirname( __FILE__ ) . "/" . "conf.start.php";
if(!file_exists( $conf_file)) die("No valid conf file found");
define("MAIN_PATH", realpath(dirname(dirname(__FILE__))) . '/');
define ("BASE_PATH", MAIN_PATH . "base/");
include("$conf_file");


class Load
{
	public static  function Dynamic()
	{
		$arr = get_declared_classes();
		foreach($arr as $k => $v)
		{
			if(startsWith($v, "Core_"))
			{
				$cName = str_replace("Core_", "", $v);
				WF::addStaticClass($cName, $v);
			}
		}

		$arr = get_defined_functions();
		foreach($arr["user"] as $k => $v)
		{
			if(startsWith($v, "l_"))
			{
				$name = str_replace("l_", "", $v);
				Tools::OverrideFunction($name, $v);
			}
		}

	} 	
	
    public static function Base($str)
    {
		Load::Inc(BASE_PATH . $str . '/', '*.{' . $str . '.php}');
    }

	public static function Inc($p, $g)
	{
		$files = glob($p . $g, GLOB_BRACE);
        if($files != false)
        {
                foreach($files as $file)
                {
                        include($file);
                }
        }
		$gfolders = glob($p . '*', GLOB_ONLYDIR);

		if(count($gfolders) > 0)
		{
			for( $i = 0; $i < count($gfolders); $i++)
			{
				if(strlen($gfolders[$i]) > 0) { Load::Inc($gfolders[$i] . '/', $g); }
			}
		}
	}
}

?>
