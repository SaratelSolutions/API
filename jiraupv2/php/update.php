<?php
$username = "gabriel.alforque@anaca.com.au";
$password = "154263789aA";
$mainurl = "https://saratel.atlassian.net/rest/api/2/issue/TESTSW-111/comment";
$issueurl = "";

if (isset($_POST['submit'])) {

	$inputkey = $_POST['key'];
	$url = $mainurl . $inputkey;
	$base64_usrpwd = base64_encode($username.':'.$password);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $mainurl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Basic '.$base64_usrpwd)); 
		
	
		$arr['body'] = $_POST['summary'];
		//$arr['description'] = $_POST['description'];
			
	//	$json_arr['add'] = $arr;
	//	$json_test['update'] = $json_arr;
	
		$json_string = json_encode ($arr);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$json_string);
		$result = curl_exec($ch);
		curl_close($ch);


	//	echo $json_string;
	if($result == "" || is_null($result))
	{
		echo "Updated has been successfull.";
	}
	else
	{
		echo "\nFailed: " .$result;
	}
	
	

}
?>