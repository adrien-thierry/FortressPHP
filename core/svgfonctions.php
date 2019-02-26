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


	function addSVG($a, $b, $c = null)
	{
		if($c != null)
		echo '<svg width="'.$a.'" height="'.$b.'" viewBox="'.$c.'" xmlns="http://www.w3.org/2000/svg">';
		else
		echo '<svg width="'.$a.'" height="'.$b.'" xmlns="http://www.w3.org/2000/svg">';	
	}

	function endSVG()
	{
		echo "</svg>";
	}

	function drawCircle($a, $b, $r, $f, $s, $w, $e = null)
	{
		echo '<circle cx="'.$a.'" cy="'.$b.'" r="'.$r.'" fill="'.$f.'" stroke="'.$s.'" stroke-width="'.$w.'" '.$e.' />';

	}

	function drawText($a, $b, $c, $d, $f = "8", $e = null)
	{
		echo '<text x="'.$a.'" y="'.$b.'" fill="'.$c.'" font-size="'.$f.'" '.$e.' >'.$d.'</text>';
	}

?>
