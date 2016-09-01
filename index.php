<?php
	error_reporting(0);
	/*print_r($_SERVER);
	if (!isset($_SERVER['PHP_AUTH_USER'])) {
		header('WWW-Authenticate: Basic realm="My Realm"');
		header('HTTP/1.0 401 Unauthorized');
		echo 'Text to send if user hits Cancel button';
		exit;
	} else {
		echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
		echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
	}
	
	function authenticate() {
	    header('WWW-Authenticate: Basic realm="Test Authentication System"');
	    header('HTTP/1.0 401 Unauthorized');
	    echo "You must enter a valid login ID and password to access this resource\n";
	    exit;
	}

	if (!isset($_SERVER['PHP_AUTH_USER']) || ($_POST['SeenBefore'] == 1 && $_POST['OldAuth'] == $_SERVER['PHP_AUTH_USER'])) {
	   authenticate();
	}else {
	   echo "<p>Welcome: {$_SERVER['PHP_AUTH_USER']}<br />";
	   echo "Old: {$_REQUEST['OldAuth']}";
	   echo "<form action='{$_SERVER['PHP_SELF']}' METHOD='post'>\n";
	   echo "<input type='hidden' name='SeenBefore' value='1' />\n";
	   echo "<input type='hidden' name='OldAuth' value='{$_SERVER['PHP_AUTH_USER']}' />\n";
	   echo "<input type='submit' value='Re Authenticate' />\n";
	   echo "</form></p>\n";
	}*/

	function getFileSize( $filesize ){
		$step = 0;
		$decr = 1024;
		$prefix = array('Byte','KB','MB','GB','TB','PB');
		if(is_numeric( $filesize )){
			while (($filesize / $decr ) > 0.9) {
				$filesize = $filesize / $decr;
				$step++;
			}
			return round($filesize, 2).' '.$prefix[$step];
		}else{
			return 'NaN';
		}
	}

	echo getFileSize(1023012);
?>