<?php
class  LoginMikrotik {
	var $urlLogin = 'http://hostpot.com/login';
	var $urlLogout = 'http://hostpot.com/logout';
	var $myPassword = 'secret';
	var $myUsername = 'username';
	
	function genChapPassword() {
		// create curl resource
		$ch = curl_init();
		// set url
		curl_setopt($ch, CURLOPT_URL, $this->urlLogin);
		//return the transfer as a string
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// $output contains the output string
		$output = curl_exec($ch);
		// close curl resource to free up system resources
		curl_close($ch);
		$lines = explode(PHP_EOL, $output);
		foreach ($lines as $line) {
			if (strpos($line, 'hexMD5')) {
				$match = array();
				preg_match('/\'([^\']*)\'.*\'([^\']*)\'/', $line, $match);
				if(count($match) == 3) {
					$pass = '';
					$chapId = utf8_decode($match[1]);
					$chapChallenge = utf8_decode($match[2]);
					eval("\$pass = md5(\"$chapId\" . \$this->myPassword . \"$chapChallenge\");");
					return $pass;
				}
			}
		}
		return false;
	}


	function login() {
		$password = $this->genChapPassword();
		if(!$password) {
			echo "Error!";
		}
		$ch = curl_init();
		// set url
		curl_setopt($ch, CURLOPT_URL,$this->urlLogin);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "username=".$this->myUsername."&password=" . $password . "&popup=true&dst=");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec ($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close ($ch);
		echo "\ncode: " . $httpcode;
		echo "\noutput: " . $server_output;
	}

	function logout() {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->urlLogout);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = @curl_exec($ch);
		curl_close($ch);
		return $output;
	}

}


#using:
echo "action: " . $argv[1] . "\n";
$login = new LoginMikrotik();

switch ($argv[1]) {
	case 'start':
		$login->login();
		break;
	case 'stop':
		$login->logout();
		exit(0);
		break;
	default :
		break;
}