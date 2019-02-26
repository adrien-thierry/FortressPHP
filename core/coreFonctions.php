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
if(!class_exists("Page"))
{
	class Page
	{
		public function __construct($_path, $_name)
		{
			$this->path = $_path;
			$this->name = $_name;
			$this->checkPage();
		}
		public function incModules()
		{
			if(isset($this->modules) && count($this->modules) > 0) foreach($this->modules as $mod) 
			{
				require($mod->mod);
				$class = $mod->name.CLASS_MOD;
				if(class_exists($class))
				{
					$modCode = new $class;
					$modCode->path = $mod->path . "/" . $mod->name . "/";
					$modCode->code();
				}
			}
		}
		public function cssModules()
		{
			if(isset($this->modules) && count($this->modules) > 0) foreach($this->modules as $mod) 
			{ 
				if(isset($mod->conf->config['css']) && file_exists($mod->conf->config['css'])) 
				{
					require($mod->conf->config['css']); 
					$class = $mod->name.CLASS_CSS;
					if(class_exists($class))
					{
						$modCode = new $class;
						$modCode->code();
					}
				}
			}
		}
		private function checkPage()
		{
			$file = $this->path . "/" . $this->name . PAGE_END;
			if(file_exists($file))
			{
				$this->pageState = true;
				$this->page = $file;
				$this->conf = new PageConf($this->path, $this->name);
				$this->getPageModules();
			}
			else $this->pageState = false;
		}
		
		private function getPageModules()
		{
			if(isset($this->conf->config['mod']) && is_dir($this->path . '/' . $this->conf->config['mod'])) $this->modules = getPageModulesArray($this->path . '/' . $this->conf->config['mod']);
		}
	}
}
if(!class_exists("PageConf"))
{
	class PageConf
	{
		public function __construct($_path, $_name)
		{
			$this->path = $_path;
			$this->name = $_name;
			$this->config = array("state" => true, "pos" => 0);
			$this->readConf();
			$this->readCss();
		}
		private function readConf()
		{
			$file = $this->path . "/" . $this->name . CONFIG_END;
			if(file_exists($file))
			{
				require ($file);
				$class = $this->name.CLASS_CONF;
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
							case "mod": $this->config['mod'] = $value; break;
							default: break;
						}
					}
				}
			}
		}
		private function readCss()
		{
			$file = $this->path . "/" . $this->name . CSS_END;
			if(file_exists($file))
			{
				$this->config['css'] = $file;
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
function getPageModulesArray($c)
{
	$mArr = array();
	$end = MOD_END;
	$h = opendir($c);
	while($d = readdir($h))
	{
		if (is_dir($c.'/' .$d) && $d != "." && $d != "..") 
		{
			$mod = new Module($c, $d);
			if($mod->modState && $mod->conf->config['state']) { array_push($mArr, $mod); }
		}
	}
	closedir($h);
	usort($mArr, 'sortModules');
	return $mArr;
}
function addPage($p)
{
	$c = CONTENT_FOLDER.PAGE_FOLDER.$p;
	$page = new Page($c, $p);
	if($page->pageState && $page->conf->config['state']) 
	{ 
		require($page->page);
		$class = $page->name.CLASS_PAGE;
		if(class_exists($class))
		{
			$modCode = new $class;
			$modCode->path = $c . "/";
			$modCode->code();
		}
		$page->incModules();
	}	
}
function addCss($page)
{
	$c = CONTENT_FOLDER.PAGE_FOLDER.$page."/";
	if(is_dir($c) && is_dir($c))
	{
		$d = opendir($c);
		//while($d = readdir($ch))
		//{
			//if (is_dir($c . $d) && $d != "." && $d != "..") 
			//{
				$page = new Page($c, $page);
				if($page->pageState && $page->conf->config['state'] && isset($page->conf->config['css']) ) 
				{
					require($page->conf->config['css']); 
					$class = $page->name.CLASS_CSS;
					if(class_exists($class))
					{
						$modCode = new $class;
						$modCode->code();
					}
				}
				$page->cssModules();
			//}
		//}
		closedir($d);
	}
}
function pageExists($p)
{
	$c = CONTENT_FOLDER.PAGE_FOLDER.$p;
	if(is_dir($c)) return true;
	else return false;
}
function htmlStrip($s)
{
	return str_replace("\\", "", str_replace("/", "", str_replace(".", "", $s)));
}
?>