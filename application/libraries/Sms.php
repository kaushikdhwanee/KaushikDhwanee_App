<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sms{
	function __constructor()
	{

	}
	function sendsms($mobile, $message)
	{
	  $url = "http://sms.scubedigi.com/api.php?username=kaushikdhwane&password=502081&to=".$mobile."&from=KDWANE&message=".urlencode($message);
	  $ret = file($url); 
	  return $ret;
	}

}
?>