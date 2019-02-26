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
	function addCrypt($s = null)
	{
		echo "<script>";
		if($s==null) return;
		$l = strlen($s);
		$tmp = rand(0,24);
		$tab = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
		$tmp = $tab[$tmp];
		echo "var $tmp=[";
		for($i=0; $i<$l;$i++)
		{
			if($i > 0) echo ',';
			$d = rand(1,5);
			$t = ord($s[$i]);
			$c = $d + $t;
			echo "[$c,$d]";
		}
		echo "];for (var i=0;i<$l;i++){document.write(String.fromCharCode($tmp"."[i][0]-$tmp"."[i][1]));"."}";
		echo "</script>";
	}
	
	function addF($n = null, $e = null)
	{
		echo "function $n($e){";
	}
	function endF()
	{
		echo "}";
	}
	function addI($e)
	{
		echo "$e;";
	}
	function addV($n = null, $v = null)
	{
		$html = "var $n";
		if($v != null) $html .= " = $v";
		$html .= ";";
		echo $html;
	}
	function addW($c)
	{
		echo "while($c){";
	}
	
	function addS($s, $n = null)
	{	
		addV("$s", 'document.createElement("select")');
		addI("$s.setAttribute(\"name\", \"$n\")");		
	}
	function addO($o, $v, $n)
	{
		addV("$o", 'document.createElement("option")');
		addI("$o.setAttribute(\"value\", \"$v\")");
		addI("$o.innerHTML = \"$n\"");
	}
	function appChild($a, $b)
	{
		addI("$a.appendChild($b)");
	}
	function addForm($i, $a, $m, $t)
	{
		$html = "<form";
		$html .= " id=\"$i\"";
		$html .= " action=\"$a\"";
		$html .= " method=\"post\"";
		$html .= " target=\"_top\"";
		$html .= ">";
		echo $html;
	}
	function endForm()
	{
		echo "</form>";
	}
	function addInput($o, $t, $n, $v)
	{
		addV("$o", 'document.createElement("input")');
		addI("$o.setAttribute(\"type\", \"$t\")");
		addI("$o.setAttribute(\"name\", \"$n\")");
		addI("$o.setAttribute(\"value\", \"$v\")");
	}
	function addImgInput($o, $t, $n, $v, $s = null)
	{
		addV("$o", 'document.createElement("input")');
		addI("$o.setAttribute(\"type\", \"image\")");
		addI("$o.setAttribute(\"src\", \"$t\")");
		addI("$o.setAttribute(\"name\", \"$n\")");
		addI("$o.setAttribute(\"value\", \"$v\")");
		addI("$o.setAttribute(\"style\", \"$s\")");
	}
?>
