<?php
if(!defined("FORTRESSPHP")) header('Location: ../');
if(!class_exists("Zone"))
{
	class Zone
	{
		public function __construct($_path, $_name)
		{
			$this->path = $_path;
			$this->name = $_name;
			$this->checkZone();
			$this->conf = new ZoneConf($_path, $_name);
		}
		private function checkZone()
		{
			$folder = $this->path . "/";
			if(is_dir($folder))
			{
				$this->zoneState = true;
				$this->zone = $folder;
			}
			else $this->zoneState = false;
		}
	}
}
if(!class_exists("ZoneConf"))
{
	class ZoneConf
	{
		public function __construct($_path, $_name)
		{
			$this->path = $_path . '/';
			$this->name = $_name;
			$this->config = array("state" => true, "css" => "");
			$this->readConf();
			$this->readCss();
		}
		private function readConf()
		{
			$file = $this->path . "/" . $this->name . CONFIG_END;
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
	}
}

function hookZoneCss($z, $name)
{
	$path = MAIN_PATH . CONTENT_FOLDER . $z . $name;

	$end = CSS_END;
	if (is_dir($path)) 
	{
		$zone = new Zone($path, $name);
		if(strlen($zone->conf->config['css']) > 0 && file_exists($zone->conf->config['css']) && $zone->zoneState && $zone->conf->config['state']) 
		{ 
			$class = $zone->name . CLASS_CSS;
			if(!class_exists($class)) require($zone->conf->config['css']);
			{
				$zoneCode = new $class();
				$zoneCode->path = $zone->path . $name;
				WF::TPL()->inner .= $zoneCode->code();
			}
		}
	}
}
?>
