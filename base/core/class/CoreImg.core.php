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

		class Core_Img extends Overrider
		{

			function base_imgheader($t)
			{
				 header("Content-type: image/$t");
			}

			function base_createimg($p)
			{
				return $p;
			}
	
			function base_getimg($p)
			{
				return file_get_contents($p);
			}
		}
?>
