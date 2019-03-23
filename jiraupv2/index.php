<?php
require "php/update.php";
//include 'php/update.php';
?>

<!DOCTYPE html>

<html>
<head>

	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<title>Testing UPDATE FROM PHP</title>
	
</head>
<body>
	<div class="sendform">
		<form class="" action="" method="POST">
			<h1>JIRA Updates</h1>
			<p><strong>ISSUE KEY:</strong>
				<input type="text" name="key" id="key" placeholder="IssueKey"></p>
			<p><strong>SUMMARY: </strong>
				<input type="text" name="summary" id="summary" placeholder="New Summary">
			</p>
			<div class="descriptionform">
				<p><strong>DESCRIPTION: </strong></p>
					<textarea rows="4" cols="50" placeholder="New Description" name="description" id="description"></textarea>					
			</div>			
			<input type="submit" name="submit" id="submit" value="Submit Data">
		</form>

	</div>
</body>
</html>