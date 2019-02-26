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
if(!class_exists("Script"))
{
        class Script
        {
                public function __construct($_path, $_name)
                {
                        $this->path = $_path;
                        $this->name = $_name;
                        $this->checkScript();
                        $this->conf = new ScriptConf($_path, $_name);
                }
                private function checkScript()
                {
                        $file = $this->path . "/" . $this->name . "/" . $this->name . SCRIPT_END;
                        if(file_exists($file))
                        {
                                $this->scriptState = true;
                                $this->script = $file;
                        }
                        else $this->scriptState = false;
                }
        }
}


if(!class_exists("ScriptConf"))
{
        class ScriptConf
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



function getScriptArray($p)
{
        $sArr = array();
        $end = SCRIPT_END;
        $c = CONTENT_FOLDER.SCRIPT_FOLDER.$p;
        if(is_dir($c))
        {
                $h = opendir($c);
                while($d = readdir($h))
                {
                        if (is_dir($c.'/' .$d) && $d != "." && $d != "..")
                        {
                                $script = new Script($c, $d);
                                if($script->scriptState && $script->conf->config['state']) { array_push($sArr, $script); }
                        }
                }
                closedir($h);
                usort($sArr, 'sortScript');
        }
        return $sArr;
}
function sortScript($a, $b)
{
    return $a->conf->config['pos'] - $b->conf->config['pos'];
}
function hookScript($p)
{
        $sArr = getScriptArray($p);
        foreach($sArr as $script)
        {
                require($script->script);
              	$class = $script->name.CLASS_SCRIPT;
                if(class_exists($class))
                {
                        $scriptCode = new $class;
                        $scriptCode->path = $script->path . "/" . $script->name . "/";
                        TWF::TPL()->inner .= $scriptCode->code();
                }
        }
}
?>
