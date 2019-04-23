<?php
session_start();
require 'vendor/autoload.php';

use JiraRestApi\Issue\IssueService;
use JiraRestApu\JiraException;
 $spinid = $_SESSION['spinfield'];
 $issueKey = $_SESSION['storedkey'];
	// $issueKey = "TESTSW-353";
try
{
	$issueService = new IssueService();


	if ($spinid == 1) 
	{
		$assignee = 'gabriel.alforque';
	}
	elseif ($spinid == 3) 
	{
		$assignee = 'kristian.kawaling';
	}
	else if ($spinid == 4) 
	{
		$assignee = 'brian.fellizar';	
	}
	else
	{
		$assignee = 'gabriel.alforque';
	}
	

	$ret = $issueService->changeAssignee($issueKey, $assignee);

	// var_dump($ret);
}
catch(JiraException $e)
{
	$this->assertTrue(FALSE, "Change Assignee Failed : ". $e->getMessage());
}

  	unset($_SESSION['storedkey']);
  	unset($_SESSION['spinfield']);
    session_destroy();
?>
