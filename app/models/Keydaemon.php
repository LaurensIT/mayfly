<?php
/*
This file is part of Mayfly.

Copyright (C) 2014 Jan-Jorre Laurens <dratone@gmail.com>

Mayfly is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Mayfly is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Mayfly.  If not, see <http://www.gnu.org/licenses/>.

*/
class Keydaemon {
	function getaKey($validity)
	{

		$json = json_decode(file_get_contents(Config::Get('system.rsabackend') . "/rsa/getsession?validity=" . $validity));
                $this->session = $json->uuid;
                $this->publickey = $json->public;
                $this->publickeyid = 1;
                $this->passcode = $json->password;

	}
	public function recrypt($encrypted,$pkey)
	{

		$data = array(	"session" => $this->session,
				"publickeyid" => $this->publickeyid,
				"password" => $this->passcode,
				"encrypted" => $encrypted,
				"public" => $pkey);

		$data = urlencode(urlencode(serialize($data)));
		
		$curl = curl_init(Config::Get('system.rsabackend') . "/rsa/recrypt");
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, "data=" . $data);

		$m = curl_exec($curl);

		return $m;

		
	}
}

?>
