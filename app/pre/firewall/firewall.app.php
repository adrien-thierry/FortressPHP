<?php

class firewall_app
{
        public function code()
        {
		$conf = new firewall_conf();
		 if(isset($conf->restricted))
                {
                        if(isset($_GET['p'])) $p = $_GET['p'];
                        else $p = HOME_PAGE;

                        if($conf->restricted == "*" || in_array(strtolower($p),
$conf->restricted))
                        {
		                if(!in_array($_SERVER['REMOTE_ADDR'], $conf->firewall))	
				{
					header("HTTP/1.0 " . $conf->error);
					die($conf->message);
				}
			}
		}
        }
}

?>
