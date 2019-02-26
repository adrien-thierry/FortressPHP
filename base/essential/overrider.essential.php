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

	class Tools
	{
		public static function OverrideClass($oldClass, $newClass)
		{
			WF::addStaticClass($oldClass, $newClass);
		}
		public static function OverrideStaticMethod($class, $oldFunction, $newFonction)
		{
            $func = self::GetFunctionCodeAndVars($newFonction);
			WF::$class()->addStaticMethod($oldFunction, $func[0], $func[1]);
		}
        public static function OverrideMethod($class, $oldFunction, $newFonction)
        {
            $func = self::GetFunctionCodeAndVars($newFonction);
            WF::$class()->addMethod($oldFunction, $func[0], $func[1]);
        }
        public static function OverrideFunction($oldFunction, $newFonction)
        {
            $func = self::GetFunctionCodeAndVars($newFonction);
            WF::addFunction($oldFunction, $func[0], $func[1]);
        }

		public static function GetFunctionCodeAndVars($n)
		{
			$func = new ReflectionFunction($n);
			return self::GetCode($func);
		}

		public static function GetMethodCodeAndVars($m, $n)
		{
			$cla = new ReflectionClass($m);
			$arr = $cla->getMethods();
			if(isset($arr[array_search($n, $arr)]))
			{
				$v = $arr[array_search($n, $arr)];
				return self::GetCode($v);
			}
			return NULL;
		}

        public static function GetBaseMethodCodeAndVars($m, $n)
        {
            $cla = new ReflectionClass(WF::$m());
            $arr = $cla->getMethods();
            if(isset($arr[array_search($n, $arr)]))
            {   
                $v = $arr[array_search($n, $arr)];
                return self::GetCode($v);
            }
            return NULL;
        }

        public static function GetCode($refFunc)
        {
            $filename = $refFunc->getFileName();
            $start_line = $refFunc->getStartLine() - 1;
            $end_line = $refFunc->getEndLine(); 
            $length = $end_line - $start_line; 
            $source = file($filename); 
            $body = implode("", array_slice($source, $start_line, $length)); 
            $body = trim($body); 
            $code = substr(substr($body, strpos($body, '{') + 1), 0, -2); 
            $sv = strpos($body, '(') + 1; 
            $var = substr($body, $sv, strpos($body, ')') - $sv); 
            return array($var, $code);
        }
	}

abstract class Overrider
{
	static $sArray = array();
	public $methods = array();
    public $__dict__ = array();

    public function __get($name) 
    {
        if (isset($this->__dict__[$name])) 
        {
            return $this->__dict__[$name];
        } 
        else 
        {
            return null;
        }
    }

    public function __set($name, $value) 
    {
        $this->__dict__[$name] = $value;
    }

    public function __call($method, $args)
    {
    	if(is_callable($this->methods[$method]))
    	{
    		return call_user_func_array($this->methods[$method], $args);
    	}
    }

    public static function __callstatic($n, $args)
    {
    	if(is_callable(self::$sArray[$n]))
    	{
    		return call_user_func_array(self::$sArray[$n], $args);
    	}
        else return self::$sArray[$n];
    }
    

    public static function addStaticVar($n, $v)
    {
        self::$sArray[$n] = $v;
    }
    public static function addStaticClass($n, $v)
    {
        self::$sArray[$n] = new $v();
        $cla = new ReflectionClass(self::$n());
        $arr = $cla->getMethods();

        foreach($arr as $f => $c)
        {
            $name = $c->getName();
            if(startsWith($name, "base_"))
            {
                $func = Tools::GetBaseMethodCodeAndVars($n, $c);
                $name = str_replace("base_", "", strtolower($name));
                self::$n()->addMethod($name, $func[0], $func[1]);
            }
        }
    }

    public static function addStaticMethod($n, $v, $c)
    {
        $tmp = 'function(' . $v . ') { ' . $c .' }';
    	$add = 'self::$sArray["' . $n . '"] = Closure::bind(' . $tmp . ', NULL, get_class());';
    	eval($add);
    }


    public function addMethod($n, $v, $c)
    {
        $tmp = 'function(' . $v . ') { ' . $c .' }';
    	$add = '$this->methods["' . $n . '"] = Closure::bind(' . $tmp . ', $this, NULL);';
    	eval($add);
    }

    public function addFunction($n, $v, $c)
    {
        $tmp = 'function(' . $v . ') { ' . $c .' }';
        $add = 'self::$sArray["' . $n . '"] = Closure::bind(' . $tmp . ', NULL, get_class());';
        eval($add);
    }
}

class WF extends Overrider {}


?>
