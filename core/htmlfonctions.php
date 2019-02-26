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


	// FICHIER DE FONCTIONS DE FORMATAGE HTML

	function sanitize($e)
        {  
                $e = str_replace("é", "&eacute;",$e);
                $e = str_replace("è", "&egrave;",$e);
                $e = str_replace("ê", "&ecirc;",$e);
                $e = str_replace("ë", "&euml;", $e);
                $e = str_replace("ï", "&iuml;", $e);
		// [...] 
                return $e;
        }
	function echoDoctype()
	{
		echo "<!doctype html>";
	}
        function echoHtmlStart()
        {
                echo "<html>";
        }
	function echoHeadStart()
	{
		echo "<head>";
	}

	function echoHeadEnd()
	{
		echo "</head>";
	}
	function echoTitle($t)
	{	
		echo "<title>$t</title>";
	}
	function echoBodyStart()
	{
		echo "<body>";
	}
	function echoBodyEnd()
	{
		echo "</body>";
	}
        function echoHtmlEnd()
        {
                echo "</html>";
        }
        function echoH1($h, $e = null)
        {
                echo '<h1 '.$e.'>'.$h.'</h1>';
        }
	function echoH2($h, $e = null)
        {
                echo '<h2 '.$e.'>'.$h.'</h2>';
        }
	function echoH3($h, $e = null)
	{
		echo '<h3 '.$e.'>'.$h.'</h3>';
	}
	function echoLink($str, $target, $e = null)
        {
                echo '<a '.$e.' href="'.$target.'">'.$str.'</a>';
        }
	function addLink($str, $target, $e = null)
        {
                echo '<a '.$e.' href="'.$target.'">'.$str.'</a>';
        }
	function echoImgLink($img, $target, $a = null, $i=null, $e=null)
	{
		echo '<a '.$e.' href="'.$target.'"><img '.$i.' src="'.$img.'" alt="'.$a.'"></a>';
	}
	function echoImg($img, $a = null, $e = null)
	{
		echo '<img '.$e.' src="'.$img.'" alt="'.$a.'">';
	}
	function addDiv($d, $e=null)
	{
		echo "<div $e id=$d>";
	}
	function endDiv()
	{
		echo "</div>";
	}
	function br()
	{
		echo "<br />";
	}
	function space($c = 1)
	{
		$i = 0;
		while($i++ < $c) echo "&nbsp;";
	}
	function addUl($a=null, $b=null)
	{
		echo "<ul $b>$a";	
	}
	function endUl()
	{
		echo "</ul>";
	}
	function addLi($a, $b=null)
	{
		echo "<li $b>$a</li>";	
	}
	function echoScript($s)
	{
		echo "<script>\n";
		echo $s."\n";
		echo "</script>\n";
	}
	function linkCss($c)
	{
		echo '<link rel="stylesheet" type="text/css" href="'.$c.'">';
	}
	function linkJS($j)
	{
		echo '<script src="'.$j.'" type="text/javascript"></script>';
	}
	function addTable($element = null)
        {
                echo "<table $element>\n";
        }
        function endTable()
        {
                echo "</table>\n";
        }
        function addTbody()
        {
                echo "<tbody>";
        }
        function endTbody()
        {
                echo "</tbody>";
        }
        function addTr($element = null)
        {
                echo "<tr $element>";
        }
	function endTr()
        {
                echo "</tr>";
        }
        function addTh($t, $e = null)
        {
                echo "<th $e>".$t."</th>";
        }
        function addTd($t, $e = null)
        {
                echo "<td $e>".$t."</td>";
        }
		function echoTh()
		{
			echo "<th>";
		}
		function endTh()
		{
			echo "</th>";
		}
		function echoTd()
		{
			echo "<td>";
		}
		function endTd()
		{
			echo "</td>";
		}
	function reloc($url)
	{
		header("Location: $url");
	}
	function addLine($e=null)
	{
		if($e != null)
			echo "<hr $e>";
		else echo "<hr>";
	}
	function addMeta($n, $c=null)
	{
		if($c!=null)
			echo "<meta name=\"$n\" content=\"$c\">";
		else echo "<meta name=\"$n\">";
	}
	function addCharset($e)
	{
		echo '<meta charset="'.$e.'">';
	}
	function addP($t, $e=null)
	{
		if($e!=null)
			echo "<p $e>$t</p>";
		else echo "<p>$t</p>";
	}
	function addText($t)
	{
		echo "$t<br/>";
	}
	function addSpan($t, $e=null)
	{
		if($e!=null)
			 echo "<span $e>$t</span>";
                else echo "<span>$t</span>";
	}
	function addSpanBr($t, $e=null)
	{
		if($e!=null)
			echo "<span $e>$t</span><br/>";
		else echo "<span>$t</span><br/>";
	}
	function addIco($a)
	{
		echo '<link rel="icon" type="image/x-icon" href="'.$a.'" />';
	}

	function addMenu($m, $t, $e=null)
	{
		echo '<a href="'.$t.'" '.$e.'>'.$m.'</a>';
	}
	
?>
