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

	class Core_TPL extends Overrider
	{
		public $zone = DEFAULT_ZONE;
		public $name = HOME_PAGE;
		public $inner = "";
		public $css = "";
		public $err = "";
		public $tmp = "";

		public function base_add($code)
		{
			WF::TPL()->tmp .= $code;
		}

		public function base_gettemplate()
		{
			include(MAIN_PATH . "content/tpl/default/default.tpl.php");
		}

		public function base_show()
		{
			echo WF::TPL()->inner;
		}

		public function base_flush()
		{
			WF::TPL()->inner .= WF::TPL()->tmp;
			WF::TPL()->tmp = "";
		}

		public function base_cleartmp()
		{
			WF::TPL()->tmp = "";
		}

	}
?>
