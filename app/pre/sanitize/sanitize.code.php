<?php

function cleanRequest($r)
	{
		if(strlen($r) > 0)
		{
			$arr = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789,-_/";
			$cTab = mb_str_split ( $r );
			$tmp = "";	
			for( $i = 0; $i < count($cTab); $i++ )
			{
				if(strpos($arr, $cTab[$i]) !== FALSE) 
				{
					$tmp .= $cTab[$i];
				}
			}
			return $tmp;
		}
	}
	
	function mb_str_split( $string ) 
	{ 
    		# Split at all position not after the start: ^ 
    		# and not before the end: $ 
    		return preg_split('/(?<!^)(?!$)/u', $string ); 
	}	 
?>
