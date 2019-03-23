<?php
	if (isset($_POST['submit'])) {
	//	$summary = ($_POST['summary']);
	//	$description = ($_POST['description']);
	//	$type = $_POST['type'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$base64_usrpwd = base64_encode($_POST['username'].':'.$_POST['password']);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://saratel.atlassian.net/rest/api/2/issue');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Basic '.$base64_usrpwd)); 
		
		$arr['project'] = array( 'key' => 'TESTSW');
		$arr['summary'] = $_POST['summary'];
		$arr['description'] = $_POST['description'];
		$arr['issuetype'] = array( 'name' => $_POST['type']);
		
		$json_arr['fields'] = $arr;
		
		$json_string = json_encode ($json_arr);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$json_string);
		$result = curl_exec($ch);
		curl_close($ch);
		
		echo $result;
	}
?>
<html>
<head>
	<title>Curl Test Example</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<div>
		<?php
			if(isset($output))
			{
				echo $output;
			}
		?>
	</div>
	<div class= contactform>
		<form method="post" action="">
			<h1>Create an Issue using PHP and cURL with JSON</h1>
			<div class = contact>
				<p><strong>Summary:</strong>
					<input type="text" name="summary" id="summary">
				</p>
				<p><strong>Description:</strong>
					<input type="text" name="description" id="description">
				</p>
				<p><strong>Issue Type:</strong>
					<input type="text" name="type" id="type">
				</p>
				<p><strong>Username:</strong>
					<input type="text" name="username" id="username">
				</p>
				<p><strong>Password:</strong>
					<input type="password" name="password" id="password">
				</p>
				<p><input type="button" id="button" value="Submit" name="button"></p>
			</div>
		</form>
	</div>
</body>
</html>