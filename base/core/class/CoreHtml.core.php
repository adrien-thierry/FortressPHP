<?php

	// FICHIER DE FONCTIONS DE FORMATAGE HTML
	class Core_Html extends Overrider
	{
		function base_sanitize($e)
        {  
            $e = str_replace("é", "&eacute;",$e);
            $e = str_replace("è", "&egrave;",$e);
            $e = str_replace("ê", "&ecirc;",$e);
            $e = str_replace("ë", "&euml;", $e);
            $e = str_replace("ï", "&iuml;", $e);
            return $e;
		}

		function raw($raw = "")
		{
			WF::TPL()->inner .= $raw;
		}

		function base_doctype()
		{
			WF::TPL()->inner .= "<!doctype html>";
		}
        function base_html()
        {
                WF::TPL()->inner .= "<html>";
        }
		function base_head()
		{
			WF::TPL()->inner .= "<head>";
		}

		function base_endhead()
		{
			WF::TPL()->inner .=  "</head>";
		}
		function base_title($t)
		{	
			WF::TPL()->inner .=  "<title>$t</title>";
		}
		function base_body($e = null)
		{
			WF::TPL()->inner .=  "<body $e>";
		}
		function base_endbody()
		{
			WF::TPL()->inner .= "</body>";
		}
        function base_endhtml()
        {
            WF::TPL()->inner .= "</html>";
        }
        function base_h1($h, $e = null)
        {
            WF::TPL()->inner .= '<h1 '.$e.'>'.$h.'</h1>';
        }
		function base_h2($h, $e = null)
        {
            WF::TPL()->inner .= '<h2 '.$e.'>'.$h.'</h2>';
        }
		function base_h3($h, $e = null)
		{
			WF::TPL()->inner .= '<h3 '.$e.'>'.$h.'</h3>';
		}
		function base_a($str, $target, $e = null)
        {
            WF::TPL()->inner .= '<a '.$e.' href="'.$target.'">'.$str.'</a>';
        }
		function base_imglink($img, $target, $a = null, $i=null, $e=null)
		{
			WF::TPL()->inner .= '<a '.$e.' href="'.$target.'"><img '.$i.' src="'.$img.'" alt="'.$a.'"></a>';
		}
		function base_img($img, $a = null, $e = null)
		{
			WF::TPL()->inner .= '<img '.$e.' src="'.$img.'" alt="'.$a.'">';
		}
		function base_div($d = null, $e = null)
		{
			WF::TPL()->inner .= "<div $e id='$d'>";
		}
		function base_enddiv()
		{
			WF::TPL()->inner .= "</div>";
		}
		function base_br()
		{
			WF::TPL()->inner .= "<br />";
		}
		function base_space($c = 1)
		{
			$i = 0;
			while($i++ < $c) WF::TPL()->inner .=  "&nbsp;";
		}
		function base_ul($a=null, $b=null)
		{
			WF::TPL()->inner .= "<ul $b>$a";	
		}
		function base_endul()
		{
			WF::TPL()->inner .= "</ul>";
		}
		function base_li($a, $b=null)
		{
			WF::TPL()->inner .= "<li $b>$a</li>";	
		}
		function base_script()
		{
			WF::TPL()->inner .= "<script>\n";
		}
		function base_endscript()
		{
			WF::TPL()->inner .= "</script>\n";
		}
		function base_linkcss($c)
		{
			WF::TPL()->inner .= '<link rel="stylesheet" type="text/css" href="'.$c.'">';
		}
		function base_linkjs($j)
		{
			WF::TPL()->inner .= '<script src="'.$j.'" type="text/javascript"></script>';
		}
		function base_table($element = null)
        {
                WF::TPL()->inner .= "<table $element>\n";
        }
        function base_endtable()
        {
                WF::TPL()->inner .= "</table>\n";
        }
        function base_tbody()
        {
                WF::TPL()->inner .= "<tbody>";
        }
        function base_endtbody()
        {
                WF::TPL()->inner .= "</tbody>";
        }
        function base_tr($element = null)
        {
                WF::TPL()->inner .= "<tr $element>";
        }
		function base_endtr()
        {
                WF::TPL()->inner .= "</tr>";
        }
        function base_rawth($t, $e = null)
        {
                WF::TPL()->inner .= "<th $e>".$t."</th>";
        }
        function base_rawtd($t, $e = null)
        {
                WF::TPL()->inner .= "<td $e>".$t."</td>";
        }
		function base_th($e = null)
		{
			if(isset($e))
			{
				WF::TPL()->inner .= "<th $e>";
			}
			else WF::TPL()->inner .= "<th>";
		}
		function base_endth()
		{
			WF::TPL()->inner .= "</th>";
		}
		function base_td()
		{
			WF::TPL()->inner .= "<td>";
		}
		function base_endtd()
		{
			WF::TPL()->inner .= "</td>";
		}
		function base_line($e=null)
		{
			if($e != null)
				WF::TPL()->inner .=  "<hr $e>";
			else WF::TPL()->inner .=  "<hr>";
		}
		function base_meta($n, $c=null)
		{
			if($c!=null)
				WF::TPL()->inner .=  "<meta name=\"$n\" content=\"$c\">";
			else WF::TPL()->inner .= "<meta name=\"$n\">";
		}
		function base_charset($e)
		{
			WF::TPL()->inner .=  '<meta charset="'.$e.'">';
		}
		function base_p($t, $e=null)
		{
			if($e!=null)
				WF::TPL()->inner .= "<p $e>$t</p>";
			else WF::TPL()->inner .= "<p>$t</p>";
		}
		function base_text($t)
		{
			WF::TPL()->inner .= "$t<br/>";
		}
		function base_span($t, $e=null)
		{
			if($e!=null)
				 WF::TPL()->inner .= "<span $e>$t</span>";
	                else WF::TPL()->inner .= "<span>$t</span>";
		}
		function base_spanbr($t, $e=null)
		{
			if($e!=null)
				WF::TPL()->inner .= "<span $e>$t</span><br/>";
			else WF::TPL()->inner .= "<span>$t</span><br/>";
		}
		function base_ico($a)
		{
			WF::TPL()->inner .= '<link rel="icon" type="image/x-icon" href="'.$a.'" />';
		}

		function base_form($id = "form", $action = "", $method = "POST", $target = "_top", $free = NULL)
		{
			$html = "<form";
			$html .= " id=\"$id\"";
			$html .= " action=\"$action\"";
			$html .= " method=\"$method\"";
			$html .= " target=\"$target\"";
			$html .= " " . $free." >";
			WF::TPL()->inner .= $html;
		}
		function base_endform()
		{
			WF::TPL()->inner .= "</form>";
		}

		function base_textarea($id, $value = "", $free = NULL)
		{
			WF::TPL()->inner .= "<textarea id=\"$id\" name=\"$id\" $free >$value</textarea>";
		}

		function base_input($id, $type, $value = "", $free = NULL)
		{
			WF::TPL()->inner .= "<input id=\"$id\" name=\"$id\" type=\"$type\" value=\"$value\" $free >";
		}
	}
	
?>
