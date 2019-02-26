<?php

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
