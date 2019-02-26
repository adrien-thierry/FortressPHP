<?php
	if(!defined("FORTRESSPHP")) header('Location: ../');

	class Core_JS extends overrider
	{
 		function base_jsheader()
        {
                 header("Content-type: application/javascript");
        }

        function base_createjs($path)
        {
                return $path;
        }

        function base_getjs($path)
        {
                return $path;
        }

		function base_crypt($s = null)
		{
			TPL::$inner .= "<script>";
			if($s==null) return;
			$l = strlen($s);
			$tmp = rand(0,24);
			$tab = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
			$tmp = $tab[$tmp];
			WF::TPL()->inner .= "var $tmp=[";
			for($i=0; $i<$l;$i++)
			{
				if($i > 0) TPL::$inner .= ',';
				$d = rand(1,5);
				$t = ord($s[$i]);
				$c = $d + $t;
				TPL::$inner .= "[$c,$d]";
			}
			WF::TPL()->inner .= "];for (var i=0;i<$l;i++){document.write(String.fromCharCode($tmp"."[i][0]-$tmp"."[i][1]));"."}";
			WF::TPL()->inner .= "</script>";
		}
		
		function base_function($n = null, $e = null)
		{
			WF::TPL()->inner .= "function $n($e){";
		}
		function base_endfunction()
		{
			WF::TPL()->inner .= "}";
		}
		function base_instruction($e)
		{
			WF::TPL()->inner .= "$e;";
		}
		function base_var($n = null, $v = null)
		{
			$html = "var $n";
			if($v != null) $html .= " = $v";
			$html .= ";";
			WF::TPL()->inner .= $html;
		}
		function base_while($c)
		{
			WF::TPL()->inner .= "while($c){";
		}
		
		function base_select($s, $n = null)
		{	
			addV("$s", 'document.createElement("select")');
			addI("$s.setAttribute(\"name\", \"$n\")");		
		}
		function base_option($o, $v, $n)
		{
			addV("$o", 'document.createElement("option")');
			addI("$o.setAttribute(\"value\", \"$v\")");
			addI("$o.innerHTML = \"$n\"");
		}
		function base_appendchild($a, $b)
		{
			addI("$a.appendChild($b)");
		}

		function base_input($o, $t, $n, $v)
		{
			addV("$o", 'document.createElement("input")');
			addI("$o.setAttribute(\"type\", \"$t\")");
			addI("$o.setAttribute(\"name\", \"$n\")");
			addI("$o.setAttribute(\"value\", \"$v\")");
		}

		function base_imginput($o, $t, $n, $v, $s = null)
		{
			addV("$o", 'document.createElement("input")');
			addI("$o.setAttribute(\"type\", \"image\")");
			addI("$o.setAttribute(\"src\", \"$t\")");
			addI("$o.setAttribute(\"name\", \"$n\")");
			addI("$o.setAttribute(\"value\", \"$v\")");
			addI("$o.setAttribute(\"style\", \"$s\")");
		}

	}	
?>
