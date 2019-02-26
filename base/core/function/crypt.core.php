<?php


	function base64_url_encode($input)
        {
                return strtr(base64_encode($input), '+/=', '-_,');
        }

        function base64_url_decode($input)
        {
                return base64_decode(strtr($input, '-_,', '+/='));
        }


	function Paranoid()
        {
                $date = date(IMG_SALT);
                $key = $date . IMG_KEY;
                return hash(IMG_PMOD, $key);
        }

        function pathEncrypt($sValue, $sSecretKey)
        {
                return trim(base64_url_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $sSecretKey, $sValue, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
        }

        function pathDecrypt($sValue, $sSecretKey)
        {
                return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $sSecretKey, base64_url_decode($sValue), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
        }


?>
