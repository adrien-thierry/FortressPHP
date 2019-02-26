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

	class Core_Css extends Overrider
	{
		function base_cssheader()
		{
			header("Content-type: text/css");
		}
		function base_tag($t, $e=null)
		{
			WF::TPL()->inner .= "$t $e{";
		}
		function base_endtag()
		{
			WF::TPL()->inner .= "} ";
		}
		function base_style($s)
		{
			WF::TPL()->inner .= "$s;";
		}
	}
?>
