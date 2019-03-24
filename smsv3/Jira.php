<?php 
//session_destroy();
session_start();

$id = 		$_SESSION['storedsid'];
$sid =		$_SESSION['storedsid'];
$to =		$_SESSION['storedto'];
$from =		$_SESSION['storedfrom'];
$body =		$_SESSION['storedbody'];
$uri =		$_SESSION['storeduri'];
$direction =$_SESSION['storeddirection'];
$stat =		$_SESSION['storedstat'];


 			$username = "gabriel.alforque@anaca.com.au";
			$password = "*************";

			$base64_usrpwd = base64_encode($username.':'.$password);
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://saratel.atlassian.net/rest/api/2/issue');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Basic '.$base64_usrpwd)); 
			
			$arr['project'] = array( 'key' => 'TESTSW');
			$arr['summary'] = "API TEST";
			$arr['description'] = "Our Company# ".$to . "\n"."From: ".$from. "\n"."Status: ". $stat. "\n"."Body: " . $body ."\n"."Direction: ".$direction. "\n"."Twillio URI: ". $uri;
			$arr['issuetype'] = array( 'name' => "Service Request");
			
			$json_arr['fields'] = $arr;
			
			$json_string = json_encode ($json_arr);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$json_string);
			$result = curl_exec($ch);
			curl_close($ch);
			
			//
			session_destroy();
			unset($_SESSION['storedsid']); 
			unset($_SESSION['storedto']); 
			unset($_SESSION['storedfrom']);
			unset($_SESSION['storedbody']);;
			unset($_SESSION['storeduri']);
			unset($_SESSION['storeddirection']);
			unset($_SESSION['storedstat']);

 ?>
