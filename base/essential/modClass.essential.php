<?php
if(!defined("FORTRESSPHP")) header('Location: ../');
if(!class_exists("Module"))
{
	class Module
	{
		public function __construct($_path, $_name)
		{
			$this->path = $_path;
			$this->name = $_name;
			$this->checkModule();
			$this->conf = new ModConf($_path, $_name);
		}
		private function checkModule()
		{
			$file = $this->path . "/" . $this->name . "/" . $this->name . MOD_END;
			if(file_exists($file))
			{
				$this->modState = true;
				$this->mod = $file;
			}
			else $this->modState = false;
		}
	}
}
if(!class_exists("ModConf"))
{
	class ModConf
	{
		public function __construct($_path, $_name)
		{
			$this->path = $_path;
			$this->name = $_name;
			$this->config = array("state" => true, "pos" => 0, "css" => "");
			$this->readConf();
			$this->readCss();
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
			
				/*if(substr($l,0,1) != "#" && strpos($l,'=>') !== false && strpos($l, END_LINE) !== false)
				{
					$var = explode("=>", $l);
					if(count($var) == 2)
					{
						$needle = $var[0];
						$value = explode(END_LINE, $var[1])[0];
						switch ($needle)
						{
							
						}
					}				
				}*/
			}
		}
		private function readCss()
		{
			$file = $this->path . "/" . $this->name . "/" . $this->name . CSS_END;
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
function getModulesArray($p, $c = NULL)
{
	$mArr = array();
	$end = MOD_END;
	if($c == NULL) $c =  CONTENT_FOLDER . ZONE_FOLDER . WF::TPL()->zone . '/' . MOD_FOLDER . $p;
	if(is_dir($c))
	{
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
	}
	return $mArr;
}
function sortModules($a, $b)
{
    return $a->conf->config['pos'] - $b->conf->config['pos'];
}
function hookMod($p)
{
	$mArr = getModulesArray($p);
	foreach($mArr as $mod)
	{
		$class = $mod->name.CLASS_MOD;
		if(!class_exists($class)) require($mod->mod);
		if(class_exists($class))
		{
			$modCode = new $class;
			$modCode->path = $mod->path . "/" . $mod->name . "/";
			WF::TPL()->inner .= $modCode->code();
		}
	}
}
function hookCss($css)
{
	$h = opendir($css);
	$end = CSS_END;
	while($ds = readdir($h))
	{
		if($ds != "." && $ds != "..")
		{
			$c = $css."$ds";
			if(is_dir($c))
			{
				$ch = opendir($c);
				while($d = readdir($ch))
				{
					if (is_dir($c.'/' .$d) && $d != "." && $d != "..") 
					{
						$mod = new Module($c, $d);
						if(strlen($mod->conf->config['css']) > 0 && file_exists($mod->conf->config['css']) && $mod->modState && $mod->conf->config['state']) 
						{ 
							$class = $mod->name.CLASS_CSS;
							if(!class_exists($class)) require($mod->conf->config['css']); 
							if(class_exists($class))
							{
								$modCode = new $class;
								$modCode->path = $c.'/' .$d . "/";
								WF::TPL()->inner .= $modCode->code();
							}
						}
					}
				}
				closedir($ch);
			}
		}
	}
	closedir($h);
}
?>
