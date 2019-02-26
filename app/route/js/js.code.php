<?php

	function new_jsheader()
    {
             header("Content-type: application/javascript");
    }

    function new_createjs($path)
    {
            if(JS_PARANOID == true) $key = Paranoid();
            else $key = JS_KEY;
            $url = "?" . JS_GET . "=" . pathEncrypt($path, $key);
            return $url;
    }

    function new_getjs($path)
    {
            if(JS_PARANOID == true) $key = Paranoid();
            else $key = JS_KEY;
            $path = pathDecrypt($path, $key);
            WF::JS()->jsheader();
            if(file_exists($path)) return file_get_contents($path);
            else return NULL;
    }


?>