<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account Sid and Auth Token at twilio.com/console
$sid    = "AC2abc2db6780b2615c558532a711bc9ad";
$token  = "0e70a16a89728299c29a055c21a09929";
$twilio = new Client($sid, $token);

$message = $twilio->messages("SMb13f4b35224e4af69df139b00dbf66e8")

                  ->fetch();

      //////////////////JIRA
		$username = "gabriel.alforque@anaca.com.au";
		$password = "154263789aA";

		$base64_usrpwd = base64_encode($username.':'.$password);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://saratel.atlassian.net/rest/api/2/issue');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Basic '.$base64_usrpwd)); 
		
		$arr['project'] = array( 'key' => 'TESTSW');
		$arr['summary'] = "API TEST";
		$arr['description'] = $message->to;
		$arr['issuetype'] = array( 'name' => "Service Request");
		
		$json_arr['fields'] = $arr;
		
		$json_string = json_encode ($json_arr);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$json_string);
		$result = curl_exec($ch);
		curl_close($ch);
		
		echo $result;
//////////////
print($message->to);
