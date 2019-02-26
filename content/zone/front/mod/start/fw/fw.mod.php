<?php

class fw_mod
{
        public function code()
        {
		$conf = new fw_conf();
		 if(isset($conf->restricted))
                {
                        if(isset($_GET['p'])) $p = $_GET['p'];
                        else $p = HOME_PAGE;

                        if($conf->restricted == "*" || in_array(strtolower($p),
$conf->restricted))
                        {
		                if(!in_array($_SERVER['REMOTE_ADDR'], $conf->firewall)) die($conf->message);
			}
		}
        }
}

?>
