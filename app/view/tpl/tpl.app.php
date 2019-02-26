<?php
	class tpl_app
	{
		public function code()
		{
			$conf = new tpl_conf();
			$tpl = false;
			for ($i = 0; $i < count($conf->search); $i++) 
			{
				if(isset($_GET[$conf->search[$i]])) 
				{
					$tpl = true;
					break;
				}
			}
			if(count($_GET) == 0 || $tpl) WF::TPL()->gettemplate();
		}
	}
?>
