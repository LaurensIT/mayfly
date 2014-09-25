<?php

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
