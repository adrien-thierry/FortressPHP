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
