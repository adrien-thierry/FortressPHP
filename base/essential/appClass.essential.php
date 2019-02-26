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
if(!class_exists("App"))
{
	class App
	{
		public function __construct($_path, $_name)
		{
			$this->path = $_path;
			$this->name = $_name;
			$this->checkApp();
			$this->conf = new AppConf($_path, $_name);
		}
		private function checkApp()
		{
			$file = $this->path . "/" . $this->name . "/" . $this->name . APP_END;
			if(file_exists($file))
			{
				$this->appState = true;
				$this->app = $file;
			}
			else $this->appState = false;
		}
	}
}
if(!class_exists("AppConf"))
{
	class AppConf
	{
		public function __construct($_path, $_name)
		{
			$this->path = $_path;
			$this->name = $_name;
			$this->config = array("state" => true, "pos" => 0);
			$this->readConf();
		}
		private function readConf()
		{
			$file = $this->path . "/" . $this->name . "/" . $this->name . CONFIG_END;
			if(file_exists($file))
			{
				$class = $this->name.CLASS_CONF;
				if(!class_exists($class)) require ($file);
				if(class_exists($class))
				{
					$conf = new $class();
					$class_vars = get_class_vars(get_class($conf));
					foreach ($class_vars as $name => $value) 
					{
						switch($name)
						{
							case "state": $this->config['state'] = $value; break;
							case "pos": $this->config['pos'] = $value; break;
							default: break;
						}
					}
				}
			}
		}
		private function checkState($state)
		{	
			if($state == "true") $this->config['state'] = true;
			else $this->config['state'] = false;
		}
		private function checkPos($pos)
		{
			if(is_int($this->config['pos'])) $this->config['pos'] = intval($pos);
		}
	}
}
function getAppArray($p)
{
	$aArr = array();
	$end = APP_END;
	$c = APP_FOLDER.$p;
	if(is_dir($c))
	{
		$h = opendir($c);
		while($d = readdir($h))
		{
			if (is_dir($c.'/' .$d) && $d != "." && $d != "..") 
			{
				$app = new App($c, $d);
				if($app->appState && $app->conf->config['state']) { array_push($aArr, $app); }
			}
		}
		closedir($h);
		usort($aArr, 'sortApp');
	}
	return $aArr;
}
function sortApp($a, $b)
{
    return $a->conf->config['pos'] - $b->conf->config['pos'];
}
function Launch($p)
{
	$aArr = getAppArray($p);
	foreach($aArr as $app)
	{
		$class = $app->name.CLASS_APP;
		if(!class_exists($class)) require($app->app);
		if(class_exists($class))
		{
			$appCode = new $class;
			$appCode->path = $app->path . "/" . $app->name . "/";
			$cFile = $appCode->path . $app->name . CODE_END;
			if(file_exists($cFile)) include($cFile);
			if(method_exists($appCode, "override")) $appCode->override();
			if(method_exists($appCode, "code")) $appCode->code();
		}
	}
}
?>
