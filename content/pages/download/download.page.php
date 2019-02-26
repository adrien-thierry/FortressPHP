<?php
	if(!defined("FORTRESSPHP")) header('Location: ../');
	addDiv("sc");
		echoH1("Files and documentation");
	endDiv();
	addDiv("un", "class=download");
		$c = DOWNLOAD_PATH;
		addTable();
			addTbody();
				$h = opendir($c);
				$m = 0;
				while($d = readdir($h))
				{
					if (is_dir($c . $d) && $d != "." && $d != "..") 
					{
						if(($m % 2) == 0) addTr("ADD");
						echoTd();
							$i = opendir($c . $d);
							echoH2($d);
							while($e = readdir($i))
							{
								if($e != "." && $e != "..")
								{
									echoLink($e,$c . $d.'/'.$e, "target=_blank");
								}
							}
						endTd();
						//if($m % 2 == 0)endTr();
						$m++;
					}
				}
			endTbody();
		endTable();
		closedir($h);
	endDiv();
?>
