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
